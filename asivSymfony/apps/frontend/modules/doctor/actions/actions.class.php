<?php

/**
 * doctor actions.
 *
 * @package    asi2vSymfony
 * @subpackage doctor
 * @author     McCubo
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class doctorActions extends sfActions {

    /**
     * Executes index action
     *
     */
    public function executeIndex() {
        #$sDate = date("Y-m-d");
        #$this->aCita = Doctrine_Core::getTable("Cita")->findByIdEmpleadoAndFechaCita($this->getUser()->getAttribute("user_id"), $sDate);
        $this->aCita = Doctrine_Core::getTable("Cita")->findAll(Doctrine_Core::HYDRATE_RECORD);
    }

    public function executeCitaById(sfWebRequest $oRequest) {
        $sCitaId = $oRequest->getParameter("id");
        $this->oCita = Doctrine_Core::getTable("Cita")->find($sCitaId);
        if (NULL != $this->oCita) {
            $iPaciente = $this->oCita->getIdPaciente();
            $this->aCommentRecordList = Doctrine_Core::getTable("CitaComentario")->getCommentByPacient($iPaciente);
            $this->aRecetaCitaRecordList = Doctrine_Core::getTable("RecetaCita")->getMedByPatient($iPaciente);

            $this->aMedicineRecordList = Doctrine_Core::getTable("Medicina")->findAll();
            $this->aCitaRecordList = Doctrine_Core::getTable("Cita")->findByIdPaciente($iPaciente);
        } else {
            $this->forward404();
        }
    }

    public function executeGetJsonChart(sfWebRequest $oWebRequest) {
        $iPacientId = $oWebRequest->getParameter("pacient_id");
        $aBarChartJson = Doctrine_Core::getTable("RecetaCita")->getJsonBarChart($iPacientId);
        $aJsonChart = Doctrine_Core::getTable("Cita")->getJsonChartInfo($iPacientId);
        $aData = array(
            'bar' => $aBarChartJson,
            'line' => $aJsonChart
        );
        $this->getResponse()->setContent(json_encode($aData));
        return sfView::NONE;
    }

    public function executeSaveAndEnd(sfWebRequest $oWebRequest) {
        $aData = array('message_list' => array());
        try {
            $aRecetaMedicinaList = $oWebRequest->getParameter("oRecetas");
            if (NULL != $aRecetaMedicinaList) {
                $oDoctrineCollection = new Doctrine_Collection("RecetaCita");
                foreach ($aRecetaMedicinaList as $aRecetaMedicinaRecord) {
                    $oRecetaCita = new RecetaCita();
                    $oRecetaCita->setCantidad($aRecetaMedicinaRecord['cantidad']);
                    $oRecetaCita->setIdMedicina($aRecetaMedicinaRecord['id_medicina']);
                    $oRecetaCita->setIdCita($oWebRequest->getParameter("cita_id"));
                    $oRecetaCita->setRecetaIndicacion($aRecetaMedicinaRecord['indicacion']);
                    $oDoctrineCollection->add($oRecetaCita);
                }
                if ($oDoctrineCollection->count() > 0) {
                    $oDoctrineCollection->save();
                }
            }
            $aComment = $oWebRequest->getParameter("aComment");
            if (NULL != $aComment) {
                $oCollection = new Doctrine_Collection("CitaComentario");
                foreach ($aComment as $sComment) {
                    $oCitaComment = new CitaComentario();
                    $oCitaComment->setIdCita($oWebRequest->getParameter("cita_id"));
                    $oCitaComment->setComentario($sComment);
                    $oCollection->add($oCitaComment);
                }
                if ($oCollection->count() > 0) {
                    $oCollection->save();
                }
            }
            $aCita = $oWebRequest->getParameter('oCita');
            $oCitaRecord = Doctrine_Core::getTable("Cita")->find($oWebRequest->getParameter("cita_id"));
            # recete emitida
            $oCitaRecord->setIdEstadoCita(5);
            $oCitaRecord->setPresionPaciente($aCita['pres']);
            $oCitaRecord->setTemperaturaPaciente($aCita['temp']);
            $oCitaRecord->setPesoPacientel($aCita['peso']);
            $oCitaRecord->setAlturaPaciente($aCita['alto']);
            $oCitaRecord->save();
        } catch (Exception $exc) {
            array_push($aData['message_list'], $exc->getCode() . " Error en la Transaccion");
        }
        $this->getResponse()->setContent(json_encode($aData));
        return sfView::NONE;
    }

}

<?php

/**
 * despacho actions.
 *
 * @package    asi2vSymfony
 * @subpackage despacho
 * @author     McCubo
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class despachoActions extends sfActions {

    /**
     * Executes index action
     *
     */
    public function executeIndex() {
        $this->oRecetaCitaRecordList = Doctrine_Core::getTable("RecetaCita")->getRecetasDespacho();
    }

    public function executeSaveDonation(sfWebRequest $oWebRequest) {
        $aData = array('message_list' => array());
        $sCitaId = $oWebRequest->getParameter("cita_id");
        if (NULL != $sCitaId) {
            $fMonto = $oWebRequest->getParameter("monto");
            if ($fMonto == NULL || trim($fMonto) == "") {
                $fMonto = 0.0;
            }
            $oCuotasCita = new CuotasCita();
            $oCuotasCita->setIdCita($sCitaId);
            $oCuotasCita->setMontoDonacion($fMonto);
            $oCuotasCita->save();
            $oCita = Doctrine_Core::getTable("Cita")->find($sCitaId);
            $oCita->setIdEstadoCita(6);
            $oCita->save();
        } else {
            array_push($aData['message_list'], "Error al intentar Guardar");
        }
        $this->getResponse()->setContent(json_encode($aData));
        return sfView::NONE;
    }

}

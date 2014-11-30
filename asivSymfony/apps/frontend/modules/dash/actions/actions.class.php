<?php

/**
 * dash actions.
 *
 * @package    asi2vSymfony
 * @subpackage dash
 * @author     McCubo
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashActions extends sfActions {

    /**
     * Executes index action
     *
     */
    public function executeIndex() {
        $this->iConfirmedMeetingCount = Doctrine_Core::getTable('Cita')->getTodayMeetingCounter();
        $this->iPendingMeetingCount = Doctrine_Core::getTable('Cita')->getTodayMeetingCounter(1);
        $this->iCanceledMeetingCount = Doctrine_Core::getTable('Cita')->getTodayMeetingCounter(2);
        $this->aMeetingList = Doctrine_Core::getTable("Cita")->getTodayMeetingCollection();
    }

    public function executeCancelMeeting(sfWebRequest $oWebRequest) {
        $aData = array('message_list' => array());
        $sCitaId = $oWebRequest->getParameter("id");
        if ($sCitaId == NULL) {
            array_push($aData['message_list'], "Favor Elegir una Cita!");
        } else {
            $bUpdated = Doctrine_Core::getTable("Cita")->doUpdateMeetingStatus($sCitaId, 2);
            if (!$bUpdated) {
                array_push($aData['message_list'], "Problema inesperado al actualizar, favor intente denuevo");
            }
        }
        #TODO: send notification to patient indicating the meeting has been cancelled
        $this->getResponse()->setContent(json_encode($aData));
        return sfView::NONE;
    }

    public function executeUpdateMeeting(sfWebRequest $oWebRequest) {
        $aData = array('message_list' => array());
        $iCitaId = $oWebRequest->getParameter("id");
        if (NULL == $iCitaId) {
            array_push($aData['message_list'], "Seleccione una cita para ser actualizada!");
        } else {
            $bUpdated = Doctrine_Core::getTable("Cita")->doUpdateMeetingStatus($iCitaId, 4);
            if (!$bUpdated) {
                array_push($aData['message_list'], "Problema inesperado al actualizar, favor intente denuevo");
            }
        }
        $this->getResponse()->setContent(json_encode($aData));
        return sfView::NONE;
    }

}

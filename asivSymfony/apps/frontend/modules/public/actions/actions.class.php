<?php

/**
 * public actions.
 *
 * @package    asi2vSymfony
 * @subpackage public
 * @author     McCubo
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class publicActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex() {
        
    }

    public function executeGetSchedules(sfWebRequest $oWebRequest) {
        $sStart = $oWebRequest->getParameter("start");
        $sEnd = $oWebRequest->getParameter("end");
        $aDataBusy = Doctrine_Core::getTable("Cita")->getBusyIntervals($sStart, $sEnd);
        $aDataException = Doctrine_Core::getTable("CalendarExcepcion")->getExceptionIntervals($sStart, $sEnd);
        $aData = array_merge($aDataBusy, $aDataException);
        $this->getResponse()->setContent(json_encode($aData));
        return sfView::NONE;
    }

}

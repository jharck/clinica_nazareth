<?php

/**
 * login actions.
 *
 * @package    asi2vSymfony
 * @subpackage login
 * @author     McCubo
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex() {
        
    }

    public function executeDoLogin(sfWebRequest $oRequest) {
        $aData = array('message_list' => array());
        $sUsername = $oRequest->getParameter('username');
        $sPassword = md5(sha1($oRequest->getParameter('passwd')));
        $oUser = Doctrine_Core::getTable('Usuario')->findOneByUsernameAndPasswordAndStatus($sUsername, $sPassword, 1);
        if (NULL != $oUser) {
            $this->getUser()->getAttributeHolder()->clear();
            $this->getUser()->clearCredentials();
            if (!$this->getUser()->isAuthenticated()) {
                $this->getUser()->setAuthenticated(true);
            }
            if ($oUser->getRol()->isRolActive()) {
                $this->getUser()->addCredential($oUser->getRol()->getNombre());
            }
            $this->getUser()->setAttribute('full_name', $oUser->getFullName());
            $this->getUser()->setAttribute('username', $oUser->getUsername());
            $this->getUser()->setAttribute('user_id', $oUser->getIdUsuario());
            $oUser->setUltimoIngreso(date("Y-m-d H:i:s"));
            $oUser->save();
        } else {
            array_push($aData['message_list'], "Acceso denegado!, compruebe sus credenciales.");
        }
        $this->getResponse()->setContent(json_encode($aData));
        return sfView::NONE;
    }

    public function executeDoLogout() {
        $this->getUser()->getAttributeHolder()->clear();
        $this->getUser()->clearCredentials();
        $this->getUser()->setAuthenticated(false);
        $this->redirect('login/index');
    }

}

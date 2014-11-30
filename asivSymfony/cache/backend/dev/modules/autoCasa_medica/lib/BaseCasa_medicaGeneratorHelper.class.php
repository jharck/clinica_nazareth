<?php

/**
 * casa_medica module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage casa_medica
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCasa_medicaGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'casa_medica' : 'casa_medica_'.$action;
  }
}

<?php

/**
 * casa_medica module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage casa_medica
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCasa_medicaGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%id_casa_medica%% - %%nombre%% - %%nombre_contacto%% - %%telefono%% - %%fecha_contrato%% - %%status%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Casa medica List';
  }

  public function getEditTitle()
  {
    return 'Edit Casa medica';
  }

  public function getNewTitle()
  {
    return 'New Casa medica';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'id_casa_medica',  1 => 'nombre',  2 => 'nombre_contacto',  3 => 'telefono',  4 => 'fecha_contrato',  5 => 'status',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id_casa_medica' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nombre' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nombre_contacto' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'telefono' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'fecha_contrato' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'status' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id_casa_medica' => array(),
      'nombre' => array(),
      'nombre_contacto' => array(),
      'telefono' => array(),
      'fecha_contrato' => array(),
      'status' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id_casa_medica' => array(),
      'nombre' => array(),
      'nombre_contacto' => array(),
      'telefono' => array(),
      'fecha_contrato' => array(),
      'status' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id_casa_medica' => array(),
      'nombre' => array(),
      'nombre_contacto' => array(),
      'telefono' => array(),
      'fecha_contrato' => array(),
      'status' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id_casa_medica' => array(),
      'nombre' => array(),
      'nombre_contacto' => array(),
      'telefono' => array(),
      'fecha_contrato' => array(),
      'status' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id_casa_medica' => array(),
      'nombre' => array(),
      'nombre_contacto' => array(),
      'telefono' => array(),
      'fecha_contrato' => array(),
      'status' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'CasaMedicaForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'CasaMedicaFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}

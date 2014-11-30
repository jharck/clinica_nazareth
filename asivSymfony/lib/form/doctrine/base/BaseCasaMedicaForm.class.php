<?php

/**
 * CasaMedica form base class.
 *
 * @method CasaMedica getObject() Returns the current form's model object
 *
 * @package    asi2vSymfony
 * @subpackage form
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCasaMedicaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_casa_medica'  => new sfWidgetFormInputHidden(),
      'nombre'          => new sfWidgetFormInputText(),
      'nombre_contacto' => new sfWidgetFormInputText(),
      'telefono'        => new sfWidgetFormInputText(),
      'fecha_contrato'  => new sfWidgetFormDate(),
      'status'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_casa_medica'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_casa_medica')), 'empty_value' => $this->getObject()->get('id_casa_medica'), 'required' => false)),
      'nombre'          => new sfValidatorString(array('max_length' => 45)),
      'nombre_contacto' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'telefono'        => new sfValidatorString(array('max_length' => 15)),
      'fecha_contrato'  => new sfValidatorDate(),
      'status'          => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('casa_medica[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CasaMedica';
  }

}

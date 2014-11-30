<?php

/**
 * EstadoCita form base class.
 *
 * @method EstadoCita getObject() Returns the current form's model object
 *
 * @package    asi2vSymfony
 * @subpackage form
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEstadoCitaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_estado_cita' => new sfWidgetFormInputHidden(),
      'nombre'         => new sfWidgetFormInputText(),
      'status'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_estado_cita' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_estado_cita')), 'empty_value' => $this->getObject()->get('id_estado_cita'), 'required' => false)),
      'nombre'         => new sfValidatorString(array('max_length' => 45)),
      'status'         => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado_cita[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoCita';
  }

}

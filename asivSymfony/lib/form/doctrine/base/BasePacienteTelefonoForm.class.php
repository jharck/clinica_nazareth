<?php

/**
 * PacienteTelefono form base class.
 *
 * @method PacienteTelefono getObject() Returns the current form's model object
 *
 * @package    asi2vSymfony
 * @subpackage form
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePacienteTelefonoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_paciente_telefono' => new sfWidgetFormInputHidden(),
      'telefono'             => new sfWidgetFormInputText(),
      'status'               => new sfWidgetFormInputText(),
      'paciente_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Paciente'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_paciente_telefono' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_paciente_telefono')), 'empty_value' => $this->getObject()->get('id_paciente_telefono'), 'required' => false)),
      'telefono'             => new sfValidatorString(array('max_length' => 20)),
      'status'               => new sfValidatorInteger(array('required' => false)),
      'paciente_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Paciente'))),
    ));

    $this->widgetSchema->setNameFormat('paciente_telefono[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PacienteTelefono';
  }

}

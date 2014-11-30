<?php

/**
 * Paciente form base class.
 *
 * @method Paciente getObject() Returns the current form's model object
 *
 * @package    asi2vSymfony
 * @subpackage form
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePacienteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_paciente'      => new sfWidgetFormInputHidden(),
      'tipo_sanguineo'   => new sfWidgetFormInputText(),
      'fecha_nacimiento' => new sfWidgetFormDate(),
      'id_usuario'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_paciente'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_paciente')), 'empty_value' => $this->getObject()->get('id_paciente'), 'required' => false)),
      'tipo_sanguineo'   => new sfValidatorString(array('max_length' => 10)),
      'fecha_nacimiento' => new sfValidatorDate(),
      'id_usuario'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'))),
    ));

    $this->widgetSchema->setNameFormat('paciente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Paciente';
  }

}

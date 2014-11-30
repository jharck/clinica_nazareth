<?php

/**
 * Cita form base class.
 *
 * @method Cita getObject() Returns the current form's model object
 *
 * @package    asi2vSymfony
 * @subpackage form
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCitaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_cita'              => new sfWidgetFormInputHidden(),
      'id_paciente'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Paciente'), 'add_empty' => false)),
      'id_empleado'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empleado'), 'add_empty' => false)),
      'fecha_cita'           => new sfWidgetFormDate(),
      'inicio_hora_cita'     => new sfWidgetFormTime(),
      'fin_hora_cita'        => new sfWidgetFormTime(),
      'id_estado_cita'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoCita'), 'add_empty' => false)),
      'fecha_creacion'       => new sfWidgetFormDate(),
      'peso_pacientel'       => new sfWidgetFormInputText(),
      'temperatura_paciente' => new sfWidgetFormInputText(),
      'presion_paciente'     => new sfWidgetFormInputText(),
      'altura_paciente'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_cita'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_cita')), 'empty_value' => $this->getObject()->get('id_cita'), 'required' => false)),
      'id_paciente'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Paciente'))),
      'id_empleado'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empleado'))),
      'fecha_cita'           => new sfValidatorDate(),
      'inicio_hora_cita'     => new sfValidatorTime(),
      'fin_hora_cita'        => new sfValidatorTime(),
      'id_estado_cita'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoCita'))),
      'fecha_creacion'       => new sfValidatorDate(),
      'peso_pacientel'       => new sfValidatorNumber(),
      'temperatura_paciente' => new sfValidatorNumber(),
      'presion_paciente'     => new sfValidatorNumber(),
      'altura_paciente'      => new sfValidatorNumber(),
    ));

    $this->widgetSchema->setNameFormat('cita[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cita';
  }

}

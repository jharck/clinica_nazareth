<?php

/**
 * Cita filter form base class.
 *
 * @package    asi2vSymfony
 * @subpackage filter
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCitaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_paciente'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Paciente'), 'add_empty' => true)),
      'id_empleado'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empleado'), 'add_empty' => true)),
      'fecha_cita'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'inicio_hora_cita'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fin_hora_cita'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_estado_cita'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoCita'), 'add_empty' => true)),
      'fecha_creacion'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'peso_pacientel'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'temperatura_paciente' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'presion_paciente'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'altura_paciente'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_paciente'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Paciente'), 'column' => 'id_paciente')),
      'id_empleado'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empleado'), 'column' => 'id_empleado')),
      'fecha_cita'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'inicio_hora_cita'     => new sfValidatorPass(array('required' => false)),
      'fin_hora_cita'        => new sfValidatorPass(array('required' => false)),
      'id_estado_cita'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EstadoCita'), 'column' => 'id_estado_cita')),
      'fecha_creacion'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'peso_pacientel'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'temperatura_paciente' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'presion_paciente'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'altura_paciente'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('cita_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cita';
  }

  public function getFields()
  {
    return array(
      'id_cita'              => 'Number',
      'id_paciente'          => 'ForeignKey',
      'id_empleado'          => 'ForeignKey',
      'fecha_cita'           => 'Date',
      'inicio_hora_cita'     => 'Text',
      'fin_hora_cita'        => 'Text',
      'id_estado_cita'       => 'ForeignKey',
      'fecha_creacion'       => 'Date',
      'peso_pacientel'       => 'Number',
      'temperatura_paciente' => 'Number',
      'presion_paciente'     => 'Number',
      'altura_paciente'      => 'Number',
    );
  }
}

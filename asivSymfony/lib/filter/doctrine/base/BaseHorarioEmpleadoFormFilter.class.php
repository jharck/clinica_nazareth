<?php

/**
 * HorarioEmpleado filter form base class.
 *
 * @package    asi2vSymfony
 * @subpackage filter
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseHorarioEmpleadoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_empleado'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empleado'), 'add_empty' => true)),
      'hora_inicio'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hora_fin'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dia_horario'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_empleado'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empleado'), 'column' => 'id_empleado')),
      'hora_inicio'         => new sfValidatorPass(array('required' => false)),
      'hora_fin'            => new sfValidatorPass(array('required' => false)),
      'dia_horario'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('horario_empleado_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HorarioEmpleado';
  }

  public function getFields()
  {
    return array(
      'id_horario_empleado' => 'Number',
      'id_empleado'         => 'ForeignKey',
      'hora_inicio'         => 'Text',
      'hora_fin'            => 'Text',
      'dia_horario'         => 'Number',
    );
  }
}

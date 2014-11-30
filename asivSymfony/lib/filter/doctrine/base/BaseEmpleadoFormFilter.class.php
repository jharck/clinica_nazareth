<?php

/**
 * Empleado filter form base class.
 *
 * @package    asi2vSymfony
 * @subpackage filter
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEmpleadoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_usuario'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => true)),
      'id_posicion'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Posicion'), 'add_empty' => true)),
      'id_departamento'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Departamento'), 'add_empty' => true)),
      'fecha_contratacion' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_usuario'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Usuario'), 'column' => 'id_usuario')),
      'id_posicion'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Posicion'), 'column' => 'id_posicion')),
      'id_departamento'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Departamento'), 'column' => 'id_departamento')),
      'fecha_contratacion' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('empleado_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Empleado';
  }

  public function getFields()
  {
    return array(
      'id_empleado'        => 'Number',
      'id_usuario'         => 'ForeignKey',
      'id_posicion'        => 'ForeignKey',
      'id_departamento'    => 'ForeignKey',
      'fecha_contratacion' => 'Date',
    );
  }
}

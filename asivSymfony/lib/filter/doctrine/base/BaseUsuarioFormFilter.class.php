<?php

/**
 * Usuario filter form base class.
 *
 * @package    asi2vSymfony
 * @subpackage filter
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUsuarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellido'       => new sfWidgetFormFilterInput(),
      'genero'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ultimo_ingreso' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_rol'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Rol'), 'add_empty' => true)),
      'status'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'username'       => new sfValidatorPass(array('required' => false)),
      'email'          => new sfValidatorPass(array('required' => false)),
      'password'       => new sfValidatorPass(array('required' => false)),
      'nombre'         => new sfValidatorPass(array('required' => false)),
      'apellido'       => new sfValidatorPass(array('required' => false)),
      'genero'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ultimo_ingreso' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_rol'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Rol'), 'column' => 'id_rol')),
      'status'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function getFields()
  {
    return array(
      'id_usuario'     => 'Number',
      'username'       => 'Text',
      'email'          => 'Text',
      'password'       => 'Text',
      'nombre'         => 'Text',
      'apellido'       => 'Text',
      'genero'         => 'Number',
      'ultimo_ingreso' => 'Date',
      'id_rol'         => 'ForeignKey',
      'status'         => 'Number',
    );
  }
}

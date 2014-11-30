<?php

/**
 * Medicina filter form base class.
 *
 * @package    asi2vSymfony
 * @subpackage filter
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMedicinaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_tipo_presentacion' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoPresentacion'), 'add_empty' => true)),
      'id_casa_medica'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CasaMedica'), 'add_empty' => true)),
      'limite_menor'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'limite_normal'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'limite_optimo'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'precio_unidad'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'existencia'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'               => new sfValidatorPass(array('required' => false)),
      'id_tipo_presentacion' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoPresentacion'), 'column' => 'id_tipo_presentacion')),
      'id_casa_medica'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CasaMedica'), 'column' => 'id_casa_medica')),
      'limite_menor'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'limite_normal'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'limite_optimo'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'precio_unidad'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'existencia'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('medicina_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Medicina';
  }

  public function getFields()
  {
    return array(
      'id_medicina'          => 'Number',
      'nombre'               => 'Text',
      'id_tipo_presentacion' => 'ForeignKey',
      'id_casa_medica'       => 'ForeignKey',
      'limite_menor'         => 'Number',
      'limite_normal'        => 'Number',
      'limite_optimo'        => 'Number',
      'precio_unidad'        => 'Number',
      'existencia'           => 'Number',
    );
  }
}

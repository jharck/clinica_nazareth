<?php

/**
 * RecetaCita filter form base class.
 *
 * @package    asi2vSymfony
 * @subpackage filter
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRecetaCitaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_cita'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cita'), 'add_empty' => true)),
      'id_medicina'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Medicina'), 'add_empty' => true)),
      'cantidad'          => new sfWidgetFormFilterInput(),
      'receta_indicacion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_cita'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Cita'), 'column' => 'id_cita')),
      'id_medicina'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Medicina'), 'column' => 'id_medicina')),
      'cantidad'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'receta_indicacion' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('receta_cita_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RecetaCita';
  }

  public function getFields()
  {
    return array(
      'id_receta_cita'    => 'Number',
      'id_cita'           => 'ForeignKey',
      'id_medicina'       => 'ForeignKey',
      'cantidad'          => 'Number',
      'receta_indicacion' => 'Text',
    );
  }
}

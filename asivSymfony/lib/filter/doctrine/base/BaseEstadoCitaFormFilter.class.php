<?php

/**
 * EstadoCita filter form base class.
 *
 * @package    asi2vSymfony
 * @subpackage filter
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEstadoCitaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre'         => new sfValidatorPass(array('required' => false)),
      'status'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('estado_cita_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoCita';
  }

  public function getFields()
  {
    return array(
      'id_estado_cita' => 'Number',
      'nombre'         => 'Text',
      'status'         => 'Number',
    );
  }
}

<?php

/**
 * CasaMedica filter form base class.
 *
 * @package    asi2vSymfony
 * @subpackage filter
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCasaMedicaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre_contacto' => new sfWidgetFormFilterInput(),
      'telefono'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_contrato'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'status'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'          => new sfValidatorPass(array('required' => false)),
      'nombre_contacto' => new sfValidatorPass(array('required' => false)),
      'telefono'        => new sfValidatorPass(array('required' => false)),
      'fecha_contrato'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'status'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('casa_medica_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CasaMedica';
  }

  public function getFields()
  {
    return array(
      'id_casa_medica'  => 'Number',
      'nombre'          => 'Text',
      'nombre_contacto' => 'Text',
      'telefono'        => 'Text',
      'fecha_contrato'  => 'Date',
      'status'          => 'Number',
    );
  }
}

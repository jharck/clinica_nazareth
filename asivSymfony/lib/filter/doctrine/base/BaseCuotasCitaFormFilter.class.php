<?php

/**
 * CuotasCita filter form base class.
 *
 * @package    asi2vSymfony
 * @subpackage filter
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCuotasCitaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_cita'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cita'), 'add_empty' => true)),
      'monto_donacion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_cita'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Cita'), 'column' => 'id_cita')),
      'monto_donacion' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('cuotas_cita_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CuotasCita';
  }

  public function getFields()
  {
    return array(
      'id_cuotas_cita' => 'Number',
      'id_cita'        => 'ForeignKey',
      'monto_donacion' => 'Number',
    );
  }
}

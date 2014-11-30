<?php

/**
 * CuotasCita form base class.
 *
 * @method CuotasCita getObject() Returns the current form's model object
 *
 * @package    asi2vSymfony
 * @subpackage form
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCuotasCitaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_cuotas_cita' => new sfWidgetFormInputHidden(),
      'id_cita'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cita'), 'add_empty' => false)),
      'monto_donacion' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_cuotas_cita' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_cuotas_cita')), 'empty_value' => $this->getObject()->get('id_cuotas_cita'), 'required' => false)),
      'id_cita'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Cita'))),
      'monto_donacion' => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cuotas_cita[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CuotasCita';
  }

}

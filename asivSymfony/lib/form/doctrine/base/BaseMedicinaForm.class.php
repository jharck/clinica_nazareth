<?php

/**
 * Medicina form base class.
 *
 * @method Medicina getObject() Returns the current form's model object
 *
 * @package    asi2vSymfony
 * @subpackage form
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMedicinaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_medicina'          => new sfWidgetFormInputHidden(),
      'nombre'               => new sfWidgetFormInputText(),
      'id_tipo_presentacion' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoPresentacion'), 'add_empty' => false)),
      'id_casa_medica'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CasaMedica'), 'add_empty' => false)),
      'limite_menor'         => new sfWidgetFormInputText(),
      'limite_normal'        => new sfWidgetFormInputText(),
      'limite_optimo'        => new sfWidgetFormInputText(),
      'precio_unidad'        => new sfWidgetFormInputText(),
      'existencia'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_medicina'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_medicina')), 'empty_value' => $this->getObject()->get('id_medicina'), 'required' => false)),
      'nombre'               => new sfValidatorString(array('max_length' => 45)),
      'id_tipo_presentacion' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoPresentacion'))),
      'id_casa_medica'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CasaMedica'))),
      'limite_menor'         => new sfValidatorInteger(),
      'limite_normal'        => new sfValidatorInteger(),
      'limite_optimo'        => new sfValidatorInteger(),
      'precio_unidad'        => new sfValidatorNumber(),
      'existencia'           => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('medicina[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Medicina';
  }

}

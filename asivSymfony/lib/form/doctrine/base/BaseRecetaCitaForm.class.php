<?php

/**
 * RecetaCita form base class.
 *
 * @method RecetaCita getObject() Returns the current form's model object
 *
 * @package    asi2vSymfony
 * @subpackage form
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRecetaCitaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_receta_cita'    => new sfWidgetFormInputHidden(),
      'id_cita'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cita'), 'add_empty' => false)),
      'id_medicina'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Medicina'), 'add_empty' => false)),
      'cantidad'          => new sfWidgetFormInputText(),
      'receta_indicacion' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_receta_cita'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_receta_cita')), 'empty_value' => $this->getObject()->get('id_receta_cita'), 'required' => false)),
      'id_cita'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Cita'))),
      'id_medicina'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Medicina'))),
      'cantidad'          => new sfValidatorInteger(array('required' => false)),
      'receta_indicacion' => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('receta_cita[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RecetaCita';
  }

}

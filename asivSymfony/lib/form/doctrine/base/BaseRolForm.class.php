<?php

/**
 * Rol form base class.
 *
 * @method Rol getObject() Returns the current form's model object
 *
 * @package    asi2vSymfony
 * @subpackage form
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRolForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_rol' => new sfWidgetFormInputHidden(),
      'nombre' => new sfWidgetFormInputText(),
      'status' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_rol' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_rol')), 'empty_value' => $this->getObject()->get('id_rol'), 'required' => false)),
      'nombre' => new sfValidatorString(array('max_length' => 45)),
      'status' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rol[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Rol';
  }

}

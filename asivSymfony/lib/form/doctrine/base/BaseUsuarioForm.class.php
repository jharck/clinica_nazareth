<?php

/**
 * Usuario form base class.
 *
 * @method Usuario getObject() Returns the current form's model object
 *
 * @package    asi2vSymfony
 * @subpackage form
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsuarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_usuario'     => new sfWidgetFormInputHidden(),
      'username'       => new sfWidgetFormInputText(),
      'email'          => new sfWidgetFormInputText(),
      'password'       => new sfWidgetFormInputText(),
      'nombre'         => new sfWidgetFormInputText(),
      'apellido'       => new sfWidgetFormInputText(),
      'genero'         => new sfWidgetFormInputText(),
      'ultimo_ingreso' => new sfWidgetFormDateTime(),
      'id_rol'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Rol'), 'add_empty' => true)),
      'status'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_usuario'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_usuario')), 'empty_value' => $this->getObject()->get('id_usuario'), 'required' => false)),
      'username'       => new sfValidatorString(array('max_length' => 45)),
      'email'          => new sfValidatorString(array('max_length' => 200)),
      'password'       => new sfValidatorString(array('max_length' => 200)),
      'nombre'         => new sfValidatorString(array('max_length' => 45)),
      'apellido'       => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'genero'         => new sfValidatorInteger(),
      'ultimo_ingreso' => new sfValidatorDateTime(array('required' => false)),
      'id_rol'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Rol'), 'required' => false)),
      'status'         => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

}

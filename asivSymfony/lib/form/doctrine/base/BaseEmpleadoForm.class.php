<?php

/**
 * Empleado form base class.
 *
 * @method Empleado getObject() Returns the current form's model object
 *
 * @package    asi2vSymfony
 * @subpackage form
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEmpleadoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_empleado'        => new sfWidgetFormInputHidden(),
      'id_usuario'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => false)),
      'id_posicion'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Posicion'), 'add_empty' => false)),
      'id_departamento'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Departamento'), 'add_empty' => false)),
      'fecha_contratacion' => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id_empleado'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_empleado')), 'empty_value' => $this->getObject()->get('id_empleado'), 'required' => false)),
      'id_usuario'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'))),
      'id_posicion'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Posicion'))),
      'id_departamento'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Departamento'))),
      'fecha_contratacion' => new sfValidatorDate(),
    ));

    $this->widgetSchema->setNameFormat('empleado[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Empleado';
  }

}

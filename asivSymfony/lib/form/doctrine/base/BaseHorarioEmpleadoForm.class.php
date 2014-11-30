<?php

/**
 * HorarioEmpleado form base class.
 *
 * @method HorarioEmpleado getObject() Returns the current form's model object
 *
 * @package    asi2vSymfony
 * @subpackage form
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseHorarioEmpleadoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_horario_empleado' => new sfWidgetFormInputHidden(),
      'id_empleado'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empleado'), 'add_empty' => false)),
      'hora_inicio'         => new sfWidgetFormTime(),
      'hora_fin'            => new sfWidgetFormTime(),
      'dia_horario'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_horario_empleado' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_horario_empleado')), 'empty_value' => $this->getObject()->get('id_horario_empleado'), 'required' => false)),
      'id_empleado'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empleado'))),
      'hora_inicio'         => new sfValidatorTime(),
      'hora_fin'            => new sfValidatorTime(),
      'dia_horario'         => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('horario_empleado[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HorarioEmpleado';
  }

}

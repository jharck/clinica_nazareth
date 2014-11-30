<?php

/**
 * PacienteTelefono filter form base class.
 *
 * @package    asi2vSymfony
 * @subpackage filter
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePacienteTelefonoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'telefono'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'               => new sfWidgetFormFilterInput(),
      'paciente_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Paciente'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'telefono'             => new sfValidatorPass(array('required' => false)),
      'status'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'paciente_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Paciente'), 'column' => 'id_paciente')),
    ));

    $this->widgetSchema->setNameFormat('paciente_telefono_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PacienteTelefono';
  }

  public function getFields()
  {
    return array(
      'id_paciente_telefono' => 'Number',
      'telefono'             => 'Text',
      'status'               => 'Number',
      'paciente_id'          => 'ForeignKey',
    );
  }
}

<?php

/**
 * CitaComentario filter form base class.
 *
 * @package    asi2vSymfony
 * @subpackage filter
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCitaComentarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_cita'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cita'), 'add_empty' => true)),
      'comentario'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_comentario'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_cita'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Cita'), 'column' => 'id_cita')),
      'comentario'         => new sfValidatorPass(array('required' => false)),
      'fecha_comentario'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('cita_comentario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CitaComentario';
  }

  public function getFields()
  {
    return array(
      'id_cita_comentario' => 'Number',
      'id_cita'            => 'ForeignKey',
      'comentario'         => 'Text',
      'fecha_comentario'   => 'Date',
    );
  }
}

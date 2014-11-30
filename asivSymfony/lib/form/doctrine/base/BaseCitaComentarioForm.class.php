<?php

/**
 * CitaComentario form base class.
 *
 * @method CitaComentario getObject() Returns the current form's model object
 *
 * @package    asi2vSymfony
 * @subpackage form
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCitaComentarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_cita_comentario' => new sfWidgetFormInputHidden(),
      'id_cita'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cita'), 'add_empty' => false)),
      'comentario'         => new sfWidgetFormTextarea(),
      'fecha_comentario'   => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id_cita_comentario' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_cita_comentario')), 'empty_value' => $this->getObject()->get('id_cita_comentario'), 'required' => false)),
      'id_cita'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Cita'))),
      'comentario'         => new sfValidatorString(),
      'fecha_comentario'   => new sfValidatorDate(),
    ));

    $this->widgetSchema->setNameFormat('cita_comentario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CitaComentario';
  }

}

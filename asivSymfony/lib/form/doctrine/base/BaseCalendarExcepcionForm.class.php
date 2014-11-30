<?php

/**
 * CalendarExcepcion form base class.
 *
 * @method CalendarExcepcion getObject() Returns the current form's model object
 *
 * @package    asi2vSymfony
 * @subpackage form
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCalendarExcepcionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_calendar_exception' => new sfWidgetFormInputHidden(),
      'inicio_excepcion'      => new sfWidgetFormTime(),
      'fin_excepcion'         => new sfWidgetFormTime(),
      'status'                => new sfWidgetFormInputText(),
      'fecha_excepcion'       => new sfWidgetFormDate(),
      'motivo_excepcion'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_calendar_exception' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_calendar_exception')), 'empty_value' => $this->getObject()->get('id_calendar_exception'), 'required' => false)),
      'inicio_excepcion'      => new sfValidatorTime(),
      'fin_excepcion'         => new sfValidatorTime(),
      'status'                => new sfValidatorInteger(array('required' => false)),
      'fecha_excepcion'       => new sfValidatorDate(array('required' => false)),
      'motivo_excepcion'      => new sfValidatorString(array('max_length' => 45)),
    ));

    $this->widgetSchema->setNameFormat('calendar_excepcion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CalendarExcepcion';
  }

}

<?php

/**
 * CalendarExcepcion filter form base class.
 *
 * @package    asi2vSymfony
 * @subpackage filter
 * @author     McCubo
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCalendarExcepcionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'inicio_excepcion'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fin_excepcion'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'                => new sfWidgetFormFilterInput(),
      'fecha_excepcion'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'motivo_excepcion'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'inicio_excepcion'      => new sfValidatorPass(array('required' => false)),
      'fin_excepcion'         => new sfValidatorPass(array('required' => false)),
      'status'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_excepcion'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'motivo_excepcion'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('calendar_excepcion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CalendarExcepcion';
  }

  public function getFields()
  {
    return array(
      'id_calendar_exception' => 'Number',
      'inicio_excepcion'      => 'Text',
      'fin_excepcion'         => 'Text',
      'status'                => 'Number',
      'fecha_excepcion'       => 'Date',
      'motivo_excepcion'      => 'Text',
    );
  }
}

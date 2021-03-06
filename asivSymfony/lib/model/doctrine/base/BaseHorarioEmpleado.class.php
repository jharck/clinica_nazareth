<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('HorarioEmpleado', 'doctrine');

/**
 * BaseHorarioEmpleado
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_horario_empleado
 * @property integer $id_empleado
 * @property time $hora_inicio
 * @property time $hora_fin
 * @property integer $dia_horario
 * @property Empleado $Empleado
 * 
 * @method integer         getIdHorarioEmpleado()   Returns the current record's "id_horario_empleado" value
 * @method integer         getIdEmpleado()          Returns the current record's "id_empleado" value
 * @method time            getHoraInicio()          Returns the current record's "hora_inicio" value
 * @method time            getHoraFin()             Returns the current record's "hora_fin" value
 * @method integer         getDiaHorario()          Returns the current record's "dia_horario" value
 * @method Empleado        getEmpleado()            Returns the current record's "Empleado" value
 * @method HorarioEmpleado setIdHorarioEmpleado()   Sets the current record's "id_horario_empleado" value
 * @method HorarioEmpleado setIdEmpleado()          Sets the current record's "id_empleado" value
 * @method HorarioEmpleado setHoraInicio()          Sets the current record's "hora_inicio" value
 * @method HorarioEmpleado setHoraFin()             Sets the current record's "hora_fin" value
 * @method HorarioEmpleado setDiaHorario()          Sets the current record's "dia_horario" value
 * @method HorarioEmpleado setEmpleado()            Sets the current record's "Empleado" value
 * 
 * @package    asi2vSymfony
 * @subpackage model
 * @author     McCubo
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseHorarioEmpleado extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('horario_empleado');
        $this->hasColumn('id_horario_empleado', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_empleado', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('hora_inicio', 'time', 25, array(
             'type' => 'time',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('hora_fin', 'time', 25, array(
             'type' => 'time',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('dia_horario', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Empleado', array(
             'local' => 'id_empleado',
             'foreign' => 'id_empleado'));
    }
}
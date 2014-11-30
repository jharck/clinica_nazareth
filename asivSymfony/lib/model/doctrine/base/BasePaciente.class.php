<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Paciente', 'doctrine');

/**
 * BasePaciente
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_paciente
 * @property string $tipo_sanguineo
 * @property date $fecha_nacimiento
 * @property integer $id_usuario
 * @property Usuario $Usuario
 * @property Doctrine_Collection $Cita
 * 
 * @method integer             getIdPaciente()       Returns the current record's "id_paciente" value
 * @method string              getTipoSanguineo()    Returns the current record's "tipo_sanguineo" value
 * @method date                getFechaNacimiento()  Returns the current record's "fecha_nacimiento" value
 * @method integer             getIdUsuario()        Returns the current record's "id_usuario" value
 * @method Usuario             getUsuario()          Returns the current record's "Usuario" value
 * @method Doctrine_Collection getCita()             Returns the current record's "Cita" collection
 * @method Paciente            setIdPaciente()       Sets the current record's "id_paciente" value
 * @method Paciente            setTipoSanguineo()    Sets the current record's "tipo_sanguineo" value
 * @method Paciente            setFechaNacimiento()  Sets the current record's "fecha_nacimiento" value
 * @method Paciente            setIdUsuario()        Sets the current record's "id_usuario" value
 * @method Paciente            setUsuario()          Sets the current record's "Usuario" value
 * @method Paciente            setCita()             Sets the current record's "Cita" collection
 * 
 * @package    asi2vSymfony
 * @subpackage model
 * @author     McCubo
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePaciente extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('paciente');
        $this->hasColumn('id_paciente', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('tipo_sanguineo', 'string', 10, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 10,
             ));
        $this->hasColumn('fecha_nacimiento', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('id_usuario', 'integer', 4, array(
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
        $this->hasOne('Usuario', array(
             'local' => 'id_usuario',
             'foreign' => 'id_usuario'));

        $this->hasMany('Cita', array(
             'local' => 'id_paciente',
             'foreign' => 'id_paciente'));
    }
}
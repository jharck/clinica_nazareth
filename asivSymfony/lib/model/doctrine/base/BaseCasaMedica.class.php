<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('CasaMedica', 'doctrine');

/**
 * BaseCasaMedica
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_casa_medica
 * @property string $nombre
 * @property string $nombre_contacto
 * @property string $telefono
 * @property date $fecha_contrato
 * @property integer $status
 * @property Doctrine_Collection $Medicina
 * 
 * @method integer             getIdCasaMedica()    Returns the current record's "id_casa_medica" value
 * @method string              getNombre()          Returns the current record's "nombre" value
 * @method string              getNombreContacto()  Returns the current record's "nombre_contacto" value
 * @method string              getTelefono()        Returns the current record's "telefono" value
 * @method date                getFechaContrato()   Returns the current record's "fecha_contrato" value
 * @method integer             getStatus()          Returns the current record's "status" value
 * @method Doctrine_Collection getMedicina()        Returns the current record's "Medicina" collection
 * @method CasaMedica          setIdCasaMedica()    Sets the current record's "id_casa_medica" value
 * @method CasaMedica          setNombre()          Sets the current record's "nombre" value
 * @method CasaMedica          setNombreContacto()  Sets the current record's "nombre_contacto" value
 * @method CasaMedica          setTelefono()        Sets the current record's "telefono" value
 * @method CasaMedica          setFechaContrato()   Sets the current record's "fecha_contrato" value
 * @method CasaMedica          setStatus()          Sets the current record's "status" value
 * @method CasaMedica          setMedicina()        Sets the current record's "Medicina" collection
 * 
 * @package    asi2vSymfony
 * @subpackage model
 * @author     McCubo
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCasaMedica extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('casa_medica');
        $this->hasColumn('id_casa_medica', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('nombre', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('nombre_contacto', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('telefono', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('fecha_contrato', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('status', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Medicina', array(
             'local' => 'id_casa_medica',
             'foreign' => 'id_casa_medica'));
    }
}
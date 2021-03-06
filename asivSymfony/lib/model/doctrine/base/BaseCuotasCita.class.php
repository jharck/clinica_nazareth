<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('CuotasCita', 'doctrine');

/**
 * BaseCuotasCita
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_cuotas_cita
 * @property integer $id_cita
 * @property decimal $monto_donacion
 * @property Cita $Cita
 * 
 * @method integer    getIdCuotasCita()   Returns the current record's "id_cuotas_cita" value
 * @method integer    getIdCita()         Returns the current record's "id_cita" value
 * @method decimal    getMontoDonacion()  Returns the current record's "monto_donacion" value
 * @method Cita       getCita()           Returns the current record's "Cita" value
 * @method CuotasCita setIdCuotasCita()   Sets the current record's "id_cuotas_cita" value
 * @method CuotasCita setIdCita()         Sets the current record's "id_cita" value
 * @method CuotasCita setMontoDonacion()  Sets the current record's "monto_donacion" value
 * @method CuotasCita setCita()           Sets the current record's "Cita" value
 * 
 * @package    asi2vSymfony
 * @subpackage model
 * @author     McCubo
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCuotasCita extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('cuotas_cita');
        $this->hasColumn('id_cuotas_cita', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_cita', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('monto_donacion', 'decimal', 6, array(
             'type' => 'decimal',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0.00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 6,
             'scale' => '2',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Cita', array(
             'local' => 'id_cita',
             'foreign' => 'id_cita'));
    }
}
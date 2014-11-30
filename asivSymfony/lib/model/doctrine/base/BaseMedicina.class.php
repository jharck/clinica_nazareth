<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Medicina', 'doctrine');

/**
 * BaseMedicina
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_medicina
 * @property string $nombre
 * @property integer $id_tipo_presentacion
 * @property integer $id_casa_medica
 * @property integer $limite_menor
 * @property integer $limite_normal
 * @property integer $limite_optimo
 * @property decimal $precio_unidad
 * @property integer $existencia
 * @property CasaMedica $CasaMedica
 * @property TipoPresentacion $TipoPresentacion
 * @property Doctrine_Collection $RecetaCita
 * 
 * @method integer             getIdMedicina()           Returns the current record's "id_medicina" value
 * @method string              getNombre()               Returns the current record's "nombre" value
 * @method integer             getIdTipoPresentacion()   Returns the current record's "id_tipo_presentacion" value
 * @method integer             getIdCasaMedica()         Returns the current record's "id_casa_medica" value
 * @method integer             getLimiteMenor()          Returns the current record's "limite_menor" value
 * @method integer             getLimiteNormal()         Returns the current record's "limite_normal" value
 * @method integer             getLimiteOptimo()         Returns the current record's "limite_optimo" value
 * @method decimal             getPrecioUnidad()         Returns the current record's "precio_unidad" value
 * @method integer             getExistencia()           Returns the current record's "existencia" value
 * @method CasaMedica          getCasaMedica()           Returns the current record's "CasaMedica" value
 * @method TipoPresentacion    getTipoPresentacion()     Returns the current record's "TipoPresentacion" value
 * @method Doctrine_Collection getRecetaCita()           Returns the current record's "RecetaCita" collection
 * @method Medicina            setIdMedicina()           Sets the current record's "id_medicina" value
 * @method Medicina            setNombre()               Sets the current record's "nombre" value
 * @method Medicina            setIdTipoPresentacion()   Sets the current record's "id_tipo_presentacion" value
 * @method Medicina            setIdCasaMedica()         Sets the current record's "id_casa_medica" value
 * @method Medicina            setLimiteMenor()          Sets the current record's "limite_menor" value
 * @method Medicina            setLimiteNormal()         Sets the current record's "limite_normal" value
 * @method Medicina            setLimiteOptimo()         Sets the current record's "limite_optimo" value
 * @method Medicina            setPrecioUnidad()         Sets the current record's "precio_unidad" value
 * @method Medicina            setExistencia()           Sets the current record's "existencia" value
 * @method Medicina            setCasaMedica()           Sets the current record's "CasaMedica" value
 * @method Medicina            setTipoPresentacion()     Sets the current record's "TipoPresentacion" value
 * @method Medicina            setRecetaCita()           Sets the current record's "RecetaCita" collection
 * 
 * @package    asi2vSymfony
 * @subpackage model
 * @author     McCubo
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMedicina extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('medicina');
        $this->hasColumn('id_medicina', 'integer', 4, array(
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
        $this->hasColumn('id_tipo_presentacion', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_casa_medica', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('limite_menor', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('limite_normal', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('limite_optimo', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('precio_unidad', 'decimal', 10, array(
             'type' => 'decimal',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 10,
             'scale' => '2',
             ));
        $this->hasColumn('existencia', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('CasaMedica', array(
             'local' => 'id_casa_medica',
             'foreign' => 'id_casa_medica'));

        $this->hasOne('TipoPresentacion', array(
             'local' => 'id_tipo_presentacion',
             'foreign' => 'id_tipo_presentacion'));

        $this->hasMany('RecetaCita', array(
             'local' => 'id_medicina',
             'foreign' => 'id_medicina'));
    }
}
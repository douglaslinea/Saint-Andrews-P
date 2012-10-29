<?php

/**
 * BaseImprensaCategoria
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $cod_id
 * @property string $txt_categoria
 * @property string $txt_permalink
 * @property integer $cod_relacao_idioma
 * @property integer $cod_idioma
 * @property WebsiteIdiomas $WebsiteIdiomas
 * @property Doctrine_Collection $ImprensaNoticias
 * @property Doctrine_Collection $ImprensaPressKits
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseImprensaCategoria extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('imprensaCategoria');
        $this->hasColumn('cod_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('txt_categoria', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_permalink', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('cod_relacao_idioma', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('cod_idioma', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('WebsiteIdiomas', array(
             'local' => 'cod_idioma',
             'foreign' => 'cod_id'));

        $this->hasMany('ImprensaNoticias', array(
             'local' => 'cod_id',
             'foreign' => 'cod_sala_imprensa'));

        $this->hasMany('ImprensaPressKits', array(
             'local' => 'cod_id',
             'foreign' => 'cod_id'));
    }
}
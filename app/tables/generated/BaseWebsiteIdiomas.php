<?php

/**
 * BaseWebsiteIdiomas
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $cod_id
 * @property string $txt_idioma
 * @property string $txt_meta
 * @property Doctrine_Collection $Ajuda
 * @property Doctrine_Collection $CadastroCV
 * @property Doctrine_Collection $CadastroFornecedor
 * @property Doctrine_Collection $CadastroNegocios
 * @property Doctrine_Collection $CadastroNews
 * @property Doctrine_Collection $CheckIn
 * @property Doctrine_Collection $ContatosHoteis
 * @property Doctrine_Collection $ContatosInstitucionais
 * @property Doctrine_Collection $Destinos
 * @property Doctrine_Collection $DestinosAtracoes
 * @property Doctrine_Collection $DestinosLinks
 * @property Doctrine_Collection $DownloadCategoria
 * @property Doctrine_Collection $Downloads
 * @property Doctrine_Collection $EventosCardapio
 * @property Doctrine_Collection $EventosOpcoesOrcamentos
 * @property Doctrine_Collection $EventosOrcamentos
 * @property Doctrine_Collection $EventosSalas
 * @property Doctrine_Collection $FormularioAgenciaEmpresa
 * @property Doctrine_Collection $FormularioContato
 * @property Doctrine_Collection $FormularioHospedagem
 * @property Doctrine_Collection $Hoteis
 * @property Doctrine_Collection $HoteisAcamodacoesCaracteristicas
 * @property Doctrine_Collection $HoteisAcomodacoes
 * @property Doctrine_Collection $HoteisDistancias
 * @property Doctrine_Collection $HoteisFacilidades
 * @property Doctrine_Collection $HoteisPromocoesPacotes
 * @property Doctrine_Collection $ImagemCategoria
 * @property Doctrine_Collection $Imagens
 * @property Doctrine_Collection $ImprensaCategoria
 * @property Doctrine_Collection $ImprensaFotos
 * @property Doctrine_Collection $ImprensaNoticias
 * @property Doctrine_Collection $ImprensaPressKits
 * @property Doctrine_Collection $ImprensaPressKitsCategorias
 * @property Doctrine_Collection $ImprensaVideo
 * @property Doctrine_Collection $MarcaGJP
 * @property Doctrine_Collection $Textos
 * @property Doctrine_Collection $TextosCategoria
 * @property Doctrine_Collection $TextosLayout
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseWebsiteIdiomas extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('websiteIdiomas');
        $this->hasColumn('cod_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('txt_idioma', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_meta', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Ajuda', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('CadastroCV', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('CadastroFornecedor', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('CadastroNegocios', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('CadastroNews', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('CheckIn', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('ContatosHoteis', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('ContatosInstitucionais', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('Destinos', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('DestinosAtracoes', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('DestinosLinks', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('DownloadCategoria', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('Downloads', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('EventosCardapio', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('EventosOpcoesOrcamentos', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('EventosOrcamentos', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('EventosSalas', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('FormularioAgenciaEmpresa', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('FormularioContato', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('FormularioHospedagem', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('Hoteis', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('HoteisAcamodacoesCaracteristicas', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('HoteisAcomodacoes', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('HoteisDistancias', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('HoteisFacilidades', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('HoteisPromocoesPacotes', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('ImagemCategoria', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('Imagens', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('ImprensaCategoria', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('ImprensaFotos', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('ImprensaNoticias', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('ImprensaPressKits', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('ImprensaPressKitsCategorias', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('ImprensaVideo', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('MarcaGJP', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('Textos', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('TextosCategoria', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('TextosLayout', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));
    }
}
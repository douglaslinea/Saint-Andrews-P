<?php

/**
 * CepCidades
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class CepCidades extends BaseCepCidades
{
public function getCidades($cod_uf){
		   try {
			
			//Prepara a query
			$query = DOCTRINE_QUERY::create()
			    ->select('*')
			   ->from('cepCidades')
			   ->where('cod_uf = ?',$cod_uf);
			  
			   //Retorna os dados conforme o idioma
			   return $query->execute()->toArray();
			   			
		} catch (Doctrine_Exception $e) {
			
			echo $e->getMessage();
		}		
	}
}
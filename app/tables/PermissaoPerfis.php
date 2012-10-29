<?php
class PermissaoPerfis extends BasePermissaoPerfis
{
	private $table_alias = "permissaoPerfis pp";
	
	public function MontaComboPerfisUsuarios()
	{
		try{
	    	return $this->getTable($this->table_alias)->findAll();	      	
	    }
	      
	    catch (Doctrine_Exception $e)
	    {
	    	echo $e->getMessage();
	    }
	}
	
	public function getPerfilById($id)
	{
	     //Retorna os dados do perfil
	     return $this->getTable($this->table_alias)->find($id);
	}
}
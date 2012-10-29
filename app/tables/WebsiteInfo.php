<?php
class WebsiteInfo extends BaseWebsiteInfo
{
	//Tabela do banco de dados
	private $table_alias = "websiteInfo as w";

	//Retorna as informações do Sistema
	public function getWebSiteInfo()
	{
		try
		{
			$query = Doctrine_Query::create()
		    ->select('*')
		    ->from($this->table_alias)
		    ->execute()
		    ->toArray();
		    
		    return $query[0];
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
}
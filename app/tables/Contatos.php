<?php
class Contatos extends BaseContatos
{
	private $table_alias = "contatos co";

	public function Buscaendereco()
	{
		try
		{
			//Executa a Query
			$query = Doctrine_Query::create()
			->select('co.*, cc.txt_cidade, cu.txt_uf, cu.cha_sigla')
			->from($this->table_alias)
			->innerJoin("co.CepCidades cc")
			->innerJoin("co.CepUf cu")
			->where("co.cod_idioma = ?", LANGUAGE)
			->execute()
			->toArray();

			//Retorna o resultado
			return $query[0];
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function SelectContatos()
	{
		try
		{
			//Executa a Query
			$query = Doctrine_Query::create()
			->select('co.*, cc.txt_cidade, cu.txt_uf')
			->from($this->table_alias)
			->innerJoin("co.CepCidades cc")
			->innerJoin("co.CepUf cu")
			->where("co.cod_idioma = ?", LANGUAGE)
			->execute()
			->toArray();

			//Retorna o resultado
			return $query[0];
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
}
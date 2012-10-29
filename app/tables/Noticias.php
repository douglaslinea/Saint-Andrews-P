<?php
class Noticias extends BaseNoticias
{
	private $table_alias = "noticias no";

	public function SelectNoticias()
	{
		try
		{
			//Executa a Query
			$query = Doctrine_Query::create()
			->select("no.*, DATE_FORMAT(no.dat_data, '%d/%m/%Y') dat_data")
			->from($this->table_alias)
			->where("no.cod_idioma = ?",LANGUAGE)
			->andWhere("no.cod_publicado = 1")
			->andWhere("no.dat_inicio_publicacao <= NOW()")
			->andWhere("no.dat_termino_publicacao >= NOW()")
			->orderBy("no.dat_data DESC")
			->execute()
			->toArray();
			
			//Retorna o resultado
			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function SelectNoticiasId($txt_permalink)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select("no.*, DATE_FORMAT(no.dat_data, '%d/%m/%Y') dat_data")
			->from($this->table_alias)
			->where("no.txt_permalink = ?",$txt_permalink)
			->andWhere("no.cod_idioma = ?", LANGUAGE)
			->andWhere("no.cod_publicado = 1")
			->andWhere("no.dat_inicio_publicacao <= NOW()")
			->andWhere("no.dat_termino_publicacao >= NOW()")
			->execute();
			
			//Verifica se houve resultado
			if($query->count() > 0)
			{
				$dados = $query->toArray();
				return $dados[0];
			}
			else
			{
				return false;
			}
		}
	 	catch (Doctrine_Exception $e)
	 	{
	 		echo $e->getMessage();
		}
	}
	
	public function SelectMaisNoticias($txt_permalink)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select("no.*, DATE_FORMAT(no.dat_data, '%d/%m/%Y') dat_data")
			->from($this->table_alias)
			->where("no.txt_permalink != ?",$txt_permalink)
			->andWhere("no.cod_idioma = ?", LANGUAGE)
			->andWhere("no.cod_publicado = 1")
			->andWhere("no.dat_inicio_publicacao <= NOW()")
			->andWhere("no.dat_termino_publicacao >= NOW()")
			->orderBy("no.dat_data DESC")
			->limit(5)
			->execute()
			->toArray();

			return $query;
		}
	 	catch (Doctrine_Exception $e)
	 	{
	 		echo $e->getMessage();
		}
	}
}
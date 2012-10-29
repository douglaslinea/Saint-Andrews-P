<?php
class Textos extends BaseTextos
{
	private $table_alias = 'textos te';
	
	public function SelectTexto()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->where("te.cod_idioma = ?", LANGUAGE)
			->execute()
			->toArray();
			
			return $query;
		}
	 	catch (Doctrine_Exception $e)
	 	{
	 		echo $e->getMessage();
		}
	}
	
	public function SelectTextoId($cod_id)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->where("te.cod_id = ?",$cod_id)
			->andWhere("te.cod_idioma = ?", LANGUAGE)
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

	public function getTexto($ids=null)
	{
		try
		{
			//Monta a Query
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->andWhere('te.cod_idioma = ?',LANGUAGE);
			
			//Verifica se pelo menos um id foi especificado, caso contrário todos os textos serão resgatados
			if(!is_null($ids)){
				
			   //Filtra pelos ids informados	
			   $query->whereIn('te.cod_relacao_idioma',$ids);
			}

			//Executa a Query
			$recordset = $query->execute();
			
			//Armazena os textos em um array indexado pelo Id do texto
			$ArrayTextos = array();
			
			//Percorre os textos e atribui ao Array resultante
			foreach($recordset as $dado)
			{
				//Atribui os dados ao Array
				$ArrayTextos[$dado['cod_relacao_idioma']] = array('txt_titulo1' => $dado['txt_titulo1'], 'txt_titulo2' => $dado['txt_titulo2'], 'txt_descricao' => $dado['txt_descricao']);				
			}

			//Retorna o array de textos
            return $ArrayTextos;
		}
		catch (Doctrine_Exception $e)
		{	
			 echo $e->getMessage();
		}	
	}
	
}
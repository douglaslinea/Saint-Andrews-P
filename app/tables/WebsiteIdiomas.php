<?php
class WebsiteIdiomas extends BaseWebsiteIdiomas
{
	private $table_alias = "websiteIdiomas wi";

	/**
	 * Enter description here ...
	 * @return multitype:
	 */
	public function VerificarIdioma($txt_meta)
	{
		try 
		{
			$query = Doctrine_Query::create()
			->select('cod_id,txt_meta')
			->from($this->table_alias)
			->where('wi.txt_meta = ?',strtolower(trim($txt_meta)))
			->limit('1')
			->execute();

			//Verifica se houve resultado
			if($query->count() > 0)
			{
				//Troca de idioma na sessão
				$_SESSION['language'] = $query[0]['cod_id'];
				//Sigla do Idioma
				$_SESSION['language_txt_meta'] = $query[0]['txt_meta'];
				//Retorna true
				return true; 
			}
			else
			{
				//Não foi encontrado - retorna false
				return false;
			}

			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	/**
	 * @param unknown_type $txt_meta
	 * @return boolean|unknown
	 */
	public function getMeta($cod_id)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('wi.txt_meta')
			->from($this->table_alias)
			->where('wi.cod_id = ?',$cod_id)
			->limit('1')
			->execute();
	
			//Verifica se houve resultado
			if($query->count() > 0)
			{	
				//Retorna o txt_meta do idioma
				return $query[0]['txt_meta'];
			}
			else
			{
				//Não foi encontrado - retorna false
				return false;
			}
	
			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
}
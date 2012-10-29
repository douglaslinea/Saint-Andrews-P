<?php
class PermissaoUsuario extends BasePermissaoUsuario
{
	private $table_alias = 'permissaoUsuario pu';

	/**
	 * Retorna o nome da tabela deste Model
	 */
	public function getTableName()
	{
		return $this->table_name;
	}

	public function PermissaoConcebida($id_permissao)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->leftjoin('pu.PermissaoGeral pg')
			->where('pu.cod_usuario = ?',$_SESSION['UserId'])
			->andWhere('pg.cod_id = ?',$id_permissao);
				
			//Verifica se houve resultado
			if($query->count() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		catch(Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function getPermissoesUsuario()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('cod_permissaoGeral')
			->from($this->table_alias)
			->where('pu.cod_usuario = ?',$_SESSION['UserId']);
				
			//Resultado da Query
			return $query->execute();

		}
		catch(Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
}
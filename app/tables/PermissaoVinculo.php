<?php
class PermissaoVinculo extends BasePermissaoVinculo
{
	private $table_alias = "permissaoVinculo pv";

	public function IncluirPermissaoVinculo($ca, $cod_perfil)
	{
		try
		{
			$this->cod_perfil = $cod_perfil;
			$this->cod_permissaoGeral = $ca;
			$this->save();
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}


	public function SelectPermissaoVinculoId($cod_perfil)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('pv.*, pg.*, fa.*, fc.*, pp.*')
			->from($this->table_alias)
			->innerJoin('pv.PermissaoGeral pg')
			->innerJoin('pg.FrameworkAcoes fa')
			->innerJoin('pg.FrameworkControllers fc')
			->innerJoin('pv.PermissaoPerfis pp')
			->where('pv.cod_perfil = ?',$cod_perfil)
			->execute()
			->toArray();
				

			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function EditarControlerAcao($cod_permissaoGeral, $cod_perfil)
	{
		try
		{
			$this->cod_perfil = $cod_perfil;
			$this->cod_permissaoGeral = $cod_permissaoGeral;
			$this->save();
				
			return true;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function SelectPermissaoVinculoCodPerfil($cod_perfil)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('pv.*')
			->from($this->table_alias)
			->where('pv.cod_perfil = ?',$cod_perfil)
			->execute()
			->toArray();
				
			return $query;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function DeleteControlerAcao($cod_perfil)
	{
		try
		{
			$parametros = $this->SelectPermissaoVinculoCodPerfil($cod_perfil);
				
			foreach ($parametros as $par)
			{
				$tabela = $this->getTable($table_alias)->find($par['cod_id']);

				//Verifica se o registro foi encontrado
				if($tabela)
				{
					//Removendo o registro
					$tabela->delete();
						
					//Salva no log de alterações
					TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $par['cod_id'] , 'X');
				}
			}
			//Retorna verdadeiro em caso de sucesso
			return true;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}


}
<?php
class Usuarios extends BaseUsuarios
{
	private $table_alias = 'usuarios us';
	
	public function getTableAlias()
	{
		//Retorna o alias da tabela
		return $this->table_alias;
	}
	
	/**
	 * Seleciona o usuário
	 * @param $txt_login: string
	 * @param $txt_senha: string
	 * @return multitype:|boolean
	 */
	public function SelectUsuario($txt_login, $txt_senha)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->where("us.txt_login = ?", $txt_login)
			->andWhere("us.txt_senha = ?", md5($txt_senha))
			->andWhere('us.cod_status = ?','2')
			->limit(1);

			//Verifica se o usuario tem acesso
			if($query->count() > 0)
			{
				$recordset = $query->execute()->toArray();
				$SessionHelper = HelperFactory::getInstance('session');
				$SessionHelper->createSession("UserId",$recordset[0]['cod_id']);
				$SessionHelper->createSession("UserName",$recordset[0]['txt_nome']);
				$SessionHelper->createSession("UserPerfil",$recordset[0]['cod_perfil']);
				
				return $query->execute()->toArray();
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
	
	public function SelectUsuarioLogin($txt_login)
	{
		try
		{			
			$query = Doctrine_Query::create()
			->select('*')
			->from($this->table_alias)
			->where("us.txt_login = ?", $txt_login)
			->andWhere('us.cod_status = ?','2')
			->limit(1);

			//Verifica se o usuario tem acesso
			if($query->count() > 0)
			{				
				return $query->execute()->toArray();
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
	
	/**
	 * Salva o Log do Usuário
	 * @param Integer $id_usuario
	 * @param String $data_hora
	 * @param String $ip_maquina
	 */
	public function SalvaLogUsuario($id_usuario,$data_hora,$ip_maquina)
	{
		//Instancia a tabela
		$TabelaLogsLogin = TableFactory::getInstance('LogsLogin');

		//Salva o log do usuário
		if($TabelaLogsLogin->SalvaLog($id_usuario,$data_hora,$ip_maquina))
   	    {
   	    	//Retorna Verdadeiro em caso de Sucesso
	   	    return true;
	   	}
	   	else
	   	{
	   		//Retorna falso em caso de erro
   	       	return false;
   	    }
   	}
   	
	/**
	 * Atualiza o registro de um Usuário no banco de dados
	 * @param Array $parametros
	 * @return boolean
	 */
	public function EditarUsuario($parametros)
	{
		try
		{			
			$tabela_logs_alteeracoes = TableFactory::getInstance('LogsAlteracoes');
			$tabela_logs_alteeracoes->logAlteracoes('usuarios', $parametros['cod_id'], 'A');
			
			//Pega a instancia da tabela
			$tabela = $this->getTable($this->table_alias)->find($parametros['cod_id']);
			//Seta os campos da tabela
			$this->setValues($tabela , $parametros, UPDATE);

			//Salva as alterações
			$tabela->save();
			
			return true;	
		}
		catch(Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
}
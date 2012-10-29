<?php
class LogsLogin extends BaseLogsLogin
{
	private $table_alias = "logsLogin as log";

	public function SalvaLog($id_usuario,$data_hora,$ip_maquina)
	{
		try
		{
			//Recebe os dados
			$this->cod_user = $id_usuario;
			$this->dat_login = $data_hora;
			$this->num_ip = $ip_maquina;

			//Salva o log no banco de dados
			$this->save();
			//Retorna verdadeiro em caso de sucesso
			return true;
				
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
}
<?php
class LogsAlteracoes extends BaseLogsAlteracoes
{
	public function logAlteracoes($txt_tabela, $cod_registro, $cha_acao)
	{
		try
		{
			//Recebe os dados
			$this->txt_tabela = $txt_tabela;
			$this->cod_registro = $cod_registro;
			$this->cha_acao = $cha_acao;
			$this->cod_usuario = $_SESSION['UserId'];
			$this->dat_data = date('Y-m-d H:i:s');
			$this->num_ip = $_SERVER['REMOTE_ADDR'];

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
<?php
class FaleConosco extends BaseFaleConosco
{
	private $table_alias = "faleConosco fc";
	
	public function incluirFaleConosco($parametros)
	{
		try
		{
			//Recebe os campos da tabela preenchidos
			$campos_tabela = $this->setValues($this, $parametros, INSERT);

			//Percorre os campos da tabela
			foreach($campos_tabela as $chave => $valor)
			{
				//Atribui os valores resgatados para a tabela em questão
				$this->$chave = $campos_tabela->$chave;
			}
			
			$this->cod_idioma = LANGUAGE;
			$this->dat_datahora = date("Y-m-d H-i-s");
			$this->num_ip = $_SERVER['REMOTE_ADDR'];
			
			//Salva o registro no banco de dados
			$this->save();
			
			//Salva no log de alterações
			TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');
						
			//Returna true em caso de sucesso
			return true;
		}
		catch (Doctrine_Exception $e)
		{
			echo $e->getMessage();
		}
	}
}
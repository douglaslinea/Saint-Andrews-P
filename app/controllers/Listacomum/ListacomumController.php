<?php
class ListacomumController extends ControllerBase
{
	/* Método Construtor do Controller(Obrigatório Conter em Todos os Controllers)
	 * Params String Action -> Ação a ser Executada Pelo Controller
	 * Atenção Demais Métodos do Controller Devem ser Privados
	 */
	public function ListacomumController($controller,$action,$urlparams)
	{
		//Inicializa os parâmetros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);
		//Envia o Controller para a action solicitada
		$this->$action();
	}
	
	private function index_action()
	{
	   	//Solicita os dados
		$resultado = $this->Delegator('ConcreteListacomum', 'SelectTextos');
		
		//Coloca o Helper na View
	   	$this->View()->assign('Helper',HelperFactory::getInstance());
			
		//Leva os dados para a view
		$this->View()->assign('dados_textos',$resultado);

		//Exibe a view
		$this->View()->display('index.php');
	}
	
	private function detalhes()
	{
		//pega o id do permalink
		$id = HelperFactory::getInstance()->getPermalink();

		//Valida o id verificando se ele é numérico e se tem algo no id
		if($id !== false && is_numeric($id))
		{
			//pega o permalink por inteiro
			$permalink = HelperFactory::getInstance()->getPermalink(true);

			//Seleciona os dados do id
			$resultado = $this->Delegator('ConcreteListacomum', 'SelectTextosId', array('id' => $permalink));
			
			//Verifica se tem dados
			if($resultado !== false)
			{
				//Coloca os dados na view
				$this->View()->assign('dados_textos',$resultado);
			}
			else
			{
				//Envia uma flag para a view indicando que os dados não foram encontrados
				$this->View()->assign('conteudo_nao_encontrado',true);
			}
		}
		else
		{
			//Envia uma flag para a view indicando que os dados não foram encontrados
			$this->View()->assign('conteudo_nao_encontrado',true);
		}
		
		//Exibe a view
		$this->View()->display('detalhes.php');
	}
}
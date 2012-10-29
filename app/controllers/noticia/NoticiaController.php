<?php
class NoticiaController extends ControllerBase
{
	/* M�todo Construtor do Controller(Obrigat�rio Conter em Todos os Controllers)
	 * Params String Action -> A��o a ser Executada Pelo Controller
	 * Aten��o Demais M�todos do Controller Devem ser Privados
	 */
	public function NoticiaController($controller,$action,$urlparams)
	{
		//Inicializa os par�metros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);
		//Envia o Controller para a action solicitada
		$this->$action();
	}

	private function index_action()
	{
		//Solicita os dados
		$resultado = $this->Delegator('ConcreteNoticia', 'SelectNoticias');
		
		//Coloca o Helper na View
	   	$this->View()->assign('Helper',HelperFactory::getInstance());
			
		//Leva os dados para a view
		$this->View()->assign('dados_noticias',$resultado);

		//Exibe a view
		$this->View()->display('index.php');
	}
	
	private function detalhes()
	{		
		//pega o id do permalink
		$id = HelperFactory::getInstance()->getPermalink();

		//Valida o id verificando se ele � num�rico e se tem algo no id
		if($id !== false && is_numeric($id))
		{
			//pega o permalink por inteiro
			$permalink = HelperFactory::getInstance()->getPermalink(true);
			
			//Seleciona os dados do id
			$resultado = $this->Delegator('ConcreteNoticia', 'SelectNoticiasId', array('permalink' => $permalink));
			
			//Verifica se tem dados
			if($resultado !== false)
			{
				//Coloca os dados na view
				$this->View()->assign('dados_noticias',$resultado);
				
				//Seleciona mais cinco dados tirando o j� selecionado
				$resultado_mais_dados = $this->Delegator('ConcreteNoticia', 'SelectMaisNoticias', array('permalink' => $permalink));
				
				//Coloca o Helper na View
	   			$this->View()->assign('Helper',HelperFactory::getInstance());
	   	
				//Coloca os dados na view
				$this->View()->assign('dados_noticias_mais_dados',$resultado_mais_dados);
			}
			else
			{
				//Envia uma flag para a view indicando que os dados n�o foram encontrados
				$this->View()->assign('conteudo_nao_encontrado',true);
			}
		}
		else
		{
			//Envia uma flag para a view indicando que os dados n�o foram encontrados
			$this->View()->assign('conteudo_nao_encontrado',true);
		}
		//Exibe a view
		$this->View()->display('detalhes.php');
	}
}
?>
<?
class LoginController extends ControllerBase
{
	/* Método Construtor do Controller(Obrigatório Conter em Todos os Controllers)
	 * Params String Action -> Ação a ser Executada Pelo Controller
	 * Atenção Demais Métodos do Controller Devem ser Privados
	 */
	public function LoginController($controller,$action,$urlparams)
	{	 
		//Inicializa os parâmetros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);
		//Envia o Controller para a action solicitada
		$this->$action();
	}

	/**
	 * Ações Iniciais ao Entrar na Index deste Controller
	 */
	private function index_action()
	{
		//Exibe a tela de login
		$this->View()->display('index.php');
	}

	private function logado()
	{	  
		//Verifica se o usuário enviou o formulário
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$login = $this->Delegator('ConcreteLogin', 'Logado', $this->getPost());
		}
	}
	
	private function esqueceu()
	{
		$this->Delegator('ConcreteLogin', 'esqueceuSenha', $this->getPost());
	}
}
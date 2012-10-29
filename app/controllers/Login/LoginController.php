<?
class LoginController extends ControllerBase
{
	/* M�todo Construtor do Controller(Obrigat�rio Conter em Todos os Controllers)
	 * Params String Action -> A��o a ser Executada Pelo Controller
	 * Aten��o Demais M�todos do Controller Devem ser Privados
	 */
	public function LoginController($controller,$action,$urlparams)
	{	 
		//Inicializa os par�metros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);
		//Envia o Controller para a action solicitada
		$this->$action();
	}

	/**
	 * A��es Iniciais ao Entrar na Index deste Controller
	 */
	private function index_action()
	{
		//Exibe a tela de login
		$this->View()->display('index.php');
	}

	private function logado()
	{	  
		//Verifica se o usu�rio enviou o formul�rio
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
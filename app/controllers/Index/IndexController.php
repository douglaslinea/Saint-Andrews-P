<?php
   /**
    * Controller Index
	* @author Linea Comunica��o - http://www.lineacom.com.br
    *
    */
   class IndexController extends ControllerBase{
   	
        /* M�todo Construtor do Controller(Obrigat�rio Conter em Todos os Controllers)
		 * Params String Action -> A��o a ser Executada Pelo Controller	 	
		 * Aten��o Demais M�todos do Controller Devem ser Privados 
		*/
		public function IndexController($controller,$action,$urlparams){
			 //Inicializa os par�metros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		/**
	    * A��es Iniciais ao Entrar na Index deste Controller
	    */
	   private function index_action(){ 		   		

		//Solicita os dados
		$dados_banners = $this->Delegator('IndexModel', 'SelectBanners');
        //Apresenta a view
        $this->getNoticia();
        $this->View()->assign('Helper', HelperFactory::getInstance());

		$this->View()->assign('dados_banners',$dados_banners);	
	   		//Apresenta a view
		   	$this->View()->display('index.php');
	   }
	   
		private function getNoticia() {
			$dados_noticias = $this->Delegator('IndexModel', 'SelectNoticias');
			$this->View()->assign('dados_noticias', $dados_noticias);
			return $dados_noticias;
		}

}
?>
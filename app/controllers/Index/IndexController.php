<?php
   /**
    * Controller Index
	* @author Linea Comunicaчуo - http://www.lineacom.com.br
    *
    */
   class IndexController extends ControllerBase{
   	
        /* Mщtodo Construtor do Controller(Obrigatѓrio Conter em Todos os Controllers)
		 * Params String Action -> Aчуo a ser Executada Pelo Controller	 	
		 * Atenчуo Demais Mщtodos do Controller Devem ser Privados 
		*/
		public function IndexController($controller,$action,$urlparams){
			 //Inicializa os parтmetros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		/**
	    * Aчѕes Iniciais ao Entrar na Index deste Controller
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
<?php
   /**
    * Controller de Cadastro
 	* @author Linea Comunicação com Design - http://www.lineacom.com.br
    *
    */
   class CadastroController extends ControllerBase{  		
   	
        /* Método Construtor do Controller(Obrigatório Conter em Todos os Controllers)
		 * Params String Action -> Ação a ser Executada Pelo Controller	 	
		 * Atenção Demais Métodos do Controller Devem ser Privados 
		*/
		public function CadastroController($controller,$action,$urlparams){
			 //Inicializa os parâmetros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		/**
	    * Ações Iniciais ao Entrar na Index deste Controller
	    */
	   private function index_action(){ 	   		
	   	
	   		$this->getEstados();
	   		
	   	    //Apresenta a view
		   	$this->View()->display('index.php');
	   }
	   
	   private function cadastrar(){
	   		//Verifica se a requisição é via ajax
			if(HelperFactory::getInstance()->isAjax()){
		   		//Solicita o cadastro dos dados
		   		$this->Delegator('ConcreteCadastro', 'cadastrar',$this->getPost());
	   		}
	   }
	   
   private function carregaEndereco(){
			
			//Instancia o Helper Principal
			$Helper = HelperFactory::getInstance();
			
			//Verifica se a requisição é ajax
			if($Helper->isAjax()){
							
					//Delega a tarefa ao Model
				    $this->Delegator('ConcreteCadastro' , 'carregaEndereco' , $this->getPost());
				    			
			}			
	}
	   
	   private function gerarCaptcha()
		{
			//envia os dados para o ConcreteFaleconosco
			return $this->Delegator("ConcreteCadastro","Captcha");
		}
	   
	   /**
	    * Enter description here ...
	    */
	   private function verificarEmail(){
	   
	   		//Verifica se a requisição é via AJAX
	   		if(HelperFactory::getInstance()->isAjax()){
	   		
	   			 //Solicita a verificação do E-mail
				 $this->Delegator('ConcreteCadastro', 'verificarEmail',$this->getPost());	   			 
	   		}	   
	   }
	   
   	  /**
	    * Enter description here ...
	    */
	   private function verificarCPF(){
	   
	   		//Verifica se a requisição é via AJAX
	   		if(HelperFactory::getInstance()->isAjax()){
	   		
	   			 //Solicita a verificação do E-mail
				 $this->Delegator('ConcreteCadastro', 'verificarCPF',$this->getPost());	   			 
	   		}	   
	   }
	   
	
   /**
	 * Solicita os dados dos estados e carrega na view
	 */
	private function getEstados(){

		//Solicita os dados dos idiomas
		$recordset = $this->Delegator('ConcreteCadastro', 'getEstados');
		
		//Associa os dados na view
		$this->View()->assign('estados',$recordset);
	}
	
	/**
	 * Busca as cidades conforme o estado selecionado
	 */
	private function buscaCidades($cod_uf=null){

		//Verifica o tipo de solicitação
		if(!is_null($cod_uf)){
				
			//Parametros da Requisição
			$parametros = array('data' => array('cod_uf' => $cod_uf));
				
		}else{
				
			//Parametros da Requisição
			$parametros = array('json_data' => true,'data' => (HelperFactory::getInstance()->isAjax() ? $this->getPost() : false));
		}

		//Verifica se os parametros foram informados corretamente
		if($parametros !== false){
				
			//Delega a tarefa ao Model
			$recordset = $this->Delegator('ConcreteCadastro', 'buscaCidades',$parametros);
				
			//Verifica o tipo de retorno
			if(!isset($parametros['json_data'])){

				//Associa os dados a view
				$this->View()->assign('cidades',$recordset);
			}
		}
	}
	   
	   
}
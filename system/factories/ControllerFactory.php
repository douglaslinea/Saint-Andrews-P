<?php
Abstract class ControllerFactory implements factory {

	/**
	 * Retorna a instancia do controller solicitado
	 * @param String $path
	 * @param String $ClassName
	 * @param Array $parametros posicao 0 -> Action 1 -> Parтmetros da URL
	 */
	public static function getInstance ($ClassName=null,$parametros=null,$path=null){

		//1А Passo - Tratamos o nome do Controller e da Action
		 
		//Coloca o nome do controller em caixa baixa, depois coloca a primeira letra maiuscula e remove o hifen da URL Amigсvel
		$ControllerName = $ClassName = ucfirst(strtolower(str_replace("-","",$ClassName)));
		
		//Adiciona o sufixo do Controller
		$ClassName .= "Controller";
		
		//Tirando a Action -> Removendo o hifen(-) proveniente da URL Amigсvel
		$parametros[0] = str_replace("-","",$parametros[0]);
		 
		//2А Passo - Caminho do Controller
		$controller_path = __ROOT__.CONTROLLERS . $ControllerName ."/".$ClassName.'.php';

		//3А Passo - Verifica se o arquivo do Controller Existe
		if(!is_file($controller_path)){
			
			//Exibe o erro 404
			HelperFactory::getInstance()->show404Error();
		}

		//4А Passo - Requisita o arquivo do Controller
		include_once($controller_path);

		//5А Passo - Verifica se a classe do Controller Existe
		if(!class_exists($ClassName)){
			
			//Exibe o erro 404
			HelperFactory::getInstance()->show404Error();
		}
		 
		//6А Passo - Verifica se a Aчуo Existe
		if(!method_exists($ClassName,$parametros[0])){
			
			//Exibe o erro 404
			HelperFactory::getInstance()->show404Error();
		}

		//7А Passo - Retorna a instancia da classe
		return new $ClassName($ControllerName,$parametros[0],$parametros[1]);
	}
}
?>
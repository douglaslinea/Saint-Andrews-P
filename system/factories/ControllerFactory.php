<?php
Abstract class ControllerFactory implements factory {

	/**
	 * Retorna a instancia do controller solicitado
	 * @param String $path
	 * @param String $ClassName
	 * @param Array $parametros posicao 0 -> Action 1 -> Par�metros da URL
	 */
	public static function getInstance ($ClassName=null,$parametros=null,$path=null){

		//1� Passo - Tratamos o nome do Controller e da Action
		 
		//Coloca o nome do controller em caixa baixa, depois coloca a primeira letra maiuscula e remove o hifen da URL Amig�vel
		$ControllerName = $ClassName = ucfirst(strtolower(str_replace("-","",$ClassName)));
		
		//Adiciona o sufixo do Controller
		$ClassName .= "Controller";
		
		//Tirando a Action -> Removendo o hifen(-) proveniente da URL Amig�vel
		$parametros[0] = str_replace("-","",$parametros[0]);
		 
		//2� Passo - Caminho do Controller
		$controller_path = __ROOT__.CONTROLLERS . $ControllerName ."/".$ClassName.'.php';

		//3� Passo - Verifica se o arquivo do Controller Existe
		if(!is_file($controller_path)){
			
			//Exibe o erro 404
			HelperFactory::getInstance()->show404Error();
		}

		//4� Passo - Requisita o arquivo do Controller
		include_once($controller_path);

		//5� Passo - Verifica se a classe do Controller Existe
		if(!class_exists($ClassName)){
			
			//Exibe o erro 404
			HelperFactory::getInstance()->show404Error();
		}
		 
		//6� Passo - Verifica se a A��o Existe
		if(!method_exists($ClassName,$parametros[0])){
			
			//Exibe o erro 404
			HelperFactory::getInstance()->show404Error();
		}

		//7� Passo - Retorna a instancia da classe
		return new $ClassName($ControllerName,$parametros[0],$parametros[1]);
	}
}
?>
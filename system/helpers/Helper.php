<?php
/** Helper Principal, armazena as principais funco�es auxiliares do sistema
 * @author Linea Comunica��o com Design - http://www.lineacom.com.br
 */
class Helper {

	/**
	 * Tratamento Contra SQL Injection
	 * @param multitype $var
	 * @param String $q
	 * @return string|multitype:
	 */
	public function antiInjection ($var,$q='') {
		//Verifica se o par�metro � um array
		if (!is_array($var)) {
			//identifico o tipo da vari�vel e trato a string
			switch (gettype($var)) {
				case 'double':
				case 'integer':
					$return = $var;
					break;
				case 'string':
					/* Verifico quantas v�rgulas tem na string.
					 Se for mais de uma trato como string normal,
					 caso contr�rio trato como String Num�rica */
					$temp = (substr_count($var,',')==1) ? str_replace(',','*;*',$var) : $var;
					//aqui eu verifico se existe valor para n�o adicionar aspas desnecessariamente
					if (!empty($temp)) {
						if (is_numeric(str_replace('*;*','.',$temp))) {
							$temp = str_replace('*;*','.',$temp);
							$return = strstr($temp,'.') ? floatval($temp) : intval($temp);
						} elseif (get_magic_quotes_gpc()) {
							//aqui eu verifico o parametro q para o caso de ser necess�rio utilizar LIKE com %
							$return = (empty($q)) ? '\''.str_replace('*;*',',',$temp).'\'' : '\'%'.str_replace('*;*',',',$temp).'%\'';
						} else {
							//aqui eu verifico o parametro q para o caso de ser necess�rio utilizar LIKE com %
							$return = (empty($q)) ? '\''.addslashes(str_replace('*;*',',',$temp)).'\'' : '\'%'.addslashes(str_replace('*;*',',',$temp)).'%\'';
						}
					} else {
						$return = $temp;
					}
					break;
				default:
					/*Abaixo eu coloquei uma msg de erro para poder tratar
					 antes de realizar a query caso seja enviado um valor
					 que nao condiz com nenhum dos tipos tratatos desta
					 fun��o. Por�m voc� pode usar o retorno como preferir*/
					$return = 'Erro: O Tipo da Vari�vel � Inv�lido!';
			}
			//Retorna o valor tipado
			return $return;
		} else {
			//Retorna os valores tipados de um array
			return array_map('antiInjection',$var);
		}
	}

	/**
	 * Trata Campo Vindo de uma Requisicao POST - Levando em conta os parametros informados
	 * @param String $campo
	 * @param Boolean $slashes
	 * @param Boolean $trim
	 * @param Array $replace -> posicao 0 devera conter o que deve ser procurado na string -> posicao 1 o que devera ser substituido
	 * Exemplo -> str_replace(array(";"),array(","),variavel); onde variavel significa qual variavel recebera a substituicao
	 * portanto o parametro replace devera ser um array com duas posicoes e ambas posicoes devem ser arrays conforme exemplo.
	 * @return String
	 */
	public function TrataValor($campo,$slashes=null,$trim=null,$replace=null,$decode=null){

		//Verifica se campo � um Array
		if(is_array($campo)){

			//Percorre o Array de campos
			foreach($campo as $chave => $valor){
					
				//Trata os valores
				$campo[$chave] = ($slashes == true ? addslashes($campo[$chave]) : $campo[$chave]);
				$campo[$chave] = ($trim == true ? trim($campo[$chave]) : $campo[$chave]);
				$campo[$chave] = ($replace != null && is_array($replace) ? str_replace($replace[0],$replace[1],$campo[$chave]) : $campo[$chave]);
				$campo[$chave] = ($decode == true ? utf8_decode($campo[$chave]) : $campo[$chave]);
			}

			//Se cair aqui ent�o foi passado um �nico campo
		}else{

			//Trata o campo
			$campo = ($slashes == true ? addslashes($campo) : $campo);
			$campo = ($trim == true ? trim($campo) : $campo);
			$campo = ($replace != null && is_array($replace) ? str_replace($replace[0],$replace[1],$campo) : $campo);
			$campo = ($utf8_decode == true ? utf8_decode($campo) : $campo);
		}

		//Retorna o par�metro tratado
		return $campo;
	}

	/** @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 * Valida uma acao vinda de um campo hidden(via POST)
	 * @param String $action
	 * @return boolean
	 */
	public function VerifyAction($action_name,$action_value)
	{
		if(strcmp($_POST[$action_name],$action_value) == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Exibe a tela de erro 404
	 */
	public function show404Error()
	{
		header("HTTP/1.0 404 Not Found"); //Envia um cabe�alho HTTP informando que a p�gina n�o foi encontrada n�o remova esta linha
		include_once("404.html"); //Redireciona para a pagina de erro 404
		exit(); //Trava a aplica��o por seguran�a
	}
	
	/**
	 * Retorna o permalink da URL
	 */
	public function getPermalink($full_permalink=false)
	{
		//Divide a URL
		$requested_permalink = explode('/', substr($_SERVER['REQUEST_URI'],URL_OFFSET),3);
	
		//Pega o permalink
		$requested_permalink = $requested_permalink[2];
	
		//Verifica a posi��o final da String
		$pos_final = strpos($requested_permalink,'/');
		$pos_final = ($pos_final != false ? $pos_final : strlen($requested_permalink));
	
		//Verifica se � necess�rio pegar o Permalink inteiro ex: produtos/categoria/editar ou somente o id ex: produtos/categoria/1-categoria_teste
		if($full_permalink)
		{
			//Recebe o permalink
			$permalink = substr($requested_permalink,0,$pos_final);
	
			//Valida o permalink
			if($permalink !== false){
	
				//Retorna o permalink
				return $permalink;
	
			}else{
	
				//Invoca o erro 404
				$this->show404Error();
			}
				
			//Retorna todo o permalink
			return ($permalink !== false ? $permalink : false);
	
		}
		else
		{
			//Permalink
			$permalink = explode('-', substr($requested_permalink,0,$pos_final),2);
	
			//Valida o permalink
			if(strlen(trim($permalink[0])) > 0){
	
				//Retorna o id encontrado no permalink
				return $permalink[0];
	
			}else{
	
				//Invoca o erro 404
				$this->show404Error();
			}
		}
	}

	/** @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 * Remove os Acentos de uma String e converte para a realidade HTML
	 * @param String $str
	 * @return String
	 */
	public function TirarAcentos($str)
	{
		$acentos = array(
		'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
		'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
		'C' => '/&Ccedil;/',
		'c' => '/&ccedil;/',
		'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
		'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
		'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
		'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
		'N' => '/&Ntilde;/',
		'n' => '/&ntilde;/',
		'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
		'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
		'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
		'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
		'Y' => '/&Yacute;/',
		'y' => '/&yacute;|&yuml;/',
		'a.' => '/&ordf;/',
		'o.' => '/&ordm;/');	

		return preg_replace($acentos,array_keys($acentos),htmlentities($str,ENT_NOQUOTES,"UTF-8"));
	}

	/** @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 * Remove os Acentos de uma String
	 * @param String $str
	 * @return String
	 */
	public function RemoverAcentos($var)
	{
		$var = ereg_replace("[����]","A",$var);
		$var = ereg_replace("[����]","a",$var);
		$var = ereg_replace("[���]","E",$var);
		$var = ereg_replace("[���]","e",$var);
		$var = ereg_replace("[����]","O",$var);
		$var = ereg_replace("[�����]","o",$var);
		$var = ereg_replace("[���]","U",$var);
		$var = ereg_replace("[���]","u",$var);
		$var = str_replace("�","C",$var);
		$var = str_replace("�","c",$var);
			
		return $var;
	}

	/** @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 * Gera uma Senha com base em uma forca
	 * @param int $tamanho
	 * @param int $forca
	 * @return string
	 */
	public function gerarSenha($tamanho=9, $forca=0)
	{
		$vogais = 'aeuy';

		$consoantes = 'bdghjmnpqrstvz';

		if ($forca >= 1)
		{
			$consoantes .= 'BDGHJLMNPQRSTVWXZ';
		}

		if ($forca >= 2)
		{
			$vogais .= "AEUY";
		}

		if ($forca >= 4)
		{
			$consoantes .= '23456789';
		}

		if ($forca >= 8 )
		{
			$vogais .= '@#$%';
		}
		
		$senha = '';
		$alt = time() % 2;

		for ($i = 0; $i < $tamanho; $i++)
		{
			if ($alt == 1)
			{
				$senha .= $consoantes[(rand() % strlen($consoantes))];
				$alt = 0;
			}
			else
			{
				$senha .= $vogais[(rand() % strlen($vogais))];
				$alt = 1;
			}
		}
		return $senha;
	}

	/** @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 * Retorna a data formatada de acordo com o tipo informado
	 * @param String $data
	 * @param String $tipo
	 * @throws Exception
	 * @return string
	 */
	public function FormataData($data,$tipo)
	{
		//Passamos o formato para caixa baixa(afim de padronizar o parametro)
		$tipo = strtolower($tipo);

		//Verificamos o formato solicitado e formatamos de acordo
		if($tipo == "usa")
		{
			$data = implode("-",array_reverse(explode("/",$data)));
		}
		else if($tipo == "br")
		{
			$data = implode("/",array_reverse(explode("-",$data)));
		}
		else
		{
			throw new Exception("Parametro Invalido - FormataData - Esperado tipo br ou usa");
		}
		return $data;
	}

	/** @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 * Retorna a data formatada de acordo com o tipo informado
	 * @param String $data
	 * @param String $tipo
	 * @throws Exception
	 * @return string
	 */
	public function FormataDataHora($data,$tipo)
	{
		//Passamos o formato para caixa baixa(afim de padronizar o parametro)
		$tipo = strtolower($tipo);
		//Remove os espacos em branco da data
		$data_hora = trim($data);
		//Extrai a data
		$data = substr($data, 0,10);
		//Extrai a hora
		$hora = substr($data_hora,10);

		//Verificamos o formato solicitado e formatamos de acordo
		if($tipo == "usa")
		{
			$data = implode("-",array_reverse(explode("/",$data)));
		}
		else if($tipo == "br")
		{
			$data = implode("/",array_reverse(explode("-",$data)));
		}
		else
		{
			throw  new Exception("Parametro Invalido - FormataData - Esperado tipo br ou usa");
		}
		return $data." ".$hora;
	}


	/** @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 * Verifica se uma Data e valida de acordo com o formato especificado
	 * @param String $data
	 * @param String $tipo
	 * @throws Exception
	 * @return boolean
	 */
	public function ChecarData($data,$tipo)
	{
		//Passamos o formato para caixa baixa(afim de padronizar o parametro)
		$tipo = strtolower($tipo);

		//Verificamos o formato solicitado e formatamos de acordo
		if($tipo == "usa")
		{
			$data = explode("-",$data);
			$month = $data[1];
			$day = $data[2];
			$year = $data[0];
		}
		else if($tipo == "br")
		{
			$data = explode("/",$data);
			$month = $data[1];
			$day = $data[0];
			$year = $data[2];
		}
		else
		{
			throw  new Exception("Parametro Invalido - FormataData - Esperado tipo br ou usa");
		}

		//Verificamos se a data e valida
		if(@checkdate($month, $day, $year))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/** @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 *  Verifica se um hor�rio � v�lido
	 *  @param String $horario
	 *  @return boolean
	 */
	public function ChecarHora($horario)
	{
		//Verifica se o hor�rio � v�lido
		if(strtotime($horario))
		{
			//Retorna true em caso de sucesso
			return true;
				
		}
		else
		{
			//Retorna false em caso de erro
			return false;
		}
	}

	/** @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 *  Verifica se um datetime � v�lido
	 *  @param String $horario
	 *  @return boolean
	 */
	public function ChecarDataHora($timestamp)
	{
		//Remove os espacos em branco da data
		$datahora = trim($timestamp);
		//Extrai a data
		$data = substr($datahora, 0,10);
		//Extrai a hora
		$hora = substr($datahora,10);

		//Valida o timestamp
		if($this->ChecarData($data, 'br') && $this->ChecarHora($hora))
		{		
			return true;		
		}
		else
		{		
			return false;
		}
	}
	
	/**
	 * Formata o cep vindo do banco por exemplo
	 * @param int $cep
	 * @return string
	 */
	public function FormataCEP($cep)
	{
		$cep = preg_replace('/\D/', "", $cep);
		if (strlen($cep) == 8)
		{
			return $cep[0].$cep[1].$cep[2].$cep[3].$cep[4].'-'.$cep[5].$cep[6].$cep[7];
		}
	}

	/** @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 * Coloca um numero no formato R$ 0,00
	 * @param Double/Float $valor
	 * @return Float
	 */
	public function formatoMoeda($valor)
	{
		//Procuramos se o valor monetário tem casa de milhar
		if(strstr($valor,"."))
		{
			$ponto_milhar = "";
		}
		else
		{
			$ponto_milhar = ".";
		}

		$retorno = "R$ ".number_format($valor,"2",",",$ponto_milhar);
		return $retorno;
	}

	/** @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 * Verifica se uma requisicao foi Realizada via AJAX
	 * @return boolean
	 */
	public function isAjax()
	{
		if($_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest")
		{
			return true;
		}
	}

	/** @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 * Retorna uma Instancia da Classe PDO
	 */
	public function getPDOInstance()
	{	 
		return new PDO(SGBD.":host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASS );
	}
	
	/** @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 * Remove tudo que n�o � n�mero
	 * @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 */
	public function soNumero($parametro)
	{
		//Remove o que n�o � digito
		$parametro = preg_replace('/\D/', "", $parametro);
		
		//Retorna o resultado
		return $parametro;
	}

	/** @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 * Formato um numero para ser gravado no banco de dados
	 * @param Double/Int/Float $number
	 * @return mixed
	 */
	public function SqlNumero($number)
	{
		//Verificamos se existe R$ no parametro
		if(strstr($number,"R$") != FALSE)
		{
			$number = trim(str_replace("R$","",$number));
		}
			
		$number = str_replace(".","",$number);
		$number = str_replace(",",".",$number);
		return $number;
	}

	/** @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 * Coloca um numero no formato 0,00
	 * @param Double/Float $number
	 * @return Double/Float
	 */
	public function Number($number)
	{		
		//Verificamos se existe R$ no parametro
		if(strstr($number,"R$") != FALSE)
		{
			$number = trim(str_replace("R$","",$number));
		}
			
		$number = number_format($number,2,",","");
		return $number;
	}
	
	/**
	 * @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 * @param $string: string
	 * @param $fim: int
	 * @return string|unknown
	 */
	function reduzir_string($string, $fim)
	{
		if(strlen($string) > $fim)
		{
			$aux = substr($string, 0,$fim);
			$val = strrpos($aux," "); //busca o ultimo caracter com vazio
			$stringlimitada = substr($string,0,$val).'...';
			return $stringlimitada;
		}
		else
		{
			return $string;
		}
	}

	/** 
	 * Retorna uma mascara de acordo com o par�metro informado
	 * @author Linea Comunica��o com Design - http://www.lineacom.com.br
	 */
	public function mask($val,$mask){

		$maskared = '';
		$k = 0;

		for($i = 0; $i<=strlen($mask)-1; $i++)

		{

		 if($mask[$i] == '#')

		 {

		 	if(isset($val[$k]))
		 	$maskared .= $val[$k++];
		 }
		 else
		 {
		 	if(isset($mask[$i]))

		 	$maskared .= $mask[$i];
		 }
		}
		return $maskared;
	}

	/**
	 * Extrai o valor do atributo SRC do Iframe do google MAPS
	 * @param unknown_type $mapIframe
	 */
	public function getMapSRC($mapIframe){

		//Pos inicial
		$initialpos = strpos($mapIframe,'src="')+5;

		//Extrai o src
		$mapIframe = substr($mapIframe,$initialpos);

		//pos final
		$finalpos =   strpos($mapIframe,'">');

		//Extrai o src
		$mapIframe = substr($mapIframe,0,$finalpos);

		//Retorna o SRC
		return htmlentities($mapIframe);
	}		
}
?>
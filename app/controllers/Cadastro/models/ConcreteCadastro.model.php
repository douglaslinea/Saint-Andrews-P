<?php
class ConcreteCadastro extends Cadastro
{
	private function ConfiguraEmail(mailHelper $MailHelper)
	{
		//Dados do SMTP
		$MailHelper->IsSMTP();
		$MailHelper->Port = 587;
		$MailHelper->Mailer = 'smtp';
		$MailHelper->setHost(EMAIL_HOST);
		$MailHelper->setSMTPAuth(true);
		$MailHelper->setUserName(USERNAME_HOST);
		$MailHelper->setPassword(PASSWORD_HOST);
		$MailHelper->setFromName('Demo Admin');//$dados_website[0]['txt_default_title']
		$MailHelper->setFrom(USERNAME_HOST);
		$MailHelper->setIdioma('br','phpMailer/language/');
		$MailHelper->setWrap(50);
		$MailHelper->setIsHtml(true);

		//Retorna o objeto Mail
		return $MailHelper;
	}

	public function buscaCidades($parametros){

		//instanciar a tabela de ruas
		$TabelaCidades = TableFactory::getInstance('CepCidades');

		//Busco o endereço pelo CEP
		$recordset = $TabelaCidades->getCidades($parametros['data']['cod_uf']);

		//Verifica se a requisição esta sendo feita via JSON
		if(isset($parametros['json_data'])){

			//Inclui a biblioteca do JSON
			LibFactory::getInstance(null,null,'Zend/Json.php');

			//Resposta do JSON
			$json_response = Zend_Json::encode($recordset);

			//Enviamos a resposta ao JSON
			echo $json_response;

			//Retorna true em caso de sucesso
			return true;
		}else{

			//Caso contrário então apenas retorna o resultado da consulta
			return $recordset;
		}
	}

	/**
	 * Retorna os dados dos estados
	 */
	public function getEstados(){

		//Retorna os dados dos Contatoss
		return TableFactory::getInstance('CepUf')->getEstados();
	}

	public function carregaEndereco($parametros){

		//instanciar a tabela de ruas
		$TabelaRuas = TableFactory::getInstance('CepRuas');

		//Busco o endereço pelo CEP
		$recordset = $TabelaRuas->SelectCep(str_replace("-", "", $parametros['txt_cep']));

		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Verifica se houve resultado
		if($recordset !== false){

			//Resposta do JSON
			$json_response = Zend_Json::encode(array($recordset[0]['txt_rua'],
			$recordset[0]['CepBairros']['txt_bairro'],
			$recordset[0]['CepBairros']['CepCidades']['cod_id'],
			$recordset[0]['CepBairros']['CepCidades']['CepUf']['cod_id']));
				
		}else{

			//Não houve resultado, é enviado um array vazio
			$json_response = Zend_Json::encode(array());
		}

		//Enviamos a resposta ao JSON
		echo $json_response;
	}

	public function cadastrar($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o Helper Principal
		$Helper = HelperFactory::getInstance();
		
		//Arruma a codificação mantendo os acentos
		$parametros = $Helper->TrataValor($parametros,null,null,null,true);

		//Instancia a Classe de Validação do Formulário
		$ComponenteValidacao = getComponent('validacoes/validacao_cadastro','ValidacaoCadastro');

		//Executa a validacao
		$resultado_validacao = $ComponenteValidacao->Validar($parametros);

		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0)
		{
			//Formata o campo data antes de gravar no banco de dados
			$parametros['dat_nascimento'] = $Helper->FormataData($parametros['dat_nascimento'],'usa');
			$parametros['dat_cadastro'] = date("Y-m-d H:i:s");
			 
			//chama metodo que manda mail para o usuaário
			$this->MandaEmailUsuario($parametros);
			//Manda email para o administrador
			$this->MandaEmailAdmin($parametros);
			
			//Cadastra os dados no banco
			parent::ExecuteCadastrar($parametros);
			
			//Envia sinal de sucesso ao JSON
			echo Zend_Json::encode(array('1'));
		}
		else
		{
			//Envia os erros ao JSON
			echo Zend_Json::encode($resultado_validacao);
		}
	}

	public function Captcha()
	{
		$helper = HelperFactory::getInstance('captcha');

		//informa(Imagem de fundo do captcha, a fonte que será usada, toral caracteres, tamanho da fonte, angulo)
		$helper->CreateCaptcha(DEFAULT_CAPTCHA_IMAGE,DEFAULT_CAPTCHA_FONT,6, 20, 10);
	}

	
	/**
	 * Verifica o email
	 * @param unknown_type $parametros
	 */
	public function verificarEmail($parametros)
	{
		//Instancia a tabela de Textos Layout e retorna os textos cadastrados com base no idioma selecionado
		$TextosLayout = TableFactory::getInstance('TextosLayout')->getLayoutTexts();
		
		//Pega os textos de acordo com o idioma selecionado
		$TextosLayout2 = $textosLayout->getLayoutTexts();
		
		//Requisita a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Array com os parâmetros de resposta
		$array_resposta = array('txt_parametro' => array('mensagem' => "",'id_element' => "div_txt_email"));

		//Verifica se o email foi preenchido
		if(strlen(trim($parametros['txt_parametro'])) > 0){
			 
			//valida o Email
			if(filter_var($parametros['txt_parametro'], FILTER_VALIDATE_EMAIL)){
				 
				//Verifica se o E-mail ja existe
				if($this->verificaExistenciaEmail($parametros['txt_parametro'])){
										
					//Atribui a mensagem
					$array_resposta['txt_parametro']['mensagem'] = $TextosLayout2[15];

				}else{

					//Atribui a mensagem
					$array_resposta['txt_parametro']['mensagem'] = $TextosLayout2[16];
				}

			}else{

				//Erro na validação
				$array_resposta['txt_parametro']['mensagem'] = $TextosLayout2[17];
			}

		}else{

			//Erro na validação
			$array_resposta['txt_parametro']['mensagem'] = $TextosLayout2[5];
		}


		//Formata para o JSON
		$json_response = Zend_Json::encode($array_resposta);

		//Envia a resposta para o JSON
		echo $json_response;
	}

	/**
	 * Enter description here ...
	 */
	public function verificarCPF($parametros){

		//Remove tudo que não é digito
		$parametros['txt_parametro'] = HelperFactory::getInstance()->soNumero($parametros['txt_parametro']);

		//Instancia a tabela de Textos Layout e retorna os textos cadastrados com base no idioma selecionado
		$TextosLayout = TableFactory::getInstance('TextosLayout')->getLayoutTexts();

		//Pega os textos de acordo com o idioma selecionado
		$TextosLayout2 = $textosLayout->getLayoutTexts();
		
		//Requisita a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Array com os parâmetros de resposta
		$array_resposta = array('txt_parametro' => array('mensagem' => "",'id_element' => "div_txt_cpf"));

		//Verifica se o email foi preenchido
		if(strlen(trim($parametros['txt_parametro'])) > 0){
			 
			//Instancia a Classe de Validação
			$ClasseValidacao = LibFactory::getInstance('Validation',null,'validation/Validation.class.php');

			//Valida o CPF
			$ClasseValidacao->set($parametros['txt_parametro'],null,null)->cpf();
				
			//Verifica se houve erro na validação
			if(count($ClasseValidacao->getErrors()) == 0){
				 
				//Verifica se o E-mail ja existe
				if(TableFactory::getInstance('Curriculo')->verificaExistenciaCPF($parametros['txt_parametro'])){
						
					//Atribui a mensagem
					$array_resposta['txt_parametro']['mensagem'] = $TextosLayout2[18];

				}

			}else{

				//Erro na validação
				$array_resposta['txt_parametro']['mensagem'] = $TextosLayout2[19];
			}

		}else{

			//Erro na validação
			$array_resposta['txt_parametro']['mensagem'] = $TextosLayout2[20];
		}


		//Formata para o JSON
		$json_response = Zend_Json::encode($array_resposta);

		//Envia a resposta para o JSON
		echo $json_response;
	}

	/**
	 * Envia um Email para o usuário
	 * @param Array $parametros
	 * @param mailHelper $MailHelper
	 * @return boolean
	 */
	public function MandaEmailUsuario($parametros)
	{
		//Instancia o Helper Principal
		$Helper = HelperFactory::getInstance();
		//Instancia o Helper Mail
		$MailHelper = HelperFactory::getInstance('mail');
		//Configura o Helper Mail
		$MailHelper = $this->ConfiguraEmail($MailHelper);

		//Monta o corpo do Email
		$mail_body = '<font face="Arial, Helvetica, sans-serif" color="#000000" size="2"><b>Confirmação de envio de formulário pelo Website - Cadastre-se</b><br/><br/>';
		 
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora = gmdate("H:i:s", $time);
		$data = date('d/m/Y');

		$mail_body .= "Enviado em  $data - às $hora.<br/><br/>";
		$mail_body .= "Agradecemos seu cadastro. Abaixo os dados enviados por você:<br/><br/>";
		$mail_body .= "<b>Nome:</b> ".$parametros['txt_nome']. "<br/>";
		$mail_body .= "<b>Profissão:</b> ".$parametros['txt_profissao']. "<br/>";
		$mail_body .= "<b>Data de nascimento:</b> ".$Helper->FormataData($parametros['dat_nascimento'],'br'). "<br/>";
		$mail_body .= "<b>Sexo:</b> ".$parametros['cha_sexo']. "<br/>";
		$mail_body .= "<b>Endereço:</b> ".$parametros['txt_endereco']. "<br/>";
		$mail_body .= "<b>Bairro:</b> ".$parametros['txt_bairro']. "<br/>";
		$mail_body .= "<b>CEP:</b> ".$parametros['txt_cep']. "<br/>";
		$mail_body .= "<b>Cidade:</b> ".$parametros['txt_cidade']. "<br/>";
		$mail_body .= "<b>Estado:</b> ".$parametros['cha_estado']. "<br/>";
		$mail_body .= "<b>Telefone:</b> ".$parametros['txt_telefone']. "<br/>";
		$mail_body .= "<b>E-mail:</b> ".$parametros['txt_email']. "<br/>";
		$mail_body .= "<b>Quero receber newsletter ?</b> ".($parametros['chk_newsletter'] == 'S' ? 'Sim' : 'Não'). "<br/>";
		$mail_body .= "<b>Procedimento de seu interesse:</b> ".$parametros['txt_comentario']. "<br/></font>";

		//Seta o corpo do E-mail
		$MailHelper->setBody($mail_body);

		//Seta o Email
		$MailHelper->setAddress($parametros['txt_email']);

		//Seta o assunto do E-mail
		$MailHelper->setSubject('Confirmação de envio de formulário pelo Website - Cadastre-se');

		//Envia o E-mail
		return $MailHelper->sendEmail();
	}

	/**
	 * Envia um Email para o Admin
	 * @param Array $parametros
	 * @param mailHelper $MailHelper
	 * @return boolean
	 */
	public function MandaEmailAdmin($parametros)
	{
		//Instancia o Helper Principal
		$Helper = HelperFactory::getInstance();
		//Instancia o Helper Mail
		$MailHelper = HelperFactory::getInstance('mail');
		//Configura o Helper Mail
		$MailHelper = $this->ConfiguraEmail($MailHelper);
			
		//Monta o corpo do Email
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora = gmdate("H:i:s", $time);
		$data = date('d/m/Y');
			
		//Corpo da mensagem
		$mail_body = '<font face="Arial, Helvetica, sans-serif" color="#000000" size="2"><b>Novo formulário recebido no Website - Cadastre-se</b><br/><br/>';
		$mail_body.= "Enviado em  ".$data." - às ".$hora.".<br/><br/>";

		$mail_body .= "<b>Nome:</b> ".$parametros['txt_nome']. "<br/>";
		$mail_body .= "<b>Profissão:</b> ".$parametros['txt_profissao']. "<br/>";
		$mail_body .= "<b>Data de nascimento:</b> ".$Helper->FormataData($parametros['dat_nascimento'],'br'). "<br/>";
		$mail_body .= "<b>Sexo:</b> ".$parametros['cha_sexo']. "<br/>";
		$mail_body .= "<b>Endereço:</b> ".$parametros['txt_endereco']. "<br/>";
		$mail_body .= "<b>Bairro:</b> ".$parametros['txt_bairro']. "<br/>";
		$mail_body .= "<b>CEP:</b> ".$parametros['txt_cep']. "<br/>";
		$mail_body .= "<b>Cidade:</b> ".$parametros['txt_cidade']. "<br/>";
		$mail_body .= "<b>Estado:</b> ".$parametros['cha_estado']. "<br/>";
		$mail_body .= "<b>Telefone:</b> ".$parametros['txt_telefone']. "<br/>";
		$mail_body .= "<b>E-mail:</b> ".$parametros['txt_email']. "<br/>";
		$mail_body .= "<b>Quero receber newsletter ?</b> ".($parametros['chk_newsletter'] == 'S' ? 'Sim' : 'Não'). "<br/>";
		$mail_body .= "<b>Procedimento de seu interesse:</b> ".$parametros['txt_comentario']. "<br/></font>";

		//Instancia a tabela de contatos
		$TabelaEmailsFormularios = TableFactory::getInstance('EmailsFormularios');

		//Dados da tabela contatos
		$dados_tabela_EmailsFormularios = $TabelaEmailsFormularios->BuscaDados('1');

		//Seta o Email
		$MailHelper->setAddress($dados_tabela_EmailsFormularios['txt_email']);
		 
		//Seta o corpo do E-mail
		$MailHelper->setBody($mail_body);

		//Seta o assunto do E-mail
		$MailHelper->setSubject('Novo formulário recebido no Website - Cadastre-se');
           
            return $MailHelper->sendEmail();
		}	
	
	
}
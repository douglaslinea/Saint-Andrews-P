<?php
/**
 * Plugin para Trabalhar com Autenticação de Usuário
 * @author Linea Comunicação com Design - http://www.lineacom.com.br
 *
 */
class authHelper
{
	private $sessionHelper,$redirectorHelper,$tableName,$tablePermissoes ,$userColumn,
	$passColumn,$user,$pass,$loginController = 'index',$loginAction = 'index',
	$logoutController = 'index', $logoutAction = 'index',$logtable = "logs_login";
	private $MainHelper;

	public function __construct()
	{
		$this->sessionHelper = HelperFactory::getInstance('session');
		$this->redirectorHelper = HelperFactory::getInstance('redirector');
		$this->MainHelper = HelperFactory::getInstance();
		return $this;
	}

	public function setTableName($table)
	{
		$this->tableName = $table;
		return $this;
	}

	public function setTablePermissoes($table)
	{
		$this->tablePermissoes = $table;
		return $this;
	}

	public function setUserColumn ($column)
	{
		$this->userColumn = $column  ;
		return $this;
	}

	public function setPassColumn ($column)
	{
		$this->passColumn = $column;
		return $this;
	}

	public function setUser ($user)
	{
		$this->user = $user;
		return $this;
	}

	public function setPass($pass)
	{
		$this->pass = $pass;
		return $this;
	}

	public function setLoginControllerAction ($controller,$action)
	{
		$this->loginController = $controller;
		$this->loginAction = $action;
		return $this;
	}

	public function setLogoutControllerAction ($controller,$action)
	{
		$this->logoutController = $controller;
		$this->logoutAction = $action;
		return $this;
	}
	
	/**
	 * Valida se passou os dados no login
	 * @param $usuario: string
	 * @param $senha: string
	 */
	public function validacao($usuario, $senha)
	{
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');
		
		$Validation	->set($usuario, "Informe o login",'txt_login','msg_erro_login')->obrigatorio()
					->set($senha, "Informe a senha",'txt_senha','msg_erro_senha')->obrigatorio();
	  
		//Retorna o array de erros
		return $Validation->getErrors();
	}

	/**
	 * Efetua o login do usuário
	 * @return boolean|multitype:string 
	 */
	public function login()
	{
		//instancia o json
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Retorna o resultado da validacao
		$resultado_validacao = $this->validacao($this->user, $this->pass);
		
		//se não der erro
		if(count($resultado_validacao) == 0)
		{
			//Instancia a tabela de login
			$tabela_login = TableFactory::getInstance("Usuarios");		
	
			//Resultado do Login
			$resultado_login = $tabela_login->SelectUsuario($this->user,$this->pass);

			//Valida o Usuário
			if($resultado_login)
			{
				//Instancia a tabela de perfis
				$tabela_permissao_perfis = TableFactory::getInstance('PermissaoPerfis');
					
				//Dados do perfil
				$perfil_usuario = $tabela_permissao_perfis->getPerfilById($resultado_login[0]['cod_perfil']);
													
				//Coloca o nome do perfil na sessão
				$this->sessionHelper->createSession('UserPerfilName',$perfil_usuario['txt_perfil']);
												
				//Instancia a tabela de permissões de Usuário
				$tabela_permissoes_usuario = TableFactory::getInstance('PermissaoUsuario');
				
				//Pega as permissões
				$permissoes_usuario = $tabela_permissoes_usuario->getPermissoesUsuario();
				
				//Coloca o Array de permissões na Sessão
				$this->sessionHelper->PutObjectOnSessionKey($permissoes_usuario,'cod_permissaoGeral','UserPermissoes');
									
				//Salva o log do usuário - passando respectivamente id_usuario , data atual e Endereço IP
				$tabela_login->SalvaLogUsuario($this->sessionHelper->selectSession('UserId'),date("Y-m-d H:i:s"),$_SERVER['REMOTE_ADDR']);
	                			
				echo Zend_Json::encode(array("1"));
			}
			else
			{
				if($tabela_login->SelectUsuarioLogin($this->user))
				{
					//Registramos a tentativa do usuário
					return $this->RegistrarTentativa();
				}
				else
				{
					//instancia a classe de validação
					$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');
		
					//Envia os erros ao JSON                    
            		$Validation->setNewError('txt_senha','Usuário e/ou Senha Inválida','msg_erro_senha');
            		echo Zend_Json::encode($Validation->getErrors());
				}
			}
		}
		else
		{
			//Envia os erros ao JSON                    
            echo Zend_Json::encode($resultado_validacao);
		}
	}
	
	/**
	 * Registrar as tentativas frustradas do usuário
	 */
	private function RegistrarTentativa()
	{
		//instancia a classe de validação
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');
		
	    //Pega o ip da máquina do usuário
	    $ip_usuario = $_SERVER['REMOTE_ADDR'];
		
		//******* Verifica se o ip se encontra na tabela tentativas login *************
		
	    //Instancia a Tabela de Tentativas de Login
		$TabelaTentativasLogin = TableFactory::getInstance('LogsTentativas');
		
		//Verifica na tabela se o IP Recebido existe
		$dados_tentativa = $TabelaTentativasLogin->LocalizarIp($ip_usuario, $this->user);

		//Verifica se o ip foi encontrado
		if($dados_tentativa !== false)
		{
			//Soma uma nova tentativa
			$numero_tentativas = $TabelaTentativasLogin->IncrementarTentativa($dados_tentativa['cod_id']);
   	
			//Verifica qual a tentativa que o usuário se encontra
			switch($numero_tentativas)
			{
				//********************* Caso 2 Tentativas ******************************
				case 2:

					//Envia os erros ao JSON
					$Validation->setNewError('txt_senha','Usuário e/ou Senha Inválida','msg_erro_senha');
						    			
					break;
				//**********************************************************************
						    		
				//********************* Caso 3 Tentativas ******************************
				case 3:
					
					//Envia os erros ao JSON
					$Validation->setNewError('txt_senha','Usuário e/ou Senha Inválida <br/> Esta é sua terceira tentativa de acesso inválida. Se você errar seu usuário ou senha mais duas vezes, seu acesso será bloqueado.','msg_erro_senha');
					 
					break;
				//**********************************************************************
					 
				//********************* Caso 4 Tentativas ******************************
				case 4:
					 
					//Envia os erros ao JSON
					$Validation->setNewError('txt_senha','Usuário e/ou Senha Inválida <br/> Esta é sua quarta tentativa de acesso inválida. Se você errar seu usuário ou senha mais uma vez, seu acesso será bloqueado.','msg_erro_senha');
					 
					break;
				//**********************************************************************
				
				//********************* Caso 5 Tentativas ******************************
				case 5:
		    
					//Instancia a Tabela de Informações do Website
					$dados_website = TableFactory::getInstance('WebsiteInfo')->getWebSiteInfo();
					 
					//Bloqueia o Usuário
					if($TabelaTentativasLogin->BloquearUsuario($dados_tentativa['txt_usuario']))
					{
						//Pega os dados do usuario
						$recordset_usuario = $TabelaTentativasLogin->getDadosUsuario('txt_login',$dados_tentativa['txt_usuario']);

						//Envia E-mail para o Webmaster
						$this->EnviaEmailWebmaster($recordset_usuario['txt_email'],$recordset_usuario['cod_id'], $recordset_usuario['txt_login']);
					}
					
					//Envia os erros ao JSON
					$Validation->setNewError('txt_senha','Seu acesso está bloqueado pois foram feitas mais de 5 tentativas inválidas de login para este usuário. Uma mensagem foi enviada a '.$dados_website['txt_email_webmaster'].' avisando do bloqueio e somente o responsável poderá desbloquear o seu acesso. Favor contatá-lo.','msg_erro_senha');
					 
					break;
				//**********************************************************************
				
				//********************* Caso Mais de 5 Tentativas ******************************
				default:
					
					//Instancia a Tabela de Informações do Website
					$dados_website = TableFactory::getInstance('WebsiteInfo')->getWebSiteInfo();
					 
					//Bloqueia o Usuário - caso ainda não esteja bloqueado
					if($TabelaTentativasLogin->BloquearUsuario($dados_tentativa['txt_usuario']))
					{
						//Pega os dados do usuario
						$recordset_usuario = $TabelaTentativasLogin->getDadosUsuario('txt_login',$dados_tentativa['txt_usuario']);

						//Envia E-mail para o Webmaster
						$this->EnviaEmailWebmaster($recordset_usuario['txt_email'],$recordset_usuario['cod_id'], $recordset_usuario['txt_login']);
					}
					
					//Envia os erros ao JSON
					$Validation->setNewError('txt_senha','Seu acesso está bloqueado pois foram feitas mais de 5 tentativas inválidas de login para este usuário. Uma mensagem foi enviada a '.$dados_website['txt_email_webmaster'].' avisando do bloqueio e somente o responsável poderá desbloquear o seu acesso. Favor contatá-lo.','msg_erro_senha');
					 
					break;
				//******************************************************************************
			}
		}
		else
		{
			//Exclui o registro de tentativa do usuário com data anterior
			$TabelaTentativasLogin->ExcluiTentativaAnterior($this->user);
			
			//Primeira Tentativa então registra ela no banco de dados
			$TabelaTentativasLogin->RegistrarTentativaInicial($this->user,$ip_usuario);
			
			//Envia os erros ao JSON
			$Validation->setNewError('txt_senha','Usuário e/ou Senha Inválida','msg_erro_senha');		    	
		}	
			    
		//Retorna o erro ao usuário
		echo Zend_Json::encode($Validation->getErrors());
	}

	/**
	 * Elimina a sessão do usuário
	 */
	public function logout()
	{
		$this->sessionHelper->deleteSession();
		$this->redirectorHelper->goToControllerAction($this->logoutController,$this->logoutAction);
		return $this;
	}

	public function getPermissao($controller,$action){

		//Instancia as Classes
		$ControllerObj = TableFactory::getInstance('FrameworkControllers');
		$ActionObj = TableFactory::getInstance('FrameworkAcoes');
		$PermissoesObj = TableFactory::getInstance('PermissaoGeral');

		//Busca o id do Controller
		$ControllerId = $ControllerObj->getControllerId($controller);
		//Busca o id da Action
		$ActionId     = $ActionObj->getActionId($action);

		//Busca o id da permissão com base no controller/action
		$permissaoId = $PermissoesObj->getPermissaoId($ControllerId,$ActionId);

		//Seta a tabela de Permissoes
		$this->setTablePermissoes('PermissaoUsuario');

		//Verifica se o usuário tem acesso ao controller/Action
		if($this->permissaoDisponivel($permissaoId)){


			return true;
		}else{
				
			return false;
		}
	}

	private function permissaoDisponivel($permissaoId)
	{
		//Instanciando a tabela de Permissoes
		$tabela_permissoes = TableFactory::getInstance($this->tablePermissoes);

		//Verifica a permissao
		return $tabela_permissoes->PermissaoConcebida($permissaoId);
	}
	
	
	private function EnviaEmailWebmaster($email_usuario,$id_usuario,$txt_login)
	{
		//Instancia a tabela WebSiteInfo
		$WebSiteInfoTable = TableFactory::getInstance('WebsiteInfo');
		    
		//Resgata os dados do Website
		$dados_website = $WebSiteInfoTable->getWebSiteInfo();
		
		//Instancia o Helper de Email		
		$mailHelper = HelperFactory::getInstance('mail');

		//Gera a nova senha do usuário	
		$new_password = $this->MainHelper->gerarSenha(9,8);

		//Senha em MD5
		$new_password_md5 = md5($new_password);	
			
		//Instancia a Tabela de Usuarios
		$UsuariosTable = TableFactory::getInstance('Usuarios');

		//Atualiza no banco de dados a nova senha do usuário criptografada
		$UsuariosTable->EditarUsuario(array('txt_senha' => $new_password_md5,'cod_id' => $id_usuario));	
			
		//Dados do SMTP
		$mailHelper->setHost(EMAIL_HOST);
		$mailHelper->setSMTPAuth(true);
		$mailHelper->setUserName(USERNAME_HOST);
		$mailHelper->setPassword(PASSWORD_HOST);
		$mailHelper->setFromName($dados_website['txt_default_title']);
		$mailHelper->setFrom(USERNAME_HOST);
		$mailHelper->setIdioma('br','phpMailer/language/');
		$mailHelper->setAddress($dados_website['txt_email_webmaster']);
		$mailHelper->setWrap(50);
		$mailHelper->setIsHtml(true);			
		
		//Monta o corpo do Email					
		$mail_body = 'Usuário <b>'.$txt_login.'</b> teve acesso bloqueado em '.date("d/m/Y").' às '.date("H:i").', após 5 tentativas inválidas de login. <br/> <br/>';
		$mail_body .= 'Dados corretos para acesso: <br/>';
		$mail_body .= 'Usuário: <b>'.$txt_login.'</b><br/>';
		//OBS: Senha do usuário não criptografada(para o webmaster visualizar)
		$mail_body .= 'Senha: <b>'.$new_password.'</b><br/>';
		$mail_body .= 'E-mail para contato: <b>'.$email_usuario.'</b><br/> <br/>';
		$mail_body .= '<a href="http://www.lineacom.com.br/_framework_demo/admin/desbloqueio/usuario/'.$id_usuario.'">Clique aqui para desbloquear o acesso deste usuário à Ferramenta de Administração de Conteúdo do Website</a>';
		
		//Seta o corpo do E-mail
		$mailHelper->setBody($mail_body);
		
		//Seta o assunto do E-mail
		$mailHelper->setSubject('Bloqueio de usuário por tentativas inválidas de login - Website '.$dados_website['txt_default_title'].' ');
							
		//Envia o E-mail
		@$mailHelper->sendEmail();
		
		//Retorna true em caso de sucesso
		return true;
	}
}
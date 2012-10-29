<?
class ConcreteLogin extends Usuarios
{	
	public function Logado($parametros)
    {
    	$helper = HelperFactory::getInstance('auth');

    	//manda o login para o authHelper
    	$helper->setUser($parametros['txt_login']);
    	
    	//manda a senha para o authHelper
    	$helper->setPass($parametros['txt_senha']);
    	
    	//chama o metodo login
    	$helper->login();
     }
} 
?>
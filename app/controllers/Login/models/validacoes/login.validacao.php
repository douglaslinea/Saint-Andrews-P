<?
/**
 * Classe para valida��o do formul�rio de Usu�rios
 * @author Linea Comunica��o com Design - http://www.lineacom.com.br
 *
 */
class LoginValidacao
{
	public function ValidarFormulario($dados)
	{
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');

		//Instanciando a tabela de TextosLayou
		$TabelaTextosLayou = TableFactory::getInstance('TextosLayout');
			
		//faz o select para buscar o conte�do
		$erro = $TabelaTextosLayou->getLayoutTexts();

		$Validation	->set($dados['txt_login'], $erro[25],'txt_login','msg_erro_login')->obrigatorio()
					->set($dados['txt_senha'], $erro[26],'txt_senha','msg_erro_senha')->obrigatorio();
	  
		//Retorna o array de erros
		return $Validation->getErrors();
	} 
}
?>

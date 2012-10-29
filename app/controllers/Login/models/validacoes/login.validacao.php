<?
/**
 * Classe para validação do formulário de Usuários
 * @author Linea Comunicação com Design - http://www.lineacom.com.br
 *
 */
class LoginValidacao
{
	public function ValidarFormulario($dados)
	{
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');

		//Instanciando a tabela de TextosLayou
		$TabelaTextosLayou = TableFactory::getInstance('TextosLayout');
			
		//faz o select para buscar o conteúdo
		$erro = $TabelaTextosLayou->getLayoutTexts();

		$Validation	->set($dados['txt_login'], $erro[25],'txt_login','msg_erro_login')->obrigatorio()
					->set($dados['txt_senha'], $erro[26],'txt_senha','msg_erro_senha')->obrigatorio();
	  
		//Retorna o array de erros
		return $Validation->getErrors();
	} 
}
?>

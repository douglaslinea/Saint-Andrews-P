<?php
/**
 * Classe para validação do formulário de cadastro de candidatos
 * @author Linea Comunicação com Design - http://www.lineacom.com.br
 *
 */
class ValidacaoCadastro
{
	public function Validar($PostData)
	{
		//Instanciou a classe de validação genérica
		$ClasseValidacao = LibFactory::getInstance('Validation',null,'validation/Validation.class.php');

		//Instancia a tabela de Textos Layout
		$textosLayout = TableFactory::getInstance('TextosLayout');
		//Pega os textos de acordo com o idioma selecionado
		$erro = $textosLayout->getLayoutTexts();
		 
		//Validamos os campos
		$ClasseValidacao->set($PostData['txt_nome'],$erro[4],'txt_nome','div_txt_nome')->obrigatorio()
		->set($PostData['cha_sexo'],'Sexo',$erro[12],'div_cha_sexo')->obrigatorio()
		->set($PostData['txt_email'],$erro[13],'txt_email','div_txt_email')->email()//primeiro ->email e depois ->obrigatorio
		->set($PostData['txt_email'],$erro[5],'txt_email','div_txt_email')->obrigatorio()
		->set($PostData['dat_nascimento'],'Data Nascimento','dat_nascimento','div_dat_nascimento')->obrigatorio()
		->set($PostData['dat_nascimento'],'Data Nascimento','dat_nascimento','div_dat_nascimento')->data()
		->set($PostData['txt_profissao'],'Profissão','txt_profissao','div_txt_profissao')->obrigatorio()
		->set($PostData['txt_cep'],'CEP','txt_cep','div_txt_cep')->obrigatorio()
		->set($PostData['txt_endereco'],'Endereço','txt_endereco','div_txt_endereco')->obrigatorio()
		->set($PostData['txt_bairro'],'Bairro','txt_bairro','div_txt_bairro')->obrigatorio()
		->set($PostData['cod_estado'],'Estado','cod_estado','div_cod_estado')->obrigatorio()
		->set($PostData['cod_cidade'],'Cidade','cod_cidade','div_cod_cidade')->obrigatorio()
		->set($PostData['txt_telefone'],'Telefone','txt_telefone','div_txt_telefone')->obrigatorio()
		->set($PostData['txt_comentario'],'Comentário','txt_comentario','div_txt_comentario')->obrigatorio()
		->set($PostData['captcha'],$erro[8],'captcha','div_captcha')->obrigatorio()
		->set($PostData['captcha'],$erro[14],'captcha','div_captcha')->captcha($_SESSION['captcha']);
		//->set($PostData['captcha'],$erro[7],'captcha','div_captcha')->captcha($_SESSION['captcha']);
		 
		//Retorna o array de erros
		return $ClasseValidacao->getErrors();	
	}
}

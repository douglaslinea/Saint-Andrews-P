<?php /* Smarty version Smarty-3.1.1, created on 2012-10-11 17:50:51
         compiled from "app/view/templates/Login/index.php" */ ?>
<?php /*%%SmartyHeaderCode:7657053885077312ba48d98-21703427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6eb5c8550e20f2511c971ad09cc45bed78428e04' => 
    array (
      0 => 'app/view/templates/Login/index.php',
      1 => 1349986063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7657053885077312ba48d98-21703427',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5077312bb2bad',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5077312bb2bad')) {function content_5077312bb2bad($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form id="form_login" name="form_login" action="javascript:loginn('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
login/logado', 'form_login', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
admin/logado', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[3];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[2];?>
'), 'btn_enviar')" method="post">
    <fieldset>
        <dl>
            <dt><label>Login:</label></dt>

            <dd>
                <input type="text" name="txt_login" id="txt_login" maxlength="20" />
                <span id="msg_erro_login"></span>
            </dd>

            <dt><label>Senha:</label></dt>

            <dd>
                <input type="password" name="txt_senha" id="txt_senha" maxlength="20" />
                <span id="msg_erro_senha"></span>
            </dd>
        </dl>
    </fieldset>

    <button type="submit" id="btn_enviar" />Enviar</button>
</form>

<script type="text/javascript">
function loginn(url, form, url_final, mensagem_botao, id_botao)
{
	//desabilita o submit
	$('#'+id_botao).attr("disabled", true);
	$('#'+id_botao).text(mensagem_botao[1]);

	//seta a url e os parâmetros a serem usamos pelo PHP    
	var pars = "/rnd/" + Math.random() * 4;

	//Requisição Ajax
	$.ajax({
		url : url + pars, //URL de destino
		contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
		data : $('#' + form).serialize(),
		type : 'post',
		dataType : "json", //Tipo de Retorno
		success : function(json)
		{
			//libera o botão e manda o valor original
			$('#'+id_botao).attr("disabled", false);
			$('#'+id_botao).text(mensagem_botao[0]);
			
			//Se ocorrer tudo certo
			if (json[0] == "1")
			{
				//Exibe a div de resposta
				//$('#div_resposta').css("display", "block");
				//Reseta o formulário
				//$("#" + form).get(0).reset();
				//Alerta o usuário
				//$('#paragrafo_resposta').html(mensagem_sucesso);
				document.location = url_final;
			}
			else
			{
				//Esconde a div de resposta        	 
				//$('#div_resposta').css("display", "none");

				//limpa o span com os erros
				limpaSpan('msg_erro');

				//Percorre os erros    
				for ( var msg_erro in json)
				{
					erro = $('#' + json[msg_erro]['id_element']);
					erro.addClass('msg_erro');
					erro.html(json[msg_erro]['mensagem']);
				}
			}
		}
	});
}
</script>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
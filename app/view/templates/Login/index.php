{view}include file="{view}$HEAD{/view}"{/view}

<form id="form_login" name="form_login" action="javascript:loginn('{view}$URL_DEFAULT{/view}login/logado', 'form_login', '{view}$URL_DEFAULT{/view}admin/logado', new Array('{view}$textos_layout[3]{/view}', '{view}$textos_layout[2]{/view}'), 'btn_enviar')" method="post">
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
{view}include file="{view}$FOOTER{/view}"{/view}
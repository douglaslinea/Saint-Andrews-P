function login(url, form, url_final, mensagem_botao, id_botao)
{
    //desabilita o submit
    $('#'+id_botao).attr("disabled", true);
    $('#'+id_botao).text(mensagem_botao[1]);

    //seta a url e os par�metros a serem usamos pelo PHP    
    var pars = "/rnd/" + Math.random() * 4;

    //Requisi��o Ajax
    $.ajax({
        url : url + pars, //URL de destino
        contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
        data : $('#' + form).serialize(),
        type : 'post',
        dataType : "json", //Tipo de Retorno
        success : function(json)
        {
            //libera o bot�o e manda o valor original
            $('#'+id_botao).attr("disabled", false);
            $('#'+id_botao).text(mensagem_botao[0]);
			
            //Se ocorrer tudo certo
            if (json[0] == "1")
            {
                //Exibe a div de resposta
                //$('#div_resposta').css("display", "block");
                //Reseta o formul�rio
                //$("#" + form).get(0).reset();
                //Alerta o usu�rio
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

/*
 * Busca as cidades conforme o estado selecionado
 */

function getCidade(url, combo_value, combo_name, div_cidades,cidade_selecionada)
{
    //seta a url e os parâmetros a serem usamos pelo PHP	  		
    var pars = "/rnd/" + Math.random() * 4;

    //utiliza objeto Ajax da biblioteca Prototype
    //Requisição Ajax
    $.ajax({
        url : url + pars, //URL de destino
        contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
        data : "&cod_uf=" + combo_value,
        type : 'post',
        dataType : "json", //Tipo de Retorno
        success : function(json) {
            if (json.length > 0) {

                //Verifica se deu resposta			
                var quantidade_cidades = json.length;

                //Monta a combo com o estado selecionado
                var combo_atualizada = "<select name='" + combo_name
                + "' id='" + combo_name + "'>";

                //Opcao em branco
                combo_atualizada += "<option value=\"\">--Selecione--</option>";

                //popula a combo com as cidades do estado selecionado
                for ( var i = 0; i < quantidade_cidades; i++) {

                    //Verifica se esta é a cidade selecionada
                    if ((cidade_selecionada != "undefined" || cidade_selecionada != null)
                        && json[i]['cod_id'] == cidade_selecionada) {

                        //Atribui a propriedade selected na combo
                        var seleciona_cidade = "selected='selected'";

                    } else {

                        //Limpa a variavel para não inserir selected nas demais options
                        seleciona_cidade = "";
                    }

                    //Adiciona os valores na combo 
                    combo_atualizada += "<option value='"
                    + json[i]['cod_id'] + "' "
                    + seleciona_cidade + ">"
                    + json[i]['txt_cidade'] + "</option>";
                }

                //Fecha a combo
                combo_atualizada += "</select>";

                //Joga a combo na respectiva div				   
                $('#' + div_cidades).html(combo_atualizada);
            }
        }
    });

}

function getCep(url, urlCidades)
{
    //Verifica se o cep possui 9 caracteres
    if ($('[name=txt_cep]').val().length >= 8)
    {
        //seta a url e os parâmetros a serem usamos pelo PHP	  		
        var pars = "/rnd/" + Math.random() * 4;

        //Requisição Ajax
        $.ajax({
            url : url + pars, //URL de destino
            contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
            data : "&txt_cep=" + $('[name=txt_cep]').val(),
            type : 'post',
            dataType : "json", //Tipo de Retorno
            success : function(json)
            {
                //Verifica se deu resposta			
                if (json.length > 0)
                {
                    //Joga a resposta nos textfields		
                    $('[name=txt_endereco]').val(json[0]);
                    $('[name=txt_bairro]').val(json[1]);

                    //Seleciona o estado encontrado
                    $("#cod_estado option[value='" + json[3] + "']").attr("selected", true);

                    //Busca as cidades conforme o estado selecionado
                    getCidade(urlCidades, json[3], 'cod_cidade','combo_cidade', json[2]);

                    //habilitando campos após o preenchimento do cep
                    $('#msg_txt_cep').html('').hide();
                    $("#txt_bairro").attr('disabled', false);
                    $("#txt_endereco").attr('disabled', false);
                    $("#cod_cidade").attr('disabled', false);
                    $("#cod_estado").attr('disabled', false);
                }
                else
                {
                    //Cai aqui quando cep não foi encontrado
                    $('#msg_txt_cep').addClass('msg_erro');
                    $('#msg_txt_cep').html('CEP não encontrado').show();
			        
                    $("#txt_bairro").attr('disabled', true);
                    $("#txt_bairro").val('');
                    $("#txt_endereco").attr('disabled', true);
                    $("#txt_endereco").val('');
                    $("#cod_cidade").attr('disabled', true);
                    $("#cod_cidade").val('');
                    $("#cod_estado").attr('disabled', true);
                    $("#cod_estado").val('');
                }
            }
        });
    }
}

/** Fun��o JSON para Enviar Formul�rio
 * @param String url
 * @param String form
 * @param String msg_success
 * @param String div_class
 */
function EnviarFormulario(url, form, msg_botao, div_class, id_botao)
{
    //Desabilita o bot�o de Envio
    $('#'+id_botao).attr("disabled", true);
    $('#'+id_botao).html(msg_botao[0]);

    //seta a url e os par�metros a serem usamos pelo PHP    
    var pars = "/rnd/" + Math.random() * 4;

    //Requisi��o Ajax
    jQuery.ajax({
        url : url + pars, //URL de destino
        contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
        data : jQuery('#' + form).serialize(),
        type : 'post',
        dataType : "json", //Tipo de Retorno
        success : function(json)
        { 
            //Se ocorrer tudo certo

            //Habilita o bot�o 
            $('#'+id_botao).attr("disabled", false);
            $('#'+id_botao).html(msg_botao[1]);
			
            //Verifica se obteve sucesso
            if (json[0] == "1")
            {
                //Limpa as divs
                ClearDivs(div_class);

                //Limpa o formul�rio
                document.getElementById(form).reset();
            }
            else
            {
                //Limpa as divs
                ClearDivs(div_class);

                //Percorre os erros	e joga nas DIVS
                for(var msg_erro in json)
                {
                    erro = $('#'+json[msg_erro]['id_element']);
                    //erro.addClass('invalid-side-note');
                    erro.html(json[msg_erro]['mensagem']);
                }
            }
        }
    });
}

/**
 * Limpa as divs
 */
function ClearDivs(div_class) {

    var todos_elementos = document.getElementsByTagName('div');

    for ( var i = 0; i < todos_elementos.length; i++) {
        var el = todos_elementos[i];

        if (el.className == div_class) {
            document.getElementById(el.id).innerHTML = "";
        }

    }
}

/*function faleconosco(url, form, classe, mensagens)
 {
 //desabilita o enviar
 obj_formulario = document.getElementById(form);
 obj_formulario.enviar_faleconosco.disabled = true;
 obj_formulario.enviar_faleconosco.value = mensagens[2];

 //Pega os dados do formul�rio    
 var dados_formulario = getdados(form);  

 //seta a url e os par�metros a serem usamos pelo PHP    
 var pars = "/rnd/" + Math.random()*4;

 //utiliza objeto Ajax da biblioteca Prototype
 new Ajax.Request(url+pars, { method: 'post', parameters: ""+dados_formulario,

 //em caso de sucesso...
 onSuccess: function(transport)
 {
 var json = transport.responseText.evalJSON(true);

 if(json[0]=="1")
 {
 //send_request(url_analytics,'meta_ga',null,'GET');	
 alert(mensagens[0]);
 limpaDiv(classe);
 //Limpa o formul�rio de cadastro
 document.getElementById(form).reset();

 //libera o bot�o e manda o valor original
 obj_formulario.enviar_faleconosco.disabled = false;
 obj_formulario.enviar_faleconosco.value = mensagens[1];
 }
 else
 {
 limpaDiv(classe);
 //Percorre os erros    
 for(var msg_erro in json)
 {
 document.getElementById(json[msg_erro]['id_element']).innerHTML = json[msg_erro]['mensagem'];
 }

 //libera o bot�o e manda o valor original
 obj_formulario.enviar_faleconosco.disabled = false;
 obj_formulario.enviar_faleconosco.value = mensagens[1];
 }
 }
 });
 }*/

// quando login no cms � feito atrav�s do site:
/*function esqueceu(url, txt_login, classe, msg_erro, estrategia, msg_esqueceu, form)
 {
 login = document.getElementById(txt_login).value;

 //altera o valor para aguarde para n�o poder clicar
 document.getElementById(msg_esqueceu).innerHTML = "";

 //desabilita o enviar
 obj_formulario = document.getElementById(form);
 obj_formulario.btn_enviar.disabled = true;
 obj_formulario.btn_enviar.value = "Aguarde...";

 //se tivar algo digitado no login
 if(login.length > 0)
 {
 //seta a url e os par�metros a serem usamos pelo PHP    
 var pars = "/rnd/" + Math.random()*4;

 //utiliza objeto Ajax da biblioteca Prototype
 new Ajax.Request(url+pars, { method: 'post', parameters: "&"+txt_login+"="+login+"&estrategia="+estrategia,

 //em caso de sucesso...
 onSuccess: function(transport)
 {
 var json = transport.responseText.evalJSON(true);

 //se tiver o login no banco, entra aqui e manda email
 if(json[0] == "1")
 {
 limpaDiv(classe, msg_esqueceu);
 document.getElementById(msg_erro).innerHTML = json[1];

 alteraDiv(url, txt_login, classe, msg_erro, estrategia, msg_esqueceu, form, obj_formulario);
 }

 //se n�o tiver o login entra aqui
 else if(json[0] == "0")
 {
 limpaDiv(classe, msg_esqueceu);
 document.getElementById(msg_erro).innerHTML = json[1];

 alteraDiv(url, txt_login, classe, msg_erro, estrategia, msg_esqueceu, form, obj_formulario);
 }
 }
 });
 }
 else
 {
 limpaDiv(classe, msg_esqueceu);
 document.getElementById(msg_erro).innerHTML = "Preencha o seu nome de usu�rio para recuperar a senha";

 alteraDiv(url, txt_login, classe, msg_erro, estrategia, msg_esqueceu, form, obj_formulario);
 }
 }*/

/*function alteraDiv(url, txt_login, classe, msg_erro, estrategia, msg_esqueceu, form, obj_formulario)
 {
 //passa o valor original para o a href
 div = document.getElementById(msg_esqueceu); 
 var alink = document.createElement("a");

 alink.setAttribute('href', "javascript:esqueceu('"+url+"', '"+txt_login+"', '"+classe+"', '"+msg_erro+"', '"+estrategia+"', '"+msg_esqueceu+"', '"+form+"')");
 alink.innerHTML = 'Esqueceu sua senha?';
 div.appendChild(alink);

 //libera o bot�o e manda o valor original
 obj_formulario.btn_enviar.disabled = false;
 obj_formulario.btn_enviar.value = "Enviar";
 }*/

/*function limpaDiv(classe, msg_esqueceu)
 {
 //se passar alguma coisa para o msg_esqueceu
 if(msg_esqueceu != undefined)
 {
 document.getElementById(msg_esqueceu).innerHTML = "";
 }
 else
 {
 var todos_elementos = document.getElementsByTagName('div');

 for (var i=0; i<todos_elementos.length-3; i++)
 {
 var el = todos_elementos[i];


 if (el.className == classe)
 {
 document.getElementById(el.id).innerHTML = "";
 }

 }
 }
 }*/

/*function getCidade(url,combo_value,combo_name){

 //seta a url e os par�metros a serem usamos pelo PHP	  		
 var pars = "/rnd/" + Math.random()*4;	
 //utiliza objeto Ajax da biblioteca Prototype
 new Ajax.Request(url+pars, { method: 'post', parameters: "&cod_uf="+combo_value,
 //em caso de sucesso...
 onSuccess: function(transport) {

 //Recebe a resposta do JSON
 json = transport.responseText.evalJSON(true);

 //Recebe uma instancia da div que receber� os dados da combo atualizados			
 var div_combo_cidades = document.getElementById('div_combo_cidades');			

 //Verifica se deu resposta			
 var quantidade_cidades = json.length;

 if(json.length>0) {

 //Monta a combo com o estado selecionado
 var combo_atualizada = "<select name='"+combo_name+"' id='"+combo_name+"'>";
 //Opcao em branco
 combo_atualizada += "<option value=\"\">--Selecione--</option>";

 //popula a combo com as cidades do estado selecionado
 for(var i = 0; i < quantidade_cidades; i++){					  

 //Adiciona os valores na combo 
 combo_atualizada += "<option value='"+json[i]['cod_id']+"'>"+json[i]['txt_cidade']+"</option>";
 }

 //Fecha a combo
 combo_atualizada += "</select>";				  

 //Joga a combo na respectiva div
 div_combo_cidades.innerHTML = combo_atualizada;
 }
 }});

 }*/

//Verifica a existencia de um email no banco de dados
/*function verificarExistencia(url,field_obj){

 //seta a url e os par�metros a serem usamos pelo PHP	  		
 var pars = "/rnd/" + Math.random()*4;	
 //utiliza objeto Ajax da biblioteca Prototype
 new Ajax.Request(url+pars, { method: 'post', parameters: "&txt_parametro="+field_obj.value,
 //em caso de sucesso...
 onSuccess: function(transport) {

 //Recebe a resposta do JSON
 json = transport.responseText.evalJSON(true);

 //Coloca a mensagem do servidor na div correspondente
 document.getElementById(json['txt_parametro']['id_element']).innerHTML = json['txt_parametro']['mensagem'];
 }});
 }*/


function acao2(url, form, url_final, mensagem_botao, div_class, id_botao) {
    // desabilita o submit
    $('#' + id_botao).attr("disabled", true);
    $('#' + id_botao).text(mensagem_botao[1]);

    // seta a url e os par�metros a serem usamos pelo PHP
    var pars = "/rnd/" + Math.random() * 4;

    // Requisi��o Ajax
    $.ajax({
        url : url + pars, // URL de destino
        contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
        data : $('#' + form).serialize(),
        type : 'post',
        dataType : "json", // Tipo de Retorno
        success : function(json) {
            // libera o bot�o e manda o valor original
            $('#' + id_botao).attr("disabled", false);
            $('#' + id_botao).text(mensagem_botao[0]);

            // Se ocorrer tudo certo
            if (json[0] == "1") {
                document.location = url_final;
            } else {
                // Limpa as divs
                LimpaDiv(div_class);

                // Percorre os erros
                for ( var msg_erro in json) {
                    erro = $('#' + json[msg_erro]['id_element']);
                    erro.addClass(div_class);
                    erro.html(json[msg_erro]['mensagem']);
                }
            }
        }
    });
}

function exclusaoMultipla(url, url_direcionamento, msg_pegunta) {
    if (confirm(msg_pegunta)) {
        // seta a url e os par�metros a serem usamos pelo PHP
        var pars = "/rnd/" + Math.random() * 4;

		
        // Requisi��o Ajax
        jQuery.ajax({
            url : url + pars, // URL de destino
            contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
            type : 'post',
            dataType : "json", // Tipo de Retorno
            success : function(json) {
                // Verifica a resposta do JSON
                if (json[0] == "1") {
                    document.location = url_direcionamento;
                }
            }
        });
    }
}
 
/**
 * Limpa as divs
 */
function LimpaDiv(classe) {
    todos_elementos = $('div').get();

    for ( var i = 0; i < todos_elementos.length; i++) {
        var el = todos_elementos[i];

        if (el.className == classe) {
            div = $('#' + el.id);
            div.html('');
        }
    }
}


function acao(url, form, url_final, mensagem_botao, id_botao)
{
    //desabilita o submit
    $('#'+id_botao).attr("disabled", true);
    $('#'+id_botao).text(mensagem_botao[1]);

    //seta a url e os par�metros a serem usamos pelo PHP    
    var pars = "/rnd/" + Math.random() * 4;

    //Requisi��o Ajax
    $.ajax({
        url : url + pars, //URL de destino
        contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
        data : $('#' + form).serialize(),
        type : 'post',
        dataType : "json", //Tipo de Retorno
        success : function(json)
        {
            //libera o bot�o e manda o valor original
            $('#'+id_botao).attr("disabled", false);
            $('#'+id_botao).text(mensagem_botao[0]);
			
            //Se ocorrer tudo certo
            if (json[0] == "1")
            {
                //Exibe a div de resposta
                //$('#div_resposta').css("display", "block");
                //Reseta o formul�rio
                //$("#" + form).get(0).reset();
                //Alerta o usu�rio
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

function limpaSpan(classe) {
    //#####INICIO JQUERY#####
    todos_elementos = $('span').get();

    for ( var i = 0; i < todos_elementos.length; i++) {
        var el = todos_elementos[i];

        if (el.className == classe) {
            span = $('#' + el.id);
            span.addClass('');
            span.html('');
        }
    }
//#####FIM JQUERY#####

/*var todos_elementos = document.getElementsByTagName('span');
	
	for (var i=0; i<todos_elementos.length; i++)
	{
		var el = todos_elementos[i];
		if (el.className == classe)
		{
			span = document.getElementById(el.id);
			span.className = "";
			span.innerHTML = "";
		}
	}*/
}
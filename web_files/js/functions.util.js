//Funções Javascript
function SendRequestByURL(url,parametros,form,method){
	
	//Flag de controle
	var flag = false;
	
	//Verifica se é via GET
	if(method == "GET"){
	
			//Percorre os parametros e adiciona na url
			for(var i = 0; i < parametros.length; i++){
				
				//Verifica se existe valor no parâmetro a ser passado
				if(parametros[i].value.length > 0){
				
					url += "/"+document.getElementById(parametros[i]).name+"/"+document.getElementById(parametros[i]).value;
				
				}
			}	
			
			//Flag true
			flag = true;
	}else{
		
			//Instancia o formulario
			var form = document.getElementById(form);
			
			for(var i = 0; i < form.elements.length; i++){
				
				//Verifica se existe valor no parâmetro a ser passado
				if(form.elements[i].value.length > 0 && (form.elements[i].type != "submit" && form.elements[i].type != "button")){
				
					url += "/"+form.elements[i].name+"/"+form.elements[i].value;
				
				}
			}
			
			//Flag true
			flag = true;
	}
	
	//Verifica a flag
	if(flag){
		
		//Envia a solicitação pela URL
		document.location = url;
		
	}else{
		
		//Erro na operação
		return false;
	}
}

//Validar o campo da busca Geral
function validarBuscaGeral(url,method,form_id,array_messages){	
	
	//Instancia o formulario
	var form = document.getElementById(form_id);	
	//Limpa a div de erro
	document.getElementById('div_form_erro_busca_geral').innerHTML = '';
	
	//Valida o campo de busca
	if(form.termo.value.length == 0){
		
		//Mensagem de erro - Valor vazio
		document.getElementById('div_form_erro_busca_geral').innerHTML = array_messages[0];
		return false;
		
	}else if(form.termo.value.length < 3){
		
		//Mensagem de erro - menos de tres caracteres
		document.getElementById('div_form_erro_busca_geral').innerHTML = array_messages[1];
		return false;
		
	}else {		
		
		//Caso esteja tudo ok então envia a solicitação ao servidor
		SendRequestByURL(url,null,form_id,method);
	}	
}
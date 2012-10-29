// JavaScript Document

/*   
  Funcao responsavel pela cria��o do objeto XMLHttpRequest    
 */

function AjaxObject()
{
        var AjaxObject = false;
        
        if(window.XMLHttpRequest)
        {			
        	// atribuindo a classe a variavel ajax
        	AjaxObject = new XMLHttpRequest();
        }
        else if(window.ActiveXObject)
        {
               try{    AjaxObject = new ActiveXObject("Msxml.XMLHTTP");      }catch(e)
           {   try{    AjaxObject = new ActiveXObject("Microsoft.XMLHTTP");  }catch(ex)
           {           AjaxObject = false;  } } }
    
    return AjaxObject;
}


/*
  Fun��o Respons�vel por buscar os dados em um formul�rio
 */
function getdados(formulario){
	
var f = document.getElementById(formulario).elements;
var dados = "";

for(var i = 0; i < f.length; i++){	
//Montamos a query string
if(i == 0){

	//Verificamos se o valor atual é um campo radiobutton
	if(f[i].type == 'radio'){
		//Verificamos se o radio esta checado	
		if(f[i].checked){
		dados += f[i].name + '=' + f[i].value; //Caso esteja incluimos ele nos dados	
		}
	}
	//Verificamos se o valor atual é um campo CheckBox
	else if(f[i].type == 'checkbox'){
		//Verificamos se o Checkbox esta checado	
		if(f[i].checked){
		dados += f[i].name + '=' + f[i].value; //Caso esteja incluimos ele nos dados	
		}
	}
	else{
		dados += f[i].name + '=' + f[i].value;
	}

}else{
	
	if(f[i].type == 'radio'){
		if(f[i].checked){
		dados += '&' + f[i].name + '=' + f[i].value;	
		}
	}
	else if(f[i].type == 'checkbox'){
		if(f[i].checked){
		dados += '&' + f[i].name + '=' + f[i].value;	
		}
	}
	else{
		dados += '&' + f[i].name + '=' + f[i].value;
	}		
}

}//FOR

//Enviamos os dados para a requisição ajax
return dados;	
}


/*
Fun��o Respons�vel por Realizar as requisi��es via Ajax
*/

function send_request(url,elemento,formulario,method) {	
	//Criamos a requisicao Ajax
	var http = AjaxObject(); 

  if(http){    
	  
//Abrimos a URL usando o método passado como par�metro
http.open(method,url, true);	

//Setamos um Header para indicar que esta requisição é via Ajax
http.setRequestHeader("X-Requested-With", "XMLHttpRequest");

if(method == "POST"){

//Buscamos os dados do formulario
var dados_a_enviar = getdados(formulario);

//Envia os devidos cabeçalhos junto a requisição
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //Cabeçalho informando que o Formulário possui url codificada
}

http.onreadystatechange = function() {//Invoca uma função quando o estado da requisição modifica
    //Se tudo estiver OK na requisição
	if(http.readyState == 4 && http.status == 200) {		
		//Exibimos a resposta da requisição em um elemento DIV na propriedade INNERHTML - CONTEUDO DA DIV
		document.getElementById(elemento).innerHTML = http.responseText;
	}
};
		//Verificamos se o metodo � GET
		if(method != "GET"){
		//Enviamos a solicitação com os dados a enviar Se for POST			
		http.send(dados_a_enviar);
			}else{
			http.send(null); //Enviamos a solicita��o Sendo GET ent�o enviamos NULL	
			}
		
  //Caso ocorra erro na requisi��o ent�o notificamos o usuario		
  }else{
  document.getElementById(elemento).innerHTML = "Ocorreu um erro ao processar a requisição";	  
  }
}
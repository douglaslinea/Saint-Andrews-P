/*para chamar a m�scaras coloque isto: onkeyup="mascara(this,nome_da_funcao);"
para a mascara funcionar*/
function mascara(obj, func)
{
    v_obj = obj;
    v_fun = func;
    setTimeout("execMascara()", 1);
}

function execMascara()
{	
    v_obj.val(v_fun(v_obj.val()));
}
//at� aqui para a mascara funcionar

//teste@gmail.com
function soEmail(valor)
{
	var er = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);
    if(typeof(valor) == "string")
	{
		if(er.test(valor))
		{
			return true;
		}
    }else if(typeof(valor) == "object")
	{
		if(er.test(valor))
		{
			return true; 
        }
    }else{
		return false;
    }
}

//01/01/2011
function soData(valor)
{
    valor = valor;
	valor = valor.replace(/\D/g, "");						// remove tudo que n�o � d�gito
	valor = valor.replace(/(\d{2})(\d)/, "$1/$2");		// inclui primeira barra
	valor = valor.replace(/(\d{2})(\d)/, "$1/$2");		// inclui segunda barra

	return valor;
}

function soNumero(valor)
{
	valor = valor.replace(/\D/g, "");	// remove tudo que n�o � d�gito
	return valor;
}

function soDecimal(valor)
{
	valor = valor;
	valor = valor.replace(/[^0-9-]/g, "");				// remove tudo que n�o � d�gito
	valor = valor.replace(/(\d{2})(\d)/, "$1.$2");	// inclui v�rgula

	return valor;
}

function soLetras(v){  
	 
	 v = v.replace(/\,/g,"");
	 v = v.replace(/\./g,"");
	 v = v.replace(/\;/g,"");
	 v = v.replace(/\//g,"");
	 v = v.replace(/\|/g,"");
	 v = v.replace(/\\/g,"");
	 v = v.replace(/\-/g,"");
	 v = v.replace(/\+/g,"");
	 v = v.replace(/\*/g,"");
	 v = v.replace(/\"/g,"");
	 v = v.replace(/\'/g,"");
	 v = v.replace(/\!/g,"");
	 v = v.replace(/\@/g,"");
	 v = v.replace(/\#/g,"");
	 v = v.replace(/\$/g,"");
	 v = v.replace(/\%/g,"");
	 v = v.replace(/\�/g,"");
	 v = v.replace(/\&/g,"");
	 v = v.replace(/\*/g,"");
	 v = v.replace(/\]/g,"");
	 v = v.replace(/\=/g,"");
	 v = v.replace(/\[/g,"");
	 v = v.replace(/\{/g,"");
	 v = v.replace(/\}/g,"");
	 v = v.replace(/\?/g,"");
	 v = v.replace(/\:/g,"");
	 
	 return v.replace(/\d/g,""); //Remove tudo o que n�o � Letra  
}

function soHora(valor)
{
	valor = valor;
	valor = valor.replace(/\D/g,""); 					//Remove tudo o que n�o � d�gito
	valor = valor.replace(/^[^012]/,"");				//valida o primeiro d�gito #
	valor = valor.replace(/^([2])([^0-3])/,"$1");		//valida o segundo d�gito ##
	valor = valor.replace(/^([\d]{2})([^0-5])/,"$1");	//valida o terceiro d�gito ###
	valor = valor.replace(/(\d{2})(\d)/,"$1:$2");		//Coloca dois ponto entre o segundo e o terceiro d�gitos ##:##
	valor = valor.substr(0,5);						//Remove digitos extras (aceita no max 5 caracteres(contando o ':' no meio) )
	return valor;
}

//(51) 3030-3030
function soTelefone(valor)
{
    valor=valor.replace(/\D/g,"");
    valor=valor.replace(/^(\d\d)(\d)/g,"($1) $2");
    valor=valor.replace(/(\d{4})(\d)/,"$1-$2");
    return valor;
}

//999.999.999-99
function soCpf(valor)
{
    valor=valor.replace(/\D/g,"");
    valor=valor.replace(/(\d{3})(\d)/,"$1.$2");
    valor=valor.replace(/(\d{3})(\d)/,"$1.$2");
    valor=valor.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
    return valor;
}

//99999-999
function soCep(valor)
{
    valor = valor;
	valor = valor.replace(/\D/g, "");						// remove tudo que n�o � d�gito
    valor=valor.replace(/^(\d{5})(\d)/,"$1-$2");
    return valor;
}

function soCnpj(valor)
{
    valor=valor.replace(/\D/g,"");
    valor=valor.replace(/^(\d{2})(\d)/,"$1.$2");
    valor=valor.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3");
    valor=valor.replace(/\.(\d{3})(\d)/,".$1/$2");
    valor=valor.replace(/(\d{4})(\d)/,"$1-$2");
    return valor;
}

//12.254,32
function soMoeda(valor)
{
	valor=valor.replace(/\D/g,"") //Remove tudo o que n�o � d�gito
	valor=valor.replace(/^([0-9]{3}\.?){3}-[0-9]{2}$/,"$1.$2");
	valor=valor.replace(/(\d)(\d{11})$/,"$1.$2");
	valor=valor.replace(/(\d)(\d{8})$/,"$1.$2");
	valor=valor.replace(/(\d)(\d{5})$/,"$1.$2");
	valor=valor.replace(/(\d)(\d{2})$/,"$1,$2"); //Coloca ponto antes dos 2 �ltimos digitos
    return valor;
}

function soMoedaNegativo(valor)
{
	valor = valor.replace(/[^0-9\-]/g,"");  //remove tudo o que n�o � d�gito ou 'negativo'
	valor=valor.replace(/.\-$/, ""); //remove 'negativo' caso inserido em outra posi��o no documento
	valor=valor.replace(/^([0-9]{3}\.?){3}-[0-9]{2}$/, "$1.$2");
	valor=valor.replace(/(\d)(\d{12})$/, "$1.$2");
	valor=valor.replace(/(\d)(\d{8})$/, "$1.$2");
	valor=valor.replace(/(\d)(\d{5})$/, "$1.$2");
	valor=valor.replace(/(\d)(\d{2})$/, "$1,$2"); //Coloca ponto antes dos 2 �ltimos digitos
    return valor;
}
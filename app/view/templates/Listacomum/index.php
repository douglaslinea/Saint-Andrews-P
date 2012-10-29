{view}include file="{view}$HEAD{/view}"{/view}

{view}if $dados_textos !== false{/view}

<ul> 
{view}foreach from=$dados_textos item=textos{/view}

	<li style="margin:15px;">
    {view}if ($textos.img_texto){/view}
		<a href="{view}$URL_DEFAULT{/view}lista-comum/detalhes/{view}$textos.cod_id{/view}"><img src="{view}$ARQ_DIN{/view}{view}$textos.img_texto{/view}" alt="{view}$textos.txt_titulo{/view}" title="{view}$textos.txt_titulo{/view}" width="250" /></a>
	{view}/if{/view}
    
    <br /><a href="{view}$URL_DEFAULT{/view}lista-comum/detalhes/{view}$textos.cod_id{/view}">{view}$textos.txt_titulo{/view}</a>
    <br />{view}$Helper->reduzir_string($textos.txt_texto,100){/view}
	</li>
    
{view}/foreach{/view}
</ul>

{view}else{/view}
    {view}$textos_layout[23]{/view}
{view}/if{/view}    
            
{view}include file="{view}$FOOTER{/view}"{/view}
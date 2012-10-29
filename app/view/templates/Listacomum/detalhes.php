{view}include file="{view}$HEAD{/view}"{/view}


{view}if !isset($conteudo_nao_encontrado){/view}

<strong>Título</strong><br />
{view}$dados_textos.txt_titulo{/view}
<br /><br />

{view}if ($dados_textos.img_texto){/view}
	<img src="{view}$ARQ_DIN{/view}{view}$dados_textos.img_texto{/view}" alt="{view}$dados_textos.txt_titulo{/view}" title="{view}$dados_textos.txt_titulo{/view}" width="250" />
{view}/if{/view}
<br /><br />

<strong>Texto</strong><br />
{view}$dados_textos.txt_texto{/view}

{view}else{/view}
    {view}$textos_layout[24]{/view}
{view}/if{/view}
        
{view}include file="{view}$FOOTER{/view}"{/view}
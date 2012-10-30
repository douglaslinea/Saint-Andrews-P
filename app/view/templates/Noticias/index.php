{view}include file="{view}$HEAD{/view}"{/view}

{view}if $dados_noticias !== false{/view}

<ul> 
{view}foreach from=$dados_noticias item=noticias{/view}

    <li style="margin:15px;">
    {view}$noticias.dat_data{/view}<br />
    {view}if ($noticias.img_imagem_cropada){/view}
    
        <a href="{view}$URL_DEFAULT{/view}noticia/detalhes/{view}$noticias.txt_permalink{/view}"><img src="{view}$ARQ_DIN{/view}{view}$noticias.img_imagem_cropada{/view}" alt="{view}$noticias.txt_titulo{/view}" title="{view}$noticias.txt_titulo{/view}" width="250" /></a>
    {view}/if{/view}
    <br /><br />
    
    <a href="{view}$URL_DEFAULT{/view}noticia/detalhes/{view}$noticias.txt_permalink{/view}">{view}$noticias.txt_titulo{/view}</a><br />
    {view}$Helper->reduzir_string($noticias.txt_texto,200){/view}<br />
    </li>

{view}/foreach{/view}
</ul>

{view}else{/view}
    {view}$textos_layout[23]{/view}
{view}/if{/view}    

{view}include file="{view}$FOOTER{/view}"{/view}
{view}include file="{view}$HEAD{/view}"{/view}	

    <div class="slider-index">    
        <div class="sliderContent">
        {view}foreach from=$dados_banners item=banners_index{/view}
            <div class="item">
                <a href="{view}$banners_index.txt_link{/view}" title="{view}$banners_index.txt_alternativo{/view}"><img src="{view}$ARQ_DIN{/view}{view}$banners_index.txt_imagem_crop{/view}" alt="{view}$banners_index.txt_alternativo{/view}" title="{view}$banners_index.txt_alternativo{/view}" width="880" height="465" /></a>
            </div>
        {view}/foreach{/view}
        </div>
    </div>

</section>

<section id="content-bloco2" class="clearfix">

	<div class="bloco2-direita">

	<div class="index-destaque1">
    	<h3>{view}$textos_site[1]['txt_titulo1']{/view}</h3>
        <h1>{view}$textos_site[1]['txt_titulo2']{/view}</h1>
        
        <a href="{view}$URL_DEFAULT{/view}reservas">{view}$textos_site[1]['txt_descricao']{/view}</a>
        
    	<div align="center"><button class="rounded" onclick="document.location.replace('{view}$URL_DEFAULT{/view}reservas')">{view}$textos_layout[52]{/view}</button></div>
    </div>

	<div class="index-destaque2">

    {view}foreach from=$dados_noticias item=noticias{/view}
    <a href="{view}$URL_DEFAULT{/view}noticia/detalhes/{view}$noticias.txt_permalink{/view}" title="{view}$noticias.txt_titulo{/view}"><img src="{view}$ARQ_DIN{/view}{view}$noticias.img_imagem_cropada{/view}" width="187" height="182" alt="{view}$noticias.txt_titulo{/view}" title="{view}$noticias.txt_titulo{/view}" /></a>
    	<h3>{view}$textos_layout[24]{/view}</h3>
        <h1>{view}$noticias.txt_titulo{/view}</h1>
        
        <a href="{view}$URL_DEFAULT{/view}noticia/detalhes/{view}$noticias.txt_permalink{/view}">{view}$Helper->reduzir_string($noticias.txt_texto,200){/view}</a>
    {view}/foreach{/view}
        
    	<div align="center"><button class="rounded" onclick="document.location.replace('{view}$URL_DEFAULT{/view}noticias')">{view}$textos_layout[53]{/view}</button></div>
    <div>

	</div>
    
{view}include file="{view}$FOOTER{/view}"{/view}
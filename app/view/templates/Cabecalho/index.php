<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<!-- favicon -->
<link rel="icon" href="{view}$URL_DEFAULT{/view}favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="{view}$URL_DEFAULT{/view}favicon.png" />

<!-- seo tags -->
<title>{view}$TXT_TITLE{/view}</title>
<meta name="DC.title" content="{view}$TXT_TITLE{/view}" />

<meta name="description" content="{view}$TXT_DESCRIPTION{/view}" />
<meta name="DC.subject" lang="pt" content="{view}$TXT_DESCRIPTION{/view}" />
<meta name="DC.description" lang="pt" content="{view}$TXT_DESCRIPTION{/view}" />
<meta name="Abstract" content="{view}$TXT_DESCRIPTION{/view}" />
<meta name="keywords" content="{view}$TXT_KEYWORDS{/view}" />
<meta name="DC.identifier" scheme="DCTERMS.URI" content="{view}$URL_DEFAULT{/view}" />

<!-- geoURL -->
<!-- <meta name="ICBM" content="XXX.XXXXX, XXX.XXXXX"> -->

<!-- document -->
<meta name="resource-type" content="document" />
<meta http-equiv="pragma" content="no-cache" />
<meta name="distribution" content="global" />
<meta name="rating" content="general" />
<meta name="robots" content="ALL" />
<meta name="mssmarttagspreventparsing" content="true" />

<meta name="language" content="{view}$TXT_META{/view}" />

<link rel="canonical" href="{view}$URL_DEFAULT{/view}" />

<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
<link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" />

<!-- css -->
<link href="{view}$URL_CSS_SCREEN{/view}" rel="stylesheet" type="text/css" />
<link href="{view}$CSS{/view}normalize.css" rel="stylesheet" type="text/css" />
<!--<link href="{view}$CSS{/view}print.css" rel="stylesheet" type="text/css" />-->

<link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

<script src="{view}$JS{/view}jquery1.7.2.min.js" type="text/javascript"></script>
<script src="{view}$JS{/view}mobilyslider.js" type="text/javascript"></script>

<script type="text/javascript">
var $buoop = {} 
$buoop.ol = window.onload; 
window.onload=function(){ 
 try {if ($buoop.ol) $buoop.ol();}catch (e) {} 
 var e = document.createElement("script"); 
 e.setAttribute("type", "text/javascript"); 
 e.setAttribute("src", "http://browser-update.org/update.js"); 
 document.body.appendChild(e); 
} 
</script>

<script type="text/javascript">
$(document).ready(function() {	
	$('#nav li').hover(function() {
		$('ul', this).slideRight(400);
		$(this).children('a:first').addClass("hov");
	}, function() {
		$('ul', this).slideLeft(300);
		$(this).children('a:first').removeClass("hov");		
	});
});

jQuery.fn.extend({
  slideRight: function() {
    return this.each(function() {
      jQuery(this).animate({width: 'show'});
    });
  },
  slideLeft: function() {
    return this.each(function() {
      jQuery(this).animate({width: 'hide'});
    });
  },
});

$(function(){
	$('.slider-index').mobilyslider({
		content: '.sliderContent',
		children: 'div',
		transition: 'horizontal',
		animationSpeed: 500,
		autoplay: true,
		autoplaySpeed: 8000,
		pauseOnHover: true,
		bullets: false,
		arrows: false,
		animationStart: function(){},
		animationComplete: function(){}
	});
});
</script>
</head>

<body>
<div class="bg-header"></div>
<div class="bg-footer"></div>

<div id="wrapper-conteudo" class="clearfix">

<section id="idiomas" class="clearfix">
	<div class="head-idiomas">

    <a href="{view}$LANGUAGE_LINKS{/view}idioma/pt-br" class="ativo">Português</a> | 
    <a href="{view}$LANGUAGE_LINKS{/view}idioma/en-us">English</a> | 
    <a href="{view}$LANGUAGE_LINKS{/view}idioma/es">Español</a>
  
        </div>
</section>

<section id="header" class="clearfix">

	<div class="head-marca"><a href="{view}$URL_DEFAULT{/view}" title="{view}$TXT_TITLE{/view}"><img src="{view}$IMG{/view}marca-saintandrews.png" width="160" height="57" title="{view}$TXT_TITLE{/view}" alt="{view}$TXT_TITLE{/view}" /></a>
	</div>
    
	<nav id="menu-main">
        <ul>
            <li><a href="{view}$URL_DEFAULT{/view}programas-especiais" title="{view}$textos_layout[19]{/view}">{view}$textos_layout[19]{/view}</a></li>
            <li><a href="{view}$URL_DEFAULT{/view}eventos-e-celebracoes" title="{view}$textos_layout[20]{/view}">{view}$textos_layout[20]{/view}</a></li>
            <li><a href="{view}$URL_DEFAULT{/view}destino-gramado" title="{view}$textos_layout[21]{/view}">{view}$textos_layout[21]{/view}</a></li>
            <li><a href="{view}$URL_DEFAULT{/view}na-midia" title="{view}$textos_layout[22]{/view}">{view}$textos_layout[22]{/view}</a></li>
            <li><a href="{view}$URL_DEFAULT{/view}agenda" title="{view}$textos_layout[23]{/view}">{view}$textos_layout[23]{/view}</a></li>
            <li><a href="{view}$URL_DEFAULT{/view}noticias" title="{view}$textos_layout[24]{/view}">{view}$textos_layout[24]{/view}</a></li>
            <li><a href="{view}$URL_DEFAULT{/view}contato" title="{view}$textos_layout[25]{/view}">{view}$textos_layout[25]{/view}</a></li>
            <li class="ultimo"><a href="{view}$URL_DEFAULT{/view}reservas" title="{view}$textos_layout[26]{/view}">{view}$textos_layout[26]{/view}</a></li>
        </ul>
    </nav>

</section>

<section id="content-bloco1" class="clearfix">

    <div class="wrap">
        <ul id="nav">
            <li class="ohotel"><a href="{view}$URL_DEFAULT{/view}o-hotel" title="{view}$textos_layout[27]{/view}">{view}$textos_layout[27]{/view}</a>
                <ul>
                    <li><a href="{view}$URL_DEFAULT{/view}o-hotel" title="{view}$textos_layout[31]{/view} {view}$textos_layout[32]{/view}">
                    <span class="titulo">{view}$textos_layout[31]{/view}</span>
                    {view}$textos_layout[32]{/view}</a></li>
                    <li><a href="{view}$URL_DEFAULT{/view}o-hotel/estrutura" title="{view}$textos_layout[33]{/view} {view}$textos_layout[34]{/view}"><span class="titulo">{view}$textos_layout[33]{/view}</span>
                    {view}$textos_layout[34]{/view}</a></li>
                    <li><a href="{view}$URL_DEFAULT{/view}o-hotel/suites" title="{view}$textos_layout[33]{/view} {view}$textos_layout[35]{/view}"><span class="titulo">{view}$textos_layout[33]{/view}</span>
                    {view}$textos_layout[35]{/view}</a></li>
                    <li><a href="{view}$URL_DEFAULT{/view}o-hotel/jardins" title="{view}$textos_layout[36]{/view} {view}$textos_layout[37]{/view}"><span class="titulo">{view}$textos_layout[36]{/view}</span>
                    {view}$textos_layout[37]{/view}</a></li>
                    <li><a href="{view}$URL_DEFAULT{/view}o-hotel/4-estacoes" title="{view}$textos_layout[38]{/view} {view}$textos_layout[39]{/view}"><span class="titulo">{view}$textos_layout[38]{/view}</span>
                    {view}$textos_layout[39]{/view}</a></li>
                    <li><a href="{view}$URL_DEFAULT{/view}o-hotel/exposicoes" title="{view}$textos_layout[40]{/view} {view}$textos_layout[41]{/view}"><span class="titulo">{view}$textos_layout[40]{/view}</span>
                    {view}$textos_layout[41]{/view}</a></li>
                    <li><a href="{view}$URL_DEFAULT{/view}o-hotel/localizacao" title="{view}$textos_layout[42]{/view} {view}$textos_layout[43]{/view}"><span class="titulo">{view}$textos_layout[42]{/view}</span>
                    {view}$textos_layout[43]{/view}</a></li>
                </ul>
            </li>
            <li class="concierge"><a href="{view}$URL_DEFAULT{/view}o-hotel/concierge" title="{view}$textos_layout[28]{/view}">{view}$textos_layout[28]{/view}</a></li>
            <li class="gastronomia"><a href="{view}$URL_DEFAULT{/view}o-hotel/gastronomia" title="{view}$textos_layout[29]{/view}">{view}$textos_layout[29]{/view}</a></li>
            <li class="wellness"><a href="{view}$URL_DEFAULT{/view}o-hotel/wellness" title="{view}$textos_layout[30]{/view}">{view}$textos_layout[30]{/view}</a></li>
        </ul>
    </div>
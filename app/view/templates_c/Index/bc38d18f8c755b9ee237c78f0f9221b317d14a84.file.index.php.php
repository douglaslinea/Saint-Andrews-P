<?php /* Smarty version Smarty-3.1.1, created on 2012-10-29 14:04:14
         compiled from "app/view/templates/Cabecalho/index.php" */ ?>
<?php /*%%SmartyHeaderCode:904923492508ea8fe056bf8-29402773%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc38d18f8c755b9ee237c78f0f9221b317d14a84' => 
    array (
      0 => 'app/view/templates/Cabecalho/index.php',
      1 => 1351520385,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '904923492508ea8fe056bf8-29402773',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URL_DEFAULT' => 0,
    'TXT_TITLE' => 0,
    'TXT_DESCRIPTION' => 0,
    'TXT_KEYWORDS' => 0,
    'TXT_META' => 0,
    'URL_CSS_SCREEN' => 0,
    'CSS' => 0,
    'JS' => 0,
    'LANGUAGE_LINKS' => 0,
    'IMG' => 0,
    'textos_layout' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_508ea8fe3c27d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508ea8fe3c27d')) {function content_508ea8fe3c27d($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<!-- favicon -->
<link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
favicon.png" />

<!-- seo tags -->
<title><?php echo $_smarty_tpl->tpl_vars['TXT_TITLE']->value;?>
</title>
<meta name="DC.title" content="<?php echo $_smarty_tpl->tpl_vars['TXT_TITLE']->value;?>
" />

<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['TXT_DESCRIPTION']->value;?>
" />
<meta name="DC.subject" lang="pt" content="<?php echo $_smarty_tpl->tpl_vars['TXT_DESCRIPTION']->value;?>
" />
<meta name="DC.description" lang="pt" content="<?php echo $_smarty_tpl->tpl_vars['TXT_DESCRIPTION']->value;?>
" />
<meta name="Abstract" content="<?php echo $_smarty_tpl->tpl_vars['TXT_DESCRIPTION']->value;?>
" />
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['TXT_KEYWORDS']->value;?>
" />
<meta name="DC.identifier" scheme="DCTERMS.URI" content="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
" />

<!-- geoURL -->
<!-- <meta name="ICBM" content="XXX.XXXXX, XXX.XXXXX"> -->

<!-- document -->
<meta name="resource-type" content="document" />
<meta http-equiv="pragma" content="no-cache" />
<meta name="distribution" content="global" />
<meta name="rating" content="general" />
<meta name="robots" content="ALL" />
<meta name="mssmarttagspreventparsing" content="true" />

<meta name="language" content="<?php echo $_smarty_tpl->tpl_vars['TXT_META']->value;?>
" />

<link rel="canonical" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
" />

<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
<link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" />

<!-- css -->
<link href="<?php echo $_smarty_tpl->tpl_vars['URL_CSS_SCREEN']->value;?>
" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
normalize.css" rel="stylesheet" type="text/css" />
<!--<link href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
print.css" rel="stylesheet" type="text/css" />-->

<link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

<script src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
jquery1.7.2.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
mobilyslider.js" type="text/javascript"></script>

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
    <a href="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE_LINKS']->value;?>
idioma/pt-br" class="ativo">Português</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE_LINKS']->value;?>
idioma/en-us">English</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE_LINKS']->value;?>
idioma/es">Español</a>
	</div>
</section>

<section id="header" class="clearfix">

	<div class="head-marca"><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['TXT_TITLE']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
marca-saintandrews.png" width="160" height="57" title="<?php echo $_smarty_tpl->tpl_vars['TXT_TITLE']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['TXT_TITLE']->value;?>
" /></a>
	</div>
    
	<nav id="menu-main">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
programas-especiais" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[19];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[19];?>
</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
eventos-e-celebracoes" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[20];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[20];?>
</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
destino-gramado" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[21];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[21];?>
</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
na-midia" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[22];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[22];?>
</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
agenda" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[23];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[23];?>
</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[24];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[24];?>
</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contato" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[25];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[25];?>
</a></li>
            <li class="ultimo"><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
reservas" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[26];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[26];?>
</a></li>
        </ul>
    </nav>

</section>

<section id="content-bloco1" class="clearfix">

    <div class="wrap">
        <ul id="nav">
            <li class="ohotel"><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
o-hotel" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[27];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[27];?>
</a>
                <ul>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
o-hotel" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[31];?>
 <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[32];?>
">
                    <span class="titulo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[31];?>
</span>
                    <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[32];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
o-hotel/estrutura" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[33];?>
 <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[34];?>
"><span class="titulo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[33];?>
</span>
                    <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[34];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
o-hotel/suites" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[33];?>
 <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[35];?>
"><span class="titulo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[33];?>
</span>
                    <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[35];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
o-hotel/jardins" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[36];?>
 <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[37];?>
"><span class="titulo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[36];?>
</span>
                    <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[37];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
o-hotel/4-estacoes" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[38];?>
 <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[39];?>
"><span class="titulo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[38];?>
</span>
                    <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[39];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
o-hotel/exposicoes" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[40];?>
 <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><span class="titulo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[40];?>
</span>
                    <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
o-hotel/localizacao" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
 <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><span class="titulo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</span>
                    <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
                </ul>
            </li>
            <li class="concierge"><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
o-hotel/concierge" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[28];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[28];?>
</a></li>
            <li class="gastronomia"><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
o-hotel/gastronomia" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[29];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[29];?>
</a></li>
            <li class="wellness"><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
o-hotel/wellness" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[30];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[30];?>
</a></li>
        </ul>
    </div><?php }} ?>
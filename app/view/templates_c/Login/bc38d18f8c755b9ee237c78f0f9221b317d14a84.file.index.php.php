<?php /* Smarty version Smarty-3.1.1, created on 2012-10-11 17:50:51
         compiled from "app/view/templates/Cabecalho/index.php" */ ?>
<?php /*%%SmartyHeaderCode:20171197035077312bb31f66-82008739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc38d18f8c755b9ee237c78f0f9221b317d14a84' => 
    array (
      0 => 'app/view/templates/Cabecalho/index.php',
      1 => 1349986063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20171197035077312bb31f66-82008739',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img_icon' => 0,
    'img_icon_iphone' => 0,
    'TXT_TITLE' => 0,
    'TXT_DESCRIPTION' => 0,
    'TXT_KEYWORDS' => 0,
    'URL_DEFAULT' => 0,
    'TXT_META' => 0,
    'URL_CSS_SCREEN' => 0,
    'CSS' => 0,
    'JS' => 0,
    'textos_layout' => 0,
    'LANGUAGE_LINKS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5077312bc4875',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5077312bc4875')) {function content_5077312bc4875($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<!-- favicon -->
<link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['img_icon']->value;?>
" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php echo $_smarty_tpl->tpl_vars['img_icon_iphone']->value;?>
" />

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

<link href='http://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700' rel='stylesheet' type='text/css'>

<script src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
jquery.js" type="text/javascript"></script>

<script type="text/javascript">
function add_bookmark() {
var browsName = navigator.appName;
if (browsName == "Microsoft Internet Explorer") {
window.external.AddFavorite('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['TXT_TITLE']->value;?>
' );
} else if (browsName == "Netscape") {
alert ("<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
");
}
}

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
</head>

<body>

<div id="wrapper-conteudo">

<div class="header">
Teste de troca de idioma: <a href="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE_LINKS']->value;?>
idioma/pt-br">pt</a> - <a href="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE_LINKS']->value;?>
idioma/en-us">en</a>

<nav>
    <ul>
    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
">Index</a></li>
    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro">(Modelo) Cadastro</a></li>
    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
fale-conosco">(Modelo) Fale Conosco</a></li>
    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
lista-comum">(Modelo) Lista comum</a></li>
    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
lista-noticia">(Modelo) Lista notícia</a></li>
    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
login">(Modelo) Login</a></li>
    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
texto">(Modelo) Texto</a></li>
    </ul>
</nav>

</div><?php }} ?>
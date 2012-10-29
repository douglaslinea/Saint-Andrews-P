<?php /* Smarty version Smarty-3.1.1, created on 2012-10-26 08:48:11
         compiled from "app/view/templates/Noticia/detalhes.php" */ ?>
<?php /*%%SmartyHeaderCode:1839040207508a6a6b2fa4d3-16384898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5e7a5ee3342877ce799368fb5b5f2a8f7283662' => 
    array (
      0 => 'app/view/templates/Noticia/detalhes.php',
      1 => 1351165024,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1839040207508a6a6b2fa4d3-16384898',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'conteudo_nao_encontrado' => 0,
    'dados_noticias' => 0,
    'ARQ_DIN' => 0,
    'dados_noticias_mais_dados' => 0,
    'noticias_mais_dados' => 0,
    'Helper' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_508a6a6b4058b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508a6a6b4058b')) {function content_508a6a6b4058b($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h2>Not&iacute;cias</h2>

<?php if (!isset($_smarty_tpl->tpl_vars['conteudo_nao_encontrado']->value)){?>

<strong>Data</strong><br />
<?php echo $_smarty_tpl->tpl_vars['dados_noticias']->value['dat_data'];?>

<br /><br />

<strong>T&iacute;tulo</strong><br />
<?php echo $_smarty_tpl->tpl_vars['dados_noticias']->value['txt_titulo'];?>

<br /><br />

<?php if (($_smarty_tpl->tpl_vars['dados_noticias']->value['img_imagem_cropada'])){?>
<strong>Imagem</strong><br />
<img src="<?php echo $_smarty_tpl->tpl_vars['ARQ_DIN']->value;?>
<?php echo $_smarty_tpl->tpl_vars['dados_noticias']->value['img_imagem_cropada'];?>
" width="500" alt="<?php echo $_smarty_tpl->tpl_vars['dados_noticias']->value['txt_titulo'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['dados_noticias']->value['txt_titulo'];?>
" />
<?php }?>
<br /><br />

<strong>Texto</strong><br />
<?php echo $_smarty_tpl->tpl_vars['dados_noticias']->value['txt_texto'];?>

	                    
<!-- Mostra as 5 not�cias mais recentes -->

<br /><br /><br /><br />

<h3>Amostra de "Mais Not&iacute;cias"</h3>

<ul>
<?php  $_smarty_tpl->tpl_vars['noticias_mais_dados'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['noticias_mais_dados']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_noticias_mais_dados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['noticias_mais_dados']->key => $_smarty_tpl->tpl_vars['noticias_mais_dados']->value){
$_smarty_tpl->tpl_vars['noticias_mais_dados']->_loop = true;
?>

<li>
<?php echo $_smarty_tpl->tpl_vars['noticias_mais_dados']->value['dat_data'];?>
<br />
<?php echo $_smarty_tpl->tpl_vars['noticias_mais_dados']->value['txt_titulo'];?>
<br />
<?php echo $_smarty_tpl->tpl_vars['Helper']->value->reduzir_string($_smarty_tpl->tpl_vars['noticias_mais_dados']->value['txt_texto'],200);?>
<br />
<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticia/detalhes/<?php echo $_smarty_tpl->tpl_vars['noticias_mais_dados']->value['txt_permalink'];?>
">ver not&iacute;cia &raquo;</a>
</li>

<?php } ?>
</ul>
           
            
<?php }else{ ?>
    <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[24];?>

<?php }?>
        
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
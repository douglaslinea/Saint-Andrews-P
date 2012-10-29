<?php /* Smarty version Smarty-3.1.1, created on 2012-09-21 11:23:50
         compiled from "app/view/templates/Listanoticia/detalhes.php" */ ?>
<?php /*%%SmartyHeaderCode:677437979505c78766bcd26-75419806%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2c7862df59d53783c6147394139d6eedf071a30' => 
    array (
      0 => 'app/view/templates/Listanoticia/detalhes.php',
      1 => 1342703558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '677437979505c78766bcd26-75419806',
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
  'unifunc' => 'content_505c78767c6f1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_505c78767c6f1')) {function content_505c78767c6f1($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h2>Notícias</h2>

<?php if (!isset($_smarty_tpl->tpl_vars['conteudo_nao_encontrado']->value)){?>

<strong>Data</strong><br />
<?php echo $_smarty_tpl->tpl_vars['dados_noticias']->value['dat_data'];?>

<br /><br />

<strong>Título</strong><br />
<?php echo $_smarty_tpl->tpl_vars['dados_noticias']->value['txt_titulo'];?>

<br /><br />

<?php if (($_smarty_tpl->tpl_vars['dados_noticias']->value['txt_imagem'])){?>
<strong>Imagem</strong><br />
<img src="<?php echo $_smarty_tpl->tpl_vars['ARQ_DIN']->value;?>
<?php echo $_smarty_tpl->tpl_vars['dados_noticias']->value['txt_imagem'];?>
" width="500" alt="<?php echo $_smarty_tpl->tpl_vars['dados_noticias']->value['txt_titulo'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['dados_noticias']->value['txt_titulo'];?>
" />
<?php }?>
<br /><br />

<strong>Texto</strong><br />
<?php echo $_smarty_tpl->tpl_vars['dados_noticias']->value['txt_texto'];?>

	                    
<!-- Mostra as 5 notícias mais recentes -->

<br /><br /><br /><br />

<h3>Amostra de "Mais Notícias"</h3>

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
<?php echo $_smarty_tpl->tpl_vars['Helper']->value->reduzir_string($_smarty_tpl->tpl_vars['noticias_mais_dados']->value['txt_texto'],100);?>
<br />
<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
listanoticia/detalhes/<?php echo $_smarty_tpl->tpl_vars['noticias_mais_dados']->value['txt_permalink'];?>
">ver notícia &raquo;</a>
</li>

<?php } ?>
</ul>
           
            
<?php }else{ ?>
    <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[24];?>

<?php }?>
        
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
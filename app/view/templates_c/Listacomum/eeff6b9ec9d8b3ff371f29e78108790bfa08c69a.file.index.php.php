<?php /* Smarty version Smarty-3.1.1, created on 2012-10-24 11:48:25
         compiled from "app/view/templates/Listacomum/index.php" */ ?>
<?php /*%%SmartyHeaderCode:8317477045087f1a9c8e644-18698139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eeff6b9ec9d8b3ff371f29e78108790bfa08c69a' => 
    array (
      0 => 'app/view/templates/Listacomum/index.php',
      1 => 1349986063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8317477045087f1a9c8e644-18698139',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'dados_textos' => 0,
    'textos' => 0,
    'URL_DEFAULT' => 0,
    'ARQ_DIN' => 0,
    'Helper' => 0,
    'textos_layout' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5087f1a9d6ef3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5087f1a9d6ef3')) {function content_5087f1a9d6ef3($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['dados_textos']->value!==false){?>

<ul> 
<?php  $_smarty_tpl->tpl_vars['textos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['textos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_textos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['textos']->key => $_smarty_tpl->tpl_vars['textos']->value){
$_smarty_tpl->tpl_vars['textos']->_loop = true;
?>

	<li style="margin:15px;">
    <?php if (($_smarty_tpl->tpl_vars['textos']->value['img_texto'])){?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
lista-comum/detalhes/<?php echo $_smarty_tpl->tpl_vars['textos']->value['cod_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ARQ_DIN']->value;?>
<?php echo $_smarty_tpl->tpl_vars['textos']->value['img_texto'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['textos']->value['txt_titulo'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['textos']->value['txt_titulo'];?>
" width="250" /></a>
	<?php }?>
    
    <br /><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
lista-comum/detalhes/<?php echo $_smarty_tpl->tpl_vars['textos']->value['cod_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['textos']->value['txt_titulo'];?>
</a>
    <br /><?php echo $_smarty_tpl->tpl_vars['Helper']->value->reduzir_string($_smarty_tpl->tpl_vars['textos']->value['txt_texto'],100);?>

	</li>
    
<?php } ?>
</ul>

<?php }else{ ?>
    <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[23];?>

<?php }?>    
            
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
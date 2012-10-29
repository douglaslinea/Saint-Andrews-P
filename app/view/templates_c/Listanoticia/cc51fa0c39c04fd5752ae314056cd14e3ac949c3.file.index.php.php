<?php /* Smarty version Smarty-3.1.1, created on 2012-10-11 17:50:50
         compiled from "app/view/templates/Listanoticia/index.php" */ ?>
<?php /*%%SmartyHeaderCode:18459590375077312a0cee16-29969604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc51fa0c39c04fd5752ae314056cd14e3ac949c3' => 
    array (
      0 => 'app/view/templates/Listanoticia/index.php',
      1 => 1349986063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18459590375077312a0cee16-29969604',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'dados_noticias' => 0,
    'noticias' => 0,
    'URL_DEFAULT' => 0,
    'ARQ_DIN' => 0,
    'Helper' => 0,
    'textos_layout' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5077312a1c1b3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5077312a1c1b3')) {function content_5077312a1c1b3($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['dados_noticias']->value!==false){?>

<ul> 
<?php  $_smarty_tpl->tpl_vars['noticias'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['noticias']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_noticias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['noticias']->key => $_smarty_tpl->tpl_vars['noticias']->value){
$_smarty_tpl->tpl_vars['noticias']->_loop = true;
?>

    <li style="margin:15px;">
    <?php echo $_smarty_tpl->tpl_vars['noticias']->value['dat_data'];?>
<br /><br />
    <?php if (($_smarty_tpl->tpl_vars['noticias']->value['txt_imagem'])){?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
listanoticia/detalhes/<?php echo $_smarty_tpl->tpl_vars['noticias']->value['txt_permalink'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ARQ_DIN']->value;?>
<?php echo $_smarty_tpl->tpl_vars['noticias']->value['txt_imagem'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['noticias']->value['txt_titulo'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['noticias']->value['txt_titulo'];?>
" width="250" /></a>
    <?php }?>
    <br /><br />
    
    <a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
listanoticia/detalhes/<?php echo $_smarty_tpl->tpl_vars['noticias']->value['txt_permalink'];?>
"><?php echo $_smarty_tpl->tpl_vars['noticias']->value['txt_titulo'];?>
</a><br />
    <?php echo $_smarty_tpl->tpl_vars['Helper']->value->reduzir_string($_smarty_tpl->tpl_vars['noticias']->value['txt_texto'],100);?>
<br />
    </li>

<?php } ?>
</ul>

<?php }else{ ?>
    <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[23];?>

<?php }?>    

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
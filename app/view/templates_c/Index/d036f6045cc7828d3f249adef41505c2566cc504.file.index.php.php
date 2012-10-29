<?php /* Smarty version Smarty-3.1.1, created on 2012-10-29 14:04:13
         compiled from "app/view/templates/Index/index.php" */ ?>
<?php /*%%SmartyHeaderCode:370986320508ea8fde2e3c0-72684133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd036f6045cc7828d3f249adef41505c2566cc504' => 
    array (
      0 => 'app/view/templates/Index/index.php',
      1 => 1351522481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '370986320508ea8fde2e3c0-72684133',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'dados_banners' => 0,
    'banners_index' => 0,
    'ARQ_DIN' => 0,
    'textos_site' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_noticias' => 0,
    'noticias' => 0,
    'Helper' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_508ea8fe04f2b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508ea8fe04f2b')) {function content_508ea8fe04f2b($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	

    <div class="slider-index">    
        <div class="sliderContent">
        <?php  $_smarty_tpl->tpl_vars['banners_index'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banners_index']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_banners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['banners_index']->key => $_smarty_tpl->tpl_vars['banners_index']->value){
$_smarty_tpl->tpl_vars['banners_index']->_loop = true;
?>
            <div class="item">
                <a href="<?php echo $_smarty_tpl->tpl_vars['banners_index']->value['txt_link'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['banners_index']->value['txt_alternativo'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ARQ_DIN']->value;?>
<?php echo $_smarty_tpl->tpl_vars['banners_index']->value['txt_imagem_crop'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['banners_index']->value['txt_alternativo'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['banners_index']->value['txt_alternativo'];?>
" width="880" height="465" /></a>
            </div>
        <?php } ?>
        </div>
    </div>

</section>

<section id="content-bloco2" class="clearfix">

	<div class="bloco2-direita">

	<div class="index-destaque1">
    	<h3><?php echo $_smarty_tpl->tpl_vars['textos_site']->value[1]['txt_titulo1'];?>
</h3>
        <h1><?php echo $_smarty_tpl->tpl_vars['textos_site']->value[1]['txt_titulo2'];?>
</h1>
        
        <a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
reservas"><?php echo $_smarty_tpl->tpl_vars['textos_site']->value[1]['txt_descricao'];?>
</a>
        
    	<div align="center"><button class="rounded" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
reservas')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button></div>
    </div>

	<div class="index-destaque2">

    <?php  $_smarty_tpl->tpl_vars['noticias'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['noticias']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_noticias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['noticias']->key => $_smarty_tpl->tpl_vars['noticias']->value){
$_smarty_tpl->tpl_vars['noticias']->_loop = true;
?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticia/detalhes/<?php echo $_smarty_tpl->tpl_vars['noticias']->value['txt_permalink'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['noticias']->value['txt_titulo'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ARQ_DIN']->value;?>
<?php echo $_smarty_tpl->tpl_vars['noticias']->value['img_imagem_cropada'];?>
" width="187" height="182" alt="<?php echo $_smarty_tpl->tpl_vars['noticias']->value['txt_titulo'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['noticias']->value['txt_titulo'];?>
" /></a>
    	<h3><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[24];?>
</h3>
        <h1><?php echo $_smarty_tpl->tpl_vars['noticias']->value['txt_titulo'];?>
</h1>
        
        <a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticia/detalhes/<?php echo $_smarty_tpl->tpl_vars['noticias']->value['txt_permalink'];?>
"><?php echo $_smarty_tpl->tpl_vars['Helper']->value->reduzir_string($_smarty_tpl->tpl_vars['noticias']->value['txt_texto'],200);?>
</a>
    <?php } ?>
        
    	<div align="center"><button class="rounded" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[53];?>
</button></div>
    <div>

	</div>
    
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
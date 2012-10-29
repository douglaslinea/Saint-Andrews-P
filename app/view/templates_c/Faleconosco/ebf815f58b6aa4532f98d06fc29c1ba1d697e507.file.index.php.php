<?php /* Smarty version Smarty-3.1.1, created on 2012-10-29 13:17:10
         compiled from "app/view/templates/Rodape/index.php" */ ?>
<?php /*%%SmartyHeaderCode:719890357508e9df6b4e5d8-93180089%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebf815f58b6aa4532f98d06fc29c1ba1d697e507' => 
    array (
      0 => 'app/view/templates/Rodape/index.php',
      1 => 1351520577,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '719890357508e9df6b4e5d8-93180089',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'textos_layout' => 0,
    'IMG' => 0,
    'DADOS_ENDERECO' => 0,
    'JS' => 0,
    'AJAX' => 0,
    'TXT_GANALYTICS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_508e9df6c3311',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508e9df6c3311')) {function content_508e9df6c3311($_smarty_tpl) {?></section>

<section id="footer">
	<div class="footer-social">
    <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[44];?>
<br />
    <ul class="clearfix">
    	<li><a href="http://www.facebook.com/pages/Saint-Andrews" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
ic-facebook.png" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[46];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[46];?>
" width="32" height="32" /></a></li>
    	<li><a href="https://twitter.com/gjphoteis" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
ic-twitter.png" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
" width="32" height="32" /></a></li>
    	<li><a href="mailto:reservas@saintandrews.com.br" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
ic-mail.png" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
" width="32" height="32" /></a></li>
    	<li><a href="http://pinterest.com/search/pins/?q=saint+andrews+gramado" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
ic-pintrest.png" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[49];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[49];?>
" width="32" height="32" /></a></li>
    </ul>
    </div>

	<div class="footer-info">
	<span class="copy"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[50];?>
</span><br /><br />

        <?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
: <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_telefone'];?>
  /  0800 644 8088  /  <a href="mailto:reservas@saintandrews.com.br" target="_blank">reservas@saintandrews.com.br</a><br />
       <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_endereco'];?>
 - <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_bairro'];?>
 - <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_cidade'];?>
, <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['cha_sigla'];?>
 - CEP <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_cep'];?>

    </div>
    
</section>

</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
mascaras.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
functions.util.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
json_functions.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
maskedinput.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['AJAX']->value;?>
" type="text/javascript"></script>

<?php echo $_smarty_tpl->tpl_vars['TXT_GANALYTICS']->value;?>

</body>
</html><?php }} ?>
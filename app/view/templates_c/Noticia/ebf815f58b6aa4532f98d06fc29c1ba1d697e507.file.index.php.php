<?php /* Smarty version Smarty-3.1.1, created on 2012-10-26 08:48:11
         compiled from "app/view/templates/Rodape/index.php" */ ?>
<?php /*%%SmartyHeaderCode:219148587508a6a6b52c117-89715212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebf815f58b6aa4532f98d06fc29c1ba1d697e507' => 
    array (
      0 => 'app/view/templates/Rodape/index.php',
      1 => 1351182279,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '219148587508a6a6b52c117-89715212',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'DADOS_ENDERECO' => 0,
    'JS' => 0,
    'AJAX' => 0,
    'TXT_GANALYTICS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_508a6a6b5a1ec',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508a6a6b5a1ec')) {function content_508a6a6b5a1ec($_smarty_tpl) {?><div id="footer">
    Endere&ccedil;o: <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_endereco'];?>
, 
	<?php if ($_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_bairro']){?> - <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_bairro'];?>
 <?php }?><br />
	CEP: <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_cep'];?>
<br />
	<?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_cidade'];?>
 / <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_uf'];?>
 / <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['cha_sigla'];?>
<br /><br />
	Telefone: <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_telefone'];?>
<br />
</div>

<!-- close wrapper -->
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
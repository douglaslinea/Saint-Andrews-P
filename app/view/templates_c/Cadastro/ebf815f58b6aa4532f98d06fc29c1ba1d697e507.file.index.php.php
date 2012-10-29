<?php /* Smarty version Smarty-3.1.1, created on 2012-09-27 10:56:40
         compiled from "app/view/templates/Rodape/index.php" */ ?>
<?php /*%%SmartyHeaderCode:56886410750645b18403323-60592897%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebf815f58b6aa4532f98d06fc29c1ba1d697e507' => 
    array (
      0 => 'app/view/templates/Rodape/index.php',
      1 => 1345727154,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56886410750645b18403323-60592897',
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
  'unifunc' => 'content_50645b1849837',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50645b1849837')) {function content_50645b1849837($_smarty_tpl) {?><div id="footer">
	Endereço: <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['endereco'];?>
, <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['numero'];?>

	<?php if ($_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['complemento']){?> / <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['complemento'];?>
 <?php }?>
	<?php if ($_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['bairro']){?> - <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['bairro'];?>
 <?php }?><br />
	CEP: <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['cep'];?>
<br />
	<?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['CepCidades']['txt_cidade'];?>
 / <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['CepUf']['txt_uf'];?>
 / <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['CepUf']['cha_sigla'];?>
<br /><br />
	Telefone: <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['telefone'];?>
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
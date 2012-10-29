<?php /* Smarty version Smarty-3.1.1, created on 2012-09-27 10:56:40
         compiled from "app/view/templates/Cadastro/index.php" */ ?>
<?php /*%%SmartyHeaderCode:109032291350645b18184287-83034936%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6d7ac055aff8885ede1acc98c0a7f865aa7d69f' => 
    array (
      0 => 'app/view/templates/Cadastro/index.php',
      1 => 1342703557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109032291350645b18184287-83034936',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'estados' => 0,
    'estado' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50645b182dde9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50645b182dde9')) {function content_50645b182dde9($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form id="frm_cadastro" action="javascript:EnviarFormulario('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/cadastrar','frm_cadastro',new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[2];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[3];?>
'),'msg_erro', 'btn_enviar')" autocomplete="off">

    <fieldset>
        <legend>Legenda do fieldset</legend>
    <dl>
            <dt><label>Nome</label></dt>
            <dd>
            <input type="text" name="txt_nome" id="txt_nome" maxlength="255" />
            <div id="div_txt_nome" class="msg_erro"></div>
            </dd>
    </dl>
        <dl>
            <dt><label>Sexo</label></dt>
            <dd>
            <input type="radio" name="cha_sexo" value="M" id="sexo_0" /> <label for="sexo_0"> M &nbsp;&nbsp;</label>
            <input type="radio" name="cha_sexo" value="F" id="sexo_1" /> <label for="sexo_1"> F</label> 
            <div id="div_cha_sexo" class="msg_erro"></div>
            </dd>
        </dl>
        <dl>
            <dt><label>E-mail</label></dt>
            <dd>
            <input type="text" name="txt_email" id="txt_email" maxlength="255" />
            <div id="div_txt_email" class="msg_erro"></div>
            </dd>
        </dl>
        <dl>
            <dt><label>Profissão</label></dt>
            <dd>
            <input type="text" name="txt_profissao" id="txt_profissao" maxlength="255" />
            <div id="div_txt_profissao" class="msg_erro"></div>
            </dd>
        </dl>  
        <dl>
            <dt><label>Data de nascimento</label></dt>
            <dd>
            <input type="text" name="dat_nascimento" id="dat_nascimento" maxlength="10" onKeyUp="mascara($(this),soData)" />
            <div id="div_dat_nascimento" class="msg_erro"></div>
            </dd>
        </dl>
        <dl>
            <dt><label>CEP</label></dt>
            <dd>
            <input type="text" name="txt_cep" id="txt_cep" maxlength="9" onKeyUp="mascara($(this),soCep);getCep('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/carregaEndereco','<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/buscacidades');"  />
            <div id="div_txt_cep" class="msg_erro"></div>
            </dd>
        </dl>
        <dl>
            <dt><label>Endere&ccedil;o completo</label></dt>
            <dd>
            <input type="text" name="txt_endereco" id="txt_endereco" maxlength="255" disabled="disabled" />
            <div id="div_txt_endereco" class="msg_erro"></div>
            </dd>
        </dl>
         <dl>
            <dt><label>Bairro</label></dt>
            <dd>
            <input type="text" name="txt_bairro" id="txt_bairro" maxlength="255" disabled="disabled" />
            <div id="div_txt_bairro" class="msg_erro"></div>
            </dd>
        </dl>
         <dl>
            <dt><label>UF</label></dt>
            <dd>
				<div id="combo_estado">
					<select name="cod_estado" id="cod_estado" disabled="disabled" onchange="getCidade('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/buscacidades',$(this).val(),$(this).attr('name'),'combo_cidade')">
					<option value="">--Estado--</option>
                    <?php  $_smarty_tpl->tpl_vars['estado'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['estado']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['estados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['estado']->key => $_smarty_tpl->tpl_vars['estado']->value){
$_smarty_tpl->tpl_vars['estado']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['estado']->value['cod_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['estado']->value['txt_uf'];?>
</option>
                    <?php } ?>
					</select>
				</div>
            <div id="div_cod_estado" class="msg_erro"></div>
            </dd>
        </dl>
         <dl>
            <dt><label>Cidade</label></dt>
            <dd>
			<div id="combo_cidade">
				<select name="cod_cidade" disabled="disabled" id="cod_cidade">
				<option value="">--Cidade--</option>
				</select>
			</div>
            <div id="div_cod_cidade" class="msg_erro"></div>
            </dd>
        </dl>
        <dl>
            <dt><label>Telefone</label></dt>
            <dd>
            <input type="text" name="txt_telefone" id="txt_telefone" maxlength="14" onKeyUp="mascara($(this),soTelefone)" />
            <div id="div_txt_telefone" class="msg_erro"></div>
            </dd>
        </dl>
        <dl>
            <dt><label>Mensagem</label></dt>
            <dd>
           <textarea name="txt_comentario" id="txt_comentario"></textarea>
            <div id="div_txt_comentario" class="msg_erro"></div>
            </dd>
        </dl>
        <dl>
            <dd>
            <input name="chk_newsletter" type="checkbox" value="S" id="chk_newsletter"/> <label for="chk_newsletter">Quero receber newsletter</label>
            </dd>
        </dl>        
        <dl>
            <dt><label>C&oacute;digo de Seguran&ccedil;a</label></dt>
            <dd>
            <img alt="C&oacute;digo de Seguran&ccedil;a" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/gerarCaptcha" width="150" />
            <input type="text" name="captcha" id="captcha" maxlenght="6" />
            <div id="div_captcha" class="msg_erro"></div>
            </dd>
        </dl>

</fieldset>

<button type="submit" id="btn_enviar" />Enviar</button>

</form>	

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
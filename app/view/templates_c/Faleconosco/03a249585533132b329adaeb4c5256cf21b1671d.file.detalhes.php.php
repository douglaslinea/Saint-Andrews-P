<?php /* Smarty version Smarty-3.1.1, created on 2012-10-29 13:17:10
         compiled from "app/view/templates/Faleconosco/detalhes.php" */ ?>
<?php /*%%SmartyHeaderCode:1649230778508e9df65230f4-40325011%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03a249585533132b329adaeb4c5256cf21b1671d' => 
    array (
      0 => 'app/view/templates/Faleconosco/detalhes.php',
      1 => 1351508701,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1649230778508e9df65230f4-40325011',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'DADOS_ENDERECO' => 0,
    'params' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'IMG' => 0,
    'estados' => 0,
    'estado' => 0,
    'dados_contatos' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_508e9df67c668',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508e9df67c668')) {function content_508e9df67c668($_smarty_tpl) {?><!-- <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 -->

<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    jQuery(document).ready(function()
    {
        var latlng = new google.maps.LatLng(<?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['cod_latitude'];?>
,<?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['cod_longitude'];?>
);

        var myOptions = {
            zoom: 16,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
				
        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
				
        var marker = new google.maps.Marker({
            position: latlng, 
            map: map
        });
    });
</script>


<?php if (isset($_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'])){?>
<div class="notification success">
    <a href="" class="close-notification"
       title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
    <p><?php echo $_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'];?>
</p>
</div>
<?php }?>

<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco/enviar', 'frm_contatos','<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[3];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[2];?>
'), 'btn_enviar')">
    <!--<form name="frm_contatos" id="frm_contatos" method="post" action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco/enviar">-->
    <fieldset>
        <legend>Dados do registro</legend>
        <dl>
            <dt>
            <label>Nome</label>
            </dt>
            <dd>
                <input type="text" name="txt_nome" id="txt_nome" maxlength="255" />
                <div id="msg_txt_nome" class="class_erro"></div>
            </dd>

            <dt>
            <label>E-mail:</label>
            </dt>
            <dd>
                <input type="text" name="txt_email" id="txt_email" maxlength="255" />
                <div id="msg_txt_email" class="class_erro"></div>
            </dd>

            <dt>
            <label>Telefone:</label>
            </dt>
            <dd>
                <input type="text" name="txt_telefone" id="txt_telefone" maxlength="14" onkeyup="mascara($(this),soTelefone);" /> 
                <div id="msg_txt_telefone" class="class_erro"></div>
            </dd>

            <dt>
            <label>Cep:</label>
            </dt>
            <dd>
                <input type="text" name="txt_cep" id="txt_cep" maxlength="9"onkeyup="mascara($(this),soCep);getCep('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco/carregaEndereco','<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco/buscacidades');" /> 
                <a href="http://www.buscacep.correios.com.br/" target="_blank">Não sabe o seu CEP <img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
help.png" /></a>
                <div id="msg_txt_cep" class="class_erro"></div>
            </dd>

            <dl class="quarter">
                <dt>
                <label>Estado <span class="obrig">*</span> </label>
                </dt>
                <dd>
                    <div id="combo_estado">
                        <select name="cod_estado" id="cod_estado" disabled="disabled" onchange="getCidade('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco/buscacidades',$(this).val(),$(this).attr('name'),'combo_cidade')" class="rounded">
                            <option value="">-- Selecione o estado --</option>
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
                    <div id="msg_txt_estado" class="class_erro"></div>
                </dd>
            </dl>

            <dl class="quarter">
                <dt>
                <label>Cidade <span class="obrig">*</span> </label>
                </dt>
                <dd>
                    <div id="combo_cidade">
                        <select name="cod_cidade" disabled="disabled" id="cod_cidade" class="rounded">
                            <option value="">-- Selecione a cidade --</option>
                        </select>
                    </div>
                    <div id="msg_txt_cidade" class="class_erro"></div>
                </dd>
            </dl>

            <dt>
            <label>Endere&ccedil;o:</label>
            </dt>
            <dd>
                <input type="text" name="txt_endereco" id="txt_endereco" maxlength="255" /> 
                <div id="msg_txt_endereco" class="class_erro"></div>
            </dd>

            <dt>
            <label>Assunto:</label>
            </dt>
            <dd>
                <input type="text" name="txt_assunto" id="txt_assunto" maxlength="255" /> 
                <div id="msg_txt_assunto" class="class_erro"></div>
            </dd>

            <dt>
            <label>Mensagem:</label>
            </dt>
            <dd>
                <textarea name="txt_mensagem" id="txt_mensagem"></textarea>
                <div id="msg_txt_mensagem" class="class_erro"></div>
            </dd>
            <BR><BR>

            <dd>
                <img src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco/gerarCaptcha" alt="captcha" width="150" /> <BR/>
            </dd>
            <dt>
            <label>Captcha:</label>
            </dt>
            <dd>
                <input type="text" name="captcha" id="captcha" maxlength="6" /> 
                <div id="msg_captcha" class="class_erro"></div>
            </dd>
        </dl>
    </fieldset>

    <button type="submit" id="btn_enviar" />
    Enviar
</button>
</form>


<?php if (($_smarty_tpl->tpl_vars['dados_contatos']->value['txt_razao_social'])){?>
<strong>Raz&atilde;o Social</strong>
<br />
<h3><?php echo $_smarty_tpl->tpl_vars['dados_contatos']->value['txt_razao_social'];?>
</h3>

<?php }?> <?php if (($_smarty_tpl->tpl_vars['dados_contatos']->value['nuum_cnpj'])){?>
<strong>CNPJ</strong>
<br />
<?php echo $_smarty_tpl->tpl_vars['dados_contatos']->value['num_cnpj'];?>
 <?php }?>
<br />
<br />

<?php if (($_smarty_tpl->tpl_vars['dados_contatos']->value['txt_endereco'])){?>
<strong>Endere&ccedil;o</strong>
<br />
<?php echo $_smarty_tpl->tpl_vars['dados_contatos']->value['txt_endereco'];?>
 <?php }?>
<br />
<br />

<?php if (($_smarty_tpl->tpl_vars['dados_contatos']->value['txt_cep'])){?>
<strong>CEP</strong>
<br />
<?php echo $_smarty_tpl->tpl_vars['dados_contatos']->value['txt_cep'];?>
 <?php }?>
<br />
<br />

<?php if (($_smarty_tpl->tpl_vars['dados_contatos']->value['txt_bairro'])){?>
<strong>Bairro</strong>
<br />
<?php echo $_smarty_tpl->tpl_vars['dados_contatos']->value['txt_bairro'];?>
 <?php }?>
<br />
<br />

<?php if (($_smarty_tpl->tpl_vars['dados_contatos']->value['txt_cidade'])){?>
<strong>Cidade</strong>
<br />
<?php echo $_smarty_tpl->tpl_vars['dados_contatos']->value['txt_cidade'];?>
 <?php }?>
<br />
<br />

<?php if (($_smarty_tpl->tpl_vars['dados_contatos']->value['txt_uf'])){?>
<strong>UF</strong>
<br />
<?php echo $_smarty_tpl->tpl_vars['dados_contatos']->value['txt_uf'];?>
 <?php }?>
<br />
<br />

<?php if (($_smarty_tpl->tpl_vars['dados_contatos']->value['txt_pais'])){?>
<strong>Pa&iacute;s</strong>
<br />
<?php echo $_smarty_tpl->tpl_vars['dados_contatos']->value['txt_pais'];?>
 <?php }?>
<br />
<br />

<?php if (($_smarty_tpl->tpl_vars['dados_contatos']->value['txt_telefone'])){?>
<strong>Telefone</strong>
<br />
<?php echo $_smarty_tpl->tpl_vars['dados_contatos']->value['txt_telefone'];?>
 <?php }?>
<br />
<br />

<strong>Localiza&ccedil;&atilde;o no Google Maps</strong>
<br />

<div id="map_canvas" style="width:40%; height:40%"></div>

<br />
<br />

<?php if (($_smarty_tpl->tpl_vars['dados_contatos']->value['txt_email'])){?>
<strong>E-mail</strong>
<br />
<a href="mailto:<?php echo $_smarty_tpl->tpl_vars['dados_contatos']->value['txt_email'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['dados_contatos']->value['txt_email'];?>
</a>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>
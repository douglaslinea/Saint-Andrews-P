{view}include file="{view}$HEAD{/view}"{/view}

<form id="frm_cadastro" action="javascript:EnviarFormulario('{view}$URL_DEFAULT{/view}cadastro/cadastrar','frm_cadastro',new Array('{view}$textos_layout[2]{/view}', '{view}$textos_layout[3]{/view}'),'msg_erro', 'btn_enviar')" autocomplete="off">

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
            <input type="text" name="txt_cep" id="txt_cep" maxlength="9" onKeyUp="mascara($(this),soCep);getCep('{view}$URL_DEFAULT{/view}cadastro/carregaEndereco','{view}$URL_DEFAULT{/view}cadastro/buscacidades');"  />
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
					<select name="cod_estado" id="cod_estado" disabled="disabled" onchange="getCidade('{view}$URL_DEFAULT{/view}cadastro/buscacidades',$(this).val(),$(this).attr('name'),'combo_cidade')">
					<option value="">--Estado--</option>
                    {view}foreach from=$estados item=estado{/view}
                    <option value="{view}$estado.cod_id{/view}">{view}$estado.txt_uf{/view}</option>
                    {view}/foreach{/view}
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
            <img alt="C&oacute;digo de Seguran&ccedil;a" src="{view}$URL_DEFAULT{/view}cadastro/gerarCaptcha" width="150" />
            <input type="text" name="captcha" id="captcha" maxlenght="6" />
            <div id="div_captcha" class="msg_erro"></div>
            </dd>
        </dl>

</fieldset>

<button type="submit" id="btn_enviar" />Enviar</button>

</form>	

{view}include file="{view}$FOOTER{/view}"{/view}
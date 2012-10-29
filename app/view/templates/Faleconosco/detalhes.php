<!-- {view}include file="{view}$HEAD{/view}"{/view} -->

<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    jQuery(document).ready(function()
    {
        var latlng = new google.maps.LatLng({view}$DADOS_ENDERECO.cod_latitude{/view},{view}$DADOS_ENDERECO.cod_longitude{/view});

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


{view}if isset($params.mensagem_confirmacao){/view}
<div class="notification success">
    <a href="" class="close-notification"
       title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
    <p>{view}$params.mensagem_confirmacao{/view}</p>
</div>
{view}/if{/view}

<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao2('{view}$URL_DEFAULT{/view}faleconosco/enviar', 'frm_contatos','{view}$URL_DEFAULT{/view}faleconosco', new Array('{view}$textos_layout[3]{/view}', '{view}$textos_layout[2]{/view}'), 'btn_enviar')">
    <!--<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}faleconosco/enviar">-->
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
                <input type="text" name="txt_cep" id="txt_cep" maxlength="9"onkeyup="mascara($(this),soCep);getCep('{view}$URL_DEFAULT{/view}faleconosco/carregaEndereco','{view}$URL_DEFAULT{/view}faleconosco/buscacidades');" /> 
                <a href="http://www.buscacep.correios.com.br/" target="_blank">Não sabe o seu CEP <img src="{view}$IMG{/view}help.png" /></a>
                <div id="msg_txt_cep" class="class_erro"></div>
            </dd>

            <dl class="quarter">
                <dt>
                <label>Estado <span class="obrig">*</span> </label>
                </dt>
                <dd>
                    <div id="combo_estado">
                        <select name="cod_estado" id="cod_estado" disabled="disabled" onchange="getCidade('{view}$URL_DEFAULT{/view}faleconosco/buscacidades',$(this).val(),$(this).attr('name'),'combo_cidade')" class="rounded">
                            <option value="">-- Selecione o estado --</option>
                            {view}foreach from=$estados item=estado{/view}
                            <option value="{view}$estado.cod_id{/view}">{view}$estado.txt_uf{/view}</option>
                            {view}/foreach{/view}
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
                <img src="{view}$URL_DEFAULT{/view}faleconosco/gerarCaptcha" alt="captcha" width="150" /> <BR/>
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


{view}if ($dados_contatos.txt_razao_social){/view}
<strong>Raz&atilde;o Social</strong>
<br />
<h3>{view}$dados_contatos.txt_razao_social{/view}</h3>

{view}/if{/view} {view}if ($dados_contatos.nuum_cnpj){/view}
<strong>CNPJ</strong>
<br />
{view}$dados_contatos.num_cnpj{/view} {view}/if{/view}
<br />
<br />

{view}if ($dados_contatos.txt_endereco){/view}
<strong>Endere&ccedil;o</strong>
<br />
{view}$dados_contatos.txt_endereco{/view} {view}/if{/view}
<br />
<br />

{view}if ($dados_contatos.txt_cep){/view}
<strong>CEP</strong>
<br />
{view}$dados_contatos.txt_cep{/view} {view}/if{/view}
<br />
<br />

{view}if ($dados_contatos.txt_bairro){/view}
<strong>Bairro</strong>
<br />
{view}$dados_contatos.txt_bairro{/view} {view}/if{/view}
<br />
<br />

{view}if ($dados_contatos.txt_cidade){/view}
<strong>Cidade</strong>
<br />
{view}$dados_contatos.txt_cidade{/view} {view}/if{/view}
<br />
<br />

{view}if ($dados_contatos.txt_uf){/view}
<strong>UF</strong>
<br />
{view}$dados_contatos.txt_uf{/view} {view}/if{/view}
<br />
<br />

{view}if ($dados_contatos.txt_pais){/view}
<strong>Pa&iacute;s</strong>
<br />
{view}$dados_contatos.txt_pais{/view} {view}/if{/view}
<br />
<br />

{view}if ($dados_contatos.txt_telefone){/view}
<strong>Telefone</strong>
<br />
{view}$dados_contatos.txt_telefone{/view} {view}/if{/view}
<br />
<br />

<strong>Localiza&ccedil;&atilde;o no Google Maps</strong>
<br />

<div id="map_canvas" style="width:40%; height:40%"></div>

<br />
<br />

{view}if ($dados_contatos.txt_email){/view}
<strong>E-mail</strong>
<br />
<a href="mailto:{view}$dados_contatos.txt_email{/view}" target="_blank">{view}$dados_contatos.txt_email{/view}</a>
{view}/if{/view}

{view}include file="{view}$FOOTER{/view}"{/view}

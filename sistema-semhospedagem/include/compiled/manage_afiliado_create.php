<?php include template("manage_header");?>

<?php if($INI['system']['googlemap']){?>
<!-- 
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=<?php echo $INI['system']['googlemap']; ?>" type="text/javascript"></script>
<script type="text/javascript">
window.x_init_hook_gm = function() {
	X.misc.setgooglemap = function(ll) {
		X.get(WEB_ROOT+'/ajax/system.php?action=googlemap&ll='+ll);
	};
	X.misc.setgooglemapclick = function(overlay, latlng) {
		jQuery('#inputlonglat').val(latlng.y+','+latlng.x);
	};
};
</script>
-->
<?php }?>

<?php
$longlat = $partner['longlat'];
if($longlat == ""){
	$longlat = "-14.235004,-51.92528";	
} 

if($partner['display']==""){
	$partner['display']="Y";
}
?>
<style type="text/css">
.red {
	color: #C33;
}
.redneg {
	font-weight: bold;
}
</style>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_afiliados($selector); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Adicionar um anunciante</h2></div>
                <div class="sect">
                    <form id="login-user-form" method="post" action="/vipmin/afiliado/create.php" enctype="multipart/form-data" class="validator">
						<div class="wholetip clear"><h3> Informação de Login</h3></div>
                     <div class="field">
                            <label>Apelido</label>
                            <input type="text" size="30" name="username" id="partner-create-username" class="f-input" value="<?php echo $partner['username']; ?>" require="true" datatype="require" />
                        </div>
                        <div class="field password">
                            <label>Senha</label>
                            <input type="text" size="30" name="password" id="settings-password" class="f-input" require="true" datatype="require" />
                        </div>

						<div class="wholetip clear"><h3>Informações  </h3></div>
						 
                        <div class="field" style="display:none;">
                            <label>Ordem</label>
                            <input type="text" size="10" name="head" value="<?php echo abs(intval($partner['head'])); ?>" class="number"/><span class="inputtip">the biggest figure tops</span>
						</div>
						<div  class="field">
                            <label>Descrição</label>
                            <div style="float:left;"><textarea cols="45" rows="5" name="descricao" id="descricao" class="f-textarea editor"></textarea></div> <span class="inputtip"></span>
						</div>
						<div class="field">
							<label>Mostrar na home</label>
							<input type="text" size="30" name="display" id="partner-edit-display" class="number" value="<?php echo $partner['display']; ?>" maxLength="1" require="true" datatype="english" style="text-transform:uppercase;" /><span class="inputtip">Y: Mosta a logo do parceiro na home</span>
						</div>
						<div class="field" style="display:none;">
							<label>Mostrar recentes</label>
							<input type="text" size="30" name="open" id="partner-edit-open" class="number" value="<?php echo $partner['open']; ?>" maxLength="1" require="true" datatype="english" style="text-transform:uppercase;" /><span class="inputtip">Y: Mostra a logo do parceiro em ofertas recentes limitado em 5 </span>
						</div>
						<div class="field">
							<label>Banner</label>
					
							    <textarea cols="45" rows="5" name="bannerparceiro" id="bannerparceiro" class="f-textarea editor"></textarea> <span class="inputtip"></span>
								<span class="hint">Dimensão ideal 941px de largura por 140px de altura.</span>
								<span style="margin-left:22px;" class="hint"> Para fazer upload de uma imagem do seu computador para a descrição da oferta, clique no ícone <img src="/media/css/i/imagemupload.jpg"> e depois no ícone <img src="/media/css/i/imagemprocurar.jpg"> a primeira aba que aparece é a listagem de todas as imagens enviadas, clique a aba upload para enviar uma nova </span>
					
						</div>
						<div  class="field">
							<label style="width:162px;">Logo</label>
							<input type="file" size="30" name="upload_image1" id="team-create-image1" class="f-input" /> 
						</div>
 
						<div class="wholetip clear">	
						<h3>  Informações basicas </h3></div>
                        <div class="field">
                            <label>Nome do Parceiro</label>
                            <input type="text" size="30" name="title" id="partner-create-title" class="f-input" value="<?php echo $partner['title']; ?>" require="true" datatype="require" />
                        </div>
					 
                        <div class="field">
                            <label>Site</label>
                            <input type="text" size="30" name="homepage" id="partner-create-homepage" class="f-input" value="http://<?php echo $partner['homepage']; ?>"/>
                        </div>
                        <div class="field">
                            <label>Email</label>
                            <input type="text" size="30" name="contact" id="partner-create-contact" class="f-input" value="<?php echo $partner['contact']; ?>" />
						</div>
                        <div class="field">
                            <label>Telefone</label>
                            <input type="text" size="30" name="phone" id="partner-create-phone" class="f-input" value="<?php echo $partner['phone']; ?>" maxLength="18" datatype="require" require="ture" />
						</div>
                        <div class="field"  style="display:none;">
                            <label>Endereço</label>
                            <input type="text" size="30" name="address" id="partner-create-address" class="f-input" value="<?php echo $partner['address']; ?>" datatype="require" require="true" />
						  <span class="inputtip" style="color:red;"> Este endereço será usado para localização do google maps automaticamente Ex: Rua Francisco Sales 
						  Não informe no campo Endereço ítens como bloco, apto, sala , ou qualquer outro dado específico da localidade, não tem como o google achar sua sala ou seu apto. Informe esses dados no campo complemento   </span> 
						

						  <div class="field"  style="display:none;">
                            <label>Número</label>
                            <input type="text" size="30" name="numero" id="numero"  value="<?php echo $partner['chavesms']; ?>" class="f-input"/>
                          </div>

                          <div class="field"  style="display:none;">
                            <label>Complemento</label>
                            <input type="text" size="30" name="chavesms" id="chavesms"  value="<?php echo $partner['chavesms']; ?>" class="f-input"/>
                          </div> 
 
							<div class="field"  style="display:none;">
                            <label>Bairro</label>
                            <input type="text" size="30" name="bairro" id="bairro"  value="<?php echo $partner['bairro']; ?>" class="f-input"/>
                          </div>
						<div class="field"  style="display:none;">
                            <label>Cidade</label>
                            <input type="text" size="30" name="cidade" id="cidade"  value="<?php echo $partner['cidade']; ?>" class="f-input"/>
                          </div>

						  <div class="field"  style="display:none;">
                            <label>Cep</label>
                            <input type="text" size="30" name="cep" id="cep"  value="<?php echo $partner['cep']; ?>" class="f-input"/>
                          </div>

						 <div class="field"  style="display:none;">
                            <label>Estado</label>
								<select id="estado" name="estado">  
								<option <? if($partner['estado'] == "AC" ){ echo "selected"; }?> value="AC">AC</option>  
								<option <? if($partner['estado'] == "AL" ){ echo "selected"; }?> value="AL">AL</option>  
								<option <? if($partner['estado'] == "AM" ){ echo "selected"; }?> value="AM">AM</option>  
								<option <? if($partner['estado'] == "AP" ){ echo "selected"; }?> value="AP">AP</option>  
								<option <? if($partner['estado'] == "BA" ){ echo "selected"; }?> value="BA">BA</option>  
								<option <? if($partner['estado'] == "CE" ){ echo "selected"; }?> value="CE">CE</option>  
								<option <? if($partner['estado'] == "DF" ){ echo "selected"; }?> value="DF">DF</option>  
								<option <? if($partner['estado'] == "ES" ){ echo "selected"; }?> value="ES">ES</option>  
								<option <? if($partner['estado'] == "GO" ){ echo "selected"; }?> value="GO">GO</option>  
								<option <? if($partner['estado'] == "MA" ){ echo "selected"; }?> value="MA">MA</option>  
								<option <? if($partner['estado'] == "MG" ){ echo "selected"; }?> value="MG">MG</option>  
								<option <? if($partner['estado'] == "MS" ){ echo "selected"; }?> value="MS">MS</option>  
								<option <? if($partner['estado'] == "MT" ){ echo "selected"; }?> value="MT">MT</option>  
								<option <? if($partner['estado'] == "PA" ){ echo "selected"; }?> value="PA">PA</option>  
								<option <? if($partner['estado'] == "PB" ){ echo "selected"; }?> value="PB">PB</option>  
								<option <? if($partner['estado'] == "PE" ){ echo "selected"; }?> value="PE">PE</option>  
								<option <? if($partner['estado'] == "PI" ){ echo "selected"; }?> value="PI">PI</option>  
								<option <? if($partner['estado'] == "PR" ){ echo "selected"; }?> value="PR">PR</option>  
								<option <? if($partner['estado'] == "RJ" ){ echo "selected"; }?> value="RJ">RJ</option>  
								<option <? if($partner['estado'] == "RN" ){ echo "selected"; }?> value="RN">RN</option>  
								<option <? if($partner['estado'] == "RO" ){ echo "selected"; }?> value="RO">RO</option>  
								<option <? if($partner['estado'] == "RR" ){ echo "selected"; }?> value="RR">RR</option>  
								<option <? if($partner['estado'] == "RS" ){ echo "selected"; }?> value="RS">RS</option>  
								<option <? if($partner['estado'] == "SC" ){ echo "selected"; }?> value="SC">SC</option>  
								<option <? if($partner['estado'] == "SE" ){ echo "selected"; }?> value="SE">SE</option>  
								<option <? if($partner['estado'] == "SP" ){ echo "selected"; }?> value="SP">SP</option>  
								<option <? if($partner['estado'] == "TO" ){ echo "selected"; }?> value="TO">TO</option>  
								</select>  
 
                          </div>
                        
                          <div class="field" >
                            <label>Telefone</label>
                            <input type="text" size="30" name="phone" id="partner-create-phone" class="f-input" value="<?php echo $partner['phone']; ?>" maxLength="18" datatype="require" require="ture" />
						</div>
                        
                </div>
                        <div class="field">
                            <label>Celular</label>
                            <input type="text" size="30" name="mobile" id="partner-create-mobile" class="f-input" value="<?php echo $partner['mobile']; ?>" maxLength="11" />
						</div>
                        
                        <div  style="display:none" class="field">
                            <label>Localização</label>
                            <div style="float:left;"><textarea cols="45" rows="5" name="location" id="partner-create-location" class="f-textarea editor"></textarea></div>
                        </div>
                        <div style="display:none" class="field">
                            <label>Outras Informações</label>
                            <div style="float:left;"><textarea cols="45" rows="5" name="other" id="partner-create-other" class="f-textarea editor"></textarea></div>
						</div>
					 
                        <div class="act">
                            <input type="submit" value="adicionar" name="commit" id="partner-submit" class="formbutton"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>

<div id="sidebar">
</div>

</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->



 

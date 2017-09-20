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
		<ul><?php echo mcurrent_partner('create'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content"> 
                <div class="sect">
                    <form id="login-user-form" method="post" action="/vipmin/parceiro/create.php" enctype="multipart/form-data" class="validator">
						 
					<input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
					<input type="hidden" name="www" id="www"  value="<?=$INI['system']['wwwprefix']?>" /> 
					<div class="option_box">
						<div class="top-heading group">
							<div class="left_float"><h4>Informações do Parceiro</h4></div>
								<div class="the-button">
									<input type="hidden" value="remote" id="deliverytype" name="deliverytype">
									<button onclick="doupdate();" id="run-button" class="input-btn" type="button">
										<div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div>
										<div id="spinner-text"  >Salvar</div>
									</button>
								</div> 
						</div> 
						<div id="container_box">
							<div id="option_contents" class="option_contents"> 
								<div class="form-contain group">
									<!-- =============================   coluna esquerda   =====================================-->
									<div class="starts">   
										<div style="clear:both;"class="report-head">Nome: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="title" id="title" class="format_input" value="<?php echo $partner['title'] ?>" /> 
										</div>
										
										<div style="clear:both;"class="report-head">Apelido: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="username" id="username" class="format_input" value="<?php echo $partner['username'] ?>" /> 
										</div>
										
										 <div style="clear:both;"class="report-head">Senha: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="password" id="password" class="format_input" value="<?php echo $partner['password'] ?>" /> 
										</div>
												 
										<div style="clear:both;"class="report-head">Logo: <span class="cpanel-date-hint">Máximo de 240px de largura e máximo de 104px de altura</span></div>
										<div class="group">
											<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="upload_image"  id="upload_image" class="format_input"   value="<?php  $partner['upload_image'] ; ?>" />  
										</div>	
										 
										<div style="clear:both;"class="report-head">Email: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="contact" id="contact" class="format_input" value="<?php echo $partner['contact'] ?>" /> 
										</div>	
										 
									</div>
									<!-- =============================   fim coluna esquerda   =====================================-->
									<!-- =============================   coluna direita   =====================================-->
									<div class="ends"> 	 		 
									
										<div style="clear:both;"class="report-head">Telefone: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="phone"   id="phone" class="format_input" value="<?php echo $partner['phone'] ?>" /> 
										</div>
										
										<div style="clear:both;"class="report-head">Celuar: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="mobile" id="mobile" class="format_input" value="<?php echo $partner['mobile'] ?>" /> 
										</div>		
										
										<div style="clear:both;"class="report-head">Senha: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="email" id="email" class="format_input" value="<?php echo $partner['email'] ?>" /> 
										</div>	 
										 
										 <div style="clear:both;"class="report-head">Site: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="homepage"  id="homepage" class="format_input" value="<?php echo $partner['homepage'] ?>" /> 
										</div>  
										<div class="group">
											<div style="clear:both;"class="report-head">Exibir na Home: <span class="cpanel-date-hint"></span></div>
											<input style="width:20px;" type="radio" <? if($partner['display'] =="Y" ){echo "checked='checked'";}?>  value="Y" name="display" > Sim  &nbsp; <img class="tTip" title="Caso seja sim, a logo do parceiro iré aparecer na página principal" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </div>  
											<input style="width:20px;" type="radio" <? if($partner['display'] =="N" or $partner['display'] ==""){echo "checked='checked'";}?>   name="display" value="N"> Não  
										 </div>
									 </div>
									<!-- =============================  fim coluna direita  =====================================-->
								</div> 
							</div>
						</div> 
						
						
				<!-- ********************************************* ABA informações de endereço --> 
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Informações de Endereço</h4></div>
					</div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">
							 
									<div style="clear:both;"class="report-head">Endereço: <span class="cpanel-date-hint">Ex: Rua Emiliano Cardoso. Não informe outros complementos.</span></div>
									<div class="group">
										<input type="text" name="address"   id="address" class="format_input"  value="<?php echo $partner['address'] ; ?>"   />  <img style="cursor:help" class="tTip" title="Este endereço será usado para localização do google maps automaticamente. Não informe neste campo dados como bloco, apto, sala , ou qualquer outro dado específico da localidade, não tem como o google achar sua sala ou seu apto. Informe esses dados no campo complemento" src="<?=$ROOTPATH?>/media/css/i/info.png"> 
									</div> 
									<div style="clear:both;"class="report-head">Número: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" name="numero"   id="numero" class="format_input"  value="<?php echo $partner['numero'] ; ?>"   /> 
									</div> 	
									<div style="clear:both;"class="report-head">Complemento: <span class="cpanel-date-hint">Ex: Bloco 2, sala 309</span></div>
									<div class="group">
										<input type="text" name="chavesms" id="chavesms" class="format_input"  value="<?php echo $partner['chavesms'] ; ?>"   />   
									</div> 
									<div style="clear:both;"class="report-head">Bairro: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" name="bairro" id="bairro" class="format_input"  value="<?php echo $partner['bairro'] ; ?>"   />   
									</div> 
									<div style="clear:both;"class="report-head">Cidade: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" name="cidade"   id="cidade" class="format_input"  value="<?php echo $partner['cidade'] ; ?>"   />  
									</div>									
									 
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
								<div class="ends"> 
									<div style="clear:both;"class="report-head">Cep: <span class="cpanel-date-hint">Ex: 45981-000.</span></div>
									<div class="group">
										<input type="text" name="cep"   id="cep" class="format_input"  value="<?php echo $partner['cep'] ; ?>"   />  
									</div> 
									<div style="clear:both;"class="report-head">Estado:  <span class="cpanel-date-hint"></span></div>
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
											<select  name="estado" id="estado" onchange="$('#select_estado').text($('#estado').find('option').filter(':selected').text())"> 
											 
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
											<div name="select_estado" id="select_estado" class="cjt-wrapped-select-skin">Informe o estado</div>
											<div class="cjt-wrapped-select-icon"></div>
										</div>  
										
									<div style="clear:both;"class="report-head">Complemento: <span class="cpanel-date-hint">Ex: Bloco 2, sala 309</span></div>
									<div class="group">
										<input type="text" name="chavesms" id="chavesms" class="format_input"  value="<?php echo $partner['chavesms'] ; ?>"   />   
									</div> 
									<div style="clear:both;"class="report-head">Coordenadas: <span class="cpanel-date-hint">Use as coordenadas caso o google mapa não seja gerado.</span></div>
									<div class="group">
										<input type="text" name="longlat" id="longlat" class="format_input"  value="<?php echo $partner['longlat'] ; ?>"   />   
									</div> 
									<div style="clear:both;"class="report-head">Cidade: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" name="cidade"   id="cidade" class="format_input"  value="<?php echo $partner['cidade'] ; ?>"   />  
									</div>	 
								 </div>
								</div>
								<!-- ============================= // fim coluna direita // =====================================-->
							</div> 
						</div>
					</div>
					
					 

						<div class="wholetip clear"><h3>Informações  </h3></div>
			  
						<div  class="field">
                            <label>Descrição</label>
                            <div style="float:left;"><textarea cols="45" rows="5" name="descricao" id="descricao" class="f-textarea editor"></textarea></div> <span class="inputtip"></span>
						</div>
					  
					  
						 
                       <div class="field">
                            <label>Coodenadas </label>
                            <input type="text" size="30" name="longlat" style="width:300px;cursor:point;" class="f-input" id="inputlonglat"   value="<?php echo $partner['longlat']; ?>" /> <span class="inputtip"> Obrigatório para alguns agregadores de ofertas</span>
						<span class="inputtip">
					<ul>
							Como achar as coordenadas Google: 
							<li>1) Entre no endereço: http://maps.google.com/</li>   
							<li>2) Insira o endereço correspondente à oferta – verifique se o mapa mostra o local 
							correto; </li> 
							<li>3) Clique com botão direito no indicador vermelho do mapa;</li>  
							<li>4) Selecione “O que há aqui?” (“What’s here?”)</li>  
							<li>5) Copie as coordenadas do campo em cima.</li> 
							<li>6) Cole no campo Coodenadas</li> 
					</ul>
						</span>
							<img src="/media/css/i/maps1.jpg">
								<span class="inputtip">Após clicar na opção “O que há aqui?”, copie as coordenadas acima</span>
							<img src="/media/css/i/maps2.jpg">
						</div>
                         
                        
                </div>
                      
                        
                        <div  style="display:none" class="field">
                            <label>Localização</label>
                            <div style="float:left;"><textarea cols="45" rows="5" name="location" id="partner-create-location" class="f-textarea editor"></textarea></div>
                        </div>
                        <div style="display:none" class="field">
                            <label>Outras Informações</label>
                            <div style="float:left;"><textarea cols="45" rows="5" name="other" id="partner-create-other" class="f-textarea editor"></textarea></div>
						</div>
						<div class="wholetip clear"><h3>4. Informações do Banco</h3></div>
                        <div class="field">
                            <label>Banco:</label>
                            <input type="text" size="30" name="bank_name" id="partner-create-bankname" class="f-input" value="<?php echo $partner['bank_name']; ?>"/>
                        </div>
                        <div class="field">
                            <label>AG:</label>
                            <input type="text" size="30" name="bank_user" id="partner-create-bankuser" class="f-input" value="<?php echo $partner['bank_user']; ?>"/>
                        </div>
                        <div class="field">
                            <label>Conta:</label>
                            <input type="text" size="30" name="bank_no" id="partner-create-bankno" class="f-input" value="<?php echo $partner['bank_no']; ?>"/>
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



 

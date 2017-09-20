<?php include template("manage_header");?>
<?php require("ini.php");?> 
 
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="leader">
	<div id="content" class="clear mainwide">
        <div class="clear box"> 
            <div class="box-content">
                <div class="sect">
					<form id="login-user-form" method="post" action="/vipmin/user/edit.php?id=<?php echo $user['id']; ?>" enctype="multipart/form-data" class="validator">
					<input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
					<input type="hidden" name="adminnew" value="<?php echo $_REQUEST['adminnew']; ?>" />
					<input type="hidden" name="www" id="www"  value="<?=$INI['system']['wwwprefix']?>" /> 
					<div class="option_box">
						<div class="top-heading group">
							<div class="left_float"><h4><?php if($adminnew == "true") { ?> Informações do Administrador <?php } else { ?>Informações do Anunciante<?php } ?></h4></div>
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
										<div style="clear:both;<?php if($adminnew == "true") { ?> display:none; <?php } ?>"class="report-head">Tipo do anunciante <span class="cpanel-date-hint"></span></div>
										<div <?php if($adminnew == "true") { ?> style="display:none;" <?php } ?> class="cjt-wrapped-select" id="type-select-cjt-wrapped-select" >
											<select  name="tipoanunciante" id="tipoanunciante" onchange="$('#select_tipo').text($('#tipoanunciante').find('option').filter(':selected').text()); vertipo();"> 
												<option value="">selecione</option>
												
												<option value="Revenda" <?php if ($user['tipoanunciante'] =="Revenda" ) { echo "selected"; } ?> >Revenda</option>
												
												<option value="Particular" <?php if ($user['tipoanunciante'] =="Particular" ) { echo "selected"; } ?> >Particular</option>
												 
											</select> 
											<div name="select_tipo" id="select_tipo" class="cjt-wrapped-select-skin">Informe o tipo do anunciante</div>
											
										 	<div class="cjt-wrapped-select-icon"></div>
										</div> 
									
									
										<div id="particular3" style="display:none;"><div style="clear:both;"class="report-head"> Nome Completo<span class="cpanel-date-hint"></span></div></div>
										<div id="agencia3" style="display:none;"><div style="clear:both;"class="report-head">Nome da Empresa (Razão Social)<span class="cpanel-date-hint"></span></div></div>
										
										<div class="group">
											<input type="text" name="realname"   id="realname" class="format_input" value="<?php echo $user['realname'] ?>" /> 
										</div>
												   
										<div id="particular1" style="display:none;">
										
											<div style="clear:both;"class="report-head">CPF: <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<input type="text" name="cpf"  id="cpf" class="format_input" value="<?php echo $user['cpf'] ?>" /> 
											</div>	 
										 
										</div>
										
								    	<div id="agencia1" style="display:none;">
										 
												 
											<div style="clear:both;"class="report-head">CNPJ: <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<input type="text" name="cnpj"  id="cnpj" class="format_input" value="<?php echo $user['cnpj'] ?>" /> 
											</div>	 
											
											<div style="clear:both;"class="report-head">Nextel: <span class="cpanel-date-hint"></span></div>
											<div class="group">
												 <input style="width:624px" type="text" name="nextel"  onKeyPress="return SomenteNumero(event);" maxlength="9" id="nextel" class="format_input" value="<?php echo $user['nextel'] ?>" /> 
											</div>  
										</div>
										
										<div style="clear:both;"class="report-head">Telefone: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" style="width:30px" maxlength="2" onKeyPress="return SomenteNumero(event);"  name="ddd"   id="ddd" class="format_input" value="<?php echo $user['ddd'] ?>" />  - <input style="width:669px" type="text" onKeyPress="return SomenteNumero(event);"  maxlength="8" name="telefonefixo"   id="telefonefixo" class="format_input" value="<?php echo $user['telefonefixo'] ?>" /> 
										</div> 
										<div style="clear:both;"class="report-head">Celular: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" style="width:30px" name="ddd2" onKeyPress="return SomenteNumero(event);"  maxlength="2"  id="ddd2" class="format_input" value="<?php echo $user['ddd2'] ?>" />  - <input style="width:669px" type="text" onKeyPress="return SomenteNumero(event);"  maxlength="9" name="celular"   id="celular" class="format_input" value="<?php echo $user['celular'] ?>" /> 
										</div> 
										
									</div>
									<!-- =============================   fim coluna esquerda   =====================================-->
									<!-- =============================   coluna direita   =====================================-->
									<div class="ends"> 	 		 
									
										<div style="clear:both;"class="report-head">Email: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="email" id="email" class="format_input" value="<?php echo $user['email'] ?>" /> 
										</div>				

										<div style="clear:both;"class="report-head">Login de acesso: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="username" id="username" class="format_input" value="<?php echo $user['username'] ?>" /> 
										</div>		
										
										<div style="clear:both;"class="report-head">Senha: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="password" id="password" class="format_input" value="" /> 
										</div>	  
										<div id="particular2" style="display:none;"> 
											<div style="clear:both;"class="report-head">Data de Nascimento: <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<input type="text" name="nascimento" id="nascimento" class="format_input" value="<?php echo $user['nascimento'] ?>" /> 
											</div>	
											
											<div class="group">
												<div style="clear:both;"class="report-head">Sexo: <span class="cpanel-date-hint"></span></div>
												<input style="width:20px;" type="radio" <? if($user['sexo'] =="Masculino" or $user['sexo'] =="" ){echo "checked='checked'";}?>  value="Masculino" name="sexo" > Masculino   
												<input style="width:20px;" type="radio" <? if($user['sexo'] =="Feminino" ){echo "checked='checked'";}?>   name="sexo" value="Feminino"> Feminino  
											</div>  
										</div> 
										
										<div id="agencia2" style="display:none;"> 
											<div style="clear:both;"class="report-head">Site: <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<input type="text" name="site" id="site" class="format_input" value="<?php echo $user['site'] ?>" /> 
											</div>		
											
											<div style="clear:both;"class="report-head">Pessoa Responsável: <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<input type="text" name="pessoaresponsavel" id="pessoaresponsavel" class="format_input" value="<?php echo $user['pessoaresponsavel'] ?>" /> 
											</div>	 
											<div class="report-head">Logo: <span class="cpanel-date-hint">Máximo de 240px de largura e máximo de 104px de altura</span></div>
											<div class="group">
												<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="upload_image"  id="upload_image" class="format_input"  /><?php if($user['imagem']){?> <br><span style="clear:both;" class="cpanel-date-hint"> <?php echo  $user['imagem'] ; ?> </span> <?php }?>
											</div>
										
										</div> 
										 
										
									
									
									 </div>
									<!-- =============================  fim coluna direita  =====================================-->
								</div> 
							</div>
						</div> 
					
			<!-- ********************************************* ABA  endereços  --> 
				<? if(!$_REQUEST['adminnew']){?>
				<div class="option_box">
					<div class="top-heading group"> <div class="left_float"><h4>Dados de endereço </h4> </div>  </div>  
					 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group"> 
								<div class="starts"> 
								 
									<div style="clear:both;"class="report-head">Endereço: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" name="address"   id="address" class="format_input" value="<?php echo $user['address'] ?>" /> 
									</div> 
									<div style="clear:both;"class="report-head">Número: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" name="numero"   id="numero" class="format_input" value="<?php echo $user['numero'] ?>" /> 
									</div> 		
									<div style="clear:both;"class="report-head">Complemento: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" name="complemento"   id="complemento" class="format_input" value="<?php echo $user['complemento'] ?>" /> 
									</div> 
									 		 
								 	<div style="clear:both;"class="report-head">Bairro <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" name="bairro"  id="bairro" class="format_input" value="<?php echo $user['bairro'] ?>" /> 
									</div>		   
									
								</div>
								<!-- =============================   fim coluna esquerda   =====================================-->
								<!-- =============================   coluna direita   =====================================-->
								<div class="ends"> 	 		 
							 
									<div style="clear:both;"class="report-head">Cep: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" name="zipcode" id="zipcode" class="format_input" value="<?php echo $user['zipcode'] ?>" /> 
									</div>	
								  
									<div style="clear:both;"class="report-head">Cidade: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" name="cidadeusuario"  id="cidadeusuario" class="format_input" value="<?php echo $user['cidadeusuario'] ?>" /> 
									</div> 
									 
								<div class="report-head">Estado: <span class="cpanel-date-hint"></span></div>
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
											<select  name="estado" id="estado" onchange="$('#select_estado').text($('#estado').find('option').filter(':selected').text())"> 
													<option <? if($user['estado'] == "AC" ){ echo "selected"; }?> value="AC">AC</option>  
													<option <? if($user['estado'] == "AL" ){ echo "selected"; }?> value="AL">AL</option>  
													<option <? if($user['estado'] == "AM" ){ echo "selected"; }?> value="AM">AM</option>  
													<option <? if($user['estado'] == "AP" ){ echo "selected"; }?> value="AP">AP</option>  
													<option <? if($user['estado'] == "BA" ){ echo "selected"; }?> value="BA">BA</option>  
													<option <? if($user['estado'] == "CE" ){ echo "selected"; }?> value="CE">CE</option>  
													<option <? if($user['estado'] == "DF" ){ echo "selected"; }?> value="DF">DF</option>  
													<option <? if($user['estado'] == "ES" ){ echo "selected"; }?> value="ES">ES</option>  
													<option <? if($user['estado'] == "GO" ){ echo "selected"; }?> value="GO">GO</option>  
													<option <? if($user['estado'] == "MA" ){ echo "selected"; }?> value="MA">MA</option>  
													<option <? if($user['estado'] == "MG" ){ echo "selected"; }?> value="MG">MG</option>  
													<option <? if($user['estado'] == "MS" ){ echo "selected"; }?> value="MS">MS</option>  
													<option <? if($user['estado'] == "MT" ){ echo "selected"; }?> value="MT">MT</option>  
													<option <? if($user['estado'] == "PA" ){ echo "selected"; }?> value="PA">PA</option>  
													<option <? if($user['estado'] == "PB" ){ echo "selected"; }?> value="PB">PB</option>  
													<option <? if($user['estado'] == "PE" ){ echo "selected"; }?> value="PE">PE</option>  
													<option <? if($user['estado'] == "PI" ){ echo "selected"; }?> value="PI">PI</option>  
													<option <? if($user['estado'] == "PR" ){ echo "selected"; }?> value="PR">PR</option>  
													<option <? if($user['estado'] == "RJ" ){ echo "selected"; }?> value="RJ">RJ</option>  
													<option <? if($user['estado'] == "RN" ){ echo "selected"; }?> value="RN">RN</option>  
													<option <? if($user['estado'] == "RO" ){ echo "selected"; }?> value="RO">RO</option>  
													<option <? if($user['estado'] == "RR" ){ echo "selected"; }?> value="RR">RR</option>  
													<option <? if($user['estado'] == "RS" ){ echo "selected"; }?> value="RS">RS</option>  
													<option <? if($user['estado'] == "SC" ){ echo "selected"; }?> value="SC">SC</option>  
													<option <? if($user['estado'] == "SE" ){ echo "selected"; }?> value="SE">SE</option>  
													<option <? if($user['estado'] == "SP" ){ echo "selected"; }?> value="SP">SP</option>  
													<option <? if($user['estado'] == "TO" ){ echo "selected"; }?> value="TO">TO</option> 
											</select> 
											<div name="select_estado" id="select_estado" class="cjt-wrapped-select-skin">Informe o estado</div>
											<div class="cjt-wrapped-select-icon"></div>
										</div>
									
									<? if($user['id']!=""){?>
										<div style="clear:both;"class="report-head">Data do cadastro: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											 <?php echo date('d/m/Y H:i', $user['create_time']); ?>  
										</div> 
									<? } ?> 
								 </div>
							</div> 
						</div> 
					</div>
				</div> 
				 <!-- ********************************************* ABA local --> 
				 
				<div class="option_box">
					<div class="top-heading group"> <div class="left_float"><h4>Onde nos conheceu </h4> </div>  </div>  
					 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group"> 
								
									<?php echo htmlspecialchars($user['local']); ?>
	
							</div> 
						</div> 
					</div>
				</div>	 
				<? } ?>  				
				</form>
                </div>
            </div> 
        </div>
	</div> 
</div>
</div> 
<script>
 
 vertipo();
 function vertipo(){
 
	tipo = jQuery("#tipoanunciante").val();

<?php if($adminnew == "true") { ?> 
		
	jQuery("#particular1").show();
	jQuery("#particular2").show();
	jQuery("#particular3").show();
	jQuery("#agencia1").hide();
	jQuery("#agencia2").hide();
	jQuery("#agencia3").hide();
<?php } else { ?>	
	
	if(tipo=="Particular"){
	
		jQuery("#particular1").show();
		jQuery("#particular2").show();
		jQuery("#particular3").show();
		jQuery("#agencia1").hide();
		jQuery("#agencia2").hide();
		jQuery("#agencia3").hide();
		
	}
	else{
		jQuery("#particular1").hide();
		jQuery("#particular2").hide();
		jQuery("#particular3").hide();
		jQuery("#agencia1").show();
		jQuery("#agencia2").show();
		jQuery("#agencia3").show();
	}
<?php } ?>
}
 
 
function validador(){
 
	limpacampos(); 

	if( jQuery("#realname").val()==""){

		campoobg("realname");
		alert("Por favor, informe o nome do cliente");
		jQuery("#realname").focus();
		return false;
	} 	
	if( jQuery("#username").val()==""){

		campoobg("username");
		alert("Por favor, informe o login do cliente");
		jQuery("#username").focus();
		return false;
	}
	if( jQuery("#email").val()==""){

		campoobg("email");
		alert("Por favor, informe o email do cliente");
		jQuery("#email").focus();
		return false;
	}
	if( jQuery("#email").val()==""){

		campoobg("email");
		alert("Por favor, informe o email do cliente");
		jQuery("#email").focus();
		return false;
	} 	
	if( jQuery("#ID").val()==""){
		if( jQuery("#password").val()==""){

			campoobg("password");
			alert("Por favor, informe a senha do cliente");
			jQuery("#password").focus();
			return false;
		} 
	}
	
	var telefone = jQuery("#telefonefixo").val();
	var celular = jQuery("#celular"). val();
	var TelefoneTamanho = telefone.length;
	var CelularTamanho = celular.length;
		
	if(TelefoneTamanho < 7) {
		alert("Por favor, informe um número de telefone válido");
		campoobg("telefonefixo");
		return false;
	}	
	
	if(CelularTamanho < 7) {
		alert("Por favor, informe um número de celular válido");
		campoobg("celular");
		return false;
	}
	
	return true;	
}
 
 jQuery(document).ready(function(){ 
    
	$('#select_estado').text($('#estado').find('option').filter(':selected').text());
	$('#select_tipo').text($('#tipoanunciante').find('option').filter(':selected').text());
	
  // jQuery("#mobile").mask("(99)9999-9999"); 
   jQuery("#cpf").mask("999999999-99");
   jQuery("#nascimento").mask("99/99/9999");
   
   jQuery("#estado").mask("aa");
   jQuery("#zipcode").mask("99999999");
});


</script>   
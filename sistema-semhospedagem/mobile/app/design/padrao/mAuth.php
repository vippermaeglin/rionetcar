<?php  
	require_once("include/head.php"); 
?> 

<div style="display:none;" class="tips"><?=__FILE__?></div> 

<!-- Responsivo -->
<div class="containerM">
	<? require_once(DIR_BLOCO_M . "/header.php"); ?>   
	<div class="row">
		<div class="divFormAuth">
			<h2>Faça o login ou cadastra se abaixo.</h2>
			<div class="titleForm">
				<p>Efetue o login</p>
			</div>
			<div class="productsPage">
				<div class="formAuth">
					<form>
						<div class="formContent">
							<label>
								Email de acesso:
							</label>
							<input id="emailM" type="email" maxlength="50" name="email" placeholder="Email de acesso" autocomplete="off">
						</div>
						<div class="formContent">
							<label>
								Senha de acesso:
							</label>
							<input id="passwordM" type="password" maxlength="50" name="password" placeholder="Senha de acesso" autocomplete="off">
						</div>					
						<div class="formContent">
							<div class="formButton">
								 <a href="#" id="formAuthLogin" onclick="entrar();">Entrar</a>  						  							
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="titleForm">
				<p>Recupere sua conta</p>
			</div>
			<div class="productsPage">
				<div class="formAuth">
					<form>
						<div class="formContent">
							<label>
								Email de acesso:
							</label>
							<input id="email_recoverM" type="email" maxlength="50" name="email" placeholder="Email de acesso" autocomplete="off">
						</div>				
						<div class="formContent">
							<div class="formButton">
								 <a href="#" id="formAuthLogin" onclick="enviar();">Recuperar</a>  						  							
							</div>
						</div>
					</form>
				</div>
			</div>				
			<div class="titleForm">
				<p>Cadastra-se. É rápido e fácil.</p>
			</div>
			<div class="productsPage">
				<div class="formAuth">
					<form>
						<div class="formContent">
							<label>
								Tipo do anunciante:
							</label>
							<select onchange="vertipoanunciante();" id="tipoanunciante" name="tipoanunciante">
								<option value="Revenda">Revenda</option>
								<option value="Particular">Particular</option>
								<option value="Concessionaria">Concessionária</option>
							</select>
						</div>	
						<div class="tipoagencia">
							<div class="formContent">
								<label>
									Nome da empresa:
								</label>
								<input name="nomeempresa" type="text"  id="nomeempresa" placeholder="Nome da empresa" autocomplete="off">  
							</div>							
							<div class="formContent">
								<label>
									CNPJ:
								</label>
								<input name="cnpj" onkeypress="return SomenteNumero(event);" type="text"  id="cnpj" placeholder="CNPJ" autocomplete="off">  
							</div>							
							<div class="formContent">
								<label>
									Site:
								</label>
								<input name="site" type="text"  id="site" placeholder="Site" autocomplete="off">  
							</div>							
							<div class="formContent">
								<label>
									Pessoa Responsável:
								</label>
								<input name="pessoaresponsavel" type="text"  id="pessoaresponsavel" placeholder="Pessoa Responsável" autocomplete="off">  
							</div>							
						</div>						
						<div class="tipoparticular" style="display:none;">
							<div class="formContent">
								<label>
									Nome completo:
								</label>
								<input id="nomecompleto" type="text" maxlength="50" name="nomecompleto" placeholder="Nome completo" autocomplete="off">
							</div>								
							<div class="formContent">
								<label>
									CPF:
								</label>
								<input id="cpf" onkeypress="return SomenteNumero(event);" type="text" maxlength="16" name="cpf" placeholder="CPF" autocomplete="off">
							</div>							
							<div class="formContent">
								<label>
									Sexo:
								</label>
								<select id="sexo" name="sexo">
									<option value="Masculino">Masculino</option>
									<option value="Feminino">Feminino</option>
								</select>
							</div>								
							<div class="formContent">
								<label>
									Data de nascimento:
								</label>
								<input id="datanascimento" type="text" name="datanascimento" placeholder="Data de nascimento" autocomplete="off">
							</div>	
						</div>				
						<div class="formContent">
							<label>
								DDD:
							</label>
							<br />
							<input maxlength="2" onkeypress="return SomenteNumero(event);" id="ddd1" type="text" name="ddd1" placeholder="DDD" autocomplete="off">
						</div>							
						<div class="formContent">
							<label>
								Telefone:
							</label>
							<br />
							<input maxlength="8" onkeypress="return SomenteNumero(event);" id="telefonefixo" type="text" name="telefonefixo" placeholder="Telefone" autocomplete="off">
						</div>							
						<div class="formContent">
							<label>
								DDD:
							</label>
							<br />
							<input maxlength="2" onkeypress="return SomenteNumero(event);" id="ddd2" type="text" name="ddd2" placeholder="DDD" autocomplete="off">
						</div>							
						<div class="formContent">
							<label>
								Celular:
							</label>
							<br />
							<input maxlength="9" onkeypress="return SomenteNumero(event);" id="celular" type="text" name="celular" placeholder="Celular" autocomplete="off">
						</div>							
						<div class="formContent">
							<label>
								WhatsApp:
							</label>
							<br />
							<input maxlength="9" onkeypress="return SomenteNumero(event);" id="nextel" type="text" name="nextel" placeholder="WhatsApp" autocomplete="off">
						</div>							
						<div class="formContent">
							<label>
								CEP:
							</label>
							<br />
							<input maxlength="8" onblur="getEndereco();" onkeypress="return SomenteNumero(event);" id="cep" type="text" name="cep" placeholder="CEP" autocomplete="off">
						</div>	
						<div class="formContent">
							<label>
								Estado:
							</label>
							<br />
							<select name="estado" id="estado">
								<option value=""></option>
								<option value="AC">Acre</option>
								<option value="AL">Alagoas</option>
								<option value="AP">Amapá</option>
								<option value="AM">Amazonas</option>
								<option value="BA">Bahia</option>
								<option value="CE">Ceará</option>
								<option value="DF">Distrito Federal</option>
								<option value="ES">Espírito Santo</option>
								<option value="GO">Goiás</option>
								<option value="MA">Maranhão</option>
								<option value="MT">Mato Grosso</option>
								<option value="MS">Mato Grosso do Sul</option>
								<option value="MG">Minas Gerais</option>
								<option value="PA">Pará</option>
								<option value="PB">Paraíba</option>
								<option value="PR">Paraná</option>
								<option value="PE">Pernambuco</option>
								<option value="PI">Piauí</option>
								<option value="RJ">Rio de Janeiro</option>
								<option value="RN">Rio Grande do Norte</option>
								<option value="RS">Rio Grande do Sul</option>
								<option value="RO">Rondônia</option>
								<option value="RR">Roraima</option>
								<option value="SC">Santa Catarina</option>
								<option value="SP">São Paulo</option>
								<option value="SE">Sergipe</option>
								<option value="TO">Tocantins</option>
							</select>
						</div>
						<div class="formContent">
							<label>
								Cidade:
							</label>
							<input id="cidadeusuario" type="text" name="cidadeusuario" placeholder="Cidade" autocomplete="off">
						</div>	
						<div class="formContent">
							<label>
								Bairro:
							</label>
							<br />
							<input id="bairro" type="text" name="bairro" placeholder="Bairro" autocomplete="off">
						</div>
						<div class="formContent">
							<label>
								Endereço:
							</label>
							<input id="endereco" type="text" name="endereco" placeholder="Endereço completo" autocomplete="off">
						</div>	
						<div class="formContent">
							<label>
								Nº:
							</label>
							<br />
							<input onkeypress="return SomenteNumero(event);" id="numero" type="text" name="numero" placeholder="Número" autocomplete="off">
						</div>	
						<div class="formContent">
							<label>
								Complemento:
							</label>
							<input id="complemento" type="text" name="complemento" placeholder="Complemento" autocomplete="off">
						</div>																											
						<div class="formContent">
							<label>
								Email:
							</label>
							<input id="emailcadastro" type="text" name="emailcadastro" placeholder="Email" autocomplete="off">
						</div>						
						<div class="formContent">
							<label>
								Senha de acesso:
							</label>
							<input id="passwordcad" type="password" maxlength="50" name="passwordcad" placeholder="Senha de acesso" autocomplete="off">
						</div>	
						<div class="formContent">
							<label>
								Redigite a senha:
							</label>
							<input id="password2" type="password" name="password2" placeholder="Digite a senha novamente" autocomplete="off">
						</div>							
						<div class="formContent">
							<label>
								Onde nos conheceu?
							</label>
							<select name="local" id="local">
								<option value=""></option>
								<option value="Google">Google</option>
								<option value="Facebook">Facebook</option>
								<option value="Jornal">Jornal</option>
								<option value="Rádio">Rádio</option>
								<option value="Indicação">Indicação</option>
								<option value="Outros">Outros</option>
							</select>
						</div>											
						<div class="formContent">
							<div class="formButton">
								 <a href="javascript:cadastropop();" id="formAuthRegister">Enviar</a>  						  							
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<? require_once(DIR_BLOCO_M . "/rodapeM.php"); ?>
	</div>
</div>
<script>

function vertipoanunciante(){

	var tipoanunciante = J("#tipoanunciante").val();
 
	if(tipoanunciante=="Particular"){
		J('.tipoparticular').each(function() {
			 J(this).css('display','block');
			 J('.tipoagencia').each(function() {
				J(this).css('display','none');
			 });
			 
		});
	}
	else{
		J('.tipoagencia').each(function() {
			 J(this).css('display','block');
			 J('.tipoparticular').each(function() {
				J(this).css('display','none');
			  });
		});
	}
}

// logar
function entrar(){
		 
	if(jQuery("#emailM").val() == "" ||  jQuery("#emailM").val() == "Insira seu e-mail"){ 
		alert("Por favor, informe seu email.");
		jQuery("#loading").html("");
		document.getElementById("emailM").focus();
		return;
	}
	 
	if(jQuery("#passwordM").val() == ""){ 
		alert("Por favor, informe sua senha.");
		jQuery("#loading").html("");
		document.getElementById("password").focus();
		return;
	}
 
	jQuery.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: "<?php echo $INI['system']['wwwprefix']?>/autenticacao/login.php",
		   data: "acao=logintoupup&email="+jQuery("#emailM").val()+"&password="+jQuery("#passwordM").val(),
		   success: function(user_id){
			
		   idusuario = jQuery.trim(user_id);
		   if(jQuery.trim(idusuario)=="00"){
		     
				 alert("Não foi possível fazer o seu login. Por favor, verifique os seus dados.");
				 jQuery("#loading").html("");
			 } 
		   else { 
			   
			  if(jQuery("#utm").val()=="1"){
				  if(jQuery("#tipooferta").val()=="participe"){
					participar(1);
				  }else{
					 enviapag() ;
				  }
			 }
			  else{
                 jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Autenticação realizada com sucesso."});
				 location.href  = '<?php echo $INI['system']['wwwprefix']?>/index.php?<?php echo $_SERVER["QUERY_STRING"] ?>';
			  }	
		   }		  
		}
	});
}

function enviar(){
	  
	if(J("#email_recoverM").val() == ""){
	    alert("Por favor, informe seu email.");
		document.getElementById("email_recoverM").focus();
		return;
	}
	 
  //jQuery("#loading").html("<img style=margin-left:50px; src=<?=$PATHSKIN?>/images/ajax-loader2.gif> Estamos validando seu email...");
  
	J.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: "<?php echo $INI['system']['wwwprefix']?>/autenticacao/repass.php",
		   data: "email="+J("#email_recoverM").val(),
		   success: function(retorno){
		   
		   if(jQuery.trim(retorno)==""){  
				alert("Sua senha foi enviada com sucesso para o seu email")
				//jQuery("#loading").html("Sua senha foi enviada com sucesso para o seu email");
				//location.href  = '<?php echo $INI['system']['wwwprefix']?>';
			 } 
		   else {
			 
			  	alert(retorno);
				jQuery("#loading").html("");
		   }
		}
	});
}

 //cadastro
 var idusuario;
 var tipoanunciante;
 function cadastropop(){
 
    var cpf="";
    var cnpj="";
    var sexo="";
    var pessoaresponsavel="";
    var site="";
    var nomeempresa="";
    var nomecompleto="";
    var nextel=""; 
	tipoanunciante = J("#tipoanunciante").val();
	  
    jQuery("#loading").hide();

	 if(tipoanunciante != "Particular"){
	 
		 if(J("#nomeempresa").val() == ""){
			alert("Por favor, informe o nome da empresa.");
			jQuery("#loading").hide();
			document.getElementById("nomeempresa").focus();
			return;
		} 
		if(J("#cnpj").val() == ""){
			alert("Por favor, informe o CNPJ da empresa.");
			jQuery("#loading").hide();
			document.getElementById("cnpj").focus();
			return;
		}
		if(J("#site").val() == ""){
			alert("Por favor, informe o site da empresa.");
			jQuery("#loading").hide();
			document.getElementById("site").focus();
			return;
		}
		if(J("#pessoaresponsavel").val() == ""){
			alert("Por favor, informe o nome da pessoa responsável.");
			jQuery("#loading").hide();
			document.getElementById("pessoaresponsavel").focus();
			return;
		}
		
		cnpj = J("#cnpj").val();
		if(!validaCNPJ(cnpj)) {
			alert("Por favor, informe um CNPJ válido.");
			return;
		}
	 }
	 else{
		if(J("#nomecompleto").val() == ""){
				alert("Por favor, informe o seu nome.");
				jQuery("#loading").hide();
				document.getElementById("nomecompleto").focus();
				return; 
		} 
		if(J("#cpf").val() == ""){
			alert("Informe o seu cpf.")
			document.getElementById("cpf").focus();
			return;
		}
		if(J("#datanascimento").val() == ""){
			alert("Informe a data do seu nascimento.")
			document.getElementById("datanascimento").focus();
			return;
		}
		 sexo = J("input[name=sexo]:checked").val();
		
		cpf = J("#cpf").val();
		if(!validaCPF(cpf)) {
			alert("Por favor, informe um CPF válido.");
			return;
		}
		
		var DataNascimento = J("#datanascimento").val();
		if(!verificaData(DataNascimento)) {
			alert("Por favor, informe uma data de nascimento válida.");
			return;
		}
	 }
	 
	if(J("#ddd1").val() == ""){

		alert("Por favor, informe o DDD do telefone");
		jQuery("#loading").hide();
		document.getElementById("ddd").focus();
		return;
	}	
	if(J("#telefonefixo").val() == ""){

		alert("Por favor, informe seu telefone.");
		jQuery("#telefonefixo").hide();
		document.getElementById("telefonefixo").focus();
		return;
	}	
	if(J("#ddd2").val() == ""){

		alert("Por favor, informe o DDD do celular");
		jQuery("#loading").hide();
		document.getElementById("ddd2").focus();
		return;
	}	
	if(J("#celular").val() == ""){

		alert("Por favor, informe seu celular.");
		jQuery("#loading").hide();
		document.getElementById("celular").focus();
		return;
	}
	
	if(J("#cep").val() == ""){

		alert("Por favor, informe seu cep.");
		jQuery("#loading").hide();
		document.getElementById("cep").focus();
		return;
	}
	if(J("#estado").val() == ""){

		alert("Por favor, informe seu estado.");
		jQuery("#loading").hide();
		document.getElementById("estado").focus();
		return;
	}
	if(J("#cidadeusuario").val() == ""){

		alert("Por favor, informe sua cidade.");
		jQuery("#loading").hide();
		document.getElementById("cidadeusuario").focus();
		return;
	}
	if(J("#bairro").val() == ""){

		alert("Por favor, informe seu bairro.");
		jQuery("#loading").hide();
		document.getElementById("bairro").focus();
		return;
	} 
	 if(J("#endereco").val() == ""){

		alert("Por favor, informe seu endereco.");
		jQuery("#loading").hide();
		document.getElementById("endereco").focus();
		return;
	} 
	if(J("#numero").val() == ""){

		alert("Por favor, informe o número.");
		jQuery("#loading").hide();
		document.getElementById("numero").focus();
		return;
	}


 	if(J("#emailcadastro").val() == "Insira seu e-mail"){
	    alert("Por favor, informe seu email.");
		jQuery("#loading").hide();
		document.getElementById("emailcadastro").focus();
		return;
	}
	
	if(J("#passwordcad").val() == ""){
	    alert("Por favor, informe sua senha.");
		jQuery("#loading").hide();
		document.getElementById("passwordcad").focus();
		return;
	}
	
	if(J("#password2").val() == ""){

		alert("Por favor, redigite sua senha.");
		jQuery("#loading").hide();
		document.getElementById("password2").focus();
		return;
	} 
	if(J("#password2").val() != J("#passwordcad").val() ){
	    alert("Por favor, revise suas senhas, elas não conferem.");
		jQuery("#loading").hide();
		document.getElementById("password2").focus();
		return;
	} 	
	if(J("#local").val() =="" ){
	    alert("Por favor,  informe onde nos conheceu.");
		jQuery("#loading").hide();
		document.getElementById("local").focus();
		return;
	} 
	
    var checkreceber="";
	J(".cinput:checked").each(function(){
		checkreceber = ' [' + this.value + '] ';
	});
    
	/*
	 <? if($INI['option']['termosobrigatorio']=="Y"){ ?>
		var aceitar=''; 
		aceitar = J("input[type=checkbox][name=aceitardb2]:checked").val() 
		if( aceitar != "on" & aceitar != "1") {
				alert("Você precisa aceitar a política de privacidade para realizar o seu cadastro")
				return;
		}
	<? } ?>
	*/
	J.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: "<?php echo $INI['system']['wwwprefix']?>/autenticacao/login.php",
		  data: "acao=cadastro&telefonefixo="+J("#telefonefixo").val()+"&numero="+J("#numero").val()+"&cidadeusuario="+J("#cidadeusuario").val()+"&cep="+J("#cep").val()+"&endereco="+J("#endereco").val()+"&estado="+J("#estado").val()+"&complemento="+J("#complemento").val()+"&bairro="+J("#bairro").val()+"&cpf="+cpf+"&tipoanunciante="+tipoanunciante+"&receberofertas="+checkreceber+"&username="+J("#username").val()+"&passwordcad="+J("#passwordcad").val()+"&emailcadastro="+J("#emailcadastro").val()+"&local="+J("#local").val()+"&password2="+J("#password2").val()+"&nomeempresa="+J("#nomeempresa").val()+"&cnpj="+J("#cnpj").val()+"&site="+J("#site").val()+"&pessoaresponsavel="+J("#pessoaresponsavel").val()+"&nomecompleto="+J("#nomecompleto").val()+"&datanascimento="+J("#datanascimento").val()+"&ddd1="+J("#ddd1").val()+"&ddd2="+J("#ddd2").val()+"&celular="+J("#celular").val()+"&nextel="+J("#nextel").val()+"&sexo="+J("#sexo").val(),
	 	 
		   success: function(user_id){
		 
		   flag =  user_id.indexOf("Falha");
		 
			if(flag!=-1){ 
				 alert(user_id);
				jQuery("#loading").hide();
			} 
			else {  
			  J("#idusuario").val(user_id);
			  idusuario = jQuery.trim(user_id);
			  jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Realizamos seu cadastro com sucesso..."});
			  location.href  = '<?php echo $INI['system']['wwwprefix']?>';
			 }
		}
	});	
}

function getEndereco() {
 
	// Se o campo CEP não estiver vazio
	if(J.trim(J("#cep").val()) != ""){
		/* 
			Para conectar no serviço e executar o json, precisamos usar a função
			getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
			dataTypes não possibilitam esta interação entre domínios diferentes
			Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
			http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+J("#cep").val()
		*/
		J.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+J("#cep").val(), function(){
			// o getScript dá um eval no script, então é só ler!
			//Se o resultado for igual a 1
			if(resultadoCEP["resultado"]){
				// troca o valor dos elementos
				J("#endereco").val(unescape(resultadoCEP["tipo_logradouro"])+"  "+unescape(resultadoCEP["logradouro"]));
				J("#bairro").val(unescape(resultadoCEP["bairro"]));
				//J("#cidadeusuario").val(unescape(resultadoCEP["cidade"]));
				//J("#estado").val(unescape(resultadoCEP["uf"])); 
				var cidade = unescape(resultadoCEP["cidade"]);
				var CidadeUsuario = removerAcentos(cidade);
				J("#cidadeusuario").val(unescape(CidadeUsuario));
				J("#estado").val(unescape(resultadoCEP["uf"]));
				
			}else{
				alert("Endereço não encontrado");
			}
		});				
	}			
}
</script>
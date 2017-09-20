<div style="display:none;" class="tips"><?=__FILE__?></div>

<?php   
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/app.php');
?>
 
<div style='display:none'>
   
<!-- DIV PARA LOGAR -->
	<div id='inline_logar' style='background:#fff; padding:10px; width:490px !important ;height:120px;'>
		<form method="POST" id="formauth" style="">
			<div style="float: left; margin-right:5px;">
				 <div style="margin-bottom: 5px;"><span style="color:#303030;font-size:12px;">Email</span></div>
				 <input type="text" style="width:246px;font-size:12px;color:#303030;height:25px;" value="Insira seu e-mail" onblur="if(this.value=='') this.value='Insira seu e-mail'" onfocus="if(this.value =='Insira seu e-mail' ) this.value=''" id="email" name="email">
			</div>
			<div style="float: left;margin-right:5px;">
				<div style="margin-bottom: 5px;"><span style="color:#303030;font-size:12px;">Senha</span></div>
				<input type="password" style="width:190px;font-size:12px;color:#303030;height:25px;"  id="password" name="password">
			</div>
			<div style="float: left; padding-top: 20px;">
				<a class="link-1" style="" href="javascript:entrar();"><em><b>Entrar</b></em></a>
			</div>
		 
		   <div id="loading" style="clear: both;color:#303030;font-size:12px;"> </div>
			<div style="margin-top: 10px; float: left; clear: both; ">
				<a href="#" style="color:#303030;font-size:12px;"  class="tk_esquecisenha cboxElement"> Esqueci minha senha </a> | <a href="#" style="color:#303030;font-size:12px;"  class="tk_cadastrar cboxElement"> Quero me cadastrar </a>
			</div>
		</form>  
	</div>

	<!-- DIV PARA CADASTRAR -->
	<div id='inline_cadastrar' style='padding:10px; background:#fff;height:390px; width:870px !important'>
	
		<div style="width: 461px; margin-left: -94px;">
			<h2 style="font-size:25px;margin-left:93px;">Formulário de Cadastro</h2>
		</div>  
		 <form style="clear: both;" id="formcad" name="formcad"  METHOD="POST" action="autenticacao/login.php">
		   <!-- 
		   <div id="loading" style="display:none;clear: both;color:#303030;font-size:11px;">
				<img style="margin-left:100px;float: left;" src="<?=$PATHSKIN?>/images/ajax-loader2.gif"> <div style="margin-left:20px;" id="txt"></div> 
			</div> 
			-->
			<div class="batitulo">Informações do Anunciante</div>
		 
			<div style="clear: both;">
				 <span style="font-family:verdana;color:#303030;font-size:11px;">Tipo do anunciante*</span> 
				<select style="width:243px;height:27px; font-size:11px;color:#303030;padding:4px;" name="tipoanunciante" id="tipoanunciante" onchange="vertipoanunciante();">
				<option value="Revenda">Revenda</option>
				<option value="Particular">Particular</option>
				<option value="Concessionaria">Concessionária</option>
				</select>
			</div>
			<div class="tipoagencia">
				<div class="batitulo">Dados da Empresa</div>
				<div style="float: left;clear: both;">
					<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">Nome da Empresa* (Razão Social) </span></div>
					<input style="width:257px;font-size:11px;color:#303030;margin-right:10px;" name="nomeempresa" type="text"  id="nomeempresa"  />  
				</div>
				<div>
					<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">CNPJ*</span></div>
					<input style="width:257px;font-size:11px;color:#303030;margin-right:10px;" name="cnpj"  type="text"  id="cnpj"  /> <img alt="Se o seu CNPJ estiver incorreto, o anúncio não irá ao ar. Por favor informe o número correto"  title="Se o seu CNPJ estiver incorreto, o anúncio não irá ao ar. Por favor informe o número correto" style="width:36px"; src="<?=$PATHSKIN?>/images/icone-atencao.gif"> <span style="font-family:verdana;color:#303030;font-size:11px;">&nbsp;<img class="tTip" title="O CNPJ é um dado de identificação importante, que garante maior segurança em suas informações cadastrais inseridas no banco de dados, impossibilitando que dados sejam inseridos em duplicidade. Ficamos à disposição para quaisquer esclarecimentos e alterações de seus dados cadastrais." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">  Porque pedimos o CNPJ ?</span>
				</div> 
				
				<div style="float: left;clear: both;">
					<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">Site*</span></div>
					<input style="width:257px;font-size:11px;color:#303030;margin-right:10px;" name="site" type="text"  id="site"/>
				</div>
				<div>
					<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">Pessoa Responsável*</span></div>
					<input style="width:257px;font-size:11px;color:#303030;margin-right:10px;" name="pessoaresponsavel"  type="text"  id="pessoaresponsavel"  />
				</div> 
			</div>
			
			<div class="tipoparticular" style="display:none;">
				<div class="batitulo">Dados Pessoais</div>
				<div style="float: left;clear: both;">
					<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">Nome Completo* </span></div>
					<input style="width:257px;font-size:11px;color:#303030;margin-right:10px;" name="nomecompleto" type="text"  id="nomecompleto"  />  
				</div>
				<div>
					<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">CPF*</span></div>
					<input style="width:257px;font-size:11px;color:#303030;margin-right:10px;" name="cpf"  type="text"  id="cpf"  /><img alt="Se o seu CPF estiver incorreto, o anúncio não irá ao ar. Por favor informe o número correto"  title="Se o seu CPF estiver incorreto, o anúncio não irá ao ar. Por favor informe o número correto" style="width:36px"; src="<?=$PATHSKIN?>/images/icone-atencao.gif"> <span style="margin-top:10px;color:blue;font-size:11px;">  <span style="font-family:verdana;color:#303030;font-size:11px;">&nbsp;<img class="tTip" title="O CPF é um dado de identificação importante, pessoal e intransferível, que garante maior segurança em suas informações cadastrais inseridas no banco de dados, impossibilitando que dados sejam inseridos em duplicidade. Ficamos à disposição para quaisquer esclarecimentos e alterações de seus dados cadastrais. Tanto o CPF quanto seus demais dados serão mantidos em completo sigilo, pela Soumais Renault e seus parceiros, não sendo repassados a terceiros sob nenhuma hipótese." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">  Porque pedimos o CPF ?</span>
				</div> 
				
				<div style="float: left;clear: both;margin-right:20px;">
					<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">Sexo*</span></div>
					<input style="width:20px;" type="radio"  checked value="Masculino" id="sexo" name="sexo" > <span style="font-family:verdana;color:#303030;font-size:11px;">Masculino  </span>
					<input style="width:20px;" type="radio"  value="Feminino" id="sexo" name="sexo"> <span style="font-family:verdana;color:#303030;font-size:11px;">Feminino     </span>
				</div>
				<div>
					<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">Data de Nascimento*</span></div>
					<input style="width:257px;font-size:11px;color:#303030;margin-right:10px;" name="datanascimento"  type="text"  id="datanascimento"  />
				</div> 
			</div>
			
			 
		 	<div class="batitulo">Dados Contato</div>
			<div style="float: left;clear: both;">
				<div><span style="font-family:verdana;color:#303030;font-size:11px;">Telefone</span></div>
				 <input style="width:20px;font-size:11px;color:#303030;margin-right:5px;margin-bottom:5px;" name="ddd1" type="text" id="ddd1"  maxlength="2" onKeyPress="return SomenteNumero(event);" />
				 <input style="width:151px;font-size:11px;color:#303030;margin-right:53px;margin-bottom:5px;" name="telefonefixo" type="text" id="telefonefixo" maxlength="9" onKeyPress="return SomenteNumero(event);" />
			</div>
			<div style="float: left; ">
				 <div><span style="font-family:verdana;color:#303030;font-size:11px;">Celular</span></div>
				 <input style="width:20px;font-size:11px;color:#303030;margin-right:5px;margin-bottom:5px;" name="ddd2" type="text" id="ddd2" maxlength="2" onKeyPress="return SomenteNumero(event);" />
				 <input style="width:151px;font-size:11px;color:#303030;margin-right:53px;margin-bottom:5px;" name="celular" type="text" id="celular" maxlength="9" onKeyPress="return SomenteNumero(event);" />
			 </div> 
			<div class="tipoagencia">
				<div><span style="font-family:verdana;color:#303030;font-size:11px;">WhatsApp</span></div>
				 <input style="width:151px;font-size:11px;color:#303030;margin-right:10px;margin-bottom:5px;" name="nextel" type="text" id="nextel"  />
			</div> 
		 
			  
			<div class="batitulo" style="clear: both;margin-top: 5px;">Informações de Endereço (Seu endereço não será divulgado no anúncio)</div>
			<div style="float: left;clear: both;">
				<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">Cep* <span class="txtmenor"><a href="http://www.buscacep.correios.com.br/" target="_blank">Consultar CEP</a></span></span></div> 
				 <input style="width:149px;font-size:11px;color:#303030;margin-right:10px;"  onKeyPress="return SomenteNumero(event);" name="cep"  onblur="getEndereco();" type="text" id="cep"    />
			</div>
			<div style="float: left; ">
				 <div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">Estado*</span></div> 
					<select style="width:138px;height:27px; font-size:11px;color:#303030;padding:4px;"  name="estado" id="estado">
					<option value=""></option>
					<?php
						$sql = "SELECT  uf,nome FROM estados order by nome";
						$estados = mysql_query($sql) or die(mysql_error());
						while ($row = mysql_fetch_array($estados, MYSQL_ASSOC)) {
							if ($team['uf'] == $row['uf']) {
								$tmp_estado = $row['uf'];
								echo "<option value='{$row['uf']}' selected>".utf8_decode($row['nome'])."</option>";
							} else {
								echo "<option value='{$row['uf']}'>".utf8_decode($row['nome'])."</option>";		
							}
						}
					?>
					</select>
			 </div> 
			<div style="float: left; ">
				<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">Cidade*</span></div>
				 <select style="width:285px;height:27px; font-size:11px;color:#303030;margin-left:10px;padding:4px;"  name="cidadeusuario" id="cidadeusuario">
					<option value=""></option>
					<?php
						$SQL = "SELECT * FROM cidades order by nome";
						$cidades = mysql_query($SQL) or die(mysql_error());
						while ($row = mysql_fetch_array($cidades, MYSQL_ASSOC)) {
							if ($team['city_id'] == $row['id']) {
								$tmp_cidade = $row['nome'];
								echo "<option value='{$row['nome']}' selected>{$row['nome']}</option>";
							} else {
								echo "<option value='{$row['nome']}'>{$row['nome']}</option>";
							}
						}
					?>
					</select> 
			 </div>  
			 <div>
				<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">Bairro*</span></div>
				  <input style="width:229px;font-size:11px;color:#303030;margin-left:10px;"  name="bairro"   type="text" id="bairro"    />
			 </div> 
			 <div style="float: left; ">
				<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">Endereço*</span></div>
				   <input style="width:443px;font-size:11px;color:#303030;margin-right:10px;"  name="endereco"   type="text" id="endereco"    />
			 </div> 	 
			 <div style="float: left; ">
				<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">Número*</span></div>
				   <input style="width:59px;font-size:11px;color:#303030;margin-right:10px;" onKeyPress="return SomenteNumero(event);" name="numero"   type="text" id="numero"    />
			 </div> 	
			 <div>
				<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">Complemento</span></div>
				   <input style="width:294px;font-size:11px;color:#303030;"  name="complemento"   type="text" id="complemento"    />
			 </div> 
			 
			 <div class="batitulo">Dados de Acesso</div> 
			 <div style="float: left;clear: both;">
				<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">Email*</span></div>
				<input style="width:238px;font-size:11px;color:#303030;margin-right:10px;" name="emailcadastro"  type="text"  id="emailcadastro" onFocus="if(this.value =='Insira seu e-mail' ) this.value=''" onBlur="if(this.value=='') this.value='Insira seu e-mail'" value="Insira seu e-mail"  />
			 </div>
			 <div style="float: left; ">
				<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">Senha*</span></div>
				<input style="width:153px;font-size:11px;color:#303030;margin-right:10px;" name="passwordcad" type="password" id="passwordcad"  /></div>
				<div style="float: left; ">
				<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">Repita a senha*</span></div>
				<input style="width:155px;font-size:11px;color:#303030;margin-right:10px;" name="password2"  type="password"  id="password2"   />
			 </div>  
			<div>
				<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:11px;">Onde nos conheceu ?*</span></div>
				<select style="width:243px;height:27px; font-size:11px;color:#303030;padding:4px;" name="local" id="local">
					<option value=""></option>
					<option value="Google">Google</option>
					<option value="Facebook">Facebook</option>
					<option value="Jornal">Jornal</option>
					<option value="Rádio">Rádio</option>
					<option value="Indicação">Indicação</option>
					<option value="Outros">Outros</option>
				</select>
			</div>
			 
		    <div style="clear:both;"> 
				<div style="padding-top: 20px;float: left;margin-right:23px; ">
					<a class="link-1" style="" href="javascript:cadastropop();"><em><b>Cadastrar</b></em></a>
				</div>
				
				<div style="margin-top: 20px;width:218px;margin-left:0px;float: left;">
					<a href="#" style="font-family:verdana;color:#303030;font-size:11px;" class="tk_logar cboxElement">Já sou cadastrado, quero logar</a>
				</div>
				<? if($INI['option']['termosobrigatorio']=="Y"){ ?>
					<div style="color: #303030; font-size: 12px; float: right; width: 299px; margin-top: 20px; margin-right: 214px;">
						<input style="width:10px;" type="checkbox" value="1" name="aceitardb2" id="aceitardb2"> Aceito a pol&iacute;tica de privacidade. <a target="_blank" href="<?=$ROOTPATH?>/page/about_privacy/Politicas%20de%20Privacidade">Clique para ler</a>
					</div>
				<? } ?>
				 <div class="txtmenor" style="float:right;"><img   style="width:36px"; src="<?=$PATHSKIN?>/images/icone-atencao.gif"> Atenção: Configure seu anti-spam para receber nossos e-mails e propostas.</div>
				 <div style="float: left; clear: both; width: 778px;">
					<input style="width:20px;" type="checkbox" class="cinput" id="receberofertas" checked name="receberofertas"/> <span style="font-family:verdana;color:#303030;font-size:12px;"> Desejo receber novidades do site <?php echo utf8_decode( $INI['system']['sitename']); ?>  e seus parceiros</span>
				 </div>				
			</div>
		</div>
			 
	<!-- DIV PARA ESQUECI SENHA -->
	 
	 <div id='inline_esquecisenha' style='background:#fff; height:110px; padding:10px; width:345px !important'>
		<div>
			<form method="POST" id="formauth" style="width: 345px !important">
				<div style="float: left; width: 235px;">
						<div style="margin-bottom: 5px;"><span style="color:#303030;font-size:11px;">E-mail</span></div>
						<input type="text" value="Insira seu e-mail" onblur="if(this.value=='') this.value='Insira seu e-mail'" onfocus="if(this.value =='Insira seu e-mail' ) this.value=''" id="email" 	style="width:200px;font-size:11px;color:#303030;margin-right:10px;"	name="email">
				 </div>
				<div style="float: left; padding-top: 20px; width: 88px;">
					<a class="link-1" style="" href="javascript:enviar();"><em><b>Enviar</b></em></a>
				</div>
				<div id="loading" style="clear: both;color:#303030;font-size:11px;"> </div> 
				 
				<div style="margin-top: 10px; float: left; clear: both; width: 70px;,">
					<a href="#" style="color:#303030;font-size:11px;" class="tk_logar cboxElement">voltar</a>
				</div>
			</form>
		</div>
   </div> 
  
</div>
	
<script language="javascript">

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

// post logar
function entrar(){
		 
	if(J("#email").val() == "" ||  J("#email").val() == "Insira seu e-mail"){ 
		alert("Por favor, informe seu email.");
		jQuery("#loading").html("");
		document.getElementById("email").focus();
		return;
	}
	 
	if(J("#password").val() == ""){ 
		alert("Por favor, informe sua senha.");
		jQuery("#loading").html("");
		document.getElementById("password").focus();
		return;
	}
 
  // jQuery("#loading").html("<img style=margin-left:80px; src=<?=$PATHSKIN?>/images/ajax-loader2.gif> <span style=margin-top:10px;color:blue;font-size:11px;> Estamos validando seus dados...</span>");
	 	
	J.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: "<?php echo $INI['system']['wwwprefix']?>/autenticacao/login.php",
		   data: "acao=logintoupup&email="+J("#email").val()+"&password="+J("#password").val(),
		   success: function(user_id){
			
		   idusuario = jQuery.trim(user_id);
		   if(jQuery.trim(idusuario)=="00"){
		     
				 alert("Não foi possível fazer o seu login. Por favor, verifique os seus dados.");
				 jQuery("#loading").html("");
			 } 
		   else { 
			   
			  if(J("#utm").val()=="1"){
				  if(J("#tipooferta").val()=="participe"){
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

//post esqueci senha
function enviar(){
	  
	if(J("#email").val() == "" ||  J("#email").val() == "Insira seu e-mail" ){
	    alert("Por favor, informe seu email.");
		jQuery("#loading").html("");
		document.getElementById("email").focus();
		return;
	}
	 
  //jQuery("#loading").html("<img style=margin-left:50px; src=<?=$PATHSKIN?>/images/ajax-loader2.gif> Estamos validando seu email...");
  
	J.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: "<?php echo $INI['system']['wwwprefix']?>/autenticacao/repass.php",
		   data: "email="+J("#email").val(),
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
    
	 <? if($INI['option']['termosobrigatorio']=="Y"){ ?>
		var aceitar=''; 
		aceitar = J("input[type=checkbox][name=aceitardb2]:checked").val() 
		if( aceitar != "on" & aceitar != "1") {
				alert("Você precisa aceitar a política de privacidade para realizar o seu cadastro")
				return;
		}
	<? } ?>
	
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
			  location.href  = '<?php echo $INI['system']['wwwprefix']?>/index.php?<?php echo $_SERVER["QUERY_STRING"] ?>';
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
					
					var cidade = unescape(resultadoCEP["cidade"]);
					var CidadeUsuario = removerAcentos(cidade);
					J("#cidadeusuario").val(CidadeUsuario);
					J("#estado").val(unescape(resultadoCEP["uf"]));
				}else{
					alert("Endereço não encontrado");
				}
			});				
		}			
}
 
	
jQuery(document).ready(function(){
   J("#datanascimento").mask("99/99/9999");
    
  //  J("#telefone").mask("9999-9999");
   // J("#entrega_telefone").mask("(99)99999-9999");
   //J("#").mask("99-9999999");
   //J("#ssn").mask("999-99-9999");
    J("#cpf").mask("999999999-99");
    J("#cnpj").mask("99.999.999/9999-99");
  // J("#estado").mask("aa");
  // J("#ddd").mask("99");
});

 

/*
jQuery('#inline_logar input').bind('keypress', function(e) {
        if(e.keyCode==13){
		entrar();
	}
});
jQuery('#inline_cadastrar input').bind('keypress', function(e) {
        if(e.keyCode==13){
			cadastropop();
	}
});
jQuery('#inline_esquecisenha input').bind('keypress', function(e) {
        if(e.keyCode==13){
			enviar();
	}
});*/
 
URL = "<?php echo $ROOTPATH; ?>/ajax/filtro_pesquisa_cadastro.php";
jQuery(function() {
	jQuery('#estado').bind('change', function(ev) {
		jQuery.ajax({
			url: URL,
			type: 'POST',
			data: { filtro: 'cidades', estado: jQuery('#estado').val() },
			beforeSend: function() {
				jQuery('#select_city_id').html('Carregando...');
				jQuery('#cidadeusuario').html('<option>Carregando...</option>');
			},
			success: function(r) {
				jQuery('#select_city_id').html('Selecione uma cidade');
				jQuery('#cidadeusuario').html(r);
			}
		});
	});
}); 
</script>
											
	
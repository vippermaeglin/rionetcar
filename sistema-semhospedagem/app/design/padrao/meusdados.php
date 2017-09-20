<?php  
require_once("include/code/meusdados.php");
require_once("include/head.php"); 

?>
<style>
input, textarea {
  height: 17px;
  padding: 2px;
} 
</style>
<body id="page1">
  
<div style="display:none;" class="tips"><?=__FILE__?></div>
<div class="tail-top"> 
<?php  require_once(DIR_BLOCO."/bloco_background.php"); ?>
    <div class="main">
       <?php  require_once(DIR_BLOCO."/header.php"); ?>
		<section id="content">
            <?php  require_once(DIR_BLOCO."/bannertopo.php"); ?>
            <div class="inside" style="padding:0 19px 0px 10px">
				<div class="container">
				<div class="col-1c"> 
						<div class="container">
						  <div class="col-6" style="width:96%;">
							<div class="titulosecao2"><span class="txt7"><a style="color:#fff;" href="index.php?page=meusdados">Meus Dados</a> <? if(file_exists(WWW_MOD."/anunciante.inc")){ ?> | <a style="color:#fff;" target="_blank" href="adminanunciante/team/index.php">Meus Anúncios</a> | <a style="color:#fff;" target="_blank" href="adminanunciante/">Fazer Anúncio</a> <? } ?> <? if(file_exists(WWW_MOD."/propostas.inc")){ ?> |  <a style="color:#fff;" target="_blank" href="adminanunciante/team/propostas.php">Propostas</a>  <? } ?>  |  <a style="color:#fff;" href="autenticacao/logout.php">Sair</span></div>
							 <div class="pgavulsafundominhaconta">
								 <span style="color:#94c807;font-size:1.21em; font-family:Trebuchet MS;font-weight:bold;padding:12px;">Meus Dados</span> <a href="javascript:update();" class="link-3"><em><b>Atualizar dados</b></em></a>  
								 <div class="tail" style="margin-top:-12px;"></div>
								  <span style="color:blue;"><? if($msg){  echo $msg; } ?></span> 
								 <form id="formcadupdate" name="formcadupdate" method="post" action="" enctype="multipart/form-data">
								  <table width="629" border="0">
									  <tr>
										<td width="277"><span style="font-family:verdana;color:303030;font-size:12px;">Nome</span></td>
										<td width="33">&nbsp;&nbsp;&nbsp;&nbsp; </td>
										<td width="305"><span style="font-family:verdana;color:303030;font-size:12px;">Email</span></td>
									  </tr>
									  <tr>
										<td><label for="nomeuso"></label>
										   <input name="realname"style="width:424px;font-size:12px;color:#000;;"  type="text"   id="realname" onFocus="if(this.value =='Insira seu nome' ) this.value=''" onBlur="if(this.value=='') this.value='Insira seu nome'" value="<?php echo  utf8_decode($login_user['realname']) ; ?>"  />
									  </td>
										<td>&nbsp;</td>
										<td><label for="email"></label> 
										  <input name="email" style="width:424px;font-size:12px;color:#000;;" type="text"  id="email" onFocus="if(this.value =='Insira seu e-mail' ) this.value=''" onBlur="if(this.value=='') this.value='Insira seu e-mail'" value="<?php echo $login_user['email']; ?>" readonly="readonly"  />
										 </td>
									  </tr>
									 
									<tr>
										<td width="277"><span style="font-family:verdana;color:303030;font-size:12px;">Senha</span></td>
										<td width="33">&nbsp; </td>
										<td width="305"><span style="font-family:verdana;color:303030;font-size:12px;">Redigite a senha</span></td>
									  </tr>
									   <tr>
										<td><label for="nomeuso"></label> 
											 
										   <input name="password" style="width:424px;font-size:12px;color:#000;;" type="password"   id="password" />
										   <div style="font-family:verdana;color:303030;font-size:10px;">Deixe a senha em branco para não atualizar</div>
										</td>
										<td>&nbsp;</td> 
										<td>
										   <input name="password2"  style="width:424px;font-size:13px;color:#000;;" type="password"   id="password2"   />
										 </td>
									  </tr>
										<tr>
										 <td colspan="4">
											 
										<div style="float: left;clear: both;" >
											<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:303030;font-size:12px;">Cep (apenas números)*</span></div>
											 <input style="width:416px;font-size:12px;color:#303030;margin-right:10px;" value="<?=$login_user['zipcode']?>" onKeyPress="return SomenteNumero(event);" name="cep_"  onblur="getEndereco();" type="text" id="cep_"    />
										 </div>
										<div>
											<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:303030;font-size:12px;">Endereço*</span></div>
											 <input style="width:438px;font-size:12px;color:#303030;"  name="endereco_" value="<?=utf8_decode($login_user['address'])?>"  type="text" id="endereco_"    />
										</div>
										
										<!--
										 <div style="float: left;clear: both;" >
											<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:303030;font-size:12px;">DDD*</span></div>
											 <input style="width:20px;font-size:12px;color:#303030;margin-right:10px;" value="<?=$login_user['ddd']?>" name="ddd_"   type="text" id="ddd_"    />
										 </div> 
										 -->
										 
										 <div style="float: left;" >
											<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:303030;font-size:12px;">Número*</span></div>
											 <input style="width:98px;font-size:12px;color:#303030;margin-right:10px;" value="<?=$login_user['numero']?>" name="numero_"   type="text" id="numero_"    />
										 </div> 
										 <div style="float: left;" >
											<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:303030;font-size:12px;">Complemento</span></div>
											 <input style="width:381px;font-size:12px;color:#303030;margin-right:10px;"  value="<?=utf8_decode($login_user['complemento'])?>"name="complemento_"   type="text" id="complemento_"    />
										 </div>
										<div>
											<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:303030;font-size:12px;">Bairro*</span></div>
											 <input style="width:295px;font-size:12px;color:#303030;"  name="bairro_"  value="<?=utf8_decode($login_user['bairro'])?>" type="text" id="bairro_"    />
										</div>
										<div style="float: left;clear: both;" >
											<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:303030;font-size:12px;">Cidade*</span></div>
											 <input style="width:307px;font-size:12px;color:#303030;margin-right:10px;"value="<?=utf8_decode($login_user['cidadeusuario'])?>"  name="cidadeusuario_"   type="text" id="cidadeusuario_"    />
										 </div>
										<div>
											<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:303030;font-size:12px;">Estado*</span></div>
											 <input style="font-size: 12px; color: #303030; margin-right: 9px; width: 60px;"  name="estado_"  value="<?=strtoupper($login_user['estado'])?>" type="text" id="estado_"    />
										</div>
										
										<!--Input da logo do anunciante-->
										<?php
											if($login_user['tipoanunciante'] == "Revenda" OR $login_user['tipoanunciante'] == "Concessionaria"){
										?>
										<div style="margin: 10px 0 20px 0;">
											<div style="margin-bottom: 5px;"><span style="font-family: verdana;color: 303030;font-size: 13px;font-weight: bolder;margin: 0 20px 0 0;">Logo</span><span class="cpanel-date-hint">Máximo de 240px de largura e máximo de 104px de altura</span></div>
											 <input  style="height: 24px;" name="upload_image" type="file" id="upload_image"    />
											  <?php if($login_user['imagem']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo $login_user['imagem']; ?>&nbsp;&nbsp;<a  href="<?=$ROOTPATH."/ajax/manage.php?action=delimagem_revenda&id=".$login_user['id']."&imagem=".$login_user['imagem']?>"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span> <?php }?> 
										</div>
										<?php	
											}
										?>
										<!--Input da logo do anunciante-->
										
										<div style="float: left;">
											<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:303030;font-size:12px;">DDD*</span></div>
											 <input style="width:58px;font-size:12px;color:#303030;"  onKeyPress="return SomenteNumero(event);" name="ddd2" maxlength="3" value="<?=$login_user['ddd2']?> " type="text" id="ddd2"    />
										</div>

										<div>
											<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:303030;font-size:12px;">Telefone* Ex: (31) 3333-1234</span></div>
											<input style="width:159px;font-size:12px;color:#303030;margin-right:10px;"  maxlength="8" onKeyPress="return SomenteNumero(event);" name="entrega_telefone_" value="<?=strtoupper($login_user['telefonefixo'])?>" type="text" id="entrega_telefone"  />
										</div>

										<div style="float: left;">
											<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:303030;font-size:12px;">DDD*</span></div>
											 <input style="width:58px;font-size:12px;color:#303030;"  onKeyPress="return SomenteNumero(event);" name="ddd_" maxlength="3" value="<?=$login_user['ddd']?> " type="text" id="ddd_"    />
										</div>

										
										 <div >
												<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:303030;font-size:12px;">Celular</span></div>
												 <input style="width:409px;font-size:12px;color:#303030;margin-right:10px;"  maxlength="9" onKeyPress="return SomenteNumero(event);" value="<?=$login_user['celular']?>" name="telefone_" type="text" id="telefone_"  />
										 </div>											
										 
										 <div style="float: left;">
											<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:303030;font-size:12px;">DDD*</span></div>
											 <input style="width:58px;font-size:12px;color:#303030;"  onKeyPress="return SomenteNumero(event);" name="ddd2_" maxlength="3" value="<?=$login_user['ddd']?> " type="text" id="ddd2_"    />
										</div>

										
										 <div >
												<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:303030;font-size:12px;">WhatsApp</span></div>
												 <input style="width:409px;font-size:12px;color:#303030;margin-right:10px;"  maxlength="9" onKeyPress="return SomenteNumero(event);" value="<?=$login_user['nextel']?>" name="nextel_" type="text" id="nextel_"  />
										 </div>	
									
										</td> 
									   </tr>
								    </table>
									</form>
								 </div>
							</div>
						 </div> 
					</div>
				</div>
			</div>
        </section>
    </div>
</div> 
 
<?php
require_once(DIR_BLOCO."/rodape.php");
?>
  <script type="text/javascript" src="<?=$ROOTPATH?>/js/include_select_css.js"></script>

  <script>
  
	function update(){
			 
		if(J("#password").val() != "" & J("#password2").val() == ""){
			alert("Por favor, repita a senha ou deixe os campos em branco para não alterar.")
			document.getElementById("password2").focus();
			return;
		}
		if(J("#password").val() != J("#password2").val()){
			alert("As senhas não conferem. Caso não queira alterar as senhas, deixe-as em branco.")
			document.getElementById("password2").focus();
			return;
		}
		 
  // dados de enredeço
	 
	if(J("#cep_").val() == ""){

		alert("Por favor, informe seu cep.");
		jQuery("#loading").hide();
		document.getElementById("cep_").focus();
		return;
	}
	 if(J("#endereco_").val() == ""){

		alert("Por favor, informe seu endereco.");
		jQuery("#loading").hide();
		document.getElementById("endereco_").focus();
		return;
	} 
	/*
	if(J("#ddd_").val() == ""){

		alert("Por favor, informe o DDD.");
		jQuery("#loading").hide();
		document.getElementById("ddd_").focus();
		return;
	}
	*/
	if(J("#numero_").val() == ""){

		alert("Por favor, informe o número.");
		jQuery("#loading").hide();
		document.getElementById("numero_").focus();
		return;
	}
	if(J("#bairro_").val() == ""){

		alert("Por favor, informe seu bairro.");
		jQuery("#loading").hide();
		document.getElementById("bairro_").focus();
		return;
	}
	if(J("#cidadeusuario_").val() == ""){

		alert("Por favor, informe sua cidade.");
		jQuery("#loading").hide();
		document.getElementById("cidadeusuario_").focus();
		return;
	}
	if(J("#estado_").val() == ""){

		alert("Por favor, informe seu estado.");
		jQuery("#loading").hide();
		document.getElementById("estado_").focus();
		return;
	}	
	if(J("#ddd_").val() == ""){

		alert("Por favor, informe seu DDD.");
		jQuery("#loading").hide();
		document.getElementById("ddd_").focus();
		return;
	}	
	if(J("#telefone_").val() == ""){

		alert("Por favor, informe seu telefone.");
		jQuery("#loading").hide();
		document.getElementById("telefone_").focus();
		return;
	}
	
	  J("#formcadupdate").submit();
			 
			 
	}
	
	
function getEndereco() {
 
		// Se o campo CEP não estiver vazio
		if(J.trim(J("#cep_").val()) != ""){
			/* 
				Para conectar no serviço e executar o json, precisamos usar a função
				getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
				dataTypes não possibilitam esta interação entre domínios diferentes
				Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
				http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+J("#cep").val()
			*/
			J.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+J("#cep_").val(), function(){
				// o getScript dá um eval no script, então é só ler!
				//Se o resultado for igual a 1
				if(resultadoCEP["resultado"]){
					// troca o valor dos elementos
					J("#endereco_").val(unescape(resultadoCEP["tipo_logradouro"])+"  "+unescape(resultadoCEP["logradouro"]));
					J("#bairro_").val(unescape(resultadoCEP["bairro"]));
					J("#cidadeusuario_").val(unescape(resultadoCEP["cidade"]));
					J("#estado_").val(unescape(resultadoCEP["uf"]));
				}else{
					alert("Endereço não encontrado");
				}
			});				
		}			
}

jQuery(document).ready(function(){
  // J("#date").mask("99/99/9999");
  // J("#telefone_").mask("(99) 9999-9999");
   //J("#").mask("99-9999999");
   //J("#ssn").mask("999-99-9999");
   J("#cpf").mask("999999999-99");
   J("#cep_").mask("99999999");
   J("#estado_").mask("aa");
});
 
 </script>
  
 

</body>
</html>

<?php
require_once("include/code/parceiro.php");
$pagetitle =  "Veja todas as vantagens de ser um de nossos parceiros";
?> 
<?php  require_once("include/head.php"); ?>
<body id="page1">
<div class="tail-top">
<?php  require_once(DIR_BLOCO."/bloco_background.php"); ?>
    <div class="main">
       <?php  require_once(DIR_BLOCO."/header.php"); ?>
		<section id="content">
			
			<?php  require_once(DIR_BLOCO."/bannertopo.php"); ?>
            <div class="inside">
				<div class="container">
					<div class="col-1c">
						<div class="container">
							<div class="col-6" style="width:929px;" >
							  <div style="display:none;" class="tips"><?=__FILE__?></div>
							   <? if($_REQUEST["acao"] == "" or $_POST["acao"] == "enviadados") { ?>
								 <h2> <?=$pagetitle?> </h2>
								 <div style="float:left;margin-top:13px;width:593px;font-family:arial;">
								<div class="tail"><span style="color:303030;font-size:13px;">Divulgação de seus anúncios pelo tempo que durar </span></div>
								<div class="tail"><span style="color:303030;font-size:13px;">Um canal de divulgação por toda a internet</span></div>
								<div class="tail"><span style="color:303030;font-size:13px;">Enviamos seus anúncios para milhares de e-mails de nossa base diariamente</span></div>
								<div class="tail"><span style="color:303030;font-size:13px;">Facilidade de encontrar seu anúncios através dos buscadores e pesquisas como google</span></div>
								<div class="tail"><span style="color:303030;font-size:13px;">São milhares de clientes em potencial e divulgação de sua marca por todo o Brasil</span></div>
								 <br class="clear" />
								 <br class="clear" />
								 <br class="clear" />
								 <a href="index.php?page=parceiro&acao=proximo" class="link-1"><em><b>Clique aqui para ser nosso parceiro</b></em></a>
								</div>
								 
									<img style="position: absolute; right: 22px; margin-top: 0px;" src="<?=$ROOTPATH?>/skin/padrao/images/impgparceiro.jpg">
								  
							  <? } ?>
							 
							 <?php if( $_REQUEST['acao'] == "proximo") { ?>
							  
								<form id="acaoformcadparceiro" name="acaoformcadparceiro"  METHOD="POST" > 
								<br> 
								<div style="font-size:16px;" class="tail"><b style="color: #4F4F4F; font-size: 20px;">Dados Gerais</b></div>
								<br> 
								<table width="629" border="0"  style="color: #4F4F4F">
								  <tr>
									<td width="277">Nome</td>
									<td width="33">&nbsp;&nbsp;&nbsp;&nbsp; </td>
									<td width="305">Sobrenome</td>
								  </tr>
								  <tr>
									<td><label for="nomeuso"></label>
									   <input style="width:424px;font-size:13px;color:#000;" name="nome" type="text"  id="nome" />
									 </td>
									<td>&nbsp;</td>
									<td><label for="email"></label> 
									 <input style="width:398px;font-size:13px;color:#000;" name="sobrenome"  type="text"  id="sobrenome"   />
									 </td>
								  </tr>
								   
								   <tr>
									<td width="277">Empresa</td>
									<td width="33">&nbsp; </td>
									<td width="305">Email</td>
								  </tr>
								   <tr>
									<td><label for="nomeuso"></label> 
										 <input style="width:424px;font-size:13px;color:#000;" name="empresa"   id="empresa"  />
									 </td>
									<td>&nbsp;</td> 
									<td>
									   <input style="width:398px;font-size:13px;color:#000;" name="email"   id="email"   />
									 </td>
								  </tr>
									<tr>
									 <td>&nbsp;</td>
									 <td>&nbsp;</td>
									 <td>&nbsp;</td>
								   </tr>
								  </tr>
								 </table>
								 
							 <div style="font-size:16px;" class="tail"><b style="color: #4F4F4F; font-size: 20px;">Dados do seu negócio</b></div>
								<br> 
								<table width="629" border="0"  style="color: #4F4F4F">
								  <tr>
									<td width="277">Categoria</td>
									<td width="33">&nbsp;&nbsp;&nbsp;&nbsp; </td>
									<td width="305">Telefone</td>
								  </tr>
								  <tr>
									<td><label for="nomeuso"></label>
									   <input style="width:424px;font-size:13px;color:#000;" name="categoria" type="text"  id="categoria"   />
									 </td>
									<td>&nbsp;</td>
									<td><label for="email"></label> 
									 <input style="width:398px;font-size:13px;color:#000;" name="telefoneparceiro"  type="text"  id="telefoneparceiro"    />
									 </td>
								  </tr>
									<tr>
									<td width="277">Site</td>
									<td width="33">&nbsp;&nbsp;&nbsp;&nbsp; </td>
									<td width="305">Endereço</td>
								  </tr>
								   <tr>
									<td><label for="nomeuso"></label> 
									 <input style="width:424px;font-size:13px;color:#000;" name="site"  type="text" id="site"    />
									  </td>
									<td>&nbsp;</td>
									<td>
										  <input style="width:398px;font-size:13px;color:#000;" name="enderecoparceiro"  type="text" id="enderecoparceiro"    />
									 </td>
								  </tr>
									<tr>
									<td width="277">Estado</td>
									<td width="33">&nbsp; </td>
									<td width="305">Cidade</td>
								  </tr>
								   <tr>
									<td><label for="nomeuso"></label> 
										 <select name="websites3parceiro" id="websites3parceiro" style="width:440px;  height:33px; font-size:13px; margin-left: 0px;padding:6px;">
										<option value="">Informe seu estado</option>
										<option value="Acre">Acre</option><option value="Alagoas">Alagoas</option><option value="Amapá">Amapá</option><option value="Amazonas">Amazonas</option><option value="Bahia">Bahia</option><option value="Ceará">Ceará</option><option value="Distrito Federal">Distrito Federal</option><option value="Espírito Santo">Espírito Santo</option><option value="Goiás">Goiás</option><option value="Maranhão">Maranhão</option><option value="Mato Grosso">Mato Grosso</option><option value="Mato Grosso do Sul">Mato Grosso do Sul</option><option value="Minas Gerais">Minas Gerais</option><option value="Pará">Pará</option><option value="Paraíba">Paraíba</option><option value="Paraná">Paraná</option><option value="Pernambuco">Pernambuco</option><option value="Piauí">Piauí</option><option value="Rio de Janeiro">Rio de Janeiro</option><option value="Rio Grande do Norte">Rio Grande do Norte</option><option value="Rio Grande do Sul">Rio Grande do Sul</option><option value="Rondônia">Rondônia</option><option value="Santa Catarina">Santa Catarina</option><option value="Roraima">Roraima</option><option value="São Paulo">São Paulo</option><option value="Sergipe">Sergipe</option><option value="Tocantins">Tocantins</option>
										 
									</select>
									  </td>
									<td>&nbsp;</td> 
									<td>
										<input style="width:398px;font-size:13px;color:#000;" name="cidade"  type="text" id="cidade"    />
									 </td>
								  </tr>
								  
									<tr>
									<td width="277">Bairro</td>
									<td width="33">&nbsp; </td>
									<td width="305">CEP</td>
								  </tr>
								   <tr>
									<td><label for="nomeuso"></label> 
										 <input style="width:424px;font-size:13px;color:#000;" name="bairroparceiro"  type="text" id="bairroparceiro"    />
									 </td>
									<td>&nbsp;</td> 
									<td>
									   <input style="width:398px;font-size:13px;color:#000;" name="cepparceiro"  type="text" id="cepparceiro"    />
									 </td>
								  </tr>
								   <tr>
									 <td>&nbsp;</td>
									 <td>&nbsp;</td>
									 <td>&nbsp;</td>
								   </tr>
								   <tr>
									 <td colspan="3">&nbsp;</td>
								   </tr>
								 </table>
								 
								  <div style="font-size:16px;" class="tail"><b style="color: #4F4F4F; font-size: 20px;">Conte um pouco sobre o seu negócio</b></div>
								  <br> 
								 
								  <textarea name="informacoes" id="informacoes" style="color:#000;font-size:14px;width:500px;height:80px;padding:2px;max-width:460px;"></textarea>
								<br class="clear" /> 
							
								   <input type="hidden" name="acao" id="acao"  value="enviadados">
									 <a href="javascript:cadastro();" class="link-1"><em><b>Enviar Dados</b></em></a>
								</form>
								 
							 <? }  ?>
							</div>
						</div>
					</div>
				</div>
			</div>
        </section>
    </div>
</div> 
 
 <?php require_once(DIR_BLOCO."/rodape.php"); ?>
 
 


<script language="javascript">
  
J("#menu1").attr("class","")
J("#menu2").attr("class","")
J("#menu3").attr("class","current")
J("#menu4").attr("class","")

</script>

<script language="javascript">
	  
	function cadastro(){
	 
			if(J("#nome").val() == ""){
				alert("Informe o seu nome.")
				document.getElementById("nome").focus();
				return;
			}
				
			if(J("#sobrenome").val() == ""){
				alert("Insira seu sobrenome.")
				document.getElementById("sobrenome").focus();
				return;
			}
 
			if(J("#empresa").val() == ""){
				alert("Informe o nome de sua empresa.")
				document.getElementById("empresa").focus();
				return;
			}		
			
			if(J("#email").val() == ""){
				alert("Informe o seu email.")
				document.getElementById("email").focus();
				return;
			}	
 
			if(J("#categoria").val() == ""){
				alert("Informe a categoria de suas ofertas.")
				document.getElementById("categoria").focus();
				return;
			}
			if(J("#telefoneparceiro").val() == ""){
				alert("Informe o seu telefone.")
				document.getElementById("telefoneparceiro").focus();
				return;
			}
			if(J("#enderecoparceiro").val() == ""){
				alert("Informe o seu endereço.")
				document.getElementById("enderecoparceiro").focus();
				return;
			}
			 if(J("#websites3parceiro").val() == ""){
				alert("Informe o seu estado.")
				document.getElementById("websites3parceiro").focus();
				return;
			}
			
			if(J("#cidade").val() == ""){
				alert("Informe a sua cidade.")
				document.getElementById("cidade").focus();
				return;
			}
			
			if(J("#bairroparceiro").val() == ""){
				alert("Informe o seu bairro.")
				document.getElementById("bairroparceiro").focus();
				return;
			}
			
			if(J("#cepparceiro").val() == ""){
				alert("Informe o seu cep.")
				document.getElementById("cepparceiro").focus();
				return;
			}
			
			if(J("#informacoes").val() == ""){
				alert("Nos conte um pouco sobre sua empresa.")
				document.getElementById("informacoes").focus();
				return;
			}
			
			 
		   J("#acaoformcadparceiro").submit();
			
	}	
  	 
    <?php  
	if($enviou){ ?> 
		alert("Obrigado ! Entraremos em contato em breve")
		location.href  = '<?php echo $INI['system']['wwwprefix']?>/index.php';
	   <? }
	else if($_POST["acao"] == "enviadados" and !$enviou){?>
		alert("Não foi possível enviar os dados, tente novamente mais tarde.")
	<? } ?>
	 
			
</script>	
 
	
</body>
</html>

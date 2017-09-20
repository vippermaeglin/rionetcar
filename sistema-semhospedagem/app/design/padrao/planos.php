<?php  require_once("include/head.php"); ?>
<body id="page1">
<div style="display:none;" class="tips"><?=__FILE__?></div>
<style type="text/css">
body{ font-family:"verdana", Monaco, monospace;  }
b{ font-size:12px;} 
</style>

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
						   <div class="col-6" style="width:914px" >  
							 <div class="showgridx" style="float:left;width:100%;COLOR:#303030;"> 
							 <h4 class="size-19-bold" style="text-align:left;padding:0px;color:#303030;">Planos e Formas de Pagamento</h4>	
								<div class="stblocoplanos">
								   <!-- 	<img src="<?=$PATHSKIN?>/images/img_cadastro_pessoa_fisica.png" style="margin-right: 18px;"> <img src="<?=$PATHSKIN?>/images/img_cadastro_pessoa_juridica_branco.png">	-->							   
									<table width="890" height="223" border="0"   cellspacing="2"   >
										<tr class="TEE" width="20%" style="background:#767676;">
										<td  width="10" height="31" style="color: #FFFFFF;font-size:14px;background:#fff;"></td>
										<?php
										
										/* Primeiro é verificado se existe usuário logado e se trata de uma particular ou revenda. */
										if(isset($login_user) and !(empty($login_user))){
										
											/* Neste ponto verifico se o usuário já pegou o plano grátis alguma vez. Caso afirmativo
											   o plano gratuito não será exibido.
											*/
											$sql = "SELECT plano_id AS plano FROM `partner_planos` WHERE status = 'gratis' AND partner_id = " . $login_user['id']. " ORDER BY id DESC LIMIT 1";
											$rs = mysql_query($sql) or die (mysql_error());
											$num = mysql_num_rows($rs);
											$rst = mysql_fetch_assoc($rs);
											$rule = 0;
											
											
											
											if($num == 1) {
												/* Caso o usuário já tenha adquirido um plano grátis, e enviado o ID do plano grátis que é 10. */
												$rule = $rst['plano'];
												
										?>
										<div class="MsgPlano">
											<p>&nbsp; &nbsp;<img src="<?php echo $PATHSKIN;?>/images/atention.png">Você não pode mais escolher o plano grátis. Escolha outro plano de sua preferência.</p>
										</div>
										<?php
											}
										
											/* Para cada tipo de usuário, uma sql diferente. */
											if(($login_user['tipoanunciante'] == "Revenda") OR ($login_user['tipoanunciante'] == "Concessionaria")) {
												$sql = "select * from planos_publicacao where ativo = 's' and type_plan = 'Revenda' and id <> " . $rule;
											}
											else if($login_user['tipoanunciante'] == "Particular" || empty($login_user['tipoanunciante'])){
												$sql = "select * from planos_publicacao where ativo = 's' and type_plan = 'Particular' and id <> " . $rule;
											}
										}
										else{
											$sql = "select * from planos_publicacao where ativo = 's' and type_plan = 'Particular'";
										}
										
										
										$rs = mysql_query($sql);
										while($row = mysql_fetch_array($rs)){
										?>
											<td  width="10" style="color: #ffffff;"><div class="txtselplano"> <input onclick="calc();" class="cinput inputradio" type="radio" id="planoanuncio" name="planoanuncio" value="<?=$row[valor]?>##<?=$row[id]?>##<?=$row[nome]?>"> Selecionar  </div></td> 
										<? } ?>
									   </tr> 
									   
									 <tr class="TEE" width="20%" style="background:#3477C5;">
										<td  width="10" height="31" style="color: #FFFFFF;font-size:14px;"><div style="margin-top:6px;"><B class="nomeplano">Diferenciais</b></div></td>
										<?  mysql_data_seek($rs,0) ; while($row = mysql_fetch_array($rs)){ ?>
											<td  width="10" style="color: #ffffff;"><div style="margin-top:6px;"><B class="nomeplano"><?=utf8_decode($row['nome'])?></B></div></td> 
										<? } ?>
									   </tr> 
									  <tr class="alturatrplanos">
										<td  class="JH"> <div class="itensplano">Valor dos planos</div> </td> 
										<? mysql_data_seek($rs,0) ; while($row = mysql_fetch_array($rs)){ ?>
											<td  class="largv"><div  class="pplan espcif <? if($row[id] ==10){ echo "vermelho";}?>"> <div class="cifrao1">R$</div>  <div class="pvalor" ><?= number_format($row[valor],2, ',', '.')?></div> </div></td>
									   <? } ?> 
									  </tr> 
									   <tr  class="linhasub alturatrplanos">
										<td  class="JH"><div class="itensplano">Destaque na busca</div></td>
										<? mysql_data_seek($rs,0) ; while($row = mysql_fetch_array($rs)){ ?>
											<td  class="centt"><div class="aimage"> <? if($row[ehdestaque] =='DESTAQUE'){ ?> <img src="<?=$PATHSKIN?>/images/sim.jpg"> <? } else { ?> <img src="<?=$PATHSKIN?>/images/nao.jpg" style="margin-top: 3px;"> <? } ?></div></td>
									   <? } ?> 
									  </tr>  
									  <tr  class="alturatrplanos">
										<td  class="JH"><div class="itensplano">Foto no resultado da busca</div></td>
										<? mysql_data_seek($rs,0) ; while($row = mysql_fetch_array($rs)){ ?>
											<td  class="centt"><div class="aimage">  <img src="<?=$PATHSKIN?>/images/sim.jpg" style="margin-top: 3px;"></div></td>
									   <? } ?>  
									  </tr>   
									  <tr class="linhasub alturatrplanos" >
										<td  class="JH"><div class="itensplano">Vídeo no anúncio</div></td> 
										<? mysql_data_seek($rs,0) ; while($row = mysql_fetch_array($rs)){ ?>
											<td  class="centt"><div class="aimage">  <? if($row[temvideo] =='VIDEO'){ ?> <img src="<?=$PATHSKIN?>/images/sim.jpg" style="margin-top: 3px;"> <? } else { ?> <img src="<?=$PATHSKIN?>/images/nao.jpg" style="margin-top: 3px;"> <? } ?> </div></td>
									   <? } ?> 
									  </tr>  
									  <tr class="alturatrplanos">
										<td  class="JH"><div class="itensplano">Saiba quantos acessos o anúncio recebeu</div></td>
										<? mysql_data_seek($rs,0) ; while($row = mysql_fetch_array($rs)){ ?>
											<td  class="centt"><div class="aimage"> <img src="<?=$PATHSKIN?>/images/sim.jpg" style="margin-top: 3px;"> </div></td>
									   <? } ?> 
									  </tr>
									  <tr class="linhasub alturatrplanos">
										<td  class="JH"><div class="itensplano">Receba propostas de compra em seu e-mail sem intermediários</div></td>
										<? mysql_data_seek($rs,0) ; while($row = mysql_fetch_array($rs)){ ?>
											<td  class="centt"><div class="aimage"> <img src="<?=$PATHSKIN?>/images/sim.jpg" style="margin-top: 3px;"></div></td>
									   <? } ?> 
									  </tr>   
									  <tr class="alturatrplanos">
										<td  class="JH"><div class="itensplano">Período de publicação</div></td>
										<? mysql_data_seek($rs,0) ; while($row = mysql_fetch_array($rs)){ ?>
											<td  class="centt"><div style="margin-top:10px;"><? if(  $row[atevender]=="S"){ echo "até vender*"; } else { echo $row[dias]. " DIAS" ; } ?></div></td>
									   <? } ?> 
									  </tr> 
									  <tr class="linhasub alturatrplanos">
										<td  class="JH"><div class="itensplano">Fotos no anúncio</div></td>
										<? mysql_data_seek($rs,0) ; while($row = mysql_fetch_array($rs)){ ?>
											<td  class="centt"><div style="margin-top:10px;"> 10 fotos </div></td>
									   <? } ?> 
									  </tr>  
									  <tr class="alturatrplanos" >
										<td  class="JH"><div class="itensplano">Anúncios da vitrine - Tela principal do site</div></td> 
										<? mysql_data_seek($rs,0) ; while($row = mysql_fetch_array($rs)){ ?>
											<td  class="centt"><div style="margin-top:10px;"><?php echo $row['qtd_vitrine']; ?> anúncios</div></td>
									   <? } ?> 
									  </tr>											 
									  <tr class="linhasub alturatrplanos" >
										<td  class="JH"><div class="itensplano">Quantidade de anúncios</div></td> 
										<? mysql_data_seek($rs,0) ; while($row = mysql_fetch_array($rs)){ ?>
											<td  class="centt"><div style="margin-top:10px;"><?php echo $row['qtdeanuncio']; ?> anúncios</div></td>
									   <? } ?> 
									  </tr>									  
									</table> 
									<BR> 
									<div style="font-size:11px;">*Atenção: o anúncio <b>Até Vender</b> precisa ser renovado, gratuitamente, a cada 60 dias, através do login. 
										  <br>Para os planos pré-pagos, após a aprovação do pagamento, você irá receber um email para fazer o seu login e iniciar o cadastro do(s) anúncio(s).
										  <br><br>
									</div>
									<table width="890"  border="0"   cellspacing="2"  > 
										<tr>
										  <td colspan="10" class="upgradplanotit "><div style="margin-top:3px;">Dê um upgrade no seu anúncio, com as seguintes opções!</div> </td>
										</tr>
										<?
										$sql = "select * from planos_upgrade where status=1";
										$rs = mysql_query($sql); 
										$bg="linhasub";
										while($row = mysql_fetch_array($rs)){ 
											if($bg=="linhasub"){
												$bg="";
											} 
											else{
												$bg="linhasub";
											} 
											?> 
											<tr class="alturatrplanos <?=$bg?>">
											<td style="width: 20%;"><div class="itensplano top10"><b><?=utf8_decode($row[nome])?></b></div></td> 
											<td style="width: 66%;"><div style="font-size:12px;margin-top:10px;"> <?=utf8_decode($row[descricao])?></div></td>
											<td><div class="fontprice largv" style="font-weight:bold;color:#1e68bf;font-size:12px;">  <input onclick="calc();" class="classupgrade" style="width:22px;margin-top:5px;float:left;" type="checkbox" id="upgrade" name="upgrade" idupgradec="<?=$row[id]?>" value="<?=$row[preco]?>">  <div class="cifrao1" style="margin-right:4px;">R$</div>  <div class="pvalor" style="width:120px;font-size:15px;"> <?= number_format($row[preco],2, ',', '.') ?></div>  </div></td> 
											</tr>  
										<? } ?>										
										<tr class="linhasub alturatrplanos">
										  <td colspan="10" >  <b><div id="totalpagar" class="ptotal"> </div></b>  </td>
										</tr> 
									</table>  
									<div style="color: #303030; font-size: 12px;   width: 799px; margin-top: 20px;">
										<input style="width:22px;" type="checkbox" value="1" name="termosplano" id="termosplano"> Li e concordo com os termos de uso <a target="_blank" href="<?=$ROOTPATH?>/page/about_privacy/Politicas%20de%20Privacidade">Clique para ler</a>
									</div> 
									<div style="color: #303030; font-size: 12px;   margin-top: 10px;">Aqui você conta com as melhores formas para pagar seu anúncio. Confira as opções de sua escolha:</div>
									    <div style="float:left;"> <img src="<?=$PATHSKIN?>/images/planospagseguro.gif"> </div>
									    <?php if(!$login_user){ ?> <div style="float:right;"><a  href="javascript: enviapag_normal('pagseguro');" class='tk_logar' >  <img src="<?=$PATHSKIN?>/images/concluirp.png" >  </a>  </div><?php } ?>
										<?php if($login_user){ ?> <div style="float:right;"><a  href="javascript: enviapag_normal('pagseguro');">  <img src="<?=$PATHSKIN?>/images/concluirp.png" >  </a>  </div><?php } ?>
									<br><br>
								</div> 
							</div> 
						 </div>
						 </div>
					</div>
				</div>
			</div>
        </section>
   </div> 
</div>  

<form id="pagseguro" name="pagseguro"  method="post" sid="<?php echo $team_id; ?>" action="https://pagseguro.uol.com.br/checkout/checkout.jhtml">
	<input type="hidden" readonly="readonly" name="email_cobranca" value="<?php echo $INI["pagseguro"]["acc"]; ?>">
	<input type="hidden" readonly="readonly" name="tipo" value="CP">
	<input type="hidden" readonly="readonly" name="moeda" value="BRL">
	<input type="hidden" readonly="readonly" id="ref_transacao" name="ref_transacao" value="">
	<input type="hidden" readonly="readonly" id="reference" name="reference" value="">
	<input type="hidden" readonly="readonly" id="item_id_1" name="item_id_1" value="">
	<input type="hidden" readonly="readonly" id="item_descr_1" name="item_descr_1" value="">
	<input type="hidden" readonly="readonly" id="item_quant_1" name="item_quant_1" value="1">
	<input type="hidden" readonly="readonly" id="item_valor_1" name="item_valor_1" value="">
	 
	  <!-- Dados do comprador (opcionais) -->  
	<input type="hidden" name="senderName" value="<?=$login_user['realname']?>">  
	<input type="hidden" name="senderEmail" value="<?=$login_user['email']?>">  
	
		<!-- Informações de frete (opcionais) -->  
	<input type="hidden" name="shippingType" value="1">  
	<input type="hidden" name="shippingAddressPostalCode" value="<?=$login_user['zipcode']?>">  
	<input type="hidden" name="shippingAddressStreet" value="<?=$login_user['address']?>">      
	<input type="hidden" name="shippingAddressDistrict" value="<?=$login_user['bairro']?>">  
	<input type="hidden" name="shippingAddressCity" value="<?=$login_user['cidadeusuario']?>">  
	<input type="hidden" name="shippingAddressState" value="<?=$login_user['estado']?>">  
	<input type="hidden" name="shippingAddressCountry" value="BRA">  
	  
	<!-- Dados do comprador (opcionais) -->    
	<input type="hidden" name="senderPhone" value="<?=$login_user['mobile']?>">  
			
</form>
	
<?php require_once(DIR_BLOCO."/rodape.php"); ?>
 
 <script>
 
//var www = jQuery("#www").val();
var idplano;
var www = "<?=$ROOTPATH?>";
var team_id = '<?php echo $idpedido; ?>';
var gratis="";
var idpagamento="";
var nomeplano="";

<?php if(isset($login_user[id])) { ?>
var idusuariologado = <?=$login_user[id]?>;
<?php } ?>

 function calc(){
 
    var valortotal = 0  
    var valorplano = 0  
    var totalpagarsemformatacao = 0  
	planoanunciocheck = J("input[type=checkbox][name=planoanuncio]:checked").val()
   
    var checkplano="";
	J(".cinput:checked").each(function(){
		checkplano =  this.value;
	});    
	arrvalor = checkplano.split("##"); 
	valorplano = arrvalor[0]; 
	idplano = arrvalor[1]; 
	nomeplano = arrvalor[2]; 
	 
	var totalupgrade=0;  
	J(".classupgrade:checked").each(function(){   
		totalupgrade+=parseFloat(J(this).val()) || 0; 
	}); 
	var idupgrades="";  
	J(".classupgrade:checked").each(function(){    	
		idupgrades+=J(this).attr("idupgradec")+","
	}); 
    
	//alert(totalupgrade)	
	if(valorplano!="on"){
		valortotal =  parseFloat(totalupgrade) + parseFloat(valorplano) || 0;
		totalpagarsemformatacao =  parseFloat(totalupgrade) + parseFloat(valorplano) || 0;
	}
	else{
		valortotal =  parseFloat(totalupgrade) || 0;
	}
	//alert(valortotal)
	valortotal 	=  float2moeda(valortotal); 
	//alert(valortotal)
	 
   //$valor_original = number_format($team['team_price'], 2, ',', '.');
	 
   J("#totalpagar").html( "Total a Pagar: R$ "+ valortotal );
   J("#ref_transacao").val( "AREAPUBLICA"+idupgrades);
   J("#reference").val( "AREAPUBLICA"+idupgrades);
   J("#item_valor_1").val( valortotal);
	   
	 return true; 
}
  
	  
function enviapag_normal(valorform){
  
	    var checkplano="";
		J(".cinput:checked").each(function(){
			checkplano =  this.value  ;
		});  
	
		if(checkplano=="on"){
			alert("Por favor, escolha um plano")
			return;
		}
		
		var aceitar=''; 
		aceitar = J("input[type=checkbox][name=termosplano]:checked").val() 
		if( aceitar != "on" & aceitar != "1") {
				alert("Você precisa aceitar a política de uso para prosseguir.")
				return;
		}  
	    gravaplano();   
}   
function fecharanunciogratis(){
	
	plano  = J("input[name='planos_publicacao']:checked").val();
  
	planoarr = plano.split('##');
	 
	 idplano = planoarr[0];
	 valor = planoarr[1];
	 gratis = planoarr[2]; 
		if(gratis=="s"){  
			finalizaanunciogratis(idusuariologado);
		}
		else{
			alert('Este anúncio não é grátis. Por favor, escolha um plano grátis.');
		}
	 
}

function mostravalor(){
	 plano  = J("input[name='planos_publicacao']:checked").val();
 
	 planoarr = plano.split('##');
	 
	 idplano = planoarr[0];
	 valor = planoarr[1];
	 gratis = planoarr[2];
	     
	descricao = "Pagamento de <?="anúncio"?> - Plano R$ "+valor; 	 
	J("#valoranuncio").val(valor); 
	J("#item_descr_1").val(descricao); 
	
   <? if($_REQUEST['republica']=="true"){?>
		J("#reference").val("republicaWW"+idplano); 
		J("#ref_transacao").val("republicaWW"+idplano);  
	<? } 
	else {?>
		J("#reference").val(idplano); 
		J("#ref_transacao").val(idplano);
	<? }?>
	
	jQuery('#item_valor_1').val(valor)
	 
	if(gratis=="s"){
		 
		 J('.termo_uso').fadeOut('slow', function() {
		   J('.termo_uso').hide()
		 }); 
		 
		 J('.botaogratis').fadeIn('slow', function() {
		 J('.botaogratis').show()
		 });
		 
	}
	else{
		
		J('.botaogratis').fadeOut('slow', function() {
		   J('.botaogratis').hide()
		 }); 
		 
		 J('.termo_uso').fadeIn('slow', function() {
		 J('.termo_uso').show()
		 });
		  
	}
}
 var iduser=""; 
 
function gravaplano(){  
	var erro = false;
	if(iduser==""){
			iduser  = LOGINUID
		}	
		if(iduser==""){
			alert('O usuário está vazio. Por favor, entre em contato conosco')
			return;
		}
		J.ajax({
			   type: "POST",
			   cache: false,
			   async: false,
			   url: "<?php echo $INI['system']['wwwprefix']?>/include/funcoes.php",
			   data: "acao=verifica_situacao_plano_atual&idusuarioplano="+iduser,
			   success: function(retorno){
			   retorno = jQuery.trim(retorno);
				//alert("|"+retorno+"|")
			   if(jQuery.trim(retorno)!=""){   
					if(retorno=="0" || retorno=="-1" || retorno=="-2"  || retorno=="" || retorno=="-99"){
						 
					}
					else{  		    
						alert("Já existe um plano ativo em sua conta. Você deve publicar todos os anúncios restantes antes de adquirir um novo plano de anúncios");
						erro = true ;			 
					}
				} 
			   else {  		    
					alert( "Codigo 134 "+retorno);
					erro = true ;		 
				}		  
			}
		});
		
		if(!erro){
			 var idupgrades;
			 var idupgrades = J("#reference").val();
			 var tipopag; 
			 
			 valorcompra =  parseFloat(J("#item_valor_1").val());
			 
			 if(valorcompra==0){
				tipopag = "tdgratis";
				finalizaanunciogratis(iduser);
			 }
			 else{ 
				 J.colorbox({html:"<font color='black' size='2'> Redirecionando para a realização do pagamento em ambiente seguro...</font>"});
				 J.get(www+"/include/funcoes.php?acao=gravaplano&idupgrades="+idupgrades+"&partner_id="+idusuariologado+"&idplano="+idplano,
				 
				  function(data){ 
						idpartnerplano = data;
						//alert(idpartnerplano);
						J("#item_id_1").val( idpartnerplano ); 
						J("#item_descr_1").val( "Aquisição de Plano: "+nomeplano+ " Cod Aquisicao.: "+idpartnerplano ); 
	   
						 J("#pagseguro").submit(); 	 
				}); 
			}		
		}	 
}
	   
function finalizaanunciogratis(idcliente){  
		 
		 J.get(www+"/include/funcoes.php?acao=finalizaanuncio&partner_id="+idcliente+"&idplano="+idplano,
		  function(data){
			  if(jQuery.trim(data)!=""){ 
					alert(data)
			 }
			 else{ 
				J.colorbox({html:"<font color='black' size='2'> Você será redirecionado para iniciar o cadastro do seu anúncio !</font>"}); 
				location.href  = www+"/adminanunciante/";
			}
		});  
	 
}
 
 </script>

</body>
</html>

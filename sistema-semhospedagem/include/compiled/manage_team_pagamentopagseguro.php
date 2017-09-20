<?php include template("manage_anunciante_header"); ?>
<?php require("ini.php"); ?>

<?php  
if($idnovo){
	$idanuncio = $idnovo;
}
else{
	$idanuncio = $team['id'];
} 
	$idparceiro = $_SESSION['user_id'];  
	$user = Table::Fetch('user', $idparceiro);
	
	//if(estapago($idanuncio)){
	?>
		<script>
		/*
			alert('Atenção, este anúncio já está pago !');
			location.href = '<?=$INI['system']['wwwprefix']."/adminanunciante";?>'
	   */
		</script>
	<?
	//}
  $idpedido =  $idanuncio;
 ?>  

<style>
	report-head { 
    font-size: 13px;  
}

 </style>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="leader">
	<div id="content" class="clear mainwide">
        <div class="clear box"> 
            <div class="box-content">
                <div class="sect">  
				<!-- para o pagamento moip -->
				<input type="hidden" name="www" id="www"  value="<?=$INI['system']['wwwprefix']?>" /> 
				<input type="hidden" name="nomeCliente" id="nomeCliente"  value="<?=$user['realname']?>" /> 
				<input type="hidden" name="telefoneCliente" id="telefoneCliente"  value="<?=$user['mobile']?>" /> 
				<input type="hidden" name="CPFCliente" id="CPFCliente"  value="<?=$user['cpf']?>" /> 
				 
				<div id="contentmoip"></div>
				<!-- para o pagamento moip -->
				
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Planos e Formas de Pagamento: Anúncio <?=$idanuncio?> </h4></div>
						 	 
					</div> 
				 
					 <div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">  
										 <div style="clear:both;"class="report-head">Escolha o seu Plano <span class="cpanel-date-hint"></span></div>
										  
										  <div style="margin:10px 10px 15px 15px;">
											<?php
											
												/* Verifica o tipo de usuário e exibe apenas os planos par determinado usuário. */
												if($user['tipoanunciante'] == "Particular") {
													$type_plan = "Particular";
												} 
												else if($user['tipoanunciante'] == "Revenda") {
													$type_plan = "Revenda";
												}
												else {
													$type_plan = "Particular";
												}
												
												/* É verificado se o usuário possui algum plano grátis, uma vez que é permitido que o usuário utilize apenas uma vez 
												   o plano grátis.	
												*/
												$sqlP = "select count(*) from partner_planos where partner_id = '" . $user['id'] . "' and plano_id = '10'";
												$rsP = 	mysql_query($sqlP);
												$rowP = mysql_fetch_assoc($rsP);
												
												if($rowP['count(*)'] >= 1) {
													$gratis = "<> 10";
												} 

												/* SQL que buscaos planos de acordo com as características do usuário. */
												$sql = "select * from planos_publicacao where ativo = 's' and type_plan = '" . $type_plan . "' and id " . $gratis . " order by id";
												$rs = mysql_query($sql);
												while($dados = mysql_fetch_assoc($rs)){ 

													$VIDEO = "não"; 
													if($one['temvideo']=="VIDEO"){
														$VIDEO = "sim";
													}	
													
													$DESTAQUE = "não"; 
													if($one['ehdestaque']=="DESTAQUE"){
														$DESTAQUE = "sim";
													}
													$ATEVENDER = "não"; 
													if($one['atevender']=="S"){
														$ATEVENDER = "sim";
													}
											 ?> 
												<div style="margin-right:6px;padding-top: 3px;margin-top:6px;" class="fundoRadioDestaque">
												
													<input type="radio" precoplano="<?=$dados['valor']?>" onclick="javascript:mostravalor();" value="<?=$dados['id']?>##<?=$dados['valor']?>##<?=$dados['gratis']?>" id="planos_publicacao" name="planos_publicacao"> <span class="CorDestaque"><?=$dados['nome']?></span>
											 
													 <div class="descricaoDestaque">
														<ul class="listaDestaques">
															<?php echo $dados['dias']; ?> dia(s) de publica&ccedil;&atilde;o
															<?php echo $dados['qtdeanuncio']; ?> an&uacute;ncios
															Destaque: <?php echo  $DESTAQUE; ?>
															V&iacute;deo: <?php echo  $VIDEO; ?>
															At&eacute; Vender: <?php echo  $ATEVENDER; ?>
														</ul>
													 </div>
													 <p align="left" style="font-size:10px;margin-left:auto;margin-right:auto;text-align:center;"> 
												  R$ <input type="text" readonly="readonly" style="width:50px; font-weight:bold; color:#cc0000; font-size:16px; border:#d8d8d8; background: transparent;" value="<?=$dados['valor']?>" name="inptDestaque1" id="inptDestaque1">
												  </p>
												</div>
											
											<? } ?> 
										</div>
						 
								</div>
							 
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
								<div class="ends"> 
								  
								<div class="seu_estoque box pagamento">
									 <div class="botaogratis" style="display:none;">  
										<div style="margin-top:7px;">
										    <button onclick="fecharanuncio();" id="run-button" class="input-btn" type="button"><div name="spinner-top" id="spinner-top" style="width: 203px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Finalizar Anúncio</div></button> 
										 </div>
									</div> 
										
									<div class="termo_uso">  
									 
											<div class="linha" style=""> 
												<div class="btclass"> <img src="<?=$PATHSKIN?>/images/pagseguro.png"   border="0" /> </div>
												<div class="btpay">   
													 <div class="btpagamento"><a href="javascript:enviapag_normal('pagseguro');"><img src="<?=$PATHSKIN?>/images/planospagseguro.gif"  border="0" /></a> </div>
												</div>
											</div> 

									
									  		<form id="pagseguro" name="pagseguro"  method="post" sid="<?php echo $team_id; ?>" action="https://pagseguro.uol.com.br/checkout/checkout.jhtml">
												<input type="hidden" readonly="readonly" name="email_cobranca" value="<?php echo $INI["pagseguro"]["acc"]; ?>">
												<input type="hidden" readonly="readonly" name="tipo" value="CP">
												<input type="hidden" readonly="readonly" name="moeda" value="BRL">
												<input type="hidden" readonly="readonly" id="ref_transacao" name="ref_transacao" value="">
												<input type="hidden" readonly="readonly" id="reference" name="reference" value="">
												<input type="hidden" readonly="readonly" id="item_id_1" name="item_id_1" value="<?php echo  $idanuncio; ?>">
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
												<input type="hidden" name="encoding" value="UTF-8">   
											 </form> 
											<input type="hidden" id="idpagamento" name="idpagamento" value="<?php echo get_id_pagamento(); ?>" />
											<input type="hidden" id="idplano" name="idplano" value="" /> 
											
											<div style="margin-top:11px;">
											<?=$INI['system']['textopagamento']?>
										   </div>
									</div>
										  
								</div> 
								  
								</div>
							</div> 
						</div>
					</div>
				</div>
			   
				</div>  
                </div>
            </div> 
        </div>
	</div> 
</div>
</div> 
<script> 
  
var www = jQuery("#www").val();
var team_id = '<?php echo $idpedido; ?>';
var gratis="";
var idpagamento="";

function fecharanuncio(){
	
	plano  = $("input[name='planos_publicacao']:checked").val();
  
	planoarr = plano.split('##');
	 
	 idplano = planoarr[0];
	 valor = planoarr[1];
	 gratis = planoarr[2]; 
		if(gratis=="s"){ 
			idpagamento =  team_id;
			finalizaanuncio('<?php echo $idparceiro; ?>',idpagamento,gratis);
		}
		else{
			alert('Este anúncio não é grátis. Por favor, escolha um plano grátis.');
		}
	 
}

var idplano;
function mostravalor(){
	 plano  = $("input[name='planos_publicacao']:checked").val();
 
	 planoarr = plano.split('##');
	 
	 idplano = planoarr[0];
	 valor = planoarr[1];
	 gratis = planoarr[2];
	     
	descricao = "Pagamento de <?="anúncio"?> - Plano R$ "+valor; 	 
	$("#valoranuncio").val(valor); 
	$("#item_descr_1").val(descricao); 
	
   <? if($_REQUEST['republica']=="true"){?>
		$("#reference").val("republicaWW"+idplano); 
		$("#ref_transacao").val("republicaWW"+idplano);  
	<? } 
	else {?>
		$("#reference").val(idplano); 
		$("#ref_transacao").val(idplano);
	<? }?>
	
	jQuery('#item_valor_1').val(valor)
	 
	if(gratis=="s"){
		 
		 $('.termo_uso').fadeOut('slow', function() {
		   $('.termo_uso').hide()
		 }); 
		 
		 $('.botaogratis').fadeIn('slow', function() {
		 $('.botaogratis').show()
		 });
		 
	}
	else{
		
		$('.botaogratis').fadeOut('slow', function() {
		   $('.botaogratis').hide()
		 }); 
		 
		 $('.termo_uso').fadeIn('slow', function() {
		 $('.termo_uso').show()
		 });
		  
	}
}
    
function gravaplano(){ 

  	 $.colorbox({html:"<font color='black' size='2'> Redirecionando para a realização do pagamento em ambiente seguro...</font>"});
	 $.get(www+"/include/funcoes.php?acao=gravaplano&idanuncio=<?=$idanuncio?>&partner_id=<?=$idparceiro?>&idplano="+idplano,
	 
	  function(data){
		if(jQuery.trim(data)!=""){ 
			jQuery("#pagseguro").submit();
		}		 
	});  
	 
}
	  
function enviapag_normal(){
	
   Valor	 	=  jQuery('#item_valor_1').val();
   
	if(Valor==""){
			campoobg("valoranuncio");
			alert("Por favor, escolha um plano para o anúncio");
			jQuery("#valoranuncio").focus();
			return;
		} 
		
	 gravaplano();		 
  
}

 function finalizaanuncio(idcliente,idPedido,gratis){
	if(gratis!="s"){
			alert('Este anúncio não é grátis. Por favor, escolha um plano grátis.');
	}
	else{
		 
		Valor =  jQuery('#valoranuncio').val();
		 
		 $.get(www+"/include/funcoes.php?acao=finalizaanuncio&partner_id="+idcliente+"&idpedido="+idPedido+"&valor="+Valor+"&idplano="+idplano+"&team_id="+team_id+"&republica=<?=$_REQUEST['republica']?>",
		  function(data){
			  if(jQuery.trim(data)!=""){ 
					//alert(data)
			 }
			 else{ 
				$.colorbox({html:"<font color='black' size='2'> Anúncio finalizado com sucesso!</font>"});
				location.href = www+"/adminanunciante/";
			}
		});  
	}
}

</script>   
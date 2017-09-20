<?php  
require_once("include/code/minhacontadetalhes.php");
require_once("include/head.php"); 

$sql = "select * from order_enderecos where idpedido=".$order['id'];
$rs =  mysql_query($sql);
$dados = mysql_fetch_assoc($rs);
 
 if(mysql_num_rows($rs) > 0){
	$comfrete = true;
 }
									
?>

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
						  <div class="col-6" style="width:100%;" >
							<div class="titulosecao2"><span class="txt7">	<a style="color:#fff" href="index.php?page=minhaconta">Meus Pedidos</a> | <a style="color:#fff" href="index.php?page=meuscupons">Meus Cupons</a> |<a style="color:#fff" href="index.php?page=meusconvites"> Meus Convites</a> |<a style="color:#fff" href="index.php?page=meuscreditos"> Meus Créditos</a> | <a style="color:#fff" href="index.php?page=meusdados">Meus Dados</a></span></div>
							 <div class="pgavulsafundominhaconta"> 
								 <br class="clear" />    

									 <h2 style="color:InfoText;"><?=utf8_encode("Pedido: ")?> <?php echo $order['id']; ?> </h2>
									 <div class="tail" style="margin-top:-12px;"></div>
									 
									 <span style="color:InfoText;font-size:12px;">Feito em: <?php echo date('d-m-Y H:i', strtotime($order['datapedido']) ); ?></span>
									  
									<div class="tail" style="margin-top:-12px;"></div>
									 <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top:4px;background:none repeat scroll 0 0 #696969;color:#fff;" >
									 <tr style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif;color:#fff;font-size:11px;"><th width="45%" bgcolor="#fff">Oferta</th><th width="10%" bgcolor="#fff"> Preço </th><th width="5%" bgcolor="#fff">Qtde.</th><?if($comfrete){?> <th width="10%" bgcolor="#fff">Valor frete</th> <? } ?><th width="10%" bgcolor="#fff">Total</th> 
									   <th width="20%" bgcolor="#696969">Status</th></tr>
											<tr style="background:whiteSmoke;color:InfoText;font-size:12px;">
											   <td style="text-align:left;"> <?php echo  utf8_decode( $team['title'] ) ; ?> </td>
												<td> R$ <?php echo $order['price']; ?></td>
												<td> <?php echo $order['quantity']; ?> </td>
												<?if($comfrete){
														$valortotal =  ($order['price']*$order['quantity']) + $order['valorfrete']; ?>
														<td> <?php echo $order['valorfrete']; ?> </td>
												<?}
												else{
													$valortotal =  $order['price']*$order['quantity']  ;
												}?>
												<td> R$ <?php echo moneyit($valortotal); ?></td>
												<td style="font-size:12px;"><?php if( $order['state']=="unpay"){?>Aguardando pagamento<?php } else { ?>Pago<?php }?></td>
											</tr>
									</table>	 
									<? 
									if($comfrete){  ?>
										<div class="tail" style="margin-top:-12px;"></div>
										<table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top:4px;background:none repeat scroll 0 0 #696969;color:#fff;" >
										 <tr style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif;color:#fff;font-size:11px;"><th width="100%" bgcolor="#fff">Endereço de Entrega</th> </tr>
												<tr style="background:whiteSmoke;color:InfoText;font-size:12px;">
												   <td style="text-align:left;"> <?php getEnderecoEntregaPedidoUser( $dados)  ?> </td> 
												</tr>
										</table>
									<? } ?>
									
									<div class="tail" style="margin-top:-12px;"></div>
									
									<?php 
										 
										$consumido = "sim";
										$coupons[0]['consume'];
										if(  $coupons[0]['consume'] == "N"){
											$consumido = "não";
										}
									 						
									?>
										
								  <h4>Dados Cupom</h4>
									 
									<table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top:4px;" >
									  <tr style="background:none repeat scroll 0 0 #696969;font-family:Trebuchet MS, Arial, Helvetica, sans-serif;color:#fff;font-size:11px;"> <th width="20%" bgcolor="#fff">No Cupom.</th><th width="30%" bgcolor="#fff">Código</th><th width="20%" bgcolor="#fff">Prazo</th><th width="10%" bgcolor="#fff">Consumido</th></tr>
										
										<? 
										if( $order['state']=="unpay" and $team['team_type'] != "off" and $team['team_type'] != "participe"){ ?>
										
											<tr style="background:whiteSmoke;color:InfoText;font-size:12px;"> 
											<td colspan="5"  style="text-align:center;">
											   Este cupom ainda não está disponível pois estamos aguardando o pagamento do seu pedido
											 </td>
											</tr>
											
										<?}  
										
										else if(!$coupons[0]['id'] and $team['team_type'] != "off" and $team['team_type'] != "participe"){?>
										
											<tr style="background:whiteSmoke;color:InfoText;font-size:12px;"> 
											<td colspan="5"  style="text-align:center;">
											   Este cupom ainda não está disponível pois a oferta ainda não está ativa 
											  
											</td>
											</tr>
											
										<?} ?>
										
										<? if($coupons[0]['id']){?>
											<tr  style="background:whiteSmoke;color:InfoText;font-size:12px;"> 
											<td align="center"><?php echo $coupons[0]['id']; ?></td>
											<td align="center"><?php echo $coupons[0]['secret']; ?></td> 
											<td align="center"><?php echo date('d-m-Y', $coupons[0]['expire_time']); ?></td>  
											<!-- <td align="center"><?php echo $expirado  ?></td>  -->
											<td align="center"><?php echo $consumido ?></td>  
											</tr>
										 <?} ?>
										
									</table>
								  
									<?php if($order['card_id']){?>
										<div class="tail" style="margin-top:-12px;"></div>  Cartão:  <?php echo $order['card_id']; ?> Total  - R$ <?php echo moneyit($order['card']); ?>  
									 <?php }?>
									
								<br class="clear" />  
								<a href="javascript:history.go(-1)">voltar</a>

								</div>
							  </div> 
						 </div> 
					</div>
				</div>
			</div>
        </section>
       </div>
</div> 
 
 <?php require_once(DIR_BLOCO."/rodape.php"); ?>
 
</body>
</html>

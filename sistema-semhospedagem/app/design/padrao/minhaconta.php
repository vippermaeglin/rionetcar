<?php  
require_once("include/code/minhaconta.php");
require_once("include/head.php"); 
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
							<div class="titulosecao2"><span class="txt7">	<a style="color:#fff;" href="index.php?page=meusdados">Meus Dados</a> <? if($INI['option']['anunciousuario']=="Y"){ ?> | <a style="color:#fff;" target="_blank" href="adminanunciante/team">Meus Anúncios</a> | <a style="color:#fff;" target="_blank" href="adminanunciante/team/edit.php">Fazer Anúncio</a> |  <a style="color:#fff;" target="_blank" href="adminanunciante/team/propostas.php">Propostas</a>  <? } ?></span></div>
							 <div class="pgavulsafundominhaconta">
							  <span style="color:#94c807;font-size:1.21em; font-family:Trebuchet MS;font-weight:bold;padding:12px;">Propostas</span>	<a href="index.php?page=minhaconta" class="link-3"><em><b>Minhas propostas enviadas</b></em></a> <a style="margin-right:2px;" href="index.php?page=minhaconta&status=unpay" class="link-3"><em><b>Minhas propostas recebidas</b></em></a>
								<div class="tail" style="margin-top:-12px;"></div>
								 <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top:4px;" >
									  <tr style="background:none repeat scroll 0 0  ;font-family:Trebuchet MS, Arial, Helvetica, sans-serif;color:#303030;font-size:11px;"><th width="5%" bgcolor="#696969">Pedido</th><th width="35%" bgcolor="#696969">Oferta</th><th width="5%" bgcolor="#696969">Quant.</th><th width="10%" bgcolor="#696969">Total</th><th width="6%" bgcolor="#696969">Status</th><th width="20%" bgcolor="#696969">Estado</th><th width="10%" bgcolor="#696969">Ação</th></tr>
									 <?php if(is_array($orders)){foreach($orders AS $index=>$one) { 
											
											$temvenda=false; 
											if($teams[$one['team_id']]['team_type'] == "normal" or $teams[$one['team_id']]['team_type'] == "cupom" or $teams[$one['team_id']]['team_type'] =="simples"){
												$temvenda=true;
											}
											
											$end_time = date('YmdHis', $teams[$one['team_id']]['end_time']); 
										 
											$date = date('YmdHis');
											  
											$ofertafechada = false;

											if( $end_time  < $date){
											   
												$ofertafechada = true;
											}
											  
											$existe_registro = true;
										 
											if(!$ofertafechada and $teams[$one['team_id']]['min_number'] > $teams[$one['team_id']]['now_number']){ 
											
												$faltante= $teams[$one['team_id']]['min_number']- $teams[$one['team_id']]['now_number'];
												 
													$estado = "Falta ".$faltante. " para ativar";
												 
											}
											else if(!$ofertafechada and $teams[$one['team_id']]['min_number'] <= $teams[$one['team_id']]['now_number']){ 
											
												$faltante= $teams[$one['team_id']]['min_number']- $teams[$one['team_id']]['now_number'];
												 
													$estado = "Esta oferta está ativa";
												 
											}
											else if($ofertafechada and $teams[$one['team_id']]['min_number'] < $teams[$one['team_id']]['now_number']){  
												 
												if($teams[$one['team_id']]['now_number'] ==0){
													 $estado =  "Oferta encerrada.";
												}
												else if($teams[$one['team_id']]['now_number'] ==1){
													 $estado=  "Oferta encerrada.";
												}
												else{
													$estado =  "Oferta encerrada. ".$teams[$one['team_id']]['now_number']." pagantes";
													
												} 
												  
											}
											else if($ofertafechada){
												$estado  = "<b>Esta oferta não conseguiu ser ativada.</b>";
											}
											  
											if($x=="1"){
												$bgcolor="whiteSmoke";
												$x="0";
											}else{
												$bgcolor="white";
												$x="1";
											}
										?>
										<tr  <?php echo $index%2?'':'class="alt"'; ?> style="font-size:11px;background:<?=$bgcolor?>;color:#545a55">
										<td><?php echo $one['id']; ?></td>
											<td style="text-align:left;font-size:11px;"> <?php echo strtolower(utf8_decode(substr($teams[$one['team_id']]['title'],0,62)."...")); ?> </td>
											<td><?php echo $one['quantity']; ?></td>
											<td> 
												<?php 
												if($temvenda){	
													echo $currency; 
												 
													$totalpedido = $one['origin'];
													if($one['valorfrete']){
															$totalpedido =  $one['valorfrete'] + $one['origin'];
													}	
													?>
													R$ <?php echo moneyit3($totalpedido);
												}
												else{
														echo " - ";
													}
												?>
											</td>
											<td>
												<?php 
													if($temvenda){
														if($one['state']=='pay'){ echo "pago"; } else { echo "pendente"; }  
													}
													else{
														echo " - ";
													}
													?>
											</td>
											<td>
											<?php  
												if($temvenda){	
													echo $estado;
												}
												else{
													 echo "Oferta do tipo ".$teams[$one['team_id']]['team_type'];
												 }
											?>
											</td>
											<td  ><?php if($one['state']=='unpay'&&$teams[$one['team_id']]['close_time']==0 and $temvenda){?> <a style="color:blue;text-decoration:none" href="<?=$ROOTPATH ?>/index.php?page=minhacontapagar&order_id=<?=$one['id']?>"/>pagar</a> | <?php }?>  <a  style="color:#336699;text-decoration:none" href="<?=$ROOTPATH ?>/index.php?page=minhacontadetalhes&estado=<?=$estado?>&order_id=<?=$one['id']?>" />Detalhes</a> </td>
										</tr>
									<?php }}?>	
										<?
									if(! $existe_registro){?>
									
										<tr <?php echo $index%2?'':'class="alt"'; ?> style="background:<?=$bgcolor?>;color:#545a55">
											<td colspan="6" style="text-align:center;">  Nenhum registro encontrado </td>
										</tr>
										 
									<?} ?>
									 
								  </table>
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

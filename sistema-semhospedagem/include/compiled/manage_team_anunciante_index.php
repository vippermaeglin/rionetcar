<?php include template("manage_anunciante_header"); ?>
 
<?php 
$saldo = get_saldo( $_SESSION['user_id'] );
$infoplano = get_info_plano($_SESSION['user_id']) ;
if($saldo > 0){
	 $max_string =   $infoplano." - Você ainda pode cadastrar $saldo anúncio(s)" ;
	 $telacadastro=false;
}
else if($saldo == 0 and $infoplano != ""){
	 $max_string = $infoplano." - O seu saldo de anúncios está esgotado." ;
	 $telacadastro=true;
}
else{
	$max_string = "Você não escolheu um plano ou ele ainda não foi aprovado." ;
	$telacadastro=true;
}
	
?> 
					
<style>
	#log_tools {
		float: none;
	}
	
	.btn {
		margin-bottom: 10px;
	}
</style>
<div id="coupons" class="container-fluid"> 
    <div id="content" class="coupons-box clear mainwide row">
		<div class="box clear col-md-12"> 
            <div class="box-content">
				<div class="option_box">
					<div class="top-heading group"> 
						<div class="col-md-7 col-xs-12 col-sm-12" style="padding: 10px;">
							<h4 class="text-left;" style="color: #FFF;text-transform:uppercase;font-weight:bold;font-size:16px;"> 
							<?php if($selector=='failure'){?>
								  Finalizados 
							<?php } 							/*							else if($selector=='success') { ?>
								 Anúncios válidos, com período finalizado 
							<?php } 							*/							
							else if($_REQUEST['acao']=='site') { ?>
								  Anúncios no site  
							<?php } else { ?>
								 Todos os anúncios 
							<?php }?>
							</h4> 							
						</div> 
						<div class="col-md-5 col-xs-12 col-sm-12" style="padding: 10px;">
							<div class="row">
								<ul id="log_tools">
									<? if($telacadastro){?>
										<div class="col-md-3 col-xs-12 col-sm-12">
											<button onclick="javascript:location.href='<?=$ROOTPATH?>/index.php?page=planos'"  class="btn btn-success btn-block" type="button">Planos</button> 
										</div>
									<? }
									else{?>
										<div class="col-md-3 col-xs-12 col-sm-12">
											<button onclick="javascript:location.href='<?=$ROOTPATH?>/adminanunciante/team/edit.php'"  class="btn btn-success btn-block" type="button">Adicionar</button>
										</div>
									<?}?>
									<div class="col-md-3 col-xs-12 col-sm-12">
										<button onclick="javascript:location.href='<?=$ROOTPATH?>/adminanunciante/team/failure.php'" class="btn btn-success btn-block" type="button">Cancelados</button>
									</div>
									<div class="col-md-3 col-xs-12 col-sm-12">
										<button onclick="javascript:location.href='<?=$ROOTPATH?>/adminanunciante/team/index.php?acao=site'"  class="btn btn-success btn-block" type="button">No site</button>
									</div>
									<div class="col-md-3 col-xs-12 col-sm-12">
										<button onclick="javascript:location.href='<?=$ROOTPATH?>/adminanunciante/team/index.php'"  class="btn btn-success btn-block" type="button">Todos</button> 							
									</div>
								</ul>
							</div>
						 </div>
					</div>  
				 
					<div class="paginacaotop"><?php echo $pagestring; ?> <?=$max_string ?></div>				
				
					<div class="sect hidden-xs hidden-sm" style="clear:both;">
						<div class="table-responsive">
							<table id="orders-list" class="table table-inverse">
								<thead class="thead-inverse">
								<form method="get">
								<tr>
								<th width="40">ID <input type="text"  name="idoferta"  id="idoferta" style="width: 50%; color:#303030;font-size:11px;"> </th>
								<th width="120">Cód. Aquisição </th>
								<th width="350">Anúncio <input type="text"  value="<?=$_REQUEST['team_title']?>" name="team_title"  id="team_title" style="width: 75%; color:#303030;font-size:11px;"></th>
								<th width="40">Cliques  </th> 
								<th width="40">Propostas  </th> 
								 <th width="40">Período</th> 
								<th width="60" nowrap>Preço</th>
								<th width="60" nowrap>Status</th>
								<th width="60" nowrap>Destaque Busca</th>
								<th width="60" nowrap>Vitrine</th>
								<th width="150">  
								<button type="submit" class="btn btn-success"><span>Buscar</span></button>
								<button onclick="resetFilter()" type="button" class="btn btn-warning"><span>Limpar</span></button> 
								</th>
								</tr>
								</form>
								<?php if(is_array($teams)){foreach($teams AS $index=>$one) { 
										$bregistro =  true; 
										$cidade = $cities[$one['city_id']]['nome'];	 
										require("manage_team_controle.php"); 
										
										$propostas = Table::Count('propostas', array(
											'idoferta' => $one[id], 
										));
										$VITRINE="não";
										if( $one['ehvitrine']=="Y"){
											$VITRINE= "Sim";
										} 
										$DESTAQUE="não";
										if( $one['ehdestaquebusca']=="1"){
											$DESTAQUE= "Sim";
										}
										
										
								 ?>
								<?php $oldstate = $one['state']; ?>
								<?php $one['state'] = team_state($one); ?>
								<tr <?php echo $index%2?'class="normal"':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
									<?if($INI['option']['box-anunciogratis']!="Y"){?><td><?php echo $one['id']; ?> <img alt="<?=$title?>" title="<?=$title?>" src="/media/css/i/<?=$bandeira?>" style="width: 22px;"> </td><? } ?>
									<td><?php echo "# " . $one['partner_plano_id'] ; ?></td>
									<td><?php echo $tituloanuncio ; ?></td> 
									<td><?php echo $one['clicados']; ?></td>  
									<td><a style="color:#FBA966;" href="/adminanunciante/team/propostas.php"><?php echo $propostas ?></a></td>  	
									<td nowrap><?php if($one['pago']=="sim"  or $one['pago']  =="s" or $one['anunciogratis']=="s"){ echo date('d/m/Y',  $one['begin_time'] );?> <br> <?php echo date('d/m/Y',  $one['end_time'] ); } else { echo " - "; }?></td> 
									<td nowrap><span class="money"><span class="money"><?php echo $currency; ?></span><?php echo moneyit3($one['team_price']); ?></td>
									<td nowrap><span class="money"> <?=$title?></td>
									<td nowrap><span class="money"> <?=$DESTAQUE?></td>
									<td nowrap><span class="money"> <?=$VITRINE?></td>
									<td class="op" nowrap>
									<?
									   if($one['pago']  !="sim"  and $one['pago']  !="s" and  $one['anunciogratis']!="s"  and $saldo <=0 ){  // ANUNCIO NAO PAGO, NAO É DO TIPO GRATIS E O USUARIO TEM SALDO  ?>
										<div style="float: left; margin-right: 2px;"><a href="<?php echo $ROOTPATH; ?>/index.php?page=planos&id=<?php echo $one['id']; ?>"  ><img alt="Efetuar o pagamento" title="Efetuar o pagamento" style="width: 28px;" src="/media/css/i/payment-card-icon.png"></a></div>
									 <? }  
									 
									   else if($one['pago']  !="sim" and $one['pago']  !="s" and  $one['anunciogratis']!="s"  and $saldo > 0 ){  // ANUNCIO NAO PAGO, NAO É DO TIPO GRATIS MAS O USUARIO SALDO, ELE PODE ATIVAR SE DESEJAR ?>
										 <div style="float: left; margin-right: 2px;"><a onclick="javascript:renovaranuncio('<?php echo $one['id']; ?>');" href="#"><img alt="Ativar este anúncio usando meu saldo de anúncios disponíveis" title="Ativar este anúncio usando meu saldo de anúncios disponíveis" style="width: 23px;" src="/media/css/i/check-mark-copy-icon.png"></a></div>
										<? } 
									 
									  else if($finalizacao and $saldo<=0 ){?> <div style="float: left; margin-right: 2px;"><a href="/adminanunciante/team/pagamentopagseguro.php?republica=true&id=<?php echo $one['id']; ?>"  ><img alt="Efetuar o pagamento e republicar anúncio. Ele será republicado com o mesmo número de anúncio e você poderá editar após a aprovação do pagamento." title="Efetuar o pagamento e republicar anúncio. Ele será republicado com o mesmo número de anúncio e você poderá editar após a aprovação do pagamento" style="width: 28px;" src="/media/css/i/Button-Refresh-icon.png"></a></div>
									  <? } 
									 
									  else if($finalizacao and $saldo > 0 ){?> <div style="float: left; margin-right: 2px;"><a  onclick="javascript:republicaranuncio('<?php echo $one['id']; ?>');" href="#"  ><img alt="Republicar anúncio. Ele será republicado como o mesmo número de anúncio e você poderá editar após a republicação." title="Republicar anúncio. Ele será republicado como o mesmo número de anúncio e você poderá editar após a republicação." style="width: 23px;" src="/media/css/i/Button-Refresh-icon.png"></a></div>
									  
									  <? } ?>
									
									<? if(!$finalizacao){?><div style="float: left; margin-right: 2px;"><a  target="_blank" href="/index.php?idoferta=<?php echo $one['id']; ?>"><img alt="Visualizar anúncio" title="Pré visualizar anúncio" src="/media/css/i/Monitoring.png" style="width: 22px;"></a></div><? } ?>
									<? if(!$finalizacao){?> <div style="float: left; margin-right: 2px;"><a href="/adminanunciante/team/edit.php?id=<?php echo $one['id']; ?>"><img alt="Editar anúncio" title="Editar anúncio" src="/media/css/i/editar.png" style="width: 22px;"></a></div><? } ?>
									<? if(!$finalizacao){ 
										if($one['desativado'] =="s"){?>
											<div style="float: left; margin-right: 2px;"><a onclick="javascript:resumo('<?php echo $one['id']; ?>');" href="#"    ><img alt="Continuar o anúncio" title="Continuar o anúncio" style="width: 17px;" src="/media/css/i/Play-1-Normal-icon.png"></a></div> 
										<?}
										else {?>
											<div style="float: left; margin-right: 2px;"><a onclick="javascript:pausar('<?php echo $one['id']; ?>');" href="#"    ><img alt="Pausar anúncio" title="Pausar anúncio" style="width: 17px;" src="/media/css/i/Stop-Normal-Red-icon.png"></a></div> 
										<?}?>
									<? } ?>
									
									</td>
								</tr>
								<?php }} ?>
								<?if(!$bregistro){?><tr><td colspan="15" style="text-align: center;">Nenhum registro encontrado.</tr><? } ?>
								<tr><td colspan="15"><?php echo $pagestring; ?></tr>
								</thead>
							</table>
						</div>
					</div>
					
					<!-- COLAPSE exibido em telas com menos de 1000px -->
						
					<div class="sect visible-xs visible-sm" style="clear:both;">
						<div class="col-md-12">
							<div class="panel-group" id="panel-315419">
							
								<?php 
						
									if(is_array($teams)){foreach($teams AS $index=>$one) { 
									$bregistro =  true; 
									$cidade = $cities[$one['city_id']]['nome'];	 
									require("manage_team_controle.php"); 
									
									$propostas = Table::Count('propostas', array(
										'idoferta' => $one[id], 
									));
									$VITRINE="não";
									if( $one['ehvitrine']=="Y"){
										$VITRINE= "Sim";
									} 
									$DESTAQUE="não";
									if( $one['ehdestaquebusca']=="1"){
										$DESTAQUE= "Sim";
									}
												
								 ?>
								<?php $oldstate = $one['state']; ?>
								<?php $one['state'] = team_state($one); ?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<a class="panel-title" data-toggle="collapse" data-parent="#panel-315419" href="#panel-element-<?php echo $one['id']?>">
											<?if($INI['option']['box-anunciogratis']!="Y"){?><?php echo $one['id']; ?> <img alt="<?=$title?>" title="<?=$title?>" src="/media/css/i/<?=$bandeira?>" style="width: 22px;"><? } ?>
										</a>
									</div>
									<div id="panel-element-<?php echo $one['id']?>" class="panel-collapse collapse">
										<div class="panel-body">
										<p><strong>Cód. Aquisição =</strong> <?php echo "# " . $one['partner_plano_id'] ; ?></p>
										<p><?php echo $tituloanuncio ; ?></p>
										<p><strong>Visualizações =</strong> <?php echo $one['clicados']; ?></p>
										<p><strong>Propostas =</strong> <a style="color:#FBA966;" href="/adminanunciante/team/propostas.php"><?php echo $propostas ?></a></p>
										<p><strong>Período =</strong> <?php if($one['pago']=="sim"  or $one['pago']  =="s" or $one['anunciogratis']=="s"){ echo date('d/m/Y',  $one['begin_time'] );?> <br> <?php echo date('d/m/Y',  $one['end_time'] ); } else { echo " - "; }?></p>
										<p><strong>Preço =</strong> <span class="money"><span class="money"><?php echo $currency; ?></span><?php echo moneyit3($one['team_price']); ?></p>
										<p><strong>Status =</strong> <?=$title?></p>
										<p><strong>Destaque na Busca =</strong>  <?=$DESTAQUE?></p>
										<p><strong>Vitrine =</strong> <?=$VITRINE?></p>
										<p>
											<?
											   if($one['pago']  !="sim"  and $one['pago']  !="s" and  $one['anunciogratis']!="s"  and $saldo <=0 ){  // ANUNCIO NAO PAGO, NAO É DO TIPO GRATIS E O USUARIO TEM SALDO  ?>
												<div style="float: left; margin-right: 2px;"><a href="<?php echo $ROOTPATH; ?>/index.php?page=planos&id=<?php echo $one['id']; ?>"  ><img alt="Efetuar o pagamento" title="Efetuar o pagamento" style="width: 28px;" src="/media/css/i/payment-card-icon.png"></a></div>
											 <? }  
											 
											   else if($one['pago']  !="sim" and $one['pago']  !="s" and  $one['anunciogratis']!="s"  and $saldo > 0 ){  // ANUNCIO NAO PAGO, NAO É DO TIPO GRATIS MAS O USUARIO SALDO, ELE PODE ATIVAR SE DESEJAR ?>
												 <div style="float: left; margin-right: 2px;"><a onclick="javascript:renovaranuncio('<?php echo $one['id']; ?>');" href="#"><img alt="Ativar este anúncio usando meu saldo de anúncios disponíveis" title="Ativar este anúncio usando meu saldo de anúncios disponíveis" style="width: 23px;" src="/media/css/i/check-mark-copy-icon.png"></a></div>
												<? } 
											 
											  else if($finalizacao and $saldo<=0 ){?> <div style="float: left; margin-right: 2px;"><a href="/adminanunciante/team/pagamentopagseguro.php?republica=true&id=<?php echo $one['id']; ?>"  ><img alt="Efetuar o pagamento e republicar anúncio. Ele será republicado com o mesmo número de anúncio e você poderá editar após a aprovação do pagamento." title="Efetuar o pagamento e republicar anúncio. Ele será republicado com o mesmo número de anúncio e você poderá editar após a aprovação do pagamento" style="width: 28px;" src="/media/css/i/Button-Refresh-icon.png"></a></div>
											  <? } 
											 
											  else if($finalizacao and $saldo > 0 ){?> <div style="float: left; margin-right: 2px;"><a  onclick="javascript:republicaranuncio('<?php echo $one['id']; ?>');" href="#"  ><img alt="Republicar anúncio. Ele será republicado como o mesmo número de anúncio e você poderá editar após a republicação." title="Republicar anúncio. Ele será republicado como o mesmo número de anúncio e você poderá editar após a republicação." style="width: 23px;" src="/media/css/i/Button-Refresh-icon.png"></a></div>
											  
											  <? } ?>
											
											<? if(!$finalizacao){?><div style="float: left; margin-right: 20px;"><a  target="_blank" href="/index.php?idoferta=<?php echo $one['id']; ?>"><img alt="Visualizar anúncio" title="Pré visualizar anúncio" src="/media/css/i/Monitoring.png" style="width: 22px;"></a></div><? } ?>
											<? if(!$finalizacao){?> <div style="float: left; margin-right: 20px;"><a href="/adminanunciante/team/edit.php?id=<?php echo $one['id']; ?>"><img alt="Editar anúncio" title="Editar anúncio" src="/media/css/i/editar.png" style="width: 22px;"></a></div><? } ?>
											<? if(!$finalizacao){ 
												if($one['desativado'] =="s"){?>
													<div style="float: left; margin-right: 20px;"><a onclick="javascript:resumo('<?php echo $one['id']; ?>');" href="#"    ><img alt="Continuar o anúncio" title="Continuar o anúncio" style="width: 17px;" src="/media/css/i/Play-1-Normal-icon.png"></a></div> 
												<?}
												else {?>
													<div style="float: left; margin-right: 20px;"><a onclick="javascript:pausar('<?php echo $one['id']; ?>');" href="#"    ><img alt="Pausar anúncio" title="Pausar anúncio" style="width: 17px;" src="/media/css/i/Stop-Normal-Red-icon.png"></a></div> 
												<?}?>
											<? } ?>
										</p>
										</div>
									</div>
								</div>
								<?php 
									}}
								?>
							</div>
						</div>
					</div>
					
					<!-- FIM DO COLAPSE exibido em telas com menos de 1000px -->
					
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>




 <script> 
 function resetFilter(){
	location.href  = '<?php echo $_SERVER["PHP_SELF"] ?>';
 }
 </script>
    <script>
  function msg(){
		jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Deletando este Anúncio...</div>"});
	}  
  function processar(){
		jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Processando, aguarde...</div>"});
	}
	
	
function gerarPDF(){
	var url = <?php echo "'" . $INI['system']['wwwprefix'] . "';"; ?>

	if($('#idoferta').val() != ''){
		var idoferta = $('#idoferta').val();
	}else{
		var idoferta = 'undefined';
	}

	if($('#team_title').val() != ''){
		var team_title = $('#team_title').val();
	}else{
		var team_title = 'undefined';
	}

	if($('#team_type option:selected').val() != ''){
		var team_type = $('#team_type option:selected').val();
	}else{
		var team_type = 'undefined';
	}

	if($('#city_id option:selected').val() != ''){
		var city_id = $('#city_id option:selected').val();
	}else{
		var city_id = 'undefined';
	}

	if($('#partner_id option:selected').val() != ''){
		var partner_id = $('#partner_id option:selected').val();
	}else{
		var partner_id = 'undefined';
	}

	var params = 'team_type='+team_type+'&team_title='+team_title+'&city_id='+city_id+'&partner_id='+partner_id;
	window.open(url + '/adminanunciante/team/pdf.php?'+params, '_blank');
}

function gerarExcel(){
	var url = <?php echo "'" . $INI['system']['wwwprefix'] . "';"; ?>

	if($('#idoferta').val() != ''){
		var idoferta = $('#idoferta').val();
	}else{
		var idoferta = 'undefined';
	}

	if($('#team_title').val() != ''){
		var team_title = $('#team_title').val();
	}else{
		var team_title = 'undefined';
	}

	if($('#team_type option:selected').val() != ''){
		var team_type = $('#team_type option:selected').val();
	}else{
		var team_type = 'undefined';
	}

	if($('#city_id option:selected').val() != ''){
		var city_id = $('#city_id option:selected').val();
	}else{
		var city_id = 'undefined';
	}

	if($('#partner_id option:selected').val() != ''){
		var partner_id = $('#partner_id option:selected').val();
	}else{
		var partner_id = 'undefined';
	}

	var params = 'team_type='+team_type+'&team_title='+team_title+'&city_id='+city_id+'&partner_id='+partner_id;
	window.open(url + '/adminanunciante/team/excel.php?'+params, '_blank');
}

function renovaranuncio(id){ 
 
	 //jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Aguarde, estamos renovando este anúncio</div>"});
	 $.get(WEB_ROOT+"/ajax/manage.php?action=renovaranuncio&id="+id,
	function(data){ 
	//	jQuery.colorbox({html:data});
		location.href  = '<?php echo $_SERVER["PHP_SELF"] ?>';
	});	 
}
function republicaranuncio(id){ 
 
	// jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Aguarde, estamos renovando este anúncio</div>"});
	 $.get(WEB_ROOT+"/ajax/manage.php?action=republica&id="+id,
	function(data){ 
		//jQuery.colorbox({html:data});
		location.href  = '<?php echo $_SERVER["PHP_SELF"] ?>';
	});	 
}
function pausar(id){ 
 
	// jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Aguarde, estamos pausando este anúncio</div>"});
	 $.get(WEB_ROOT+"/ajax/manage.php?action=pausar&id="+id,
	function(data){ 
		//jQuery.colorbox({html:data});
		location.href  = '<?php echo $_SERVER["PHP_SELF"] ?>';
	});	 
}
function resumo(id){ 
 
	// jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Aguarde, estamos pausando este anúncio</div>"});
	 $.get(WEB_ROOT+"/ajax/manage.php?action=resumo&id="+id,
	function(data){ 
		//jQuery.colorbox({html:data});
		location.href  = '<?php echo $_SERVER["PHP_SELF"] ?>';
	});	 
}

 </script>
 
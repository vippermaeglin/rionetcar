<?php include template("manage_header");?>
 
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
				<div class="option_box">
					<div class="top-heading group"> 
						<div class="left_float">
							<h4> 
							<?php if($selector=='failure'){?>
								 Anúncios Canceladas 
							<?php } else if($selector=='success') { ?>
								 Anúncios válidas, com período finalizado 
							<?php } else if($_REQUEST['acao']=='site') { ?>
								  Anúncios atuais no site  
							<?php } else { ?>
								 Todos os Anúncios 
							<?php }?>
							</h4> 
							
						</div> 
						<ul id="log_tools">
						
							<button style="border:none;"   onclick="javascript:location.href='<?=$ROOTPATH?>/vipmin/team/edit.php'"  id="run-button" class="input-btn" type="button">Adicionar Anúncio</button>
							<button style="border:none;"   onclick="javascript:location.href='<?=$ROOTPATH?>/vipmin/team/failure.php'"  id="run-button" class="input-btn" type="button">Anúncios cancelados</button>
							<button style="border:none;"  onclick="javascript:location.href='<?=$ROOTPATH?>/vipmin/team/index.php?acao=site'"  id="run-button" class="input-btn" type="button">Anúncios no site</button>
							<button style="border:none;"  onclick="javascript:location.href='<?=$ROOTPATH?>/vipmin/team/index.php'"  id="run-button" class="input-btn" type="button">Todos os anúncios</button>
							
						 </ul>
								
					</div> 
					<div class="paginacaotop"><?php echo $pagestring; ?></div>				
				
					<div class="sect" style="clear:both;">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<form method="get">
						<tr>
						<th width="40">ID <input type="text"  name="idoferta"  id="idoferta" style="width: 50%; color:#303030;font-size:11px;"> </th>
						<th width="70">Cód. Aquisição <img style="cursor:help" class="tTip" title="Cod. de Aquisição é um número único referente aos anúncios do plano. É gerado quando o usuário compra um plano de anúncios. Obviamente anúncios cadastrados pelo administrador não tem este código." src="<?=$ROOTPATH?>/media/css/i/info.png"> <input type="text"  name="codaquisicao"  id="codaquisicao" style="width: 40%; color:#303030;font-size:11px;"></th>
						<th width="350">Anúncio <input type="text"  value="<?=$_REQUEST['team_title']?>" name="team_title"  id="team_title" style="width: 75%; color:#303030;font-size:11px;"></th>
						<!--<th width="40">Visualizações  </th> -->
						<th width="40">Cliques  </th>
						<!--  <th width="120"> Cidade </th> -->
						<th width="120" nowrap><select id="partner_id" name="partner_id" class="f-input"   style="width:95%;height:23px;font-weight:normal;font-size:11px;"> <option value="">Todos os anunciantes</option><?php echo Utility::Option($users, $_REQUEST['partner_id']); ?></select> </th>
						<th width="40">Período</th> 
						<th width="60" nowrap>Preço</th>
						<th width="60" nowrap>Status</th>
						<th width="60" nowrap>Vitrine</th>
						<th width="60" nowrap>Destaque Busca</th>
						<th width="220">  
						<button style="width: 60px;" type="submit"><span>Buscar</span></button>
						<button style="width: 60px"  onclick="resetFilter()" type="button"><span>Limpar</span></button>
						<!-- 
						<button style="width: 60px"  onclick="gerarPDF()" type="button"><span>PDF</span></button>
						<button style="width: 60px" onclick="gerarExcel()" type="button"><span>Excel</span></button>
						-->
						</th>
						</tr>
						</form>
						<?php if(is_array($teams)){foreach($teams AS $index=>$one) { 
								$bregistro =  true; 
								$cidade = $cities[$one['city_id']]['nome'];	 
								require("manage_team_controle.php");  
								
								$VITRINE="não";
								if( $one['ehvitrine']=="Y"){
									$VITRINE= "Sim";
								}
								$DESTAQUE="Não";
								if( $one['ehdestaquebusca']=="1"){
									$DESTAQUE= "Sim";
								}
						 ?>
						<?php $oldstate = $one['state']; ?>
						<?php $one['state'] = team_state($one); ?>
						<tr <?php echo $index%2?'class="normal"':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
							<td><?php echo $one['id']; ?> <img alt="<?=$title?>" title="<?=$title?>" src="/media/css/i/<?=$bandeira?>" style="width: 22px;"> </td>
							<td><?php echo $one['partner_plano_id']?></td>
							<td><?php echo $tituloanuncio; ?></td>
							<!--<td><?php echo $one['visualizados']; ?></td> -->
							<td><?php echo $one['clicados']; ?></td> 
							<!-- <td nowrap><?php echo $cidade ; ?> </td> -->
							<td nowrap> <?php echo $user[$one['partner_id']]['realname']; ?></td> 
							<td nowrap><?php if($one['pago']=="sim" or $one['anunciogratis']=="s"){ echo date('d/m/Y',  $one['begin_time'] );?> <br> <?php echo date('d/m/Y',  $one['end_time'] ); } else { echo " - "; }?></td> 
							<td nowrap><span class="money"> <span class="money"><?php echo $currency; ?></span><?php echo moneyit3($one['team_price']); ?></td>
							<td nowrap><span class="money"> <?=$title?></td>
							<td nowrap><span class="money"> <?=$VITRINE?></td>
							<td nowrap><span class="money"> <?=$DESTAQUE?></td>
							<td class="op" nowrap>
							<div style="float: left; margin-right: 2px;"><a  target="_blank" href="/index.php?idoferta=<?php echo $one['id']; ?>"><img alt="Visualizar anúncio" title="Visualizar anúncio" src="/media/css/i/Monitoring.ico" style="width: 22px;"></a></div>
							<div style="float: left; margin-right: 2px;"><a href="/vipmin/team/edit.php?id=<?php echo $one['id']; ?>"><img alt="Editar anúncio" title="Editar anúncio" src="/media/css/i/editar.png" style="width: 22px;"></a></div>
							<div style="float: left; margin-right: 2px;"><a href="/ajax/manage.php?action=teamremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Você tem certeza que deseja apagar este anúncio?" ><img alt="Excluir" title="Excluir" style="width: 17px;" src="/media/css/i/excluir.png"></a></div>
							 
						    
							</td>
						</tr>
						<?php }} ?>
						<?if(!$bregistro){?><tr><td colspan="15" style="text-align: center;">Nenhum registro encontrado. Redefina sua pesquisa</tr><? } ?>
						<tr><td colspan="15"><?php echo $pagestring; ?></tr>
						</table>
					</div>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->



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
	window.open(url + '/vipmin/team/pdf.php?'+params, '_blank');
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
	window.open(url + '/vipmin/team/excel.php?'+params, '_blank');
}
 </script>
 
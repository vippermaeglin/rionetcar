<?php include template("manage_anunciante_header"); ?>
 
<div id="coupons" class="container-fluid"> 
    <div id="content" class="coupons-box clear mainwide row">
		<div class="box clear col-md-12"> 
            <div class="box-content">
				<div class="option_box"> 
					<div class="top-heading group"> 
						<div class="col-md-12 col-xs-12 col-sm-12" style="padding: 10px;">
							<h4 class="text-left;" style="color: #FFF;text-transform:uppercase;font-weight:bold;font-size:14px;">
								Ofertas especiais
							</h4> 							
						</div> 					 
					</div>
					<div class="paginacaotop"><?php echo $pagestring; ?></div>				
				
					<div class="sect" style="clear:both;">
						<div class="table-responsive">
							<table id="orders-list" class="table table-inverse">			 
								<thead class="thead-inverse">
								<form method="get">
								<tr>
								<th width="40">ID <input type="text"  name="idoferta"  id="idoferta" style="width: 50%; color:#303030;font-size:11px;"> </th>
								 <th width="350">Anúncio <input type="text"  value="<?=$_REQUEST['team_title']?>" name="team_title"  id="team_title" style="width: 75%; color:#303030;font-size:11px;"></th>
								 <!-- <th width="120" nowrap><select id="partner_id" name="partner_id" class="f-input"   style="width:95%;height:23px;font-weight:normal;font-size:11px;"> <option value="">Todos os anunciantes</option><?php echo Utility::Option($users, $_REQUEST['partner_id']); ?></select> </th> -->
								<!-- <th width="40">Período</th> -->
								<th width="60" nowrap>Preço Especial</th>   
								<th width="220">  
								<button type="submit" class="btn btn-primary"><span>Buscar</span></button>
								<button onclick="resetFilter()" type="button" class="btn btn-primary"><span>Limpar</span></button>
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
						 ?>
						<?php $oldstate = $one['state']; ?>
						<?php $one['state'] = team_state($one); ?>
						<tr <?php echo $index%2?'class="normal"':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
							<td><?php echo $one['id']; ?> <img alt="<?=$title?>" title="<?=$title?>" src="/media/css/i/<?=$bandeira?>" style="width: 22px;"> </td>
							 <td><?php echo $tituloanuncio; ?></td>  
							<!-- <td nowrap> <?php echo $user[$one['partner_id']]['realname']; ?></td> -->
							<!-- <td nowrap><?php if($one['pago']=="sim" or $one['anunciogratis']=="s"){ echo date('d/m/Y',  $one['begin_time'] );?> <br> <?php echo date('d/m/Y',  $one['end_time'] ); } else { echo " - "; }?></td> -->
							<td nowrap><span class="money"> <span class="money"><?php echo $currency; ?></span><?php echo moneyit3($one['precorevendas']); ?></td>
							 <td class="op" nowrap>
							<div style="float: left; margin-right: 2px;"><a  target="_blank" href="/index.php?idoferta=<?php echo $one['id']; ?>"><img alt="Visualizar anúncio" title="Visualizar anúncio" src="/media/css/i/Monitoring.ico" style="width: 22px;"></a></div>
							   
							</td>
						</tr>
						<?php }} ?>
						<?if(!$bregistro){?><tr><td colspan="15" style="text-align: center;">Nenhum registro encontrado. Redefina sua pesquisa</tr><? } ?>
						<tr><td colspan="15"><?php echo $pagestring; ?></tr>
						</thead>
						</table>
					</div>
					</div>
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
 
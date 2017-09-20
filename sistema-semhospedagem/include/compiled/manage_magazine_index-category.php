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
								Categorias para revista
							</h4>							
						</div> 
						<ul id="log_tools">						
							<button style="border:none;"   onclick="javascript:location.href='<?=$ROOTPATH?>/vipmin/magazine/edit-category.php'"  id="run-button" class="input-btn" type="button"><?php echo utf8_decode("Adicionar nova categoria"); ?></button>
						</ul>								
					</div> 
					<div class="paginacaotop"><?php echo $pagestring; ?></div>				
					<div class="sect" style="clear:both;">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
							<form method="get">
								<tr>
								<th width="40">ID <input type="text"  name="id"  id="id" style="width: 50%; color:#303030;font-size:11px;"> </th>
								<th width="350">Nome <input type="text"  value="<?=$_REQUEST['name']?>" name="name"  id="name" style="width: 75%; color:#303030;font-size:11px;"></th>
								<th width="60" nowrap>Status</th>
								<th width="220">  
								<button style="width: 60px;" type="submit"><span>Buscar</span></button>
								<button style="width: 60px"  onclick="resetFilter()" type="button"><span>Limpar</span></button>
								</th>
								</tr>
							</form>
						<?php if(is_array($magazine_category)){
									foreach($magazine_category AS $index=>$one_category) {
										$bregistro =  true; 
										$cidade = $cities[$one_category['city_id']]['nome'];
										
										/* Controle de bandeiras das categorias de revista, foi incluido neste arquivo. */		
										require("manage_team_controle.php");  
								
						 ?>
						<?php $oldstate = $one_category['state']; ?>
						<?php $one_category['state'] = team_state($one_category); ?>
						<tr <?php echo $index%2?'class="normal"':'class="alt"'; ?> id="team-list-id-<?php echo $one_category['id']; ?>">
							<td><?php echo $one_category['id']; ?> <img alt="<?=$title?>" title="<?=$title?>" src="/media/css/i/<?=$bandeira?>" style="width: 22px;"> </td>
							<td><?php echo $one_category['name']?></td>
							<td><?php echo $status; ?></td>
							<td class="op" nowrap>
							<!--<div style="float: left; margin-right: 2px;"><a  target="_blank" href="/index.php?idoferta=<?php echo $one_category['id']; ?>"><img alt="Visualizar anúncio" title="Visualizar anúncio" src="/media/css/i/Monitoring.ico" style="width: 22px;"></a></div>-->
							<div style="float: left; margin-right: 2px;"><a href="/vipmin/magazine/edit-category.php?id=<?php echo $one_category['id']; ?>"><img alt="<?php echo utf8_encode("Editar anúncio"); ?>" title="<?php echo utf8_encode("Editar anúncio"); ?>" src="/media/css/i/editar.png" style="width: 22px;"></a></div>
							<div style="float: left; margin-right: 2px;"><a href="/ajax/manage.php?action=magazine-categoryremove&id=<?php echo $one_category['id']; ?>" class="ajaxlink" ask="<?php echo utf8_encode("Você tem certeza que deseja apagar este anúncio?"); ?>" ><img alt="Excluir" title="Excluir" style="width: 17px;" src="/media/css/i/excluir.png"></a></div>
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
 
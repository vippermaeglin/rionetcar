<?php include template("manage_header"); ?>
 
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
				<div class="option_box">
					<div class="top-heading group"> 
						<div class="left_float">
							<h4>  Propostas Recebidas </h4> 
							
						</div> 
						 
					</div> 
					<div class="paginacaotop"><?php echo $pagestring; ?></div>				
				
					<div class="sect" style="clear:both;">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
				 
				 		<form method="get">
						<tr>
				  
						<th width="20" nowrap>Id</th>
						<th width="160" nowrap>Anúncio</th>
						<th width="50" nowrap>Nome</th> 
						<th width="50" nowrap>Email</th> 
						<th width="50" nowrap>DDD</th> 
						<th width="50" nowrap>Telefone</th> 
						<th width="280" nowrap>Mensagem</th>  
						<th width="50" nowrap>Data</th>
						<th width="30" nowrap>Excluir</th>
					 
						</tr>
						</form>
						
						<?php if(is_array($propostas)){foreach($propostas AS $index=>$one) { 
						
								$bregistro =  true;  
								
								$team = Table::Fetch('team', $one['idoferta']);
								
								$ddd= " - ";
								if($one['ddd_proposta'] != "DDD"){
										$ddd=$one['ddd_proposta'];
								}	
								
								$telefone= " - ";
								if($one['telefone_proposta'] != "Telefone"){
										$telefone=$one['telefone_proposta'];
								}
						 ?>  
						<tr <?php echo $index%2?'class="normal"':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
							<td><?php echo $one['id']; ?>  </td>
							<td><?php echo $team['title']; ?></td>
							<td><?php echo $one['nome_proposta']; ?></td>
							<td><?php echo $one['email_proposta']; ?></td> 
							<td><?php echo $ddd; ?></td> 
							<td><?php echo $telefone   ?></td> 
							<td><?php echo $one['proposta']; ?></td> 
							<td><?php echo data($one['data'] ) ?></td> 
							<td class="op" nowrap>
								<div style="float: left; margin-right: 2px;"><a href="/ajax/manage.php?action=propostaremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Você tem certeza que deseja apagar essa proposta ?" ><img alt="Excluir" title="Excluir" style="width: 17px;" src="/media/css/i/excluir.png"></a></div>
							</td>
						</tr>
						<?php }} ?>
						<?if(!$bregistro){?><tr><td colspan="15" style="text-align: center;">Nenhum registro encontrado. Redefina sua pesquisa</tr><? } ?>
						<tr><td colspan="10"><?php echo $pagestring; ?></tr>
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
		jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Deletando Proposta...</div>"});
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
 
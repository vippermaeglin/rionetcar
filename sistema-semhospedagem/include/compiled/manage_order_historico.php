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
							<h4> Histórico de Aquisição de Planos pelos Usuários </h4> 
						 </div>  
					</div> 
					<div class="paginacaotop"><?php echo $pagestring; ?></div>				
				
					<div class="sect" style="clear:both;">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<form method="get">
						<tr>
						<th width="60">Cód. Aquisicao <input type="text" value="<?=$_REQUEST['codaquisicao']?>" name="codaquisicao"  id="codaquisicao" style="width: 50%; color:#303030;font-size:11px;"> </th>
						<th width="80">Nome Usuário </th>
						<th width="60">Email <input type="text"  value="<?=$_REQUEST['uemail']?>"  name="uemail"  id="uemail" style="width: 95%; color:#303030;font-size:11px;"> </th>
						<th width="70">Plano  </th>
						<!-- <th width="40">Ofertas Simultâneos</th>-->
						<th width="100">Anúncios Contratados</th> 
						<th width="100">Status do Plano <!-- <select id="status" name="status" class="f-input"   style="width:95%;height:23px;font-weight:normal;font-size:11px;"> <option value="">Todos</option>  <option value="aprovado">Aprovado</option><option value="">Pendente</option></select> --></th>
					 
						<th width="40">Valor</th>  
						<th width="120">Opcionais</th>  
						<th width="100">  
						<button style="width: 60px;" type="submit"><span>Buscar</span></button>
						<button style="width: 60px"  onclick="resetFilter()" type="button"><span>Limpar</span></button> 
						<!-- <button style="width: 60px" onclick="gerarExcel()" type="button"><span>Excel</span></button>-->
						</th>
						</tr>
						</form>
						<?php if(is_array($registros)){foreach($registros AS $index=>$one) { 
								$bregistro =  true;  
							 
								$planos = Table::Fetch('planos_publicacao', $one['plano_id']); 
								$user = Table::Fetch('user', $one['partner_id']);
								
								$sql 	=  "select count(id) as qtde from team where user_id = ".$one['partner_id']." and user_planos_id  =  ".$one['id'];
								$rs  	= mysql_query($sql);
								$row 	= mysql_fetch_assoc($rs);
								$qtde_anuncios_publicados   =  $row[qtde]; 
								$status = $one['status']; 
								if($status==""){
									$status = "<span style='color:orange'>Pendente</span>";
								}
								else if($status=="aprovado"){
									$status = "<span style='color:yellow'>Aprovado</span>";
								}
								else if($status=="gratis"){
									$status = "<span style='color:yellow'>Grátis</span>";
								}
								$opcionais="";
								$sql2 	=  "select  * from planos_upgrade_partner_plano where  idpartnerplanos = ".$one['id'] ; 
								$rs2  	= mysql_query($sql2);
								while($linha = mysql_fetch_object($rs2)){
									
									$idupgrade = $linha->idupgrade;
									$usou = $linha->usou;
									if($usou==""){
										$usou="não usado";
									}
									else{
										$usou="<span style='color:grey'>usado</span>";
									}
									$opcionais.= $idupgrade." - ".$usou."<br>";
								}
								if($opcionais==""){
									$opcionais = " - ";
								}
			
						 ?>  
						<tr <?php echo $index%2?'class="normal"':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
							<td><?php echo $one['id']; ?>  </td>
							<td><?php echo $user['realname']; ?></td>
							<td nowrap><?php echo $user['email']; ?> (<?php echo $user['id'] ?>)</td>  
							<td><?php echo $planos['nome'] ?>  </td>
							<td><?php echo $one['qtdeanuncio']  ?></td>  
							<!-- <td nowrap> <span style='color:#FFAC47'><? echo $qtde_anuncios_publicados ?></span> </td>-->
							<td> <?php echo $status; ?></td>   
							<td nowrap><? if($one['valor']!="0.00"){?>R$ <?php echo $one['valor'];  } else if($idupgrade) { echo "R$ ".gettotal_pago_upgrade($one['id']); } else { echo "-";} ?></td> 
							<td> <?php echo $opcionais; ?></td> 							
							<td class="op" nowrap>
							<div style="float: left; margin-right: 2px;"><? if($qtde_anuncios_publicados!="0"){?><a href="/vipmin/team/index.php?idoferta=&team_title=&codaquisicao=<?php echo $one['id']; ?>"><img alt="Consultar Oferta(s)" title="Consultar Oferta(s)" src="/media/css/i/Monitoring.ico" style="width: 22px;"></a><? } ?></div>
							<div style="float: left; margin-right: 2px;"><a href="/vipmin/order/hitoricoedit.php?id=<?php echo $one['id']; ?>"><img alt="Editar Aquisição" title="Editar Aquisição" src="/media/css/i/editar.png" style="width: 22px;"></a></div>
							<div style="float: left; margin-right: 2px;"><a href="/ajax/manage.php?action=historicoremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Você tem certeza que deseja apagar esta aquisição de plano?" ><img alt="Excluir" title="Excluir" style="width: 17px;" src="/media/css/i/excluir.png"></a></div>
							<!-- <div><a href="/lojista/down.php?id=<?php echo $one['id']; ?>" ><img alt="Gerar Excel dos pedidos somente desta oferta" title="Gerar Excel dos pedidos somente desta oferta"  style="width: 22px;"  src="/media/css/i/excel-icon.png"></a></div>-->
							</td>
						</tr>
						<?php }} ?>
						<?if(!$bregistro){?><tr><td colspan="18" style="text-align: center;">Nenhum registro encontrado. Redefina sua pesquisa</tr><? } ?>
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
		//jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Deletando esta oferta...</div>"});
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
 
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
							<h4>   Ofertas Configuráveis <img style="cursor:help" class="tTip" title="Com ofertas configuráveis, você pode criar ofertas como essa: 3, 5 ou 10 sessões de secagem de peeling com luz pulsada intensa, a partir de R$ 49,90." src="<?=$ROOTPATH?>/media/css/i/info.png">  </h4> 
							
						</div> 
						<div style="padding: 10px;">
						
							<ul id="log_tools"> <li id="log_switch_referral"><a title="Adicionar ofertas ao pacote. Note que você deve ter ao menos 1 pacote cadastrado." href="/vipmin/team/oferta_pacote.php">Adicionar ofertas ao pacote</a></li> </ul>
							<ul id="log_tools"> <li id="log_switch_referral"><a title="Criar novo pacote de ofertas" href="/vipmin/team/pacote.php">Criar novo pacote de ofertas</a></li> </ul>  
						</div>
					</div> 
					<div class="paginacaotop"><?php echo $pagestring; ?></div>				
				
					<div class="sect" style="clear:both;">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<form method="get">
						<tr>
						<th width="40">ID <input type="text"  name="idoferta"  id="idoferta" style="width: 50%; color:#303030;font-size:11px;"> </th>
						<th width="250">Oferta <input type="text"  value="<?=$_REQUEST['team_title']?>" name="team_title"  id="team_title" style="width: 50%; color:#303030;font-size:11px;"></th>
						<th width="60"><select id="team_type" name="team_type" class="f-input"   style="width:90%;height:23px;font-weight:normal;font-size:11px;"> <option value="">Todos os tipos</option> <option value="simples" <? if($_REQUEST['team_type']=="simples"){ echo "selected";} ?> >Simples</option> <option value="pacote" <? if($_REQUEST['team_type']=="pacote"){ echo "selected";} ?> >Pacote</option> </select> </th> 
						<th width="150"><select id="city_id" name="city_id" class="f-input"   style="width:73%;height:23px;font-weight:normal;font-size:11px;"><?php echo Utility::Option(Utility::OptionArray($allcities, 'id','name'), $_REQUEST['city_id'], 'todas as cidades'); ?></select></th>
						<th width="120" nowrap><select id="partner_id" name="partner_id" class="f-input"   style="width:100%;height:23px;font-weight:normal;font-size:11px;"> <option value="">Todos os parceiros</option><?php echo Utility::Option($partners, $_REQUEST['partner_id']); ?></select> </th>
						<th width="40">Período</th> 
						<th width="60" nowrap>Preço</th>
						<th width="150">  
						<button style="width: 60px;" type="submit"><span>Buscar</span></button>
						<button style="width: 60px"  onclick="resetFilter()" type="button"><span>Limpar</span></button> 
						</th>
						</tr>
						</form>
						<?php 
						if(is_array($teams)){foreach($teams AS $index=>$one) { 
								$bregistro =  true; 
								$cidade = $cities[$one['city_id']]['name'];	 
								if($cities[$one['city_id']]['name']==""){
									$cidade = "Em todas as cidades - ";	
								}
					
						 if($one['team_type']=="simples"){ 
						 	$arquivoedit =  "oferta_pacote.php";
						 }
						 else{
							$arquivoedit =  "pacote.php";	
						}
						 ?>
						<?php $oldstate = $one['state']; ?>
						<?php $one['state'] = team_state($one); ?>
						<tr <?php echo $index%2?'class="normal"':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
							<td><?php echo $one['id']; ?></a></td>
							<td><?php echo $one['title']; ?></td>
							<td nowrap><?php echo $one['team_type'] ?><?if($one['team_type']=="simples"){ echo " - associado ao pacote ".$one['idpacote'];}?></td>
							<td nowrap><? if($one['team_type']=="pacote"){?> <?php echo $cidade ; ?><?php echo $groups[$one['group_id']]['name'];  ?><? }else{ echo "-";} ?></td> 
							<td nowrap><? if($one['team_type']=="pacote"){?> <?php echo $partner[$one['partner_id']]['title']; ?><? }else{ echo "-";} ?></td> 
							<td nowrap><?php echo date('d/m/Y',  $one['begin_time'] );?> a <?php echo date('d/m/Y',  $one['end_time'] );?></td> 
							 <td nowrap><? if($one['team_type']=="simples"){?><span class="money"><?php echo $currency; ?></span><?php echo moneyit3($one['team_price']); ?><? }else{ echo "-";} ?></td>
							<td class="op" nowrap>
							<div style="float: left; margin-right: 2px;"><a href="/vipmin/team/<?=$arquivoedit?>?id=<?php echo $one['id']; ?>"><img alt="Editar" title="Editar" src="/media/css/i/editar.png" style="width: 22px;"></a></div>
							<div style="float: left; margin-right: 2px;"><a href="/ajax/manage.php?action=teamremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Você tem certeza que deseja apagar essa oferta?" ><img alt="Excluir" title="Excluir" style="width: 17px;" src="/media/css/i/excluir.png"></a></div>
							<div style="float: left; margin-right: 2px;"><a target="_blank" href="/templates/newsletter_oferta_modelo3.php?idoferta=<?php echo $one['id']; ?>"><img alt="Visualizar envio de newsletter. Caso tenha conhecimentos em HTML, você pode alterar essa template de newsletter acessando o diretório Templates, através de um programa de FTP. Ou se preferir, verifique nossos planos de criação de campanhas para newsletter" title="Visualizar envio de newsletter. Caso tenha conhecimentos em HTML, você pode alterar essa template de newsletter acessando o diretório Templates, através de um programa de FTP. Ou se preferir, verifique nossos planos de criação de campanhas para newsletter" style="width: 22px;" src="/media/css/i/detalhe2.png"></a></div>
							<div style="float: left; margin-right: 2px;"><a href="/ajax/manage.php?action=teamdetail&id=<?php echo $one['id']; ?>" class="processar"><img alt="Enviar newsletter" title="Enviar newsletter" style="width: 22px;" src="/media/css/i/email.png"></a></div>
							
							<?php 
								$sql =  "SELECT count(id) as total FROM `coupon` where team_id = ".$one['id']; 
								$rs = mysql_query($sql);
								$linha = mysql_fetch_object($rs);
								$total = $linha->total;
							   
							   if($total  > 0 ){ 
									
								?>
							 
								<div style="float: left; margin-right: 2px;"><a href="/vipmin/team/down.php?id=<?php echo $one['id']; ?>" target="_blank"><img alt="Fazer download de <?=$total?> cupon(s) disponíveis" title="Fazer download de <?=$total?> cupon(s) disponíveis" style="width: 22px;" src="/media/css/i/cupom.png"></a></div>
							
							<?php } ?>
							<div><a href="/ajax/manage.php?action=duplicar&id=<?php echo $one['id']; ?>" class="processar"  ><img alt="Duplicar Oferta" title="Duplicar Oferta" style="width: 22px;" src="/media/css/i/icon-48-media.png"></a></div>
							
							</td>
						</tr>
						<?php }} ?>
						<?if(!$bregistro){?><tr><td colspan="13" style="text-align: center;">Nenhum registro encontrado. Redefina sua pesquisa</tr><? } ?>
						<tr><td colspan="8"><?php echo $pagestring; ?></tr>
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
		jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Deletando esta oferta...</div>"});
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
 
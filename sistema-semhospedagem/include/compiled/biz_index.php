<?php include template("biz_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
				<div class="option_box">
						<div class="top-heading group"> <div class="left_float"><h4>Lista de ofertas</h4></div> 
							<div style="padding: 10px;">
									<ul id="log_tools"> <li id="log_switch_referral"><a title="Altere sua senha, nome, dados bancários" href="/lojista/settings.php">Configurações</a></li> </ul> 
									<ul id="log_tools"> <li id="log_switch_referral"><a title="Lista de cupons gerados com a venda das ofertas" href="/lojista/coupon.php">Cupons Gerados</a></li> </ul>
									<ul id="log_tools"> <li id="log_switch_referral"><a title="Lista de ofertas" href="/lojista/index.php">Lista de Ofertas</a></li> </ul>
							</div>	 
						</div> 
						
					<div class="paginacaotop"><?php echo $pagestring; ?></div>	
					 
					<div class="sect" style="clear:both;">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="390">Oferta</th><th width="150">Cidade</th><th width="120">Data</th><th width="50">Quant. válida</th><th width="100">Preço praticado</th><th width="120">Operações</th></tr>
						<?php if(is_array($teams)){foreach($teams AS $index=>$one) { 
								if($cities[$one['city_id']]['name']==""){
										$cidade = "Todas as Cidades";
								}
								else{
										$cidade = $cities[$one['city_id']]['name'];
								}
						?>
						<?php $one['state'] = team_state($one); ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
							<td style="text-align:left;"> <?php echo $one['title']; ?> </td>
							<td><?php echo $cidade; ?></td>
							<td><?php echo date('d-m-Y',$one['begin_time']); ?> até <?php echo date('d-m-Y',$one['end_time']); ?></td>
							<td><?php echo $one['now_number']; ?> / <?php echo $one['min_number']; ?></td>
							<td><span class="money">De <?php echo $currency; ?></span><?php echo moneyit3($one['market_price']); ?> Por <span class="money"><?php echo $currency; ?></span><?php echo moneyit3($one['team_price']); ?></td>
							<td class="op" nowrap><a  target="_blank" href="/index.php?idoferta=<?php echo $one['id']; ?>"><img alt="Visualizar Oferta" title="Visualizar Oferta" src="/media/css/i/Monitoring.ico" style="width: 22px;"></a><!-- <a href="/ajax/partner.php?action=teamdetail&id=<?php echo $one['id']; ?>" class="processar"><img alt="Detalhes" title="Detalhes" src="/media/css/i/detalhe2.png" style="width: 22px;"></a>--><?php if($one['now_number']>=$one['min_number']){?>
								<button style="width: 116px"  onclick="gerarExcel('<?php echo $one['id']; ?>')"  type="button"><span>Excel dos pedidos</span></button>
								<?php }?></td>
						</tr>
						<?php }}?>
						<tr><td colspan="6"><?php echo $pagestring; ?></tr>
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
 function gerarExcel(idoferta){
	var url = <?php echo "'" . $INI['system']['wwwprefix'] . "';"; ?>
  
	window.open(url + '/lojista/down.php?id='+idoferta, '_blank');
}
</script>

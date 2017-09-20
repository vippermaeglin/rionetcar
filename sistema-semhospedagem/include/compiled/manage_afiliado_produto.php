<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_afiliados($selector); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
			 
                    <h2>Produtos de anunciante</h2>
				 
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="40">ID</th><th width="400">oferta</th><th width="80" nowrap>anunciante</th><th width="100">data</th><th width="50">visualizado</th><th width="50">clicado</th><th width="60" nowrap>preço</th><th width="140">operação</th></tr>
					<?php if(is_array($teams)){foreach($teams AS $index=>$one) { ?>
					<?php $oldstate = $one['state']; ?>
					<?php $one['state'] = team_state($one); ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?></a></td>
						<td>
						   <?php echo $one['title']; ?> 
						</td>
						<td nowrap><?php echo $cities[$one['city_id']]['name']; ?><br/><?php echo $partners[$one['partner_id']]['title']; ?></td>
						<td nowrap><?php echo date('d-m-Y',$one['begin_time']); ?><br/><?php echo date('d-m-Y',$one['end_time']); ?></td>
						<td nowrap><?php if($one['visualizados'] == "") {$one['visualizados'] = 0 ;}  echo $one['visualizados']; ?></td>
						<td nowrap><a href="produtoclicado.php?idoferta=<?=$one['id']; ?>"><?php  if($one['enviados'] == "") {$one['enviados'] = 0 ;} echo $one['enviados']; ?></a></td>
						<td nowrap> <span class="money"><?php echo $currency; ?></span><?php echo moneyit3($one['team_price']); ?></td>
						<td class="op" nowrap><a target="_blank" href="/templates/newsletter_oferta_modelo3.php?tipo=anunciante&idoferta=<?php echo $one['id']; ?>">visualizar</a>|<a href="/ajax/manage.php?action=filiadodetail&id=<?php echo $one['id']; ?>" class="ajaxlink">enviar</a>|<a href="/vipmin/afiliado/produtoedit.php?id=<?php echo $one['id']; ?>">editar</a>|<a href="/ajax/manage.php?action=teamremovewebsite&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="tem certeza que quer apagar esse produto?" >deletar</a> </td>
					 
					</tr>
					<?php }} ?>
					<tr><td colspan="7"><?php echo $pagestring; ?></tr>
                    </table>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->




<?php


?>


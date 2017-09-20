<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_coupon('card'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
					<h2> Cupom </h2>
					<ul class="filter">
						<li><form method="get">ID da Oferta:<input type="text" name="tid" value="<?php echo htmlspecialchars($tid); ?>" class="h-input" />&nbsp;ID do Parceiro ?<input type="text" name="pid" value="<?php echo htmlspecialchars($pid); ?>" class="h-input" />&nbsp;Simbolo:<input type="text" name="code" value="<?php echo htmlspecialchars($code); ?>" class="h-input" />&nbsp;Status?<select name="state"><?php echo Utility::Option($usage, $state, 'all'); ?></select>&nbsp;<input type="submit" value="select" class="formbutton"  style="padding:1px 6px;"/>&nbsp;<input type="submit" name="download" value="download" class="formbutton"  style="padding:1px 6px;"/><form></li>
					</ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="120">ID</th><th width="40">Valor</th><th width="120">Código</th><th width="80">até</th><th width="100">Status</th><th width="380">Parceiro</th><th width="40">Operação</th></tr>
					<?php if(is_array($cards)){foreach($cards AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?></td>
						<td nowrap><?php echo moneyit($one['credit']); ?></td>
						<td nowrap><?php echo $one['code']; ?></td>
						<td nowrap><?php echo date('d-m-Y',$one['begin_time']); ?><br/><?php echo date('d-m-Y',$one['end_time']); ?></td>
						<td nowrap><?php echo $one['consume']=='Y' ? 'usado':'usável'; ?><?php if($one['consume']=='Y'){?>&nbsp;(<?php echo $one['team_id']; ?>)<?php }?></td>
						<td><?php echo $one['partner_id']; ?><?php if($one['partner_id']){?>&nbsp;(<?php echo $partners[$one['partner_id']]['title']; ?>)<?php }?></td>
						<td class="op" nowrap><a href="/ajax/manage.php?action=cardremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Tem certeza que deseja deletar esse cupom?">deletar</a></td>
					</tr>
					<?php }}?>
					<tr><td colspan="7"><?php echo $pagestring; ?></td></tr>
                    </table>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>

<div id="sidebar">
</div>

</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->



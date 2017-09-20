<?php include template("manage_header");?>
<?php $action=($s=='store')?'Top-line ':' Users withdraw cash';; ?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="money">
  
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
				 <div class="option_box">
						<div class="top-heading group"> <div class="left_float"><h4>Recarga de créditos (total: <span class="currency"><?php echo $currency; ?></span><?php echo abs($summary); ?>)</h4></div> </div> 
							 
					<div class="sect">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
							<tr><th width="200">Usuário/Email</th> <th width="160">valor</th><th width="200">operação</th><th width="200"> Data</th></tr>
						<?php if(is_array($flows)){foreach($flows AS $index=>$one) { ?>
							<tr <?php echo $index%2?'':'class="alt"'; ?>>
								<td nowrap><?php echo $users[$one['user_id']]['email']; ?> </td>
								 
								<td nowrap><span class="money"><?php echo $currency; ?></span><?php echo moneyit(abs($one['money'])); ?></td>
								<td nowrap> <?php echo $users[$one['admin_id']]['username']; ?></td>
								<td nowrap> <?php echo date('d-m-Y H:i', $one['create_time']); ?></td>
							</tr>
						<?php }}?>
							<tr><td colspan="5"><?php echo $pagestring; ?></td></tr>
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



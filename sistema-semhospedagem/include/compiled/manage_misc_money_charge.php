<?php include template("manage_header");?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="money">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_misc('money'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>Online topup (total)<span class="currency"><?php echo $currency; ?></span><?php echo abs($summary); ?>)</h2>
                    <ul class="filter">
						<li class="label"> </li>
						<?php echo mcurrent_misc_money($s); ?>
					</ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<tr><th width="200">Usuário/Email</th><th width="100">ação</th><th width="160">valor</th><th width="200">tipo de pagamento</th><th width="200"><?php echo $action; ?>time</th></tr>
					<?php if(is_array($flows)){foreach($flows AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>>
							<td nowrap><?php echo $users[$one['user_id']]['email']; ?><br/><?php echo $users[$one['user_id']]['username']; ?></td>
							<td nowrap>Online topup</td>
							<td nowrap><span class="money"><?php echo $currency; ?></span><?php echo moneyit(abs($one['money'])); ?></td>
							<td nowrap><?php echo $option_service[$pays[$one['detail_id']]['service']]; ?></td>
							<td nowrap><?php echo date('d-m-Y H:i', $one['create_time']); ?></td>
						</tr>
					<?php }}?>
						<tr><td colspan="5"><?php echo $pagestring; ?></td></tr>
                    </table>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>

</div> <!-- bd end -->
</div> <!-- bdw end -->



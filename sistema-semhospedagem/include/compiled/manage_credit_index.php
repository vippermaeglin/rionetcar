<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_credit('index'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>registros de crédito</h2>
                    <ul class="filter">
						<li><form action="/vipmin/credit/index.php" method="get">login：
						<input type="text" name="uname" class="h-input" value="<?php echo htmlspecialchars($uname); ?>" >&nbsp;Email：<input type="text" name="like" class="h-input" value="<?php echo htmlspecialchars($like); ?>" >&nbsp;<select name="action" style="width:120px;"><?php echo Utility::Option($option_action, $action, 'Tudo'); ?></select>&nbsp;<input type="submit" value="buscar" class="formbutton"  style="padding:1px 6px;"/><form></li>
					</ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="50">ID</th>
					<th width="200">Email/login</th>
					<th width="100" nowrap>nome/cidade</th>
					<th width="40">crédito</th>
					<th width="400">detalhe</th><th width="100">&nbsp;</th></tr>
					<?php if(is_array($credits)){foreach($credits AS $index=>$one) { 
					
					if(ZCredit::Explain($one) == "login no site"){
						continue;	
					}
					
					?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?></td>
						<td><?php echo $users[$one['user_id']]['email']; ?><br/><?php echo $users[$one['user_id']]['username']; ?><?php if(Utility::IsMobile($users[$one['user_id']]['mobile'])){?>&nbsp;&raquo;&nbsp;<a href="/ajax/misc.php?action=sms&v=<?php echo $users[$one['user_id']]['mobile']; ?>" class="ajaxlink">SMS</a><?php }?></td>
						<td><?php echo $users[$one['user_id']]['realname']?$users[$one['user_id']]['realname']:'----';; ?><br/><?php if($users[$one['user_id']]['city_id']){?><?php echo $allcities[$users[$one['user_id']]['city_id']]['name']; ?><?php } else { ?><?php }?></td>
						<td><span class="currency"></span><?php echo moneyit($one['score']); ?></td>
						<td colspan="2"><?php echo ZCredit::Explain($one); ?></td>
					  </tr>
					<?php }}?>
					<tr><td colspan="8"><?php echo $pagestring; ?></tr>
                    </table>
</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->



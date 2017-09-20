<?php include template("manage_header");?>
<?php  
$systeminvitecredit = $INI['system']['invitecredit'] ;
?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
				<div class="option_box">
						<div class="top-heading group"> <div class="left_float"><h4>
							  
							<div class="head">
							<?php if('index'==$s){?>
							   Comissões Pendentes (total: <span class="currency"><?php echo $currency; ?></span><?php echo $summary; ?>) 
							<?php } else if('record'==$s) { ?>
								Comissões Aprovadas (total: <span class="currency"><?php echo $currency; ?></span><?php echo $summary; ?>) 
							<?php } else if('naocomprado'==$s) { ?>
								Convidados que ainda nao compraram 
							<?php } else { ?>
								Comissões Canceladas 
							<?php }?> 
						
							</h4></div>
							 
					</div>
					<div class="sect" style="padding:0 10px;">
						<form method="get">
							<input type="hidden" name="s" value="<?php echo $s; ?>" />
							<p style="margin:5px 0;">usuário:<input type="text" name="iuser" value="<?php echo htmlspecialchars($iuser); ?>" class="h-input" />&nbsp;usuário convidado: <input type="text" name="puser" value="<?php echo htmlspecialchars($puser); ?>" class="h-input" />&nbsp;data:<input type="text" class="h-input" onFocus="WdatePicker({isShowClear:false,readOnly:true})" name="iday" value="<?php echo $iday; ?>" />&nbsp;Data da compra:<input type="text" class="h-input" onFocus="WdatePicker({isShowClear:false,readOnly:true})" name="pday" value="<?php echo $pday; ?>" />&nbsp;<input type="submit" value="selecionar" class="formbutton"  style="padding:1px 6px;"/></p>
						<form>
					</div>
					<div class="sect">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<tr><th width="350">Oferta</th><th width="150">usuário</th><th width="150">usuario convidado</th><th width="140">Data da compra</th><?php if('index'==$s){?><th width="150">operação</th><?php } else { ?><th width="150">operador</th><?php }?></tr>
						<?php if(is_array($invites)){foreach($invites AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?> id="order-list-id-<?php echo $one['id']; ?>">
							<td><a class="deal-title" href="/team.php?id=<?php echo $one['team_id']; ?>" target="_blank"><?php echo $teams[$one['team_id']]['title']; ?></a></td>
							<td nowrap><a class="ajaxlink" href="/ajax/manage.php?action=userview&id=<?php echo $one['user_id']; ?>"><?php echo $users[$one['user_id']]['email']; ?></a><br/><?php echo $users[$one['user_id']]['username']; ?><br/><?php echo $one['user_ip']; ?><?php if(Utility::IsMobile($users[$one['user_id']]['mobile'])){?><br/><a href="/ajax/misc.php?action=sms&v=<?php echo $users[$one['user_id']]['mobile']; ?>" class="ajaxlink"><?php echo $users[$one['user_id']]['mobile']; ?></a><?php }?></td>
							<td nowrap><a class="ajaxlink" href="/ajax/manage.php?action=userview&id=<?php echo $one['other_user_id']; ?>"><?php echo $users[$one['other_user_id']]['email']; ?></a><br/><?php echo $users[$one['other_user_id']]['username']; ?><br/><?php echo $one['other_user_ip']; ?><?php if(Utility::IsMobile($users[$one['user_id']]['mobile'])){?><br/><a href="/ajax/misc.php?action=sms&v=<?php echo $users[$one['other_user_id']]['mobile']; ?>" class="ajaxlink"><?php echo $users[$one['other_user_id']]['mobile']; ?></a><?php }?></td>
							<td nowrap><?php echo date('d-m-Y H:i', $one['create_time']); ?><br/><?php echo date('d-m-Y H:i', $one['buy_time']); ?><br/>comissão:<?php echo number_format($systeminvitecredit,2,',',''); ?>  </td>
							<td class="op" nowrap><?php if('index'==$s){?><a href="/ajax/manage.php?action=inviteok&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Confirma o pagamento da comissão?">Confirmado</a> | <a href="/ajax/manage.php?action=inviteremove&id=<?php echo $one['id']; ?>" ask="Tem certeza que deseja cancelar sua comissão?" class="ajaxlink">Cancelar</a><?php } else { ?><?php echo $users[$one['admin_id']]['email']; ?><br/><?php echo $users[$one['admin_id']]['username']; ?><?php }?></td>
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
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->



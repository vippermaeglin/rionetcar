<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_coupon('consume'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>Cupons Consumidos </h2>
					<ul class="filter">
					 <li>
						<form method="get">  
						<br>
						<p>Número do cupom: &nbsp;<input type="text" class="h-input" name="coupon" value="<?php echo htmlspecialchars($coupon); ?>" ></p>
						 
						<p style="margin:5px 0;">N. da Oferta: &nbsp;
						<?
						$others_now = time();
						$sql = "select * from team order by title";
						$rs = mysql_query($sql);
						?>
						<select   name="tid"  id="tid" style="width: 710px; margin-left: 6px;color:#303030;font-size:11px;height:23px;padding:4px;" >
						<option value=""></option>
						<?  
						while($row = mysql_fetch_object($rs)){?>
							<option value="<?=$row->id?>" <? if( $tid ==$row->id ) { echo " selected ";} ?> ><?=$row->id?> - <span class="inputtip"> <?=$row->title?></span></option>
						<?} ?>
		
						</select> </p>
							<p style="margin:5px 0;">Usuário: &nbsp;
						<?
						//$others_now = time();
						//$sql = "select * from user order by realname ";
						//$rs = mysql_query($sql);
						?>
						<input type="text"  name="uname"  id="uname" style="width: 710px; margin-left: 6px;color:#303030;font-size:11px;" />
					    </p>
						<p><input type="submit" value="selecionar" class="formbutton"  style="padding:1px 6px;"/></p>
						
						<form></li>
					 
					 </ul>
				</div>
                <div class="sect"  style="padding:108px 36px 50px;">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="100"> N. </th><th width="500"> Oferta </th><th width="180"> usuário </th><th width="80" nowrap> data de consumo </th></tr>
					<?php if(is_array($coupons)){foreach($coupons AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="order-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?></td>
						<td><?php echo $one['team_id']; ?>&nbsp;(<a class="deal-title" href="/index.php/idoferta=<?php echo $one['team_id']; ?>" target="_blank"><?php echo $teams[$one['team_id']]['title']; ?></a>)</td>
						<td nowrap><?php echo $users[$one['user_id']]['email']; ?><br/><?php echo $users[$one['user_id']]['username']; ?></td>
						<td nowrap><?php echo date('d-m-Y',$one['consume_time']); ?><br/><?php echo date('H:i:s',$one['consume_time']); ?></td>
					</tr>
					<?php }}?>
					<tr><td colspan="5"><?php echo $pagestring; ?></tr>
                    </table>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->



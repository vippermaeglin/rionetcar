<?php include template("biz_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-content">
				<div class="option_box">
						<div class="top-heading group"> <div class="left_float"><h4>Cupons Gerados</h4></div> 
							<div style="padding: 10px;">
									<ul id="log_tools"> <li id="log_switch_referral"><a title="Altere sua senha, nome, dados bancários" href="/lojista/settings.php">Configurações</a></li> </ul> 
									<ul id="log_tools"> <li id="log_switch_referral"><a title="Lista de cupons gerados com a venda das ofertas" href="/lojista/coupon.php">Cupons Gerados</a></li> </ul>
									<ul id="log_tools"> <li id="log_switch_referral"><a title="Lista de ofertas" href="/lojista/index.php">Lista de Ofertas</a></li> </ul>
							</div>	 
						</div> 
						 
              	<div class="paginacaotop"><?php echo $pagestring; ?></div>	
					 
					<div class="sect" style="clear:both;">
					
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<tr><th width="100" nowrap>No.</th><th width="450">Oferta</th><th width="160">Comprador</th><th width="60" nowrap>Codigo</th><th width="100" nowrap>Validade</th><th width="160">Status</th></tr>
					<?php if(is_array($coupons)){foreach($coupons AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>>
							<td><?php echo $one['id']; ?></td>
							<td><?php echo $one['team_id']; ?>&nbsp;(<a class="deal-title" href="/index.php?idoferta=<?php echo $one['team_id']; ?>" target="_blank"><?php echo $teams[$one['team_id']]['title']; ?></a>)</td>
							<td nowrap><?php echo $users[$one['user_id']]['email']; ?><br/><?php echo $users[$one['user_id']]['username']; ?></td>
							<td><?php if(abs(intval($INI['system']['partnerdown']))){?><?php echo $one['secret']; ?><?php } else { ?>******<?php }?></td>
							<td nowrap><?php echo date('d-m-Y', $one['expire_time']); ?></td>
							<td nowrap><?php if($one['consume']=='Y'){?>usado<br/> <?php echo date('d/m/Y H:i',$one['consume_time']); ?> <?php } else if($one['expire_time']<time()) { ?>expirado<?php } else { ?>válido<?php }?></td>
						</tr>
					<?php }}?>
						<tr><td colspan="6"><?php echo $pagestring; ?></td></tr>
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
 

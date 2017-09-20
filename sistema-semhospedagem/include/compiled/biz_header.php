<?php include template("biz_html_header");?>

<link rel="stylesheet" type="text/css" href="<?=$ROOTPATH?>/js/colorbox/colorbox.css"/> 
<script type="text/javascript" src="<?=$ROOTPATH?>/js/colorbox/jquery.colorbox-min.js"></script> 
 
	<link rel="stylesheet" href="/media/css/mail.css" type="text/css" media="screen" charset="utf-8" /> 
	<link rel="stylesheet" href="/media/css/wrapped-select.css" type="text/css" media="screen" charset="utf-8" /> 
	<link rel="stylesheet" href="/media/css/timeSelector-whm.css" type="text/css" media="screen" charset="utf-8" /> 

<div id="hdw" style="color:#FFF;background:url('<?=$ROOTPATH?>/media/js/menu/images/8.jpg') repeat-x scroll 0 0 transparent";>
	<div id="hd"> 
			<? if(file_exists(WWW_ROOT."/include/logo/logo.png")){?>
				 <div id="logo"><a href="/index.php" class="link" target="_blank"><img  src="/include/logo/logo.png" style="max-width: 330px; max-height: 109px;" /></a></div> 
			<? } 
			else{?>
				 <div id="logo"><a href="/index.php" class="link" target="_blank"><img  src="/include/logo/logo.jpg" style="max-width: 330px; max-height: 109px;" /></a></div> 
			<? } ?>
	 
		<?php if(is_partner()){?> 
		
		<div class="logins" style="top:75px;width:536px;">
			<ul class="links">
				<li class="username">Seja bem vindo(a), <?php echo $login_partner['title']; ?>!</li>
				<li class="username"><?php if(is_partner()){?>	<a id="verify-coupon-id" href="javascript:;">Verificar <?php echo $INI['system']['couponname']; ?></a> <?php }?></li>
				<li class="logout"><a href="/lojista/logout.php">Sair</a></li>
			</ul> 
		</div>
		<?php }?>
	</div>
</div>

<?php if($session_notice=Session::Get('notice',true)){?>
<div class="sysmsgw" id="sysmsg-success"><div class="sysmsg"><p><?php echo $session_notice; ?></p><span class="close">Fechar</span></div></div>
<?php }?>
<?php if($session_notice=Session::Get('error',true)){?>
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg"><p><?php echo $session_notice; ?></p><span class="close">Fechar</span></div></div>
<?php }?>

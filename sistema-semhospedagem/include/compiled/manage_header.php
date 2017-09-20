<?php include template("manage_html_header");?>

<script type="text/javascript" src="/media/js/jquery-1.4.2.min.js"></script> 
 
<link rel="stylesheet" type="text/css" href="<?=$ROOTPATH?>/js/colorbox/colorbox.css"/> 
<script type="text/javascript" src="<?=$ROOTPATH?>/js/colorbox/jquery.colorbox-min.js"></script> 
<link rel="stylesheet" type="text/css" href="<?=$ROOTPATH?>/js/color/farbtastic.css"/> 
<script type="text/javascript" src="<?=$ROOTPATH?>/js/farbtastic.js"></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/jbase.js"></script>
<link rel="stylesheet" href="/media/calendar/dhtmlgoodies/dhtmlgoodies_calendar.css" type="text/css" media="screen" charset="utf-8" /> 
<script src="/media/calendar/dhtmlgoodies/dhtmlgoodies_calendar.js" type="text/javascript"></script> 
<link rel="stylesheet" type="text/css" href="/media/tip/theme/style.css" />
<link rel="stylesheet" type="text/css" href="/media/css/menu.css" />
<script src="/media/tip/js/jquery.betterTooltip.js" type="text/javascript"></script> 
<script type="text/javascript" src="/js/mascara.js"></script> 
<script type="text/javascript" src="/media/js/main.js"></script> 
<script type="text/javascript" src="/media/js/jquery.price_format.1.7.min.js"></script> 
 
<script type="text/javascript">

	$(document).ready(function(){
		$('.tTip').betterTooltip({speed: 100, delay: 30});
	});

</script> 
 
<div id="hdw" style="color:#FFF;background:url('<?=$ROOTPATH?>/media/js/menu/images/8.jpg') repeat-x scroll 0 0 transparent";>
	<div id="hd">
	
	
	 <div id="logo" style="height: 92px;"><a href="/vipmin/index.php" class="link" ><img  src="/media/css/i/logovi.png" style="max-width: 330px; max-height:61px;" /></a></div> 
	 
	<!-- 
	<? if(file_exists(WWW_ROOT."/include/logo/logo.png")){?>
		 <div id="logo"><a href="/index.php" class="link" target="_blank"><img  src="/include/logo/logo.png" style="max-width: 330px; height:89px;" /></a></div> 
	<? } 
	else{?>
		 <div id="logo"><a href="/index.php" class="link" target="_blank"><img  src="/include/logo/logo.jpg" style="max-width: 330px;height:89px;" /></a></div> 
	<? } ?>
	
	-->
 
 
		<div class="guides" style="top:3px;width:300px;" > 
			 <div style="font-size:11px;color:#303030;"><?php if($login_user){ echo "Usuário Logado: ". $login_user['realname']; } ?></div>
		</div>
		<?php if($login_user){require_once("menu.php");}?> 
		<?php if(is_manager()){?><div class="vcoupon">&raquo;&nbsp;<a href="/autenticacao/logout.php"><span style="color:#303030;">Sair</span></a></div><?php }?>
	</div>
</div>

<?php if($session_notice=Session::Get('notice',true)){?>
	<script>
		jQuery(document).ready(function(){   
			jQuery.colorbox({html:"<div class='msgsoft'>  <div style='float:left;margin-right:10px;'> <img src='<?=$ROOTPATH?>/media/css/i/Accept-icon.png'></div> <?php echo $session_notice; ?></div>"});
		});
	</script>
<?php }?>
<?php if($session_notice=Session::Get('error',true)){?>
	<script>
		jQuery(document).ready(function(){   
			jQuery.colorbox({html:"<div class='msgsoft'> <div style='float:left;margin-right:10px;'> <img src='<?=$ROOTPATH?>/media/css/i/falha.png'></div> <?php echo $session_notice; ?></div>"});
		});
	</script>
<?php }?>
<?php
	
?>
 
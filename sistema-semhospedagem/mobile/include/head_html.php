<head>
	<?php if($BlocosOfertas->tituloferta){?>
	<title><?php echo utf8_decode( $INI['system']['sitename']); ?> - <?php echo  $BlocosOfertas->tituloferta ; ?>   </title>
	<?php }
	else if($team['seo_title']){?>
	<title><?php echo utf8_decode(  $team['seo_title'] )?> </title>
	<?}
	else { ?>
	<title><?php echo utf8_decode(   $INI['system']['sitename']. "  ".$pagetitle ); ?> </title>
	<?php }?>

	<?php if(strip_tags($team['seo_description'])) { ?>
	<meta name="description" content="<?php echo mb_strimwidth(strip_tags(utf8_decode(strip_tags($team['seo_description'])) ), 0, 320); ?>" />
	<?php } else if(strip_tags($INI['system']['seodescricao'])) { ?>
	<meta name="description" content="<?php echo utf8_decode( strip_tags($INI['system']['seodescricao'])); ?> " />
	<?php }  else { ?>
	<meta name="description" content="<?php echo utf8_decode( $INI['system']['sitename']); ?>, <?php echo utf8_decode($INI['system']['sitetitle']); ?> " />
	<?php }?> 
	<?php if($team['seo_keyword']){?>
	<meta name="keywords" content="<?php echo utf8_decode($team['seo_keyword']); ?>" />
	<?php } 
	else if($INI['system']['seochaves']){?>
	<meta name="keywords" content="<?php echo utf8_decode($INI['system']['seochaves']); ?> " />
	<?php } 
	else { ?>
	<meta name="keywords" content="<?php echo utf8_decode($INI['system']['sitename']); ?> " />
	<?php } ?>

	<link rel="icon"  type="image/x-icon" href="<?=$PATHSKIN?>/images/favicon.ico">

	<script type="text/javascript">
		var WEB_ROOT 	= "<?php echo WEB_ROOT; ?>";
		var URLWEB	 	= "<?php echo $ROOTPATH?>";
		var CITY_ID	 	= "<?php echo $city['id']?>";
		var ID_PARCEIRO = "<?php echo $_REQUEST['idparceiro']?>";
	</script>

	<script type="text/javascript">var LOGINUID= <?php echo abs(intval($login_user_id)); ?>;</script>

	<?php echo Session::Get('script', true); ?>

	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- CSS  -->
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/layout.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/style.css" type="text/css" media="all"> 
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/css.css" type="text/css" media="all">
	 
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/css_enterprise.css" type="text/css" media="all"> 
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/premium.css" type="text/css" media="all"> 
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/classic.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/buttons.css" type="text/css" media="all"> 
	<link rel="stylesheet" href="<?=$ROOTPATH?>/js/FixedNavigation/css/style.css" type="text/css"  />
	<link rel="stylesheet" href="<?=$ROOTPATH?>/js/form_css3/formcss3.css" type="text/css"  />   


	<link rel="stylesheet" href="<?=$ROOTPATH?>/js/colorbox/colorbox.css" type="text/css"  /> 

	<link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>

	<!-- JS -->
	<script type="text/javascript" src="<?=$ROOTPATH?>/js/jquery-1.7.1.min.js" ></script>
	<script type="text/javascript" src="<?=$ROOTPATH?>/js/mascara.js" ></script>
	<script type="text/javascript" src="<?=$ROOTPATH?>/js/funcoes.js"></script> 
	<script type="text/javascript" src="<?=$ROOTPATH?>/js/search_home.js"></script> 
	<script type="text/javascript" src="<?=$ROOTPATH?>/js/colorbox/jquery.colorbox-min.js"></script>

	<!-- Responsivo -->
	<script type="text/javascript" src="<? echo $ROOTPATH?>/js/responsiveslides/responsiveslides.min.js"></script> 
	<script type="text/javascript" src="<? echo $ROOTPATH?>/js/responsiveslides/demo.css"></script> 
	<script type="text/javascript" src="<?=$ROOTPATH?>/js/mobileJS.js"></script> 
	<link href="<?php echo $PATHSKIN; ?>/css/responsive.css" rel="stylesheet" type="text/css"> 
	<!-- Responsivo -->

	<meta http-equiv="cache-control" content="public" /> <!-- reconhecida pelo HTTP 1.1 -->
	<meta http-equiv="Pragma" content="public"> <!-- reconhecida por todas as versões do HTTP -->

	<meta content="document" name="resource-type"> 
	<meta content="ALL" name="robots">
	<meta content="Global" name="distribution">
	<meta content="General" name="rating">  
</head>
<?php  
require_once(dirname(dirname(__FILE__)) . '/app.php');
?>
  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<link rel="stylesheet" href="<?=$ROOTPATH?>/media/js/colorpicker/css/colorpicker.css" type="text/css" />
    <link rel="stylesheet" media="screen" type="text/css" href="<?=$ROOTPATH?>/media/js/colorpicker/css/layout.css" />
	<link rel="shortcut icon" href="<?=$ROOTPATH?>/media/icon/favicon.ico" />
    <title>Gerenciar cores e layout</title>
	<script type="text/javascript" src="<?=$ROOTPATH?>/media/js/colorpicker/js/jquery.js"></script>
	<script type="text/javascript" src="<?=$ROOTPATH?>/media/js/colorpicker/js/colorpicker.js"></script>
    <script type="text/javascript" src="<?=$ROOTPATH?>/media/js/colorpicker/js/eye.js"></script>
    <script type="text/javascript" src="<?=$ROOTPATH?>/media/js/colorpicker/js/utils.js"></script>
    <script type="text/javascript" src="<?=$ROOTPATH?>/media/js/colorpicker/js/layout.js?ver=1.0.2"></script>
</head>
<body>
  <body>
    <div class="wrapper">
        <h1>Color Picker - jQuery plugin</h1>
        
		<p>Attached to DOMElement and using callbacks to live preview the color and adding animation.</p>
		<p>
			<div id="colorSelector"><div style="background-color: #0000ff"></div></div>
		</p>
 
  </div>
 
</body>

<script>

jQuery('#css_menu_top').val(jQuery('#element_2').contents().find('ul#navigation li a').css('background-color','blue'));
	
//clikando os definidores de cor da palheta
jQuery('#set_blue').unbind('click');
jQuery('#set_blue').click(function(){
	jQuery('#element_2').contents().find('ul#navigation li a').css('background-color','blue');
	//jQuery('#element_2').contents().find('.css_menu_top').css('background-color','blue');
	jQuery('#css_menu_top').val('blue');
});

jQuery('#set_grea').unbind('click');
jQuery('#set_grea').click(function(){
	jQuery('#element_2').contents().find('ul#navigation li a').css('background-color','rgb(176, 213, 15)');
	jQuery('#css_menu_top').val('rgb(176, 213, 15)');
});


//Define o dimencionamento dos elementos
jQuery(window).unbind('resize');
jQuery(window).resize(function(){

	jQuery('#top_up').css({
	'position':'fixed'
	});

	jQuery('#element_2').css({
	 'left':'100px',
	 'top':'10px',
	 'height':(jQuery(window).height()-120)+'px',
	 'width':(jQuery(window).width()-350)+'px'
	});

	jQuery('#prop_css').css({
	  'position':'fixed',
	  'background-color':'5px solid black',
	  'top':'50px',
	  'left':'50px',
	  'width':'200px',
	  'overflow':'scroll',
	  'height':(jQuery(window).height()-120)+'px',
	});

})	
	
</script>	

    <div class="wrapper">
        <h3>Personalize suas cores, escolha o elemento e troque a cor na palheta</h3>
         <p>
			<div id="colorSelector"><div style="background-color: #0000ff"></div></div>
		</p>
  </div>
  

<div id="prop_css">
   <form>
		<input type="hidden" id="css_menu_top" name="css_menu_top" value=""/>
		<div id="set_blue" style="cursor: pointer;">AZUL</div></br>
		<div id="set_grea" style="cursor: pointer;">VERDE</div></br>
		
		<input type="button" name="Salvar" />
   </form>
</div>
<div style="height:600px;">
<iframe frameborder="0" height="100%" width="100%" scrolling="no" src="<?=$ROOTPATH?>" id="layout"></iframe>
</div> 
 
</html>
 <script>

$('#colorSelector').ColorPicker({
	color: '#0000ff',
	onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
	
	},
	onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
 
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		$('#colorSelector div').css('backgroundColor', '#' + hex);
 
	}
});

</script>          
<div style="display:none;" class="tips"><?=__FILE__?></div>
	
<?php 

	$dominio = $_SERVER['HTTP_HOST'];
	$url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
 
 if(file_exists(WWW_MOD."/comentariosface.inc")){
 
	if($INI['other']['admin_id'] != "" and $INI['other']['app_id'] != ""  ) { ?>
		<html xmlns:fb="http://www.facebook.com/2008/fbml"
		xmlns:og="http://opengraphprotocol.org/schema/">
		<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">  
		<meta property="fb:admins" content="<?=$INI['other']['admin_id']?>" />
		<meta property="fb:app_id" content="<?=$INI['other']['app_id']?>" />
		</head>
		<body>
		<div class="col-1 bordasmoldura">
			<div class="indent" style="padding:12px;">
				<div class="container1"> 
					 <div id="fb-root"></div> 
						<div class="fb-comments" data-href="<?=$url?>" data-num-posts="20" data-width="620"></div>
						<script>
						  window.fbAsyncInit = function() {
							FB.init({appId: '<?=$INI['other']['app_id']?>', status: true, cookie: true,
									 xfbml: true});
						  };
						  (function() {
							var e = document.createElement('script'); e.async = true;
							e.src = document.location.protocol +
							  '//connect.facebook.net/pt_BR/all.js';
							document.getElementById('fb-root').appendChild(e);
						  }());
						</script>
				</div>
			</div>
	   </div>
	  </body>
	 </html>
	<? } ?> 

<? } ?> 
 

<?php if($INI['other']['usuario_twitter'] != "" and $INI['other']['id_twitter'] !="" ) { ?> 
		
	<div class="blocotwitter" style="margin-left: 2px;">
 
 	<a class="twitter-timeline" href="https://twitter.com/<?=$INI['other']['usuario_twitter']?>" data-widget-id="<?=$INI['other']['id_twitter']?>">Tweets de @<?=$INI['other']['usuario_twitter']?></a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
 
	</div>
	
	<br class="clear" />
	 

 <?php } ?>
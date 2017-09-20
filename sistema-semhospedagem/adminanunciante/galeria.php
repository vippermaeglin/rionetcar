 
<div class="col-1 bordasmoldura">
	<div class="indent" style="padding:12px;">
		<div class="container1"> 
			<div id="page">
				<div id="container">  
					<div style="display:none;" id="gallery" class="content">
						<div id="controls" class="controls"></div>
							<div class="slideshow-container">
								<div id="loading" class="loader"></div>
								<div id="slideshow" class="slideshow"></div> 
							</div>
						</div> 
						<div id="thumbs" class="navigation">
							<ul class="thumbs noscript">
							<?php
							$dir =  WWW_ROOT."/media/superbackground";
							$dh =  opendir($dir);
							
							if($dh){
								while ($file = readdir($dh)){
								
								if($file =="." or $file == ".." or $file =="thumbs"){
									continue;
								}
								$itens[] = $file ;  
							
								} 
								
								sort($itens);
			
								foreach ($itens as $file) {
								    
								?> 
								<div style="float:left;padding:0 5px 0 0;">
									   <a href="javascript:;" onclick="delgaleriaimg('<?php echo trim($file); ?>');"><img  style="height: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> <img src="<?=$ROOTPATH?>/media/superbackground/thumbs/<?=$file?>" /></a>
								</div>
								<? }
								
							}?>
							</ul>
						</div> 
						<div style="clear: both;"></div>
					</div>
				</div>  
			</div>  
		</div>  
	</div>  
 
<script>
  
function delgaleriaimg(arq){
 
jQuery.get("<?=$INI['system']['wwwprefix']?>/adminanunciante/delgal.php?arq="+arq+"&acao=galeria",
 			
   function(data){
      if(jQuery.trim(data)==""){ 
	     location.href = '<?=$INI['system']['wwwprefix']?>/adminanunciante/system/slide.php' ;
	  }  
	  else{
		  alert(data)
	  }
   });
}

</script>
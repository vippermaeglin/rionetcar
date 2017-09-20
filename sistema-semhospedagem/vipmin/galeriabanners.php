 
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
							if(file_exists(WWW_MOD."/enterprise.inc")){
								$nomedir =  "slideshowbannersheader";
							}
							else{
								$nomedir =  "slideshowbanners";
							}
							$dir =  WWW_ROOT."/media/$nomedir";
							$dh =  opendir($dir);
							
							if($dh){
								while ($file = readdir($dh)){
								
								if($file =="." or $file == ".." or $file =="thumbs"){
									continue;
								}
								$itens[] = $file ;  
							
								} 
								
								sort($itens);

								$x=0;
								foreach ($itens as $file) {

								
								 $sql = "select link from linkbanners where file='$file'";
								$rs = mysql_query($sql);
								$row = mysql_fetch_object($rs);
								
								 $x++;
								?> 
								<div style="float:left;padding:0 5px 0 0;">
									   <a href="javascript:;" onclick="delgaleriaimg('<?php echo trim($file); ?>');"><img  style="height: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> <img src="<?=$ROOTPATH?>/media/<?=$nomedir ?>/thumbs/<?=$file?>" /></a>
									<br>Url para o link: (com http://www)<input type="text" value="<?=$row->link?>" name="<?=$file?>" id="<?=$file?>" >
									<input type="hidden" value="<?=$file?>" name="nomefile_<?=$x?>"  > 
								</div>
								<? }
								
							}?>
							<input type="hidden" value="<?=$x?>" name="totalbanners"  >
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
 
jQuery.get("<?=$INI['system']['wwwprefix']?>/vipmin/delslidebanners.php?arq="+arq,
 			
   function(data){
      if(jQuery.trim(data)==""){ 
	     location.href = '<?=$INI['system']['wwwprefix']?>/vipmin/system/banners.php' ;
	  }  
	  else{
		  alert(data)
	  }
   });
}

</script>
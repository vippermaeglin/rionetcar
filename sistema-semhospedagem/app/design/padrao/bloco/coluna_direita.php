<div class="col-2" style="<?=$styledireita?>">
  <div style="display:none;height:35px;" class="tips"><?=__FILE__?></div>
    <div class="boxanuncios">
        <div class="indent-box" > 
		
		<?  if(file_exists(WWW_MOD."/anunciante.inc")){?>
		      <div class="dvanunciarbg">
				  <a  class="dvcorpoanun2" href="<?php echo $ROOTPATH; ?>/index.php?page=queroanunciar"> <?php echo $INI['bulletin'][0]; ?> </a> 
			 </div>   
		<? } ?>   
		    <? if(isset($_REQUEST[busca])){
		
				 require_once(DIR_BLOCO."/bloco_revendas.php");   
				 require_once(DIR_BLOCO."/bloco_facebook.php");  
				 //require_once(DIR_BLOCO."/bloco_twitter.php");    
				 //require_once(DIR_BLOCO."/bloco_avisos_banner.php");
				 
				}			
			  ?>
			 
		</div>     
</div>
 <script> 
	J(".outras").corner("round 2px");
	J(".tit_oferta_nacional").corner("round 2px");
</script>	
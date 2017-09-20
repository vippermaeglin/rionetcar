<div style="display:none;" class="tips"><?=__FILE__?></div> 
	<div class="col-1 bordasmoldura" style="background:url('<?=$PATHSKIN?>/images/bg_leia_atencao.png');" >
		<div class="indent" style="padding:12px;">
			<div class="container1"> 
			   <div class="textotitulo">Descrição</div><br>
				<div class="descricaooferta">
				<?php  
					echo strip_tags(nl2br(utf8_decode($team['summary'])),"<a><img><br><b><strong><style><font><iframe><object>"); 
				 ?> 
				</div>
			 </div>
		</div>
   </div>
  <script>
 J("#carregando_tabs").hide();
 </script>
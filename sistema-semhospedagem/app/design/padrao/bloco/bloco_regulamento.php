<div style="display:none;" class="tips"><?=__FILE__?></div>
<?
	include "../../../../app.php";
	$team = Table::Fetch('team', $_REQUEST['idoferta']);
	
	$descricao = str_replace("<p>","",$team['notice']);
	$descricao = str_replace("</p>","<br>",	$descricao );
?>
 
 <div style="display:none;" class="tips"><?=__FILE__?></div> 
	<div class="col-1 bordasmoldura" style="background:url('<?=$PATHSKIN?>/images/bg_leia_atencao.png');" >
		<div class="indent" style="padding:12px;">
			<div class="container1">  
				<div class="textotitulo">Regulamento</div><br>
				<div class="descricaooferta">
				<?php  
					echo strip_tags(nl2br(utf8_decode($team['notice'])),"<a><img><br><b><strong><style><font><iframe><object>"); 
				 ?> 
				</div>
			 </div>
		</div>
   </div>
  <script>
 J("#carregando_tabs").hide();
 </script>
 
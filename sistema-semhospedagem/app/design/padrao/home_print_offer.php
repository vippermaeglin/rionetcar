<?php  
	require_once("include/head.php"); 
?>
<body id="page">
<div class="tail-top"> 
	<div style="display:none;" class="tips"><?=__FILE__?></div>
	<?php  require_once(DIR_BLOCO."/bloco_background.php"); ?>	
	<div class="main">
		<section id="content"> 
			<?php  
				
				if(!(empty($idprint))){
					$team = Table::Fetch('team', $idprint);
					require_once(DIR_BLOCO."/print_offer.php"); 
				}
			?>
			<!-- FIM BUSCA DO ARTIGO -->			 
			 <div class="container">  </div>
		</section>
	</div>
</div> 
</body>
</html>

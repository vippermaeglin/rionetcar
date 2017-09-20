<?php  
require_once("include/head.php"); 
?>
<body id="page1">
 
<div class="tail-top"> 
<div style="display:none;" class="tips"><?=__FILE__?></div> 
 
	<div class="main">
		 <?php  require_once(DIR_BLOCO."/header.php"); ?>
		 <?    
		 require_once(DIR_BLOCO."/bloco_background.php");  
		 ?>    
		<section id="content">
		 
			<!-- BUSCA AS OFERTAS POPULARES E OUTRAS OFERTAS -->
			<? $BlocosOfertas->getBlocoPrincipal($idoferta); ?> 
			<!-- FIM BUSCA AS OFERTAS POPULARES E OUTRAS OFERTAS-->
			 
			 <div class="container">  </div>

		</section>
	</div>
</div> 
 

<?php
	require_once(DIR_BLOCO."/rodape.php");
?>
</body>
</html>

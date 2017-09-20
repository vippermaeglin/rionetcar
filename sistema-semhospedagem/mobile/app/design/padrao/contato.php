<?php  
	require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . "/include/code/contato.php");
	require_once("include/head.php"); 
?>
<div style="display:none;" class="tips"><?=__FILE__?></div> 
	<body id="page1" class="webstore home">	
		<!-- Responsivo -->
		<div class="containerM">
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/header.php"); ?>	
			</div>			
			<div class="row">
				<div class="titlePage">
					<p>Fale conosco</p>
				</div>
			</div>
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/contatoM.php"); ?>
			</div>
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/rodapeM.php"); ?>				
			</div>			
		</div>
	</body>
</html>

<?php  
	require_once("include/head.php"); 
	
?>
<div style="display:none;" class="tips"><?=__FILE__?></div> 
	<body id="page1" class="webstore home">	
		<!-- Responsivo -->
		<div class="containerM">
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/header.php"); ?>
				<div class="titlePage">
					<p>Busque seu veículo</p>
				</div>		
				<?php require_once(DIR_BLOCO_M . "/bloco_filtroM.php"); ?>
			</div>	
			<div class="row">
				<div class="titlePage">
					<p>Categoria</p>
				</div>		
				<?php require_once(DIR_BLOCO_M . "/bloco_noticiasCategoriaM.php"); ?>				
			</div>	
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/rodapeM.php"); ?>				
			</div>			
		</div>
	</body>
</html>

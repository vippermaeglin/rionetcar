<?php  

	$page = Table::Fetch('page', $idpagina);
	$pagetitle = $page['titulo']; 
	$idcategoria = $page['category_id'];

	if(!$idpagina){
		$pagetitle = "Página não encontrada";
		$page['value'] = "Nenhuma página associada";
	}
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
					<p><?php echo utf8_decode($pagetitle); ?></p>
				</div>
			</div>
			<div class="row">
				<div class="contentPage">
					<p>
						<?php echo strip_tags($page['value']); ?>
					</p>
				</div>
			</div>
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/rodapeM.php"); ?>				
			</div>			
		</div>
	</body>
</html>

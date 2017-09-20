<?php  
	require_once("include/head.php"); 
	
	if(isset($_GET["busca"])){
		
		/* Caso a busca seja verdadeira, então é exibido os anuncios de acordo com
		   os filtros, senão é exibidos os artigos cadastrados no site. 
		*/
		$busca = trim(strip_tags($_GET["busca"]));
		
		if($busca == "true"){
			$flagSearch = true;
		}else{
			$flagSearch = false;		
		}
	}
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
			<?php if(!($flagSearch)) { ?>			
			<div class="row">
				<div class="titlePage">
					<p>Anúncios destaques</p>
				</div>		
				<?php require_once(DIR_BLOCO_M . "/bloco_vitrineM.php"); ?>
			</div>
			<div class="row">
				<div class="titlePage">
					<p>Últimas notícias</p>
				</div>		
				<?php require_once(DIR_BLOCO_M . "/bloco_noticiasM.php"); ?>				
			</div>	
			<?php } else { ?>
			<div class="row">
				<div class="titlePage">
					<p>Resultados da busca</p>
				</div>		
				<?php require_once(DIR_BLOCO_M . "/buscaM.php"); ?>				
			</div>	
			<?php } ?>
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/rodapeM.php"); ?>				
			</div>			
		</div>
	</body>
</html>

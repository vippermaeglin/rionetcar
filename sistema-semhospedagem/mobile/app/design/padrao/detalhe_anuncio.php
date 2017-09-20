<div style="display:none;" class="tips"><?=__FILE__?></div>
<?php  
	require_once("include/head.php"); 
?>
	<body id="page">
		<script>
			function envia_url_comprar(){ 
				location.href  = '<?php echo  $team['url_comprar'] ?>'; 
			}
		</script>
		<!-- Responsivo -->
		<div class="containerM">
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/header.php"); ?>
				<div class="titlePage">
					<p>Detalhes do anúncio</p>
				</div>		
				<?php  
					$partner = Table::Fetch('user', $team['partner_id']);
					require_once(DIR_BLOCO_M . "/detalhe_anuncioM.php");
				?>
			</div>				
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/header.php"); ?>
				<div class="titlePage">
					<p>Enviar proposta</p>
				</div>		
				<?php  
					require_once(DIR_BLOCO_M . "/enviar_propostaM.php");
				?>
			</div>				
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/rodapeM.php"); ?>				
			</div>			
		</div>
	</body>
</html>
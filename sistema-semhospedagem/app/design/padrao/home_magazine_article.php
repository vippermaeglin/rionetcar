<?php  
	require_once("include/head.php"); 
?>
<body id="page">
<div class="tail-top"> 
<div style="display:none;" class="tips"><?=__FILE__?></div>
 <!--  imagem do fundo - Fixa - não rola junto com a barra de rolagem  -->
 <?php  require_once(DIR_BLOCO."/bloco_background.php"); ?>
	
	<div class="main">
		<?php  require_once(DIR_BLOCO."/header.php"); ?>
		<section id="content"> 
			<!-- <?php  require_once(DIR_BLOCO."/bannertopo.php"); ?>-->
			  
			<!-- BUSCA O ARTIGO -->
			<?php  
				
				if(!(empty($idartigo))){
					$article = Table::Fetch('magazine_article', $idartigo);
					$category = Table::Fetch('magazine_category', $article['id_category']);
					require_once(DIR_BLOCO."/detalhe_artigo.php"); 
				}
			?>
			<!-- FIM BUSCA DO ARTIGO -->
			 
			 <div class="container">  </div>

		</section>
	</div>
</div> 
 
<script>
function envia_url_comprar(){ 
	location.href  = '<?php echo  $team['url_comprar'] ?>'; 
}
</script>

<?php
 
	require_once(DIR_BLOCO."/rodape.php");
		
?>
</body>
</html>

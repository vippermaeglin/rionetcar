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
			<?php  //require_once(DIR_BLOCO."/bannertopo.php"); ?>
			  
			<!-- BUSCA A OFERTA DESTAQUE -->
			<?  $BlocosOfertas->getBlocoDetalheProduto($idoferta,$BlocosOfertas->tipo_oferta);?> 
			<!-- FIM BUSCA A OFERTA DESTAQUE -->
			 
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


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-556c5de67a7ed226"></script>
</body>
</html>

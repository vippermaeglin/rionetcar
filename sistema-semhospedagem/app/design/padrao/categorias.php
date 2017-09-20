<?php 
require_once("include/head.php");
require_once("include/code/recentes.php");

if( $_REQUEST['idcategoria'] != "" ){
	$idcategoria = $_REQUEST['idcategoria'];
 
	$category = Table::Fetch('category', $idcategoria );
	$pagetitle = $category['name']; 
	 
}
?> 
<body id="page1">
 
<div style="display:none;" class="tips"><?=__FILE__?></div>
<div class="tail-top">
<?php  require_once(DIR_BLOCO."/bloco_background.php"); ?>
    <div class="main">
		<?php  require_once(DIR_BLOCO."/header.php"); ?>
		<section id="content"> 
			<?php  require_once(DIR_BLOCO."/bannertopo.php"); ?>
            <div class="inside">
				<div class="container">
					<div class="col-1b"> 
						<div class="container"> 
						     <div class="col-6" style="width:933px;" >
								<h2><?php echo utf8_decode($pagetitle) ?> </h2>
								<div class="search-background" style="z-index:999;margin-left:110px;">
								   <img src="<?=$PATHSKIN?>/images/loader.gif" alt="" /> 
								</div> 
								   
								<?
								if($INI['option']['paginacao'] == ""){
									$per_page = 12;
								}
								else{
									$per_page = $INI['option']['paginacao'];
								} 

								$page 		= $_REQUEST['pagina'];
								$start 		= ($page-1)*$per_page;

								if( $_REQUEST['idcategoria'] != "" ){
		
									$temoferta = $BlocosOfertas->ofertas_categoria($start,$per_page);
									$temoferta_afiliado = $BlocosOfertas->produtoafiliado_categoria($start,$per_page);
								} 
								?> 
								
								<!-- NUMERO DAS PÁGINAS -->
								<br style="clear:both;">
								<div id="pgofertas">
								<? require_once("include/paginacao.php"); ?> 
								</div>
								
							</div> 
						</div>
						<?     
						 if(!$temoferta and !$temoferta_afiliado){ ?>
								<div class="container">
									<div style="margin-left:11px;text-align:center" class="txt7c"> Ainda não temos ofertas para esta categoria</div>
								</div>
						 <? } ?>
					</div>
				</div>
			</div>
        </section>
    </div>
</div> 
 
 <?php require_once(DIR_BLOCO."/rodape.php"); ?>

 
<script>
  
J("#menu1").attr("class","")
J("#menu2").attr("class","current")
J("#menu3").attr("class","")
J("#menu4").attr("class","")
 
</script>
	
</body>
</html>

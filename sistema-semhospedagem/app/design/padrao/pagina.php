 <?php 
$page = Table::Fetch('page', $idpagina);
$pagetitle = $page['titulo']; 
$idcategoria = $page['category_id'];

if(!$idpagina){
	$pagetitle = "Página não encontrada";
	$page['value'] = "Nenhuma página associada";
}

require_once("include/head.php"); ?>
 
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
					<div class="col-1c">
						<div class="container">
						   <div class="col-6" > 
									<h2><?php echo utf8_decode($pagetitle) ?> </h2>
									<div class="contentpage"> <?=htmlspecialchars_decode($page['value'])?></div>
							 </div> 
							<div class="col-2">
								<div class="indent">
									<div class="indent1" style="padding:0 0 17px;">
										<div class="box p1">
											 <div class="col-2" style="<?=$styledireita?>">
												  <div style="display:none;height:35px;" class="tips"><?=__FILE__?></div>
													<div class="box">
														<div class="indent-box" > 
														  <!-- INICIO BLOCO OFERTA NACIONAL -->
																<?php  $BlocosOfertas->coluna_direita("10"); ?>
														 <!-- FIM BLOCO OFERTA NACIONAL -->
															 <?php  
															if($BlocosOfertas->tem_outras_ofertas()){ ?>			
																<table cellpadding="0" cellspacing="0" border="0">
																<tr><td colspan="2"><div class="secaotitulo outras"><?=$INI['option']['nomeblocodireita']?><div></td></tr>
																 <!-- INICIO BLOCO OFERTAS GERAIS -->
																<?php  $BlocosOfertas->coluna_direita("4,6"); ?>
																<!-- FIM BLOCO OFERTAS GERAIS -->
															  </table>
															<? } ?> 
															<? require_once(DIR_BLOCO."/bloco_facebook.php"); ?>
															<? require_once(DIR_BLOCO."/bloco_twitter.php"); ?>
															<? require_once(DIR_BLOCO."/bloco_avisos_banner.php"); ?>
															<? require_once(DIR_BLOCO."/bloco_ranking.php");  ?>
															
														</div>     
												</div>
												 <script> 
													J(".outras").corner("round 2px");
													J(".tit_oferta_nacional").corner("round 2px");
												</script>	
										</div>
									</div>
								</div>
							</div>
						
						 </div>
					</div>
				</div>
			</div>
        </section>
    </div>
</div> 
 
 <?php require_once(DIR_BLOCO."/rodape.php"); ?>
 
</body>
</html>
 
 <?php 
 
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
						 <div style="display:none;height:35px;" class="tips"><?=__FILE__?></div>
						   <div class="col-6" >
								<h2>TITULO</h2>
								<div class="contentpage"> CONTEUDO  </div>
							 </div> 
							<div class="col-2">
								<div class="indent">
									<div class="indent1" style="padding:0 0 17px;">
										<div class="box p1">
											 <div class="col-2" style="<?=$styledireita?>">
												<div class="box"> </div> 
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
 
<?php 
require_once("include/code/credito.php");
require_once("include/head.php"); 
?>
 
<body id="page1">
 <div style="display:none;" class="tips"><?=__FILE__?></div>
<div class="tail-top">
<?php  require_once(DIR_BLOCO."/bloco_background.php"); ?>
	<div class="main">
	   <?php  require_once(DIR_BLOCO."/header.php"); ?>
		<section id="content">
		 <div class="inside">
			<div class="container">
				 <div class="col-1">
				   <div class="indent">
						 <div class="container">
							<!-- COLUNA DO MEIO -->
							<div class="col-4b"> 
							   <br class="clear" /> 
							   <?php 
							    if($error == ""){ ?> 
								  <h2> Pedido <?=$orderid?> </h2>
									<br class="clear" /> 
									<h3> <?php echo "Obrigado por comprar conosco. O seu saldo foi utilizado e sua compra foi realizada com sucesso" ?> </h3>
									 <br class="clear" /> 
										Você irá receber um email com os detalhes de sua compra.
								 <?php } ?>
								 
								 <br class="clear" />  
								 <?php
								 if($error != ""){ ?> 
									<div class="error"> <p class="txt9b">  <?php  echo  $error ; ?></p> </div> <br class="clear" /> 
							     <?php } ?>
								 
								    <br class="clear" />  
								     
								   </div>
								 <a href="javascript:history.go(-1)">voltar</a>
								</div>
							</div>
						</div>
					 <!-- INICIO COLUNA DA DIREITA -->
						<?php include (DIR_BLOCO."/coluna_direita.php");;?>
					<!-- FIM COLUNA DA DIREITA -->
				</div>
			</div>
		</section>
		<?php
	   require_once(DIR_BLOCO."/rodape.php");
	   ?>
	</div>
</div> 

<div id="box">
<p><b>Email Cadastrado!</b> <br> Obrigado por assinar nossa newsletter.</p>
</div>

</body>
</html>
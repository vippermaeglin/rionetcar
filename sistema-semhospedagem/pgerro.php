<?php 

 require_once(dirname(__FILE__) . '/app.php');
 require_once("include/head.php"); 
 
 ?>
<body id="page1">
<div class="tail-top"><div class="bgtopo"></div>
	<div class="main">
<?php  require_once(DIR_BLOCO."/header.php"); ?>
		<section id="content">
            <div class="inside">
				 
				<div class="container">
                    
					<div class="col-1c">
						<!-- ::: PAGINA DE CADASTRO DE EMAIL  ::: -->
						<?php
							$erro404 =  true;
							 require_once(DIR_BLOCO."/cadastro_email.php");
						 ?>
						<!-- FIM PAGINA DE CADASTRO DE EMAIL -->  
					</div>
				 
					</div>
				</div>
            </div>
        </section>
    </div>
</div> 
 
<?php
	require_once(DIR_BLOCO."/rodape.php");
?>
</body>
</html>

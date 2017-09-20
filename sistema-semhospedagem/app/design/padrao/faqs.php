 <?php
 
$page = Table::Fetch('page', 'help_faqs');
$pagetitle = 'Perguntas Frequentes';

?> 

<?php  require_once("include/head.php"); ?>
<body id="page1">
<div style="display:none;" class="tips"><?=__FILE__?></div>
	<div class="tail-top">
<?php  require_once(DIR_BLOCO."/bloco_background.php"); ?>
		<div class="main">
		   <?php  require_once(DIR_BLOCO."/header.php"); ?>
			<section id="content">
			
				<div class="inside">
					<div class="container">
						<div class="col-1c">
						  <div class="container">
							   <div class="col-6" > 
									<h3><?php echo $pagetitle ?> </h3>
									<div class="oferdir"> <?= utf8_decode($page['value'])?></div>
								 </div> 
							 </div>
						</div>
					</div>
				</div>
			</section>
   </div>
</div> 
 
 <?php require_once(DIR_BLOCO."/rodape.php"); ?>
 
 
	<script language="javascript">
	  
	J("#menu1").attr("class","")
	J("#menu2").attr("class","")
	J("#menu3").attr("class","")
	J("#menu4").attr("class","")

	</script>

	<script language="javascript">
		  
		function cadastro(){
		  
				if(J("#invitation_content").val() == ""){
					alert("Insira alguma mensagem para o seu convidado.")
					document.getElementById("invitation_content").focus();
					return;
				}
	 
				if(J("#recipients").val() == ""){
					alert("Informe o(s) email(s) do(s) seu(s) convidado(s).")
					document.getElementById("recipients").focus();
					return;
				}		
				  
			   J("#formcad").submit();
				
		}	
		 
	</script>		
</body>
</html>

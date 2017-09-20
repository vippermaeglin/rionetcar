<?php  
	require_once("include/head.php"); 
?>
<div style="display:none;" class="tips"><?=__FILE__?></div> 
	<body id="page1" class="webstore home">	
		<!-- Responsivo -->
		<div class="containerM">
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/header.php"); ?>	
			</div>			
			<div class="row">
				<?php  
					
					if(!(empty($idartigo))){
						$article = Table::Fetch('magazine_article', $idartigo);
						$category = Table::Fetch('magazine_category', $article['id_category']);
						
						/* É efetuado uma busca dos últimos artigos cadastrados no site. */
						$sql = "select * from magazine_article where id_category = '" . $article['id_category'] . "' AND status = 'Y' order by rand() limit 5";
						$rs = mysql_query($sql);
						$rowA = mysql_num_rows($rs);
					}
					
					require_once(DIR_BLOCO_M . "/magazineM.php");
				?>	
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/rodapeM.php"); ?>				
			</div>			
		</div>
	</body>
</html>

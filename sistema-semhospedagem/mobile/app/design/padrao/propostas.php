<?php  
	require_once("include/head.php");

	$sqlP = "SELECT propostas . *, team.title FROM propostas INNER JOIN team ON propostas.idoferta = team.id WHERE propostas.user_id = " . $login_user_id . " order by data DESC";
	$rsP = mysql_query($sqlP);
?>
<div style="display:none;" class="tips"><?=__FILE__?></div> 
	<body id="page1" class="webstore home">	
		<!-- Responsivo -->
		<div class="containerM">
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/header.php"); ?>	
			</div>			
			<div class="row">
				<div class="titlePage">
					<p>Propostas</p>
				</div>
			</div>
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/propostasM.php"); ?>
			</div>
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/rodapeM.php"); ?>				
			</div>			
		</div>
	</body>
</html>

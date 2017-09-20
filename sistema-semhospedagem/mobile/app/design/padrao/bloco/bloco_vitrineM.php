<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 
<?php
	$ordem =  'rand()'; 

	$limite = $INI['system']['limite_vitrine'];

	$sql = "select * from team where ehvitrine = 'Y' and desativado = 'n' and (status is null or status = 1) and (pago = 'sim' or anunciogratis = 's') and begin_time < '".time()."' and end_time > '".time()."' order by $ordem limit " . $limite;
	$rs = mysql_query($sql);	

	if(mysql_num_rows($rs)){	
?>
	<div class="destaquesMobile">
	<?php
	while($l = mysql_fetch_assoc($rs)){
			
		$l['title'] = utf8_decode($l['title']);
		$link = $ROOTPATH . "/?idoferta=" . $l['id'];	
			
		if($l['image'] !=""){
			$imagemoferta = $INI['system']['wwwprefix']."/media/".$l['image'];
		}
		else{
			$imagemoferta = getImagemDestaque($l['imgdestaque']);
		}
		$l['title'] = $l['title'];
		?>
			<div class="itemMobile">
				<figure class="boxFigureMobile">
					<a href="<?=$link?>">
						<img src="<?=$imagemoferta?>" alt="<?=$l['title']?>" title="<?=$l['title']?>">
					</a>
				</figure>				
				<div class="boxContentMobile">
					<p class="boxContentText"> <?=displaySubStringWithStrip($l['title'], 30)?> </p>
					<p class="boxContentAnoModelo">Ano: <?php echo $l ['car_ano'] . "/" . $l['modelo_ano']; ?></p>
				</div>
			</div>	
	<?php } ?>	
	</div>	
<?php } ?>
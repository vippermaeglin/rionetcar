<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 
<?php
//$ordem =  'sort_order desc'; // ordenação pelo cadastro do anuncio: campo ordenação
$ordem =  'rand()';  // aleatório

$limite = $INI['system']['limite_vitrine'];

$sql = "select * from team where ehvitrine = 'Y' and desativado = 'n' and (status is null or status = 1) and (pago = 'sim' or anunciogratis = 's') and begin_time < '".time()."' and end_time > '".time()."' order by $ordem limit " . $limite;
$rs = mysql_query($sql);	

if(mysql_num_rows($rs)){	
?>
	<div class="secaotitulo popular" style="clear:both;">
		<div style="font-size: 15px;color:#fff; float:left; width: 100%;">ANÚNCIOS NA VITRINE</span> </div>
	</div>
		
	<div class="destaques" style="height: auto;margin-left: 20px;width: 780px;">
	<?php
	while($l = mysql_fetch_assoc($rs)){
			
		$l['title'] = utf8_decode($l['title']);
		$link = $INI['system']['wwwprefix']."/produto/". $l['id']."/".urlamigavel(tratanome($l['title']));	
			
		if($l['imgdestaque'] !=""){
			$imagemoferta = getImagemDestaque($l['imgdestaque']);
		}
		else{
			$imagemoferta = $INI['system']['wwwprefix']."/media/".$l['image'];
		}
		$l['title'] = $l['title'];
		?>
			<div class="box-item-mini">
				<figure class="box-figure">
						<a href="<?=$link?>"><img style="width:100%;height:80px;" src="<?=$imagemoferta?>" alt="<?=$l['title']?>" title="<?=$l['title']?>"></a>
				</figure>
				
				<div class="box-content" style="height: 127px;">
					<h1 class="box-content-heading1-mini"> <?=displaySubStringWithStrip($l['title'], 30)?> </h1>
					<p class="AnoModelo">Ano: <?php echo $l ['car_ano'] . "/" . $l['modelo_ano']; ?></p>
				</div>
			</div>
	
	<?php } ?>
	
	</div>
	
<?php } ?>
<div class="BannerHomeCenter">	  
	<?php echo $INI[bulletin][home]; ?>
</div>
<? 
$Parceiro 	 = new Parceiro();
$result = $Parceiro->getParceiros();
if(mysql_num_rows($result) > 0 ){
$cont=0;
?>
	
	<div style="display:none;" class="tips"><?=__FILE__?></div>
	<div class="destaque_home"> 
	<div class="titulo" style="margin-bottom:12px;width:303px;">Nossos Parceiros</div>
		<? 
		 while($linha = mysql_fetch_object($result)){
			 
			if($cont == 9){
				break;
			}
			 
			$logo 	= substr($linha->image,0,-4)."_parceirohome.jpg";
			$site 	= utf8_decode($linha->title); 
			$homepage 	= $linha->homepage; 
			$idsite = $linha->id;  
			$logocompleto = $INI['system']['wwwprefix']."/media/".$logo ;
			
			if($linha->image != ""){ $cont++; ?> 
					<div class="boxfundo"  style="width: 146px;height:152px;float:left;margin-left:3px;">
						<a target="_blank" href="<?=$homepage?>"> 
							<img border="0" align=""  alt="<?=$site?>" src="<?=$logocompleto?>">
						</a> 
					</div> 				
			<? }  
		} ?>
	</div>
	
<? } ?>
 
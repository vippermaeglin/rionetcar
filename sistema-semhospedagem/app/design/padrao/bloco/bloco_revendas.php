<? 
if($INI['option']['revendas'] == "Y" or  $INI['option']['revendas']=="" ) {  

	$Parceiro 	 = new Parceiro();
	$result = $Parceiro->getParceiros($_REQUEST['idparceiro']);
	if(mysql_num_rows($result) > 0 ){
	$cont=0;
?>
	
	<div style="display:none;" class="tips"><?=__FILE__?></div>
	<div class="destaque_home"> 
	<div class="titulo" style="margin-bottom:12px;width:150px;margin-top:9%;">Busque Revendas</div>
		<? 
		 while($linha = mysql_fetch_object($result)){
			  
			//$logo 	= substr($linha->image,0,-4)."_parceiromini.jpg";
			$logo 	= $linha->imagem;
			$nomeparceiro 	= utf8_decode($linha->title); 
			$link 	= $ROOTPATH."/index.php?busca=true&idparceiro=".$linha->id;
		 
			$logocompleto = $INI['system']['wwwprefix']."/media/".$logo ;
			$cont++; 
			?> 
				<div class="boxfundo">
					<a  href="<?=$link?>"> 
						<img border="0" align=""  title="<?=$nomeparceiro?>"  alt="<?=$nomeparceiro?>" src="<?=$logocompleto?>">
					</a> 
				</div> 				
			<?  
		} ?>
	</div>
	
	<? } ?>
	
<? } ?>
 
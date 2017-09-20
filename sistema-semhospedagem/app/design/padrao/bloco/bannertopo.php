<div style="display:none;" class="tips"><?=__FILE__?></div>
<?	
if(!file_exists(WWW_MOD."/bannerrotativo.inc")){
	
	 $INI['slideshowbanners']['ativo'] = "N";
}

if( $INI['slideshowbanners']['ativo'] == "N" or $INI['slideshowbanners']['ativo'] == "" ){ 
	
	if(empty($_REQUEST['idcategoria'])){
		 
		if($INI['bulletin']['topotodos']){
			$banner = trim($INI['bulletin']['topotodos']);
		}
	 
	}
	else if($_REQUEST['idcategoria'] != "" or $idcategoria !=""){
		if($idcategoria!=""){
				$idcatbusca=$idcategoria;
		}
		else{
				$idcatbusca=$_REQUEST['idcategoria'];
		}
		$categoria = $Categoria->getCategoria($idcatbusca) ;
		$banner =  $categoria['bannercategoria'];
	}
	if($banner ==""){
		$parceiro = Table::Fetch('partner', $_REQUEST['idparceiro']);
		if($parceiro['bannerparceiro']){
			$banner = $parceiro['bannerparceiro'];
		}
		else{
			$banner = trim($INI['bulletin']['topotodos']);
		}
	}

	$marginbotton="7px";
	if($ehome){ 
		$marginbotton="24px";
	}	
	?>
	<? if($banner!=""){?> 
		 
		<div class="bannerofertas">
			<div class="border_box">
				<?=$banner?>  
			</div>
		</div>
	<? } ?>
	
<? } 
else {
	if(getbannerslideshow()){
?>
	<div class="bannerofertas">
		<div class="border_box">
			<div class="box_skitter box_skitter_large">
				<ul> 
				<?=getbannerslideshow()?>
				</ul>
			</div>
		</div>		
	</div>
	<? } 
}?> 
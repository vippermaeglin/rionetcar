<div style="display:none;" class="tips"><?=__FILE__?></div>
<div class="descriptionOffer">
	<ul class="rslides" id="slider-offer-mobile">
	<?php if($team['image']) { ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['image']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['image1']) { ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['image1']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['image2']) { ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['image2']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['gal_image1']) { ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['gal_image1']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['gal_image2']) { ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['gal_image2']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['gal_image3']) { ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['gal_image3']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['gal_image4']) { ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['gal_image4']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['gal_image5']) { ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['gal_image5']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['gal_image6']) { ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['gal_image6']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['gal_image7']) { ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['gal_image7']; ?>">
		</li>
	<?php } ?>				
	</ul>
	<div class="borderList">
		<span class="textInfo">Cód. Anúncio: #<?php echo $team['id']; ?></span><br />
		<span class="textInfo">Título: <?php echo $team['title']; ?></span>
		<?php if($team['mostrarpreco'] == 1) { ?>
		<br />
		<span class="textInfo">Preço: <span class="priceOffer">R$<?php echo number_format($team['team_price'], 2, ",", "."); ?></span></span>
		<?php } ?>
	</div>	
	<div class="borderList">
		<h2>Características do veículo</h2>
		<span class="textDescriptionOffer">
			<?php if(!(empty($team['car_ano']))) { ?>Fabricação: <?php echo $team['car_ano']; ?><br /><?php } ?>
			<?php if(!(empty($team['modelo_ano']))) { ?>Modelo: <?php echo $team['modelo_ano']; ?><br /><?php } ?>
			<?php if(!(empty($team['numero_portas']))) { ?>Portas: <?php echo $team['numero_portas']; ?><br /><?php } ?>
			<?php if(!(empty($team['cilindros']))) { ?>Cilindros: <?php echo $team['cilindros']; ?><br /><?php } ?>
			<?php if(!(empty($team['motor']))) { ?>Motor: <?php echo $team['motor']; ?><br /><?php } ?>
			<?php if(!(empty($team['km']))) { ?>KM: <?php echo $team['km']; ?><br /><?php } ?>
			<?php if(!(empty($team['cor']))) { ?>Cor: <?php echo utf8_decode($team['cor']); ?><br /><?php } ?>
			<?php if(!(empty($team['transmissao']))) { ?>Câmbio: <?php echo utf8_decode($team['transmissao']); ?><br /><?php } ?>
			<?php if(!(empty($team['combustivel']))) { ?>Combustível: <?php echo $team['combustivel']; ?><br /><?php } ?>
			<?php if(!(empty($team['placa']))) { ?>Placa: <?php echo strtoupper(formataplaca($team['placa'])); ?><br /><?php } ?>
			<?php if(!(empty($team['estadoveiculo']))) { ?>Tipo: <?php echo $team['estadoveiculo']; ?><br /><?php } ?>
			<?php if(!(empty($team['partner_id']))) { ?>Anunciante: <?php echo gettipoanunciante($team['partner_id']); ?><?php } ?>
		</span>
	</div>	
	<div class="borderList">
		<h2>Detalhes do veículo</h2>
		<span class="textDescriptionOffer">
			<?php
				$BlocosOfertas = new BlocosOfertas();
				$descricao = $BlocosOfertas->getmaisdescricao($team, $descricao);
				
				echo utf8_decode(str_replace("<br>", "", $descricao));
			?>
		</span>
	</div>	
	<div class="borderList">
		<h2>Outras Informações</h2>
		<p class="textDescriptionOffer"><?php echo utf8_decode($team['summary']); ?></p>
	</div>	
	<div class="borderList">
		<h2>Dados do Anunciante</h2>
		<?php
			$endereco="";
			if($partner['address']!=""){
			$endereco.=$partner['address']. " ";
			$endegoogle .= $partner['address']. " ";}
			if($partner['numero']!=""){
			$endereco.= $partner['numero']. ", ";
			$endegoogle .= $partner['numero']. " ";}
			if($partner['bairro']!=""){
			$endereco.=$partner['bairro']. " ";}
			if($partner['cidadeusuario']!=""){
			$endereco.=$partner['cidadeusuario']. " ";
			$endegoogle .= $partner['cidadeusuario']. " - ";}
			if($partner['estado']!="") {
			$endereco.= "- ".$partner['estado']. " "; 
			$endegoogle .= $partner['estado']. " "; }
			if($partner['zipcode']!="") {
			$endereco.=$partner['zipcode']. " ";}

			$endegoogle = retira_acentos($endegoogle);
		?>
		<?php if($partner['tipo'] == 'Particular'){ ?> <p class="textDescriptionOffer">Endereço: <?php echo utf8_decode($endereco); ?></p>	<?php } ?>
		<?php if(!(empty($partner['site']))) { ?><p class="textDescriptionOffer">Site: <a target="_blank" href="<?php echo $partner['site']; ?>"><?php echo $partner['site']; ?></a></p><?php } ?>
		<?php if(!(empty($partner['cnpj']))) { ?><p class="textDescriptionOffer">CNPJ: <?php echo $partner['cnpj']; ?></p><?php } ?>
		<?php if(!(empty($partner['celular']))) { ?><p class="textDescriptionOffer">Telefone: <?php echo "(".$partner['ddd'].") ". $partner['celular']; ?></p><?php } ?>
		<p class="textDescriptionOffer">
			Ao ligar, informe ter visto o an&uacute;ncio no site <?php echo utf8_decode($INI['system']['sitename']); ?>.
			<br />			
			<br />			
			<a style="color:#f00;font-weight: bolder;font-size: 15px;" href="<?php echo $ROOTPATH."/index.php?busca=true&idparceiro=".$partner['id']; ?>">Ver Estoque</a>
		</p>
	</div>
</div>

<?php
	
	atualiza_click_mobile($team['id']);
	
	function atualiza_click_mobile($idoferta) {

	$sql = "select clicados from team where id = $idoferta";
    $rs = mysql_query($sql);	
	$linha = mysql_fetch_object($rs);
	
	if($linha->clicados){
	   $sql = "update team set clicados = clicados + 1 where id = $idoferta";
		mysql_query($sql);	
	}
	else{
		$sql = "update team set clicados = 1 where id = $idoferta";
		mysql_query($sql);
	}
	
	$ip =  $_SERVER['REMOTE_ADDR'];
	$data = date('Y-m-d H:i:s');
	 
}

?>
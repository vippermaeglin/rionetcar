<? if($INI['option']['marcas'] == "Y" or  $INI['option']['marcas']=="" ) {  ?>
 
	<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 
	 
	<div class="secaotitulo popular" style="clear:both;margin-left:20px">
		<div style="font-size: 15px;color:#fff; float:left; width: 100%;">MARCAS DE VEÍCULOS MAIS BUSCADOS</span> </div>
	</div>
		
	<div class="destaques" >
		<ul class="listagem-marcas-horizontal">
			<li>
				<a href="/index.php?filtros=true&busca=true&car_fabricante=23" title="Carros Chevrolet"><div class="sprite-marcas sprite-chevrolet">Chevrolet</div></a>
			</li>
			<li>
				<a href="/index.php?filtros=true&busca=true&car_fabricante=13" title="Carros Citroën"><div class="sprite-marcas sprite-citroen">Citroën</div></a>
			</li>
			<li>
				<a href="/index.php?filtros=true&busca=true&car_fabricante=21" title="Carros Fiat"><div class="sprite-marcas sprite-fiat">Fiat</div></a>
			</li>
			<li>
				<a href="/index.php?filtros=true&busca=true&car_fabricante=22" title="Carros Ford"><div class="sprite-marcas sprite-ford">Ford</div></a>
			</li>
			<li>
				<a href="/index.php?filtros=true&busca=true&car_fabricante=25" title="Carros Honda"><div class="sprite-marcas sprite-honda">Honda</div></a>
			</li>
			<li>
				<a href="/index.php?filtros=true&busca=true&car_fabricante=44" title="Carros Peugeot"><div class="sprite-marcas sprite-peugeot">Peugeot</div></a>
			</li>
			<li>
				<a href="/index.php?filtros=true&busca=true&car_fabricante=26" title="Carros Hyundai"><div class="sprite-marcas sprite-hyundai">Hyundai</div></a>
			</li>
			<li>
				<a href="/index.php?filtros=true&busca=true&car_fabricante=48" title="Carros Renault"><div class="sprite-marcas sprite-renault">Renault</div></a>
			</li>
			<li>
				<a href="/index.php?filtros=true&busca=true&car_fabricante=56" title="Carros Toyota"><div class="sprite-marcas sprite-toyota">Toyota</div></a>
			</li>
			<li>
				<a href="/index.php?filtros=true&busca=true&car_fabricante=59" title="Carros Volkswagen"><div class="sprite-marcas sprite-volkswagen">Volkswagen</div></a>
			</li>
			<!--
			<li>
				<a href="/veiculos/mitsubishi" title="Carros Mitsubishi"><div class="sprite-marcas sprite-mitsubishi">Mitsubishi</div></a>
			</li>
			<li class="last">
				<a href="/veiculos/jac" title="Carros Jac Motors"><div class="sprite-marcas sprite-jac-motors">JAC</div></a>
			</li>
			-->
		</ul>
		  
	</div>
<? } ?>
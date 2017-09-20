<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 
 
<div class="blocoCarro">
<!-- Novo formulário -->
<form method="GET" action="<?=$ROOTPATH?>/index.php?busca=true" name="SearchForm" id="SearchForm">
<div class="box-comprar col-14 b2 brd2 brd brd-red radius-5">
	<input type="hidden" name="busca" id="busca" value="true">
	<input type="hidden" name="TipoVeiculo" id="TipoVeiculo" value="">
	<div class="col-9">
		<div class="pad-gutter-tb pad-gutter-l size-default">
			<h3 class="bold size-xbig red dis-ib pad-gutter-b">Busque por <span class="tipo-titulo">carros</span></h3>
			<ul class="bold line-list tab brd-b size-big" id="tabs-busca">
				<li class="active"><h1><a class="item col-3 b" data="carro" href="#">Comprar Carro</a></h1></li>
				<li><h2><a class="item col-3 b last" data="moto" href="#">Comprar Moto</a></h2></li>
			</ul>
			<div class="col-9 b2 pad-h_gutter-t">
					<div class="x2 pull-left">						
						<select data-aspect="TipoAnuncio" class="multipurpose" id="TipoAnuncio" name="TipoAnuncio" style="display: ;">
							<option value="">Tipo anúncio: 0 KM e Seminovo</option>
							<option value="Novo" <? if( $_REQUEST['TipoAnuncio']=="Novo") echo "selected='selected'"?> >0 KM</option>
							<option value="Seminovo" <? if( $_REQUEST['TipoAnuncio']=="Seminovo") echo "selected='selected'"?>>Seminovo</option>
						</select>
					</div>
					<div class="x2 pull-left lsep last">				
						<select data-aspect="TipoAnunciante" class="multipurpose" id="TipoAnunciante" name="TipoAnunciante" style="display: ;">
							<option value="">Tipo de anunciante: Todos</option>
							<option value="Revenda" <? if( $_REQUEST['TipoAnunciante']=="Revenda") echo "selected='selected'"?> >Loja</option>
							<option value="Concessionaria" <? if( $_REQUEST['TipoAnunciante']=="Concessionaria") echo "selected='selected'"?>>Concessionária</option>
							<option value="Particular" <? if( $_REQUEST['TipoAnunciante']=="Particular") echo "selected='selected'"?>>Particulares</option> 
						</select>						
					</div>
					<div class="x2 pull-left">				
						<select data-clear="true" data-showcount="true" data-aspect="Marca" class="multipurpose" id="Marca" name="Marca" style="display: ;">
							<option value="">Marca: Qualquer marca</option>
						</select>	
					</div>
					<div class="x2 pull-left lsep last">						
						<select data-clear="true" data-showcount="true" data-aspect="Modelo" class="multipurpose" id="Modelo" name="Modelo" style="display: ;">
							<option value="">Modelo: Qualquer modelo</option>
						</select>
					</div>
					<div class="x2 pull-left">						
						<select data-aspect="AnoDe" class="multipurpose" id="AnoDe" name="AnoDe" style="display: ;">
							<option value="">Ano de: Mínimo</option>
								<?php
								$ano = date('Y') +1;
								$ano_inicio = 1900;
								while($ano > $ano_inicio) {
									if (isset($_REQUEST['AnoDe']) && $ano == $_REQUEST['AnoDe']) {
										echo "<option value='{$ano}' selected='selected'>{$ano}</option>";
									} else {
										echo "<option value='{$ano}'>{$ano}</option>";
									}
									$ano--;
								}
								?>
						</select>
					</div>
					<div class="x2 pull-left lsep last">						
						<select data-aspect="AnoAte" class="multipurpose" id="AnoAte" name="AnoAte" style="display: ;">
							<option value="">Ano até: Máximo</option> 
								<?php
								$ano = date('Y') +1;
								$ano_inicio = 1900;
								while($ano > $ano_inicio) {
									if (isset($_REQUEST['AnoAte']) && $ano == $_REQUEST['AnoAte']) {
										echo "<option value='{$ano}' selected='selected'>{$ano}</option>";
									} else {
										echo "<option value='{$ano}'>{$ano}</option>";
									}
									$ano--;
								}
							 ?>
						</select>
					</div>
					<div class="x2 pull-left">						
						<select data-aspect="PrecoDe" class="multipurpose" id="PrecoDe" name="PrecoDe" style="display: ;">
							<option value="">Preço de: Mínimo</option>
							<?php campo_precominimo($_REQUEST['PrecoDe']); ?>
						</select>
					</div>
					<div class="x2 pull-left lsep last">						
						<select data-aspect="PrecoAte" class="multipurpose" id="PrecoAte" name="PrecoAte" style="display: ;">
							<option value="">Preço até: Máximo</option>
								<?php campo_precomaximo($_REQUEST['PrecoAte']); ?>
						</select>
					</div>
					<div class="x2 pull-left">						
						<select data-aspect="Estado" class="multipurpose" id="Estado" name="Estado" style="display: ;">
							<option value="">Estado: Todos</option>
								<?php
									$sql = "SELECT  uf, nome FROM estados";
									$estados = mysql_query($sql) or die(mysql_error());
									while ($row = mysql_fetch_array($estados, MYSQL_ASSOC)) {
										if($_REQUEST['Estado'] == $row['uf']) {
											echo utf8_decode("<option selected value='{$row['uf']}'>{$row['nome']}</option>");		
										}
										else {
											echo utf8_decode("<option value='{$row['uf']}'>{$row['nome']}</option>");		
										}
									}
								?>
						</select>
					</div>
					<div class="x2 pull-left lsep last">						
						<select data-aspect="Cidade" class="multipurpose" id="Cidade" name="Cidade" style="display: ;">
							<option value="">Cidade: Todas</option>
						</select>
					</div>
					<div class="pull-left last-search clear last b brd radius-7 pad-h_gutter-tb pad-h_gutter-lr dis-n" id="UltimaBusca" name="UltimaBusca">
						<span class="red bold">Última busca:</span>
					</div>
					<input type="button" class="radius-7 pad-h_gutter-tb bg-red bg-hover-red2 white text-center size-udefault upper bold pull-right pad-gutter-lr mrg-gutter-l" value="buscar" id="btnBuscar" name="btnBuscar">
				</form>
				<!-- Fim novo formulário -->
			</div>
		</div>
	</div>
	<div class="l2 col-5 b2 last">
		<div class="tipo carro mrg-gutter-l">
			<ul class="tabs-busca mrg-h_gutter-t mrg-gutter-r line-list tab brd-b size-default bold">
				<li class="active"><a class="col-2 b" data="carroceria" data-tipo="carro" href="#">Carroceria</a></li>
				<li><a class="col-2 b last" data="necessidade" data-tipo="carro" href="#">Necessidade</a></li>
			</ul>
			<div class="tipo-carro carroceria size-small">
				<ul class="mrg-h_gutter-t table">
					<li>
						<a href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoCarroceria=Hatchback">
							<img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/hatchback.png">
							<h3>Hatchback</h3>
						</a>
					</li>
					<li>
						<a href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoCarroceria=Sedan">
							<img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/sedan.png">
							<h3>Sedan</h3>
						</a>
					</li>
					<li>
						<a href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoCarroceria=Minivan">
							<img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/minivan.png">
							<h3>Minivan</h3>
						</a>
					</li>
					<li>
						<a href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoCarroceria=Perua/SW">
							<img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/peruasw.png">
							<h3>Perua/SW</h3>
						</a>
					</li>
					<li>
						<a href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoCarroceria=Conversivel">
							<img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/conversivel.png">
							<h3>Conversível</h3>
						</a>
					</li>
					<li>
						<a href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoCarroceria=Cupe">
							<img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/cupe.png">
							<h3>Cupê</h3>
						</a>
					</li>
					<li>
						<a href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoCarroceria=Picape">
							<img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/picape.png">
							<h3>Picape</h3>
						</a>
					</li>
					<li>
						<a href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoCarroceria=SUV">
							<img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/suv.png">
							<h3>SUV</h3>
						</a>
					</li>
				</ul>
				<div class="mrg-gutter-r text-right">
					<a class="bold size-small lh-d_gutter arrow-r" href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro">ver todas</a>
				</div>
			</div>
			<div class="tipo-carro necessidade size-small dis-n">
				<ul class="mrg-h_gutter-t">
					<li>
						<a class="arrow" href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoNecessidade=Familiar+pequeno"><strong>Familiar pequeno</strong></a>
					</li>
					<li>
						<a class="arrow" href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoNecessidade=Urbano"><strong>Urbano</strong></a>
					</li>
					<li>
						<a class="arrow" href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoNecessidade=Familiar+medio"><strong>Familiar médio</strong></a>
					</li>
					<li>
						<a class="arrow" href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoNecessidade=Comercial"><strong>Comercial</strong></a>
					</li>
					<li>
						<a class="arrow" href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoNecessidade=Familiar+grande"><strong>Familiar grande</strong></a>
					</li>
					<li>
						<a class="arrow" href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoNecessidade=Lazer"><strong>Lazer</strong></a>
					</li>
					<li>
						<a class="arrow" href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoNecessidade=Off-road"><strong>Off-Road</strong></a>
					</li>
					<li>
						<a class="arrow" href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoNecessidade=Esportivo"><strong>Esportivo</strong></a>
					</li>
					<li>
						<a class="arrow" href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoNecessidade=Carro+de+colecionador"><strong>Carro de colecionador</strong></a>
					</li>
					<li>
						<a class="arrow" href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=carro&TipoNecessidade=Adaptado+para+pessoas+com+deficiência+física"><strong>Adaptado para pessoas com deficiência física</strong></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="dis-n tipo moto mrg-gutter-l">
			<ul class="tabs-busca mrg-h_gutter-t mrg-gutter-r line-list tab brd-b size-default bold">
				<li class="active"><a class="col-2 b" data="estilo" data-tipo="moto" href="#">Estilo</a></li>
				<li><a class="col-2 b last" data="necessidade" data-tipo="moto" href="#">Necessidade</a></li>
			</ul>
			<div class="tipo-moto estilo size-small">
				<ul class="mrg-h_gutter-t table">
					<li>
						<a href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=moto&TipoEstilo=Esportiva">
							<img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/esportiva.png">
							<h3>Esportiva</h3>
						</a>
					</li>
					<li>
						<a href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=moto&TipoEstilo=Street">
							<img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/street.png">
							<h3>Street</h3>
						</a>
					</li>
					<li>
						<a href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=moto&TipoEstilo=Naked">
							<img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/naked.png">
							<h3>Naked</h3>
						</a>
					</li>
					<li>
						<a href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=moto&TipoEstilo=Custom">
							<img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/custom.png">
							<h3>Custom</h3>
						</a>
					</li>
					<li>
						<a href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=moto&TipoEstilo=Off-road">
							<img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/off-road.png">
							<h3>Off-Road</h3>
						</a>
					</li>
					<li>
						<a href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=moto&TipoEstilo=Touring">
							<img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/touring.png">
							<h3>Touring</h3>
						</a>
					</li>
					<li>
						<a href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=moto&TipoEstilo=SuperMotard">
							<img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/super-motoard.png">
							<h3>SuperMotard</h3>
						</a>
					</li>
					<li>
						<a href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=moto&TipoEstilo=Scooter">
							<img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/scooter.png">
							<h3>Scooter</h3>
						</a>
					</li>
				</ul>
				<div class="mrg-gutter-r text-right">
					<a class="bold size-small lh-d_gutter arrow-r" href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=moto">ver todos</a>
				</div>
			</div>
			<div class="tipo-moto necessidade size-small dis-n">
				<ul class="mrg-h_gutter-t">
					<li>
						<a class="arrow" href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=moto&TipoNecessidade=Urbana"><strong>Urbana</strong></a>
					</li>
					<li>
						<a class="arrow" href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=moto&TipoNecessidade=Estrada"><strong>Estrada</strong></a>
					</li>
					<li>
						<a class="arrow" href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=moto&TipoNecessidade=Lazer"><strong>Lazer</strong></a>
					</li>
					<li>
						<a class="arrow" href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=moto&TipoNecessidade=Esportiva"><strong>Esportiva</strong></a>
					</li>
					<li>
						<a class="arrow" href="<?=$ROOTPATH?>/index.php?busca=true&TipoVeiculo=moto&TipoNecessidade=Off-Road"><strong>Off-Road</strong></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="mrg-gutter-lr pad-h_gutter-t text-center b-shadow-i brd-t c-after">
			<h2 class="bold size-default lh-oh_gutter">VENDA seu carro ou moto!</h2>
			<div class="mrg-h_gutter-t mrg-gutter-l col-2 b brd radius-7 bg-gray-light2">
				<a class="col-2 b last lh-0" href="<?php echo $ROOTPATH; ?>/index.php?page=queroanunciar"><img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/vender-carro.png"></a>
			</div>
			<div class="mrg-h_gutter-t col-2 last b brd radius-7 bg-gray-light2">
				<a class="col-2 b last lh-0" href="<?php echo $ROOTPATH; ?>/index.php?page=queroanunciar"><img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/vender-moto.png"></a>
			</div>
		</div>
	</div>
</div>
 </div>

<?php
	if(isset($_GET["busca"])){
		
		/* Caso a busca seja verdadeira, então é exibido os anuncios de acordo com
		   os filtros, senão é exibidos os artigos cadastrados no site. 
		*/
		$busca = trim(strip_tags($_GET["busca"]));
		
		if($busca == "true"){
			require(DIR_BLOCO."/buscaveiculos.php");
		}else{
			require_once(DIR_BLOCO."/bloco_anuncios_vitrine.php");
			echo "<hr style='clear:both;width: 133.5%;'>";
			require_once(DIR_BLOCO."/bloco_noticias_destaques.php");		
		}
	}else{
			require_once(DIR_BLOCO."/bloco_anuncios_vitrine.php");
			echo "<hr style='clear:both;width: 133.5%;'>";
			require_once(DIR_BLOCO."/bloco_noticias_destaques.php");
	}	
?>

<script>

/* Script de controle do formulário de busca da página inicial. */

	J('document').ready(function(){
		
		var active = "";
		var tipo = "";
		var manufacturer, state;
		
		/* Ao acessar a página é carregado as marcas de carro como padrão. */
		<?php
			if(!(empty($_REQUEST['TipoVeiculo']))) {
		?>
		J(this).SearchMark("<?php echo $_REQUEST['TipoVeiculo']; ?>");
		<?php }else { ?>
		J(this).SearchMark("carro");
		<?php } ?>
		
		/* O input hidden é carregado com o valor carro  ou moto para filtrar nos resultados. */
		<?php
			if(!(empty($_REQUEST['TipoVeiculo']))) {
		?>
		J('#TipoVeiculo').val("<?php echo $_REQUEST['TipoVeiculo']; ?>");
		<?php }else { ?>
		J('#TipoVeiculo').val("carro");
		<?php } ?>	
		
		/* Ajax para busca de marcas de carros e motos. */
		J('#Marca').change(function(){
			active = J('#tabs-busca li:first-child').attr('class');
			
			if(active != ""){
				tipo = "carro";
			}else{
				tipo = "moto";
			}
			
			manufacturer = J(this).attr('value');
			J(this).SearchModel(tipo, manufacturer);			
		});
		
		<?php
			if(!(empty($_REQUEST['Marca']))) {
		?>
		setTimeout(function(){ J("#Marca option[value='<?php echo $_REQUEST['Marca']; ?>']").attr('selected', 'selected'); }, 4000);
		
		active = J('#tabs-busca li:first-child').attr('class');
		
		if(active != ""){
			tipo = "carro";
		}else{
			tipo = "moto";
		}
		
		J(this).SearchModel('<?php echo $_REQUEST['TipoVeiculo']; ?>', <?php echo $_REQUEST['Marca']; ?>);
		setTimeout(function(){ J("#Modelo option[value='<?php echo $_REQUEST['Modelo']; ?>']").attr('selected', 'selected'); }, 4000);
		<?php } ?>
		
		<?php
			if(!(empty($_REQUEST['Estado']))) {
		?>
		J(this).SearchCity('<?php echo $_REQUEST['Estado']; ?>');
		setTimeout(function(){ J("#Cidade option[value='<?php echo $_REQUEST['Cidade']; ?>']").attr('selected', 'selected'); }, 4000);
		<?php } ?>
		
		/* Ajax para busca de cidades de acordo com o estado escolhido. */
		J('#Estado').change(function(){
			state = J(this).attr('value');
			J(this).SearchCity(state);			
		});
		
		/* Controle de abas e divs do formulário de busca do site. */		
		J('#tabs-busca li h2 a').click(function()
		{
			J('#tabs-busca li:first-child').removeClass('active');
			J('#tabs-busca li:nth-child(2)').addClass('active');
			J('.tipo.carro.mrg-gutter-l').hide();
			J('.tipo.carro.mrg-gutter-l').addClass('dis-n');
			J('.tipo.moto.mrg-gutter-l').show();
			J('.tipo.moto.mrg-gutter-l').removeClass('dis-n');
			/* Requisição ajax para buscar as marcas do carro ou moto. */
			J(this).SearchMark("moto");
			J('#TipoVeiculo').val("moto");
		});
		
		J('#tabs-busca li h1 a').click(function(){
			J('#tabs-busca li:nth-child(2)').removeClass('active');
			J('#tabs-busca li:first-child').addClass('active');
			J('.tipo.moto.mrg-gutter-l').hide();
			J('.tipo.moto.mrg-gutter-l').addClass('dis-n');
			J('.tipo.carro.mrg-gutter-l').show();
			J('.tipo.carro.mrg-gutter-l').removeClass('dis-n');
			/* Requisição ajax para buscar as marcas do carro ou moto. */
			J(this).SearchMark("carro");
			J('#TipoVeiculo').val("carro");
		});
		
		J('.tabs-busca li:first-child a').click(function()
		{
			if(J(this).attr('data-tipo') == 'carro')
			{
				J('.tabs-busca li:nth-child(2)').removeClass('active');
				J('.tipo-carro.necessidade.size-small').hide();
				J('.tipo-carro.necessidade.size-small').addClass('dis-n');
				J('.tipo-carro.carroceria.size-small').show();
				J('.tipo-carro.carroceria.size-small').removeClass('dis-n');
				J('.tabs-busca li:first-child').addClass('active');
				/* Requisição ajax para buscar as marcas do carro ou moto. */
				J(this).SearchMark("carro");
				J('#TipoVeiculo').val("carro");
			}
			else
			{
				J('.tabs-busca li:nth-child(2)').removeClass('active');
				J('.tipo-moto.estilo.size-small').show();
				J('.tipo-moto.estilo.size-small').removeClass('dis-n');
				J('.tipo-moto.necessidade.size-small').hide();
				J('.tipo-moto.necessidade.size-small').addClass('dis-n');
				J('.tabs-busca li:first-child').addClass('active');
				/* Requisição ajax para buscar as marcas do carro ou moto. */
				J(this).SearchMark("moto");
				J('#TipoVeiculo').val("moto");
			}
		});
		
		J('.tabs-busca li:nth-child(2) a').click(function()
		{
			if(J(this).attr('data-tipo') == 'carro')
			{
				J('.tabs-busca li:first-child').removeClass('active');
				J('.tipo-carro.carroceria.size-small').hide();
				J('.tipo-carro.carroceria.size-small').addClass('dis-n');
				J('.tipo-carro.necessidade.size-small').show();
				J('.tipo-carro.necessidade.size-small').removeClass('dis-n');
				J('.tabs-busca li:nth-child(2)').addClass('active');
				/* Requisição ajax para buscar as marcas do carro ou moto. */
				J(this).SearchMark("carro");
				J('#TipoVeiculo').val("carro");
			}
			else
			{
				J('.tabs-busca li:first-child').removeClass('active');
				J('.tipo-moto.estilo.size-small').hide();
				J('.tipo-moto.estilo.size-small').addClass('dis-n');
				J('.tipo-moto.necessidade.size-small').show();
				J('.tipo-moto.necessidade.size-small').removeClass('dis-n');
				J('.tabs-busca li:nth-child(2)').addClass('active');	
				/* Requisição ajax para buscar as marcas do carro ou moto. */
				J(this).SearchMark("moto");	
				J('#TipoVeiculo').val("moto");				
			}
		});
		
		J('#btnBuscar').click(function(){
			J('#SearchForm').submit();
		});
		
		J.fn.getfones = function(iduser,partner_id){
		
			J.ajax({
				type: "POST", 
				cache: false,
				async: false,
				url: "<?php echo $INI['system']['wwwprefix']?>/include/funcoes.php",
				data: "acao=getfones&iduser="+iduser+"&partner_id="+partner_id, 
				success: function(retorno){ 
					jQuery.colorbox({html:retorno});  	 
					}
				});
			}
		});


</script>
<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 
<div class="buscaMobile">
	<form method="GET" action="<?=$ROOTPATH?>/index.php?busca=true" name="SearchForm" id="SearchForm">
		<input type="hidden" name="busca" id="busca" value="true">
		<input type="hidden" name="TipoVeiculo" id="TipoVeiculo" value="">
		<div class="linkNavForm">
			<a data-id="show" href="#">
				Exibir busca
			</a>
		</div>
		<div class="rowForm">	
			<label>Tipo de veículo:</label>
			<select data-aspect="TipoAnuncio" class="multipurpose" id="TipoVeiculoV" name="TipoVeiculoV">
				<option data-tipo="carro" value="Carro">Carro</option>
				<option data-tipo="moto" value="Moto">Moto</option>
			</select>
		</div>			
		<div class="rowForm">	
			<label>Tipo de anúncio:</label>
			<select data-aspect="TipoAnuncio" class="multipurpose" id="TipoAnuncio" name="TipoAnuncio">
				<option value="">0 KM e Seminovo</option>
				<option value="Novo" <? if($_REQUEST['TipoAnuncio']=="Novo") echo "selected='selected'"?> >0 KM</option>
				<option value="Seminovo" <? if($_REQUEST['TipoAnuncio']=="Seminovo") echo "selected='selected'"?>>Seminovo</option>
			</select>
		</div>		
		<div class="rowForm">	
			<label>Tipo de anunciante:</label>
			<select data-aspect="TipoAnunciante" class="multipurpose" id="TipoAnunciante" name="TipoAnunciante" style="display: ;">
				<option value="">Todos</option>
				<option value="Revenda" <? if( $_REQUEST['TipoAnunciante']=="Revenda") echo "selected='selected'"?> >Loja</option>
				<option value="Concessionaria" <? if( $_REQUEST['TipoAnunciante']=="Concessionaria") echo "selected='selected'"?>>Concessionária</option>
				<option value="Particular" <? if( $_REQUEST['TipoAnunciante']=="Particular") echo "selected='selected'"?>>Particulares</option> 
			</select>	
		</div>		
		<div class="rowForm">	
			<label>Marca do veículo:</label>
			<select data-clear="true" data-showcount="true" data-aspect="Marca" class="multipurpose" id="Marca" name="Marca" style="display: ;">
				<option value="">Qualquer marca</option>
			</select>	
		</div>		
		<div class="rowForm">	
			<label>Modelo do veículo:</label>
			<select data-clear="true" data-showcount="true" data-aspect="Modelo" class="multipurpose" id="Modelo" name="Modelo" style="display: ;">
				<option value="">Qualquer modelo</option>
			</select>	
		</div>		
		<div class="rowForm">	
			<label>Ano mínimo:</label>
			<select data-aspect="AnoDe" class="multipurpose" id="AnoDe" name="AnoDe" style="display: ;">
				<option value="">Ano mínimo</option>
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
		<div class="rowForm">	
			<label>Ano máximo:</label>
			<select data-aspect="AnoAte" class="multipurpose" id="AnoAte" name="AnoAte" style="display: ;">
				<option value="">Ano máximo</option> 
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
		<div class="rowForm">	
			<label>Preço mínimo:</label>
			<select data-aspect="PrecoDe" class="multipurpose" id="PrecoDe" name="PrecoDe" style="display: ;">
				<option value="">Preço mínimo</option>
				<?php campo_precominimo($_REQUEST['PrecoDe']); ?>
			</select>
		</div>		
		<div class="rowForm">	
			<label>Preço máximo:</label>
			<select data-aspect="PrecoAte" class="multipurpose" id="PrecoAte" name="PrecoAte" style="display: ;">
				<option value="">Preço máximo</option>
					<?php campo_precomaximo($_REQUEST['PrecoAte']); ?>
			</select>
		</div>		
        <div class="rowForm">	
			<label>Estado:</label>
			<select data-aspect="Estado" class="multipurpose" id="Estado" name="Estado" style="display: ;">
				<option value="">Todos</option>
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
		<div class="rowForm">	
			<label>Cidade:</label>
			<select data-aspect="Cidade" class="multipurpose" id="Cidade" name="Cidade" style="display: ;">
				<option value="">Todas</option>
			</select>
		</div>		
		<div class="rowForm">	
			<input type="button" name="btnBuscar" id="btnBuscar" value="Buscar" class="btnSubmit">
		</div>
	</form>
</div>

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
			active = J(this).val();
			
			if(active != ""){
				tipo = "carro";
			}else{
				tipo = "moto";
			}
			
			manufacturer = J(this).attr('value');
			J(this).SearchModel(tipo, manufacturer);			
		});
		
		/* Ajax para busca de cidades de acordo com o estado escolhido. */
		J('#Estado').change(function(){
			state = J(this).attr('value');
			J(this).SearchCity(state);			
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
		
		J('#TipoVeiculoV').change(function()
		{		
			if(J(this).val() == 'Carro')
			{
				/* Requisição ajax para buscar as marcas do carro ou moto. */
				J(this).SearchMark("carro");
				J('#TipoVeiculo').val("carro");
			}
			else
			{	
				/* Requisição ajax para buscar as marcas do carro ou moto. */
				J(this).SearchMark("Moto");	
				J('#TipoVeiculo').val("moto");				
			}
		});
		
		J('#btnBuscar').click(function(){
			J('#SearchForm').submit();
		});
	});
</script>
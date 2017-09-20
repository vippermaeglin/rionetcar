<div style="display:none;" class="tips"><?=__FILE__?></div>
<link href="<?php echo $PATHSKIN; ?>/css/bootstrap-chosen.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $ROOTPATH; ?>/js/chosen.jquery.js"></script>
<script>
  jQuery(function() {
		jQuery('.chosen-select').chosen();
		jQuery('.chosen-select-deselect').chosen({ allow_single_deselect: true });
		
		jQuery('#estado-filter').change(function(){
			if(jQuery(this).val() != "") {
				
				jQuery.ajax({
					url: "<?php echo $ROOTPATH; ?>/ajax/filtro_pesquisa_publico.php",
					type: 'POST',
					data: { filtro: 'cidades', estado: jQuery('#estado-filter').val() },
					beforeSend: function() {
						jQuery('#cidade-filter').html('<option>Carregando...</option>');
					},
					success: function(r) {
						jQuery('#cidade-filter').html(r);
						jQuery('#cidade-filter').find('option:first-child').prop('selected', true).end().trigger('chosen:updated');
						
						jQuery('#cidade-filter').find('option:first-child').prop('selected', true).end().trigger('chosen:updated');
					}
				});
			}
		});	
  });
</script>
<style>
	.btn.btn-primary {
		background: #0d1668;
		border: 1px solid #0d1668;
		margin-bottom: 15px;
		margin-top: 15px;
		width: 100%;
		color: #FFF;
		font-weight: bold;
		text-transform: uppercase;
	}
	.col-md-6 {
		margin-bottom: 10px;
	}
	label {
		font-size: 14px;
		font-weight: bold;
	}
	.chosen-container-single .chosen-search input[type="text"] {
		width: 92% !important;
	}
	.listResales li {
		border: 0px !important;
	}
</style>
<?php
	
	if(isset($_POST['estado']) && !(empty($_POST['estado']))) {
		$estado = strip_tags($_POST['estado']);
		$condition .= " and uf = '" . $estado . "' ";
	}
	
	if(isset($_POST['cidade']) && !(empty($_POST['cidade']))) {
		$cidade = (int) strip_tags($_POST['cidade']);	
		$condition .= " and city_id = " . $cidade .  " ";
	}
	
	$sqlP = "select * from user u where (u.tipoanunciante = 'Revenda' or u.tipoanunciante = 'Concessionaria') and u.id in ( select t.partner_id from team t where t.partner_id = u.id and  begin_time < '".time()."' and end_time > '".time()."' and ( status is null or status = 1 ) and ( pago = 'sim' or anunciogratis = 's' ) " . $condition . " )  order by id DESC";
	$rsP = mysql_query($sqlP) or die (mysql_error());
?>
<div class="listResales">
	<div class="filter-search">
		<form method="POST">
			<div class="col-md-6">
				<label>
					Estado:
				</label>
				<select data-placeholder="Escolha o estado" name="estado" id="estado-filter" class="chosen-select">
					<option value="">Escolha seu estado</option>
					<option value="AC">Acre</option>
					<option value="AL">Alagoas</option>
					<option value="AP">Amapá</option>
					<option value="AM">Amazonas</option>
					<option value="BA">Bahia</option>
					<option value="CE">Ceará</option>
					<option value="DF">Distrito Federal</option>
					<option value="ES">Espírito Santo</option>
					<option value="GO">Goiás</option>
					<option value="MA">Maranhão</option>
					<option value="MT">Mato Grosso</option>
					<option value="MS">Mato Grosso do Sul</option>
					<option value="MG">Minas Gerais</option>
					<option value="PA">Pará</option>
					<option value="PB">Paraíba</option>
					<option value="PR">Paraná</option>
					<option value="PE">Pernambuco</option>
					<option value="PI">Piauí</option>
					<option value="RJ">Rio de Janeiro</option>
					<option value="RN">Rio Grande do Norte</option>
					<option value="RS">Rio Grande do Sul</option>
					<option value="RO">Rondônia</option>
					<option value="RR">Roraima</option>
					<option value="SC">Santa Catarina</option>
					<option value="SP">São Paulo</option>
					<option value="SE">Sergipe</option>
					<option value="TO">Tocantins</option>
				</select>
			</div>
			<div class="col-md-6">
				<label>
					Cidade:
				</label>
				<select data-placeholder="Escolha a cidade" name="cidade" id="cidade-filter" class="chosen-select">
					<option value="">Escolha sua cidade</option>
				</select>
			</div>
			<div class="col-md-6">
				<input type="submit" value="Buscar" class="btn btn-primary">
			</div>
		</form>	
	</div>
	<ul>
		<?php
			while($row = mysql_fetch_assoc($rsP)) {
			
			/* Imagem da revenda. */
			$logo = $row['imagem'];			
			$imageResale = !(empty($logo)) ? $INI['system']['wwwprefix'] . "/media/" . $logo : $INI['system']['wwwprefix'] . '/skin/padrao/images/no_image_resales.jpg';
			
			/* Endereço da revenda. */
			unset($endereco);
			
			if($row['address']!=""){
				$endereco .= $row['address'];
			}
			if($row['numero']!=""){
				$endereco .= ", " . $row['numero']. " ";
			}
			if($row['bairro']!=""){
				$endereco .= "- ".$row['bairro']. " ";	
			}
			if($row['cidadeusuario']!=""){
				$endereco .= ", ".$row['cidadeusuario']. " ";
			}
			if($row['cep']!="") {
				$endereco .= $row['cep']. " ";
			}
			
			if($row['homepage']!=""){
				$endereco .= "<a target='_blank' href=" . $row['homepage'] . ">" . $row['homepage'] . "</a>";
			}
			
			$endereco = empty($endereco) ? "" : $endereco;	

			/* Formas de contato da revenda. */
			$site = empty($row['site']) ? "" : $row['site'];
			
			$TelefoneTamanho = strlen($row['telefonefixo']);
			$CelularTamanho = strlen($row['celular']);
			$WhatsTamanho = strlen($row['nextel']);
			
			$telefone = $row['telefonefixo'];
			$celular = $row['celular'];
			$whats = $row['nextel'];
			$dddfixo = $row['ddd'];
			$ddd2_  = $row['ddd3'];
			$dddcel = $row['ddd2'];
			
			if($TelefoneTamanho == 8) {
				
				$parte_um = substr($telefone, 0 , 4);
				$separador = "-";
				$parte_dois = substr($telefone, 4, 8);
				
				$telefone = "(" . $dddfixo . ") " . $parte_um . $separador . $parte_dois;
			}
			else if($TelefoneTamanho == 9) {
			
				$parte_um = substr($telefone, 0 , 5);
				$separador = "-";
				$parte_dois = substr($telefone, 5, 8);
				
				$telefone = "(" . $dddfixo . ") " . $parte_um . $separador . $parte_dois;		
			}	
		?>
		<li>
			<p class="titleResales">
				<?php echo utf8_decode($row['realname']); ?> - <?php echo utf8_decode($row['estado']); ?>
			</p>
			<p class="imageResales">
				<img src="<?php echo $imageResale; ?>">
			</p>
			<p class="descriptionResales">
				Endereço: <?php echo utf8_decode($endereco); ?> <br />
				Telefone: <?php echo $telefone; ?> <br />
				<!-- Site: <a class="linkPage" target="_blank" href="<?php echo $site; ?>"><?php echo strtolower(utf8_decode($site));?></a> -->
                                Site: <?php echo strtolower(utf8_decode($site));?> <br />
				<a class="linkStock" href="<?php echo $ROOTPATH; ?>/?busca=true&idparceiro=<?php echo $row['id']; ?>">
					Ver estoque
				</a>
			</p>
		</li>
		<?php 
			}
		?>
	</ul>
</div>
<?php include template("manage_header");?> 

<?php require("ini.php");?> 

<script type="text/javascript" src="/media/js/tinymce_pt/jscripts/tiny_mce/tiny_mce.js"></script> 
<script type="text/javascript" src="/media/js/tinymce_pt/jscripts/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script> 
<script src="/media/js/include_tinymce.js" type="text/javascript"></script>  

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="leader">
	<div id="content" class="clear mainwide">
        <div class="clear box"> 
            <div class="box-content">
                <div class="sect">
				 <form id="login-user-form" method="post" action="/vipmin/category/editmodelos.php?id=<?php echo $category['id']; ?>"   class="validator">
				<input type="hidden" name="id" value="<?php echo $category['id']; ?>" />
				<input type="hidden" name="www" id="www"  value="<?=$INI['system']['wwwprefix']?>" /> 
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Informações do Modelo <?php echo $category['nome']; ?></h4></div>
							<div class="the-button">
								<input type="hidden" value="remote" id="deliverytype" name="deliverytype">
								<button onclick="doupdate();" id="run-button" class="input-btn" type="button">
									<div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div>
									<div id="spinner-text"  >Salvar</div>
								</button>
							</div> 
					</div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents"> 
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts"> 
								
									<?php if (!isset($row['nome']) || $row['nome'] == '') { ?>
									<div id="c_categoria">
										<div class="report-head">Tipo do Veículo: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
											<select  name="tipo" id="tipo" onchange="$('#select_car_tipo').text($('#tipo').find('option').filter(':selected').text());verifica_tipo(this.value)"> 
												<option value=""> </option>
												<option value="Carro" <?php if (isset($category['tipo']) && $category['tipo'] == 'Carro') echo "selected='selected'"; ?>>Carro</option>
												<option value="Moto" <?php if (isset($category['tipo']) && $category['tipo'] == 'Moto') echo "selected='selected'"; ?>>Moto</option>
												<!--<option value="Caminhão" <?php if (isset($category['tipo']) && $category['tipo'] == 'Caminhão') echo "selected='selected'"; ?>>Caminhão</option> -->
											</select>
											<div name="select_car_tipo" id="select_car_tipo" class="cjt-wrapped-select-skin">"Informe o tipo de veículo"</div>
											<div class="cjt-wrapped-select-icon"></div>
											</div> 
										</div> 
									</div>
									<? } ?>
								
									<!-- ESTADO DO BAIRRO -->
									<div class="report-head">Fabricante: </div>
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  name="fabricante" id="fabricante"> 
											<option value=''></option>											
										</select>
										<div name="select_fabricante" id="select_fabricante" class="cjt-wrapped-select-skin"><?php if (isset($tmp_fabricante)) echo $tmp_fabricante; else echo "Escolha um fabricante..."; ?></div>
										<div class="cjt-wrapped-select-icon"></div>
										</div>
									</div>
									<script>
									jQuery(document).ready(function() {
										jQuery('#fabricante').bind('change', function(ev) {
											jQuery('#select_fabricante').text(jQuery('#fabricante').find('option').filter(':selected').text());
										});
									});
								</script>
									<!-- ESTADO DO BAIRRO -->
									<div style="clear:both;"class="report-head">Modelo: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" name="nome"  maxlength="152" id="nome" class="format_input" value="<?php echo $category['nome'] ?>" /> 
									</div>
								</div>
								<!-- =============================   fim coluna esquerda   =====================================-->
								<!-- =============================   coluna direita   =====================================-->
								<div class="ends"> 	 			 
								
							 	</div>
								<!-- =============================  fim coluna direita  =====================================-->
							</div> 
						</div>
					</div>
				</div> 
				</form>
            </div> 
        </div>
	</div> 
</div>
</div> 
<script>
 

function validador(){

	limpacampos(); 

	if( jQuery("#name").val()==""){

		campoobg("name");
		alert("Por favor, informe o nome da <?php echo $tipo; ?>");
		jQuery("#name").focus();
		return false;
	} 
	return true;	
}
 

 if( jQuery("#id").val() ==""){
 
}
else{ 
	$('#select_idpai').text($('#idpai').find('option').filter(':selected').text());
}

</script>   



 <script>
jQuery(document).ready(function() {
	jQuery('#tipo').bind('change', function(ev) {
		buscaFiltros('fabricante2');
	});
	//buscaFiltros('fabricante');
});


	function buscaFiltros(filtro) {
		jQuery.ajax({
			url:  "<?php echo $ROOTPATH; ?>/ajax/filtro_pesquisa.php",
			type: "POST",
			data: {
				filtro: filtro,
				tipo: jQuery('#tipo').val(),
			},
			beforeSend: function() {
				if (filtro == 'fabricante2') {
					jQuery('#fabricante').html("<option>Carregando...</option>");
				}
			},
			success: function(r) {
				if (filtro == 'fabricante2')
					jQuery('#fabricante').html(r);
			}
		});
	}

</script>
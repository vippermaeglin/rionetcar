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
				 <form id="login-user-form" method="post" action="/vipmin/category/editfabricantes.php?id=<?php echo $category['id']; ?>" enctype="multipart/form-data" class="validator">
				<input type="hidden" name="id" value="<?php echo $category['id']; ?>" />
				<input type="hidden" name="www" id="www"  value="<?=$INI['system']['wwwprefix']?>" /> 
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Informações do Fabricante <?php echo $category['nome']; ?></h4></div>
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
									<div style="clear:both;"class="report-head">Fabricante: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" name="nome"  maxlength="152" id="nome" class="format_input" value="<?php echo $category['nome'] ?>" /> 
									</div>
									
									<div id="c_categoria">
										<div class="report-head">Tipo do Veículo: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
											<select  name="tipo" id="tipo" onchange="$('#select_tipo').text($('#tipo').find('option').filter(':selected').text());verifica_tipo(this.value)"> 
												<option value=""> </option>
												<option value="Carro" <?php if (isset($category['tipo']) && $category['tipo'] == 'Carro') echo "selected='selected'"; ?>>Carro</option>
												<option value="Moto" <?php if (isset($category['tipo']) && $category['tipo'] == 'Moto') echo "selected='selected'"; ?>>Moto</option>
												<!--<option value="Caminhão" <?php if (isset($category['tipo']) && $category['tipo'] == 'Caminhão') echo "selected='selected'"; ?>>Caminhão</option> -->
											</select>
											<div name="select_tipo" id="select_tipo" class="cjt-wrapped-select-skin"><?php if ($category['tipo'] != '') echo $category['tipo']; else echo "Informe o tipo de veículo"; ?></div>
											<div class="cjt-wrapped-select-icon"></div>
											</div> 
										</div> 
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
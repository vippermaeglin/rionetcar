<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="leader">
	<div id="content" class="clear mainwide">
        <div class="clear box"> 
            <div class="box-content">
                <div class="sect">
					<form id="login-user-form" method="post" action="/vipmin/magazine/edit-category.php?id=<?php echo $magazine_category['id']; ?>" enctype="multipart/form-data" class="validator">
					<?php if(!empty($magazine_category['id'])){ ?>
						<input type="hidden" name="id" value="<?php echo $magazine_category['id']; ?>" />
					<?php } ?>
					<div class="option_box">
						<div class="top-heading group">
							<div class="left_float"><h4>Informações básicas da categoria para revista</h4></div>
								<div class="the-button">
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
										<div style="clear:both;"class="report-head">Nome<span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" maxlength="50" name="name" id="name" class="format_input" value="<?php echo $magazine_category['name'] ?>" /> 
										</div>
										<div class="group">
											<div class="report-head" style="clear:both;margin-top:20px;">Status<span class="cpanel-date-hint"></span></div>
											<input type="radio" name="status" value="Y" <?php if($magazine_category['status'] === 'Y' || empty($magazine_category['status'])) { echo "checked='checked'"; } ?> style="width:20px;"> Ativo  &nbsp;   
											<input type="radio" value="N" name="status" <?php if($magazine_category['status'] === 'N') { echo "checked='checked'"; } ?> style="width:20px;"> Desativado  &nbsp;  
										</div>									
									</div>
									<!-- =============================   fim coluna esquerda   =====================================-->
									<!-- =============================   coluna direita   =====================================-->
									<div class="ends">	
										<div style="clear:both;"class="report-head">Ordem de exibição<span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" maxlength="50" name="ordination" id="ordination" class="format_input" value="<?php echo $magazine_category['ordination'] ?>" /> 
										</div>										
									 </div>
									<!-- =============================  fim coluna direita  =====================================-->
								</div> 
							</div>
						</div> 				
				</form>
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
		alert("Por favor, informe o nome da categoria!");
		jQuery("#name").focus();
		return false;
	} 	
	if( jQuery("#ordination").val()==""){

		campoobg("ordination");
		alert("Por favor, informe a ordem de apresentação!");
		jQuery("#ordination").focus();
		return false;
	}
	return true;	
}

</script>   
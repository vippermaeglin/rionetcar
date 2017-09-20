<?php include template("manage_header");?>

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
					<form id="manage-magazine-article" method="post" action="/vipmin/magazine/edit-article.php?id=<?php echo $magazine_article['id']; ?>" enctype="multipart/form-data" class="validator">
					<?php if(!empty($magazine_article['id'])){ ?>
						<input type="hidden" name="id" value="<?php echo $magazine_article['id']; ?>" />
					<?php } ?>
					<div class="option_box">
						<div class="top-heading group">
							<div class="left_float"><h4>Informações básicas do artigo</h4></div>
								<div class="the-button">
									<button onclick="jQuery(this).destaque();" id="run-button" class="input-btn" type="button">
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
										<div style="clear:both;"class="report-head">Título<span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" maxlength="50" name="title" id="title" class="format_input" value="<?php echo $magazine_article['title'] ?>" /> 
										</div>
										<div style="clear:both;"class="report-head">Subtítulo<span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" maxlength="50" name="subtitle" id="subtitle" class="format_input" value="<?php echo $magazine_article['subtitle'] ?>" /> 
										</div>
										<div style="clear:both;"class="report-head">Resumo - Máximo 100 caracteres<span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" maxlength="100" name="resume" id="resume" class="format_input" value="<?php echo $magazine_article['resume'] ?>" /> 
										</div>
										<div style="clear:both;"class="report-head">Categoria<span class="cpanel-date-hint"></span></div>
										<div id="type-select-cjt-wrapped-select" class="cjt-wrapped-select">
											<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
												<select  name="id_category" id="id_category" onchange="$('#select_id_category').text($('#id_category').find('option').filter(':selected').text())" name="id_category"> 
													<option value=""></option>
													<?php echo Utility::Option($magazine_category); ?>
												</select> 
												<div name="select_id_category" id="select_id_category" class="cjt-wrapped-select-skin">Escolha uma categoria</div>
												<div class="cjt-wrapped-select-icon"></div>
											</div>
										</div>										
									</div>
									<!-- =============================   fim coluna esquerda   =====================================-->
									<!-- =============================   coluna direita   =====================================-->
									<div class="ends">	
										<div class="report-head" style="clear:both;">Foto 1 - Capa  <span class="cpanel-date-hint"> <!-- <a target="_blank" href="http://central-pc/autocar/media/css/i/fotoexemplo.jpg">baixar</a> imagem exemplo --> </span>  
										</div>
										<div class="group">
											<input type="file" value="" class="format_input" id="image_cover" name="image_cover" style="border: 1px solid #C1D0D3; color: #666666; width: 100%;">  									 
											<span class="cpanel-date-hint" style="clear:both;"><?php if(!empty($magazine_article['image_cover'])) { echo $ROOTPATH . "/media/" . $magazine_article['image_cover']; } ?></span>
										</div> 
										<div class="report-head" style="clear:both;">Foto 2 - Artigo <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<input type="file" value="" class="format_input" id="image_article" name="image_article" style="border: 1px solid #C1D0D3; color: #666666; width: 100%;"> 
												<span class="cpanel-date-hint" style="clear:both;"><?php if(!empty($magazine_article['image_article'])) { echo $ROOTPATH . "/media/" . $magazine_article['image_article']; } ?>										
											</div> 
										<div class="report-head" style="clear:both;">Destaque: <span class="cpanel-date-hint"></span></div>
											<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
												<select  name="featured" id="featured" onchange="$('#select_featured').text($('#featured').find('option').filter(':selected').text())"> 
													<option value=""></option>
													<option value="a1" <?php if($magazine_article['featured'] == 'a1'){ echo "selected='true'"; } ?>>Destaque a1</option>
													<option value="a2" <?php if($magazine_article['featured'] == 'a2'){ echo "selected='true'"; } ?>>Destaque a2</option>
													<option value="a3" <?php if($magazine_article['featured'] == 'a3'){ echo "selected='true'"; } ?> >Destaque a3</option>
													<option value="b1" <?php if($magazine_article['featured'] == 'b1'){ echo "selected='true'"; } ?>>Destaque b1</option>
													<option value="b2" <?php if($magazine_article['featured'] == 'b2'){ echo "selected='true'"; } ?>>Destaque b2</option>
													<option value="b3" <?php if($magazine_article['featured'] == 'b3'){ echo "selected='true'"; } ?>>Destaque b3</option>
													<option value="none" <?php if($magazine_article['featured'] == 'none'){ echo "selected='true'"; } ?>>Este artigo não é um destaque</option>
												</select> 
												<div name="select_featured" id="select_featured" class="cjt-wrapped-select-skin"><?php if(!empty($magazine_article['featured'])){ echo "Destaque " . $magazine_article['featured']; }else{ echo "Escolha uma posição para o artigo!"; } ?></div>
												<div class="cjt-wrapped-select-icon"></div>
											</div>
											<div style="float:left; width:100%;">
												<div class="report-head">Status  <span class="astobrig">*</span>  <span class="cpanel-date-hint"></span></div>
													<input type="radio" name="status" id="status" value="Y" style="width:20px;" <?php if($magazine_article['status'] === 'Y' || empty($magazine_article['status'])){ echo "checked='true'"; } ?>> Ativado       
													<input type="radio" name="status" id="status" value="N" style="width:20px;" <?php if($magazine_article['status'] === 'N'){ echo "checked='true'"; } ?>> Desativado     
										</div>										
									 </div>
									<!-- =============================  fim coluna direita  =====================================-->
								</div> 
							</div>
						</div> 
					
			<!-- ********************************************* ABA  conteúdo  --> 
				<div class="option_box">
					<div class="top-heading group"> <div class="left_float"><h4>Dica do artigo</h4> </div>  </div>					 
					<div id="container_box">
						<div class="form-contain group"> 
							<div class="text_area">  
								<textarea class="format_input" id="tip_article" name="tip_article" style="width:100%; height:200px;" maxlength="400"><?php echo $magazine_article['tip_article']; ?></textarea>
							</div> 
						</div>
					</div>
				</div> 	
				
				<div class="option_box">
					<div class="top-heading group"> <div class="left_float"><h4>Conteúdo do artigo</h4> </div>  </div>					 
					<div id="container_box">
						<div class="form-contain group"> 
							<div class="text_area">  
								<textarea class="format_input" id="content_article" name="content_article" style="width:100%; height:500px;"><?php echo $magazine_article['content_article']; ?></textarea>
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
</div> 

<script>  

<?php if(!empty($_GET['id'])) { ?>
	jQuery('#id_category').find('option[value="<?php echo $magazine_article['id_category']?>"]').attr('selected', true);
	jQuery('#select_id_category').text("<?php echo $name_category['name']; ?>");
<?php } ?>

jQuery('document').ready(function(){
	
	var name; 
	
	jQuery('#run-button').click(function(event){
		name = jQuery('#featured').attr('value');
		jQuery(this).destaque(name, event);
	});
	
	jQuery('#featured').change(function(event){		
		name = jQuery(this).attr('value');
		jQuery(this).destaque(name, event);
	});
	
	jQuery.fn.destaque = function(name, event){
		if(name != 'none' || name == ""){
			$.ajax({
				url:"<?=$INI['system']['wwwprefix']?>/ajax/manage.php",
				type: 'post',
				data: "name="  + name + "&action=verifica_destaque",
				success: function(retorno) {
					if(jQuery.trim(retorno) >=  1){
						window.alert("Já existe um artigo nesta posição!");
						jQuery('#manage-magazine-article').submit(function(){
							return false;
						});
					}else{
						doupdate();
					}				
				},
			});
		}	
	}
});

function validador(){

	if(jQuery("#title").val()==""){

		campoobg("title");
		alert("Por favor, informe o título do artigo!");
		jQuery("#title").focus();
		return false;
	} 	
	if(jQuery("#subtitle").val()==""){

		campoobg("subtitle");
		alert("Por favor, informe o subtítulo do artigo!");
		jQuery("#subtitle").focus();
		return false;
	}
	if(jQuery("#resume").val()==""){

		campoobg("resume");
		alert("Por favor, informe o resumo do artigo!");
		jQuery("#resume").focus();
		return false;
	}
	if(jQuery("#id_category").val()==""){

		campoobg("id_category");
		alert("Por favor, informe a categoria do artigo!");
		jQuery("#id_category").focus();
		return false;
	} 
	if(jQuery("#featured").val()==""){
			campoobg("featured");
			alert("Por favor, informe se é uma categoria destaque!");
			jQuery("#featured").focus();
			return false;
	}	
	return true;	
}

</script>   
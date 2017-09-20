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
				<form id="login-user-form" method="post" action="/vipmin/system/faqadd.php?id=<?php echo $n['id']; ?>" enctype="multipart/form-data" class="validator">
				<input type="hidden" name="id" value="<?php echo $n['id']; ?>" />  
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>FAQ - Perguntas e Respostas - Fale conosco</h4></div>
							<div class="the-button">
								<input type="hidden" value="remote" id="deliverytype" name="deliverytype">
								<button onclick="jQuery('#login-user-form').submit();" id="run-button" class="input-btn" type="button">
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
									<div class="report-head">Pergunta: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" id="pergunta" name="pergunta"  maxlength="152" value="<?php echo  $n['pergunta'] ; ?>"> &nbsp; 
									</div> 
									<div class="option_box">
										<div class="top-heading group"> <div class="left_float"><h4>Resposta</h4> </div> &nbsp;<img class="tTip" title="Se você estiver copiando este texto de uma página da internet ou um documento word, primeiro cole no bloco de notas do windows e depois copie do bloco de notas e cole aqui no editor para não haver erros de formtação." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </div> 
										 
										<div id="container_box">
											<div id="option_contents" class="option_contents">  
												<div class="form-contain group"> 
													<div class="text_area">  
													<textarea cols="45" rows="5" name="resposta" style="width:100%" id="resposta" class="format_input" ><?php echo htmlspecialchars($n['resposta']); ?></textarea>
													</div> 
												</div> 
											</div> 
										</div>
									</div>	
									
									   
								</div>
								<!-- =============================   fim coluna esquerda   =====================================-->
								<!-- =============================   coluna direita   =====================================-->
								<div class="ends"> 	 			 
								 
									<div class="report-head">Ordenaçãoda pergunta <span class="cpanel-date-hint">Os maiores serão os primeiros</span></div>
									<div class="group">
										<input type="text" id="ordem"  onKeyPress="return SomenteNumero(event);"  name="ordem" value="<?php echo  $n['ordem'] ; ?>"> &nbsp; 
									</div>  
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
</div> 
<script>
 
	 	
if( jQuery("#id").val() ==""){
	//$('#buyonce').val('N'); 
	//$('#select_buyonce').text("É possível comprar mais de uma oferta ou promoção")	
 
}
else{ 
	$('#select_estado').text($('#estado').find('option').filter(':selected').text());
	 
}
  
function validador(){
	
	limpacampos(); 
 
  	if( jQuery("#contact").val()==""){

		campoobg("contact");
		alert("Por favor, informe o email do parceiro.");
		jQuery("#contact").focus();
		return false;
	}	
	if( jQuery("#title").val()==""){

		campoobg("title");
		alert("Por favor, informe o nome do parceiro.");
		jQuery("#title").focus();
		return false;
	}
  
	return true;	
}
 
  jQuery(document).ready(function(){ 
    
   //jQuery("#phone").mask("(99)9999-9999"); 
  // jQuery("#mobile").mask("(99)9999-9999");  
   jQuery("#cep").mask("99999999");
});

</script>   
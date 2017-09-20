<?php include template("manage_header");?>

<script type="text/javascript" src="/media/js/tinymce_pt/jscripts/tiny_mce/tiny_mce.js"></script> 
<script type="text/javascript" src="/media/js/tinymce_pt/jscripts/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script> 
<script src="/media/js/include_tinymce.js" type="text/javascript"></script> 

<style>
 
h3 {
    color: #18435f;
    font-family: Helvetica,Arial,sans-serif;
    font-size: 18px;
    font-weight: 600;
    margin: 0 !important;
    padding: 5px;
}

</style>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="system"> 
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
				<div class="option_box">
					<div class="top-heading group"> <div class="left_float"><h4>Gerenciar Banners e Avisos</h4></div> 
						<div class="the-button" style="width:108px;">  
								<div style="float:left;"><button onclick="doupdate();" id="run-button" class="input-btn" type="button"><div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Salvar</div></button></div>
						</div> 	
					</div>  
							 
					<div class="sect">
						<form id="login-user-form" method="post" action="/vipmin/system/bulletin.php">
							<input type="hidden" name="id" value="<?php echo $system['id']; ?>" /> 
							 				
							<div  > <div class="left_float"><h3>Banner lateral home (160px de largura x 160 altura). Recomendamos que se utilize duas imagens.</h3></div> </div>  
							<div class="field" style="width:99%">
								<textarea   style="width:100%;height:450px;" class="editor" name="bulletin[0]"><?php echo htmlspecialchars($INI['bulletin'][0]); ?></textarea> 
							</div>
							
						 	<div  > <div class="left_float"><h3>Banner lateral detalhe do an&uacutencio  (303px de largura x altura livre)</h3></div> </div>  
							<div class="field" style="width:99%">
								<textarea   style="width:100%;height:450px;" class="editor" name="bulletin[detalheanuncio]"><?php echo htmlspecialchars($INI['bulletin']['detalheanuncio']); ?></textarea> 
							</div>			
							 
						<!-- php if(is_array($hotcities)){foreach($hotcities AS $one) { ?>
							<div class="top-heading group"> <div class="left_float"><h4><?= "Banner da cidade de ".$one['name'] ?></h4></div> </div> 
							<div class="report-head">lateral - Tamanho ideal 215px de largura por 231px de altura </div>
							<div class="field" style="width:99%">
								<textarea   style="width:100%;height:450px;" class="editor" name="bulletin[<?php echo $one['id']; ?>]"><?php echo htmlspecialchars($INI['bulletin'][$one['id']]); ?></textarea> 
							</div>
							  
						}}-->
						 
						</form>
					</div>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>

<div id="sidebar">
</div> 
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<script>
function validador(){
	return true;
}
 	
</script>

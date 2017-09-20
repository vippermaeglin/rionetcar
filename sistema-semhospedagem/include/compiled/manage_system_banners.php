<?php include template("manage_header");?>
<?php require("ini.php");?> 
 
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="leader">
	<div id="content" class="clear mainwide">
        <div class="clear box"> 
            <div class="box-content">
                <div class="sect">
				<form id="nform" id="nform"  method="post" action="/vipmin/system/banners.php" enctype="multipart/form-data" class="validator">
				<input type="hidden" id="id" name="id" value="<?php echo $team['id']; ?>" /> 
				<div class="option_box">
				 <div class="top-heading group">
					<div class="left_float"><h4>Slideshow de Banners - Resolução sugerida: 643px x 75px ( jpg, png, gif )</h4></div>
						<div class="the-button">
							<input type="hidden" value="remote" id="deliverytype" name="deliverytype">
							<button onclick="doupdate();" id="run-button" class="input-btn" type="button">
								<div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div>
								<div id="spinner-text"  >Salvar</div>
							</button>
						</div> 
					</div>  
				</div> 
				  
				<div id="container_box">
					<div id="option_contents" class="option_contents"> 
						<div class="form-contain group">
							<div class="starts">
								<div style=" width:100%; margin-top: 15px;margin-bottom:11px;">
								   <span class="report-label">Ativar slideshow de banners:</span>  
									<input style="width:20px;" type="radio" <? if($INI['slideshowbanners']['ativo']=="Y"){ echo 'checked="checked"';} ?> value="Y" name="slideshowbanners[ativo]"> Sim  &nbsp;<img class="tTip" title="Ativando o slideshow de banners, o banner tradicional será omitido e dará lugar aos banners do slide. Caso queira, você também pode colocar as imagens manualmente no diretório media/slideshowbanners" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									<input style="width:20px;" type="radio" <? if($INI['slideshowbanners']['ativo']=="N"){ echo 'checked="checked"';} ?>  value="N" name="slideshowbanners[ativo]"> Não  &nbsp;<img style="cursor:help" class="tTip" title="Se não estiver ativo, a imagem do banner será a tradicional. Você pode alterar o background tradicional no menu Sistema -> banners e avisos" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
								 </div>  
							</div> 
						</div> 
					</div> 
					<div class="top-heading group"> <div class="left_float"> </div> </div> 
					 <div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group"> 
								<div class="text_area">  
									<iframe frameborder="0" style="width:100%;height:200px;" scrolling="auto" src="<?=$ROOTPATH?>/util/swfupload/app/index.php?tipo=slideshowbanners"></iframe>
								</div> 
							</div> 
						</div> 
					</div>
				</div>
				<div  class="option_box">  
						<div class="top-heading group"> <div class="left_float"><h4>Imagens enviadas. Informe o link das imagens após o envio.</h4> </div> </div> 
						 <div id="container_box">
							<div id="option_contents" class="option_contents">  
								<div class="form-contain group"> 
									<div class="text_area">  
									<? require_once(WWW_ROOT."/vipmin/galeriabanners.php");?>
									</div> 
									 
								</div>  
							</div> 
						</div> 
				</div>
				<div class="option_box"> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">
							<div class="the-button">
								<input type="hidden" value="remote" id="deliverytype" name="deliverytype">
								<button onclick="doupdate();" id="run-button" class="input-btn" type="button">
									<div id="spinner" style="width: 83px; display: block;"> <img name="imgrec2" id="imgrec2" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div>
									<div id="spinner-text2">Salvar</div>
								</button>
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
	function validador(){
		return true;
	}
</script>

</script>   
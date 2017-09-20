<?php include template("manage_header");?>
<?php require("ini.php");?> 
 
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="leader">
	<div id="content" class="clear mainwide">
        <div class="clear box"> 
            <div class="box-content">
                <div class="sect">
				<form id="nform" id="nform"  method="post" action="/vipmin/system/slide.php" enctype="multipart/form-data" class="validator">
				<input type="hidden" id="id" name="id" value="<?php echo $team['id']; ?>" /> 
				<div class="option_box">
				 <div class="top-heading group">
					<div class="left_float"><h4>Super Background - Resolução sugerida: 1980px x 1200px ( jpg, png, gif )</h4></div>
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
								   <span class="report-label">Ativar Super Background:</span>  
									<input style="width:20px;" type="radio" <?=$superslide_sim?> value="Y" name="background[background]"> Sim  &nbsp;<img class="tTip" title="Ativando o super background, o background tradicional será omitido e dará lugar as imagens do superslide. Caso queira, você também pode colocar as imagens manualmente no diretório media/background" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									<input style="width:20px;" type="radio" <?=$superslide_nao?>  value="N" name="background[background]"> Não  &nbsp;<img style="cursor:help" class="tTip" title="Se não estiver ativo, a imagem de background será a tradicional. Você pode alterar o background tradicional no menu Layout -> Alterar Background" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
								 </div> 
								<div style="clear:both;"class="report-head">Intervalo da transição: <span class="cpanel-date-hint">Em seguntos Ex: 10 - Mínimo 3.</span></div>
								<div class="group">
									<input type="text" name="background[intervalo]"  maxlength="10" id="title" class="format_input" value="<?php echo htmlspecialchars($INI['background']['intervalo']); ?>" />  <img style="cursor:help" class="tTip" title="Intervalo de tempo de cada imagem. Ex: 10 segundos. Note que a velocidade mínima deverá ser 3 segundos devido a velocidade de transição." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
								</div> 
								<div style="clear:both;" class="report-head">Velocidade da transição: <span class="cpanel-date-hint">Em seguntos Ex: 5 - Máximo 9</span></div>
								<div class="group">
									<input type="text" name="background[velocidade]"  maxlength="1" id="title" class="format_input" value="<?php echo htmlspecialchars($INI['background']['velocidade']); ?>" />  <img style="cursor:help" class="tTip" title="Velocidade de transição na sobreposição de 2 imagens. Ex: 5 segundos" src="<?=$ROOTPATH?>/media/css/i/info.png"> 
								</div> 
							</div> 
						</div> 
					</div> 
					<div class="top-heading group"> <div class="left_float"> </div> </div> 
					 <div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group"> 
								<div class="text_area">  
									<iframe frameborder="0" style="width:100%;height:200px;" scrolling="auto" src="<?=$ROOTPATH?>/util/swfupload/app/index.php?tipo=galeria&idoferta=<?=$team['id']?>"></iframe>
								</div> 
							</div> 
						</div> 
					</div>
				</div>
				<div  class="option_box">  
						<div class="top-heading group"> <div class="left_float"><h4>Imagens enviadas. Estas imagens irão formar o super slide background</h4> </div> </div> 
						 <div id="container_box">
							<div id="option_contents" class="option_contents">  
								<div class="form-contain group"> 
									<div class="text_area">  
									<? require_once(WWW_ROOT."/vipmin/galeria.php");?>
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
<?php include template("manage_header");  ?>

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
				<form id="nform" id="nform"  method="post" action="/vipmin/order/hitoricoedit.php" enctype="multipart/form-data" class="validator">
				<input type="hidden" id="id" name="id" value="<?= $_REQUEST['id']; ?>" /> 
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Edição da Aquisição do Plano. Código de Aquisição: <?=$user_planos['id']?></h4></div>
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
									<div class="report-head">Qtde de Anúncios: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type='text' maxlength="15" onKeyPress="return SomenteNumero(event);"  name='qtdeanuncio' id='qtdeanuncio' value='<?=$user_planos['qtdeanuncio']?>' />
											<img class="tTip" title="É a quantidade de anúncios que o usuário pode cadastrar." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										</div>  
										<div class="report-head">Valor Pago: <span class="cpanel-date-hint">Altere se desejar</span></div>
										<div class="group">
											<input type='text' maxlength="15" onKeyPress="return SomenteNumero(event);"  name='valor' id='valor' value='<?=$user_planos['valor']?>' />
											<img class="tTip" title="Apenas para fins de controle financeiro. Não irá afetar o valor do plano atual" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										</div>   
								</div>
								<!-- =============================   fim coluna esquerda   =====================================-->
								<!-- =============================   coluna direita   =====================================-->
								<div class="ends"> 
								 <div class="report-head">Status <span class="cpanel-date-hint"></span></div>
								 	  <input style="width:20px;" type="radio" <? if($user_planos['status']=="aprovado"){ echo "checked=checked"; }?> value="aprovado" name="status"> Aprovado       
										<input style="width:20px;" type="radio" <? if($user_planos['status']=="Pendente"){ echo "checked=checked"; }?> value="" name="status"> Pendente    
									 
									   <div></div> 
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
$('#valor').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});

function validador(){
		return true;
}
</script>   
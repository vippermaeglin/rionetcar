<?php include template("manage_header"); 
	?>

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
				<form id="nform" id="nform"  method="post" action="/vipmin/order/edit-upgrades.php" enctype="multipart/form-data" class="validator">
				<input type="hidden" id="id" name="id" value="<?=$planos_upgrade['id']; ?>" />
				<input type="hidden" name="guarantee" value="Y" />
				<input type="hidden" name="system" value="Y" /> 
				<input type="hidden" name="www" id="www"  value="<?=$INI['system']['wwwprefix']?>" /> 
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Informações dos Planos de Upgrade #<?=$planos_upgrade['id']?></h4></div>
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
										<div class="report-head">Ativo <span class="cpanel-date-hint"></span></div>
								 	 
										<input style="width:20px;" type="radio" <? if($planos_upgrade['status']=="1"){ echo "checked=checked"; }?> value="1" name="status"> Sim       
										<input style="width:20px;" type="radio" <? if($planos_upgrade['status']=="0"){ echo "checked=checked"; }?> value="0" name="status"> Não    
									   
									<div class="report-head">Nome: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type='text' maxlength="50" name='nome' id='nome' value='<?=$planos_upgrade['nome']?>' />
										<img class="tTip" title="Nome do plano que será exibido ao cliente." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>									 
								</div>
								<!-- =============================   fim coluna esquerda   =====================================-->
								<!-- =============================   coluna direita   =====================================-->
								<div class="ends">
								
									<div class="report-head">Descrição: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type='text' maxlength="200" name='descricao' id='descricao' value='<?=$planos_upgrade['descricao']?>' />
										<img class="tTip" title="Descrição do plano. As informações e funcionalidades do plano." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>	
									 
									<div class="report-head">Preço: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type='text' onKeyPress="return SomenteNumero(event);" maxlength="9" name='preco' id='preco' value='<?=$planos_upgrade['preco']?>' datatype="money" require="true" />
										<img class="tTip" title="O preço do plano. Note que este valor é adicional ao valor do plano escolhido anteriormente." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
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

$('#preco').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});

function validador(){
		return true;
}

function verificaperiodo(a){
	 
	    atevender  = $("input[name='atevender']:checked").val();
		if(atevender=='S'){
		   jQuery("#dias").val(60);
		   jQuery("#diaspublica").hide();
		  
		}
		else{
			jQuery("#diaspublica").show();
		   jQuery("#dias").val("");
		}
}
verificaperiodo();
</script>   
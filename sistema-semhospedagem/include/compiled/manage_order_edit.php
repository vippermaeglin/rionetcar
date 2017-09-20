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
				<form id="nform" id="nform"  method="post" action="/vipmin/order/edit.php" enctype="multipart/form-data" class="validator">
				<input type="hidden" id="id" name="id" value="<?=$planos_publicacao['id']; ?>" />
				<input type="hidden" name="guarantee" value="Y" />
				<input type="hidden" name="system" value="Y" /> 
				<input type="hidden" name="www" id="www"  value="<?=$INI['system']['wwwprefix']?>" /> 
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Informações do Plano <?=$planos_publicacao['id']?></h4></div>
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
								 	 
										<input style="width:20px;" type="radio" <? if($planos_publicacao['ativo']=="s"){ echo "checked=checked"; }?> value="s" name="ativo"> Sim       
										<input style="width:20px;" type="radio" <? if($planos_publicacao['ativo']=="n"){ echo "checked=checked"; }?> value="n" name="ativo"> Não    
									   
									<div class="report-head">Nome do Plano: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type='text' maxlength="15" name='nome' id='nome' value='<?=$planos_publicacao['nome']?>' />
										<img class="tTip" title="Note que este título deve ser pequeno o suficiente para caber dentro do box de planos" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>
									 
									<div class="report-head">Qtde de Anúncios: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type='text' maxlength="15" onKeyPress="return SomenteNumero(event);"  name='qtdeanuncio' id='qtdeanuncio' value='<?=$planos_publicacao['qtdeanuncio']?>' />
										<img class="tTip" title="É quantidade de anúncios que o cliente poderá fazer pagando este plano" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div> 
							   
									<div class="report-head">Vídeo no anúncio: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head"> </span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio"  <? if($planos_publicacao['temvideo'] =="VIDEO"   ){echo "checked='checked'";}?>  value="VIDEO" name="temvideo"> Sim  	<img class="tTip" title="O campo de upload de vídeo irá aparecer no cadastro do anúncio para clientes deste plano" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										
											<input style="width:20px;" type="radio" <? if($planos_publicacao['temvideo']!="VIDEO" or $planos_publicacao['temvideo']=="" ){echo "checked='checked'";}?>  value="" name="temvideo" > Não
											</div>
									</div>
									 
									<div class="report-head">Valor do Plano: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type='text' maxlength="25" name='valor' id='valor' value='<?=$planos_publicacao['valor']?>' />
									 </div> 
									 
								
									<div class="report-head" style="margin-top:2%;">Informe o tipo de plano: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head"> </span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio"  <? if($planos_publicacao['type_plan'] == "Particular" or $planos_publicacao['type_plan'] == ""){echo "checked='checked'";}?>  value="Particular" name="type_plan"> Particular  	<img class="tTip" title="Ao selecionar essa opção, este plano será visível apenas para usuários do tipo particular." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										
											<input style="width:20px;" type="radio" <? if($planos_publicacao['type_plan'] == "Revenda"){echo "checked='checked'";}?>  value="Revenda" name="type_plan" > Revenda
											</div>
										</div>
									 
								</div>
								<!-- =============================   fim coluna esquerda   =====================================-->
								<!-- =============================   coluna direita   =====================================-->
								<div class="ends">
								
									<div class="report-head">Anúncios do plano em destaque: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head"> </span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio"  <? if($planos_publicacao['ehdestaque'] =="DESTAQUE"   ){echo "checked='checked'";}?>  value="DESTAQUE" name="ehdestaque"> Sim  	<img class="tTip" title="Ao selecionar essa opção, os anúncios que estão neste plano serão os primeiros a aparecer nos filtros de busca e pesquisa." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <? if($planos_publicacao['ehdestaque']!="DESTAQUE" or $planos_publicacao['ehdestaque']=="" ){echo "checked='checked'";}?>  value="" name="ehdestaque" > Não
											</div>
										</div>			

									     <div class="report-head">Quantidade de anúncios destaque <span class="cpanel-date-hint"> </span></div> 
											<div class="group">
												<input maxlength="3" type="text" value="<?php echo $planos_publicacao['qtd_anuncios_destaque'] ?>" name="qtd_anuncios_destaque" id="qtd_anuncios_destaque" onKeyPress="return SomenteNumero(event);"> &nbsp;<img class="tTip" title="Informe um valor númerico diferente de 0." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											</div>
											

										<div class="report-head" style="clear:both;">Quantidade de anúncios da vitrine:  <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
												<select name="qtd_vitrine" id="qtd_vitrine" onchange="$('#select_qtd_vitrine').text($('#qtd_vitrine').find('option').filter(':selected').text())"> 
													<option value="0" <?php if($planos_publicacao['qtd_vitrine'] == 0) { ?> selected="selected" <?php } ?>>0</option>
													<option value="1" <?php if($planos_publicacao['qtd_vitrine'] == 1) { ?> selected="selected" <?php } ?>>1</option>
													<option value="2" <?php if($planos_publicacao['qtd_vitrine'] == 2) { ?> selected="selected" <?php } ?>>2</option>
													<option value="3" <?php if($planos_publicacao['qtd_vitrine'] == 3) { ?> selected="selected" <?php } ?>>3</option>
													<option value="5" <?php if($planos_publicacao['qtd_vitrine'] == 4) { ?> selected="selected" <?php } ?>>5</option>
													<option value="7" <?php if($planos_publicacao['qtd_vitrine'] == 7) { ?> selected="selected" <?php } ?>>7</option>
													<option value="10" <?php if($planos_publicacao['qtd_vitrine'] == 10) { ?> selected="selected" <?php } ?>>10</option>
												</select>
												<div name="select_qtd_vitrine" id="select_qtd_vitrine" class="cjt-wrapped-select-skin"><?php echo $planos_publicacao['qtd_vitrine'];  ?></div>
												<div class="cjt-wrapped-select-icon"></div>
											</div>
										</div>
																		
									 
									<div class="report-head">Anúncios até vender: <span class="cpanel-date-hint">Republicação a cada 60 dias</span></div>
										<div class="group">
											<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head"> </span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio"  <? if($planos_publicacao['atevender'] =="S"   ){echo "checked='checked'";}?>  value="S" name="atevender" onclick="verificaperiodo('S');"> Sim  	<img class="tTip" title="Mesmo sendo um plano até vender, será necessário o cliente entrar na sua conta para republicar o anúncio gratuitamente a cada 60 dias." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										
											<input style="width:20px;" type="radio" <? if(  $planos_publicacao['atevender']=="" ){echo "checked='checked'";}?>  value="" name="atevender" onclick="verificaperiodo('N');"> Não
											</div>
										</div>
										
									<DIV id="diaspublica">
										<div class="report-head">Dias de Publicação: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type='text' onKeyPress="return SomenteNumero(event);"  maxlength="15" name='dias' id='dias' value='<?=$planos_publicacao['dias']?>' />
											<img class="tTip" title="É quantidade de dias que o anúncio do internauta ficará online no site. Para anúncios até vender, informe uma sequencia de sete 9 ex: 9999999" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										</div> 
									</div> 
									 
									<div class="report-head">Texto do Plano: : <span class="cpanel-date-hint">Se precisar, insira códigos HTML </span></div>
									<div class="group">
										<input type='text'  name='texto' id='texto' value='<?=$planos_publicacao['texto']?>' />
										<img class="tTip" title="Este texto irá aparecer para o usuário no momento da escolha dos planos. Note que este texto deve ser pequeno o suficiente para caber dentro do box de planos." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
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
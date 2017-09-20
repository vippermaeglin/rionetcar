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
				<form id="nform" id="nform"  method="post" action="/vipmin/order/create.php" enctype="multipart/form-data" class="validator">
				<input type="hidden" id="id" name="id" value="<?php echo $team['id']; ?>" />
				<input type="hidden" name="guarantee" value="Y" />
				<input type="hidden" name="system" value="Y" /> 
				<input type="hidden" name="www" id="www"  value="<?=$INI['system']['wwwprefix']?>" /> 
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Informações do Pedido <?=$team['id']?></h4></div>
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
									<div class="report-head">Cliente: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  name="user_id" id="user_id" onchange="$('#select_user_id').text($('#user_id').find('option').filter(':selected').text())"> 
											<option value=""> </option>
											<?php 
												$sql = "SELECT id, realname FROM user";
												$rs = mysql_query($sql);
												while($l = mysql_fetch_assoc($rs)){
													echo "<option value='$l[id]'>".displaySubStringWithStrip($l[realname],40)."</option>";
												}
												$tb = null; 
											?>
										</select> 
										<div name="select_user_id" id="select_user_id" class="cjt-wrapped-select-skin">-- selecione um cliente --</div>
										<div class="cjt-wrapped-select-icon"></div>
										</div> &nbsp;<img class="tTip" title="Informe o usuário para o qual deseja criar um pedido." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>  
									<div class="report-head">Forma de Pagamento: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select name="formapagamento" id='formapagamento' onchange="$('#select_formapagamento').text($('#formapagamento').find('option').filter(':selected').text())">
											<option value="mercadopago">Mercado Pago</option>
											<option value="moip_pagamentos">MoIP Pagamentos</option>
											<option value="pagamentodigital">Pagamento Digital</option>
											<option value="pagseguro">PagSeguro</option>
											<option value="paypal">PayPal</option>
										</select>
										<div name="select_formapagamento" id="select_formapagamento" class="cjt-wrapped-select-skin">-- selecione a forma de pagamento -- </div>
										<div class="cjt-wrapped-select-icon"></div>
										</div> &nbsp;<img class="tTip" title="Informe a forma de pagameto do pedido." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div> 
									<div class="report-head">Oferta: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  name="team_id" id="team_id" onchange="$('#select_team_id').text($('#team_id').find('option').filter(':selected').text())">
											<option value=""> </option>
											<?php 
												$sql = "SELECT id, title FROM team";
												$rs = mysql_query($sql);
												while($l = mysql_fetch_assoc($rs)){
													echo "<option value='$l[id]'>".displaySubStringWithStrip($l[title],58)."</option>";
												}
												$tb = null; 
											?>
										</select> 
										<div name="select_team_id" id="select_team_id" class="cjt-wrapped-select-skin">-- selecione uma oferta --</div>
										<div class="cjt-wrapped-select-icon"></div>
										</div> &nbsp;<img class="tTip" title="Informe para qual oferta será realizado o pedido." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>  
									<div class="report-head">Quantidade: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type='text' name='quantity' id='quantity' value='' />
										<img class="tTip" title="Informe a quantidade para pedido." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div> 
								</div>
								<!-- =============================   fim coluna esquerda   =====================================-->
								<!-- =============================   coluna direita   =====================================-->
								<div class="ends">
									<div class="report-head">Substituir Preço: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type='text' name='price' id='price' value='' />
										<img class="tTip" title="Informe a quantidade para pedido." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div> 
									<div class="report-head">Status de Pagamento: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select name="state" id='state'  onchange="$('#select_state').text($('#state').find('option').filter(':selected').text())">
											<option value="pay">Pago</option>
											<option value="unpay">Não Pago</option>
										</select>
										<div name="select_state" id="select_state" class="cjt-wrapped-select-skin">-- selecione o status de pagamento -- </div>
										<div class="cjt-wrapped-select-icon"></div>
										</div> <img class="tTip" title="Informe o status do pagamento do pedido." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>
									<div class="report-head">Enviar E-mail para pagmento: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type='checkbox' name='enviaremail' id='enviaremail' value='sim' />
										<img class="tTip" title="Marque caso deseja enviar o e-mail para a realização do pagamento." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
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
</script>   
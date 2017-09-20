<?php include template("manage_header");?>
<?php require("ini.php");

 ?> 
<!-- 
<script type="text/javascript" src="/media/js/tinymce_pt/jscripts/tiny_mce/tiny_mce.js"></script> 
<script type="text/javascript" src="/media/js/tinymce_pt/jscripts/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script> 
<script src="/media/js/include_tinymce.js" type="text/javascript"></script> 
-->
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="leader">
	<div id="content" class="clear mainwide">
        <div class="clear box"> 
            <div class="box-content">
                <div class="sect">
				<form id="nform" id="nform"  method="post" action="/vipmin/team/edit.php?id=<?php echo $team['id']; ?>" enctype="multipart/form-data" class="validator">
				<input type="hidden" id="id" name="id" value="<?php echo $team['id']; ?>" />
				<input type="hidden" name="guarantee" value="Y" />
				<input type="hidden" name="system" value="Y" /> 
				<input type="hidden" name="admineditou" value="1" /> 
				<input type="hidden" name="www" id="www"  value="<?=$INI['system']['wwwprefix']?>" /> 
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Informações gerais <?=$team['id']?></h4></div>
							<div class="the-button" style="width:543px;"> 
								<input type="hidden" value="remote" id="deliverytype" name="deliverytype">
								<input type="hidden" value="" id="idpacote" name="idpacote">
								<input type="hidden" name="mostrarseguranca" id="mostrarseguranca" value="1" > 
								<div style="float:left;"><button onclick="doupdate();" id="run-button" class="input-btn" type="button"><div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Salvar</div></button></div>
								<!-- <div style="float:left;"><button  onclick="javascript:location.href='<?=$ROOTPATH?>/vipmin/category/index.php?zone=group'"  id="run-button" class="input-btn" type="button"><div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Cadastrar categorias</div></button></div>--> 
								<div style="float:left;"><button  onclick="javascript:location.href='index.php'"  id="run-button" class="input-btn" type="button"><div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Listar Anúncios</div></button></div>
								
							</div> 
					</div> 
				 
					 <div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">
									
									<div class="report-head">Estado: <span class="astobrig">*</span> <span class="cpanel-date-hint"> &nbsp;  <img class="tTip" title="Escolha o estado onde o veículo se encontra e será anunciado" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </span></div>
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select name="uf" id="uf" onchange="$('#select_uf').text($('#uf').find('option').filter(':selected').text())"> 
											<option value=""></option>
											<?php
												$sql = "SELECT  uf,nome FROM estados";
												$estados = mysql_query($sql) or die(mysql_error());
												while ($row = mysql_fetch_array($estados, MYSQL_ASSOC)) {
													if ($team['uf'] == $row['uf']) {
														$tmp_estado = $row['uf'];
														echo "<option value='{$row['uf']}' selected>{$row['nome']}</option>";
													} else {
														echo "<option value='{$row['uf']}'>{$row['nome']}</option>";		
													}
												}
											?>
										</select> 
										<script>
											URL = "<?php echo $ROOTPATH; ?>/ajax/filtro_pesquisa.php";
											jQuery(function() {
												jQuery('#uf').bind('change', function(ev) {
													jQuery.ajax({
														url: URL,
														type: 'POST',
														data: { filtro: 'cidades', estado: jQuery('#uf').val() },
														beforeSend: function() {
															jQuery('#select_city_id').html('Carregando...');
															jQuery('#city_id').html('<option>Carregando...</option>');
														},
														success: function(r) {
															jQuery('#select_city_id').html('Selecione uma cidade');
															jQuery('#city_id').html(r);
														}
													});
												});
											});
										</script>
										<div name="select_uf" id="select_uf" class="cjt-wrapped-select-skin"><?php if (isset($tmp_estado)) echo $tmp_estado; else echo "Selecione um estado"; ?></div>
										<div class="cjt-wrapped-select-icon"></div>
										</div>  
									</div> 
									 
									<div class="report-head">Cidade: <span class="astobrig">*</span>  <span class="cpanel-date-hint">   &nbsp;  <img class="tTip" title="Escolha a cidade onde o veículo se encontra e será anunciado" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> Escolha primeiro o estado</div>
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  name="city_id" id="city_id" onchange="$('#select_city_id').text($('#city_id').find('option').filter(':selected').text())"> 
											<option value=""></option>
											<?php
												if ($team['uf'] != '') {
													$SQL = "SELECT * FROM cidades WHERE uf = '{$team['uf']}'";
													$cidades = mysql_query($SQL) or die(mysql_error());
													while ($row = mysql_fetch_array($cidades, MYSQL_ASSOC)) {
														if ($team['city_id'] == $row['id']) {
															$tmp_cidade = $row['nome'];
															echo "<option value='{$row['id']}' selected>{$row['nome']}</option>";
														} else {
															echo "<option value='{$row['id']}'>{$row['nome']}</option>";
														}
													}
												}
											?>
										</select>
							 
										<div name="select_city_id" id="select_city_id" class="cjt-wrapped-select-skin"><?php if (isset($tmp_cidade)) echo $tmp_cidade; ?></div>
										<div class="cjt-wrapped-select-icon"></div>
										</div>  
									</div> 
									
									
									<!-- 
									<div id="c_categoria">
										<div class="report-head">Categoria: <span class="cpanel-date-hint">Opcional &nbsp;<img class="tTip" title="Você pode cadastrar suas categorias e subcategorias para a navegação rápida no menu do topo e incluir os respectivos anúncios. Ex: Veículos->Motos " style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"></span></div>
										<div class="group">
											<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
											<select  name="group_id" id="group_id" onchange="$('#select_group_id').text($('#group_id').find('option').filter(':selected').text())"> 
												<option value=""> </option>
												 <?php 
												   $indentacao = "....";
											       $sql = "select * from category where  zone='group' and tipo <>'pagina' and tipo <> 'sistema'  and idpai=0 order by sort_order desc";
													$rs = mysql_query($sql);
													while($l = mysql_fetch_assoc($rs)){
													 $selected ="";
													 if($team['group_id'] == $l['id']){
															$selected =  " selected ";
													 }
		
														echo "<option value='$l[id]' $selected>".displaySubStringWithStrip($l[name],30)."</option>";
														exibe_filhos($l["id"],$indentacao,$team['group_id']);
													}
													 ?>
											</select>
											<div name="select_group_id" id="select_group_id" class="cjt-wrapped-select-skin">Informe a categoria</div>
											<div class="cjt-wrapped-select-icon"></div>
											</div> 
										</div> 
									</div> 
									-->
									
									<div style="clear:both;"class="report-head">Estado do veículo: <span class="astobrig">*</span> <span class="cpanel-date-hint">Novo, Seminovo</span></div>
									<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  name="estadoveiculo" id="estadoveiculo" onchange="$('#estadoveiculo_id').text($('#estadoveiculo').find('option').filter(':selected').text())"> 
											<option value="">selecione</option>
											
											<option value="Novo" <?if($team['estadoveiculo']=="Novo") { echo "selected"; }?> >Novo</option>
											
											<option value="Seminovo" <?if($team['estadoveiculo']=="Seminovo") { echo "selected"; }?>>Seminovo</option>
											
											<!-- <option value="Financiado" <?if($team['estadoveiculo']=="Financiado") { echo "selected"; }?>>Financiado</option>-->
											 
										</select> 
										<div name="estadoveiculo_id" id="estadoveiculo_id" class="cjt-wrapped-select-skin"><?php if (isset($team['estadoveiculo'])) echo $team['estadoveiculo']; else echo "-- selecione --"; ?></div>
										<div class="cjt-wrapped-select-icon"></div>
									</div> 
									
									<div class="report-head">Ordenação: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" id="sort_order" onKeyPress="return SomenteNumero(event);"  name="sort_order" value="<?php echo $team['sort_order'] ? $team['sort_order'] : 0; ?>"> &nbsp;<img class="tTip" title="Informe a ordem de posicionamento deste anúncio no site. Anúncio com número de ordem maior ficam em primeiro lugar. ( coluna da direita )" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>
									
									<div style="float:left; width:100%; ">
									     <div class="report-head">Mostrar mensagem de segurança <span class="cpanel-date-hint"> &nbsp;<img class="tTip" title="Ativando, irá aparecer uma mensagem de segurança na página de detalhe do anúncio." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </span></div> 
										<input style="width:20px;" type="radio" <?=$mostrarsegurancasim?> value="1" name="mostrarseguranca"> Sim       
										<input style="width:20px;" type="radio" <?=$mostrarsegurancanao?> value="0" name="mostrarseguranca"> Não
									 </div>	 
								</div>
								<!-- =============================   fim coluna esquerda   =====================================-->
								<!-- =============================   coluna direita   =====================================-->
								<div class="ends">
								  
									<div id="parceirobk">
										<div class="report-head">Anunciante ou Revenda<span class="cpanel-date-hint">Deixe em branco caso não tenha.</span></div>
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
											<select  name="partner_id" id="partner_id" onchange="$('#select_partner_id').text($('#partner_id').find('option').filter(':selected').text())"> 
												<option value="">Informe o anunciante</option>
												<?php echo Utility::Option($users, $team['partner_id']); ?>
											</select>
											<div name="select_partner_id" id="select_partner_id" class="cjt-wrapped-select-skin">Informe o anunciante</div>
											<div class="cjt-wrapped-select-icon"></div>
										</div> 
									</div>
									 
									 <div style="float:left; width:100%;">
									     <div class="report-head">Publicação:  <span class="astobrig">*</span>  <span class="cpanel-date-hint"></span></div>
										<input style="width:20px;" type="radio" <?=$status1?> value="1" name="status"> Ativa    &nbsp;<img class="tTip" title="Os anúncios só serão publicados no site se estiverem Pagos e com o status Ativa" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">   
										<input style="width:20px;" type="radio" <?=$status0?> value="0" name="status"> Aguardando Moderação
										<input style="width:20px;" type="radio" <?=$status2?> value="2" name="status"> Reprovada
									 </div> 
									 
									 <div style="float:left; width:100%;">
									     <div class="report-head">Status Pagamento:  <span class="astobrig">*</span>  <span class="cpanel-date-hint"></span></div>
										<input style="width:20px;" type="radio" <? if($team['pago']=="sim"){ echo "checked=checked"; }?> value="sim" name="pago"> Pago   &nbsp;<img class="tTip" title="Os anúncios só serão publicados no site se estiverem Pagos e com o status Ativa" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">     
										<input style="width:20px;" type="radio" <? if($team['anunciogratis']=="s" and $team['pago']!="sim"){ echo "checked=checked"; }?> value="anunciogratis" name="pago"> Grátis   &nbsp;<img class="tTip" title="Quando você altera um anúncio para grátis, ele irá ser publicado logo após você alterar o campo Publicação para Ativa " style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">     
										<input style="width:20px;" type="radio" <? if($team['pago']!="sim" and $team['anunciogratis']!="s"){ echo "checked=checked"; }?>   value="" name="pago"> Pendente 
									 </div>
										 		 
									<div style="clear:both;"class="report-head">Este é um dos anúncios em destaque <span class="cpanel-date-hint"> </span>  </div>
									<div class="group">
										<input style="width:20px;" type="radio"  <? if($team['ehdestaquebusca'] =="1" ){echo "checked='checked'";}?>   value="1"    id="ehdestaquebusca" name="ehdestaquebusca"> Sim  &nbsp;<img style="cursor:help" class="tTip" title="Sim sim, este anúncio irá ficar em destaque na pesquisa de veículos no site" src="<?=$ROOTPATH?>/media/css/i/info.png">
										<input style="width:20px;" type="radio" <? if($team['ehdestaquebusca'] =="0" or $team['ehdestaquebusca'] ==""){echo "checked='checked'";}?>  value="0" id="ehdestaquebusca"  name="ehdestaquebusca" > Não  &nbsp; 
									 </div>									   
									
									<div style="clear:both;"class="report-head">Este é um dos anúncios em vitrine <span class="cpanel-date-hint"> <!-- <a href="javascript:buscafoto('ehdestaque.jpg');">clique aqui para ver</a> --> </span>  </div>
									<div class="group">
										<input style="width:20px;" type="radio"  <? if($team['ehvitrine'] =="Y" ){echo "checked='checked'";}?>   value="Y"    id="ehvitrine" name="ehvitrine"> Sim  &nbsp;<img style="cursor:help" class="tTip" title="O sistema irá buscar aleatoriamente todos os anúncios que você colocou para aparecer na vitrine para mostrar 20 anúncios por vez. Você pode aumentar este número em Configurações" src="<?=$ROOTPATH?>/media/css/i/info.png">
										<input style="width:20px;" type="radio" <? if($team['ehvitrine'] =="N" or $team['ehvitrine'] ==""){echo "checked='checked'";}?>  value="N" id="ehvitrine"  name="ehvitrine" > Não  &nbsp; 
									 </div>	
								  
									<div style="clear:both;"class="report-head">Imagem para esta vitrine <span class="cpanel-date-hint"> Dimensão sugerida: 220px x 152px</span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="imgdestaque"  id="imgdestaque" class="format_input"   value="<?php  $team['imgdestaque'] ; ?>" />   <?php if($team['imgdestaque']){?><br><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['imgdestaque']); ?>&nbsp;&nbsp;<a href="#" onclick="delimagem(<?php echo $team['id']; ?>, 'imgdestaque');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
									</div>  
									 
									
								 </div>
								<!-- =============================  fim coluna direita  =====================================-->
							</div> 
						</div>
					</div>
				</div>
				<!-- INFORMAÇÕES DO VEÍCULO -->
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Informações do Veículo</h4></div>
					</div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">
									<div id="c_categoria">
										<div class="report-head">Tipo do Veículo:  <span class="astobrig">*</span>  <span class="cpanel-date-hint">Altere o tipo para mudar os <b>Fabricantes</b> e <b>Características</b></span></div>
										<div class="group">
											<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
											<select  name="car_tipo" id="car_tipo" onchange="$('#select_car_tipo').text($('#car_tipo').find('option').filter(':selected').text());verifica_tipo(this.value)"> 
												<option value=""> </option>
												<option value="Carro" <?php if (isset($team['car_tipo']) && $team['car_tipo'] == 'Carro') echo "selected='selected'"; ?>>Carro</option>
												<option value="Moto" <?php if (isset($team['car_tipo']) && $team['car_tipo'] == 'Moto') echo "selected='selected'"; ?>>Moto</option>
												<!--<option value="Caminhão" <?php if (isset($team['car_tipo']) && $team['car_tipo'] == 'Caminhão') echo "selected='selected'"; ?>>Caminhão</option> -->
											</select>
											<div name="select_car_tipo" id="select_car_tipo" class="cjt-wrapped-select-skin"><?php if ($team['car_tipo'] != '') echo $team['car_tipo']; else echo "Informe o tipo de veículo"; ?></div>
											<div class="cjt-wrapped-select-icon"></div>
											</div>  
										</div> 
									</div>
									<div style="clear:both;"class="report-head">Fabricante:  <span class="astobrig">*</span>  <span class="cpanel-date-hint"><a href="<?=$ROOTPATH?>/vipmin/category/editfabricantes.php">Cadastrar novo fabricante</a></span></div>
									
									<div id="selectfabricantesportipo"></div>
									
									
									<style>
									.clear { clear: both; }
									
									.adicioneNovo {
										font-size: 11px;
										display: block;
										margin-top: 5px;
									}
									</style>
									<div class="clear"></div>
									<script>
									var valorFabricante;
								
									
									function buscaFiltros(filtro) {
										jQuery.ajax({
											url:  "<?php echo $ROOTPATH; ?>/ajax/filtro_pesquisa.php",
											type: "POST",
											data: {
												filtro: filtro,
												fabricante: jQuery('#car_fabricante').val()
											},
											beforeSend: function() {
												if (filtro == 'modelo')
													jQuery('#car_modelo').html("<option>Carregando...</option>");
											},
											success: function(r) {
												if (filtro == 'modelo')
													jQuery('#car_modelo').html(r);
											}
										});
									}
									</script>
											
									<div style="clear:both;"class="report-head">Ano de Fabricação do Carro:  <span class="astobrig">*</span>  <span class="cpanel-date-hint"></span></div>
								  
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  name="car_ano" id="car_ano" onchange="$('#car_ano_id').text($('#car_ano').find('option').filter(':selected').text())"> 
											<option value=""> </option>
											<?php
											$ano_inicio = date('Y') + 1;
											$ano = 1940;
											while($ano_inicio >= $ano) {
												if (isset($team['car_ano']) && $team['car_ano'] == $ano_inicio) {
													echo "<option value='{$ano_inicio}' selected='selected'>{$ano_inicio}</option>";
													$tmp_ano = $ano_inicio;
												}
												else
													echo "<option value='{$ano_inicio}'>{$ano_inicio}</option>";
												$ano_inicio--;
											}
											?>
										</select> 
										<div name="car_ano_id" id="car_ano_id" class="cjt-wrapped-select-skin"><?php if(isset($tmp_ano)) echo $tmp_ano; else echo "-- selecione o ano --"; ?></div>
										<div class="cjt-wrapped-select-icon"></div>
										</div>  
									</div> 
									
									<div style="clear:both;" class="report-head">Carroceria - Apenas para carros:  <span class="cpanel-date-hint"></span></div>
								  
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  style="display:none;" name="car_carroceria" id="car_carroceria" onchange="$('#car_carroceria_id').text($('#car_carroceria').find('option').filter(':selected').text()); "> 
											<option value=""> </option>
											<option value="Hatchback"<?php if($team['car_carroceria'] == 'Hatchback') { echo "selected='true'"; }?>>Hatchback</option>
											<option value="Sedan"<?php if($team['car_carroceria'] == 'Sedan') { echo "selected='true'"; }?>>Sedan</option>
											<option value="Minivan"<?php if($team['car_carroceria'] == 'Minivan') { echo "selected='true'"; }?>>Minivan</option>
											<option value="Perua/SW"<?php if($team['car_carroceria'] == 'Perua/SW') { echo "selected='true'"; }?>>Perua/SW</option>
											<option value="Conversível"<?php if($team['car_carroceria'] == 'Conversível') { echo "selected='true'"; }?>>Conversível</option>
											<option value="Cupê"<?php if($team['car_carroceria'] == 'Cupê') { echo "selected='true'"; }?>>Cupê</option>
											<option value="Picape"<?php if($team['car_carroceria'] == 'Picape') { echo "selected='true'"; }?>>Picape</option>
											<option value="SUV"<?php if($team['car_carroceria'] == 'SUV') { echo "selected='true'"; }?>>SUV</option>
											<option value="Outros"<?php if($team['car_carroceria'] == 'Outros') { echo "selected='true'"; }?>>Outros</option>
										</select> 
										<div style="display:none;" name="car_carroceria_id" id="car_carroceria_id" class="cjt-wrapped-select-skin">-- selecione o tipo de carroceria --</div>
										<div class="cjt-wrapped-select-icon"></div>
										</div>  
									</div>

									<div style="clear:both;" class="report-head">Estilo - Apenas para motos:  <span class="cpanel-date-hint"></span></div>
								  
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  style="display:none;" name="moto_estilo" id="moto_estilo" onchange="$('#moto_estilo_id').text($('#moto_estilo').find('option').filter(':selected').text())"> 
											<option value=""> </option>
											<option value="Esportiva"<?php if($team['moto_estilo'] == 'Esportiva') { echo "selected='true'"; }?>>Esportiva</option>
											<option value="Street"<?php if($team['moto_estilo'] == 'Street') { echo "selected='true'"; }?>>Street</option>
											<option value="Naked"<?php if($team['moto_estilo'] == 'Naked') { echo "selected='true'"; }?>>Naked</option>
											<option value="Custom"<?php if($team['moto_estilo'] == 'Custom') { echo "selected='true'"; }?>>Custom</option>
											<option value="Off-Road"<?php if($team['moto_estilo'] == 'Off-Road') { echo "selected='true'"; }?>>Off-Road</option>
											<option value="Touring"<?php if($team['moto_estilo'] == 'Touring') { echo "selected='true'"; }?>>Touring</option>
											<option value="SuperMotard"<?php if($team['moto_estilo'] == 'SuperMotard') { echo "selected='true'"; }?>>SuperMotard</option>
											<option value="Scooter"<?php if($team['moto_estilo'] == 'Scooter') { echo "selected='true'"; }?>>Scooter</option>
											<option value="Outros"<?php if($team['moto_estilo'] == 'Outros') { echo "selected='true'"; }?>>Outros</option>
										</select> 
										<div style="display:none;" name="moto_estilo_id" id="moto_estilo_id" class="cjt-wrapped-select-skin">-- selecione o tipo de estilo --</div>
										<div class="cjt-wrapped-select-icon"></div>
										</div>  
									</div> 									
									
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
								<div class="ends"> 
									<div style="clear:both;"class="report-head">Modelo:  <span class="astobrig">*</span>  <span class="cpanel-date-hint"><a href="<?=$ROOTPATH?>/vipmin/category/editmodelos.php">Cadastrar novo modelo</a></span></div>
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  name="car_modelo" id="car_modelo" onchange="$('#car_modelo_id').text($('#car_modelo').find('option').filter(':selected').text())"> 
											<option value=""></option>
											<?php
											if (isset($team['car_fabricante']) && $team['car_fabricante'] != '') {
												$modelos = mysql_query("SELECT * FROM modelo WHERE fabricante = '{$team['car_fabricante']}'");
												while ($row = mysql_fetch_array($modelos)) {
													if (isset($team['car_modelo']) && $team['car_modelo'] == $row['id']) {
														echo "<option value='{$row['id']}' selected='selected'>{$row['nome']}{</option>";
														$tmp_modelo = $row['nome'];
													}
													else
														echo "<option value='{$row['id']}'>{$row['nome']}{</option>";
												}
											} else if (isset($team['modelo']) && $team['modelo'] != '') {
												$modelo = mysql_fetch_row(mysql_query("SELECT fabricante FROM modelo WHERE id = '{$team['car_modelo']}'"));
												$modelos = mysql_query("SELECT * FROM modelo WHERE fabricante = '{$modelo[0]}'");
												while ($row = mysql_fetch_array($modelos)) {
													if (isset($team['car_modelo']) && $team['car_modelo'] == $row['id']) {
														echo "<option value='{$row['id']}' selected='selected'>{$row['nome']}{</option>";
														$tmp_modelo = $row['nome'];
													}
													else
														echo "<option value='{$row['id']}'>{$row['nome']}{</option>";
												}
											}
											?>
										</select> 
										<div name="car_modelo_id" id="car_modelo_id" class="cjt-wrapped-select-skin"><?php if (isset($tmp_modelo)) echo $tmp_modelo; else echo "-- selecione o modelo --"; ?></div>
										<div class="cjt-wrapped-select-icon"></div>
										</div>  
									</div> 
									
									<div style="clear:both;"class="report-head">Ano do Modelo do Carro:  <span class="astobrig">*</span>  <span class="cpanel-date-hint"></span></div>
								  
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  name="modelo_ano" id="modelo_ano" onchange="$('#modelo_ano_id').text($('#modelo_ano').find('option').filter(':selected').text())"> 
											<option value=""> </option>
											<?php
											$ano_inicio = date('Y') +1;
											$ano = 1940;
											while($ano_inicio >= $ano) {
												if (isset($team['modelo_ano']) && $team['modelo_ano'] == $ano_inicio) {
													echo "<option value='{$ano_inicio}' selected='selected'>{$ano_inicio}</option>";
													$tmp_ano = $ano_inicio;
												}
												else
													echo "<option value='{$ano_inicio}'>{$ano_inicio}</option>";
												$ano_inicio--;
											}
											?>
										</select> 
										<div name="modelo_ano_id" id="modelo_ano_id" class="cjt-wrapped-select-skin"><?php if(isset($tmp_ano)) echo $tmp_ano; else echo "-- selecione o ano --"; ?></div>
										<div class="cjt-wrapped-select-icon"></div>
										</div>  
									</div> 
									
									<div class="report-head">Placa:   <span class="astobrig">*</span><span class="cpanel-date-hint">Placa do veículo<img style="cursor:help" class="tTip" title="Apenas a primeira letra e o último n° será exibido no anúncio (AXX-XXX8)" src="<?=$ROOTPATH?>/media/css/i/info.png"></span></div>
									<div class="group">
										<input type="text" id="placa"  name="placa" value="<?php echo $team['placa']?>">  
									</div>
									
									<div class="report-head">Renavam:  <span class="astobrig">*</span>  <span class="cpanel-date-hint"> Porque pedimos o Renavam <img style="cursor:help" class="tTip" title="O Renavam é um dado de identificação importante, que garante maior segurança em suas informações cadastrais inseridas no banco de dados, impossibilitando fraudes e que dados sejam inseridos em duplicidade. Ficamos à disposição para quaisquer esclarecimentos e alterações de seus dados cadastrais. Voce pode identificar o número do Renavam do seu veículo no canto superior a esquerda da CRLV (Certificado de Registro e icenciamento de veículos)" src="<?=$ROOTPATH?>/media/css/i/info.png"></span></div>
									<div class="group">
										<input type="text" id="renavam"  name="renavam" value="<?php echo $team['renavam']?>">  
									</div>
									
									
									
								 </div>
								</div>
								<!-- ============================= // fim coluna direita // =====================================-->
							</div> 
						</div>
					</div>
				
				<!-- FIM INFORMAÇÕES DO VEÍCULO -->
				
				
				<!-- ********************************************* ABA Controle de Estoque e periodo --> 
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Controle de Período</h4></div>
					</div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">
									 <div class="report-head">Data início: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input style="width:40%;" type="text"  xd="<?php echo date('d/m/Y', $team['begin_time']); ?>" name="begin_time" id="begin_time" class="format_input"  maxlength="10"  value="<?php echo date('d/m/Y', $team['begin_time']); ?>"/>
										 <img  style="cursor:pointer;" onclick="javascript:displayCalendar(document.forms[0].begin_time,'dd/mm/yyyy',this);" alt="select date" src="<?=$ROOTPATH?>/media/css/i/calendar.png"> 
									</div>
									
									<div class="report-head">Hora início: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input style="width:40%;" type="text" id="begin_time2"  name="begin_time2"  value="<?php echo  $team['begin_time2'] ; ?>"  class="format_input"  maxlength="10"  />
									</div> 
									
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
								<div class="ends"> 
									  
									<div class="report-head">Data fim: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input style="width:40%;" type="text"  xd="<?php echo date('d/m/Y', $team['end_time']); ?>" name="end_time" id="end_time" class="format_input"  maxlength="10"  value="<?php echo date('d/m/Y', $team['end_time']); ?>"/>
										 <img  style="cursor:pointer;" onclick="javascript:displayCalendar(document.forms[0].end_time,'dd/mm/yyyy',this);" alt="select date" src="<?=$ROOTPATH?>/media/css/i/calendar.png"> 
									</div> 
								 
									<div class="report-head">Hora fim: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input style="width:40%;" type="text" name="end_time2" id="end_time2"   value="<?php echo  $team['end_time2'] ; ?>"  class="format_input"  maxlength="10"  />
									</div> 
									 
								 </div>
								</div>
								<!-- ============================= // fim coluna direita // =====================================-->
							</div> 
						</div>
					</div>
					
					<!-- ********************************************* ABA Informações de preço e pagamento --> 
					
				<div class="option_box" id="abapagamento">
					<div class="top-heading group">
						<div class="left_float"><h4>Informações de Preço</h4></div>
					</div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">   
									<div id="c_valores">
										<div style="clear:both;"class="report-head">Valor:  <span class="astobrig">*</span>  <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="team_price"  id="team_price"  class="format_input"   value="<?php echo  $team['team_price'] ; ?>"  />  
										</div> 	
									</div>
									<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;">
									   <span class="report-label">Mostrar Preço:</span>  
										<input style="width:20px;" type="radio" <?=$mostrarprecosim?> value="1" name="mostrarpreco"> Sim      
										<input style="width:20px;" type="radio" <?=$mostrarpreconao?> value="0" name="mostrarpreco"> Não
									 </div>
								  
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
									<div class="ends">  
										<div style="clear:both;"class="report-head">Preço especial para revendas? <span class="cpanel-date-hint">&nbsp;<img style="cursor:help" class="tTip" title="O preço especial é uma condição para despertar interesse de compra das revendas (lojistas). A regra para anunciar seu veículo na condição de preço especial é que o valor anunciado não pode ser maior ou igual ao preço da tabela FIPE do veículo anúnciado, caso contrário nossa equipe irá cancelar o valor anunciado." src="<?=$ROOTPATH?>/media/css/i/info.png"> </span>  </div>
										<div class="group">
											<input style="width:20px;" type="radio"  <? if($team['temprecoespecial'] =="Y" ){echo "checked='checked'";}?>   value="Y"    id="temprecoespecial" name="temprecoespecial"> Sim  
											<input style="width:20px;" type="radio" <? if($team['temprecoespecial'] =="N" or $team['temprecoespecial'] ==""){echo "checked='checked'";}?>  value="N" id="temprecoespecial"  name="temprecoespecial" > Não  &nbsp; 
										 </div>	
									 
										<div style="clear:both;"class="report-head">Valor: (Preço Especial) <span class="cpanel-date-hint"></span></div> 
										<div class="group">
											<input type="text" name="precorevendas"  id="precorevendas" maxlength="18" class="format_input"   value="<?php echo  $team['precorevendas'] ; ?>"  />  <img style="cursor:help" class="tTip" title="Valor deste veículo" src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div> 
										 
								   </div> 
								</div>
								<!-- ============================= // fim coluna direita // =====================================-->
							</div> 
						</div>
					</div>	
					
							<div class="top-heading group">
			<div class="left_float"><h4>Necessidades do veículo </h4></div>
		</div> 
		<div id="container_box">
			<div id="option_contents" class="option_contents">  
				<div class="form-contain group">
					<!-- =============================   coluna esquerda   =====================================-->
					<div class="starts">   
					  <div id="detalhes_opcionais" class="detalhes_opcionais">
							<div class="left" style="width:100%;">
								<div class="left">
									<div class="left">
										<ul> 
											<li>
												<input type="checkbox" value="Familiar pequeno" name="necessidades" class="ninput" <? if(array_search ("Familiar pequeno", $necessidades) !== false){ echo 'checked="checked"'; } ?> >
												<label for="ppc_atr_id_5092" class="label check" style="cursor: pointer;">Familiar pequeno</label>
											</li>
											<li>
												<input type="checkbox" value="Familiar médio"  name="necessidades" class="ninput"  <? if(array_search ("Familiar médio", $necessidades) !== false){ echo 'checked="checked"'; } ?> >
												<label for="ppc_atr_id_5095">Familiar médio</label>
											</li> 
											<li>
												<input type="checkbox" value="Familiar grande"  name="necessidades" class="ninput" <? if(array_search ("Familiar grande", $necessidades) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5098" class="label check" style="cursor: pointer;">Familiar grande</label>
											</li> 
											<li>
												<input type="checkbox" value="Off-road"  name="necessidades" class="ninput"  <? if(array_search ("Off-road", $necessidades) !== false){ echo 'checked="checked"'; } ?> >
												<label for="ppc_atr_id_5101">Off-road</label>
											</li> 
											<li>
												<input type="checkbox" value="Estrada"  name="necessidades" class="ninput" <? if(array_search ("Estrada", $necessidades) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5103" class="label check" style="cursor: pointer;">Estrada</label>
											</li> 
										</ul>
									</div> 
									<div class="left">
									 
									</div>
								</div>
						</div>
					</div>
				</div>
					<!-- ============================= // fim coluna esquerda // =====================================-->
					<!-- ============================= // coluna direita // =====================================-->
						<div class="ends">  
						<div class="left">
							<ul> 
								<li>
									<input type="checkbox" value="Carro de colecionador"  name="necessidades" class="ninput" <? if(array_search ("Carro de colecionador", $necessidades) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5106" class="label check" style="cursor: pointer;">Carro de colecionador</label>
								</li> 
								<li>
									<input type="checkbox" value="Urbano" name="necessidades" class="ninput" <? if(array_search ("Urbano", $necessidades) !== false){ echo 'checked="checked"'; } ?> >
									<label for="ppc_atr_id_5109" class="label check" style="cursor: pointer;">Urbano</label>
								</li>
								<li>
									<input type="checkbox" value="Comercial"  name="necessidades" class="ninput"  <? if(array_search ("Comercial", $necessidades) !== false){ echo 'checked="checked"'; } ?> >
									<label for="ppc_atr_id_5112">Comercial</label>
								</li> 
								<li>
									<input type="checkbox" value="Lazer"  name="necessidades" class="ninput" <? if(array_search ("Lazer", $necessidades) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5115" class="label check" style="cursor: pointer;">Lazer</label>
								</li> 
								<li>
									<input type="checkbox" value="Esportivo"  name="necessidades" class="ninput" <? if(array_search ("Esportivo", $necessidades) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5118" class="label check" style="cursor: pointer;">Esportivo</label>
								</li> 
								<li>
									<input type="checkbox" value="Adaptado"  name="necessidades" class="ninput" <? if(array_search ("Adaptado", $necessidades) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5121" class="label check" style="cursor: pointer;">Adaptado para pessoas com defeciência</label>
								</li> 
							</ul>
						</div>
						<div class="left">
							<ul>
					 
							</ul>
						</div>
						
					   </div> 
					</div>
					<!-- ============================= // fim coluna direita // =====================================-->
				</div> 
			</div>
					
					
				<div id="campostipoveiculo"></div>
				 
				 <!-- ********************************************* ABA Fotos --> 
				<div class="option_box">
					<div class="top-heading group"> <div class="left_float"><h4>Imagens do anúncio: Dimensão ideal: 800px (largura) x 600px (altura) </h4> </div> </div> 
					<!-- <div class="top-heading group"> <div class="left_float"><h4>Imagens do anúncio: Dimensão ideal: 480px (largura) x 360px (altura)</h4> </div> </div> -->
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
						<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">  
									<div style="clear:both;"class="report-head">Foto 1:  <span class="cpanel-date-hint"> <!-- <a target="_blank" href="<?=$ROOTPATH?>/media/css/i/fotoexemplo.jpg">baixar</a> imagem exemplo --> </span>  
									</div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="upload_image"  id="upload_image" class="format_input"  value="<?php  $team['upload_image'] ; ?>" />  <?php if($team['image']){?> <br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['image']); ?>&nbsp;&nbsp;<a href="javascript:delimagem(<?php echo $team['id']; ?>, 'image');" ><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span> <?php }?>
									 </div> 
									<div style="clear:both;"class="report-head">Foto 2: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="upload_image1"  id="upload_image1" class="format_input"   value="<?php  $team['upload_image1'] ; ?>" />   <?php if($team['image1']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['image1']); ?>&nbsp;&nbsp;<a href="javascript:delimagem(<?php echo $team['id']; ?>, 'image1');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?> 
									</div> 
									<div style="clear:both;"class="report-head">Foto 3: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="upload_image2"  id="upload_image2" class="format_input"   value="<?php  $team['upload_image2'] ; ?>" />   <?php if($team['image2']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['image2']); ?>&nbsp;&nbsp;<a href="javascript:delimagem(<?php echo $team['id']; ?>, 'image2');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
									</div> 
									<div style="clear:both;"class="report-head">Foto 4: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image1"  id="gal_upload_image1" class="format_input"   value="<?php  $team['gal_upload_image1'] ; ?>" />   <?php if($team['gal_image1']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['gal_image1']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image1');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
									</div>  
									<div style="clear:both;"class="report-head">Foto 5: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image2"  id="gal_upload_image2" class="format_input"   value="<?php  $team['gal_upload_image2'] ; ?>" /> <?php if($team['gal_image2']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image2']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image2');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span> <?php }?>   
								 </div> 
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
								<div class="ends"> 
								 
									<div style="clear:both;"class="report-head">Foto 6: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image3"  id="gal_upload_image3" class="format_input"   value="<?php  $team['gal_upload_image3'] ; ?>" />   <?php if($team['gal_image3']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image3']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image3');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
									</div> 
									<div style="clear:both;"class="report-head">Foto 7: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image4"  id="gal_upload_image4" class="format_input"   value="<?php  $team['gal_upload_image4'] ; ?>" />  <?php if($team['gal_image4']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['gal_image4']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image4');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span> <?php }?> 
									</div> 
									<div style="clear:both;"class="report-head">Foto 8: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image5"  id="gal_upload_image8" class="format_input"   value="<?php  $team['gal_upload_image5'] ; ?>" />   <?php if($team['gal_image5']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['gal_image5']); ?>&nbsp;&nbsp;<a href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image5');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
									</div>  
									 <div style="clear:both;"class="report-head">Foto 9: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image6"  id="gal_upload_image6" class="format_input"   value="<?php  $team['gal_upload_image6'] ; ?>" />   <?php if($team['gal_image6']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['gal_image6']); ?>&nbsp;&nbsp;<a href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image6');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
									 </div> 
									 	<div style="clear:both;"class="report-head">Foto 10: <span class="cpanel-date-hint"></span></div>
									<div class="group">
											<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image7"  id="gal_upload_image7" class="format_input"   value="<?php  $team['gal_upload_image7'] ; ?>" />   <?php if($team['gal_image7']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['gal_image7']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image7');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
									 </div>  
								 </div> 
								</div>
								<!-- ============================= // fim coluna direita // =====================================-->
							</div> 
						</div>
					</div> 
				
					<!-- <div class="option_box" id="abapagamento" style="display:none;">
					<div class="option_box" id="abapagamento"  >
						<div class="top-heading group">
							<div class="left_float"><h4>Vídeos do Anúncio ( Tamanho máximo 2MB )  Utilize apenas vídeos MPEG, AVI ou MP4</h4></div>
						</div> 
						<div id="container_box">
							<div id="option_contents" class="option_contents">  
								<div class="form-contain group">
									<div class="starts">   
										<div id="c_valores">
											<div style="clear:both;"class="report-head">Vídeo 01 <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="video1"  id="video1" class="format_input"   value="" />   <?php if($team['video1']){?><br><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['video1']); ?>&nbsp;&nbsp;<a href="#" onclick="delimagem(<?php echo $team['id']; ?>, 'imgdestaque');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
											</div>  	
										</div> 
									</div>
										<div class="ends">  
											<div style="clear:both;"class="report-head">Vídeo 02 <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="video2"  id="video2" class="format_input"   value="" />   <?php if($team['video2']){?><br><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['video2']); ?>&nbsp;&nbsp;<a href="#" onclick="delimagem(<?php echo $team['id']; ?>, 'imgdestaque');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
											</div> 
									   </div> 
									</div>
							</div> 
						</div>
					</div>	
					
				<!-- ********************************************* ABA Foto Auxiliar --> 
				<!--
				<div class="option_box" id="c_estaticas">
					<div class="top-heading group"> <div class="left_float"><h4>Imagem ( Não redimensiona - Opcional )</h4> </div> </div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group"> 
								<div class="starts">  
								
									<div style="clear:both;"class="report-head">Detalhe: <span class="cpanel-date-hint">Dimensão exata: 720px x 273px.</span>&nbsp;<img class="tTip" title="Opcionalmente, você pode fazer o upload da imagem redimensionada manualmente por você para este bloco. Note que se você fizer este upload, o sistema irá ignorar o redimensionamento automático para esse bloco e usar a sua imagem. Dimensão exata para a lateral: 720px x 273px." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="estatica_detalhe"  id="estatica_detalhe" class="format_input"   value="<?php  $team['estatica_detalhe'] ; ?>" />   <?php if($team['estatica_detalhe']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['estatica_detalhe']); ?>&nbsp;&nbsp;<a href="#" onclick="delimagem(<?php echo $team['id']; ?>, 'estatica_detalhe');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
									</div>
								 
								 
								</div> 
								<div class="ends"> 
								
								 
								 </div> 
								</div> 
							</div> 
						</div>
					</div>
					-->
					 
					 <!-- ********************************************* ABA Descrição da oferta --> 
					<div class="option_box">
						<div class="top-heading group"> <div class="left_float"><h4>Informações Adicionais</h4> </div> &nbsp;<img class="tTip" title="Escreva abaixo os diferenciais do veículo. Ex: IPVA pago, Documentação ok, Chave reserva, Veículo revisado, etc.." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </div> 
						 
						<div id="container_box">
							<div id="option_contents" class="option_contents">  
								<div class="form-contain group"> 
									<div class="text_area">  
									<textarea cols="45" rows="5" name="summary" style="width:100%" id="summary" class="format_input" ><?php echo htmlspecialchars($team['summary']); ?></textarea>
									</div> 
								</div> 
							</div> 
						</div>
					</div>	 
					 
				   
		<div class="top-heading group">
			<div class="left_float"><h4>Promoções </h4></div>
		</div> 
		<div id="container_box">
			<div id="option_contents" class="option_contents">  
				<div class="form-contain group">
					<!-- =============================   coluna esquerda   =====================================-->
					<div class="starts">   
					  <div id="detalhes_opcionais" class="detalhes_opcionais">
							<div class="left" style="width:100%;">
								<div class="left">
									<div class="left">
										<ul> 
											<li>
												<input type="checkbox" value="Tanque cheio" name="promocoes" class="cinput" <? if(array_search ("Tanque cheio", $promocoes) !== false){ echo 'checked="checked"'; } ?> >
												<label for="ppc_atr_id_5092" class="label check" style="cursor: pointer;">Tanque cheio</label>
											</li>
											<li>
												<input type="checkbox" value="Transferência grátis"  name="promocoes" class="cinput"  <? if(array_search ("Transferência grátis",$promocoes) !== false){ echo 'checked="checked"'; } ?> >
												<label for="ppc_atr_id_5095">Transferência grátis</label>
											</li> 
											<li>
												<input type="checkbox" value="Emplacamento grátis"  name="promocoes" class="cinput" <? if(array_search ("Emplacamento grátis",$promocoes) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5093" class="label check" style="cursor: pointer;">Emplacamento grátis</label>
											</li> 
										</ul>
									</div> 
									<div class="left">
									 
									</div>
								</div>
						</div>
					</div>
				</div>
					<!-- ============================= // fim coluna esquerda // =====================================-->
					<!-- ============================= // coluna direita // =====================================-->
						<div class="ends">  
						<div class="left">
							<ul>
							 	<li>
								 <label for="ppc_atr_id_5096" class="label check" style="cursor: pointer;">Outros ( Especifique )</label>
								 <div class="group">
									<input type="text" name="promooutros"  id="promooutros"  class="format_input"   value="<?php echo  $team['promooutros'] ; ?>"  />  
								</div> 
						
							</li>
							</ul>
						</div>
						<div class="left">
							<ul>
					 
							</ul>
						</div>
						
					   </div> 
					</div>
					<!-- ============================= // fim coluna direita // =====================================-->
				</div> 
			</div>
			
				</div> 
				<div class="option_box"> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">
							<div class="the-button">
								<input type="hidden" value="" id="vea_caracter" name="vea_caracter">
								<input type="hidden" value="" id="vea_promocoes" name="vea_promocoes">
								<input type="hidden" value="" id="vea_necessidades" name="vea_necessidades">
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
var www = jQuery("#www").val();
  
//verifica_tipo_oferta("<?php echo $team['team_type']; ?>");
	<?php 
		if(!(empty($_GET['id']))){ 
			if($team['car_tipo'] == 'Carro'){
	?>
				$('#car_carroceria, #car_carroceria_id').css('display', 'block');
				$('#moto_estilo, #moto_estilo_id').css('display', 'none');
				$('#car_carroceria_id').text('<?php echo $team['car_carroceria']; ?>');
	<?php
			}else if($team['car_tipo'] == 'Moto'){
	?>
				$('#moto_estilo, #moto_estilo_id').css('display', 'block');
				$('#car_carroceria, #car_carroceria_id').css('display', 'none');
				$('#moto_estilo_id').text('<?php echo $team['moto_estilo']; ?>');
	<?php
			}else{
	?>
				$('#car_carroceria, #car_carroceria_id').css('display', 'none');
				$('#moto_estilo, #moto_estilo_id').css('display', 'none');
	<?php
		}}
	?>
	

$('#car_tipo').change(function(){
	var tipo = $(this).attr('value');
	
	if(tipo == "Carro"){
		$('#car_carroceria, #car_carroceria_id').css('display', 'block');
		$('#moto_estilo, #moto_estilo_id').css('display', 'none');
	}else if(tipo == "Moto"){
		$('#moto_estilo, #moto_estilo_id').css('display', 'block');
		$('#car_carroceria, #car_carroceria_id').css('display', 'none');
	}else{
		$('#car_carroceria, #car_carroceria_id').css('display', 'none');
		$('#moto_estilo, #moto_estilo_id').css('display', 'none');
	}
});
 
$("#end_time").mask("99/99/9999");
$("#begin_time").mask("99/99/9999");
$("#end_time2").mask("99:99");
$("#begin_time2").mask("99:99");
$("#placa").mask("aaa-9999");
 
$('#team_price').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});

$('#precorevendas').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});
$('#preco_comissao').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});

$('#bonuslimite').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});
$('#valorfrete').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});

	 	
if( jQuery("#id").val() ==""){
 
	// $('#posicionamento').val(4);  
}
else{ 
	$('#select_partner_id').text($('#partner_id').find('option').filter(':selected').text());
	$('#select_city_id').text($('#city_id').find('option').filter(':selected').text());
	$('#select_group_id').text($('#group_id').find('option').filter(':selected').text());
	$('#estadoveiculo_id').text($('#estadoveiculo').find('option').filter(':selected').text());
 
}


window.x_init_hook_teamchangetype = function(){
 
	X.team.changetype("{$team['team_type']}");
};

window.x_init_hook_page = function() {
	X.team.imageremovecall = function(v) {
	 
		jQuery('#team_image_'+v).remove();
	};
	X.team.imageremove = function(id, v) {
	 
		return !X.get(WEB_ROOT + '/ajax/misc.php?action=imageremove&id='+id+'&v='+v);
	};
};

function doupdate(){

	if(validador()){
		$("#spinner-text").css("opacity", "0.2");
		$("#spinner-text2").css("opacity", "0.2");
		jQuery("#imgrec").show()
		jQuery("#imgrec2").show()
		 
		 var vea_caracter = '';  
		 var vea_promocoes = '';
		 var vea_necessidades = '';
		 
		jQuery(".cinput:checked").each(function(){ 
			if(this.checked) {  
				if(this.name=="caracteristicas"){
					vea_caracter = vea_caracter  + this.value+ ','; 
				} 
			}
		});	
		
		jQuery(".cinput:checked").each(function(){ 
			if(this.checked) {  
				if(this.name=="promocoes"){
					vea_promocoes = vea_promocoes  + this.value+ ','; 
				} 
			}
		});

		jQuery(".ninput:checked").each(function(){ 
			if(this.checked) {  
				if(this.name=="necessidades"){
					vea_necessidades = vea_necessidades  + this.value+ ','; 
				} 
			}
		}); 		
		
		jQuery("#vea_caracter").val(vea_caracter);
		jQuery("#vea_promocoes").val(vea_promocoes);
		jQuery("#vea_necessidades").val(vea_necessidades);
		
		document.forms[0].submit();
	}
}

function campoobg(campo){
 
	$("#"+campo).css("background", "#F9DAB7");
 
} 



function verposicionamento(){
   
   if(jQuery("#posicionamento").val() == "6"){ // posicionalmento 6 = super banner
		jQuery("#dimensao").html("Dimensão ideal no super banner: 944px de largura por 256px de altura")	 
   } 
   else{
		jQuery("#dimensao").html("Dimensão ideal na página detalhe: 720px de largura por 273px de altura.");
	}
}

function delimagem(idoferta,campo){
 
$.get(WEB_ROOT+"/vipmin/delgal.php?id="+idoferta+"&gal="+campo,
 			
   function(data){
      if(jQuery.trim(data)==""){
     	alert("Imagem apagada com sucesso. ");
	  }  
	  else{
		  alert(data)
	  }
   });
}


function limpacampos(){		 
	$("input[type=text]").each(function(){ 
		$("#"+this.id).css("background", "#fff");
	}); 
	$("#upload_image").css("background", "#fff");
	
}
function validador(){
	
	limpacampos();
 
	if( jQuery("#car_tipo").val()==""){

		campoobg("car_tipo");
		alert("Por favor, informe o tipo do veículo.");
		jQuery("#car_tipo").focus();
		return false;
	}	
	if( jQuery("#uf").val()==""){

		campoobg("uf");
		alert("Por favor, informe o estado de localização do veículo.");
		jQuery("#uf").focus();
		return false;
	}		
	
	if( jQuery("#city_id").val()==""){

		campoobg("city_id");
		alert("Por favor, informe a cidade de localização do veículo.");
		jQuery("#city_id").focus();
		return false;
	}	

	if( jQuery("#estadoveiculo").val()==""){

		campoobg("estadoveiculo");
		alert("Por favor, informe a situação do veículo");
		jQuery("#estadoveiculo").focus();
		return false;
	}	
	
	if( jQuery("#partner_id").val()==""){

		campoobg("partner_id");
		alert("Por favor, informe o anunciante.");
		jQuery("#partner_id").focus();
		return false;
	}	
	 
	 ehvitrine  = $("input[name='ehvitrine']:checked").val();
	 imgdestaque_bd  = '<?=$team['imgdestaque']?>';
 
    if(ehvitrine=="Y"){ 
			if( jQuery("#imgdestaque").val() =="" & imgdestaque_bd==""){
			alert("Se você marcou este anúncio para ser vitrine, então você deve fazer o upload da imagem no campo 'Imagem para esta vitrine'");
			campoobg("imgdestaque");
			jQuery("#imgdestaque").focus();
			return false;
		}
		
	}
	
	if( jQuery("#car_fabricante").val()==""){

		campoobg("car_fabricante");
		alert("Por favor, informe o fabricante.");
		jQuery("#car_fabricante").focus();
		return false; 
	}	
	

	if( jQuery("#car_modelo").val()==""){

		campoobg("car_modelo");
		alert("Por favor, informe o modelo.");
		jQuery("#car_modelo").focus();
		return false;
	}	
	
	if( jQuery("#car_ano").val()==""){

		campoobg("car_ano");
		alert("Por favor, informe o ano de fabricação.");
		jQuery("#car_ano").focus();
		return false;
	}		
	
	if( jQuery("#modelo_ano").val()==""){

		campoobg("modelo_ano");
		alert("Por favor, informe o ano do Modelo.");
		jQuery("#modelo_ano").focus();
		return false;
	}	
	
	if( jQuery("#team_price").val()==""){

		campoobg("team_price");
		alert("Por favor, informe valor do veículo.");
		jQuery("#team_price").focus();
		return false;
	}	
	if( jQuery("#estadoveiculo").val()=="Seminovo"){	
		if( jQuery("#placa").val()==""){

			campoobg("placa");
			alert("Por favor, informe a placa do veículo.");
			jQuery("#placa").focus();
			return false;
		}
	}
	if( jQuery("#renavam").val()==""){

		campoobg("renavam");
		alert("Por favor, informe o renavam do veículo.");
		jQuery("#renavam").focus();
		return false;
	}
  
	  upload_image_bd  = '<?=$team['image']?>';
	  
	 /*
	 if( jQuery("#upload_image").val() =="" & upload_image_bd ==""){
		
		alert("Por favor, faça upload da primeira foto ao menos.");
		campoobg("upload_image");
		jQuery("#upload_image").focus();
		return false;
	 }
	 */
	 
	return true;	
}

 
function verifica_tipo(tipo){
    
   if(tipo!=""){
		if(tipo=="Carro"){
			tipo="carro"; 
			
		}	
		if(tipo=="Moto"){
			tipo="moto"; 
			
		}
		
		$.get(WEB_ROOT+"/include/compiled/campos"+tipo+".php?id=<?=$team['id']?>",
					
		   function(data){
			   
				$('#campostipoveiculo').html(data);
			   
		   });	
		   
		  // fabricantes
		$.get(WEB_ROOT+"/include/compiled/ajax_fabricantes_portipo.php?tipo="+tipo+"&id=<?=$team['id']?>",
					
		   function(data){
			   
				$('#selectfabricantesportipo').html(data);
			   
		   }); 
		   
	   }
}  
 


verifica_tipo($('#car_tipo').val());

</script>   
<script>
	
	function buscafoto(foto){
		jQuery(document).ready(function(){
			jQuery.colorbox({
				href: WEB_ROOT + '/media/css/i/'+foto
			});
		});
		}
 
 </script>
 
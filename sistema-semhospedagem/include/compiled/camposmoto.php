<?
require_once( dirname(dirname(dirname(__FILE__))) . '/app.php');
$team   = Table::Fetch('team',$_REQUEST['id']);	
$caracteristicas = explode(",",$team['vea_caracter']);
header('Content-Type: text/html; charset=ISO-8859-1;'); 
 
?>
<!-- ********************************************* ABA Características --> 
	 <div class="option_box" id="abapagamento">
		<div class="top-heading group"> 
			<div class="left_float"><h4>Características do Veículo</h4></div>
		</div> 
		<div id="container_box">
			<div id="option_contents" class="option_contents">  
				<div class="form-contain group">
					<!-- =============================   coluna esquerda   =====================================-->
					<div class="starts col-md-6 col-xs-12 col-sm-12">    
					 <div class="itens_complemento_detalhes">
						<ul class="itens_complemento_int">
							<li class="label_item">Km</li>
							<li class="element_item">
							<input type="text" onKeyPress="return SomenteNumero(event);" maxlength="8" value="<?=$team['km']?>"  style="text-align:left" name="km" id="km" >
							</li>
						</ul> 
						
						<div style="clear:both;"class="report-head">Cor<span class="cpanel-date-hint"></span></div>
						<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
							<select  name="cor" id="cor" onchange="$('#cor_id').text($('#cor').find('option').filter(':selected').text())"> 
								<option value="">selecione</option>
								
								<option value="Amarelo">Amarelo</option>
								
								<option value="Amarelo Met&aacute;lico">Amarelo Met&aacute;lico</option>
								
								<option value="Azul">Azul</option>
								
								<option value="Azul Met&aacute;lico">Azul Met&aacute;lico</option>
								
								<option value="Bege">Bege</option>
								
								<option value="Bege Met&aacute;lico">Bege Met&aacute;lico</option>
								
								<option value="Branco">Branco</option>
								
								<option value="Branco Met&aacute;lico">Branco Met&aacute;lico</option>
								
								<option value="Cinza">Cinza</option>
								
								<option value="Cinza Met&aacute;lico">Cinza Met&aacute;lico</option>
								
								<option value="Cromado">Cromado</option>
								
								<option value="Dourado">Dourado</option>
								
								<option value="Laranja">Laranja</option>
								
								<option value="Marrom">Marrom</option>
								
								<option value="Prata">Prata</option>
								
								<option value="Preto">Preto</option>
								
								<option value="Preto Met&aacute;lico">Preto Met&aacute;lico</option>
								
								<option value="Rosa">Rosa</option>
								
								<option value="Roxo">Roxo</option>
								
								<option value="Roxo Met&aacute;lico">Roxo Met&aacute;lico</option>
								
								<option value="Verde">Verde</option>
								
								<option value="Verde Met&aacute;lico">Verde Met&aacute;lico</option>
								
								<option value="Vermelho">Vermelho</option>
								
								<option value="Vermelho Met&aacute;lico">Vermelho Met&aacute;lico</option>
								
								<option value="Marrom Met&aacute;lico">Marrom Met&aacute;lico</option>
							</select> 
							<div name="cor_id" id="cor_id" class="cjt-wrapped-select-skin"><?php if (isset($team['cor'])) echo utf8_decode($team['cor']); else echo "-- selecione --"; ?></div>
							<div class="cjt-wrapped-select-icon"></div>
						</div> 
						 
						<div style="clear:both;"class="report-head">Combustível: <span class="cpanel-date-hint"></span></div>
						<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
							<select  name="combustivel" id="combustivel" onchange="$('#combustivel_id').text($('#combustivel').find('option').filter(':selected').text())"> 
								<option value="">selecione</option>
								
								<option value="Etanol">Etanol</option>
									  
								<option value="Gasolina">Gasolina</option>
								  
								<option value="Híbrido">Híbrido</option>
								
								<option value="Flex">Flex</option>
								 
							</select> 
							<div name="combustivel_id" id="combustivel_id" class="cjt-wrapped-select-skin"><?php if (isset($team['combustivel'])) echo utf8_decode($team['combustivel']); else echo "-- selecione --"; ?></div>
							<div class="cjt-wrapped-select-icon"></div>
						</div> 
								 
					</div>
					
					</div>
					<!-- ============================= // fim coluna esquerda // =====================================-->
					<!-- ============================= // coluna direita // =====================================-->
					<div class="ends col-md-6 col-xs-12 col-sm-12">   
					<div style="clear:both;"class="report-head">Motor: <span class="cpanel-date-hint"></span></div>
					<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
						<select  name="motor" id="motor" onchange="$('#motor_id').text($('#motor').find('option').filter(':selected').text())"> 
							<option value="">selecione</option>
								<option value="2 Tempos">2 Tempos </option>
								
								<option value="4 Tempos">4 Tempos</option>
								
								 
						</select> 
						<div name="motor_id" id="motor_id" class="cjt-wrapped-select-skin"><?php if (isset($team['motor'])) echo $team['motor']; else echo "-- selecione --"; ?></div>
						<div class="cjt-wrapped-select-icon"></div>
					</div>
			  		
					<div style="clear:both;"class="report-head">Cilindros: <span class="cpanel-date-hint"></span></div>
					<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
						<select  name="cilindros" id="cilindros" onchange="$('#cilindros_id').text($('#cilindros').find('option').filter(':selected').text())"> 
							<option value="">selecione</option>
								<option value="1">1</option>
								
								<option value="2">2</option>
								
								<option value="3">3</option>
								
								<option value="4">4</option>
								
								<option value="5">5</option>
								
								<option value="6">6</option>
								 
						</select> 
						<div name="cilindros_id" id="cilindros_id" class="cjt-wrapped-select-skin"><?php if (isset($team['cilindros'])) echo $team['cilindros']; else echo "-- selecione --"; ?></div>
						<div class="cjt-wrapped-select-icon"></div>
					</div> 
					 
					</div> 
				</div> 
			</div>
				<!-- ============================= // fim coluna direita // =====================================-->
		 </div> 
	 </div> 
		
	<!-- ********************************************* ABA Atributos --> 
		
	<div class="option_box" id="abapagamento">
		<div class="top-heading group">
			<div class="left_float"><h4>Opcionais e Itens de Série</h4></div>
		</div> 
		<div id="container_box">
			<div id="option_contents" class="option_contents">  
				<div class="form-contain group">
					<!-- =============================   coluna esquerda   =====================================-->
					<div class="starts col-md-6 col-xs-12 col-sm-12">   
					  <div id="detalhes_opcionais" class="detalhes_opcionais">
							<div class="left" style="width:100%;">
								<div class="left">
									<div class="left">
										<ul> 
											<li>
												<input type="checkbox" value="vea_alarme"  name="caracteristicas" class="cinput" <? if(array_search ("vea_alarme",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5099" class="label check" style="cursor: pointer;">Alarme</label>
											</li>	
											<li>
												<input type="checkbox" value="vea_alforge"  name="caracteristicas" class="cinput" <? if(array_search ("vea_alforge",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5099" class="label check" style="cursor: pointer;">Alforge</label>
											</li>	
											<li>
												<input type="checkbox" value="vea_amortecedor"  name="caracteristicas" class="cinput" <? if(array_search ("vea_amortecedor",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5099" class="label check" style="cursor: pointer;">Amortecedor de Direção</label>
											</li>	
											<li>
												<input type="checkbox" value="vea_bagageiro"  name="caracteristicas" class="cinput" <? if(array_search ("vea_bagageiro",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5099" class="label check" style="cursor: pointer;">Bagageiro</label>
											</li>	
											<li>
												<input type="checkbox" value="vea_bau"  name="caracteristicas" class="cinput" <? if(array_search ("vea_bau",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5099" class="label check" style="cursor: pointer;">Baú</label>
											</li>	
											<li>
												<input type="checkbox" value="vea_bolha"  name="caracteristicas" class="cinput" <? if(array_search ("vea_bolha",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5099" class="label check" style="cursor: pointer;">Bolha</label>
											</li>	
											<li>
												<input type="checkbox" value="vea_carenagem"  name="caracteristicas" class="cinput" <? if(array_search ("vea_carenagem",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5099" class="label check" style="cursor: pointer;">Carenagem</label>
											</li>
											<li>
												<input type="checkbox" value="vea_escapamento"  name="caracteristicas" class="cinput" <? if(array_search ("vea_escapamento",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5099" class="label check" style="cursor: pointer;">Escapamento Esportivo</label>
											</li>
									
										</ul>
									</div> 
								</div>
						</div>
					</div>
				</div>
					<!-- ============================= // fim coluna esquerda // =====================================-->
				<div class="ends col-md-6 col-xs-12 col-sm-12">  
						<div class="left">
							<ul> 
								<li>
									<input type="checkbox" value="vea_milha"  name="caracteristicas" class="cinput" <? if(array_search ("vea_milha",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5088" class="label check" style="cursor: pointer;">Farol de Milha</label>
								</li>
								<li>
									<input type="checkbox" value="vea_guidaoalum"  name="caracteristicas" class="cinput" <? if(array_search ("vea_guidaoalum",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5088" class="label check" style="cursor: pointer;">Guidão de Alumínio</label>
								</li>
								<li>
									<input type="checkbox" value="vea_injecao"  name="caracteristicas" class="cinput" <? if(array_search ("vea_injecao",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5088" class="label check" style="cursor: pointer;">Injeção Eletrônica</label>
								</li>	
								<li>
									<input type="checkbox" value="vea_mata"  name="caracteristicas" class="cinput" <? if(array_search ("vea_mata",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5088" class="label check" style="cursor: pointer;">Mata Cachorro</label>
								</li>	
								<li>
									<input type="checkbox" value="vea_partida"  name="caracteristicas" class="cinput" <? if(array_search ("vea_partida",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5088" class="label check" style="cursor: pointer;">Partida Elétrica</label>
								</li>	
								<li>
									<input type="checkbox" value="vea_pneuesp"  name="caracteristicas" class="cinput" <? if(array_search ("vea_pneuesp",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5088" class="label check" style="cursor: pointer;">Pneu Especial</label>
								</li>	
							
								<li>
									<input type="checkbox" value="vea_rodas"  name="caracteristicas" class="cinput" <? if(array_search ("vea_rodas",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5088" class="label check" style="cursor: pointer;">Rodas de Liga Leve</label>
								</li>	
								<li>
									<input type="checkbox" value="vea_travas"  name="caracteristicas" class="cinput" <? if(array_search ("vea_travas",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5088" class="label check" style="cursor: pointer;">Travas</label>
								</li>
					 
							</ul>
						</div>
				 </div>  
				<!-- ============================= // fim coluna direita // =====================================-->			
				</div> 
			</div> 
		</div>
	</div>
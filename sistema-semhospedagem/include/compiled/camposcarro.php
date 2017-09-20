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
							<input type="text" value="<?=$team['km']?>" onKeyPress="return SomenteNumero(event);" maxlength="8" style="text-align:left" name="km" id="km" >
							</li>
						</ul>
					   
					   <div id="numportas">
							<div style="clear:both;"class="report-head">Nº de Portas: <span class="cpanel-date-hint"></span></div>
							<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
								<select  name="numero_portas" id="numero_portas" onchange="$('#numero_portas_id').text($('#numero_portas').find('option').filter(':selected').text())"> 
									<option value="">selecione</option>
									
									<option value="2">2</option>
									
									<option value="3">3</option>
									
									<option value="4">4</option>
									
									<option value="5">5</option>
									
									<option value="6">6</option>
								</select> 
								<div name="numero_portas_id" id="numero_portas_id" class="cjt-wrapped-select-skin"><?php if (isset($team['numero_portas'])) echo $team['numero_portas']; else echo "-- selecione --"; ?></div>
								<div class="cjt-wrapped-select-icon"></div>
							</div>  
						</div>  
							  
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
								
								<option value="Diesel">Diesel</option>
									
								<option value="Etanol">Etanol</option>
								
								<option value="Flex">Flex</option>
								
								<option value="Gasolina">Gasolina</option>
								
								<option value="GNV">GNV</option>
								
								<option value="Híbrido">Híbrido</option>
								
								<option value="Tetrafuel">Tetrafuel</option>
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
								<option value="1.0">1.0</option>
								
								<option value="1.1">1.1</option>
								
								<option value="1.2">1.2</option>
								
								<option value="1.3">1.3</option>
								
								<option value="1.4">1.4</option>
								
								<option value="1.5">1.5</option>
								
								<option value="1.6">1.6</option>
								
								<option value="1.7">1.7</option>
								
								<option value="1.8">1.8</option>
								
								<option value="1.9">1.9</option>
								
								<option value="2.0">2.0</option>
								
								<option value="2.2">2.2</option>
								
								<option value="2.3">2.3</option>
								
								<option value="2.4">2.4</option>
								
								<option value="2.5">2.5</option>
								
								<option value="2.6">2.6</option>
								
								<option value="2.7">2.7</option>
								
								<option value="2.8">2.8</option>
								
								<option value="3.0">3.0</option>
								
								<option value="3.2">3.2</option>
								
								<option value="3.5">3.5</option>
								
								<option value="3.8">3.8</option>
								
								<option value="4.0">4.0</option>
								
								<option value="4.1">4.1</option>
								
								<option value="4.2">4.2</option>
								
								<option value="4.3">4.3</option>
								
								<option value="4.4">4.4</option>
								
								<option value="4.5">4.5</option>
								
								<option value="5.0">5.0</option>
								
								<option value="5.5">5.5</option>
								
								<option value="6.0">6.0</option>
						</select> 
						<div name="motor_id" id="motor_id" class="cjt-wrapped-select-skin"><?php if (isset($team['motor'])) echo $team['motor']; else echo "-- selecione --"; ?></div>
						<div class="cjt-wrapped-select-icon"></div>
					</div>
								
					<div style="clear:both;"class="report-head">Transmissão: <span class="cpanel-date-hint"></span></div>
					<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
						<select  name="transmissao" id="transmissao" onchange="$('#transmissao_id').text($('#transmissao').find('option').filter(':selected').text())"> 
							<option value="">selecione</option>
							<option value="Manual">Manual</option>
							
							<option value="Autom&aacute;tico">Autom&aacute;tico</option>
							
							<option value="Autom&aacute;tico">Automatizado</option>
							
							<option value="Tiptronic">Tiptronic</option>
						</select> 
						<div name="transmissao_id" id="transmissao_id" class="cjt-wrapped-select-skin"><?php if (isset($team['transmissao'])) echo utf8_decode($team['transmissao']); else echo "-- selecione --"; ?></div>
						<div class="cjt-wrapped-select-icon"></div>
					</div> 
					
								
					<div style="clear:both;"class="report-head">Cilindros: <span class="cpanel-date-hint"></span></div>
					<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
						<select  name="cilindros" id="cilindros" onchange="$('#cilindros_id').text($('#cilindros').find('option').filter(':selected').text())"> 
							<option value="">selecione</option>
								<option value="3">3</option>
								<option value="4">4</option>
								
								<option value="5">5</option>
								
								<option value="6">6</option>
								
								<option value="8">8</option>
								
								<option value="10">10</option>
								
								<option value="12">12</option>
								
								<option value="16">16</option>
								
								<option value="20">20</option>
								
								<option value="24">24</option>
						</select> 
						<div name="cilindros_id" id="cilindros_id" class="cjt-wrapped-select-skin"><?php if (isset($team['cilindros'])) echo $team['cilindros']; else echo "-- selecione --"; ?></div>
						<div class="cjt-wrapped-select-icon"></div>
					</div> 
					
					<div style="clear:both;"class="report-head">Tração: <span class="cpanel-date-hint"></span></div>
					<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
						<select  name="tracao" id="tracao" onchange="$('#tracao_id').text($('#tracao').find('option').filter(':selected').text())"> 
							<option value="">selecione</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								
								<option value="5">5</option>
								
								<option value="6">6</option>
								
								<option value="8">8</option>
								
								<option value="10">10</option>
								
								<option value="12">12</option>
								
								<option value="16">16</option>
								
								<option value="20">20</option>
								
								<option value="24">24</option>
						</select> 
						<div name="tracao_id" id="tracao_id" class="cjt-wrapped-select-skin"><?php if (isset($team['tracao'])) echo $team['tracao']; else echo "-- selecione --"; ?></div>
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
												<h4>CONFORTO</h4>
											</li>
											<li>
												<input type="checkbox" value="vea_arcondicionado" name="caracteristicas" class="cinput" <? if(array_search ("vea_arcondicionado",$caracteristicas) !== false){ echo 'checked="checked"'; } ?> >
												<label for="ppc_atr_id_5092" class="label check" style="cursor: pointer;">Ar condicionado</label>
											</li>
											<li>
												<input type="checkbox" value="vea_arquente"  name="caracteristicas" class="cinput"  <? if(array_search ("vea_arquente",$caracteristicas) !== false){ echo 'checked="checked"'; } ?> >
												<label for="ppc_atr_id_5095">Ar quente</label>
											</li>
											<li>
												<input type="checkbox" value="vea_bancosdecouro"  name="caracteristicas" class="cinput" <? if(array_search ("vea_bancosdecouro",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5098" class="label check" <? if(array_search("vea_bancosdecouro",$caracteristicas) != false){ echo "checked=checked"; } ?> style="cursor: pointer;">Bancos de Couro</label>
											</li>
											<li>
												<input type="checkbox" value="vea_direcaohidraulica"  name="caracteristicas" class="cinput" <? if(array_search ("vea_direcaohidraulica",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5093" class="label check" style="cursor: pointer;">Direção Hidr&aacute;ulica</label>
											</li>
											<li>
												<input type="checkbox" value="vea_espelhoseletricos"  name="caracteristicas" class="cinput" <? if(array_search ("vea_espelhoseletricos",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5096" class="label check" style="cursor: pointer;">Espelhos elétricos</label>
											</li>
											<li>
												<input type="checkbox" value="vea_limpadortraseiro"  name="caracteristicas" class="cinput" <? if(array_search ("vea_limpadortraseiro",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5087" class="label check" style="cursor: pointer;">Limpador traseiro</label>
											</li>
											<li>
												<input type="checkbox" value="vea_travacentral"  name="caracteristicas" class="cinput" <? if(array_search ("vea_travacentral",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5078" class="label check" style="cursor: pointer;">Trava central</label>
											</li>
											<li>
												<input type="checkbox" value="vea_travaeletrica"  name="caracteristicas" class="cinput" <? if(array_search ("vea_travaeletrica",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5099" class="label check" style="cursor: pointer;">Trava elétrica</label>
											</li>
											<li>
												<input type="checkbox" value="vea_travamentoportas"  name="caracteristicas" class="cinput" <? if(array_search ("vea_travamentoportas",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5097" class="label check" style="cursor: pointer;">Travamento portas</label>
											</li>
											<li>
												<input type="checkbox" value="vea_ctrlvolante"  name="caracteristicas" class="cinput" <? if(array_search ("vea_ctrlvolante",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5097" class="label check" style="cursor: pointer;">Controle no volante</label>
											</li>
											<li>
												<input type="checkbox" value="vea_altbancomanual"  name="caracteristicas" class="cinput" <? if(array_search ("vea_altbancomanual",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5097" class="label check" style="cursor: pointer;">Ajuste de altura do banco manual</label>
											</li>
											<li>
												<input type="checkbox" value="vea_altbancoauto"  name="caracteristicas" class="cinput" <? if(array_search ("vea_altbancoauto",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5097" class="label check" style="cursor: pointer;">Ajuste de altura do banco automática</label>
											</li>
											<li>
												<input type="checkbox" value="vea_altvolante"  name="caracteristicas" class="cinput" <? if(array_search ("vea_altvolante",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5097" class="label check" style="cursor: pointer;">Ajuste de altura do volante</label>
											</li>
											<li>
												<input type="checkbox" value="vea_distvolante"  name="caracteristicas" class="cinput" <? if(array_search ("vea_distvolante",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5097" class="label check" style="cursor: pointer;">Ajuste de distância do volante</label>
											</li>
										</ul>
									</div>
									
									<div class="left">
										<ul>
											<li>
												<h4>OUTROS</h4>
											</li>
											<li>
												<input type="checkbox" value="vea_computadordebordo"  name="caracteristicas" class="cinput" <? if(array_search ("vea_computadordebordo",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5088" class="label check" style="cursor: pointer;">Computador de bordo</label>
											</li>
											<li>
												<input type="checkbox" value="vea_desembacadortraseiro"  name="caracteristicas" class="cinput" <? if(array_search ("vea_desembacadortraseiro",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5091" class="label check" style="cursor: pointer;">Desembaçador Traseiro</label>
											</li>
											<li>
												<input type="checkbox" value="vea_pilotoautomatico"  name="caracteristicas" class="cinput" <? if(array_search ("vea_pilotoautomatico",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5100" class="label check" style="cursor: pointer;">Piloto Autom&aacute;tico</label>
											</li>
											<li>
												<input type="checkbox" value="vea_radioamfm" name="caracteristicas" class="cinput" <? if(array_search ("vea_radioamfm",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5082" class="label check" style="cursor: pointer;">R&aacute;dio AM\FM</label>
											</li>
											<li>
												<input type="checkbox" value="vea_rodasdeligaleve"  name="caracteristicas" class="cinput" <? if(array_search ("vea_rodasdeligaleve",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5086" class="label check" style="cursor: pointer;">Rodas de liga leve</label>
											</li>
											<li>
												<input type="checkbox" value="vea_vidroeletrico"  name="caracteristicas" class="cinput" <? if(array_search ("vea_vidroeletrico",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5094" class="label check" style="cursor: pointer;">Vidro Elétrico</label>
											</li>
											<li>
												<input type="checkbox" value="vea_camerare"  name="caracteristicas" class="cinput" <? if(array_search ("vea_camerare",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5094" class="label check" style="cursor: pointer;">Câmera de ré</label>
											</li>
											<li>
												<input type="checkbox" value="vea_multimidia"  name="caracteristicas" class="cinput" <? if(array_search ("vea_multimidia",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5094" class="label check" style="cursor: pointer;">Multimídia</label>
											</li>
											<li>
												<input type="checkbox" value="vea_sersortraseira"  name="caracteristicas" class="cinput" <? if(array_search ("vea_sersortraseira",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5094" class="label check" style="cursor: pointer;">Sensor traseiro de proximidade</label>
											</li>
											<li>
												<input type="checkbox" value="vea_sensordianteira"  name="caracteristicas" class="cinput" <? if(array_search ("vea_sensordianteira",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
												<label for="ppc_atr_id_5094" class="label check" style="cursor: pointer;">Sensor dianteiro de proximidade</label>
											</li>
										</ul>
									</div>
								</div>
						</div>
					</div>
				</div>
					<!-- ============================= // fim coluna esquerda // =====================================-->
					<!-- ============================= // coluna direita // =====================================-->
						<div class="ends col-md-6 col-xs-12 col-sm-12">  
						<div class="left">
							<ul>
								<li>
									<h4>SEGURANÇA</h4>
								</li>
								<li>
									<input type="checkbox" value="vea_airbagmotorista"  name="caracteristicas" class="cinput" <? if(array_search ("vea_airbagmotorista",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5070" class="label check" style="cursor: pointer;">Airbag (Só motorista)</label>
								</li>
								<li>
									<input type="checkbox" value="vea_airbags"  name="caracteristicas" class="cinput" <? if(array_search ("vea_airbags",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5074" class="label check" style="cursor: pointer;">Airbags</label>
								</li>
								<li>
									<input type="checkbox" value="vea_alarme"  name="caracteristicas" class="cinput" <? if(array_search ("vea_alarme",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5068" class="label check" style="cursor: pointer;">Alarme</label>
								</li>
								<li>
									<input type="checkbox" value="vea_alarmedistancia"  name="caracteristicas" class="cinput" <? if(array_search ("vea_alarmedistancia",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5072" class="label check" style="cursor: pointer;">Alarme &aacute; distância</label>
								</li>
								<li>
									<input type="checkbox" value="vea_blindagem"  name="caracteristicas" class="cinput" <? if(array_search ("vea_blindagem",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5077" class="label check" style="cursor: pointer;">Blindagem</label>
								</li>
								<li>
									<input type="checkbox" value="vea_faroldeneblina"  name="caracteristicas" class="cinput" <? if(array_search ("vea_faroldeneblina",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5076" class="label check" style="cursor: pointer;">Farol de Neblina</label>
								</li>
								<li>
									<input type="checkbox" value="vea_freiosabs"  name="caracteristicas" class="cinput" <? if(array_search ("vea_freiosabs",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5071" class="label check" style="cursor: pointer;">Freios ABS</label>
								</li>
								<li>
									<input type="checkbox" value="vea_insulfilme"  name="caracteristicas" class="cinput" <? if(array_search ("vea_insulfilme",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5073" class="label check" style="cursor: pointer;">Insulfilme</label>
								</li>
								<li>
									<input type="checkbox" value="vea_insulfilmeblindado"  name="caracteristicas" class="cinput" <? if(array_search ("vea_insulfilmeblindado",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5069" class="label check" style="cursor: pointer;">Insulfilme semi-blindado</label>
								</li>
								<li>
									<input type="checkbox" value="vea_pneureserva0km"  name="caracteristicas" class="cinput" <? if(array_search ("vea_pneureserva0km",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5085" class="label check" style="cursor: pointer;">Pneu reserva 0Km</label>
								</li>
								<li>
									<input type="checkbox" value="vea_tocafitas"  name="caracteristicas" class="cinput" <? if(array_search ("vea_tocafitas",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5080" class="label check" style="cursor: pointer;">Toca-fitas</label>
								</li>
								<li>
									<input type="checkbox" value="vea_vidrosverdes"  name="caracteristicas" class="cinput" <? if(array_search ("vea_vidrosverdes",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5089" class="label check" style="cursor: pointer;">Vidros verdes</label>
								</li>
							</ul>
						</div>
						<div class="left">
							<ul>
								<li>
									<h4>SOM</h4>
								</li>
								<li>
									<input type="checkbox" value="vea_cdplayer"  name="caracteristicas" class="cinput" <? if(array_search ("vea_cdplayer",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5079" class="label check" style="cursor: pointer;">CD Player</label>
								</li>
								<li>
									<input type="checkbox" value="vea_cdplayermp3"  name="caracteristicas" class="cinput" <? if(array_search ("vea_cdplayermp3",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5081" class="label check" style="cursor: pointer;">CD Player MP3</label>
								</li>
								<li>
									<input type="checkbox" value="vea_disqueteira"  name="caracteristicas" class="cinput" <? if(array_search ("vea_disqueteira",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5084" class="label check" style="cursor: pointer;">Disqueteira</label>
								</li>
								<li>
									<input type="checkbox" value="vea_dvd"  name="caracteristicas" class="cinput" <? if(array_search ("vea_dvd",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5083" class="label check" style="cursor: pointer;">DVD</label>
								</li>
								<li>
									<input type="checkbox" value="vea_protetordemotorecarter" name="caracteristicas" class="cinput" <? if(array_search ("vea_protetordemotorecarter",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5075" class="label check" style="cursor: pointer;">Protetor de motor e c&aacute;rter</label>
								</li>
								<li>
									<input type="checkbox" value="vea_tetosolar"  name="caracteristicas" class="cinput" <? if(array_search ("vea_tetosolar",$caracteristicas) !== false){ echo 'checked="checked"'; } ?>>
									<label for="ppc_atr_id_5090" class="label check" style="cursor: pointer;">Teto Solar</label>
								</li>
							</ul>
						</div>
						
					   </div> 
					</div>
					<!-- ============================= // fim coluna direita // =====================================-->
				</div> 
			</div>
		</div>
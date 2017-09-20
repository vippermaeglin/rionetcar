<?php include template("manage_header");?>
<?php require("ini.php");?> 

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
				<form id="nform" id="nform"  method="post" action="/vipmin/team/edit.php?id=<?php echo $team['id']; ?>" enctype="multipart/form-data" class="validator">
				<input type="hidden" id="id" name="id" value="<?php echo $team['id']; ?>" />
				<input type="hidden" name="guarantee" value="Y" />
				<input type="hidden" name="system" value="Y" /> 
				<input type="hidden" name="www" id="www"  value="<?=$INI['system']['wwwprefix']?>" /> 
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Informações da Oferta <?=$team['id']?></h4></div>
							<div class="the-button" style="width:543px;"> 
								<input type="hidden" value="remote" id="deliverytype" name="deliverytype">
								<input type="hidden" value="simples" id="team_type" name="team_type">
								<div style="float:left;"><button onclick="doupdate();" id="run-button" class="input-btn" type="button"><div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Salvar</div></button></div>
								<div style="float:left;"><button  onclick="javascript:location.href='<?=$ROOTPATH?>/vipmin/category/index.php?zone=group'"  id="run-button" class="input-btn" type="button"><div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Categoria de oferta</div></button></div>
								<div style="float:left;"><button  onclick="javascript:location.href='<?=$ROOTPATH?>/vipmin/category/index.php?zone=city'"  id="run-button" class="input-btn" type="button"><div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Cidade da oferta</div></button></div>
								<div style="float:left;"><button  onclick="javascript:location.href='configuraveis.php'"  id="run-button" class="input-btn" type="button"><div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Listar Ofertas Configuráveis</div></button></div>
								
							</div> 
					</div> 
				 
					 <div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">
									<!-- 
									<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;">
									   <span class="report-label">Tipo:</span>  
										<input style="width:20px;" type="radio" <?=$checknormal?> value="normal" name="team_type" onclick="verifica_tipo_oferta('normal');"> Normal  &nbsp;<img class="tTip" title="Normal: Este é o tipo de oferta tradicional. Ex: A oferta custa R$ 100,00. O usuário irá fazer um pagamento online no valor de R$ 100,00." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										<input style="width:20px;" type="radio" <?=$checkcupom?>value="cupom" name="team_type" value="cupom" onclick="verifica_tipo_oferta('cupom');"> Cupom  &nbsp;<img style="cursor:help" class="tTip" title="Cupom: Geralmente é a sua comissão. Ex: A oferta custa R$ 100,00. O valor do cupom custa R$ 10,00. O usuário irá fazer um pagamento online de R$ 10,00 e R$ 100,00 será pago no parceiro." id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										<input style="width:20px;" type="radio" <?=$checkparticipe?>value="participe" name="team_type" value="participe" onclick="verifica_tipo_oferta('participe');"> Promoção  &nbsp;<img style="cursor:help" class="tTip" title="Promoção: Ofertas não comerciais ou seja, não há pagamento. Geralmente usado para atrair usuários. Ex: cadastre e ganhe, concorra... Seja criativo." id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										<input style="width:20px;" type="radio" <?=$checkoff?> value="off" name="team_type" value="off" onclick="verifica_tipo_oferta('off');"> Pagar no parceiro  &nbsp;<img class="tTip" title="OFF: Ofertas comerciais porém sem pagamento online. O pagamento é feito somente no parceiro. O cupom será gerado online após o pedido. ( Geralmente p\ donos de lojas de pequenas cidades ou bairros)" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										<? if($INI['option']['pontuacao']=="Y"){?><input style="width:20px;" type="radio" <?=$checkoespecial?>  name="team_type" value="especial" onclick="verifica_tipo_oferta('especial');"> Pontuacao  &nbsp;<img class="tTip" title="São ofertas exclusivas para compra com pontos e apenas com pontos. Para isso, você deve ativar o módulo de pontuação em Sistema->Configuração. Este tipo de oferta aparece apenas no menu Ofertas Epeciais." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"><? } ?> 
									</div> 
									-->
									<div style="clear:both;"class="report-head">Nome da Oferta: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" name="title"  maxlength="162" id="title" class="format_input" value="<?php echo htmlspecialchars($team['title']); ?>" />  <img style="cursor:help" class="tTip" title="Se você tem 3 opções de uma mesma oferta com valores diferentes para cada opção, então crie 3 ofertas e associe em um mesmo pacote. Ex: 3, 5 ou 10 sessões de Peeling..." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
									</div> 
									<div style="clear:both;"class="report-head">Note que informações como cidade, categoria, parceiro imagens descrição, regulamento entre outros, serão herdados do pacote. <span class="cpanel-date-hint"></span></div>
									<div style="clear:both;"class="report-head"> Estas ofertas não irão aparecer no site individualmente como as ofertas tradicionais. Elas só iráo aparecer juntamente com o pacote. <span class="cpanel-date-hint"></span></div>
									<div style="clear:both;"class="report-head"><span class="cpanel-date-hint"><a href="javascript:pac1();">clique aqui</a> para ver um exemplo de pacote</span></div>
									<div style="clear:both;"class="report-head"><span class="cpanel-date-hint"><a href="javascript:pac2();">clique aqui</a> para ver um exemplo das ofertas no pacote</span></div>
									<!--
									<div class="report-head">Cidade: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  name="city_id" id="city_id" onchange="$('#select_city_id').text($('#city_id').find('option').filter(':selected').text())"> 
											 <?php echo Utility::Option(Utility::OptionArray($allcities, 'id','name'), $team['city_id'], 'todas as cidades'); ?>
										</select> 
										<div name="select_city_id" id="select_city_id" class="cjt-wrapped-select-skin">todas as cidades</div>
										<div class="cjt-wrapped-select-icon"></div>
										</div> &nbsp;<img class="tTip" title="Informe a cidade desta oferta ou deixe em todas as cidades." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div> 
									-->
									<!--
									<div id="c_categoria">
										<div class="report-head">Categoria: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
											<select  name="group_id" id="group_id" onchange="$('#select_group_id').text($('#group_id').find('option').filter(':selected').text())"> 
												 <?php 
														$sql = "select * from category where id_pai=0";
														$rs = mysql_query($sql);
														while($l = mysql_fetch_assoc($rs)){
															echo "<option value='$l[id]'>$l[name]</option>";
															exibe_filhos($l["id"],$indentacao);
														}
														$tb = null; 

													 ?>
											</select>
											<div name="select_group_id" id="select_group_id" class="cjt-wrapped-select-skin">Informe a categoria desta oferta</div>
											<div class="cjt-wrapped-select-icon"></div>
											</div> &nbsp;<img class="tTip" title="Você pode escolher uma categoria para esta oferta. Isso ajuda os usuários a encontrar uma oferta caso o seu site tenha bastante ofertas." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										</div> 
									</div> 
									-->
									
									<!--
									<div class="report-head">Condição <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  name="buyonce" id="buyonce" onchange="$('#select_buyonce').text($('#buyonce').find('option').filter(':selected').text())"> 
											<?php echo Utility::Option($option_buyonce, $team['buyonce']); ?>
										</select>
										<div name="select_buyonce" id="select_buyonce" class="cjt-wrapped-select-skin">Informe a condição desta oferta</div>
										<div class="cjt-wrapped-select-icon"></div>
										</div> &nbsp;<img class="tTip" title="Informe a condição que melhor se adeque a esta oferta. Geralmente é uma política do parceiro. " style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div> 
									-->
								</div>
								<!-- =============================   fim coluna esquerda   =====================================-->
								<!-- =============================   coluna direita   =====================================-->
								
								<div class="ends">
								
									<div class="report-head">Pacote: <span class="cpanel-date-hint">Informe o pacote desta oferta</span></div>
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  name="idpacote" id="idpacote" onchange="$('#select_idpacote').text($('#idpacote').find('option').filter(':selected').text())"> 
											<option value=""> </option>
											<?php 
												$sql = "SELECT id, title FROM team where team_type = 'pacote'";
												$rs = mysql_query($sql);
												
												while($l = mysql_fetch_assoc($rs)){
													?> <option value='<?=$l[id]?>' <? if($l[id]==$team['idpacote']) { echo "selected"; } ?> ><?=displaySubStringWithStrip($l['title'],58)?></option>
												<? }
												
												$tb = null; 
											?>
										</select> 
										<div name="select_idpacote" id="select_idpacote" class="cjt-wrapped-select-skin">-- selecione um pacote --</div>
										<div class="cjt-wrapped-select-icon"></div>
										</div> &nbsp;<img class="tTip" title="Quando o usuário clicar em comprar este pacote, irá aparecer as opções para ele escolher. Estas opções serão estas ofertas cadastradas nesta tela." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div> 
									
									 <div class="report-head">Seleção de Opções: <span class="cpanel-date-hint">Ex: {110 volts}{220 volts}</span></div>
										<div class="group">
											<input type="text" id="condbuy" name="condbuy" value="<?php echo  $team['condbuy'] ; ?>"> &nbsp;<img class="tTip" title="Ideal para você criar opções para a escolha do cliente. Ex: Oferta de uma camisa que contém 3 tipos de cores. Então informe neste padrão {Branca}{Azul}{Preta}" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									 </div>	
										
									<!--
									<div id="url_botao_comprar">									
										<div class="report-head">Url Externa: <span class="cpanel-date-hint">Ideal para programa de afiliados. (com http://)</span></div>
										<div class="group">
											<input type="text" id="url_comprar" name="url_comprar" value="<?php echo  $team['url_comprar'] ; ?>"> &nbsp;<img class="tTip" title="O sistema irá redirecionar o usuário para o link informado quando ele clicar no botão comprar desta oferta, ( com http://). Deixe em branco para não redirecionar <br> Ideal para usar em programa de afiliados." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										</div>	
									</div>	
									
									<div id="c_posicionamento">
										<div class="report-head">Posicionamento : <span class="cpanel-date-hint"></span></div>
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
											<select  name="posicionamento" id="posicionamento" onchange="$('#select_posicionamento').text($('#posicionamento').find('option').filter(':selected').text());verlayout();"> 
												<?php echo Utility::Option($option_posicao, $team['posicionamento']); ?>
											</select>
											<div name="select_posicionamento" id="select_posicionamento" class="cjt-wrapped-select-skin">Informe a posição desta oferta</div>
											<div class="cjt-wrapped-select-icon"></div>
										</div> &nbsp;<img class="tTip" title="Oferta Destaque: É a oferta principal ao entrar no site. Oferta destaque nacional: Fica na coluna da direita e no topo. Oferta Desativada: Não aparece no site." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>
									
									<div id="parceirobk">
										<div class="report-head">Parceiro : <span class="cpanel-date-hint"></span></div>
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
											<select  name="partner_id" id="partner_id" onchange="$('#select_partner_id').text($('#partner_id').find('option').filter(':selected').text())"> 
												<option value="">Informe o parceiro desta oferta</option>
												<?php echo Utility::Option($partners, $team['partner_id']); ?>
											</select>
											<div name="select_partner_id" id="select_partner_id" class="cjt-wrapped-select-skin">Informe o parceiro desta oferta</div>
											<div class="cjt-wrapped-select-icon"></div>
										</div> &nbsp;<img class="tTip" title="Parceiro responsável pela oferta." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>
									<div id="c_obscupom">									
										
									</div>	 									
									<div class="report-head">Ordenação: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" id="sort_order" onKeyPress="return SomenteNumero(event);"  name="sort_order" value="<?php echo $team['sort_order'] ? $team['sort_order'] : 0; ?>"> &nbsp;<img class="tTip" title="Informe a ordem de posicionamento desta oferta no site. Oferta com número de ordem maior ficam em primeiro lugar. ( coluna da direita )" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>	
									 -->
								 </div>
								
								<!-- =============================  fim coluna direita  =====================================-->
							</div> 
						</div>
					</div>
				</div>
				<!-- ********************************************* ABA Controle de Estoque e periodo --> 
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Controle de estoque</h4></div>
					</div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">
									<div id="c_vendas">	
									  
										 
										<div style="clear:both;"class="report-head">Quantidade para ativar: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="min_number"   onKeyPress="return SomenteNumero(event);"  id="min_number" class="format_input"  value="<?php echo intval($team['min_number']); ?>" maxLength="6"  />  <img style="cursor:help" class="tTip" title="Quantidade mínima necessária para ativar esta oferta. Note que o cupom só será enviado automaticamente após esse valor ser alcançado.Lembre-se de seguir os passos para a integração com o gateway" src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div> 	
									 
										<div style="clear:both;"class="report-head">Quantidade mínima por pessoa: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="minimo_pessoa"  onKeyPress="return SomenteNumero(event);"   id="minimo_pessoa" class="format_input"  value="<?php echo intval($team['minimo_pessoa']); ?>" maxLength="6"  />  <img style="cursor:help" class="tTip" title="Quantidade mínima para finalizar o pedido. Ex: Para comprar esta oferta, o cliente deverá comprar 5 unidades ou mais." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div> 
										
									</div>
									<div id="c_estoque">
									
										<div style="clear:both;"class="report-head">Quantidade máxima por pessoa: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="per_number"  onKeyPress="return SomenteNumero(event);"   id="per_number" class="format_input"  value="<?php echo intval($team['per_number']); ?>" maxLength="6"  />  <img style="cursor:help" class="tTip" title="Quantidade máxima que cada cliente poderá comprar." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div>
										
										<div style="clear:both;"class="report-head">Estoque: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="max_number"  onKeyPress="return SomenteNumero(event);"  id="max_number" class="format_input"  value="<?php echo intval($team['max_number']); ?>" maxLength="6"  />  <img style="cursor:help" class="tTip" title="Quantidade máxima a ser vendida no site." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div> 
									</div> 
									 
									<div id="c_compradores_virtuais">
										<div style="clear:both;"class="report-head">Quantidade de compradores virtuais <span class="cpanel-date-hint">Irá influenciar na ativação da oferta</span></div>
										<div class="group">
											<input type="text" name="pre_number"  onKeyPress="return SomenteNumero(event);"   id="pre_number" class="format_input"  value="<?php echo intval($team['pre_number']); ?>" maxLength="6"  />  <img style="cursor:help" class="tTip" title="Se o total de compradores virtuais + reais for menor do que o mínimo para ativar, o cupom desta oferta avulsa não será enviado mesmo que o pacote esteja ativo." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div>
									</div>
									 
									<!--
									<div id="c_pontos_quant">	
										<div style="clear:both;"class="report-head">Pontos Necessários: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="pontos"  onKeyPress="return SomenteNumero(event);"  id="pontos"   value="<?php echo intval($team['pontos']); ?>"   />  <img style="cursor:help" class="tTip" title="Informe a quantidade de pontos necessários para comprar este produto." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div>  
									</div>
									-->
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
								 
								<div class="ends"> 
									<div class="report-head">Data início: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input style="width:40%;" type="text"  xd="<?php echo date('d/m/Y', $team['begin_time']); ?>" name="begin_time" id="begin_time" class="format_input"  maxlength="10"  value="<?php echo date('d/m/Y', $team['begin_time']); ?>"/>
										 <img  style="cursor:pointer;" onclick="javascript:displayCalendar(document.forms[0].begin_time,'dd/mm/yyyy',this);" alt="select date" src="<?=$ROOTPATH?>/media/css/i/calendar.png"> 
									</div> 
								 
									<div class="report-head">Hora início: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input style="width:40%;" type="text" id="begin_time2"  name="begin_time2"  value="<?php echo  $team['begin_time2'] ; ?>"  class="format_input"  maxlength="10"  />
									</div>   
									<div class="report-head">Data fim: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input style="width:40%;" type="text"  xd="<?php echo date('d/m/Y', $team['end_time']); ?>" name="end_time" id="end_time" class="format_input"  maxlength="10"  value="<?php echo date('d/m/Y', $team['end_time']); ?>"/>
										 <img  style="cursor:pointer;" onclick="javascript:displayCalendar(document.forms[0].end_time,'dd/mm/yyyy',this);" alt="select date" src="<?=$ROOTPATH?>/media/css/i/calendar.png"> 
									</div> 
								 
									<div class="report-head">Hora fim: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input style="width:40%;" type="text" name="end_time2" id="end_time2"   value="<?php echo  $team['end_time2'] ; ?>"  class="format_input"  maxlength="10"  />
									</div> 
									 <div  id="cupomate">
										<div class="report-head">Data fim para consumação: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input style="width:40%;" type="text"  xd="<?php echo date('d/m/Y', $team['expire_time']); ?>" name="expire_time" id="expire_time" class="format_input"  maxlength="10"  value="<?php echo date('d/m/Y', $team['expire_time']); ?>"/>
											 <img  style="cursor:pointer;" onclick="javascript:displayCalendar(document.forms[0].expire_time,'dd/mm/yyyy',this);" alt="select date" src="<?=$ROOTPATH?>/media/css/i/calendar.png"> 
										</div> 
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
										 
										<div style="clear:both;"class="report-head">De:  <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="market_price" maxlength="11"  id="market_price" class="format_input"   value="<?php echo $team['market_price'] ; ?>" />  <img style="cursor:help" class="tTip" title="Valor antigo da oferta." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div> 
										 
										<div style="clear:both;"class="report-head">Por: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="team_price"  id="team_price" maxlength="11" class="format_input"   value="<?php echo  $team['team_price'] ; ?>"  />  <img style="cursor:help" class="tTip" title="Valor atual da oferta" src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div> 	
									</div>
									<!--
									<div id="c_comissao">
										<div style="clear:both;"class="report-head">Valor do cupom: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="preco_comissao"  id="preco_comissao" maxlength="11" class="format_input"   value="<?php echo  $team['preco_comissao'] ; ?>"   />  <img style="cursor:help" class="tTip" title="O cliente paga um valor pequeno pelo cumpom para garantir o desconto no parceiro. Se você está vendendo um produto de um site, sugerimos informar na descrição da oferta a url deste produto, para que o usuário veja realmente a diferença do preço do produto. Isto é ideal, uma vez que ele irá ver a economia comprando o seu cupom." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div> 
									</div> 
									-->
									<!--
									<div id="bonusate" style="display:none;">	
										<div style="clear:both;"class="report-head">Limite de bonus: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="bonuslimite" maxlength="11"  id="bonuslimite" class="format_input"    value="<?php echo $team['bonuslimite'] ; ?>" />  <img style="cursor:help" class="tTip" title="Valor máximo que o usuário poderá usar dos seus bonus. Ex: O usuário tem R$ 100,00 no site, mais para esta oferta, ele só pode usar R$ 30,00.  Deixe vazio para não limitar." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div>	
									</div>	
									-->
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
									<!--
									<div class="ends"> 
								    </div> 
								   -->
								</div>
								<!-- ============================= // fim coluna direita // =====================================-->
							</div> 
						</div>
					</div>
				 
				 <!-- ********************************************* ABA Fotos 
				<div class="option_box">
					<div class="top-heading group"> <div class="left_float"><h4>Imagens da Oferta ( Redimensionamento automático )</h4> </div> </div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
							<!--	<div class="starts">  
									<div style="clear:both;"class="report-head">Foto 1:  <span class="cpanel-date-hint"><span id="dimensao"></span>  <a target="_blank" href="http://www.sistemacomprascoletivas.com.br/sistemacompracoletiva/nossos-produtos/marketing-propaganda/vipcom-arte/">Ver planos de criação de imagens</a> </span> &nbsp;<img class="tTip" title="Note que a dimensão ideal altera conforme o posicionamento da oferta. Caso altere esta oferta para destaque com o super banner ativado, refaça o upload para as novas dimensões do super banner." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> 
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
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
							<!--	<div class="ends"> 
									<div style="clear:both;"class="report-head">Foto 5:  <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image2"  id="gal_upload_image5" class="format_input"   value="<?php  $team['gal_upload_image2'] ; ?>" /> <?php if($team['gal_image2']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image2']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image2');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span> <?php }?>   
									</div> 
									<div style="clear:both;"class="report-head">Foto 6: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image3"  id="gal_upload_image6" class="format_input"   value="<?php  $team['gal_upload_image3'] ; ?>" />   <?php if($team['gal_image3']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image3']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image3');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
									</div> 
									<div style="clear:both;"class="report-head">Foto 7: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image4"  id="gal_upload_image7" class="format_input"   value="<?php  $team['gal_upload_image4'] ; ?>" />  <?php if($team['gal_image4']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['gal_image4']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image4');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span> <?php }?> 
									</div> 
									<div style="clear:both;"class="report-head">Foto 8: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image5"  id="gal_upload_image8" class="format_input"   value="<?php  $team['gal_upload_image5'] ; ?>" />   <?php if($team['gal_image5']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['gal_image5']); ?>&nbsp;&nbsp;<a href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image5');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
									</div> 
								 </div> 
								</div>
								<!-- ============================= // fim coluna direita // =====================================-->
							<!--</div> 
						</div>
					</div> 
					-->
					
				<!-- ********************************************* ABA Foto Auxiliar  
				<div class="option_box" id="c_estaticas">
					<div class="top-heading group"> <div class="left_float"><h4>Imagens Estáticas ( Não redimensiona - Opcional )</h4> </div> </div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<!--<div class="starts">  
									<div style="clear:both;"class="report-head">Home:  <span class="cpanel-date-hint"> Dimensão exata: 192px x 163px.  </span> &nbsp;<img class="tTip" title="Opcionalmente, você pode fazer o upload da imagem redimensionada manualmente por você para este bloco. Note que se você fizer este upload, o sistema irá ignorar o redimensionamento automático para esse bloco e usar a sua imagem. Dimensão exata para a Home: 209px x 163px." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> 
									</div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="estatica_home"  id="estatica_home" class="format_input"  value="<?php  $team['estatica_home'] ; ?>" />  <?php if($team['estatica_home']){?> <br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['estatica_home']); ?>&nbsp;&nbsp;<a href="#" onclick="delimagem(<?php echo $team['id']; ?>, 'estatica_home');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span> <?php }?>
									 </div> 
									<div style="clear:both;"class="report-head">Direita: <span class="cpanel-date-hint"> Dimensão exata: 110px x 67px.</span> &nbsp;<img class="tTip" title="Opcionalmente, você pode fazer o upload da imagem redimensionada manualmente por você para este bloco. Note que se você fizer este upload, o sistema irá ignorar o redimensionamento automático para esse bloco e usar a sua imagem. Dimensão exata para a lateral: 110px x 67px." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="estatica_direita"  id="estatica_direita" class="format_input"   value="<?php  $team['estatica_direita'] ; ?>" />   <?php if($team['estatica_direita']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['estatica_direita']); ?>&nbsp;&nbsp;<a href="#" onclick="delimagem(<?php echo $team['id']; ?>, 'estatica_direita');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?> 
									</div> 
								 
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
								<!--<div class="ends"> 
									<div style="clear:both;"class="report-head">Detalhe: <span class="cpanel-date-hint">Dimensão exata: 720px x 273px.</span>&nbsp;<img class="tTip" title="Opcionalmente, você pode fazer o upload da imagem redimensionada manualmente por você para este bloco. Note que se você fizer este upload, o sistema irá ignorar o redimensionamento automático para esse bloco e usar a sua imagem. Dimensão exata para a lateral: 720px x 273px." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="estatica_detalhe"  id="estatica_detalhe" class="format_input"   value="<?php  $team['estatica_detalhe'] ; ?>" />   <?php if($team['estatica_detalhe']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['estatica_detalhe']); ?>&nbsp;&nbsp;<a href="#" onclick="delimagem(<?php echo $team['id']; ?>, 'estatica_detalhe');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
									</div> 
									<div style="clear:both;"class="report-head">Recentes: <span class="cpanel-date-hint">Dimensão exata: 268px x 162px.</span>&nbsp;<img class="tTip" title="Opcionalmente, você pode fazer o upload da imagem redimensionada manualmente por você para este bloco. Note que se você fizer este upload, o sistema irá ignorar o redimensionamento automático para esse bloco e usar a sua imagem. Dimensão exata para a lateral: 268px x 162px." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="estatica_recentes"  id="estatica_recentes" class="format_input"   value="<?php  $team['estatica_recentes'] ; ?>" />   <?php if($team['estatica_recentes']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['estatica_recentes']); ?>&nbsp;&nbsp;<a href="#" onclick="delimagem(<?php echo $team['id']; ?>, 'estatica_recentes');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
									</div>  
								 </div> 
								</div>
								<!-- ============================= // fim coluna direita // =====================================-->
							<!--</div> 
						</div>
					</div>
					-->
					
					<!-- ********************************************* ABA FRETE --> 
					<div class="option_box" id="c_frete"> 
						<div class="top-heading group"> <div class="left_float"><h4>Frete </h4> </div> </div> 
						<div id="container_box">
							<div id="option_contents" class="option_contents">  
								<div class="form-contain group">
									<!-- =============================   coluna esquerda   =====================================-->
									<div class="starts">
										
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;">
										   <span class="report-label">Frete:</span>  
											<input style="width:20px;" type="radio"  <?=$frete_sim?> value="1"    id="frete" name="frete"> Ativado  &nbsp;<img class="tTip" title="Se ativado, o sistema irá mostrar a opção de endereço de entrega e calcular o valor do frete baseado em uma consulta nos correios. Esse valor será adicionado ao valor da compra. O usuário irá pagar o valor da compra + o valor do frete." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio"  <?=$frete_nao?>  value="0" id="frete"  name="frete" > Desativado  &nbsp; 
										 </div> 
										 
									    <div style="clear:both;"class="report-head"><span class="cpanel-date-hint">Válido somente para os gateways Pagseguro, Pagamento Digital e Mercado Pago</span></div>
										
										<div style="clear:both;"class="report-head"><span class="cpanel-date-hint">Veja as opções de frete no seu gateway de pagamento. Ex: www.pagseguro.com.br em Preferencias->Frete</span></div>
										<div style="clear:both;"class="report-head">Cep de Origem: <span class="cpanel-date-hint">Apenas números: Ex: 30480000</span></div>
										<div class="group">
											<input type="text" name="ceporigem"  maxlength="162" id="ceporigem" class="format_input" value="<?php echo  $team['ceporigem'] ; ?>" />  <img style="cursor:help" class="tTip" title="O valor do frete será calculado baseado no cep de origem. Ou seja, o cep de onde este produto está sendo enviado." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div> 
										<div style="clear:both;"class="report-head">Peso: <span class="cpanel-date-hint">Peso mínimo : 1</span></div>
										<div class="group">
											<input type="text" name="peso"  maxlength="162" id="peso" class="format_input" value="<?php echo  $team['peso'] ; ?>" />  <img style="cursor:help" class="tTip" title="O valor do frete será calculado baseado no peso deste produto." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div> 
										<div style="clear:both;"class="report-head">Altura: <span class="cpanel-date-hint">Altura mínima: 2</span></div>
										<div class="group">
											<input type="text" name="altura"  maxlength="162" id="altura" class="format_input" value="<?php echo  $team['altura'] ; ?>" />  <img style="cursor:help" class="tTip" title=" O valor do frete será calculado baseado na altura deste produto." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div>
										  
									</div>
									<!-- =============================   fim coluna esquerda   =====================================-->
									<!-- =============================   coluna direita   =====================================-->
									<div class="ends">
										 								
										 
										<div style="clear:both;"class="report-head">Largura: <span class="cpanel-date-hint">Largura mínima: 11</span></div>
										<div class="group">
											<input type="text" name="largura"  maxlength="162" id="largura" class="format_input" value="<?php echo  $team['largura'] ; ?>" />  <img style="cursor:help" class="tTip" title="O valor do frete será calculado baseado na largura deste produto." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div> 
										<div style="clear:both;"class="report-head">Comprimento: <span class="cpanel-date-hint">Comprimento mínimo: 16</span></div>
										<div class="group">
											<input type="text" name="comprimento"  maxlength="162" id="comprimento" class="format_input" value="<?php echo  $team['comprimento'] ; ?>" />  <img style="cursor:help" class="tTip" title="O valor do frete será calculado baseado no comprimento deste produto." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div>	
										
										<div style="clear:both;"class="report-head">Fixar valor do frete: <span class="cpanel-date-hint"> Deixe em 0,00 para não fixar.</span></div>
										<div class="group">
											<input type="text" name="valorfrete"  maxlength="162" id="valorfrete" class="format_input" value="<?php echo  $team['valorfrete'] ; ?>" />  <img style="cursor:help" class="tTip" title="Você pode alterar o valor do frete, neste caso, o sistema irá usar o valor que você escolher." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div> 
										
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;">
										   <span class="report-label">Frete grátis:</span>  
											<input style="width:20px;" type="radio"  <?=$fretegratuito_sim?> value="1"    id="fretegratuito" name="fretegratuito"> Ativado  &nbsp;<img class="tTip" title="Se ativado, o sistema irá mostrar normalmente os dados de endereço de entrega porém o frete será gratuito ignorando todos os valores de frete." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio"  <?=$fretegratuito_nao?>  value="0" id="fretegratuito"  name="fretegratuito" > Desativado  &nbsp; 
										</div> 
										 
								 </div>
								<!-- =============================  fim coluna direita  =====================================-->
							</div> 
						</div>
					</div>
				</div> 
				
					 <!-- ********************************************* ABA Descrição da oferta 
					<div class="option_box">
						<div class="top-heading group"> <div class="left_float"><h4>Descrição da Oferta</h4> </div> &nbsp;<img class="tTip" title="DICA: Se você está copiando esta descrição de algum site ou documento, recomendamos primeiro copiar e colar no bloco de notas, logo em seguida, copie do bloco de notas e cole aqui no editor. Isto irá retirar todas as formatações indevidas. Uma vez que isto pode danificar o seu site." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </div> 
						 
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
					-->
					
					<!-- ********************************************* ABA Regulamento da oferta  
					<div class="option_box">
						<div class="top-heading group"> <div class="left_float"><h4>Regulamento da Oferta</h4> </div> &nbsp;<img class="tTip" title="DICA: Se você está copiando esta descrição de algum site ou documento, recomendamos primeiro copiar e colar no bloco de notas, logo em seguida, copie do bloco de notas e cole aqui no editor. Isto irá retirar todas as formatações indevidas. Uma vez que isto pode danificar o seu site." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </div> 
						 <div id="container_box">
							<div id="option_contents" class="option_contents">  
								<div class="form-contain group"> 
									<div class="text_area">  
									<textarea cols="45" rows="5" name="notice" style="width:100%" id="notice" class="format_input" ><?php echo htmlspecialchars($team['notice']); ?></textarea>
									</div> 
								</div> 
							</div> 
						</div>
					</div> 
					-->
					
					<!-- ********************************************* ABA Mais informações da oferta   
					<div class="option_box"  style="display:none;" id="maisinfo">
						<div class="top-heading group"> <div class="left_float"><h4>Mais informações no final do pedido</h4> </div>   </div> 
						 <div id="container_box">
							<div id="option_contents" class="option_contents">  
								<div class="form-contain group"> 
									<div class="text_area">  
									<textarea cols="45" rows="5" name="maisinformacoes" style="width:100%" id="maisinformacoes" class="format_input" ><?php echo htmlspecialchars($team['maisinformacoes']); ?></textarea>
									</div> 
								</div> 
							</div> 
						</div>
					</div> 
					-->
					
					<!-- ********************************************* ABA Retorno participacao  
					<div id="retorno_participe" style="display:none;" class="option_box">  
						<div class="top-heading group"> <div class="left_float"><h4>Descrição de retorno da Participação (opcional)</h4> </div> &nbsp;<img class="tTip" title="Quando o usuário clicar em 'Quero Participar', a participação dele será registrada no sistema, e ainda, você pode definir o Feedback para o usuário, ou seja, o conteúdo da página que ele irá visualizar após o registro. Você pode criar uma página no dreamweaver e depois colocar o código fonte aqui." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </div> 
						 <div id="container_box">
							<div id="option_contents" class="option_contents">  
								<div class="form-contain group"> 
									<div class="text_area">  
									<textarea cols="45" rows="5" name="retornoparticipe" style="width:100%" id="retornoparticipe" class="format_input" ><?php echo htmlspecialchars($team['retornoparticipe']); ?></textarea>
									</div> 
								</div> 
							</div> 
						</div>
					</div> 	
					-->
					
					<!-- ********************************************* ABA Tela de Pagamento --> 
					<div  id="infopagamento"  class="option_box">  
						<div class="top-heading group"> <div class="left_float"><h4>Informações na Tela de Pagamento (opcional)</h4> </div> </div> 
						 <div id="container_box">
							<div id="option_contents" class="option_contents">  
								<div class="form-contain group"> 
									<div class="text_area">  
									 <textarea cols="45" rows="5" name="detail" style="width:100%" id="detail" class="format_input" ><?php echo htmlspecialchars($team['detail']); ?></textarea>
									</div> 
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
var www = jQuery("#www").val();
  
verifica_tipo_oferta("<?php echo $team['team_type']; ?>");
 
$('#team_price').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});
  
 $('#market_price').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});

$('#valorfrete').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});
 

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
		document.forms[0].submit();
	}
}

function campoobg(campo){
 
	$("#"+campo).css("background", "#F9DAB7");
 
}

if( jQuery("#id").val() ==""){	 
 
}
else{  
	$('#select_idpacote').text($('#idpacote').find('option').filter(':selected').text());
}

function verlayout(){
   
   if(jQuery("#posicionamento").val() == "6"){ // posicionalmento 6 = super banner
   
	   $.get(WEB_ROOT+"/vipmin/funcoes.php?acao=destaque",
	   
	   function(data){
		  if(jQuery.trim(data)!=""){
			alert(data); 
			jQuery("#posicionamento").val(4)  // posicionamento 4  =  detalhes
			$('#select_posicionamento').text($('#posicionamento').find('option').filter(':selected').text());
			jQuery("#dimensao").html("Dimensão ideal na página detalhe: 720px de largura por 273px de altura.")
		  }
		  else{
			jQuery("#dimensao").html("Dimensão ideal no super banner: 944px de largura por 256px de altura")
			}
		 
	   });
   }
   else if(jQuery("#posicionamento").val() == "10"){
   
	   $.get(WEB_ROOT+"/vipmin/funcoes.php?acao=destaquenacional",
				
	   function(data){
		  if(jQuery.trim(data)!=""){
			alert(data); 
			jQuery("#posicionamento").val(4)
			$('#select_posicionamento').text($('#posicionamento').find('option').filter(':selected').text());
		  }  
		 
	   });
	   jQuery("#dimensao").html("Dimensão ideal na página detalhe: 720px de largura por 273px de altura.")
   }
   else{
	jQuery("#dimensao").html("Dimensão ideal na página detalhe: 720px de largura por 273px de altura.")
   }
 
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
     	alert("Imagem apagada com sucesso. Após finalizar a edição da oferta clique no botão salvar para efetivar a exclusão desta imagem. ");
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
	tipopferta = $("input[@name=team_type]:checked").attr('value');

	if( jQuery("#title").val()==""){

		campoobg("title");
		alert("Por favor, informe o nome da oferta.");
		jQuery("#title").focus();
		return false;
	}
	if( jQuery("#idpacote").val()==""){

		campoobg("idpacote");
		alert("Por favor, informe o pacote da oferta.");
		jQuery("#idpacote").focus();
		return false;
	}
  
 
	if((jQuery("#layout").val() == "5" || jQuery("#layout").val() == "6") & jQuery("#flv").val()==""){
		campoobg("flv");
		alert("Para esse tipo de layout, você deve informar o código do vídeo do youtube");
		jQuery("#flv").focus();
		return false;
	}

  
	if( Number(jQuery("#per_number").val().replace(/[^0-9]+/g,""))  > Number(jQuery("#max_number").val().replace(/[^0-9]+/g,""))){
		campoobg("per_number");
		alert(" O campo Quantidade máxima por pessoa não pode ser maior do que o campo Estoque");
		jQuery("#per_number").focus();
		return false;

	}
  
	if(Number(jQuery("#minimo_pessoa").val().replace(/[^0-9]+/g,"")) > Number(jQuery("#per_number").val().replace(/[^0-9]+/g,"")) ){
		campoobg("per_number");
		alert("Para uma pessoa poder comprar o mínimo de "+jQuery("#minimo_pessoa").val()+" unidades desta oferta, então o campo Max/pessoa não pode ser "+jQuery("#per_number").val() + ", deve ser maior.");
		jQuery("#per_number").focus();
		return false;
	} 
	if( jQuery("#market_price").val()=="R$ 0,00"){
		campoobg("market_price");
		alert("Por favor, informe o preço antigo.");
		jQuery("#market_price").focus();
		return false;
	}
	
	if(Number(jQuery("#market_price").val().replace(/[^0-9]+/g,""))  < Number(jQuery("#team_price").val().replace(/[^0-9]+/g,"")) ){
			campoobg("market_price");
			alert("Observe que o valor do preço antigo não pode ser menor do que o valor do preço atual.");
			jQuery("#market_price").focus();
			return false;
		}
	  
	frete  = $("input[name='frete']:checked").val();
	
	if(frete =="1"){ 
		if( jQuery("#ceporigem").val() == "" ){
			campoobg("ceporigem");
			alert("Por favor, informe o cep de origem");
			jQuery("#ceporigem").focus();
			return false;

		}	
		if( jQuery("#peso").val() == "" ){
			campoobg("peso");
			alert("Por favor, informe o peso do produto");
			jQuery("#peso").focus();
			return false;

		}
		if( jQuery("#altura").val() == "" ){
			campoobg("altura");
			alert("Por favor, informe a altura do produto");
			jQuery("#altura").focus();
			return false;

		}	
		if( jQuery("#largura").val() == "" ){
			campoobg("largura");
			alert("Por favor, informe a largura do produto");
			jQuery("#largura").focus();
			return false;

		}	
		if( jQuery("#comprimento").val() == "" ){
			campoobg("comprimento");
			alert("Por favor, informe o comprimento do produto");
			jQuery("#comprimento").focus();
			return false;

		}
		if(Number(jQuery("#altura").val().replace(/[^0-9]+/g,""))  <  2 ){
			campoobg("altura");
			alert("A altura do produto não pode ser menor do que 2");
			jQuery("#altura").focus();
			return false; 
		}
		if(Number(jQuery("#largura").val().replace(/[^0-9]+/g,""))  <  11 ){
			campoobg("largura");
			alert("A largura do produto não pode ser menor do que 11");
			jQuery("#largura").focus();
			return false; 
		}	
		if(Number(jQuery("#comprimento").val().replace(/[^0-9]+/g,""))  <  16 ){
			campoobg("comprimento");
			alert("O comprimento do produto não pode ser menor do que 16");
			jQuery("#comprimento").focus();
			return false; 
		}
	
	}
 
	 
	return true;	
}

function verifica_tipo_oferta(tipo){
  
   
	jQuery("#c_frete").show();
	jQuery("#c_estaticas").show();
	jQuery("#infopagamento").show();
	jQuery("#c_categoria").show();
	jQuery("#abapagamento").show();
	jQuery("#c_posicionamento").show();
	jQuery("#c_obscupom").show();
	jQuery("#min_pessoa").show(); 
	jQuery("#c_vendas").show(); 
	jQuery("#c_compradores_virtuais").show(); 
	jQuery("#c_estoque").show(); 
	jQuery("#c_valores").show(); 
	jQuery("#bonusate").show(); 
	jQuery("#parceirobk").show(); 
	jQuery("#cupomate").show(); 
	jQuery("#maisinfo").hide();		 
	jQuery("#c_comissao").hide();		 
	jQuery("#c_pontos_quant").hide();		 
	jQuery("#c_pontos_ganho").show();		 
	jQuery("#url_botao_comprar").show();
	jQuery("#metododepagamento").show();
	jQuery("#bk_processo_compra").show();
	jQuery("#infoagregadores").show();
	jQuery("#retorno_participe").hide();
	jQuery("#preco_comissao").val("");
	 
} 

verposicionamento();

</script>  
<script>
	function pac1(){
		jQuery(document).ready(function(){
			jQuery.colorbox({
				href: WEB_ROOT + '/media/css/i/pac1.jpg'
			});
		});
		}
	function pac2(){
		jQuery(document).ready(function(){
			jQuery.colorbox({
				href: WEB_ROOT + '/media/css/i/pac2.jpg'
			});
		});
		}
 </script>
			
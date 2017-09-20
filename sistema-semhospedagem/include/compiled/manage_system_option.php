<?php include template("manage_header");?>
<?php require("ini.php");?> 

<div id="bdw" class="bdw">
<div id="bd" class="cf">
	<div id="partner"> 
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content"> 
                <div class="sect">
                    <form method="post">
					<div class="option_box">
						<div class="top-heading group">
							<div class="left_float"><h4>Configurações</h4></div>
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
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Concordar com a política de privacidade ao se cadastrar</span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio"  <? if($INI['option']['termosobrigatorio'] =="Y" ){echo "checked='checked'";}?>  value="Y" name="option[termosobrigatorio]"> Sim  
											<input style="width:20px;" type="radio" <? if($INI['option']['termosobrigatorio'] =="N" ){echo "checked='checked'";}?>  value="N" name="option[termosobrigatorio]" > Não
										</div>	
										
										<!--<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Mostrar Revendas na lateral</span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio"  <? if($INI['option']['revendas'] =="Y" or $INI['option']['revendas'] =="" ){echo "checked='checked'";}?>  value="Y" name="option[revendas]"> Sim  
											<input style="width:20px;" type="radio" <? if($INI['option']['revendas'] =="N" ){echo "checked='checked'";}?>  value="N" name="option[revendas]" > Não
										</div>-->
										
									  <div style="display:none;float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Pesquisa por Marcas na home</span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio"  <? if($INI['option']['marcas'] =="Y" or $INI['option']['marcas'] =="" ){echo "checked='checked'";}?>  value="Y" name="option[marcas]"> Sim  
											<input style="width:20px;" type="radio" <? if($INI['option']['marcas'] =="N" ){echo "checked='checked'";}?>  value="N" name="option[marcas]" > Não
										</div>
										
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Mostrar Notícias na home</span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio"  <? if($INI['option']['noticias'] =="Y" or $INI['option']['noticias'] =="" ){echo "checked='checked'";}?>  value="Y" name="option[noticias]"> Sim  
											<input style="width:20px;" type="radio" <? if($INI['option']['noticias'] =="N" ){echo "checked='checked'";}?>  value="N" name="option[noticias]" > Não
										</div>	
										
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Mostrar Banner no topo</span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio"  <? if($INI['option']['bannertopo'] =="Y" or $INI['option']['bannertopo'] =="" ){echo "checked='checked'";}?>  value="Y" name="option[bannertopo]"> Sim  
											<input style="width:20px;" type="radio" <? if($INI['option']['bannertopo'] =="N" ){echo "checked='checked'";}?>  value="N" name="option[bannertopo]" > Não
										</div>	
										
										<div style="display:none;float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Mostrar Banner no meio</span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio"  <? if($INI['option']['bannermeio'] =="Y" or $INI['option']['bannermeio'] =="" ){echo "checked='checked'";}?>  value="Y" name="option[bannermeio]"> Sim  
											<input style="width:20px;" type="radio" <? if($INI['option']['bannermeio'] =="N" ){echo "checked='checked'";}?>  value="N" name="option[bannermeio]" > Não
										</div>
										
										
									<!-- 
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Ativar popup ao entrar no site:</span>  
											<input style="width:20px;" type="radio" <?=$email_home_sim?> value="Y" name="option[popup_ativo]"> Sim  &nbsp;<img class="tTip" title="Se sim, no primeiro acesso de cada usuário, o popup irá abrir automaticamente. Note que, caso o usuário esteja logado no site, este popup não irá abrir. O sistema irá gravar um cookie no computador do usuário para que esta tela não abra constantemente." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$email_home_nao?> value="N" name="option[popup_ativo]" > Não  &nbsp; 
										</div> 		
										-->
										<!-- 
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE;">
											<span class="report-head">O meu popup será:</span>   
											<input style="width:20px;" type="radio" <?=$tipopopup_news?> value="news" name="option[tipopopup]" > A tela de inscrição em newsletter  &nbsp; 
											<input style="width:20px;" type="radio"  <?=$tipopopup_cadastro?> value="cadastro" name="option[tipopopup]" > A tela de cadastro &nbsp; 
										</div> 	
										-->
										<!-- 
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Tipo:</span> <span class="cpanel-date-hint">Vulcano Slim ou Fit</span>
											<input style="width:20px;" type="radio" <?=$slim?> value="2" name="option[tpvulc]"> Slim  &nbsp;<img class="tTip" title="Altera apenas o posicionamento das ofertas na página principal" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$fit?> value="1" name="option[tpvulc]" > Fit  &nbsp; 
										</div>
										-->
								
										
										<!-- 
									   <div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Mostrar ofertas aleatórias na Coluna da Direita</span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio" <?=$rand_direita_sim?> value="Y" name="option[rand_direita]"> Sim  &nbsp;<img class="tTip" title="Se sim, o sistema irá mostrar as ofertas neste bloco em ordem aleatória." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$rand_direita_nao?> value="N" name="option[rand_direita]" > Não  &nbsp; 
										</div>   
										-->
										<!-- 
									    <div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Ativar Módulo de Pontuação</span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio" <?=$pontuacao_sim?> value="Y" name="option[pontuacao]"> Sim  &nbsp;<img class="tTip" title="Se sim, o sistema irá ativar uma opção de menu na barra de menu de navegação e também ativar mais uma opção de tipo de oferta: Pontuação. Todas as ofertas cadastradas no tipo Pontuação, irão aparecer somente nesse menu e só podem ser compradas com pontos. Para os outros tipos de ofertas (tradicional e cupomnow), você deverá editá-las informando quantos pontos cada uma delas irão gerar ao efetuar a compra." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$pontuacao_nao?> value="N" name="option[pontuacao]" > Não  &nbsp; 
										</div>
										-->
										<!-- 
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<div style="clear:both;"class="report-head">Nome do bloco das ofertas em destaque <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<input type="text" name="option[nomeblocodestaque]"  maxlength="35" id="option[nomeblocodestaque]" class="format_input" value="<?php echo htmlspecialchars($nomeblocodestaque); ?>" />    
											</div> 
										</div>  
										-->
										 <div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Ativar Debug SQL Admin</span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio" <?=$debug_sql_sim?> value="Y" name="option[debug_sql]"> Sim  &nbsp;<img class="tTip" title="Atenção: Apenas programadores. Para debugar mensagens de erros na administração. Poderá inteferir no layout da área pública. Só ative se souber o que está fazendo." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$debug_sql_nao?> value="N" name="option[debug_sql]" > Não  &nbsp; 
										</div>
											<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Google Maps:</span> <span class="cpanel-date-hint">Mapa de localização do Parceiro</span>
											<input style="width:20px;" type="radio" <?=$bloco_googlemaps_sim?> value="Y" name="option[bloco_googlemaps]"> Sim  &nbsp;<img class="tTip" title="Se sim, o mapa de localização do parceiro será exibido, contanto que o endereço do parceiro seja informado." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$bloco_googlemaps_nao?> value="N" name="option[bloco_googlemaps]" > Não  &nbsp; 
										</div> 									
										  
									</div>
									<!-- =============================   fim coluna esquerda   =====================================-->
									<!-- =============================   coluna direita   =====================================-->
									<div class="ends">
										
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Mostrar anúncios aleatórias </span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio" <?=$rand_popular_sim?> value="Y" name="option[rand_popular]"> Sim  &nbsp;<img class="tTip" title="Se sim, o sistema irá mostrar as ofertas neste bloco em ordem aleatória." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$rand_popular_nao?> value="N" name="option[rand_popular]" > Não  &nbsp; 
										</div>											 
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Moderação de anúncios:</span> <span class="cpanel-date-hint"> </span>
											<input style="width:20px;" type="radio" <?=$moderacaoanuncios_sim?> value="Y" name="option[moderacaoanuncios]"> Sim  &nbsp;<img class="tTip" title="Se sim, todos os anúncios cadastrados pelos usuários só serão publicados depois da moderação do administrador do portal" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$moderacaoanuncios_nao?> value="N" name="option[moderacaoanuncios]" > Não  &nbsp;<img class="tTip" title="Se não, não haverá moderação de anúncios, sendo assim, todos os anúncios cadastrados pelos usuários e pagos, serão publicados automaticamente." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										</div> 
										 
									 <div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Tkstore Developer:</span> <span class="cpanel-date-hint">Localizador de Arquivos</span>
											<input style="width:20px;" type="radio" <?=$bloco_tkdeveloper_sim?> value="Y" name="option[bloco_tkdeveloper]"> Sim  &nbsp;<img class="tTip" title="Mostra o caminho exato dos arquivos incluídos na página corrente (ideal para mudança de layout - Apenas desenvolvedores)" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$bloco_tkdeveloper_nao?> value="N" name="option[bloco_tkdeveloper]" > Não  &nbsp; 
										</div>
									 
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Usuários podem anunciar:</span> <span class="cpanel-date-hint"> </span>
											<input style="width:20px;" type="radio" <?=$anunciousuario_sim?> value="Y" name="option[anunciousuario]"> Sim  &nbsp;<img class="tTip" title="Se sim, qualquer usuário poderá cadastrar um anúncio mediante pagamento do plano ou grátis se o plano grátis estiver ativo" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$anunciousuario_nao?> value="N" name="option[anunciousuario]" > Não  &nbsp;<img class="tTip" title="Se não,o cadastro dos anúncio será feito apenas pelo administrador do portal. Devido a este fato, não haverá módulo de pagamento." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										</div> 
										 
										<input  type="hidden" value="<?=$INI['option']['modulopagamento']?>" name="option[modulopagamento]"> 
										<input  type="hidden" value="Y" name="option[cpf]">  
										<input type="hidden"  value="2" name="option[tpvulc]" > 
										<input type="hidden"  value="" name="option[paginainicial]" > 
										<input type="hidden"  value="Y" name="option[conteudo_oferta_popular]" > 
								
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Repetir Background</span> <span class="cpanel-date-hint"> </span>
											<input style="width:20px;" type="radio" <?=$backgroundrepeat_sim?> value="Y" name="option[backgroundrepeat]"> Sim  &nbsp;<img class="tTip" title="Se sim, a imagem do background irá se repetir para completar toda a resolução do computador do usuário. Ideal para backgrounds de dimensões pequenas." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$backgroundrepeat_nao?> value="N" name="option[backgroundrepeat]" > Não  &nbsp;<img class="tTip" title="Se não, a imagem do background será extendida a 100% da resolução do computador do usuário. Ideal para backgrounds de dimensões maiores." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										</div> 
										<!-- 
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Ranking dos Padrinhos:</span>  
											<input style="width:20px;" type="radio" <?=$bloco_rank_sim?> value="Y" name="option[bloco_rank]"> Sim  &nbsp;<img class="tTip" title="Se sim, o bloco será exibido na lateral do site. Note que o ranking dos padrinhos é reiniciado a cada mês." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$bloco_rank_nao?> value="N" name="option[bloco_rank]" > Não  &nbsp; 
										</div> 
										-->
										<!-- 
										<div style="float:left; display:none;width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Importação de Contatos:</span> <span class="cpanel-date-hint">Apenas Gmail</span>
											<input style="width:20px;" type="radio" <?=$importarcontatos_sim?> value="Y" name="option[importarcontatos]"> Sim  &nbsp;<img class="tTip" title="Se sim, será mostrado na lateral do site a opção dos usuários importarem os seus contatos do gmail. Note que, na primeira tentativa de importação, o Gmail irá lhe enviar um email para confirmação de autenticidade, após a confirmação, prossiga com uma nova importação." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$importarcontatos_nao?> value="N" name="option[importarcontatos]" > Não  &nbsp; 
										</div>
										-->
										<!-- 
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Ativar Super Banner:</span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio" <?=$superoferta_sim?> value="Y" name="option[superoferta]"> Sim  &nbsp;<img class="tTip" title="Se sim, será mostrado na página principal a oferta destaque no topo do site. Atenção, é necessário que você tenha uma oferta com posicionamento Destaque e que a imagem desta oferta tenha uma resolução de 944px x 256px. Se você fizer upload de uma imagem com outra resolução, ela poderá ficar distorcida e perder qualidade." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$superoferta_nao?> value="N" name="option[superoferta]" > Não  &nbsp; 
										</div>
										-->
										<!-- 
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Ativar Redirecionador</span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio" <?=$redirecionador_sim?> value="Y" name="option[redirecionador]"> Sim  &nbsp;<img class="tTip" title="Se sim, ao acessar o site, o usuário será redirecionado direto para a página de detalhes da oferta com posicionamento destaque. Caso o sistema não encontre nenhuma oferta destaque, ele irá buscar a próxima oferta seguindo a ordem de posicionamento. (Super Banner será omitido)" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$redirecionador_nao?> value="N" name="option[redirecionador]" > Não  &nbsp; 
										</div>
										-->
										 <!-- 		
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Mostrar tempo restante em Ofertas Populares</span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio" <?=$temporestante_sim?> value="Y" name="option[temporestante]"> Sim  &nbsp;<img class="tTip" title="Se sim, o contador de tempo restante será mostrado no bloco Ofertas Populares. Para colocar uma oferta no bloco Ofertas Polulares, edite a oferta e altere o campo Posicionamento." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$temporestante_nao?> value="N" name="option[temporestante]" > Não  &nbsp; 
										</div>
										-->
										<!-- 
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Mostrar ofertas finalizadas em Ofertas Populares</span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio" <?=$ofertas_finalizadas_populares_sim?> value="Y" name="option[ofertas_finalizadas_populares]"> Sim  &nbsp;<img class="tTip" title="Ofertas Finalizadas são as ofertas cujo data final da oferta é menor do que a data corrente." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$ofertas_finalizadas_populares_nao?> value="N" name="option[ofertas_finalizadas_populares]" > Não  &nbsp; 
										</div>	
										-->
										
										<!-- 
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Mostrar ofertas finalizadas na Coluna da Direita</span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio" <?=$ofertas_finalizadas_direita_sim?> value="Y" name="option[ofertas_finalizadas_direita]"> Sim  &nbsp;<img class="tTip" title="Ofertas Finalizadas são as ofertas cujo data final da oferta é menor do que a data corrente." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$ofertas_finalizadas_direita_nao?> value="N" name="option[ofertas_finalizadas_direita]" > Não  &nbsp; 
										</div>	
										-->
										
										<!--  
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE"> 
											<div class="report-head">Página Inicial : <span class="cpanel-date-hint"> <a href="/vipmin/system/page.php">Clique aqui</a> para criar uma página</span></div>
											    <select  name="option[paginainicial]" id="option[paginainicial]" style="width:58%"> 
												<option value=''>Página de anúncios padrão</option>; 
													<?php 
													$sql = "select id, titulo from page where status=1";
													$rs = mysql_query($sql);
													while($l = mysql_fetch_assoc($rs)){?>
														<option value='<?=$l[id]?>' <? if($INI['option']['paginainicial'] == $l[id]) { echo "selected=selected"; }?>><?=$l[titulo]?></option>; 
													 <? } ?>
												 </select>  &nbsp;<img class="tTip" title="Você pode alterar a página inicial do site para qualquer página cadastrada." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										</div>	
										 -->
										 <!--  
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE"> 
											<div class="report-head"> <span class="cpanel-date-hint"> <a href="/vipmin/system/page.php">Clique aqui</a> para criar uma página</span>
												<input style="width:20px;" type="radio" <?=$conteudo_oferta_popular_sim?> value="Y" name="option[conteudo_oferta_popular]" id="conteudo_oferta_popular" > Ativar anúncios na página principal: 
											    <input style="width:20px;" type="radio" <?=$conteudo_oferta_popular_nao?> value="N" name="option[conteudo_oferta_popular]" id="conteudo_oferta_popular" > Substituir anúncios por página  &nbsp; 
												</div>
											    <select  name="option[pagina_oferta_popular]" id="pagina_oferta_popular" style="width:58%"> 
												<option value=''>Escolha uma página</option>; 
													<?php 
													$sql = "select id, titulo from page where status=1";
													$rs = mysql_query($sql);
													while($l = mysql_fetch_assoc($rs)){?>
														<option value='<?=$l[id]?>' <? if($INI['option']['pagina_oferta_popular'] == $l[id]) { echo "selected=selected"; }?>><?=$l[titulo]?></option>; 
													 <? } ?>
												 </select>  &nbsp;<img class="tTip" title="Você pode substituir no local onde ficam os anúncios por qualquer página cadastrada." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										</div>
										-->
										 
										<!-- 
									 	<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<div style="clear:both;"class="report-head">Nome do bloco das ofertas direita <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<input type="text" name="option[nomeblocodireita]"  maxlength="18" id="option[nomeblocodireita]" class="format_input" value="<?php echo htmlspecialchars($nomeblocodireita); ?>" />    
											</div> 
										</div> 
										-->
										<!-- 
										 <div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head">Auth Setup</span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio" <?=$auth_setup_sim?> value="Y" name="option[auth_setup]"> Sim  &nbsp; 
											<input style="width:20px;" type="radio" <?=$auth_setup_nao?> value="N" name="option[auth_setup]" > Não  &nbsp; 
										</div>	
										-->
									
										
									 </div>
									<!-- =============================  fim coluna direita  =====================================-->
								</div> 
							</div>
						</div>
					</div> 
					 
                    </form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>

<div id="sidebar">
</div>

</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

 <script>
	function validador(){
		return true;
	} 
	
	/*
	function vercontop(){
	
		tipoconteudo_oferta_popular = $("input[@id=conteudo_oferta_popular]:checked").attr('value');
		alert(tipoconteudo_oferta_popular)
		
		if(tipoconteudo_oferta_popular=="N"){
			$("#pagina_oferta_popular").attr("disabled", true);
		}
		else{
			$("#pagina_oferta_popular").attr("disabled", false);
		}
	}
	vercontop();
	*/

</script>
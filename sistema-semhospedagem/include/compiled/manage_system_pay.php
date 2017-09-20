<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner"> 
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content"> 
                <div class="sect">
                    <form method="post">
					<!-- ********************************************* ABA PAGSEGURO --> 
					<div class="option_box"> 
						<div class="top-heading group"> <div class="left_float"><h4>Pagseguro </h4> </div>
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
									<div class="starts"> 
										<div id="url_botao_comprar">									
											<div class="report-head">Email: <span class="cpanel-date-hint">Email do Pagseguro</span></div>
											<div class="group">
												<input type="text"  name="pagseguro[acc]" value="<?php echo  $INI['pagseguro']['acc'] ; ?>"> &nbsp;<img class="tTip" title="Este é o email de cadastro no www.pagseguro.com.br" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											</div>		
											<div class="report-head">Token: <span class="cpanel-date-hint">Caso não tenha, gere um token no pagseguro</span></div>
											<div class="group">
												<input type="text"  name="pagseguro[mid]" value="<?php echo  $INI['pagseguro']['mid'] ; ?>"> &nbsp;<img class="tTip" title="Este token é obrigatório para retorno automático do pagseguro. Você precisa entrar no site do pagseguro e gerar um token. Caso tenha dúvidas, veja nossos vídeos." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											</div>	
										</div>	 
									</div> 
									<div class="ends"> 	 			 
										 Agora entre no <a target="_blank" href="http://www.pagseguro.com.br"> http://www.pagseguro.com.br</a> e informe a url nos campos <b><br>1-retorno automático de dados <br>2-página de redirecionamento  <br>3-notificação de transações </b> 
										 <br>URL a ser infomada. <b><?=$INI['system']['wwwprefix']?>/pedido/pagseguro/retorno.php</b> <img class="tTip" title="Atenção. Sempre informe a url no formato http://www.seudominio.com.br. Atente-se para o http://  e o www." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										 <br> Não esqueça de ativar todos os campos.
										 <br> Precisa de ajuda? <a target="_blank" href="http://www.sistemacomprascoletivas.com.br/configurando-o-retorno-automatico-do-pagseguro-para-o-sistema-de-compra-coletiva">Clique aqui</a> e veja nosso vídeo tutorial
									 </div> 
								</div> 
							</div>
						</div>
					</div> 
					 
					<!-- ********************************************* ABA MOIP --> 
					<!-- 
					<div class="option_box">
						<div class="top-heading group">
							<div class="left_float"><h4>Moip</h4></div>
						</div> 
						<div id="container_box">
							<div id="option_contents" class="option_contents"> 
								<div class="form-contain group"> 
									<div class="starts"> 
										<div id="url_botao_comprar">									
											<div class="report-head">Email: <span class="cpanel-date-hint">Email do Moip</div>
											<div class="group">
												<input type="text"  name="moip[mid]" value="<?php echo  $INI['moip']['mid'] ; ?>"> &nbsp;<img class="tTip" title="Este é o email de cadastro no www.moip.com.br" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											</div>	 	
										</div>	 
									</div> 
									<div class="ends"> 	
									 Após entrar no endereço <a target="_blank" href="http://www.moip.com.br">http://www.moip.com.br</a> com os dados de sua conta moip, acesse esta url.  <a target="_blank" href="http://www.moip.com.br">https://www.moip.com.br/AdmMainMenuMyData.do?method=transactionnotification</a>
									 Ná página aque se abre, marque o campo  "Receber notificação instantânea de transação" e informe esta url no campo URL de notificação  <b><?=$INI['system']['wwwprefix']?>/pedido/moip/retorno.php</b> e Confirme a alteração. <img class="tTip" title="Atenção. Sempre informe a url no formato http://www.seudominio.com.br. Atente-se para o http://  e o www." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
								    </div> 
								</div> 
							</div>
						</div> 
					</div>	
					-->
					<!-- 
						<div class="option_box">
						<div class="top-heading group">
							<div class="left_float"><h4>Moip Checkout Transparente</h4></div>
						</div> 
						<div id="container_box">
							<div id="option_contents" class="option_contents"> 
								<div class="form-contain group"> 
									<div class="starts"> 
										<div id="url_botao_comprar">									
											<div class="report-head">Email: <span class="cpanel-date-hint">Email do Moip</span></div>
											<div class="group">
												<input type="text"  name="moip[mid]" value="<?php echo  $INI['moip']['mid'] ; ?>"> &nbsp;<img class="tTip" title="Este é o email de cadastro no www.moip.com.br" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											</div>	
											<div style="display:none;">
												<div class="report-head">Token: <span class="cpanel-date-hint"> Algo como: HKRVWRR66AFSJ9HCHDJCALDZCRM4Y7KM</span></div>
												<div class="group">
													<input type="text"  name="moip[tokentrans]" value="<?php echo  $INI['moip']['tokentrans'] ; ?>">   
												</div>	
												<div class="report-head">Chave: <span class="cpanel-date-hint">Algo como: 8FJNJ6JWT7G3XJWSZCLQVMFFBHS4LOAGJVRHVEPS</span></div>
												<div class="group">
													<input type="text"  name="moip[chavetrans]" value="<?php echo  $INI['moip']['chavetrans'] ; ?>">   
												</div>
												<div class="report-head">URL: <span class="cpanel-date-hint">Apenas desenvolvedores</span></div>
												<div class="group">
													<input type="text" readonly="readonly" name="moip[urlmoip]" value="<?php echo  $INI['moip']['urlmoip'] ; ?>">  
												 
												</div>	
											</div>	
											 
											
										</div>	 
									</div> 
									<div class="ends"> 	
									 Para usar o Moip Checkout Transparente, você precisa primeiro criar uma conta no <a target="_blank" href="http://www.moip.com.br">http://www.moip.com.br</a> depois disso ou caso já tenha uma conta no moip, por motivos de segurança, você precisa entrar em contato com o moip e solicitar a ativação do Moip Checkout Transparente em sua conta. Sem isso, não irá funcionar. 
									 <br> O processo é simples, apenas informe que você é parceiro da Vipcom para ganhar taxas promocionais. Você também precisa informar a url de retorno.  Ainda no site do Moip <a target="_blank" href="http://www.moip.com.br">http://www.moip.com.br</a> Vá em:  Meus Dados > Preferências > Notificação das Transações. Marque a opção Receber notificação instantânea de venda e digite o endereço abaixo
									  <?=$INI['system']['wwwprefix']?>/include/moip/retorno.php</b> e Confirme a alteração. <img class="tTip" title="Atenção. Sempre informe a url no formato http://www.seudominio.com.br. Atente-se para o http://  e o www." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
								    </div> 
								</div> 
							</div>
						</div> 
					</div>
					-->
					
					<!-- ********************************************* ABA DINHEIRO MAIL --> 
					<!-- 
					<div class="option_box">
						<div class="top-heading group">
							<div class="left_float"><h4>Dinheiro Mail</h4></div>
						</div> 
						<div id="container_box">
							<div id="option_contents" class="option_contents"> 
								<div class="form-contain group"> 
									<div class="starts"> 
										<div id="url_botao_comprar">									
											<div class="report-head">Email: <span class="cpanel-date-hint">Email do Dinheiro Mail</div>
											<div class="group">
												<input type="text"  name="dinheiro[mid]" value="<?php echo  $INI['dinheiro']['mid'] ; ?>"> &nbsp;<img class="tTip" title="Este é o email de cadastro no http://br.dineromail.com" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											</div>	 	
										</div>	 
									</div> 
									<div class="ends"> 	
										É necessário que você tenha um cadastro no site  <a target="_blank" href="http://www.dinheiromail.com">http://www.dinheiromail.com</a>
										<br> Esse gateway de pagamento não oferece retorno automático.
									</div> 
								</div> 
							</div>
						</div> 
					</div>	
					
				  <!-- ********************************************* ABA PAGAMENTO DIGITAL --> 
				  <!-- 
					<div class="option_box">
						<div class="top-heading group">
							<div class="left_float"><h4>Pagamento Digital</h4></div>
						</div> 
						<div id="container_box">
							<div id="option_contents" class="option_contents"> 
								<div class="form-contain group"> 
									<div class="starts">  									
										<div class="report-head">Email: <span class="cpanel-date-hint">Email do Pagamento Digital</div>
										<div class="group">
											<input type="text"  name="pagamentodg[acc]" value="<?php echo  $INI['pagamentodg']['acc'] ; ?>"> &nbsp;<img class="tTip" title="Este é o email de cadastro no www.pagamentodigital.com.br" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											
										</div>
										<div class="report-head">Token: <span class="cpanel-date-hint">Token do Pagamento Digital</div>
										<div class="group">
											<input type="text"  name="pagamentodg[mid]" value="<?php echo  $INI['pagamentodg']['mid'] ; ?>"> &nbsp;<img class="tTip" title="Este é o token de sua conta no www.pagamentodigital.com.br" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											
										</div>	 
									</div> 
									<div class="ends"> 	
										 Entre no site <a target="_blank" href="http://www.pagamentodigital.com.br"> www.pagamentodigital.com.br</a> com o seu email e senha e clique no <b>menu Ferramentas</b> no campo "Informe a url de retorno da sua loja:" e no campo "Informe a url de aviso da sua loja:" informe essa url <b><?=$INI['system']['wwwprefix']?>/pedido/pagamentodg/retorno.php</b> e depois clique em salvar.<img class="tTip" title="Atenção. Sempre informe a url no formato http://www.seudominio.com.br. Atente-se para o http://  e o www." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div> 
								</div> 
							</div>
						</div> 
					</div>	
					
					 <!-- ********************************************* ABA MERCADO PAGO --> 
					 <!-- 
					<div class="option_box">
						<div class="top-heading group">
							<div class="left_float"><h4>Mercado Pago</h4></div>
						</div> 
						<div id="container_box">
							<div id="option_contents" class="option_contents"> 
								<div class="form-contain group"> 
									<div class="starts">  									
										<div class="report-head">Email: <span class="cpanel-date-hint">Email do Mercado Pago</div>
										<div class="group">
											<input type="text"  name="mercadopago[token]" value="<?php echo  $INI['mercadopago']['token'] ; ?>"> &nbsp;<img class="tTip" title="Este é o token de sua conta no www.mercadopago.com.br" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										 </div>
										<div class="report-head">Enc: <span class="cpanel-date-hint">Enc do Mercado Pago</div>
										<div class="group">
											<input type="text"  name="mercadopago[enc]" value="<?php echo  $INI['mercadopago']['enc'] ; ?>"> &nbsp;   
											
										</div>	
										<div class="report-head">Acc Id: <span class="cpanel-date-hint">Acc Id do Mercado Pago</div>
										<div class="group">
											<input type="text"  name="mercadopago[acc_id]" value="<?php echo  $INI['mercadopago']['acc_id'] ; ?>"> &nbsp; 
											
										</div>	 
									</div> 
									<div class="ends"> 	
									<br> Esse gateway de pagamento não oferece retorno automático.
									<br> Para saber os dados de ENC  e Acc_id faça login no site do mercado pago e acesse a url <a target="_blank" href="https://www.mercadopago.com/mlb/cartdata">https://www.mercadopago.com/mlb/cartdata</a>
									</div> 
								</div> 
							</div>
						</div> 
					</div>		

					<!-- ********************************************* ABA PAYPAL --> 
					<!-- 
					<div class="option_box">
						<div class="top-heading group">
							<div class="left_float"><h4>Paypal</h4></div>
						</div> 
						<div id="container_box">
							<div id="option_contents" class="option_contents"> 
								<div class="form-contain group"> 
									<div class="starts">  									
										<div class="report-head">Email: <span class="cpanel-date-hint">Email do Paypal</div>
										<div class="group">
											<input type="text"  name="paypal[mid]" value="<?php echo  $INI['paypal']['mid'] ; ?>"> &nbsp;<img class="tTip" title="Este é o email de cadastro em www.paypal.com.br" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										 </div>	
										 <div class="report-head">Localização: <span class="cpanel-date-hint">Código da moeda do País. Ex: BRL </div>
										<div class="group">
											<input type="text"  name="paypal[loc]" value="<?php echo  $INI['paypal']['loc'] ; ?>"> &nbsp;<img class="tTip" title="Código da moeda como: USD (Dólar Americano),BRL (Real), EUR (Euro)" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										 </div>
									 	 
									</div> 
									<div class="ends"> 
									<a target="_blank" href="http://pt.wikipedia.org/wiki/ISO_4217">Veja aqui a lista dos códigos</a>									
									<br> Esse gateway de pagamento não oferece retorno automático.
									</div> 
								</div> 
							</div>
						</div> 
					</div>		
					
					<!-- ********************************************* ABA CARTAO DE CRÉDITO --> 
					<!-- 
					<div class="option_box" style="display:none;">
						<div class="top-heading group">
							<div class="left_float"><h4>Cartão de Crédito</h4></div>
						</div> 
						<div id="container_box">
							<div id="option_contents" class="option_contents"> 
								<div class="form-contain group"> 
									<div class="starts">  									
								      <input type="text" size="30" name="credito[pay]" class="f-input" value="<?php echo $INI['credito']['pay']; ?>" style="width:50px;"/><span class="inputtip">1 para ativar</span>
									</div> 
									<div class="ends"> 
									
									 Todos os dados do cartão serão enviados para o seu email e você será responsável por estar realizando a cobrança manualmente.
									 Você será responsável por solicitar o certificado de segurança SSL para maior segurança e criptografia dos dados de cartão. (Opcional) 
									 Note que, se você não tem um sistema de cobrança já integrado com as operadoras sem a necessidade de cartão de crédito, então deixe esse campo desativado.
									  
									</div> 
								</div> 
							</div>
						</div> 
					</div>	
					-->
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
</script>
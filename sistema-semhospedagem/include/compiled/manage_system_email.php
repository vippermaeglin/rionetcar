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
					 <!-- ********************************************* ABA SMTP --> 
				 
					<div class="option_box"  >
						<div class="top-heading group">
							<div class="left_float"><h4>Configurações de Email</h4></div>
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
									
										<div class="report-head">Email Remetente <span class="cpanel-date-hint">Ex: atendimento@dominio.com.br</span></div>
										<div class="group">
											<input type="text"  name="mail[from]" value="<?php echo  $INI['mail']['from'] ; ?>"> &nbsp;<img class="tTip" title="Email que será visualizado pelo destinatário." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										</div>
										
										<div class="report-head">Email Bounce: <span class="cpanel-date-hint">Ex: emailsinvalidos@dominio.com.br</span></div>
										<div class="group">
											<input type="text"  name="mail[bounce]" value="<?php echo  $INI['mail']['bounce'] ; ?>"> &nbsp;<img class="tTip" title="Email que irá receber os retornos de erro do tipo email inválido, caixa cheia, etc. Sugerimos criar um email apenas para este fim" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										</div>	
									
									   <div id="mail-zone-div" style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;">
											<span class="report-label">Forma de envio:</span>  
											<input style="width:20px;" type="radio" <?=$chaeckedmail?> value="mail" name="mail[mail]"> phpmail  &nbsp;<img class="tTip" title="Se hospedado com a Vipcom, deixe sempre phpmail." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
											<input style="width:20px;" type="radio" <?=$chaeckedsmtp?> value="smtp" name="mail[mail]" > smtp  &nbsp; 
										</div> 	
										
										<span class="cpanel-date-hint"> <a  target="_blank" href="http://www.sistemacomprascoletivas.com.br/sistemacompracoletiva/nossos-produtos/plano-de-email-marketing">plano de email marketing </a> com instalação do Interspire e-mail marketing.</span>
										
									</div>
									<!-- =============================   fim coluna esquerda   =====================================-->
									<!-- =============================   coluna direita   =====================================-->
									<div class="ends"> 	
										<div class="report-head">Email de Parceria: <span class="cpanel-date-hint">Ex: parceria@dominio.com.br</span></div>
										<div class="group">
											<input type="text"  name="mail[mailparceria]" value="<?php echo  $INI['mail']['mailparceria'] ; ?>"> &nbsp;<img class="tTip" title="Email que irá receber o contato quando novas empresas desejarem ser parceiro do seu site. Se este campo estiver vazio, o contato será enviado para o email do campo 'Email Remetente'" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										</div>
										<div class="report-head">Telefone: <span class="cpanel-date-hint"> </span></div>
										<div class="group">
											<input type="text"  name="mail[helpphone]" value="<?php echo  $INI['mail']['helpphone'] ; ?>"> &nbsp;  
										</div>	
										<div class="report-head">Email de Ajuda: <span class="cpanel-date-hint"> </span></div>
										<div class="group">
											<input type="text"  name="mail[helpemail]" value="<?php echo  $INI['mail']['helpemail'] ; ?>"> &nbsp;  &nbsp;<img class="tTip" title="Email que será mostrado nas templates de newsletter para ajuda ou sugestões. Deixe em branco para não mostrar." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										</div>
										 
									  </div>
									<!-- =============================  fim coluna direita  =====================================-->
								</div> 
							</div>
						</div>
					</div> 
					 
					<!-- ********************************************* ABA SMTP --> 
					<div class="option_box" id="mail-zone-smtp" style="display:<?php echo $INI['mail']['mail']!='mail'?'block':'none'; ?>;">
						<div class="top-heading group">
							<div class="left_float"><h4>SMTP (Apenas para servidores externos)</h4></div>
						</div> 
						<div id="container_box">
							<div id="option_contents" class="option_contents"> 
								<div class="form-contain group">
									<!-- =============================   coluna esquerda   =====================================-->
									<div class="starts"> 
									 
										<div class="report-head">Servidor smtp: <span class="cpanel-date-hint">Ex: smtp.servidor.com.br</span></div>
										<div class="group">
											<input type="text"  name="mail[host]" value="<?php echo  $INI['mail']['host'] ; ?>">    
										</div>	
										
										<div class="report-head">Usuário smtp: <span class="cpanel-date-hint">Ex: usuario@dominio.com.br</span></div>
										<div class="group">
											<input type="text"  name="mail[user]" value="<?php echo  $INI['mail']['user'] ; ?>">    
										</div>		
										<div class="report-head">Senha smtp: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="password" name="mail[pass]" value="<?php echo  $INI['mail']['pass'] ; ?>">
										</div>		
										
									</div>
									<!-- =============================   fim coluna esquerda   =====================================-->
									<!-- =============================   coluna direita   =====================================-->
									<div class="ends"> 	
										<div class="report-head">Porta smtp: <span class="cpanel-date-hint">Ex: 587</span></div>
										<div class="group">
											<input type="text"  name="mail[port]" value="<?php echo  $INI['mail']['port'] ; ?>">     
										</div>		
										
										<div class="report-head">SSL: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text"  name="mail[ssl]" value="<?php echo  $INI['mail']['ssl'] ; ?>">
										</div>   
										
										<span class="cpanel-date-hint">Para esse tipo de envio, abra um ticket no setor de suporte para liberação da porta.</span>
									 </div>
									<!-- =============================  fim coluna direita  =====================================-->
								</div> 
							</div>
						</div> 
					</div>	
					 <input type="hidden" size="30" name="mail[interval]" class="number" value="10"/> 
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
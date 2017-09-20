<?php include template("biz_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div id="content" class="clear mainwide">
        <div class="clear box"> 
            <div class="box-content"> 
                <div class="sect">
                    <form id="login-user-form" method="post" action="/lojista/settings.php" class="validator">
					<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Configurações</h4></div>
							<div class="the-button" style="width:114px;"> 
								<div style="float:left;"><button onclick="doupdate();" id="run-button" class="input-btn" type="button"><div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Salvar</div></button></div>
							  </div> 
							  	<div style="padding: 10px;">
									<ul id="log_tools"> <li id="log_switch_referral"><a title="Altere sua senha, nome, dados bancários" href="/lojista/settings.php">Configurações</a></li> </ul> 
									<ul id="log_tools"> <li id="log_switch_referral"><a title="Lista de cupons gerados com a venda das ofertas" href="/lojista/coupon.php">Cupons Gerados</a></li> </ul>
									<ul id="log_tools"> <li id="log_switch_referral"><a title="Lista de ofertas" href="/lojista/index.php">Lista de Ofertas</a></li> </ul>
								</div>
					</div> 
					
						 <div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">
								
					<input type="hidden" name="id" value="<?php echo $partner['id']; ?>" />
						<div class="wholetip clear"><h3>1.Informações de Acesso</h3></div>
                        <div class="field">
                            <label>Apelido</label>
                            <input type="text" size="30" name="username" id="partner-create-username" class="f-input" value="<?php echo $partner['username']; ?>" readonly/>
                        </div>
                        <div class="field password">
                            <label>Nova senha</label>
                            <input type="password" size="30" name="password" id="settings-password" class="f-input" />
                            <span class="hint">Se não quiser troca-la deixe em branco.</span>
                        </div>
                        <div class="field password">
                            <label>Confirmar senha</label>
                            <input type="password" size="30" name="password2" id="settings-password-confirm" class="f-input" />
                        </div>

						<div class="wholetip clear"><h3>2.Configurações básicas</h3></div>
                        <div class="field">
                            <label>Nome da empresa</label>
                            <input type="text" size="30" name="title" id="partner-create-title" class="f-input" value="<?php echo $partner['title']; ?>" datatype="require" require="ture"/>
                        </div>
                        <div class="field">
                            <label>Website</label>
                            <input type="text" size="30" name="homepage" id="partner-create-homepage" class="f-input" value="<?php echo $partner['homepage']; ?>"/>
                        </div>
                        <div class="field">
                            <label>Pessoa de contato</label>
                            <input type="text" size="30" name="contact" id="partner-create-contact" class="f-input" value="<?php echo $partner['contact']; ?>"/>
						</div>
                        <div class="field">
                            <label>Endereço</label>
                            <input type="text" size="30" name="address" id="partner-create-address" class="f-input" value="<?php echo $partner['address']; ?>" datatype="require" require="ture" />
						</div>
                        <div class="field">
                            <label>Telefone</label>
                            <input type="text" size="30" name="phone" id="partner-create-phone" class="f-input" value="<?php echo $partner['phone']; ?>" maxLength="12" datatype="require" require="ture"/>
						</div>
                        <div class="field">
                            <label>Celular</label>
                            <input type="text" size="30" name="mobile" id="partner-create-mobile" class="f-input" value="<?php echo $partner['mobile']; ?>" maxLength="11" />
						</div>
                        <div class="field">
                            <label>Endereço 2</label>
                            <div style="float:left;"><textarea cols="45" rows="5" name="location" id="partner-create-location" class="f-textarea editor"><?php echo htmlspecialchars($partner['location']); ?></textarea></div>
						</div>
                        <div class="field">
                            <label>Outras informações</label>
                            <div style="float:left;"><textarea cols="45" rows="5" name="other" id="partner-create-other" class="f-textarea editor"><?php echo htmlspecialchars($partner['other']); ?></textarea></div>
						</div>

						<div class="wholetip clear"><h3>3.Conta bancária</h3></div>
                        <div class="field">
                            <label>Banco</label>
                            <input type="text" size="30" name="bank_name" id="partner-create-bankname" class="f-input" value="<?php echo $partner['bank_name']; ?>" readonly />
                        </div>
                        <div class="field">
                            <label>N. Agência</label>
                            <input type="text" size="30" name="bank_user" id="partner-create-bankuser" class="f-input" value="<?php echo $partner['bank_user']; ?>" readonly />
                        </div>
                        <div class="field">
                            <label>N. Conta corrente</label>
                            <input type="text" size="30" name="bank_no" id="partner-create-bankno" class="f-input" value="<?php echo $partner['bank_no']; ?>" readonly />
                        </div>
                        <div class="act">
                            <input type="submit" value="Salvar" name="commit" id="partner-submit"  />
                        </div>
                    </form>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>

 <script>
	 
	 function doupdate(){
 
	 
		document.forms[0].submit();
	 
}

	 </script>

</div>
</div> <!-- bd end -->
</div> <!-- bdw end --> 

		<div style="display:none;" class="tips"><?=__FILE__?></div>
		<div class="divFormAuth">
			<div class="productsPage">
				<?php if($msgM != "") { ?>
				<h2 style="height:40px;"><?php echo $msgM; ?></h2>
				<?php } ?>
				<div class="formAuth">
					<form method="POST" name="formcadupdate" id="formcadupdate">
						<div class="formContent">
							<label>
								Nome completo:
							</label>
							<input value="<?php echo utf8_decode($login_user['realname']); ?>" id="realname" type="text" maxlength="50" name="realname" placeholder="Nome completo" autocomplete="off">
						</div>
						<div class="formContent">
							<label>
								Email:
							</label>
							<input value="<?php echo $login_user['email']; ?>" readonly="readonly" id="email" type="text" maxlength="50" name="email" placeholder="Email de contato" autocomplete="off">
						</div>					
						<div class="formContent">
							<label>
								Senha:
							</label>
							<input id="password" type="password" maxlength="30" name="password" autocomplete="off">
						</div>					
						<div class="formContent">
							<label>
								Senha novamente:
							</label>
							<input id="password2" type="password" maxlength="30" name="password2" autocomplete="off">
						</div>							
						<div class="formContent">
							<label>
								CEP:
							</label>
							<input maxlength="8" value="<?php echo $login_user['zipcode']; ?>" id="cep_" onblur="getEndereco();" onkeypress="return SomenteNumero(event);" type="text" name="cep_" autocomplete="off">
						</div>	
						<div class="formContent">
							<label>
								Endereço:
							</label>
							<input value="<?php echo utf8_decode($login_user['address']); ?>" id="endereco_" type="text" name="endereco_" autocomplete="off">
						</div>
						<div class="formContent">
							<label>
								Nº:
							</label>
							<input maxlength="5" onKeyPress="return SomenteNumero(event);" value="<?php echo $login_user['numero']; ?>" id="numero_" type="text" name="numero_" autocomplete="off">
						</div>
						<div class="formContent">
							<label>
								Complemento:
							</label>
							<input value="<?php echo utf8_decode($login_user['complemento']); ?>" id="complemento_" type="text" name="complemento_" autocomplete="off">
						</div>						
						<div class="formContent">
							<label>
								Bairro:
							</label>
							<input value="<?php echo utf8_decode($login_user['bairro']); ?>" id="bairro_" type="text" name="bairro_" autocomplete="off">
						</div>						
						<div class="formContent">
							<label>
								Cidade:
							</label>
							<input value="<?php echo utf8_decode($login_user['cidadeusuario']); ?>" id="cidadeusuario_" type="text" name="cidadeusuario_" autocomplete="off">
						</div>							
						<div class="formContent">
							<label>
								Estado:
							</label>
							<input value="<?php echo utf8_decode($login_user['estado']); ?>" id="estado_" type="text" name="estado_" autocomplete="off">
						</div>							
						<div class="formContent">
							<label>
								DDD:
							</label>
							<input maxlength="2" onKeyPress="return SomenteNumero(event);" value="<?php echo $login_user['ddd2']; ?>" id="ddd2" type="text" name="ddd2" autocomplete="off">
						</div>			
						<div class="formContent">
							<label>
								Telefone:
							</label>
							<input maxlength="8" onKeyPress="return SomenteNumero(event);" value="<?php echo $login_user['telefonefixo']; ?>" id="entrega_telefone" type="text" name="entrega_telefone_" autocomplete="off">
						</div>							
						<div class="formContent">
							<label>
								DDD:
							</label>
							<input maxlength="2" onKeyPress="return SomenteNumero(event);" value="<?php echo $login_user['ddd']; ?>" id="ddd_" type="text" name="ddd_" autocomplete="off">
						</div>			
						<div class="formContent">
							<label>
								Celular:
							</label>
							<input maxlength="9" onKeyPress="return SomenteNumero(event);" value="<?php echo $login_user['celular']; ?>" id="telefone_" type="text" name="telefone_" autocomplete="off">
						</div>							
						<div class="formContent">
							<label>
								DDD:
							</label>
							<input maxlength="2" onKeyPress="return SomenteNumero(event);" value="<?php echo $login_user['ddd']; ?>" id="ddd2_" type="text" name="ddd2_" autocomplete="off">
						</div>			
						<div class="formContent">
							<label>
								WhatsApp:
							</label>
							<input maxlength="9" onKeyPress="return SomenteNumero(event);" value="<?php echo $login_user['nextel']; ?>" id="nextel_" type="text" name="nextel_" autocomplete="off">
						</div>										
						<div class="formContent">
							<div class="formButton">
								 <a href="javascript:update();" id="formContactSubmit">Salvar</a>  						  							
							</div>
						</div>
					</form>
				</div>
			</div>		
		</div>
		
		<script>
  
			function update(){
					 
				if(J("#password").val() != "" & J("#password2").val() == ""){
					alert("Por favor, repita a senha ou deixe os campos em branco para não alterar.")
					document.getElementById("password2").focus();
					return;
				}
				if(J("#password").val() != J("#password2").val()){
					alert("As senhas não conferem. Caso não queira alterar as senhas, deixe-as em branco.")
					document.getElementById("password2").focus();
					return;
				}
				 
				// dados de enredeço
				 
				if(J("#cep_").val() == ""){

					alert("Por favor, informe seu cep.");
					jQuery("#loading").hide();
					document.getElementById("cep_").focus();
					return;
				}
				 if(J("#endereco_").val() == ""){

					alert("Por favor, informe seu endereco.");
					jQuery("#loading").hide();
					document.getElementById("endereco_").focus();
					return;
				} 
				/*
				if(J("#ddd_").val() == ""){

					alert("Por favor, informe o DDD.");
					jQuery("#loading").hide();
					document.getElementById("ddd_").focus();
					return;
				}
				*/
				if(J("#numero_").val() == ""){

					alert("Por favor, informe o número.");
					jQuery("#loading").hide();
					document.getElementById("numero_").focus();
					return;
				}
				if(J("#bairro_").val() == ""){

					alert("Por favor, informe seu bairro.");
					jQuery("#loading").hide();
					document.getElementById("bairro_").focus();
					return;
				}
				if(J("#cidadeusuario_").val() == ""){

					alert("Por favor, informe sua cidade.");
					jQuery("#loading").hide();
					document.getElementById("cidadeusuario_").focus();
					return;
				}
				if(J("#estado_").val() == ""){

					alert("Por favor, informe seu estado.");
					jQuery("#loading").hide();
					document.getElementById("estado_").focus();
					return;
				}	
				if(J("#ddd_").val() == ""){

					alert("Por favor, informe seu DDD.");
					jQuery("#loading").hide();
					document.getElementById("ddd_").focus();
					return;
				}	
				if(J("#telefone_").val() == ""){

					alert("Por favor, informe seu telefone.");
					jQuery("#loading").hide();
					document.getElementById("telefone_").focus();
					return;
				}
				  J("#formcadupdate").submit();				 
			}
			
			function getEndereco() {
			 
				// Se o campo CEP não estiver vazio
				if(J.trim(J("#cep_").val()) != ""){
					/* 
						Para conectar no serviço e executar o json, precisamos usar a função
						getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
						dataTypes não possibilitam esta interação entre domínios diferentes
						Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
						http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+J("#cep").val()
					*/
					J.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+J("#cep_").val(), function(){
						// o getScript dá um eval no script, então é só ler!
						//Se o resultado for igual a 1
						if(resultadoCEP["resultado"]){
							// troca o valor dos elementos
							J("#endereco_").val(unescape(resultadoCEP["tipo_logradouro"])+"  "+unescape(resultadoCEP["logradouro"]));
							J("#bairro_").val(unescape(resultadoCEP["bairro"]));
							J("#cidadeusuario_").val(unescape(resultadoCEP["cidade"]));
							J("#estado_").val(unescape(resultadoCEP["uf"]));
						}else{
							alert("Endereço não encontrado");
						}
					});				
				}			
			} 
		</script>
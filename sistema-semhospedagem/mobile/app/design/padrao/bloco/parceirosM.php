		<div style="display:none;" class="tips"><?=__FILE__?></div>
		<div class="divFormAuth">
			<div class="productsPage">
				<div class="formAuth">
					<form method="POST" name="acaoformcadparceiro" id="acaoformcadparceiro">
						<h2>Dados Gerais</h2>
						<hr>
						<div class="formContent">
							<label>
								Nome:
							</label>
							<input id="nome" type="text" name="nome" placeholder="Nome" autocomplete="off">
						</div>
						<div class="formContent">
							<label>
								Sobrenome:
							</label>
							<input id="sobrenome" type="text"  name="sobrenome" placeholder="Sobrenome" autocomplete="off">
						</div>
						<div class="formContent">
							<label>
								Empresa:
							</label>
							<input id="empresa" type="text" name="empresa" placeholder="Empresa" autocomplete="off">
						</div>
						<div class="formContent">
							<label>
								Email:
							</label>
							<input id="email" type="text" name="email" placeholder="Email de contato" autocomplete="off">
						</div>	
						<h2>Dados do seu negócio</h2>
						<hr>						
						<div class="formContent">
							<label>
								Categoria:
							</label>
							<input id="categoria" type="text" name="categoria" placeholder="Categoria" autocomplete="off">
						</div>					
						<div class="formContent">
							<label>
								Telefone:
							</label>
							<input id="telefoneparceiro" type="text" name="telefoneparceiro" placeholder="Telefone de contato" autocomplete="off">
						</div>	
						<div class="formContent">
							<label>
								Site:
							</label>
							<input id="site" type="text" name="site" placeholder="Site" autocomplete="off">
						</div>
						<div class="formContent">
							<label>
								Endereço:
							</label>
							<input id="enderecoparceiro" type="text" name="enderecoparceiro" placeholder="Endereço" autocomplete="off">
						</div>
						<div class="formContent">
							<select name="websites3parceiro" id="websites3parceiro" style="height:33px; font-size:13px; margin-left: 0px;padding:6px;">
								<option value="">Informe seu estado</option>
								<option value="Acre">Acre</option>
								<option value="Alagoas">Alagoas</option>
								<option value="Amapá">Amapá</option>
								<option value="Amazonas">Amazonas</option>
								<option value="Bahia">Bahia</option>
								<option value="Ceará">Ceará</option>
								<option value="Distrito Federal">Distrito Federal</option>
								<option value="Espírito Santo">Espírito Santo</option>
								<option value="Goiás">Goiás</option>
								<option value="Maranhão">Maranhão</option>
								<option value="Mato Grosso">Mato Grosso</option>
								<option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
								<option value="Minas Gerais">Minas Gerais</option>
								<option value="Pará">Pará</option>
								<option value="Paraíba">Paraíba</option>
								<option value="Paraná">Paraná</option>
								<option value="Pernambuco">Pernambuco</option>
								<option value="Piauí">Piauí</option>
								<option value="Rio de Janeiro">Rio de Janeiro</option>
								<option value="Rio Grande do Norte">Rio Grande do Norte</option>
								<option value="Rio Grande do Sul">Rio Grande do Sul</option>
								<option value="Rondônia">Rondônia</option>
								<option value="Santa Catarina">Santa Catarina</option>
								<option value="Roraima">Roraima</option>
								<option value="São Paulo">São Paulo</option>
								<option value="Sergipe">Sergipe</option>
								<option value="Tocantins">Tocantins</option>
							</select>
						</div>
						<div class="formContent">
							<label>
								Cidade:
							</label>
							<input id="cidade" type="text" name="cidade" placeholder="Cidade" autocomplete="off">
						</div>
						<div class="formContent">
							<label>
								Bairro:
							</label>
							<input id="bairroparceiro" type="text" name="bairroparceiro" placeholder="Bairro" autocomplete="off">
						</div>
						<div class="formContent">
							<label>
								CEP:
							</label>
							<input id="cepparceiro" type="text" name="cepparceiro" placeholder="CEP" autocomplete="off">
						</div>
						<h2>Fale um pouco sobre o seu negócio</h2>
						<hr>	
						<div class="formContent">
							<textarea id="txtMensagem" name="txtMensagem" style="color:#000;font-size:14px;height:80px;padding:2px;max-width:460px;" ></textarea>
						</div>
						<input type="hidden" name="acao" id="acao"  value="enviadados">
						<div class="formContent">
							<div class="formButton">
								 <a href="#" onclick="cadastro();" >Enviar</a>  						  							
							</div>
						</div>
					</form>
				</div>
			</div>		
		</div>
		<script language="javascript">
	  
	function cadastro(){
	 
			if(J("#nome").val() == ""){
				alert("Informe o seu nome.")
				document.getElementById("nome").focus();
				return;
			}
				
			if(J("#sobrenome").val() == ""){
				alert("Insira seu sobrenome.")
				document.getElementById("sobrenome").focus();
				return;
			}
 
			if(J("#empresa").val() == ""){
				alert("Informe o nome de sua empresa.")
				document.getElementById("empresa").focus();
				return;
			}		
			
			if(J("#email").val() == ""){
				alert("Informe o seu email.")
				document.getElementById("email").focus();
				return;
			}	
 
			if(J("#categoria").val() == ""){
				alert("Informe a categoria de suas ofertas.")
				document.getElementById("categoria").focus();
				return;
			}
			if(J("#telefoneparceiro").val() == ""){
				alert("Informe o seu telefone.")
				document.getElementById("telefoneparceiro").focus();
				return;
			}
			if(J("#enderecoparceiro").val() == ""){
				alert("Informe o seu endereço.")
				document.getElementById("enderecoparceiro").focus();
				return;
			}
			 if(J("#websites3parceiro").val() == ""){
				alert("Informe o seu estado.")
				document.getElementById("websites3parceiro").focus();
				return;
			}
			
			if(J("#cidade").val() == ""){
				alert("Informe a sua cidade.")
				document.getElementById("cidade").focus();
				return;
			}
			
			if(J("#bairroparceiro").val() == ""){
				alert("Informe o seu bairro.")
				document.getElementById("bairroparceiro").focus();
				return;
			}
			
			if(J("#cepparceiro").val() == ""){
				alert("Informe o seu cep.")
				document.getElementById("cepparceiro").focus();
				return;
			}
			
			if(J("#informacoes").val() == ""){
				alert("Nos conte um pouco sobre sua empresa.")
				document.getElementById("informacoes").focus();
				return;
			}
			
			 
		   J("#acaoformcadparceiro").submit();
			
	}	
  	 
    <?php  
	if($enviou){ ?> 
		alert("Obrigado ! Entraremos em contato em breve")
		location.href  = '<?php echo $INI['system']['wwwprefix']?>/index.php';
	   <? }
	else if($_POST["acao"] == "enviadados" and !$enviou){?>
		alert("Não foi possível enviar os dados, tente novamente mais tarde.")
	<? } ?>
	 
			
</script>	
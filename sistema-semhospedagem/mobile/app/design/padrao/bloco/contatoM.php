		<div style="display:none;" class="tips"><?=__FILE__?></div>
		<div class="divFormAuth">
			<div class="productsPage">
				<div class="formAuth">
					<form method="POST" name="formFaleConosco" id="formFaleConosco">
						<div class="formContent">
							<label>
								Nome completo:
							</label>
							<input id="txtNome" type="email" maxlength="50" name="nome" placeholder="Nome completo" autocomplete="off">
						</div>
						<div class="formContent">
							<label>
								Email:
							</label>
							<input id="txtEmail" type="text" maxlength="50" name="email" placeholder="Email de contato" autocomplete="off">
						</div>					
						<div class="formContent">
							<label>
								CPF/CNPJ:
							</label>
							<input id="cpfncpj" type="text" maxlength="30" name="cpfncpj" placeholder="CPF/CNPJ" autocomplete="off">
						</div>					
						<div class="formContent">
							<label>
								Telefone:
							</label>
							<input id="telefonecontato" type="text" maxlength="11" name="telefonecontato" placeholder="Telefone de contato" autocomplete="off">
						</div>	
						<div class="formContent">
							<label>
								Assunto:
							</label>
							<select name="assunto" id="ddlAssunto">
								<option value=""></option> 
								<option value="Anúncio de veículo">Anúncio de veículo</option>
								<option value="Anúncio de moto">Anúncio de moto</option>
								<option value="Busca de veículo">Busca de veículo</option>
								<option value="Busca de moto">Busca de moto</option>
								<option value="Cadastro do anunciante">Cadastro do anunciante</option>
								<option value="Desativar anúncio">Desativar anúncio</option>
								<option value="Elogio">Elogio</option>
								<option value="Incluir modelo de veículo">Incluir modelo de veículo</option>
								<option value="Incluir ou alterar fotos">Incluir ou alterar fotos</option>
								<option value="Problemas com pagamento">Problemas com pagamento</option>
								<option value="Problemas com senha">Problemas com senha</option>
								<option value="Reclamação">Reclamação</option> 
								<option value="Sugestão">Sugestão</option>
								<option value="Suspeita de fraude">Suspeita de fraude</option>
								<option value="Imprensa">Imprensa</option>
								<option value="CEP Inválido">CEP Inválido</option>
								<option value="Outros">Outros</option>
							</select>
						</div>						
						<div class="formContent">
							<label>
								Mensagem:
							</label>
							<textarea id="txtMensagem" name="txtMensagem" maxlength="1000"></textarea>
						</div>					
						<div class="formContent">
							<div class="formButton">
								 <a href="#" id="formContactSubmit">Enviar</a>  						  							
							</div>
						</div>
					</form>
				</div>
			</div>		
		</div>
		<script language="javascript">
			
			jQuery('document').ready(function(){
				
				jQuery('#formContactSubmit').click(function(){
				  
					if(jQuery("#txtNome").val() == ""){
						alert("Por favor, informe o seu nome.")
						document.getElementById("txtNome").focus();
						return false;
					} 
					if(jQuery("#txtEmail").val() == ""){
						alert("Por favor, informe o seu email.")
						document.getElementById("txtEmail").focus();
						return false;
					}
					if(!validaremail(jQuery("#txtEmail").val()  )){
						alert("Por favor, informe um email válido.")
						document.getElementById("txtEmail").focus();
						return false;
					}
				 
					 
					if(jQuery("#cpfncpj").val() == ""){
						alert("Por favor, informe o seu CPF ou CNPJ.")
						document.getElementById("cpfncpj").focus();
						return false;
					}
					
					if(!ValidarCPFeCNPJ(jQuery("#cpfncpj").val())){
						alert('CPF ou CNPJ inválido. Por favor, verifique o seu documento e tente novamente');
						document.getElementById("cpfncpj").focus();
						return false;
					}
					
					if(jQuery("#telefonecontato").val() == ""){
						alert("Por favor, informe o seu telefone.")
						document.getElementById("telefonecontato").focus();
						return false;
					}
					if(jQuery("#ddlAssunto").val() == ""){
						alert("Por favor, escolha um assunto")
						document.getElementById("ddlAssunto").focus();
						return false;
					}
					   
					if( document.formFaleConosco.txtMensagem.value == ""){
						alert("Por favor, escreva a mensagem.")
						document.formFaleConosco.txtMensagem.focus();
						return false;
					}		
					 
					jQuery("#formFaleConosco").submit();			
				});			
			});
			 
		  <?php  
			if($enviou){ ?> 
				alert("Obrigado por entrar em contato, iremos responder a você o mais rápido possível !")
				location.href  = '<?php echo $INI['system']['wwwprefix']?>/index.php';
			   <? }
			else if($_POST and !$enviou){?>
				alert("Não foi possível enviar os dados, tente novamente mais tarde.")
			<? } ?>
		</script>		
		<script type="text/javascript">

		jQuery("#faqs dd").hide();
		jQuery("#faqs dt").click(function () {
			jQuery(this).next("#faqs dd").slideToggle(500);
			jQuery(this).toggleClass("expanded");
		});

		//valida o CPF digitado
		function ValidarCPFeCNPJ(Objcpf){
			 
		var cpf = Objcpf;
		exp = /\.|\-/g
		cpf = cpf.toString().replace( exp, "" ); 
		var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
		var soma1=0, soma2=0;
		var vlr =11;

		for(i=0;i<9;i++){
			soma1+=eval(cpf.charAt(i)*(vlr-1));
			soma2+=eval(cpf.charAt(i)*vlr);
			vlr--;
		}	
		soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
		soma2=(((soma2+(2*soma1))*10)%11);

		var digitoGerado=(soma1*10)+soma2;
		if(digitoGerado!=digitoDigitado){	
				//alert('CPF Invalido!');		
				if(!ValidarCNPJ(Objcpf)){
					return false;
				}
			}
			return true;
		}

		//valida o CNPJ digitado
		function ValidarCNPJ(ObjCnpj){
		 
			var CNPJ = ObjCnpj;
			var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
			var dig1= new Number;
			var dig2= new Number;
			
			exp = /\.|\-|\//g
			CNPJ = CNPJ.toString().replace( exp, "" ); 
			var digito = new Number(eval(CNPJ.charAt(12)+CNPJ.charAt(13)));
				
			for(i = 0; i<valida.length; i++){
				dig1 += (i>0? (CNPJ.charAt(i-1)*valida[i]):0);	
				dig2 += CNPJ.charAt(i)*valida[i];	
			}
			dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
			dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));
			
			if(((dig1*10)+dig2) != digito){	 
				return false;
			}
			return true;		
		}
		  
		function validaremail(email ){
		  var email = email;
		  if(email != "")
		  {
			 var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			 if(filtro.test(email))
			 { 
				return true;
			 } else { 
			   return false;
			 }
		  } 
		} 
		</script>
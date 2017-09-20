<?php
require_once("include/code/contato.php");
$pagetitle = 'Entre em contato conosco';
?> 

<?php  require_once("include/head.php"); ?>
<body id="page1">
<style>
.formulario input#txtNome, .formulario input#txtEmail, .formulario input#dddTel, .formulario textarea#txtMsg, .formulario input#valores{
    margin: 0 0 0 0px;
}
</style>
<div style="display:none;" class="tips"><?=__FILE__?></div>
<div class="tail-top">
<?php  require_once(DIR_BLOCO."/bloco_background.php"); ?>
    <div class="main">
       <?php  require_once(DIR_BLOCO."/header.php"); ?>
		<section id="content">
			
			<?php  require_once(DIR_BLOCO."/bannertopo.php"); ?>
            <div class="inside">
				<div class="container">
					<div class="col-1c">
						<div class="container">
						   <div class="col-6" style="width:914px" >  
							 <div class="span-7 showgridx" style="float:left;width:290px;padding-top:0px;"> 
								   <div class="raio-5 borda-box-conteudo margin-bottom-20"> 
								   <div class="antduvida">Antes de enviar um e-mail para nossa equipe, verifique se sua dúvida já se encontra entre as perguntas frequentes</div>
									<h4 class="size-19-bold ico-env-email-aberto" style="text-align:center;padding:12px;">Fale conosco</h4>	
									<div class="span-7 last" id="conteinerEmail">
										<form method="post" name="formFaleConosco" id="formFaleConosco" onsubmit="javascript:return cadastrocontato();"> 
											<div class="prepend-1 span-6 last padding-bottom-10" style="padding-left:14px;"> 
												<!-- 
												<div class="span-6 last">
													<input type="radio" checked="checked" title="Pessoa Física" value="PF" id="chkTipoPessoaF" name="tipopessoa" class="span-1 radio-ajuste borda-0">
													<label class="span-5 size-13 bold last" for="chkTipoPessoaF">Pessoa Física</label>
												</div>
												<div class="span-6 last margin-bottom-10">
													<input type="radio" title="Pessoa Jurídica" value="PJ" id="chkTipoPessoaJ" name="tipopessoa" class="span-1 radio-ajuste borda-0">
													<label class="span-5 size-13 last" for="chkTipoPessoaJ">Pessoa Jurídica</label>
												</div>
												-->
												<label class="span-6 last size-12">*Nome:</label>
												<input type="text" class="span-5 last raio-5 required" id="txtNome" name="nome">
												<label class="span-6 last size-12">*Email:</label>
												<input type="text" class="span-5 last raio-5 required email" id="txtEmail" name="email">
												<label class="span-6 last size-12">*CPF/CNPJ:</label>
												<input type="text" class="span-5 last raio-5 required email" id="cpfncpj" name="cpfncpj">	
												<label class="span-6 last size-12">*Telefone:</label>
												<input type="text" onkeypress='mascaraTelefone(this,telDig)' class="span-5 last raio-5 required email" id="telefonecontato" name="telefonecontato">
												
												<label class="span-6 last size-12">*Assunto:</label>
												<select class="span-5 last raio-5 required" id="ddlAssunto" name="assunto" style="width:205px">
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
												<label class="span-6 last size-12">*Mensagem:</label>
												<textarea class="span-5 last raio-5 text-contato required" maxlength="1000" id="txtMensagem" name="txtMensagem"></textarea> 
												<span class="size-11-bold vermelho-padrao span-6 last margin-top-10 margin-bottom-10">*Campos obrigatórios</span>
												<div style="width: 143px; text-align: center;">
													<button id="btnEnviar"  style="width:94px;"   title="Enviar" data-tipo-anuncio="Usados" data-tipo-veiculo="Carro" data-id="11239890"   class="span-4 last raio-5 size-14-bold bt-cinza margin-top-10">Enviar</button> 
												</div>
												<br><br>
											</div>
										</form>
									</div>
								</div>
								<? if($INI['mail']['helpphone'] != ""){?>
								
								<div class="span-7 raio-5 borda-box-conteudo" style="width:276px;"> 
									<h4 class="size-19-bold ico-env-email-aberto" style="text-align:center;padding:12px;margin-left:-14px;">Por telefone</h4>	
									<div class="last hide text-align-center" id="conteinerTelefone">
										<p class="size-13-bold padrao margin-top-20 margin-bottom-15">Central de relacionamento</p>
										<p class="size-17-bold vermelho-padrao margin-0"><?=$INI['mail']['helpphone']?></p>
										<!--<p class="size-13 padrao margin-top-0 margin-bottom-20">Capitais e regiões metropolitanas</p>
										 <p class="size-17-bold vermelho-padrao margin-0">(11) 4004 3488</p>
										<p class="size-13 padrao margin-top-0 margin-bottom-20">Demais localidades</p>-->
										<p class="size-13-bold padrao margin-top-15 margin-bottom-20">De 2ª a 6ª, das 8h às 20h</p>
									</div>
								</div>
								<? } ?>
							</div> 
								<?php  require_once(DIR_BLOCO."/bloco_faq.php"); ?>
							</div>
						 </div>
					</div>
				</div>
			</div>
        </section>
   </div>
</div> 
 
<?php require_once(DIR_BLOCO."/rodape.php"); ?>

<script language="javascript">
  
J("#menu1").attr("class","")
J("#menu2").attr("class","")
J("#menu3").attr("class","")
J("#menu4").attr("class","")

 //J("#telefonecontato").mask("(99)99999-9999");

</script>

<script language="javascript">
	  
	function cadastrocontato(){
	  
			if(J("#txtNome").val() == ""){
				alert("Por favor, informe o seu nome.")
				document.getElementById("txtNome").focus();
				return false;
			} 
			if(J("#txtEmail").val() == ""){
				alert("Por favor, informe o seu email.")
				document.getElementById("txtEmail").focus();
				return false;
			}
		 	if(!validaremail(J("#txtEmail").val()  )){
				alert("Por favor, informe um email válido.")
				document.getElementById("txtEmail").focus();
				return false;
			}
		 
			 
			if(J("#cpfncpj").val() == ""){
				alert("Por favor, informe o seu CPF ou CNPJ.")
				document.getElementById("cpfncpj").focus();
				return false;
			}
			
			if(!ValidarCPFeCNPJ(J("#cpfncpj").val())){
				alert('CPF ou CNPJ inválido. Por favor, verifique o seu documento e tente novamente');
				document.getElementById("cpfncpj").focus();
				return false;
			}
			
			if(J("#telefonecontato").val() == ""){
				alert("Por favor, informe o seu telefone.")
				document.getElementById("telefonecontato").focus();
				return false;
			}
			if(J("#ddlAssunto").val() == ""){
				alert("Por favor, escolha um assunto")
				document.getElementById("ddlAssunto").focus();
				return false;
			}
			   
			if( document.formFaleConosco.txtMensagem.value == ""){
				alert("Por favor, escreva a mensagem.")
				document.formFaleConosco.txtMensagem.focus();
				return false;
			}		
			 
		 J("#formFaleConosco").submit();	 
	}	
  	 
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
	J("#faqs dd").hide();
	J("#faqs dt").click(function () {
		J(this).next("#faqs dd").slideToggle(500);
		J(this).toggleClass("expanded");
	});
</script>

<script> 

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
 
	var cnpj = ObjCnpj;
	var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
	var dig1= new Number;
	var dig2= new Number;
	
	exp = /\.|\-|\//g
	cnpj = cnpj.toString().replace( exp, "" ); 
	var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));
		
	for(i = 0; i<valida.length; i++){
		dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);	
		dig2 += cnpj.charAt(i)*valida[i];	
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

</body>
</html>

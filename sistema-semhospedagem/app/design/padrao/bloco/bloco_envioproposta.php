<?php
session_start();
$cap = 'notEq';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['captcha'] == $_SESSION['cap_code']) {
        // Captcha verification is Correct. Do something here!
        $cap = 'Eq';
    } else {
        // Captcha verification is wrong. Take other action
        $cap = '';
    }
}
?>
<style>
input{
	font-size:12px;
}
textarea{
	font-size:12px;
}
</style>
 
<div class="carro-detalhe"> 
 <div style="display:none;height:36px;" class="tips"><?=__FILE__?></div>
<div class="span-8 dados-vendedor raio-5 last ">	
	<input type="hidden" value="<?=$team['id']?>" name="idoferta_proposta" id="idoferta_proposta">
	<div id="divContato" class="formulario span-8 last">
		<div class="span-8 last caixa-linha-ficha" id="container-nome">
			<div class="span-8 borda-bottom-1 fundosecao">
				<div class="alturasecao"><h4 class="branco-padrao size-20-bold jump-1">Enviar proposta</h4></div>
			</div>
		 
				<div class="span-7 jump-1 last"  style="text-align:left;">
					<label class="last size-13-bold rotulo">Seu nome</label>
				</div> 
			  <input type="text" maxlength="100" id="txtNome"  name="nome_proposta" class="span-6-b raio-5">
		</div>
		<div class="span-8 last caixa-linha-ficha" id="container-email" style="clear:both;">
			<div class="span-8 last margin-top-10">
				<div class="span-7 jump-1 last"  style="text-align:left;">
					<label class="last size-13-bold rotulo">Seu e-mail</label>
				</div>
			</div>
			<input type="text" maxlength="60" id="txtEmail"  name="email_proposta" class="span-6-b raio-5">
		</div>
		<div class="span-8 last caixa-linha-ficha" id="container-tel" style="clear: both;">
			<div class="span-8 last margin-top-10">
				<div class="span-7 jump-1 last"  style="text-align:left;">
					<label class="last size-13-bold rotulo"  >Telefone</label>
				</div>
			</div>
			<input type="text" maxlength="2"  id="dddTel" onKeyPress="return SomenteNumero(event);" name="ddd_proposta" class="span-2-b raio-5 ddd">
			<input type="text" id="txtTel"  maxlength="9"  onKeyPress="return SomenteNumero(event);" name="telefone_proposta" class="span-4 raio-5 celular" style="margin-left:-30px;">
		</div>
		<div class="span-8 last caixa-linha-ficha"  style="text-align:left;" id="container-msg">
			<div class="span-8 last margin-top-10">
				<div class="span-7 jump-1 last">
					<label class="last size-13-bold rotulo"  >Mensagem</label>
				</div>
			</div> 
			<textarea onkeyup="limite_textarea(this.value)" maxlength="500" name="proposta" id="txtMsg" class="span-6-b last raio-5" rows=""></textarea>
		</div>
		<div class="jump-1 last caixa-linha-ficha size-12"  style="text-align:left;clear: both;">
			Caracteres restantes: <label id="conttxt" for="txtMsg">500</label>
		</div>
		<div class="span-8 last checkboxes" style="text-align:left;clear:both;margin-top:19px;">
			<div class="jump-1 size-12">
				 <input type="checkbox"   id="chkFinanciar" onclick="vercamposfin();" name="financiar" title="Quero financiar" class="span-1 div-checkbox-ajuste-2 borda-0" value="Financiar"> Desejo simular o financiamento
			 </div>
			 
		<div id="camposfinanciamento" style="display:none;">
			<div class="span-8 last caixa-linha-ficha" id="container-email" style="clear:both;">
				<div class="span-8 last margin-top-10">
					<div class="jump-1 last size-12"  style="text-align:left;">
						<label class="last size-13-bold rotulo">Valor Financiado</label>
					</div>
				</div>
				<input type="text" maxlength="60" id="financiar_valor"  name="financiar_valor" class="span-6-b raio-5">
			</div>
			<div class="span-8 last caixa-linha-ficha" id="container-email" style="clear:both;">
				<div class="span-8 last margin-top-10">
					<div class="jump-1 last size-12"  style="text-align:left;">
						<label class="last size-13-bold rotulo">Valor da Entrada</label>
					</div>
				</div>
				<input type="text" maxlength="60" id="financiar_entrada"  name="financiar_entrada" class="span-6-b raio-5">
			</div>
			<div class="span-8 last caixa-linha-ficha" id="container-email" style="clear:both;">
				<div class="span-8 last margin-top-10">
					<div class="jump-1 last size-12"  style="text-align:left;">
						<label class="last size-13-bold rotulo">Parcelas</label>
					</div>
				</div>
				<input type="text" maxlength="3" id="financiar_parcelas" onKeyPress="return SomenteNumero(event);"  name="financiar_parcelas" class="span-6-b raio-5">
			</div>
		</div>
			<div class="jump-1 size-12" style="clear:both;">
				 <input type="checkbox" id="chkTroca" name="aceitaTroca" aceitatroca="True" title="Quero dar veículo na troca" class="span-1 div-checkbox-ajuste-2 borda-0" value="Carro"> Quero dar veículo na troca 
			</div>
			<div class="jump-1 size-12">
				 <input type="checkbox" checked="checked" id="chkCopia" name="copiaemail" title="Quero receber cópia do e-mail" class="span-1 div-checkbox-ajuste-2 borda-0" value="Copia"> 
				 Quero receber cópia do e-mail 
			</div>
			<div class="jump-1 size-12" style="width:246px;">
				 <input type="checkbox" checked="checked" id="chkPromo" name="promocao" title="Desejo receber promoções e ofertas " class="span-1 div-checkbox-ajuste-2 borda-0" value="Promo"> 
				 Desejo receber novidades do site <?=utf8_decode( $INI['system']['sitename']); ?> e de seus parceiros. 
			</div>
			<div class="span-5 jump-1 last captcha-cont-vendedor" style="margin-top:22px;width:243px;" >
				 <div class="span-9 last captcha"> 
					<img src="<?=$ROOTPATH?>/include/library/phpcaptcha/captcha.php"/>
					<input onfocus="if(this.value =='Digite o texto ao lado' ) this.value=''" onblur="if(this.value=='') this.value='Digite o texto ao lado'" value="Digite o texto ao lado" type="text" style="width:119px;" name="captcha" id="captcha" maxlength="6" class="span-6-b raio-5" size="6"/>
					<!-- <span class="span-9 size-11 frase-link tente-outra">Não consegue ler a imagem? <a title="Recarregar imagem" class="text-underline azul-039" href="javascript:void(0)" id="recargarCaptcha">Tente outra</a></span>-->
				</div> 
				<div style="width: 163px;">	
				<button id="btnEnviar"  style="width:94px;" onclick="javascript:enviaproposta();"  title="Enviar" data-tipo-anuncio="Usados" data-tipo-veiculo="Carro" data-id="11239890"   class="span-4 last raio-5 size-14-bold bt-verm margin-top-10">Enviar</button>
				</div>
				<DIV><BR><BR></DIV>				
			</div>
		</div>
	</div> 	 
</div>
</div>
<script> 

function limite_textarea(valor) {
    quant = 500;
    total = valor.length;
    if(total <= quant) {
        resto = quant - total;
        document.getElementById('conttxt').innerHTML = resto;
    } else {
        document.getElementById('txtMsg').value = valor.substr(0,quant);
    }
}

function vercamposfin(){
	 var  chkFinanciar; 
	 chkFinanciar = J("input[type=checkbox][id=chkFinanciar]:checked").val() ;
	  
	 if(chkFinanciar=="Financiar"){
		J("#camposfinanciamento").show();
	 }
	 else{
		J("#camposfinanciamento").hide();
	 }

	 
}
function enviaproposta(){
 
	valoranuncio = '<?=$team['team_price']?>'
	  
	var idoferta = J("#idoferta_proposta").val();
	var nome_proposta = J("#txtNome").val();
	var email_proposta  = J("#txtEmail").val();
	var ddd_proposta = J("#dddTel").val();
	var telefone_proposta = J("#txtTel").val();
	var proposta = J("#txtMsg").val(); 
	var financiar_valor = J("#financiar_valor").val(); 
	var financiar_entrada = J("#financiar_entrada").val(); 
	var financiar_parcelas = J("#financiar_parcelas").val(); 
	var chkFinanciar = J("input[type=checkbox][id=chkFinanciar]:checked").val() ;
	var chkTroca = J("input[type=checkbox][id=chkTroca]:checked").val() ;
	var chkCopia = J("input[type=checkbox][id=chkCopia]:checked").val() ;
	var chkPromo = J("input[type=checkbox][id=chkPromo]:checked").val() ;
	var captcha = J('#captcha').val();
	 
	if(idoferta == ""){

		alert("Ocorreu um erro inesperado. Por favor, volte mais tarde.")
		return;
	} 
	if(nome_proposta == ""){

		alert("Você esqueceu de informar o seu nome")
		document.getElementById("nome_proposta").focus();
		return;
	} 
	if(email_proposta == ""){

		alert("Você esqueceu de informar o seu email")
		document.getElementById("email_proposta").focus();
		return;
	}
	 if(chkFinanciar=="Financiar"){
		if(financiar_valor==""  || financiar_valor=="R$ 0,00"){
			alert("Você informou que deseja simular um financiamento, neste caso você deve informar o valor financiado")
			document.getElementById("financiar_valor").focus();
			return;
		}
		if(financiar_entrada=="" || financiar_entrada=="R$ 0,00"){
			alert("Informe o valor de entrada para a simulação do financiamento")
			document.getElementById("financiar_entrada").focus();
			return;
		}	
		/*
		if( Number(jQuery("#financiar_entrada").val().replace(/[^0-9]+/g,""))  > Number(jQuery("#financiar_valor").val().replace(/[^0-9]+/g,""))){
			
			alert("O valor de entrada não pode ser maior do que o valor financiado. Por favor, corrija os campos");
			 document.getElementById("financiar_valor").focus();
			return false; 
		}	*/
		valortotal = Number(jQuery("#financiar_entrada").val().replace(/[^0-9]+/g,""))  + Number(jQuery("#financiar_valor").val().replace(/[^0-9]+/g,""));
		valoranuncio = Number(valoranuncio.replace(/[^0-9]+/g,"")) ;
		//alert(valortotal)
		//alert(valoranuncio)
		if( valortotal > valoranuncio ){
			
			alert("O valor do seu financiamento não pode ser maior do que o valor do veículo. Por favor, corrija os campos");
			 document.getElementById("financiar_valor").focus();
			return false; 
		}
		
		if(financiar_parcelas=="" || financiar_parcelas=="0"){
			alert("Informe a quantidade de parcelas para a simulação do financiamento")
			document.getElementById("financiar_entrada").focus();
			return;
		}
	 }
	if(proposta == ""){

		alert("Informe alguma mensagem !")
		document.getElementById("proposta").focus();
		return;
	}  
	//jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Enviando sua proposta, por favor, aguarde...</font>"});
	
	J.ajax({
		   type: "POST",
		   cache: false,
		   async: true,
		   url: URLWEB+"/enviaproposta.php",
		   data: "financiar_valor="+financiar_valor+"&financiar_entrada="+financiar_entrada+"&financiar_parcelas="+financiar_parcelas+"&captcha="+captcha+"&chkFinanciar="+chkFinanciar+"&chkTroca="+chkTroca+"&chkCopia="+chkCopia+"&chkPromo="+chkPromo+"&idoferta="+idoferta+"&nome_proposta="+nome_proposta+"&email_proposta="+email_proposta+"&ddd_proposta="+ddd_proposta+"&telefone_proposta="+telefone_proposta+"&proposta="+proposta ,
		   success: function(msg){
		   
		   if( jQuery.trim(msg)==""){
			   resetaCampos();
		    	jQuery.colorbox({html:"<font color='black' size='10'>Proposta enviada com sucesso! </font>"});
			}  
		   else {
			   jQuery.colorbox({html:"<font color='black' size='10'>"+msg+"</font>"});
				}
			 }
		 });
}

 
J('#financiar_valor').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});
J('#financiar_entrada').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});
 
 function resetaCampos(){
	J('#txtNome').val("");
	J('#txtEmail').val("");
	J('#dddTel').val("");
	J('#txtTel').val("");
	J('#txtMsg').val("");
	J('#financiar_entrada').val("");
	J('#financiar_valor').val("");
	J('#financiar_parcelas').val("");
	J('#captcha').val("");
}

</script>
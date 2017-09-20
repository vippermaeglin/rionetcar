<div style="display:none;" class="tips"><?=__FILE__?></div>
<div class="formProposta">
	<form method="POST">
		<input type="hidden" value="<?=$team['id']?>" name="idoferta_proposta" id="idoferta_proposta">
		<div class="formContent">
			<label>Nome:</label>
			<input type="text" name="nome_proposta" id="txtNome" maxlength="100">	
		</div>
		<div class="formContent">
			<label>Email:</label>
			<input type="text" name="email_proposta" id="txtEmail" maxlength="60">		
		</div>
		<div class="formContent">
			<label>Telefone:</label>
			<input id="txtTel" type="text" name="telefone_proposta">	
		</div>
		<div class="formContent">
			<label>Mensagem:</label>
			<textarea id="txtMsg" name="proposta" maxlength="500"></textarea>
		</div>		
		<div class="formContent">
			<div class="formButton">
				<a id="formSubmit" href="#" onclick="javascript:enviaproposta();">Enviar</a>  						  							
			</div>
		</div>
	</form>
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
 
	valoranuncio = '<?=$team['team_price']?>';
	  
	var idoferta = J("#idoferta_proposta").val();
	var nome_proposta = J("#txtNome").val();
	var email_proposta  = J("#txtEmail").val();
	var ddd_proposta = J("#dddTel").val();
	var telefone_proposta = J("#txtTel").val();
	var proposta = J("#txtMsg").val(); 
	/*
	var financiar_valor = J("#financiar_valor").val(); 
	var financiar_entrada = J("#financiar_entrada").val(); 
	var financiar_parcelas = J("#financiar_parcelas").val(); 
	var chkFinanciar = J("input[type=checkbox][id=chkFinanciar]:checked").val() ;
	var chkTroca = J("input[type=checkbox][id=chkTroca]:checked").val() ;
	var chkCopia = J("input[type=checkbox][id=chkCopia]:checked").val() ;
	var chkPromo = J("input[type=checkbox][id=chkPromo]:checked").val() ;
	var captcha = J('#captcha').val();
	*/
	 
	if(idoferta == ""){

		alert("Ocorreu um erro inesperado. Por favor, volte mais tarde.")
		return;
	} 
	if(nome_proposta == ""){

		alert("Você esqueceu de informar o seu nome")
		document.getElementById("txtNome").focus();
		return;
	} 
	if(email_proposta == ""){

		alert("Você esqueceu de informar o seu email")
		document.getElementById("txtEmail").focus();
		return;
	}	
	
	if(telefone_proposta == ""){

		alert("Você esqueceu de informar o seu telefone")
		document.getElementById("dddTel").focus();
		return;
	}
		/*
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
		
		if( Number(jQuery("#financiar_entrada").val().replace(/[^0-9]+/g,""))  > Number(jQuery("#financiar_valor").val().replace(/[^0-9]+/g,""))){
			
			alert("O valor de entrada não pode ser maior do que o valor financiado. Por favor, corrija os campos");
			 document.getElementById("financiar_valor").focus();
			return false; 
		}	
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
	 */
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
		   url: "<?php echo $INI['system']['wwwprefix']; ?>/enviaproposta.php",
		   data: "formMobile=1&idoferta="+idoferta+"&nome_proposta="+nome_proposta+"&email_proposta="+email_proposta+"&ddd_proposta="+ddd_proposta+"&telefone_proposta="+telefone_proposta+"&proposta="+proposta ,
		   success: function(msg){
		   
		   if( jQuery.trim(msg)==""){
		    	jQuery.colorbox({html:"<font color='black' size='10'>Proposta enviada com sucesso! </font>", width:"95%"});
				
				J("#txtNome").val("");
				J("#txtEmail").val("");
				J("#dddTel").val("");
				J("#txtTel").val("");
				J("#txtMsg").val(""); 
			}  
		   else {
			   jQuery.colorbox({html:"<font color='black' size='10'>"+msg+"</font>", width:"95%"});
				}
			 }
		 });
}
/*
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
*/ 
</script>
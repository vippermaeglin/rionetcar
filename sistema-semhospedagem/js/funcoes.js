var idusuario="";

function isNumberKey(Key)
	{
	   var charCode = (Key.which) ? Key.which : event.keyCode
	   if (charCode > 47 && charCode < 58 || charCode == 8)
		  return true;
	   return false;
	}

function float2moeda(num) {

   x = 0;

   if(num<0) {
      num = Math.abs(num);
      x = 1;
   }
   if(isNaN(num)) num = "0";
      cents = Math.floor((num*100+0.5)%100);

   num = Math.floor((num*100+0.5)/100).toString();

   if(cents < 10) cents = "0" + cents;
      for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
         num = num.substring(0,num.length-(4*i+3))+'.'
               +num.substring(num.length-(4*i+3));
   ret = num + ',' + cents;
   if (x == 1) ret = ' - ' + ret;return ret;

}

function mascaraTelefone(o,f){
    v_obj=o
    v_fun=f
    setTimeout('execmascara()',1)
}
 
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
 
function telDig(v){
 
    //Remove tudo o que não é dígito
    v=v.replace(/\D/g,"")
 
    if (v.length < 11) { //8 dígitos (fixo e cels antigos)
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
       v=v.replace(/(\d{0})(\d)/,"$1($2")
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
        //de novo (para o segundo bloco de números)
       v=v.replace(/(\d{2})(\d)/,"$1)$2")
 
         //Coloca um hífen depois do bloco de quatro dígitos
        v=v.replace(/(\d{4})(\d)/,"$1-$2")
		 
  
    } else{ //9 dígitos (novos cels)
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
		v=v.replace(/(\d{0})(\d)/,"$1($2")
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
        //de novo (para o segundo bloco de números)
		v=v.replace(/(\d{2})(\d)/,"$1)$2")
 
        //Coloca uma barra entre o oitavo e o nono dígitos
        //v=v.replace(/\.(\d{3})(\d)/,".$1/$2")
 
        //Coloca um hífen depois do bloco de quatro dígitos
        v=v.replace(/(\d{5})(\d)/,"$1-$2")
	 
 
    } 
    return v 
}

function loginajax(email, senha){
	   
	if(email == ""){
			jQuery("#loadingcontato").hide();
			alert("Informe o seu email cadastrado em nosso site")
			document.getElementById("emailshare").focus();
			 
			return;
		}
		if(senha== ""){
			jQuery("#loadingcontato").hide();
			alert("Informe a sua senha cadastrada em nosso site.")
			document.getElementById("passwordshare").focus(); 
			return;
		}
	    
         jQuery("#loadingcontato").show();

		jQuery.ajax({
			   type: "POST",
			   cache: false,
			   async: true,
			   url: URLWEB+"/autenticacao/login.php",
			   data: "acao=loginimportacontato&email="+email+"&password="+senha,
			   success: function(msg){
			   if(jQuery.trim(msg)=="0"){
					jQuery("#loadingcontato").hide();
				   alert("usuário ou senha inválidos, por favor, verifique os seus dados e tente novamente.");
			   }
				if(jQuery.trim(msg)=="01"){
				   jQuery("#loadingcontato").hide();
				   alert("Nós ainda não recebemos a sua validação de email, por favor, entre no seu email de cadastro e clique no link de confirmação.");
			   }
			    
				if(jQuery.trim(msg)==""){
                        alert("Login realizado com sucesso. Agora infome o seu email e senha de alguma rede social como orkut, facebook, twitter, Badoo, Linkedin ou seu email e senha do gmail ou yahoo. ")
					   jQuery.ajax({
					   type: "POST",
					   cache: false,
					   async: true,
					   url: URLWEB+"/util/OpenInviter/convidar.php",
					   data: "",
					   success: function(msg){
					 	     jQuery("#loadingcontato").hide();
							 jQuery("#naologado").html(msg); 
						
					 }
				});
				}
				
			 }
		});
}

	
function validaCPF(cpf)
	{ 
		cpf = cpf.replace(/[^0-9]/g,'');
		
		if (cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999" || cpf.length < 11)
			return false;

		var a = [];
		var b = new Number;
		var c = 11;
		for (i=0; i<11; i++)
			{
				a[i] = cpf.charAt(i);
				if (i < 9) b += (a[i] * --c);
			}
		if ((x = b % 11) < 2)
			{ 
				a[9] = 0 
			} 
			else 
			{ 
				a[9] = 11-x 
			}
		b = 0;

		c = 11;
		for (y=0; y<10; y++) 
			b += (a[y] *  c--); 
		if ((x = b % 11) < 2) 
			{
				a[10] = 0; 
			} 
		else 
			{ 
				a[10] = 11-x; 
			}
		if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]))
			{
				return false;
			} 
			
		return true;
	}
	
function validaCNPJ(cnpj) {
 
    cnpj = cnpj.replace(/[^0-9]/g,'');
    if(cnpj == '') return false;
     
    if (cnpj.length != 14)
        return false;
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" ||
        cnpj == "11111111111111" ||
        cnpj == "22222222222222" ||
        cnpj == "33333333333333" ||
        cnpj == "44444444444444" ||
        cnpj == "55555555555555" ||
        cnpj == "66666666666666" ||
        cnpj == "77777777777777" ||
        cnpj == "88888888888888" ||
        cnpj == "99999999999999")
        return false;
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;
           
    return true;
    
}

function verificaData(datanascimento)
{
  Data = datanascimento.substring(0,10);
  
  var dma = -1;
  var datanascimento = Array(3);
  var ch = Data.charAt(0); 
  for(i=0; i < Data.length && (( ch >= '0' && ch <= '9' ) || ( ch == '/' && i != 0 ) ); ){
   datanascimento[++dma] = '';
   if(ch!='/' && i != 0) return false;
   if(i != 0 ) ch = Data.charAt(++i);
   if(ch=='0') ch = Data.charAt(++i);
   while( ch >= '0' && ch <= '9' ){
    datanascimento[dma] += ch;
    ch = Data.charAt(++i);
   } 
  }
  if(ch!='') return false;
  if(datanascimento[0] == '' || isNaN(datanascimento[0]) || parseInt(datanascimento[0]) < 1) return false;
  if(datanascimento[1] == '' || isNaN(datanascimento[1]) || parseInt(datanascimento[1]) < 1 || parseInt(datanascimento[1]) > 12) return false;
  if(datanascimento[2] == '' || isNaN(datanascimento[2]) || ((parseInt(datanascimento[2]) < 0 || parseInt(datanascimento[2]) > 99 ) && (parseInt(datanascimento[2]) < 1900 || parseInt(datanascimento[2]) > 9999))) return false;
  if(datanascimento[2] < 50) datanascimento[2] = parseInt(datanascimento[2]) + 2000;
  else if(datanascimento[2] < 100) datanascimento[2] = parseInt(datanascimento[2]) + 1900;
  switch(parseInt(datanascimento[1])){
   case 2: { if(((parseInt(datanascimento[2])%4!=0 || (parseInt(datanascimento[2])%100==0 && parseInt(datanascimento[2])%400!=0)) && parseInt(datanascimento[0]) > 28) || parseInt(datanascimento[0]) > 29 ) return false; break; }
   case 4: case 6: case 9: case 11: { if(parseInt(datanascimento[0]) > 30) return false; break;}
   default: { if(parseInt(datanascimento[0]) > 31) return false;}
  }
  return true;   
} 
	
function CheckEnter(Key)
	{
		var charCode = (Key.which) ? Key.which : event.keyCode
		if (charCode > 9 && charCode < 14)
			return false;
		return true;
	}
			
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}

function formatar_moeda(campo, separador_milhar, separador_decimal, tecla) {
	var sep = 0;
	var key = '';
	var i = j = 0;
	var len = len2 = 0;
	var strCheck = '0123456789';
	var aux = aux2 = '';
	var whichCode = (window.Event) ? tecla.which : tecla.keyCode;

	if (whichCode == 13) return true; // Tecla Enter
	if (whichCode == 8) return true; // Tecla Delete
	key = String.fromCharCode(whichCode); // Pegando o valor digitado
	if (strCheck.indexOf(key) == -1) return false; // Valor inválido (não inteiro)
	len = campo.value.length;
	for(i = 0; i < len; i++)
	if ((campo.value.charAt(i) != '0') && (campo.value.charAt(i) != separador_decimal)) break;
	aux = '';
	for(; i < len; i++)
	if (strCheck.indexOf(campo.value.charAt(i))!=-1) aux += campo.value.charAt(i);
	aux += key;
	len = aux.length;
	if (len == 0) campo.value = '';
	if (len == 1) campo.value = '0'+ separador_decimal + '0' + aux;
	if (len == 2) campo.value = '0'+ separador_decimal + aux;

	if (len > 2) {
		aux2 = '';

		for (j = 0, i = len - 3; i >= 0; i--) {
			if (j == 3) {
				aux2 += separador_milhar;
				j = 0;
			}
			aux2 += aux.charAt(i);
			j++;
		}

		campo.value = '';
		len2 = aux2.length;
		for (i = len2 - 1; i >= 0; i--)
		campo.value += aux2.charAt(i);
		campo.value += separador_decimal + aux.substr(len - 2, len);
	}

	return false;
}
	
var cidade;
var cidade="";
function envianewsletter(email,cidade){
 
	if(email == "" || email == "Insira seu e-mail"){

		alert("Você esqueceu de informar o seu email !")
		document.getElementById("NewsEmail").focus();
		return;
	}
  
	jQuery("#loadingcontatoheader").html("<img src="+URLWEB+"/skin/padrao/images/ajax-loader6.gif> <font color=#fff> Cadastrando. Aguarde...</font>");
		
	J.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: URLWEB+"/newsletter.php",
		   data: "email="+email+"&city_id="+cidade,
		   success: function(msg){
		   
		   if( jQuery.trim(msg)=="1"){
		    	jQuery("#loadingcontatoheader").html("");
				 alert("Obrigado ! Seu email foi cadastrado com sucesso!");
				jQuery("#NewsEmail").val("");
			}  
		   else {
					jQuery("#loadingcontatoheader").html("");
					alert(msg)
				}
			 }
		 });
}

 



function envianewsletterhome(email,cidade){

	 
	if(email == "" || email == "Insira seu e-mail"){
		alert("Você esqueceu de informar o seu email !")
		document.getElementById("emailnewshome").focus();
		return;
	}
	  
	if(cidade == ""){
		alert("Nos informe a cidade no qual deseja receber as ofertas.")
		document.getElementById("websites3").focus();
		return;
	}
	  
   jQuery("#loadingcontato").html("<img style=margin-left:50px; src="+URLWEB+"/skin/padrao/images/ajax-loader.gif> Cadastrando em nossa newsletter...");
		
	 
	J.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: URLWEB+"/newsletter.php",
		   data: "email="+email+"&city_id="+cidade,
		   success: function(msg){
		   
		   if(msg=="1"){
			    jQuery("#loadingcontato").html("");
				alert( "Cadastro realizado com sucesso. Vamos redirecionar para a cidade escolhida. Aproveite e compre já o seu ingresso reembolsável !" );
				Dialog.okCallback();
			    location.href=URLWEB+"/index.php?idcidade="+cidade;
				 
		   }  
		   else {
			  alert( msg );
			  jQuery("#loadingcontato").html("");
			  Dialog.okCallback();
			 
		   }
			    
		   }
		 });
}
 

function voltaimportarcontatos(){
	   
	 jQuery.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: URLWEB+"/util/OpenInviter/convidar.php",
		   data: "",
		   success: function(msg){
			   jQuery("#conteudo").html(msg); 
	   }
	});
}
 
  function showLoader(){
    J('.search-background').fadeIn(200);
  }
  function hideLoader(){
    J('.search-background').fadeOut(200);
  };

  function clicamenu( idcategoria){

	 showLoader();
    
    J("#paging_button li").css({'background-color' : ''});
    J(this).css({'background-color' : '#D8543A'});

    J("#pgofertas").load(URLWEB+"/include/paginacao_post.php?idcategoria="+idcategoria+"&page=1", hideLoader);
    //J("#numeropaginas").html("");
    J("#paging_button").load(URLWEB+"/include/paginacao.php?idcategoria="+idcategoria+"&page=1", hideLoader);
    
    return;

	}

	J(window).unload(function() {
	 
	 // alert(1)
	});
	
  function atualiza_click(idoferta){
      
		jQuery.ajax({
			   type: "POST",
			   cache: false,
			   async: true,
			   url: URLWEB+"/include/atualiza_click.php?idoferta="+idoferta,
			   data: "",
			   success: function(msg){  
				 //  jQuery(window.document.location).attr('href',site);
		   }
		});		
		
		jQuery.ajax({
			   type: "POST",
			   cache: false,
			   async: true,
			   url: URLWEB+"/include/atualiza_click_day.php?idoferta="+idoferta,
			   data: "",
			   success: function(msg){  
				 //  jQuery(window.document.location).attr('href',site);
		   }
		});
	
	}  

	function atualiza_pageview(idoferta){
 
	  jQuery.ajax({
			   type: "POST",
			   cache: false,
			   async: true,
			   url: URLWEB+"/include/atualiza_pageview.php?idoferta="+idoferta,
			   data: "",
			   success: function(msg){  
				  // jQuery(window.document.location).attr('href',site);
		   }
		});
	
	}
  
function cadastra_pedido(){
		 
		quantidade 		= J("#quantidade_pedido").val();
		valorpedido 	= J("#valorpedido").val();
		valor_unitario 	= J("#valor_unitario").val(); 
		gateway 		= J("#gateway").val();  
		idoferta 		= J("#idoferta").val();
		
		if(idusuario==""){
			idusuario 		= J("#idusuario").val();
		}
		if(idusuario==""){
			idusuario  = LOGINUID
		}
	 
	  jQuery.ajax({
			   type: "POST",
			   cache: false,
			   async: true,
			   url: URLWEB+"/include/get_num_pedido.php?city_id="+CITY_ID+"&utm="+J("#utm").val()+"&idoferta="+idoferta+"&idusuario="+idusuario+"&quantidade="+quantidade+"&valorpedido="+valorpedido+"&valor_unitario="+valor_unitario+"&gateway="+gateway,
			   data: "",
			   success: function(idpedido){  
			   //alert(idpedido) ;
			   if(idpedido==""){
					alert("Não foi possível criar este pedido, por favor, entre em contato conosco!")
					return;
			   } 
			   J("#idpedido").val(idpedido);  
			   
				preenche_formularios(quantidade,valorpedido,valor_unitario,idoferta,idpedido)
		
				if(J("#utm").val()==0){
					  J("#"+gateway).submit();
				}
		   }
		});

} 
function preenche_formularios(quantidade,valorpedido,valor_unitario,idoferta,idpedido){
 
//***************** formulario pagseguro
	 
   J("#item_id_1").val(idpedido);
   J("#item_descr_1").val(J("#titulo").val());
   J("#item_quant_1").val(quantidade);
   J("#item_valor_1").val(valor_unitario);
   J("#ref_transacao").val(idpedido);
   J("#reference").val(idpedido);
   
//***************** formulario pagamento digital
	 
   J("#id_pedido").val(idpedido);
   J("#produto_codigo_1").val(idpedido);
   J("#produto_descricao_1").val(J("#titulo").val()); 
   J("#produto_qtde_1").val(quantidade); 
   J("#produto_valor_1").val(valor_unitario); 

 
//***************** formulario paypall
	valor_paypal = valorpedido.replace(",","."); 
	 
   J("#item_number").val(idpedido);
   J("#item_name").val(J("#titulo").val()); 
   J("#amount").val(valor_paypal); 
   
//***************** formulario moip
	 
	valor_moip = valorpedido.replace(",","");
	valor_moip = valor_moip.replace(".","");
 
	
   J("#id_transacao").val(idpedido);
   J("#descricao").val(J("#titulo").val());
   J("#nome").val(J("#titulo").val()); 
   J("#valor").val(valor_moip); 
   
//***************** formulario dinheiro mail
	 
   J("#transaction_id").val(idpedido);
   J("#item_name_1").val(J("#titulo").val());
   J("#item_quantity_1").val(quantidade); 
   J("#item_ammount_1").val(valor_unitario); 
   
//***************** formulario mercado pago
	 
   J("#item_id").val(idpedido);
   J("#name").val(J("#titulo").val()); 
   J("#price").val(valorpedido); 

} 
 
function set_utm(){ 
		J("#utm").val(1);
		//cadastra_pedido()
}
function enviapag(){  
 
	if(idusuario!=""){
			LOGINUID = idusuario
	}
	 
	jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Estamos realizando o seu pedido. Por favor, aguarde...</font>"});
				
	// faz tratamentos antes da compra.
	J.get(URLWEB+"/include/funcoes.php?acao=verifica_regras_pre_compra&idoferta="+J("#idoferta").val()+"&idusuario="+LOGINUID,
	  function(data){
		  if(jQuery.trim(data)==""){ 
				J("#utm").val(0);
				jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Você está sendo redirecionado para efetuar o pagamento em um ambiente seguro.</font>"});
				cadastra_pedido()
		 }  
		  else{
			  jQuery.colorbox({html:"<font color='red' size='10'>"+data+"</font>"});
			  verifica_logado();
		  }
	   });
}

/*
function atualizapagamentoanuncio(){
	
	 $.get(www+"/include/funcoes.php?acao=atualizapagamentoanuncio&idpedido="+idPedido+"&valor="+Valor+"&idplano="+jQuery('#idplano').val()+"&team_id="+team_id+"&status_pagamento="+Status+"&mensagem="+Erro,
	 
	  function(data){
		  if(jQuery.trim(data)==""){ 
				//jQuery('#idpagamento').val(data)
		 }  
		  else{
			alert("Houve um erro ao atualizar o seu pedido para pago. Por favor, entre em contato conosco.");
			location.href = www+"/adminanunciante/";
		  }
	   });
	
}
*/
function enviacart(idoferta){  
	
	jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Registrando sua opção. Aguarde...</font>"});
				
	 J("#idoferta").val(idoferta);
	 J("#dadospedido").attr("action",URLWEB+"/carrinho/"+idoferta);
 	 J('#dadospedido').submit();
}	

function ordenarBusca(ord){  
	  
	J("#ordena").val(ord);
	 
	 /*
	 J('<input>')  
	.attr('type', 'hidden').attr('name', 'ordena').attr('value', ord)  
	.appendTo('#formpesquisa3');  

	J('#formpesquisa3').submit(); 
	*/
	/* É enviado a url atual completa para que não perca os outros filtros. */
	var url = window.location;
	location.href=url+"&ordena="+ord;
}
function buscaanunciosrevenda(idparceiro){  
	    
	 J('<input>').attr('type', 'hidden').attr('name', 'idparceiro').attr('value', idparceiro).appendTo('#formparceiro');  

	J('#formparceiro').submit();
}

function pesquisa(){  
	
	if(J("#cppesquisa").val()=="" || J("#cppesquisa").val()=="O que está procurando ?"){
		alert("Por favor, informe algo para que possamos procurar pra você.");
		return;
	}
	
	jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Estamos fazendo a pesquisa. Aguarde...</font>"});
				
	J('#formpesquisa').submit();
}

function abreboxOfertasPacote(conteudo){
	J.colorbox({html:conteudo});
}

function removerAcentos(newStringComAcento) {
	
	var string = newStringComAcento;
	var mapaAcentosHex = {
		a : /[\xE0-\xE6]/g,
		e : /[\xE8-\xEB]/g,
		i : /[\xEC-\xEF]/g,
		o : /[\xF2-\xF6]/g,
		u : /[\xF9-\xFC]/g,
		c : /\xE7/g,
		n : /\xF1/g
	};
	 
	for ( var letra in mapaAcentosHex ) {
		var expressaoRegular = mapaAcentosHex[letra];
		string = string.replace( expressaoRegular, letra );
	}
	 
	return string;
} 
		   
var retornoMoip;

function processaPagtoCredito(Instituicao, Parcelas, Recebimento, Numero, Expiracao, CVV, Nome, DataNascimento, Telefone, CPF) {
    this.settings = {
        "Forma"         :       "CartaoCredito",
        "Instituicao"   :       Instituicao,
        "Parcelas"      :       Parcelas,
        "Recebimento"   :       "AVista",
        "CartaoCredito" :       {
            "Numero"            :       Numero,
            "Expiracao"         :       Expiracao,
            "CodigoSeguranca"  :       CVV,
            "Portador"          :       {
                "Nome"          :       Nome,
                "DataNascimento":       DataNascimento,
                "Telefone"      :       Telefone,
                "Identidade"    :       CPF
            }
        }
    };
}

processaPagtoCredito.prototype.executa = function() {
    MoipWidget(this.settings);
}

var bandeira;
var numero;
var validade;
var cvv;
var nome;
var dataNascimento;
var parcelas;
var idPedido;
var paginaInicial;
var nomeCliente;
var telefoneCliente;
var CPFCliente;
var cliente; 
var idcliente; 
var Valor;

function processaPagamento(Cliente, Pedido, Valor, gratis) {
	 
   nomeCliente =  jQuery('#nomeCliente').val();
   telefoneCliente =  jQuery('#telefoneCliente').val();
   CPFCliente =  jQuery('#CPFCliente').val();
   
    if (jQuery('#linhaNascimento').css('display') == 'none') {
        jQuery('#linhaNascimento').fadeIn(500);
    } else {
	
        bandeira = jQuery('input[name=bandeira]:radio:checked').val();
        numero   = jQuery('#numerocartao').val();
        validade = jQuery('#validadecartao').val();
        cvv      = jQuery('#segurancacartao').val();
        nome     = jQuery('#nomecartao').val();
        dataNascimento = jQuery('input[name=data_nascimento]').val();
        parcelas = jQuery('select[name=parcelas]').val();
		if(Valor==""){
				Valor =  jQuery('#valoranuncio').val();
		}
		 
        idPedido = Pedido;
        idcliente = Cliente;
		    
		$.colorbox({html:"<img src="+www+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='2'>Validando os dados com a operadora de cartão de crédito...</font> "});
	 
        jQuery.ajax({
            type: 'POST',
            data: {
                cliente: Cliente,
                pedido: Pedido,
                valor: Valor,
                bandeira: bandeira,
                numero: numero,
                validade: validade,
                cvv: cvv,
                nome: nome,
                parcelas: parcelas
            },
			 
            url: www+"/include/moip/moip.php",
            success: function(response) {
                retornoXML(response);
            }
        })
    }
}

function finalizaanuncio(idcliente,idPedido,gratis){
	if(gratis!="s"){
			alert('Este anúncio não é grátis. Por favor, escolha um plano grátis.');
	}
	else{
		 
		Valor =  jQuery('#valoranuncio').val();
		 
	 $.get(www+"/include/funcoes.php?acao=finalizaanuncio&partner_id="+idcliente+"&idpedido="+idPedido+"&valor="+Valor+"&idplano="+jQuery('#idplano').val()+"&team_id="+team_id ,
	  function(data){
		  if(jQuery.trim(data)!=""){ 
				alert(data)
		 }
		 else{
			$.colorbox({html:"<font color='black' size='2'> Anúncio finalizado com sucesso!</font>"});
			 location.href = www+"/adminanunciante/";
		}
	   });  
	}
}
	
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}
function retornoXML(retorno) {
	  
	retornoarr = retorno.split('#');
	Status = jQuery.trim(retornoarr[0]);
	Erro = jQuery.trim(retornoarr[1]);
	token = jQuery.trim(retornoarr[2]);
	 
	// insere os dados do pagamento
	 $.get(www+"/include/funcoes.php?acao=insere_dados_pagamento&partner_id="+idcliente+"&idpedido="+idPedido+"&valor="+Valor+"&idplano="+jQuery('#idplano').val()+"&team_id="+team_id+"&status_pagamento="+Status+"&mensagem="+Erro ,
	  function(data){
		  if(jQuery.trim(data)!=""){ 
				alert(data)
		 }   
	   });
		  
	if(Status==""){
	   $.colorbox({html:"<font color='black' size='2'> Token Inválido. Por favor, entre em contato conosco!</font>"});
	}		 
	else if(Status=="Falha") { // status do curl do php. Validação dos dados
				$.colorbox({html:"<font color='black' size='2'>"+Erro+"</font>"});
				
				// busca um novo id para o pagamento
				$.get(www+"/include/funcoes.php?acao=get_id_pagamento",
				  function(data){
					  if(jQuery.trim(data)!=""){ 
							jQuery('#idpagamento').val(data)
					 }  
					  else{
						alert("Houve um erro ao requisitar um novo número de pedido. Reinicie o seu anúncio.");
						 location.href = www+"/adminanunciante/";
					  }
				   });
	   
				
			 
	}
	else if(Status=="Sucesso"){ 
		jQuery('#contentmoip').append('<div id="MoipWidget" data-token="' + token + '" callback-method-success="functionSucessoPagamento" callback-method-error="functionFalhaPagamento"></div>');
		//EXECUTA PAGAMENTO
		//function processaPagtoCredito(Instituicao, Parcelas, Recebimento, Numero, Expiracao, CVV, Nome, DataNascimento, Telefone, CPF) {
		/*alert(bandeira)
		alert(parcelas)
		alert(numero)
		alert(validade)
		alert(cvv)
		alert(nome)
		alert(dataNascimento)
		alert(telefoneCliente)
		alert(CPFCliente)*/
		
		Credito = new processaPagtoCredito(bandeira, parcelas, 'AVista', numero, validade, cvv, nome, dataNascimento, telefoneCliente, CPFCliente);
		Credito.executa();
    //alert('Estamos enviado o seu pagamento, aguarde enquanto ele é processado.');
	}
	else {
		$.colorbox({html:"<font color='black' size='2'>Erro desconhecido. Por favor, volte mais tarde. Desculpe pelo transtorno</font>"});
	}
}

function functionSucessoPagamento(data) { 
	$.colorbox({html:"<font color='black' size='2'>Seu pagamento foi efetuado com sucesso</font>"});
    location.href = www+"/adminanunciante";
}
 

function functionFalhaPagamento(data) {
   // alert('Houve um erro ao processar o seu pagamento, por favor, tente novamente em alguns instantes.');
    // $.colorbox.close();
	 retornoMoip = data;
	 console.log(retornoMoip)
	 htmlbox = "";
	//executo este laço para ecessar os itens do objeto javaScript
	for($i=0; $i < retornoMoip.length; $i++){
	// coloco o nome e sobre nome
		codigore =  retornoMoip[$i].Codigo ;
		mensagemre =  retornoMoip[$i].Mensagem ;
		htmlbox += "<strong>Codigo:</strong> "+codigore +" "+ mensagemre;
	// coloco a cidade
		 
	// e por ultimo dou uma quebra de linha
		htmlbox += "<br />";
	}//fim do laço
    
	$.colorbox({html: htmlbox});
 
	//alert(htmlbox);
 
	/*
    setTimeout(function() {
        location.href = www;
    },5000);*/
}
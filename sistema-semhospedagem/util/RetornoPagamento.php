<?php

class RetornoPagamento{
  	
	public $cliente_site;	
	public $cliente_gateway;	
	public $email_gateway;	
	public $email_site;	
	public $idPedido;	
	public $idtransacao;	
	public $gateway;	
	public $status_transacao;	
	public $tipo_pagamento;	
	public $quantidade_comprada;	
	public $valor_unitario;	
	public $valor_pedido;	
	public $data_pedido;	
	public $descricao_produto;	
	public $status_pedido_site;	
	public $nomesite;	
	public $pedido_inexistente;	
	public $valor_pedido_site;	
	public $data_pagamento;	
	public $descricao_status;	
	public $id_anuncio;	
	public $partner_id;	 	
	
	function __construct() { 
	}	
	
	function setDados($dados) { 
	
		$this->idPedido 			= $dados["idPedido"]; 
		$this->cliente_gateway 		= $dados["cliente_gateway"]; 
		$this->email_gateway 		= $dados["email_gateway"]; 
		$this->status_transacao  	= $dados["status_transacao"]; 
		$this->tipo_pagamento 		= $dados["tipo_pagamento"];  
		$this->valor_unitario 		= $dados["valor_unitario"];  
		$this->data_pagamento 		= date("d/m/Y"); 
		$this->quantidade_comprada	= $dados["quantidade_comprada"];  
		$this->idtransacao			= $dados["idtransacao"];  
		$this->gateway				= $dados["gateway"];  
		$this->descricao_status	 	= $dados["descricao_status"];  
		$this->getDadosSite();
	}	
	
	function getTotalPago() { 
	
		if($this->quantidade_comprada !=""){
		
			$valor_unitario 	 	=	str_replace(",",".",$this->valor_unitario);
			$quantidadecomprada 	=	str_replace(",",".",$this->quantidade_comprada);
			$valortotalpago 		= 	$valor_unitario * $quantidadecomprada;
		}
		else{
			$valortotalpago = $this->valor_unitario;
		}
		return $valortotalpago ;
	}	
	
	function getDadosSite() {  
		global $INI; 
		$team 						= Table::Fetch('team',$this->idPedido);
		$this->id_anuncio  			= $team["id"];
		$user 						= Table::Fetch('user',$team["user_id"]);
		$this->descricao_produto  	= $team["title"];
		$this->partner_id  			= $team["partner_id"];
		$this->email_site 			= $user["email"];
		$this->cliente_site 		= $user["realname"];
		$this->quantidade_comprada 	= $order["quantity"];
		$this->status_pedido_site 	= $team["pago"];  
		$this->nomesite 			= $INI['system']['sitename'];
		if(!$this->id_anuncio){ 
			$this->pedido_inexistente=true;
		}
	}	
	
	function getDadosTransacao() { 
	 
		 $body = " Gateway de pagamento: <b>".$this->gateway."</b>
		 <br> Numero do pedido: <b>".$this->idPedido."</b>
		 <br> Status do pagamento: <b>".$this->descricao_status."</b>         
		 <br> Produto: <b>".$this->descricao_produto."</b>         
		 <br> Nome do cliente site: <b>".$this->cliente_site."</b> ";
		 if($this->cliente_gateway){
	      $body .="<br>Nome do pagador gateway: <b>".$this->cliente_gateway."</b>";  
		 }
		 if($this->quantidade_comprada){
	      $body .="<br>Quantidade comprada: <b>".$this->quantidade_comprada."</b>";  
		 }
	     $body .="<br> Email do cliente gateway: <b>".$this->email_gateway."</b> 
		 <br> Email do cliente no site: <b>".$this->email_site."</b>    
		 <br> Tipo do pagamento: <b>".$this->tipo_pagamento ."</b> 
		 <br> Data do pedido: <b>".$this->data_pedido_site."</b> 
		 <br> Data do pagamento: <b>".$this->data_pagamento."</b>  
		 <br> ".$this->gera_link_log();
		 return  $body;
	}	
	function gera_link_log(){
	  global $ROOTPATH;
	  $data = date("Ymd").".txt"; 		  
	  $link = "O log desta transa&ccedil;&atilde;o foi gerado no link <a target='_blank' href='".$ROOTPATH."/log/".$data."'>$data</a>";
	  return $link;
	}
	
	function getDadosTransacaoBasico() { 
	 
		 $body = "<h3>Dados do Pedido</h3> 
		 <br> Gateway de pagamento: <b>".$this->gateway."</b>
		 <br> Numero do Anuncio: <b>".$this->id_anuncio."</b>
		 <br> Status do pagamento: <b>".$this->descricao_status."</b> 
		 <br> Anuncio: <b>".$this->descricao_produto."</b>";     
		 if($this->cliente_gateway){
	      $body .="<br>Nome do pagador gateway: <b>".$this->cliente_gateway."</b>";  
		 }
	     $body .="<br> Email do cliente gateway: <b>".$this->email_gateway."</b>  
		 <br> Tipo do pagamento: <b>".$this->tipo_pagamento ."</b>  
		 <br> Data do pagamento: <b>".$this->data_pagamento."</b>  
		 <br> ".$this->gera_link_log();
		 return  $body;
	}
   
   function gravar_request(){
	
		$parametros="";
		foreach ($_REQUEST as $nome_campo => $valor_campo) {
		
			$parametros .= $nome_campo . "=" . $valor_campo . "&";
		} 
		
	   return $parametros;
	}
	
	function resultado($result){
		
		Util::log($this->idPedido." - Resposta ...:".$result);
	
		if ($result == STATUS_VERIFICADO) {
			Util::log($this->idPedido." - Token verificado com sucesso.");
		}

		else if ($result == STATUS_FALSO) {
			Util::log($this->idPedido." - Token invalido: ".$this->gateway,true);
			echo utf8_decode("Token invalido -  Verifique sua integração com o gateway de pagamento ".$this->gateway);
			exit;
		}

		else if ($result != STATUS_FALSO) {
			Util::log($this->idPedido." - Erro na integracao de pagamento: ".$this->gateway,true);
			echo utf8_decode("Erro na integracao de pagamento - (".$result.") Verifique sua integracao com o gateway de pagamento ".$this->gateway);
			exit;
		}
	}
}

 
?>
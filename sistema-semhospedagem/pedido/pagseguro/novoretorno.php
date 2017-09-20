 <?php 
 
  /*+++++++++++++++++++++++++++++++++++++++++++++++*/
define('TOKEN', $INI['pagseguro']['mid']);
define('STATUS_APROVADO', "3"); 
define('STATUS_COMPLETO', "4"); 
define('STATUS_DEVOLVIDO',"6"); 
define('STATUS_VERIFICADO',"VERIFICADO"); 
define('STATUS_FALSO',"FALSO"); 
/*++++++++++++++++++++++++++++++++++++++++++++++++*/ 
  
Util::log($_POST['notificationCode']. " - Metodo de notificacao API. Buscando os dados da transacao");

$xml = file_get_contents('https://ws.pagseguro.uol.com.br/v2/transactions/notifications/'.$_POST['notificationCode'].'?email='.$INI["pagseguro"]["acc"].'&token='.$INI["pagseguro"]["mid"]);
$diretorio = WWW_ROOT."/log/xmltransacao/"; 
@mkdir($diretorio);
$diretorio = WWW_ROOT."/log/xmltransacao/".date("Ymd"); 
@mkdir($diretorio);

$xml = str_replace("><",">\n<",$xml);
$fp = fopen($diretorio.'/'.$_POST['notificationCode'].".xml", 'w');

if($fp){
	
	

	Util::log($_POST['notificationCode']. " - gravando os dados");
	fwrite($fp, $xml); 
	Util::log($_POST['notificationCode']. " - xml da transacao salvO com sucesso em ".$ROOTPATH."/log/xmltransacao/".date("Ymd").'/'.$_POST['notificationCode'].".xml");
	fclose($fp);
	
	// buscando e processando o xml
	
	$xml = simplexml_load_file($ROOTPATH.'/log/xmltransacao/'.date("Ymd")."/".$_POST['notificationCode'].".xml");
	
	
	$cliente_gateway 		=  strval($xml->sender->name);  
	$email_gateway 			=  strval($xml->sender->email);  
	$status_transacao 		=  strval($xml->status);  
	$idtransacao 			=  strval($xml->code);  
	$type 					=  strval($xml->paymentMethod->type);  
	$code 					=  strval($xml->paymentMethod->code);  
	$DataTransacao 			=  strval($xml->lastEventDate);  
	$ProdValor_1 			=  strval($xml->items->item->amount);  
	$quantidade_comprada 	=  strval($xml->items->item->quantity);  
	$descricao_produto 		=  strval($xml->items->item->description);  
	$idproduto 		 		=  strval($xml->items->item->id);  
	
	if($status_transacao=="1"){
		$descricao_status = "Aguardando pagamento: o comprador iniciou a transa&ccedil;&atilde;o, mas at&eacute; o momento o PagSeguro n&atilde;o recebeu nenhuma informa&ccedil;&atilde;o sobre o pagamento.";	
	}
	else if($status_transacao=="2"){
		$descricao_status = "Em an&aacute;lise: o comprador optou por pagar com um cart&atilde;o de cr&eacute;dito e o PagSeguro est&aacute; analisando o risco da transa&ccedil;&atilde;o.";	
	}
	else if($status_transacao=="3"){
		$descricao_status = "Paga: a transa&ccedil;&atilde;o foi paga pelo comprador e o PagSeguro j&aacute; recebeu uma confirma&ccedil;&atilde;o da institui&ccedil;&atilde;o financeira respons&aacute;vel pelo processamento.";	
	}	
	else if($status_transacao=="4"){
		$descricao_status = "Dispon&iacute;vel: a transa&ccedil;&atilde;o foi paga e chegou ao final de seu prazo de libera&ccedil;&atilde;o sem ter sido retornada e sem que haja nenhuma disputa aberta.";	
	}
	else if($status_transacao=="5"){
		$descricao_status = "Em disputa: o comprador, dentro do prazo de libera&ccedil;&atilde;o da transa&ccedil;&atilde;o, abriu uma disputa.";	
	}
	else if($status_transacao=="6"){
		$descricao_status = "Devolvida: o valor da transa&ccedil;&atilde;o foi devolvido para o comprador.";	
	}
	else if($status_transacao=="7"){
		$descricao_status = "Cancelada: a transa&ccedil;&atilde;o foi cancelada sem ter sido finalizada.";	
	}
	
	// metodo de pagamento
	
	
	if($type=="1"){
		$descricao_type = "Cartão de crédito";	
	}
	else if($type=="2"){
		$descricao_type = "Boleto";	
	}	
	else if($type=="3"){
		$descricao_type = "Débito online (TEF)";	
	}
	else if($type=="4"){
		$descricao_type = "Saldo PagSeguro";	
	}
	else if($type=="5"){
		$descricao_type = "Oi Paggo";	
	}
	 
	/*
	foreach ($xml->comentarios->comentario as $comentario) {
		echo strval($comentario->autor); // Obtem o nome do autor do comentario
		echo strval($comentario->texto); // Obtem o texto do comentario
	} 
	*/
}
else{
	Util::log($_POST['notificationCode']. " - Nao foi possivel abrir o arquivo. ".$diretorio."/".$_POST['notificationCode'].".xml verifique se este diretorio possui permissao de escrita");
} 
 	  
/*++++++++++++++++++++++++++++++++++++++++++++++++ CRIAÇÃO DO ARRAY DOS DADOS DO PAGAMENTO DO GATEWAY*/
 
 $dados_pagamento = array(
    "gateway" => 'pagseguro', 
    "idtransacao" => $idtransacao, 
    "idPedido" => $idproduto , 
    "cliente_gateway" => $cliente_gateway, 
    "email_gateway" => $email_gateway, 
    "status_transacao" => $status_transacao, 
    "tipo_pagamento" => $descricao_type,  
    "data_pagamento" => $DataTransacao,  
    "valor_unitario" => $ProdValor_1,  
    "quantidade_comprada" => $quantidade_comprada,  
	"descricao_status" => $descricao_status, 
	"descricao_produto" => $descricao_produto, 
);
/*++++++++++++++++++++++++++++++++++++++++++++++++*/

$RetornoPagamento = new RetornoPagamento();
Util::log($_POST['notificationCode']. " -  Setando os dados da transacao");
$RetornoPagamento->setDados($dados_pagamento);
 
 
/* DEBUG*/
//mail("atendimento@sistemacomprascoletivas.com.br","retorno de dados ".$RetornoPagamento->gateway,$RetornoPagamento->gravar_request()); 	 

 
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/ 
 
if ($_POST['notificationCode']) {

	Util::log($RetornoPagamento->idPedido." - ".$RetornoPagamento->descricao_status );
	
		require_once(dirname(dirname(dirname(__FILE__))) . '/util/processa_retorno_pagamento.php'); 
} 

header("Location: ".$ROOTPATH."/index.php?pg=true");	
?>
<meta http-equiv="refresh" content="0; url=<?=$ROOTPATH?>?pg=true">
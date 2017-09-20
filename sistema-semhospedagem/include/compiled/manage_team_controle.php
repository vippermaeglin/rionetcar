<?
$esgotado 				=	false;
$aguardando 		 	=	false;
$oferta_ativa 		 	=	false;
$oferta_cancelada 	 	=	false;
$oferta_esgotada 	 	=	false;
$finalizacao 	 		=	false;
$reprovada 	 			=	false;
$naopago 				= 	false;
$usou_bonus				= 	false;

$end_time 				= 	date('YmdHis', $one['end_time']); 
$begin_time 		 	= 	date('YmdHis', $one['begin_time']); 
$date 					= 	date('YmdHis');

if($one['usou_bonus'] == "sim" ){ 
	$usou_bonus 	= true;
} 
else if( $end_time  <= $date){
	$finalizacao 	= true;
	 
} 
if($one['pago'] != "sim" and $one['pago'] != ""  ){   							
	 $naopago 	= true;
}

else if($one['status'] === "0"){ 
	$aguardando 	= true;
}
else if($one['status'] == 2){ 
	$reprovada 	= true;
}
else if( $end_time  > $date){
	$oferta_ativa 	= true;
}
 
  
if($naopago ){
		$bandeira = "Flag-blue.ico";
		$title = "Aguardando pagamento.";
}							
else if($finalizacao ){
		$bandeira = "Flag-red.png";
		$title = "Anúncio Finalizado";
}
else if($naopago ){
		$bandeira = "Flag-blue.ico";
		$title = "Aguardando pagamento.";
}

else if($aguardando ){
		$bandeira = "Flag-yellow.ico";
		$title = "Este anúncio está pago mas ainda não publicado. Aguardando moderação";
}	

else if($reprovada  ){
		$bandeira = "Flag-black.ico";
		$title = "Este anúncio foi reprovado pelo moderador.";
}	

else  { // oferta ativa
		$bandeira = "Flag-green.ico";
		$title = "Este anúncio está ativo";
}

if($one['anunciogratis']=="s" and $finalizacao){
	$title = "Anúncio Grátis. Anúncio finalizado";
	$bandeira = "Flag-red.png";
}

else if($one['anunciogratis']=="s" and $one['status'] == 0){
	$title = "Anúncio Grátis. Aguardando moderação";
	$bandeira = "Flag-yellow.ico";
}
else if($one['anunciogratis']=="s" and $one['status'] == 1){
	$title = "Anúncio Grátis. Este anúncio está publicado";
	$bandeira = "Flag-green.ico";
}
else if($one['anunciogratis']=="s" and $one['status'] == 2){
	$title = "Anúncio Grátis. Este anúncio foi reprovado";
	$bandeira = "Flag-black.ico";
}
else if($usou_bonus and $finalizacao ){
		$bandeira = "Flag-red.png";
		$title = "Anúncio de plano. Este anúncio está finalizado";
}
else if($usou_bonus and $aguardando  ){
		$bandeira = "Flag-yellow.png";
		$title = "Anúncio de plano. Aguardando moderação";
}	
else if($usou_bonus and $one['status'] == 1  ){
		$bandeira = "Flag-green.png";
		$title = "Anúncio de plano. Este anúncio está publicado";
}	
else if($usou_bonus and $one['status'] == 2  ){
		$bandeira = "Flag-black.png";
		$title = "Anúncio de plano. Este anúncio foi reprovado";
}

/* Verificação de status para os artigos da revista. */
if($one_article['status'] == 'Y'){
	$bandeira = "Flag-green.png";
	$title = "Seu artigo está publicado!";
	$status = "Ativado";
}else if($one_article['status'] == 'N'){
	$bandeira = "Flag-red.png";
	$title = "Seu artigo não está publicado!";
	$status = "Desativado";
}

/* Verificação de status para os artigos da revista. */
if($one_category['status'] === 'Y'){
	$bandeira = "Flag-green.png";
	$title = "Sua categoria está ativa!";
	$status = "Ativado";
}else if($one_category['status'] === 'N'){
	$bandeira = "Flag-red.png";
	$title = "Seu categoria está desativada!";
	$status = "Desativado";
}
  
if($one['visualizados']==""){
		 $one['visualizados']="0";
}
if($one['clicados']==""){
		 $one['clicados']="0";
}
$tituloanuncio = buscaTituloAnuncio($one);
?>
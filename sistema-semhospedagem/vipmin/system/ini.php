<?php
if($INI['option']['menupontuacao']==""){
		$INI['option']['menupontuacao']="Ofertas Especiais";
}
if($INI['option']['tipopopup']=="news"){
	$tipopopup_news='checked="checked"';
}
else  {
	$tipopopup_cadastro='checked="checked"';
}
if($INI['option']['popup_ativo']=="N"){
	$email_home_nao='checked="checked"';
}
else  {
	$email_home_sim='checked="checked"';
}
if($INI['option']['nomeblocodestaque']==""){
	$nomeblocodestaque='Ofertas Populares'; 
}
else {
	$nomeblocodestaque = $INI['option']['nomeblocodestaque'];
}
if($INI['option']['nomeblocodireita']==""){
	$nomeblocodireita='Mais Ofertas';
}
else {
	$nomeblocodireita = $INI['option']['nomeblocodireita'];
}

if($INI['option']['temporestante']=="N"){
	$temporestante_nao='checked="checked"';
}
else  {
	$temporestante_sim='checked="checked"';
}

if($INI['option']['backgroundrepeat']=="Y"){
		$backgroundrepeat_sim='checked="checked"';
}
else { 
	$backgroundrepeat_nao='checked="checked"';
}

if($INI['option']['anunciousuario']=="N"){
	$anunciousuario_nao='checked="checked"';
}
else  {
	$anunciousuario_sim='checked="checked"';
}

if($INI['option']['moderacaoanuncios']=="N"){
	$moderacaoanuncios_nao='checked="checked"';
}
else  {
	$moderacaoanuncios_sim='checked="checked"';
}

if($INI['option']['auth_setup']=="N"){
	$auth_setup_nao='checked="checked"';
}
else  {
	$auth_setup_sim='checked="checked"';
}

if($INI['option']['tpvulc']=="1"){
	$fit='checked="checked"';  
}
else  {
	$slim='checked="checked"'; //2
}

if($INI['option']['conteudo_oferta_popular']=="N"){
	$conteudo_oferta_popular_nao='checked="checked"';
}
else  {
	$conteudo_oferta_popular_sim='checked="checked"';
}

if($INI['option']['pontuacao']=="Y"){
	$pontuacao_sim='checked="checked"';
}
else {
	$pontuacao_nao='checked="checked"';
}

if($INI['option']['debug_sql']=="Y"){
	$debug_sql_sim='checked="checked"';
}
else {
	$debug_sql_nao='checked="checked"';
}

if($INI['option']['rand_direita']=="N"){
	$rand_direita_nao='checked="checked"';
}
else  {
	$rand_direita_sim='checked="checked"';
}

if($INI['option']['rand_popular']=="N"){
	$rand_popular_nao='checked="checked"';
}
else  {
	$rand_popular_sim='checked="checked"';
}

if($INI['option']['ofertas_finalizadas_populares']=="N"){
	$ofertas_finalizadas_populares_nao='checked="checked"';
}
else  {
	$ofertas_finalizadas_populares_sim='checked="checked"';
}

if($INI['option']['ofertas_finalizadas_direita']=="N"){
	$ofertas_finalizadas_direita_nao='checked="checked"';
}
else {
	$ofertas_finalizadas_direita_sim='checked="checked"';
}

if($INI['option']['bloco_tkdeveloper']=="Y"){
	$bloco_tkdeveloper_sim='checked="checked"';
}
else {
	$bloco_tkdeveloper_nao='checked="checked"';
}

if($INI['option']['cpf']=="Y"){
	$cpf_sim='checked="checked"';
}
else{
	$cpf_nao='checked="checked"';
}

if($INI['option']['bloco_googlemaps']=="N"){
	$bloco_googlemaps_nao='checked="checked"';
}
else {
	$bloco_googlemaps_sim='checked="checked"';
}

if($INI['background']['background']=="N"){
	$superslide_nao='checked="checked"';
}
else {
	$superslide_sim='checked="checked"';
}


if($INI['option']['bloco_rank']=="Y"){
	$bloco_rank_sim='checked="checked"';
}
else {
	$bloco_rank_nao='checked="checked"';
}

if($INI['option']['redirecionador']=="Y"){
	$redirecionador_sim='checked="checked"';
}
else {
	$redirecionador_nao='checked="checked"';
}
 
if($INI['option']['importarcontatos']=="N"){
	$importarcontatos_nao='checked="checked"';
}
else {
	$importarcontatos_sim='checked="checked"';
}
if($INI['option']['superoferta']=="N"){
	$superoferta_nao='checked="checked"';
}
else {
	$superoferta_sim='checked="checked"';
}
 
 
$option_paginacao= array(
	"3"=>"3",
	"6"=>"6",        
	"9"=>"9",        
	"12"=>"12",        
);
 
 if($INI['option']['paginacao']  == "" ){
	$INI['option']['paginacao'] = "6";
}

if($INI['mail']['mail']=='smtp'){
	$chaeckedsmtp = "checked";
}
if($INI['mail']['mail']=='mail'){
	$chaeckedmail = "checked";
}

if($INI['mail']['mailparceria']==""){
	$INI['mail']['mailparceria'] = "parceiro@site.com.br";
}
if($INI['background']['velocidade']==""){
	$INI['background']['velocidade'] = "5";
}
if($INI['background']['intervalo']==""){
	$INI['background']['intervalo'] = "10";
}


?>
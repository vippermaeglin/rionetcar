<?php

 

$nmimagem       = "destaquefit";


$logo = $partner['imagem'];			
$logocompleto = !(empty($logo)) ? $INI['system']['wwwprefix'] . "/media/" . $logo : $INI['system']['wwwprefix'] . '/skin/padrao/images/no_image_resales.jpg';
if(empty($logo)){
	$imagemparceiro = "<img style='padding-left:-11px;max-width:160px;margin-top:-100px;margin-left:-5px;' src='".$logocompleto."' title='".$nomeparceiro."' alt='".$nomeparceiro."'>";
}else{
	$imagemparceiro = "<img style='padding-left: 7px;max-width:130px;margin-top:-100px;margin-left:-5px;' src='".$logocompleto."' title='".$nomeparceiro."' alt='".$nomeparceiro."'>";
}



$nomeparceiro 	= utf8_decode($partner['realname']); 

$link 		= $ROOTPATH."/index.php?busca=true&idparceiro=". $partner['id'];


$endereco="";

if($partner['address']!=""){

$endereco.=$partner['address']. " ";

$endegoogle .= $partner['address']. " ";}

if($partner['numero']!=""){

$endereco.=$partner['numero']. " ";

$endegoogle .= $partner['numero']. " ";}

if($partner['chavesms']!="")

$endereco.=$partner['chavesms']. " ";

if($partner['bairro']!=""){

$endereco.=$partner['bairro']. " ";	

$endegoogle .= $partner['bairro']. " ";}

if($partner['cidadeusuario']!=""){

$endereco.=", ".$partner['cidadeusuario']. " ";

$endegoogle .= $partner['cidadeusuario']. " ";}

if($partner['estado']!="") 

$endereco.= "- ".$partner['estado']. " "; 

if($partner['cep']!="")

$endereco.=$partner['cep']. " ";

if($partner['telefonefixo']!="") {

$endereco.=" <br><img style='margin-top:-6px;' src=".$PATHSKIN."/images/telefono-icon.png> (". $partner['ddd'] . ") " . $partner['telefonefixo']. " ";

}else if($partner['nextel']!="") {

$endereco.=" <br><img style='margin-top:-6px;' src=".$PATHSKIN."/images/telefono-icon.png> " . $partner['nextel'] . " ";

} 

if($partner['celular']!="") {

$endereco.=" - (" . $partner['ddd2'] . ") " . $partner['celular']. " ";

} 

if($partner['homepage']!="")

$endereco.="<a target='_blank' href=".$partner['homepage'].">".$partner['homepage']. "</a>";
	

?>



<style>



.planoNitroHome dt{

	float:left;

	margin-top: 100px;

}



.planoNitroHome dd.titulo-busca{

	float: left;

}



dd.planoNitroHomeDesc p{

	margin-top: 190px;

	margin-left: -80px;

	width: 400px;

}



.filterbar-full{

	height: 130px;

	background: #ffffff;

}



</style>

<div style="display:none;" class="tips"><?=__FILE__?></div> 



<div class="filterbar-full">

	<dl class="bg-busca planoNitroHome">

		<dt>

			<a href="<?php echo $link ?>"><?php echo $imagemparceiro; ?></a>

		</dt>

		<dd class="titulo-busca" style="width:569px;background:#000;margin-left:30px;"><h4 style="color:#fff;height:38px;"><?=$nomeparceiro?> - <?=utf8_decode($partner['cidadeusuario'])?> </h4></dd>

		<dd class="planoNitroHomeDesc" style="width:78%"><p><?=utf8_decode($endereco)?> <span><a style="text-decoration:none;color:#244973;" href="<?php echo $link ?>"><b>Ver Estoque</b></a></span></p></dd> 

		<!-- <dd class="planoNitroHomeDesc" style="width:78%"><p><a style="text-decoration:none;color:#244973;" href="<?php echo $link ?>"><b>Ver Estoque</b></a></p></dd> -->

		

	</dl>

</div> 


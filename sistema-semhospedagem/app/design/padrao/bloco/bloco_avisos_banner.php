<div style="display:none;" class="tips"><?=__FILE__?></div>
<?php 

if($ORIGEM=="DETALHE"){
	$ban =  trim($INI['bulletin']['detalheanuncio']) ;
}
else{
	$ban =  trim($INI['bulletin'][0]) ;
}

if( !empty($ban)){ ?>  
	<div style="margin-top:8px;"><?php echo trim($ban); ?></div>
 
 <?php }  ?>
 
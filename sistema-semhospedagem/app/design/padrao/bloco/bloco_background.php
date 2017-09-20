 <? 
	 
$sql 		= " select background,topo from home_config";
$rsback 	= mysql_query($sql);
$linha 		= mysql_fetch_object($rsback ); 
$background = $linha->background; 
?>

<div style="display:none;" class="tips"><?=__FILE__?></div>

<? if(!empty($background) and $INI['background']['background'] == "N" or !file_exists(WWW_MOD."/superbackground.inc")){?>
	
	<? if($INI['option']['backgroundrepeat']=="Y"){?>
		<div class="page-background" style="background:url(<?=$PATHSKIN?>/background/<?=$background?>) repeat scroll 0% 0% transparent;"></div>
	<? } else {?>
		 <div class="page-background"><img width="100%" height="100%" src="<?=$PATHSKIN?>/background/<?=$background?>"></div> 
	<? } ?>
	
<? } ?> 
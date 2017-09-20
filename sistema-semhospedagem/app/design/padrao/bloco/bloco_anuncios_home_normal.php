<div style="display:none;" class="tips"><?=__FILE__?></div>

<div class="three_up_op" style="<?=$stylethree_up_op ?>">
	<div class="deal clearfix" style="height:213px;"> 
	  <div class="image">
		<div class="inner">
		<? if(!$BlocosOfertas->oferta_cancelada and !$BlocosOfertas->oferta_esgotada){?> 
			<a title="<?=$titulo?>" href="<?php echo $BlocosOfertas->linkoferta ?>"><img src="<?=getImagem($team,$nmimagem)?>" title="<?=$titulo?>" alt="<?=$titulo?>"></a>
		<? } else {?> 
			<div style="cursor:not-allowed;"> <img src="<?=getImagem($team,$nmimagem)?>" title="<?=$titulo?>" alt="<?=$titulo?>"> </div>
		<?}?>
		</div>
	  </div>
	  <div class="info" style="vertical-align:none;height:165px;">
		<div class="title" style="<?=$styletitle ?>">
		  <div class="price-tag"></div>
		  <?php echo $titulo ;?> 
			<br><br><div style="font-size: 12px; float: right;">	<div class="view-deal-button" style="margin-top: 11px;">
			  <a title="<?=$titulo?>" class="button small" href="<?php echo $BlocosOfertas->linkoferta  ?>">ver anúncio</a>
			</div></div> 
		</div>
		<? if($BlocosOfertas->mostrarpreco=="1"){?>
			<div class="subtitle" style="<?=$stylesubtitle ?>"> 
				 <b style="color:black;font-size:19px;">R$ <?=$BlocosOfertas->preco?> </b>
			</div>
		<? } ?> 
		
		<div class="descricaoanu">
		<?= $BlocosOfertas->descricao?>	
		</div>
	
	  <!--  <? if(!$_REQUEST['idcategoria']){?> <div style="font-size: 12px; float: right;clear: both;">Veja mais em  <a title="<?=utf8_decode($l['name'])?>" href="<?=$ROOTPATH?>/index.php?idcategoria=<?=$categoria['id']?>"> <?=utf8_decode($categoria['name'])?></a></div> <? } ?> -->
	  </div> 
	  
	<script>
	jQuery(document).ready(function(){ 
		jQuery(".group<?=$team['id']?>").colorbox({rel:'group<?=$team['id']?>'});
	});
	</script>
	<div style="clear: both;">
		<? if($team['image']){?> <div style="float:left;padding:0 5px 0 0;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".$team['image'] ?>"> <img src="<?=$INI['system']['wwwprefix']."/media/".substr($team['image'],0,-4)."_popular_mini.jpg"; ?>" style="width: 47px;height:27px;"></a> </div><? } ?>
		<? if($team['image1']){?> <div style="float:left;padding:0 5px 0 0;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".$team['image1'] ?>"> <img src="<?=$INI['system']['wwwprefix']."/media/".substr($team['image1'],0,-4)."_popular_mini.jpg"; ?>" style="width: 47px;height:27px;"></a> </div><? } ?>
		<? if($team['image2']){?> <div style="float:left;padding:0 5px 0 0;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".$team['image2'] ?>"> <img src="<?=$INI['system']['wwwprefix']."/media/".substr($team['image2'],0,-4)."_popular_mini.jpg"; ?>" style="width: 47px;height:27px;"></a> </div><? } ?>
		<? if($team['gal_image1']){?> <div style="float:left;padding:0 5px 0 0;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".$team['gal_image1'] ?>"> <img src="<?=$INI['system']['wwwprefix']."/media/".substr($team['gal_image1'],0,-4)."_popular_mini.jpg"; ?>" style="width: 47px;height:27px;"></a> </div><? } ?>
		<? if($team['gal_image2']){?> <div style="float:left;padding:0 5px 0 0;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".$team['gal_image2'] ?>"> <img src="<?=$INI['system']['wwwprefix']."/media/".substr($team['gal_image2'],0,-4)."_popular_mini.jpg"; ?>" style="width: 47px;height:27px;"></a> </div><? } ?>
		<? if($team['gal_image3']){?> <div style="float:left;padding:0 5px 0 0;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".$team['gal_image3'] ?>"> <img src="<?=$INI['system']['wwwprefix']."/media/".substr($team['gal_image3'],0,-4)."_popular_mini.jpg"; ?>" style="width: 47px;height:27px;"></a> </div><? } ?>
	</div>
	<? if(file_exists(WWW_MOD."/buscaanuncrevendas.inc")){  if($partner['tipo']=="Revenda"){?><div class="revenda"> <div style="float:left;margin-top:14px;margin-right:8px;font-size:12px;color:#303030;">veja mais em</div><div> <a href="javascript:buscaanunciosrevenda('<?=$partner['id']?>');"> <img style="max-width: 128px;"src='<?php echo $ROOTPATH."/media/".substr($partner['image'],0,-4).".jpg";?>' title='Veja mais anúncios de <?php echo utf8_decode($partner['title']); ?>' alt='Veja mais anúncios de <?php echo utf8_decode($partner['title']); ?>'></a></div></div><? } ?><? } ?>
  </div>
</div> 
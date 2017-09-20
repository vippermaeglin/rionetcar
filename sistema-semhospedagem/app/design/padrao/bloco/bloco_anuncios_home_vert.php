<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 
<script>
	jQuery(document).ready(function(){ 
		jQuery(".group<?=$team['id']?>").colorbox({rel:'group<?=$team['id']?>'});
	});
</script>
<div class="filterbar-full">
	<dl class="bg-busca planoNitroHome">
		<dt>
			<a href="<?php echo $BlocosOfertas->linkoferta ?>"><img style="margin: -595px;margin-top:40px;padding-left:-10px;" src="<?=getImagem($team,$nmimagem)?>" title="<?=$titulo?>" alt="<?=$titulo?>"></a>
		</dt>
		<dd class="titulo-busca"><h4><?=$titulo?> <? if($BlocosOfertas->mostrarpreco=="1"){?><div class="preco_busca"> <p class="preco_ofertas">R$ <?=$BlocosOfertas->preco?></p></div><? } ?></h4>
			<div class="thumbhome">
				<? if($team['image']){?> <div style="float:left;padding:0 5px 0 0;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".substr($team['image'],0,-4)."_detalhe.jpg" ?>"> <img src="<?=$INI['system']['wwwprefix']."/media/".substr($team['image'],0,-4)."_popular_mini.jpg"; ?>" style="width: 47px;height:27px;"></a> </div><? } ?>
				<? if($team['image1']){?> <div style="float:left;padding:0 5px 0 0;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".substr($team['image1'],0,-4)."_detalhe.jpg" ?>"> <img src="<?=$INI['system']['wwwprefix']."/media/".substr($team['image1'],0,-4)."_popular_mini.jpg"; ?>" style="width: 47px;height:27px;"></a> </div><? } ?>
				<? if($team['image2']){?> <div style="float:left;padding:0 5px 0 0;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".substr($team['image2'],0,-4)."_detalhe.jpg" ?>"> <img src="<?=$INI['system']['wwwprefix']."/media/".substr($team['image2'],0,-4)."_popular_mini.jpg"; ?>" style="width: 47px;height:27px;"></a> </div><? } ?>
				<? if($team['gal_image1']){?> <div style="float:left;padding:0 5px 0 0;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".substr($team['gal_image1'],0,-4)."_detalhe.jpg" ?>"> <img src="<?=$INI['system']['wwwprefix']."/media/".substr($team['gal_image1'],0,-4)."_popular_mini.jpg"; ?>" style="width: 47px;height:27px;"></a> </div><? } ?>
				<? if($team['gal_image2']){?> <div style="float:left;padding:0 5px 0 0;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".substr($team['gal_image2'],0,-4)."_detalhe.jpg" ?>"> <img src="<?=$INI['system']['wwwprefix']."/media/".substr($team['gal_image2'],0,-4)."_popular_mini.jpg"; ?>" style="width: 47px;height:27px;"></a> </div><? } ?>
				<? if($team['gal_image3']){?> <div style="float:left;padding:0 5px 0 0;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".substr($team['gal_image3'],0,-4)."_detalhe.jpg" ?>"> <img src="<?=$INI['system']['wwwprefix']."/media/".substr($team['gal_image3'],0,-4)."_popular_mini.jpg"; ?>" style="width: 47px;height:27px;"></a> </div><? } ?>
			</div>
		</dd>
		<dd class="planoNitroHomeDesc"> 
			<p>Ano: <strong><?=utf8_decode ($team['car_ano'])?>/<?=utf8_decode ($team['modelo_ano'])?></strong></p>
			<p>Km:</strong> <strong><?=$team['km']?></strong></p>
			<p>N°Portas:</strong> <strong><?=utf8_decode ($team['numero_portas'])?></strong></p>
			<p>Cor:</strong> <strong><?=utf8_decode ($team['cor'])?></strong></p>
			<p>Câmbio: <strong><?=utf8_decode($team['transmissao'])?></strong></p>
			<p>Combustível:</strong> <strong><?=utf8_decode($team['combustivel'])?></strong></p>
		</dd>
		<?php

		$partner = Table::Fetch('user', $team['partner_id']);

		?>
		<dd class="planoNitroHomeInfo"> 
			<?php if(!empty($partner['realname'])) { ?><p class="TitleRevenda"><?php echo utf8_decode($partner['realname']); ?></p><?php } ?>
			<?php if(!empty($partner['cidadeusuario'])) { ?><p class="CidadeRevenda"><?php echo utf8_decode($partner['cidadeusuario'] . " (" . $partner['estado'] . ")"); ?></p><?php } ?>
			<p class="LinkEstoque"><a href="<?php $ROOTPATH; ?>/index.php?busca=true&idparceiro=<?php echo $partner['id']; ?>">> Ver estoque</a></p>
		</dd>
	</dl>
	<div class="btos">
		<button data-tipoanunciante="pf" data-id="6683663" onclick="J(this).getfones('<?=$team['partner_id']?>');" class="ver-telefone"><strong>Ver telefone</strong></button>
		<button class="enviar-proposta" onclick="location.href='<?php echo $BlocosOfertas->linkoferta ?>'"><strong>Ver anúncio</strong></button>
	</div>
</div>
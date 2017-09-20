<?
$nmimagem = "destaquefit";	 
?> 
<div style="display:none;" class="tips"><?=__FILE__?></div>

<div class="three_up_op">
	<div class="deal clearfix"> 
		  <div class="image">
			<div class="inner">
				<a title="<?=$titulo?>" href="<?php echo $BlocosOfertas->linkoferta ?>"><img src="<?=getImagem($team,$nmimagem)?>" title="<?=$titulo?>" alt="<?=$titulo?>"></a></div>
		  </div>
		  <div class="info">
			<div class="title">
			  <div class="price-tag"></div>
				<?php echo $titulo?> 
			</div>
			<? if($BlocosOfertas->mostrarpreco=="1"){?>
				<div class="subtitle">
					R$ <?=$BlocosOfertas->preco?>  
				</div>
			<? } ?> 
			
			<div class="view-deal-button">
				<a title="<?=$BlocosOfertas->tituloferta?>" class="btn-odetailferta encerrado" href="<?php echo $BlocosOfertas->linkoferta  ?>">Detalhes</a>
			</div>
			  
	  </div>
	</div>
</div> 
	
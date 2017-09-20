<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 
<script>
	jQuery(document).ready(function(){ 
		jQuery(".group<?=$team['id']?>").colorbox({rel:'group<?=$team['id']?>'});
	});
</script>
<div class="itemSearch">
	<dl class="itemSearchDescription">
		<div class="rowDescription">
			<dd class="itemTitulo">
				<h4>
					<?=displaySubStringWithStrip($titulo, 25)?> 
					<? if($BlocosOfertas->mostrarpreco=="1"){?>
					<div class="precoBusca">
						<p class="precoOfertas">
							R$ <?=$BlocosOfertas->preco?>
						</p>
					</div>
					<? } ?>
				</h4>
			</dd>
			<dt class="itemImage">
				<a href="<?php echo $BlocosOfertas->linkoferta ?>">
					<img src="<?=getImagem($team)?>" title="<?=$titulo?>" alt="<?=$titulo?>">
				</a>
			</dt>
		</div>
		<div class="rowDescription">
			<?php
				$partner = Table::Fetch('user', $team['partner_id']);
			?>
			<dd class="itemPartner"> 
				<?php if(!empty($partner['realname'])) { ?><p class="itemTitle">Anunciante: <?php echo utf8_decode($partner['realname']); ?></p><?php } ?>
				<?php if(!empty($partner['cidadeusuario'])) { ?><p class="itemCity">Local: <?php echo utf8_decode($partner['cidadeusuario'] . " (" . $partner['estado'] . ")"); ?></p><?php } ?>
				<!--<p class="linkPartner"><a href="<?php echo $ROOTPATH; ?>/index.php?busca=true&idparceiro=<?php echo $partner['id']; ?>">Ver estoque</a></p>-->
			</dd>
		</div>
	</dl>
	<div class="btnActions">
		<button data-tipoanunciante="pf" data-id="6683663" onclick="jQuery(this).getfones('<?=$team['partner_id']?>');" class="viewPhone"><strong>Ver telefone</strong></button>
		<button class="viewOffer" onclick="location.href='<?php echo $ROOTPATH; ?>/?idoferta=<?php echo $team['id']; ?>'"><strong>Ver anúncio</strong></button>
	</div>
</div>

<script>
	jQuery('document').ready(function(){
		
		jQuery.fn.getfones = function(iduser, partner_id){
			
			jQuery.ajax({
				type: "POST", 
				cache: false,
				async: true,
				url: "<?php echo $INI['system']['wwwprefix']; ?>/include/funcoes.php",
				data: "acao=getfones&iduser="+iduser+"&partner_id="+partner_id, 
				success: function(retorno){ 
					jQuery.colorbox({html:retorno, width: "95%"});  	 
				}
			});
		}	
	});
</script>
 <div style="display:none;height:36px;" class="tips"><?=__FILE__?></div>  
 <?
 
	 
 ?>
	<? if(!empty($team['vea_promocoes']) or !empty($team['promooutros'])){?>			 
	 <div class="carro-detalhe" style="clear:both;">
		 <div class="span-16 raio-5 last avaliacao fundobranco"> 
			<div class="titulocc borda-bottom-1 padding-bottom-10">   
				<div class="span-8 borda-bottom-1 fundosecao" style="width:615px;">
					<div class="alturasecao" style="margin-top:-10px;"> 
							<div class="titfipe">Promoções
						</div> 
					</div>
				</div>
				
				<div class="jump-1 margin-top-10" style="margin-bottom:21px;">
					<div style="float:left;width:100%;">
						<span class="span-4 size-12">	
						Ao comprar este veículo você ganha de brinde: 
						<B style="color:#195AA6"><?php  echo strip_tags(nl2br(utf8_decode(str_replace(",",", ",$team['vea_promocoes']))),"<a><img><br><b><strong><style><font><embed><iframe>"); ?></B>
						<B style="color:#195AA6"><?php  echo strip_tags(nl2br(utf8_decode($team['promooutros'])),"<a><img><br><b><strong><style><font><embed><iframe>"); ?></B>
						</span> 
						 <div> <img src="<?=$PATHSKIN?>/images/atention.png"> O cumprimento dessa promoção é de responsabilidade do anunciante perante ao comprador do veículo</div>
						 
					</div> 
					 
				</div>
			  </div>
			<div class="tfipetxt">   </div>
		 </div>
	 </div> 
 	 <? } ?> 
	
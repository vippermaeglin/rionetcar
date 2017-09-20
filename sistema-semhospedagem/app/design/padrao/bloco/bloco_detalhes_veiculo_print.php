 <div style="display:none;height:36px;" class="tips"><?=__FILE__?></div>  
 <div class="carro-detalhe" style="clear:both;">
	 <div class="span-16 raio-5 last avaliacao fundobranco" style="float:right;position: relative; margin-top: -266px; margin-bottom:20px; height: 250px;"> 
		<div class="titulocc borda-bottom-1 padding-bottom-10">   
			<div class="span-8 borda-bottom-1 fundosecao" style="width:450px;">
				<div class="alturasecao" style="margin-top:-10px;"> 
						<div class="titfipe">Opcionais
					</div> 
				</div>
			</div>
			
			<div class="jump-1 margin-top-10" style="margin-bottom:21px;">
				<div style="float:left;width:100%;">
					<span class="span-4 size-12">	
						<?php  
							$BlocosOfertas = new BlocosOfertas;
							echo utf8_decode($BlocosOfertas->getmaisdescricao($team));
						?>
					</span> 
				</div>
				 
				 
			</div>
		  </div>
	 	<div class="tfipetxt">   </div>
	 </div>
 </div> 
	
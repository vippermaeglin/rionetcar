 <div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 
 <div style="clear:both;">  *Anúncio sujeito a alteração sem prévio aviso, consulte o anunciante.</div> 
 <div class="carro-detalhe" style="clear:both;">
	 <div class="span-16 raio-5 last avaliacao fundobranco" style="height:250px;"> 
		<div class="titulocc borda-bottom-1 padding-bottom-10">   
			<div class="span-8 borda-bottom-1 fundosecao" style="width:450px;">
				<div class="alturasecao" style="margin-top:-10px;"> 
						<div class="titfipe">Características do veículo</div> 
				</div>
			</div>
			
			<div class="jump-1 margin-top-10" style="margin-bottom:21px;">
				<div style="float:none;width:400px;">
					<span class="span-4 size-12">Ano:</span><span class="span-3 last size-13-bold caracdir"> <?=utf8_decode($team['car_ano'])?></span>
				</div>
				<div style="margin-top: 10px;float:none;width:400px;height:21px;">
					<span class="span-4 size-12">Combustível:</span><span class="span-3 last size-13-bold caracdir"> <?=utf8_decode($team['combustivel'])?></span>
				</div>
				<div  style="margin-top: 8px;height:21px;width:400px;">
					<span class="span-4 size-12">Km:</span><span class="span-3 last size-13-bold caracdir"> <?=utf8_decode($team['km'])?></span>
				</div>
				<div style="margin-top: 4px;width:400px;">
					<span class="span-4 size-12">Câmbio:</span><span class="span-3 last size-13-bold caracdir"> <?=utf8_decode($team['transmissao'])?></span>
				</div>
				<div style="margin-top: 4px;float:none;width:400px;">
					<span class="span-4 size-12">Cor:</span><span class="span-3 last size-13-bold caracdir"> <?=utf8_decode($team['cor'])?></span>
				</div>
				<div style="margin-top: 10px;width:400px;">
					<span class="span-4 size-12">Placa:</span><span class="span-3 last size-13-bold caracdir"> <?=formataplaca($team['placa'])?></span>
				</div> 
				<div style="margin-top: 4px;float:none;width:400px;">
					<span class="span-4 size-12">Portas:</span><span class="span-3 last size-13-bold caracdir"> <?=utf8_decode($team['numero_portas'])?></span>
				</div>	
			</div>
		  </div>
	 	<div class="tfipetxt">   </div>
	 </div>
 </div> 
	
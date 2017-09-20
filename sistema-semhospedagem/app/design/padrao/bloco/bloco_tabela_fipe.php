 <div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 
 <?
 $precosfipe = buscaprecosfipe($team['car_modelo'],$team['modelo_ano']);  
 ?> 
 <div style="clear:both;">  *Anúncio sujeito a alteração sem prévio aviso, consulte o anunciante.</div>
 <div class="carro-detalhe" style="clear:both;">
	 <div class="span-16 raio-5 last avaliacao"> 
		<div class="titulocc borda-bottom-1 padding-bottom-10">   
			<div class="span-8 borda-bottom-1 fundosecao" style="width:615px;">
				<div class="alturasecao" style="margin-top:-10px;"> 
						<div class="titfipe">Tabela FIPE x <?=utf8_decode( $INI['system']['sitename']); ?> 
					<? if(  $team['temprecoespecial']=="Y"){
						if((gettipoanunciante($login_user[id])!="" and gettipoanunciante($login_user[id])!="Particular")  or $login_user[id] ==1){
						?>
							<div style="float:right;margin-right: 33px;">Preço especial para revendas: <a class="linknew" href='javascript:preco_especial_revenda("<?=$team['id']?>");'>Clique aqui</a> </div>
						<? } 
					}?>
					</div> 
				</div>
			</div>
			
			<div class="jump-1 margin-top-10" style="margin-bottom:21px;">
				<div style="float:left;width:325px;height:21px;">
					<span class="span-4 size-12">Preço da tabela FIPE:</span><span class="span-3 last size-13-bold"> <?php if($precosfipe[precotabelafipe] != ""){echo $precosfipe[precotabelafipe];}else{echo " Valor não disponível";}?></span>
				</div>
				<div  style="height:21px;">
					<span class="span-4 size-12">Maior preço anunciado:</span><span class="span-3 last size-13-bold"> <?=$precosfipe[maiorprecoanunciado]?></span>
				</div>
				<div style="float:left;width:325px;">
					<span class="span-4 size-12">Preço médio <?=utf8_decode( $INI['system']['sitename']); ?>:</span><span class="span-3 last size-13-bold vermelho-padrao"> <?=$precosfipe[precotabelamedia]?> </span>
				</div>
				<div>
					<span class="span-4 size-12">Menor preço anunciado:</span><span class="span-3 last size-13-bold"> <?=$precosfipe[menorprecoanunciado]?></span>
				</div>
			</div>
		  </div>
		<div class="tfipetxt">  
	 <!--A tabela FIPE é atualizada mensalmente no site  <?=utf8_decode( $INI['system']['sitename']); ?>. Por esse motivo, alguns dados podem estar diferentes do site da FIPE. Em caso de dúvidas
sobre o valor do veículo, acesse: <a target="_blank" href="http://www.fipe.org.br">http://www.fipe.org.br</a>-->
</div>
<div style="margin-top: -9px; float: right; margin-right: 14px;font-size:11px"><!--Última atualização: 01/10/2014--></div>

	 </div>
 </div> 
 
<script>
function preco_especial_revenda(team_id){
 
	J.ajax({
	   type: "POST",
	   cache: false,
	   async: false,
	   url: "<?php echo $INI['system']['wwwprefix']?>/include/funcoes.php",
	   data: "acao=preco_especial_revenda&team_id="+team_id, 
	   success: function(retorno){ 
			 jQuery.colorbox({html:retorno});  	 
		}
	});
}
</script>
	
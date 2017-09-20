<div class="span-8 dados-vendedor raio-5 last">
 <div style="display:none;height:36px;" class="tips"><?=__FILE__?></div>
 
<? if($partner['tipo']=="Particular"){
	echo getnomeanunciante($team['user_id']) ;  
?> 
	 <div style="color:#303030;font-size:13px; ;"> 
		<b>  <?php echo utf8_decode($nome[0]); ?></b> 
	</div> 
<? } ?>

<?=utf8_decode($this->getCidade($team['city_id']));?> 
			
<div class="tktel">  
 <a class="linknew" href="javascript:getfones('<?=$team['user_id']?>','<?=$team['partner_id']?>');"><img  src='<?php echo $PATHSKIN."/images/iconetel.png"?>'> Ver telefone </a>
</div>
						 
</div>
 
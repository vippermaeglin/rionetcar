<div style="display:none;" class="tips"><?=__FILE__?></div>
<?
	$condicoes = array(
			//'city_id' => array($others_city_id, 0),
			//'team_type in ("normal","cupom","off","pacote")',
			//"group_id = ".$_REQUEST["idcategoria"],
	);
	$dados = DB::LimitQuery('faq', array(
		'condition' => $condicoes,
		'order' => 'ORDER BY `ordem` DESC, `id` DESC',
	 ));
?>
<div class="faqcontat">		
	<h4 class="size-19-bold vermelho-padrao margin-bottom-15;" style="text-align:center;">Perguntas Frequentes</h4>						
	<dl id="faqs">
	<?  
	if(is_array($dados)){foreach($dados AS $index=>$one) { ?>
	
		  <dt><?=utf8_decode($one[pergunta])?></dt>
		  <dd class="size-12"><?=utf8_decode($one[resposta])?></dd> 
	 
	 <?php }} ?>
	  
	</dl> 
</div>
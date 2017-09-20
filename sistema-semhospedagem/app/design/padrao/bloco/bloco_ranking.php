<div style="display:none;height:35px;" class="tips"><?=__FILE__?></div>
<!-- BLOCO RANKING DE INDICAÇÕES -->
 <?php 
 
if( $INI['option']['bloco_rank'] =="Y"){  

	if($INI['option']['posicao_ranking'] =="ranking_esquerda_abaixo"){ 
		$widthranking="209px;";
		$topranking="63px;";
	}
	else if($INI['option']['posicao_ranking'] =="ranking_esquerda_acima"){ 
		$widthranking="209px;";
		$topranking="63px;";
	}
	else if($INI['option']['posicao_ranking'] =="ranking_direita_abaixo"){ 
		$widthranking="209px;";
		$topranking="0px;";
	}
	else if($INI['option']['posicao_ranking'] =="ranking_direita_acima"){ 
		$widthranking="209px;";
		$topranking="0px;";
	}
	
	$numero_mes = date("n");
	$mes = array(1 =>"Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"); /* Meses */
	
	$sql = "select count(a.user_id) as quantidadeindicacoes, b.username from invite a, user b where YEAR(a.data_time) = YEAR(now()) and MONTH(a.data_time) = MONTH(now()) and  a.user_id = b.id  group by a.user_id  order by quantidadeindicacoes desc limit 5 " ;
	$res = mysql_query($sql);
 ?>
	<div style="margin-top:11px"> <img  style="padding:0 0 0px;margin-left:1px;" src="<?=$PATHSKIN?>/images/bgranking.jpg"> </div>
	<div class="three_up" style="width:210px;margin-top:-3px;">
	<div class="deal clearfix">
	<div class="image">
		<div class="inner">
		 <table width="176" border="0">
	   <tr>
		<td style="text-align: center;" colspan="3"><span class="txt91"><?=$mes[$numero_mes]?></span> </td>
	  </tr>
	   <tr>
		<td colspan="3"> &nbsp;&nbsp;  </td>
	  </tr>
	  <tr>
		<td width="50"><span class="txt92">Ranking</span></td>
		<td width="90"><span class="txt92">Usuário</span></td>
		<td width="30"><span class="txt92">Qtd</span></td>
	  </tr>
	  <? 
		$ranking = 0 ; 
		while($row = mysql_fetch_object($res)){ 
		$ranking++ ;
		
		$username = $row->username;
		$username =  explode("@",$username);
		$username = $username[0];
		 ?>
			 <tr>
				<td><span><?=$ranking?></span></td>
				<td><span><?=$username?></span></td>
				<td><span><?=$row->quantidadeindicacoes;?></span></td>
			  </tr>
		<? } ?>
	 
		</table>
		 
		</div>
	  </div>
	</div>
</div>
<div class="tail"></div>
<? }?>
<!-- FIM BLOCO RANKING DE INDICAÇÕES -->
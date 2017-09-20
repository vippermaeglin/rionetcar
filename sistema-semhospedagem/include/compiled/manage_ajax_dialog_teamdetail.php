<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:765px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">Fechar</span>Detalhes da Oferta</h3>
	<div style="overflow-x:hidden;padding:0px;">
	<table width="96%" align="center" class="coupons-table">
		<tr><td width="80"><b>Titulo:</b></td><td><b><?php echo $team['title']; ?></b></td></tr>
		<tr><td><b>Validade:</b></td><td>inicio:<b><?php echo date('d-m-Y',$team['begin_time']); ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ate :<b><?php echo date('d-m-Y',$team['end_time']); ?></b></td></tr>

		 <tr><td><b>Quantidade:</b></td><td>Minimo: <?php echo $team['min_number']; ?>&nbsp;&nbsp;&nbsp;&nbsp;Maximo: <?php echo $team['max_number']==0?'Sem Limite':$team['max_number']; ?></td></tr>
		<tr><td><b>Preço:</b></td><td>Preço de mercado: R$ <b><?php echo moneyit3($team['market_price']); ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preço do item: R$ <b><?php echo moneyit3($team['team_price']); ?></b>&nbsp;</td></tr>
	 
		 </td></tr>
	<?php if($team['needline']){?>
		<tr> </td>
		 
		<div id="contatordisp" style="text-align:center;background:#F1F2FF; font-weight: bold; color: blue; display:none;"><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> <font color=#303030>A newsletter está sendo enviada, este processo pode demorar algumas horas...</font> </div>
		<br>
		<tr><td colspan="2">
		<? $subcount = $subcount + $arrsubscidzero ?>    
		 <br> 
		 
		   <!--  Qtde de envio por hora: -->
			<input style="display:none;" type="text" name="qtdeenviohora" id="qtdeenviohora" size="5" value="200">  
			<button style="padding:0;" id="dialog_subscribe_button_id" onclick="if(confirm('Tem certeza que deseja enviar ?')){msg_envia();this.disabled=true;return X.misc.noticenext(<?php echo $team['id']; ?>,0,jQuery('#qtdeenviohora').val());}">&nbsp; Enviar Oferta &nbsp;(<span id="dialog_subscribe_count_id">0</span>/<?php echo $subcount; ?>)</button>&nbsp;
		  
		  <br> 
			
		   <span class="inputtip" style="font-size:11px;color:#FFF"><br> Tenha em mente que envio de email em massa originado do mesmo servidor onde está hospedado o seu site pode ser extremamente demorado uma vez que este ambiente não é adequado para este fim e isto é realmente necessário para que esses envios não sobrecarreguem o servidor o que irá causar uma lentidão extrema no seu site. O ideal é que estes envios sejam disparados de um servidor a parte, além de vantagens como agendamento de envios e disparos automáticos. Verifique nossos planos <a target="_blank" style='color:#FAC899' href="http://www.sistemacomprascoletivas.com.br/sistemacompracoletiva/nossos-produtos/plano-de-email-marketing/">Clique aqui</a> para adiquirir ou mais informações </span> 	
		 
		    <!-- 
			<?php if($team['noticesms']){?><button id="dialog_sms_button_id" onclick="if(confirm('Processo de envio de mensagens de texto, seja paciente, aceita realizar?')){this.disabled=true;return X.misc.noticesms(<?php echo $team['id']; ?>,0);}">Text messages sent in coupons&nbsp;(<span id="dialog_sms_count_id">0</span>/<?php echo $couponcount; ?>)</button>&nbsp;<?php }?>
			<?php if($team['teamcoupon']){?><button onclick="this.disabled=true;return X.manage.teamcoupon(<?php echo $team['id']; ?>);">Enviar o código do cupom automaticamente&nbsp;(<?php echo $couponcount; ?>/<?php echo $buycount; ?>)</button>&nbsp;<?php }?>
		     -->
		</td></tr>
	<?php }?>
	</table>
	</div>
</div>
<script>
function msg_envia(){
	//jQuery(document).ready(function(){   
		//	jQuery.colorbox({html:"<img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> <font color=#303030>Aguarde, a newsletter já está sendo enviada, este processo pode demorar algumas horas...</font>"});
		//});
		jQuery("#contatordisp").show();
}
 		
</script>


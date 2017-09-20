<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:580px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">Fechar</span>Detalhes da Oferta</h3>
	<div style="overflow-x:hidden;padding:10px;">
	<table width="96%" align="center" class="coupons-table">
		<tr><td width="80"><b>Titulo:</b></td><td><b><?php echo $team['title']; ?></b></td></tr>
		<tr><td><b>Validade:</b></td><td>inicio:<b><?php echo date('d-m-Y',$team['begin_time']); ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ate :<b><?php echo date('d-m-Y',$team['end_time']); ?></b></td></tr>

		<tr><td><b>Preço:</b></td><td>Preço de mercado: R$ <b><?php echo moneyit3($team['market_price']); ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preço do item: R$ <b><?php echo moneyit3($team['team_price']); ?></b>&nbsp;</td></tr>
		<tr><th colspan="2"><hr/></th></td>
		 
	<?php if($team['needline']){?>
		<tr><th colspan="2"><hr/></th></td>
		<tr><td colspan="2">
		<? $subcount = $subcount + $arrsubscidzero ?>    
		 
		   <!--  Qtde de envio por hora: -->
			<input style="display:none;" type="text" name="qtdeenviohora" id="qtdeenviohora" size="5" value="200">  
			<button style="padding:0;" id="dialog_subscribe_button_id" onclick="if(confirm('Envio de e-mails em processo, por favor seja paciente, aceita realizar?')){this.disabled=true;return X.misc.noticenext(<?php echo $team['id']; ?>,0,jQuery('#qtdeenviohora').val(),'afiliado');}">&nbsp; Enviar Oferta &nbsp;(<span id="dialog_subscribe_count_id">0</span>/<?php echo $subcount; ?>)</button>&nbsp;
		   
		</td></tr>
	<?php }?>
	</table>
	</div>
</div>

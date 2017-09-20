<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:500px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">Fechar</span></h3>
	<p class="info">Por favor pague na página que você acabou de abrir.</p>
	<p class="notice">Não feche a janela até finalizar o pagamento.<br> Depois, clique no botão .</p>
	<p class="act"><input id="order-pay-dialog-succ" class="formbutton" value="pagamento finalizado" type="submit" onclick="location.href=WEB_ROOT + '/index.php';" />&nbsp;&nbsp;&nbsp;<input id="order-pay-dialog-fail" class="formbutton" value="pagamento não finalizado" type="submit" onclick="location.href=WEB_ROOT + '/order/pay.php?id=<?php echo $order_id; ?>';" /></p>
	<p class="retry"><?php if($order_id=='charge'){?><a href="/credit/charge.php"><?php } else { ?><a href="/order/check.php?id=<?php echo $order_id; ?>"><?php }?>&raquo; Voltar para selecionar outros meios de pagamento.</a></p>
</div>


<?php


?>

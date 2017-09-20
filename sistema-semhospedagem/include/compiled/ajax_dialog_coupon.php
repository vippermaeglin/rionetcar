<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:380px;">
<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">Fechar</span>Consultar cupom </h3>
	<p class="info" id="coupon-dialog-display-id">Digite o número e código do cupom.</p>
	<p class="notice">Número:<input id="coupon-dialog-input-id" type="text" name="id" class="f-input" style="text-transform:uppercase;" maxLength="12" onkeyup="X.coupon.dialoginputkeyup(this);" /></p>
	<p class="notice">&nbsp;&nbsp;Código:<input id="coupon-dialog-input-secret" type="text" name="secret" style="text-transform:uppercase;" class="f-input" maxLength="8" onkeyup="X.coupon.dialoginputkeyup(this);" /></p>
	<p class="act"><input id="coupon-dialog-query" class="formbutton" value="Verificar" name="query" type="submit" onclick="return X.coupon.dialogquery();"/>&nbsp;&nbsp;&nbsp;<input id="coupon-dialog-consume" name="consume" class="formbutton" value="Consumir" type="submit" onclick="return X.coupon.dialogconsume();" ask="Seu cupom só pode ser usado uma vez, tem certeza que deseja usa-lo?"/></p>
</div>

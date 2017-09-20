<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:380px;">
<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">fechar</span>SMS  - <?php echo $city['name']; ?> Últimas ofertas</h3>
	<p class="info" id="smssub-dialog-display-id">Por favor digite seu celular e o número de autorização.</p>
	<p class="notice">Numero do celular:<input id="smssub-dialog-input-mobile" type="text" name="mobile" class="f-input" style="text-transform:uppercase;" maxLength="12" value="<?php echo $_GET['mobile']; ?>" /></p>
	<p class="notice">Código de verificação:<input id="smssub-dialog-input-verifycode" type="text" name="captchacode" style="text-transform:uppercase;" class="f-input" maxLength="6" /></p>
	<p class="notice" style="margin-left:4em;"><img id="img-captcha-id" src="/captcha.php?<?php echo microtime(true); ?>" style="margin-bottom:-4px;" /><a href="javascript:;" style="margin:5px; font-size:12px;" onclick="jQuery('#img-captcha-id').attr('src',WEB_ROOT+'/captcha.php?'+Math.random());" >Ilegivel? crie outro número</a></p>
	<p class="notice" style="margin:10px 4em;" ><input id="smssub-dialog-query" class="formbutton" value="enviar" name="query" type="submit" onclick="smssub_submit();"/></p>
</div>

<script type="text/javascript">
function smssub_submit() {
	var mobile = trim(jQuery('#smssub-dialog-input-mobile').val());
	var verifycode = trim(jQuery('#smssub-dialog-input-verifycode').val());
	if(mobile == '') {
		alert('Phone number can not be empty');
		jQuery('#smssub-dialog-input-mobile').focus();
	} else if(verifycode == '') {
		alert('Code can not be empty');
		jQuery('#smssub-dialog-input-verifycode').focus();
	} else {
		X.get(WEB_ROOT + "/ajax/sms.php?action=subscribecheck&mobile="+mobile+"&city_id=<?php echo $city['id']; ?>&verifycode="+verifycode+"&r="+ Math.random());
	}
}

function captcha_again() {
	alert('incorrect verification code?Please type it again ?');
	jQuery('#smssub-dialog-input-verifycode').val('');
	jQuery('#smssub-dialog-input-verifycode').focus();
	jQuery('#img-captcha-id').attr('src',WEB_ROOT+'/captcha.php?'+Math.random());
}

function trim(str) {
	return str.replace(/^\s*(.*?)[\s\n]*$/g, '$1');
}
</script>
<?


?>

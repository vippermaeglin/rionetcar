<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:380px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">Fechar</span><?php echo $goods?'edit':'Get'; ?> Créditos & Convertendo em compra</h3>
	<div style="overflow-x:hidden;padding:10px;">
	<p>Bons titulos e crédito devem seguir um critério de grupos .</p>
<form method="post" action="/vipmin/credit/edit.php" class="validator" enctype="multipart/form-data" >
	<input type="hidden" name="id" value="<?php echo $goods['id']; ?>" />
	<table width="96%" class="coupons-table">
		<tr><td width="80" nowrap><b>Bons titulos：</b></td><td><input type="text" name="title" value="<?php echo $goods['title']; ?>" require="true" datatype="require" class="f-input" /></td></tr>
		<tr><td nowrap><b>Créditos：</b></td><td><input type="text" name="score" value="<?php echo abs(intval($goods['score'])); ?>" maxLength="10" require="true" datatype="number" class="f-input" /></td></tr>
		<tr><td nowrap><b>Quantidade：</b></td><td><input type="text" name="number" value="<?php echo abs(intval($goods['number'])); ?>" class="f-input" /></td></tr>
		<tr><td nowrap><b>foto：</b></td><td><input type="file" name="upload_image" class="f-input" /></td></tr>
		<tr><td nowrap><b>Ordenar：</b></td><td><input type="text" name="sort_order" value="<?php echo intval($goods['sort_order']); ?>" class="f-input" /></td></tr>
		<tr><td nowrap><b>Mostrar：</b></td><td><input type="text" name="display" value="<?php echo $goods['display']; ?>" class="f-input" /></td></tr>
		<tr><td colspan="2" height="10">&nbsp;</td></tr>
		<tr><td></td><td><input type="submit" value="yes" class="formbutton" /></td></tr>
	</table>
</form>
	</div>
</div>

<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:380px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">Fechar</span><?php echo $link?'Editar':'Adicionar'; ?> Links do Parceiro</h3>
	<div style="overflow-x:hidden;padding:10px;">
	<p>Nome do site deve ser prenchido</p>
<form method="post" action="/vipmin/misc/linkedit.php" class="validator">
	<input type="hidden" name="id" value="<?php echo $link['id']; ?>" />
	<table width="96%" class="coupons-table">
		<tr><td width="80" nowrap><b>Nome do site:</b></td><td><input type="text" name="title" value="<?php echo $link['title']; ?>" require="true" datatype="require" class="f-input" /></td></tr>
		<tr><td nowrap><b>website:</b></td><td><input type="text" name="url" value="<?php echo $link['url']; ?>" require="true" datatype="require" class="f-input" /></td></tr>
		<tr><td nowrap><b>LOGO do site:</b></td><td><input type="text" name="logo" value="<?php echo $link['logo']; ?>" require="require" datatype="require" class="f-input" /></td></tr>
		<tr><td nowrap><b>Ordenar (Descendente):</b></td><td><input type="text" name="sort_order" value="<?php echo intval($link['sort_order']); ?>" class="f-input" /></td></tr>
		<tr><td nowrap><b>Exibir (Y/N):</b></td><td><input type="text" name="display" value="<?php echo $link['display']; ?>" class="f-input" style="text-transform:uppercase;"/></td></tr>
		<tr><td colspan="2" height="10">&nbsp;</td></tr>
		<tr><td></td><td><input type="submit" value="Salvar" class="formbutton" /></td></tr>
	</table>
</form>
	</div>
</div>

<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:817px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">Fechar</span>Gerenciamento de Autorização：<?=$user['email']?></h3>
	<div style="overflow-x:hidden;padding:10px;">
	<form method="POST" id="form_authorization_id">
	<input type="hidden" name="action" value="authorization" />
	<input type="hidden" name="id" value="<?=$user['id']?>" />
<br><br> 
	<table width="96%" class="coupons-table">
 
		<tr><td><input type="checkbox" name="auth[]" value="admin" <?php if(in_array('admin', $INI['authorization'][$user['id']])){echo 'checked';} ?>/>&nbsp;<b>Adminstrador do sistema</b></td><td>（Informações Básicas | Configurações | Usuários | Categorias | Administradores | Configurar email | Configurar Pagseguro | Paginas | Banners | Backup）</tr>		
		<tr><td width="200"><input type="checkbox" name="auth[]" value="team" <?php if(in_array('team', $INI['authorization'][$user['id']])){ echo 'checked';}?>/>&nbsp;<b>Gerenciador de Ofertas</b></td><td>（Ofertas | Agregadores</td></tr>
		<tr><td><input type="checkbox" name="auth[]" value="order" <?php if(in_array('order', $INI['authorization'][$user['id']])){ echo 'checked';}?>/>&nbsp;<b>Gerente de pedidos</b></td><td>（Pedidos | Pagamentos | Cupons | Recarga de créditos | Comissões de Usuários）</tr>
		<tr><td><input type="checkbox" name="auth[]" value="market" <?php if(in_array('market', $INI['authorization'][$user['id']])){ echo 'checked';}?>/>&nbsp;<b>Gerente de marketing</b></td><td>(Parceiros |Envio de newsletter de oferta, Contatos & Sugestões | Inscritos em newsletter,Download de relatórios</td></tr>
		<tr><td><input type="checkbox" name="auth[]" value="design" <?php if(in_array('design', $INI['authorization'][$user['id']])){ echo 'checked';}?>/>&nbsp;<b>Designer</b></td><td>(Layout | Imagens)</td></tr>
		<tr><td colspan="2"><input type="submit" class="formbutton" value="Determinar autorização" /></td></tr>
	</table>
	</form>
	</div>
</div>
<style>
 
#dialog {
    background-color: #FFFFFF;
    display: block;
    left: 597.5px;
    top: 185px;
    width: 820px;
    z-index: 9999;
    border: 4px solid #CCCCCC;
  
    position: absolute;
    z-index: 9999;
}

</style>
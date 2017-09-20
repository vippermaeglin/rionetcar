 <style>
.coupons-table td, .coupons-table th {
    padding: 6px;
}
</style>
 <?
 require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
 $user 		= Table::Fetch('user', $_REQUEST['id']);
 //$order 	= Table::Fetch('order', $_REQUEST['id']);
 //$team 		= Table::Fetch('team', $order['team_id']);
 ?>
<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:580px;">
	<h3> Detalhes do Cliente</h3>
	<div style="overflow-x:hidden;padding:10px;">
		<table width="96%" class="coupons-table">
		<tr><td width="80"><b>Email:</b></td><td><?=$user['email']?></td></tr>
		<tr><td><b>Apelido:</b></td><td><?=$user['username']?></td></tr>
		<tr><td><b>Nome:</b></td><td><?=$user['realname']?></td></tr>
		<tr><td><b>CPF:</b></td><td><?=$user['cpf']?></td></tr>
		<tr><td><b>Celular:</b></td><td><?=$user['mobile']?></td></tr>
		<tr><td><b>Endereço:</b></td><td><?=$user['address']?></td></tr>
		<tr><td><b>Número:</b></td><td><?=$user['numero']?></td></tr>
		<tr><td><b>Complemento:</b></td><td><?=$user['complemento']?></td></tr>
		<tr><td><b>Bairro:</b></td><td><?=$user['bairro']?></td></tr>
		<tr><td><b>Estado:</b></td><td><?=$user['estado']?></td></tr>
		<tr><td><b>Cidade:</b></td><td><?=$user['cidadeusuario']?></td></tr> 
		<tr><td><b>CEP:</b></td><td><?=$user['zipcode']?></td></tr>
		<tr><td><b>IP:</b></td><td><?=$user['ip']?></td></tr>
 </table>
	</div>
</div>
 <script> 
 
 function msg(){
	jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> A recarga está sendo feita...</div>"});
}

 </script>
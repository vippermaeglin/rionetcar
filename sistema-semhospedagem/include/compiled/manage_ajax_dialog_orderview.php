 <style>
.coupons-table td, .coupons-table th {
    padding: 6px;
}
</style>
 <?
 require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
 $order 	= Table::Fetch('order', $_REQUEST['id']);
 $team 		= Table::Fetch('team', $order['team_id']);
 $partner  	= Table::Fetch('partner', $team['partner_id']);
 $user 		= Table::Fetch('user', $order['user_id']);
 header("Content-Type: text/html; charset=UTF-8");  
 
 ?>
<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:780px;">
	<h3>DETALHES DA OFERTA</h3>
	<div style="overflow-x:hidden;padding:10px;">
		<table width="96%" class="coupons-table">
		<tr><td><b>Pedido N.:</b></td><td><?=$order['id']?></td></tr>
		<tr><td width="150"><b>Usuário:</b></td><td><?=$user['username']?> / <?=$user['email']?></td></tr>
		<tr><td><b>Oferta:</b></td><td><?=$team['title']?></td></tr>
		<tr><td><b>Tipo de Oferta:</b></td><td><?=$team['team_type']?></td></tr>
		<tr><td><b>Quantidade:</b></td><td><?=$order['quantity']?></td></tr>
		<? if($team['frete']=="1" ){?>
			<tr><td><b>Valor do Frete:</b></td><td>R$ <?=number_format($order['valorfrete'],2,",",".") ;?></td></tr>
		<? } ?>
		<tr><td><b>Valor do Pedido:</b></td><td>R$ <?=number_format($order['origin'],2,",",".")?></td></tr>
		<? if($team['frete']=="1" ){
			$valortotal = $order['origin'] + $order['valorfrete'];
		?>
			<tr><td><b>Valor Total:</b></td><td>R$ <?=number_format($valortotal,2,",",".") ;?></td></tr>
		<? } ?>
		
        <? if( $team['pontosgerados'] and $INI['option']['pontuacao']=="Y" ){ 
			$totalpontos = (int)$team['pontosgerados'] * (int)$order['quantity']; ?>
			<tr><td><b>Pontos gerados</b></td><td><?=number_format($totalpontos ,null,"",".") ?></td></tr>
  	  <? } ?>   
	  <? if( $team['pontos'] and $INI['option']['pontuacao']=="Y" ){  ?>
			<tr><td><b>Pontos Necessárois</b></td><td><?=number_format($team['pontos'],null,"",".") ?></td></tr>
  	  <? } ?>    
	
		<? if( $order['condbuy']){ ?>
			<tr><td><b>Opções:</b></td><td><?=$order['condbuy']?></td></tr>
  	   <? } ?>	
	   
	   <? if( $order['service']){ ?>
			<tr><td><b>Serviço:</b></td><td><?=$order['service']?></td></tr>
  	   <? } ?>
      
      	<tr><td><b>Status:</b></td><td><? if($order['state']=="pay"){echo "<font color='#8FC92E'>Pago</font>";} else {echo "<font color='#DD3832'>Pendente</font>";} ?></td></tr>

		<tr><td><b>Parceiro</b></td><td><?=$partner['title']?></td></tr>
        <? if($order['state']=="pay"){?><tr><td><b>Transação.:</b></td><td><?=$order['pay_id']?></td></tr><?}?>
		
		<? if( $order['credit'] != "0.00"){?>Pago <?=$currency?> <tr><td><b>Crédido:</b></td><td>  <?= $order['credit'] ?>  com saldo<? } ?> &nbsp;
		<? if( $order['service'] !='credit'&& $order['money'] != "0.00" ){ ?> <tr><td><b>Dinheiro:</b></td><td> Usuário pagou <?=$currency?>  <?= $order['money']?>   <? } ?> 
		 <tr><td><b>Pedido:</b></td><td>Feito em: <?php echo date('d/m/Y H:i', strtotime($order['datapedido']) ); ?>  </td></tr>  
    
		<tr><td><b>Telefone:</b></td><td><?=$user['mobile']?></td></tr>
		
		<? if($team['frete']=="1" ){?> 
			<tr><td><b>Endereço de Cobrança:</b></td><td><? getEnderecoCobrancaPedidoAdmin($order['id']);?></td></tr>
			<tr><td><b>Endereço de Entrega:</b></td><td><? getEnderecoEntregaPedidoAdmin($order['id']);?></td></tr>
		<? } ?>
		
		<? if($user['cpf']){?>
			<tr><td><b>CPF:</b></td><td><?=$user['cpf']?></td></tr>		
		<? } ?>
		<tr><td><b>IP:</b></td><td><?=$user['ip']?></td></tr>
	 </table>
	</div>
</div>



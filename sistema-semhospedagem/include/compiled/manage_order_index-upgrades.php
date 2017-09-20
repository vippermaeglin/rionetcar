<?php include template("manage_header");?>
 
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
			 <div class="option_box">
					<div class="top-heading group"> <div class="left_float"><h4>Planos de upgrades</h4></div> </div> 
						 
					<!-- <div class="paginacaotop"><?php echo $pagestring; ?></div> -->
					  
					<div class="sect" style="clear:both;">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						
						<form method="get">
						<tr>
							<th width="20">ID</th>
							<th width="100">Nome</th>
							<th width="150">Descrição</th>  
							<th width="50">Preço</th> 
							<th width="130">Status</th>  
							<th width="50">Editar</th> 
							</th> 
						</tr>
						</form>
						 
						 <?php if(is_array($orders)){foreach($orders AS $index=>$one) { $bregistro =  true; 
								
								$status = "Desativado";
								
								if($one['status'] == 0) {
									$status = "Desativado";
								}
								else if($one['status'] == 1) {
									$status = "Ativado";
								}
						 ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?> id="order-list-id-<?php echo $one['id']; ?>">
						
							<td><?php echo $one['id']; ?></td>
							<td><?php echo $one['nome']; ?></td>
							 <td><?php echo $one['descricao']; ?></td> 
							<td><?php echo $one['preco']; ?></td>
							<td><?php echo $status; ?></td>							 
							<td class="op" nowrap> <a href="/vipmin/order/edit-upgrades.php?id=<?php echo $one['id']; ?>"><img alt="Editar Plano" title="Editar Plano" src="/media/css/i/editar.png" style="width: 22px;"></a> 
							 
							 
							</td>
							 
						</tr>
						<?php }}?>
						<?if(!$bregistro){?><tr><td colspan="13" style="text-align: center;">Nenhum registro encontrado.  </tr><? } ?>
						<!-- <tr><td colspan="10"><?php echo $pagestring; ?></tr> -->
						</table>
					</div>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->
 <script> 
 function resetFilter(){
	location.href  = '<?php echo $_SERVER["PHP_SELF"] ?>';
 } 

  function msg(){
	jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Deletando este pedido...</div>"});
}  
 function msg_edit(){
	jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Buscando dados. Aguarde...</div>"});

} 

 </script>
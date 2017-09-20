<?php include template("manage_header");?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
			<div class="option_box">
				 <div class="top-heading group"> <div class="left_float"><h4>Fabricantes</h4></div> 
				
					<div style="padding: 10px;">
						<ul id="log_tools"> <li id="log_switch_referral"><a title="Cadastrar <?php echo $cates[$zone]; ?>" href="/vipmin/category/editfabricantes.php">Adicionar<?php echo $cates[$zone]; ?></a></li> </ul> 
					 </div>
						
				</div> 
			 
					<div class="paginacaotop"><?php echo $pagestring; ?></div>
					 
					 <div class="sect" style="clear:both;">
							 
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						 <tr>
						  <form method="get">
							 <th width="20">ID</th>
							 <th>Fabricante<input type="text"  name="nome"  id="nome" style="width: 50%; color:#303030;font-size:11px;"></th>
							 <th width="150">Tipo</th>
							 <th width="150"><button style="width: 60px;" type="submit"><span>Buscar</span></button>
								<button style="width: 60px"  onclick="resetFilter()" type="button"><span>Limpar</span></button></th>
						</form>
						 </tr>
						<?php if(is_array($categories)){
						foreach($categories AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>>
							<td><?php echo $one['id']; ?></td>
							<td><?php echo $one['nome']; ?></td>
							<td><?php echo $one['tipo']; ?></td>
							<td class="op">
							 <div style="float: left; margin-right: 2px;">
							 <a href="/vipmin/category/editfabricantes.php?&id=<?php echo $one['id']; ?>"><img alt="Editar" title="Editar" src="/media/css/i/editar.png" style="width: 22px;">
						  	<a href="/ajax/manage.php?action=excluir&tabela=fabricante&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Você tem certeza que deseja apagar esse registro ?" ><img alt="Excluir" title="Excluir" style="width: 22px;" src="/media/css/i/excluir.png"></a>
							
							 </a>
							 </div>
						    </td>
							<?}  ?>
						</tr>
						<?php }?>
						<tr><td colspan="8"><?php echo $pagestring; ?></td></tr>
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
  function msg_edit(){
	jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Aguarde enquanto carregamos os dados...</div>"});
}
 </script>
 
  <script>
  function msg(){
		return true;
 }
 </script>
 
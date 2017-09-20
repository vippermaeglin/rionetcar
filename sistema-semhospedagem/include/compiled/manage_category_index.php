<?php include template("manage_header");?>
 
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
			<div class="option_box">
				 <div class="top-heading group"> <div class="left_float"><h4><?php echo $cates[$zone]; ?></h4></div> 
				
					<div style="padding: 10px;">
						<ul id="log_tools"> <li id="log_switch_referral"><a title="Cadastrar <?php echo $cates[$zone]; ?>" href="/vipmin/category/edit.php?zone=<?php echo $zone; ?>">Adicionar <?php echo $cates[$zone]; ?></a></li> </ul> 
					 </div>
						
				</div> 
			 
					<div class="paginacaotop"><?php echo $pagestring; ?></div>
					 
					 <div class="sect" style="clear:both;">
							 
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<tr><th width="10">ID</th>
						<th width="150">Nome   </th>
						 <th width="300">Link</th> 
						<? if($cates[$zone]!="Cidade"){?><th width="300">Tipo de Categoria</th><?}?>
						<th width="10" nowrap>Mostrar</th>
						<th width="40" nowrap>Pai</th>
						<th width="40" nowrap>Ordenação</th>
						<th width="100">Operação</th></tr>
						
						<?php if(is_array($categories)){foreach($categories AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>>
							<td><?php echo $one['id']; ?></td>
							<td><?php echo $one['name']; ?></td>   
							<? if($cates[$zone]!="Cidade" and $one['tipo'] != "pagina"  and $one['linkexterno'] == ""){?><td><a style="color:#fff" target="_blank" href="<?php echo $ROOTPATH?>/index.php?page=categorias&idcategoria=<?=$one['id']; ?>&pagina=1">copiar link dos produtos</a></td><?} else if( $one['linkexterno']!=""){?><td><?=$one['linkexterno']?></td><? }  else{ ?><td> &nbsp;<img class="tTip" title="Vá no menu Páginas e crie uma página para esta categoria, ou simplesmente associe uma página já existente." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </td><? } ?>
							<? if($cates[$zone]!="Cidade"){?>
								<td>
								<?php  
									if($one['linkexterno'] != ""){ 
										echo "Link Externo" ;
									} 
									else if($one['tipo']=="pagina"){
										echo "Categoria para Página";
									} 
									else if($one['tipo']=="sistema"){ 
										 echo "<font color='#A3CA2D'>Categoria de Sistema</font>";
									} 
									 else { 
										echo "Categoria para Oferta";
									} ?> 
								</td>
							<?}  ?>
							<td><?php echo $one['display']; ?></td>
							<td><?php echo  $one['idpai']; ?></td>
							<td><?php echo intval($one['sort_order']); ?></td>
							<td class="op">
							 <div style="float: left; margin-right: 2px;"><a href="/vipmin/category/edit.php?zone=<?php echo $zone; ?>&id=<?php echo $one['id']; ?>"><img alt="Editar" title="Editar" src="/media/css/i/editar.png" style="width: 22px;"></a></div>
							<? if($one['tipo']!="sistema" and $one['linkexterno'] == ""){?> 
								<div style="float: left; margin-right: 2px;"><a href="/ajax/manage.php?action=categoryremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Você tem certeza que deseja apagar?" ><img alt="Excluir" title="Excluir" style="width: 17px;" src="/media/css/i/excluir.png"></a></div>
							<? }
							else {?>
								<img class="tTip" title="Este registro não pode ser excluído, clique em editar e em seguida, no campo 'Ativa' altere para Não." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
							<? }?>
							 </td>
						</tr>
						<?php }}?>
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
 
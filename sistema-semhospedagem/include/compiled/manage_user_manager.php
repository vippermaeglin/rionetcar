<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
				<div class="option_box">
				
							<div class="top-heading group"> <div class="left_float"><h4>Administradores</h4></div> 
								<div style="padding: 10px;">	
								<ul id="log_tools"> <li id="log_switch_referral"><a title="Cadastrar novo administrador" href="/vipmin/user/edit.php?adminnew=true">Novo Administrador</a></li> </ul>
					
								</div>	
							</div> 
				    
					<div class="sect" style="clear:both;">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<tr><th width="50">ID</th><th width="200">email</th><th width="100" nowrap>usuário</th><th width="100" nowrap>nome</th><th width="200">Data de registro</th></th><th width="100">Celular</th><th width="80">Operação</th></tr>
						<?php if(is_array($users)){foreach($users AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
							<td><?php echo $one['id']; ?></td>
							<td><?php echo $one['email']; ?></td>
							<td><?php echo $one['username']; ?></td>
							<td><?php echo $one['realname']; ?></td>
							<td><?php echo date('d-m-Y H:i', $one['create_time']); ?></td>
							<td><?php echo $one['mobile']; ?></td>

							<td class="op" nowrap>
							  <a href="/vipmin/user/edit.php?tipo=admin&id=<?php echo $one['id']; ?>"><img alt="Editar Administrador"  title="Editar Administrador" src="/media/css/i/editar.png" style="width: 22px;"></a> 
							<!-- <a href="/ajax/system.php?action=authorization&id=<?php echo $one['id']; ?>" class="ajaxlink_edit"><img alt="Permissões do Administrador" title="Permissões do Administrador" src="/media/css/i/group.png"  ></a> -->
							 <? if($one['id'] != "1"){?><a href="/ajax/manage.php?action=userremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Você tem certeza que deseja apagar esse Administrador? Tenha em mente que todos os seus pedidos, convites, pagamentos e cupons serão também removidos." ><img alt="Excluir" title="Excluir" style="width: 22px;" src="/media/css/i/excluir.png"></a><?}?>
						</td>
						</tr>
						<?php }}?> 
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
	jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Carregando dados. Aguarde...</div>"});
}

 </script>
   <script>
  function msg(){
	jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Deletando este administrador...</div>"});
}
 </script>
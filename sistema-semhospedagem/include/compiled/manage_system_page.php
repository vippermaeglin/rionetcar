<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
			
				<div class="option_box">
						<div class="top-heading group"> <div class="left_float"><h4>Páginas</h4></div> 
							
							<div style="padding: 10px;">
								<ul id="log_tools"> <li id="log_switch_referral"><a title="Adicionar Oferta" href="/vipmin/system/pageadd.php">Adicionar Página</a></li> </ul> 
							</div>
							
						</div>  
					<div class="paginacaotop"><?php echo $pagestring; ?></div>				
					<div>
					</div>
					<div class="sect" style="clear:both;">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<form method="get">
						<tr>
						<th width="400">Título  <input type="text"  value="<?=$_REQUEST['titulo']?>" name="titulo"  id="titulo" style="width: 90%; color:#303030;font-size:11px;"> </th>
						<th width="100">Ativa  		
						<select name="status"  id="status" style="width: 46%;color:#303030;font-size:11px;height:19px;font-weight:normal;" >
						<option value=""></option> 
						<option <? if($_REQUEST['status'] == "1") { echo " selected"; }?> value="1">Sim</option>
						<option <? if($_REQUEST['status'] == "0") { echo " selected"; }?> value="0">Não</option>
						</select>
						</th>
						<th width="100">Criação </th>
						<th width="100">Modificação </th>
						
						<th width="150">  
						<button style="width: 60px;" type="submit"><span>Buscar</span></button>
						<button style="width: 60px"  onclick="resetFilter()" type="button"><span>Limpar</span></button>
						</th>
						</tr>
						</form>
						<?php if(is_array($pages)){foreach($pages AS $index=>$one) { $bregistro =  true; ?>
					 
						<tr <?php echo $index%2?'class="normal"':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
							<td><?php echo $one['titulo']; ?></td> 
							<td><?php if($one['status']=="1") { echo "Sim";} else { echo "Não";} ?></td> 
							<td><?php echo date('d/m/Y H:i:s', strtotime($one['data_criacao'])); ?></td> 
							<td><?php echo date('d/m/Y H:i:s', strtotime($one['datamodificacao'])); ?></td> 
							<td class="op" nowrap>
							<div style="float: left; margin-right: 2px;"><a href="/vipmin/system/pageadd.php?id=<?php echo $one['id']; ?>"><img alt="Editar Página" title="Editar Página" src="/media/css/i/editar.png" style="width: 22px;"></a></div>
							<div style="float: left; margin-right: 2px;"><a target="_blank" href="/page/<?php echo $one['id']; ?>"><img alt="Visualizar Página" title="Visualizar Página" style="width: 22px;" src="/media/css/i/detalhe2.png"></a></div>
							<? if( $one['id'] != "help_tour" and $one['id'] != "help_faqs" and $one['id'] != "about_contact" and $one['id'] != "about_us" and $one['id'] != "about_terms" and $one['id'] != "about_privacy") {?>
								<div style="float: left; margin-right: 2px;"><a href="/ajax/manage.php?action=pageremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Você tem certeza que deseja apagar esta página?" ><img alt="Excluir" title="Excluir" style="width: 17px;" src="/media/css/i/excluir.png"></a></div>
							<? } ?>
							</td>
						</tr>
						<?php }} ?>
						<?if(!$bregistro){?><tr><td colspan="13" style="text-align: center;">Nenhum registro encontrado. Redefina sua pesquisa</tr><? } ?>
						<tr><td colspan="8"><?php echo $pagestring; ?></tr>
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
 </script>
    <script>
  function msg(){
	jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Deletando esta página...</div>"});
}
 </script>

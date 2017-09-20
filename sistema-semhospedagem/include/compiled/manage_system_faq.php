<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
			
				<div class="option_box">
						<div class="top-heading group"> <div class="left_float"><h4>FAQ - Perguntas e Respostas - Fale conosco </h4></div> 
							
							<div style="padding: 10px;">
								<ul id="log_tools"> <li id="log_switch_referral"><a title="Adicionar Oferta" href="/vipmin/system/faqadd.php">Adicionar Pergunta</a></li> </ul> 
							</div>
							
						</div>  
					<div class="paginacaotop"><?php echo $pagestring; ?></div>				
					<div>
					</div>
					<div class="sect" style="clear:both;">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<form method="get">
						<tr>
						<th width="400">Pergunta   </th>  
						<th width="150">   
						<button style="width: 60px"  onclick="resetFilter()" type="button"><span>Limpar</span></button>
						</th>
						</tr>
						</form>
						<?php if(is_array($fag)){foreach($fag AS $index=>$one) { $bregistro =  true; ?>
					 
						<tr <?php echo $index%2?'class="normal"':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
							<td><?php echo $one['pergunta']; ?></td>   
							<td class="op" nowrap>
							<div style="float: left; margin-right: 2px;"><a href="/vipmin/system/faqadd.php?id=<?php echo $one['id']; ?>"><img alt="Editar" title="Editar" src="/media/css/i/editar.png" style="width: 22px;"></a></div>
							<div style="float: left; margin-right: 2px;"><a href="/ajax/manage.php?action=faqremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Você tem certeza que deseja apagar ?" ><img alt="Excluir" title="Excluir" style="width: 17px;" src="/media/css/i/excluir.png"></a></div>
							</td>
						</tr>
						<?php }} ?>
						<?if(!$bregistro){?><tr><td colspan="13" style="text-align: center;">Nenhum registro encontrado.</tr><? } ?>
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

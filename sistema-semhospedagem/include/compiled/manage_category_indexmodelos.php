<?php include template("manage_header");?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
			<div class="option_box">
				 <div class="top-heading group"> <div class="left_float"><h4>Modelos</h4></div> 
				
					<div style="padding: 10px;">
						<ul id="log_tools"> <li id="log_switch_referral"><a title="Cadastrar <?php echo $cates[$zone]; ?>" href="/vipmin/category/editmodelos.php">Adicionar <?php echo $cates[$zone]; ?></a></li> </ul> 
					 </div>
						
				</div> 
			 
					<div class="paginacaotop"><?php echo $pagestring; ?></div>
					 
					 <div class="sect" style="clear:both;">
						<pre>
						</pre>
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<form method="get">
						 <tr>
						 <th width="35">ID<input type="text"  name="idomodelo"  id="idomodelo" style="width: 50%; color:#303030;font-size:11px;"></th>
						 <th width="250">Fabricante<input type="text"  name="fabricante"  id="fabricante" style="width: 50%; color:#303030;font-size:11px;"></th>
						 <th width="430">Modelo<input type="text"  name="nome"  id="nome" style="width: 50%; color:#303030;font-size:11px;"></th> 
						 <th>
						 	<button style="width: 60px;" type="submit"><span>Buscar</span></button>
							<button style="width: 60px"  onclick="resetFilter()" type="button"><span>Limpar</span></button>
						 </th>
						 </tr>
						 </form>
						<?php if(is_array($categories)){
						foreach($categories AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>>
							<td><?php echo $one['id']; ?></td>
							<td>
							<?php  
							$cidade = mysql_query("SELECT nome FROM fabricante WHERE id = '{$one['fabricante']}'");
							$cid = mysql_fetch_row($cidade);
							echo $cid[0];
							?> 
							</td>
							<td><?php echo $one['nome']; ?></td>   
							<td class="op">
							 <div style="float: left; margin-right: 2px;">
							 <a href="/vipmin/category/editmodelos.php?&id=<?php echo $one['id']; ?>"><img alt="Editar" title="Editar" src="/media/css/i/editar.png" style="width: 22px;">
							<a href="/ajax/manage.php?action=excluir&tabela=modelo&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Você tem certeza que deseja apagar esse registro ?" ><img alt="Excluir" title="Excluir" style="width: 22px;" src="/media/css/i/excluir.png"></a>
							
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
 
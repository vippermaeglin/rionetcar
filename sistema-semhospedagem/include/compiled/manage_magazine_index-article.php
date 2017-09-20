<?php include template("manage_header");?>
 
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
				<div class="option_box">
					<div class="top-heading group"> 
						<div class="left_float">
							<h4> 
							<?php if($selector=='failure'){?>
								 <?php echo utf8_decode("Artigos cancelados"); ?> 
							<?php } else if($selector=='success') { ?>
								 <?php echo utf8_decode("Todos os artigos válidos com período finalizado"); ?> 
							<?php } else if($_REQUEST['acao']=='site') { ?>
								  <?php echo utf8_decode("Artigos atuais no site"); ?>   
							<?php } else { ?>
								 <?php echo utf8_decode("Todos os artigos"); ?> 
							<?php }?>
							</h4>							
						</div> 
						<ul id="log_tools">						
							<button style="border:none;"   onclick="javascript:location.href='<?=$ROOTPATH?>/vipmin/magazine/edit-article.php'"  id="run-button" class="input-btn" type="button"><?php echo utf8_decode("Adicionar artigo"); ?></button>
						</ul>								
					</div> 
					<div class="paginacaotop"><?php echo $pagestring; ?></div>				
					<div class="sect" style="clear:both;">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
							<form method="get">
								<tr>
								<th width="40">ID <input type="text"  name="id"  id="id" style="width: 50%; color:#303030;font-size:11px;"> </th>
								<th width="350">Artigo <input type="text"  value="<?=$_REQUEST['article']?>" name="article"  id="article" style="width: 75%; color:#303030;font-size:11px;"></th>
								<th width="350">Categoria <!--<input type="text"  value="<?=$_REQUEST['category']?>" name="category"  id="category" style="width: 75%; color:#303030;font-size:11px;">--></th>
								
								<th width="60" nowrap>Status</th>
								<th width="220">  
								<button style="width: 60px;" type="submit"><span>Buscar</span></button>
								<button style="width: 60px"  onclick="resetFilter()" type="button"><span>Limpar</span></button>
								</th>
								</tr>
							</form>
						<?php if(is_array($article)){
								foreach($article AS $index=>$one_article) { 
									$bregistro =  true; 

									/* Busco o nome da categoria de acordo com a id retornada. */
									$sql = "select name from magazine_category where id = " . $one_article['id_category'];
									$exec = mysql_query($sql) or die(mysql_error());
									$name_category = mysql_fetch_array($exec, MYSQL_ASSOC);
									
									/* Controle das bandeiras dos artigos foi incluido neste arquivo. */
									require("manage_team_controle.php"); 									
						 ?>
						<?php $one_article['state'] = team_state($one_article); ?>
						<tr <?php echo $index%2?'class="normal"':'class="alt"'; ?> id="team-list-id-<?php echo $one_article['id']; ?>">
							<td><?php echo $one_article['id']; ?> <img alt="<?=$title?>" title="<?=$title?>" src="/media/css/i/<?=$bandeira?>" style="width: 22px;"> </td>
							<td><?php echo $one_article['title']?></td>
							<td><?php echo $name_category['name']; ?></td>
							<td><?php echo $status; ?></td> 
							<td class="op" nowrap>
							<!--<div style="float: left; margin-right: 2px;"><a  target="_blank" href="/index.php?id=<?php echo $one_article['id']; ?>"><img alt="Visualizar artigo" title="Visualizar artigo" src="/media/css/i/Monitoring.ico" style="width: 22px;"></a></div>-->
							<div style="float: left; margin-right: 2px;"><a href="/vipmin/magazine/edit-article.php?id=<?php echo $one_article['id']; ?>"><img alt="Editar artigo" title="Editar artigo" src="/media/css/i/editar.png" style="width: 22px;"></a></div>
							<div style="float: left; margin-right: 2px;"><a href="/ajax/manage.php?action=articleremove&id=<?php echo $one_article['id']; ?>" class="ajaxlink" ask="<?php echo utf8_encode("Você tem certeza que deseja apagar este artigo?"); ?>" ><img alt="Excluir" title="Excluir" style="width: 17px;" src="/media/css/i/excluir.png"></a></div>
							 </td>
						</tr>
						<?php }} ?>
						<?if(!$bregistro){?><tr><td colspan="15" style="text-align: center;">Nenhum registro encontrado. Redefina sua pesquisa</tr><? } ?>
						<tr><td colspan="15"><?php echo $pagestring; ?></tr>
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
		jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Deletando este Anúncio...</div>"});
	}  
  function processar(){
		jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Processando, aguarde...</div>"});
	}
 </script>
 
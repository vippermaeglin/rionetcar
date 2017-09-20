<?php  

$navegador = getNavegador();
$ORIGEM = "DETALHE";

/* É efetuado uma busca dos últimos artigos cadastrados no site. */
$sql = "select * from magazine_article where id_category = '" . $article['id_category'] . "' AND status = 'Y' order by rand() limit 5";
$rs = mysql_query($sql);
$row = mysql_num_rows($rs);

/* A $flag que decide se exibe ou não a div com os produtos relacionados. */
if($row >= 1)
{
	$flag = 1;
}else{
	$flag = 0;
}

/* É preparado a url do artigo que será exibido no topo. */
$title = retira_acento($article['title']);
$url = urlamigavel(tratanome($article['title']));
$url_category = urlamigavel(tratanome($category['name'])); 

/* Data é convertida para o formato pt-br. */
$datatemp = strtotime($article['created']);
$data = date('d/m/Y', $datatemp);

if(isset($article) && !(empty($article))){ ?> 
<div class="detalhe_principal_op"> 
<style>
.bannermeio {margin-left: 0px; width: 625px;}
</style>
 <div style="display:none;height:36px;" class="tips"><?=__FILE__?></div>
 	<div style="clear:both;height:7px;"></div>
		<div style="background: #fff; width:606px;padding-bottom:29px;width:936px;">   
			<div class="codanundetail">
			<p style="text-align:left;"><?php echo utf8_decode($article['title']); ?></p>
			<p style="margin-top:5px;font-size:12px;"><?php echo utf8_decode($article['subtitle']); ?></p>
			<p class="dataPublicacao">Data de publicação: <?php echo $data; ?></p>
			<hr class = "separador-artigos" />
			</div> 			
				<div style="clear:both;">
					<div class="last" style="float:left;padding:7px;color:#F58634;"> 
						<p style="margin-top:5px;"><a href="<?php echo $ROOTPATH; ?>/index.php">Home</a> > <a href="<?php echo $ROOTPATH; ?>/revistacategoria/<?php echo $category['id']; ?>/<?php echo $url_category;?>"><?php echo utf8_decode($category['name']); ?></a> > <a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $article['id']; ?>/<?php echo $url; ?>"><?php echo utf8_decode($article['title']); ?></a></p>
						<hr class = "separador-artigos" />
					</div> 
				</div> 
		</div>		
			<table cellpadding="0" cellspacing="0" border="0" width="947" bgcolor="#FFFFFF"> 
			 <tr>
				<td colspan="3" width="66%" valign="top" align="left">
			</div>			  
					<table cellpadding="0" cellspacing="0" border="0"> 
						 <tr>
							 <td colspan="3">
								<div class="descricaooferta"> 
									<img align="left" style="max-width:300px;margin-right:10px;" alt="<?php echo utf8_decode($article['title']); ?>" title="<?php echo utf8_decode($article['title']); ?>" src="<?php echo $ROOTPATH; ?>/media/<?php echo $article['image_article'];?>">
									<?php echo utf8_decode($article['content_article']); ?>
								</div>
							</td>
						 </tr>	 
						 <tr>
							 <td colspan="3">
								<?php if(!(empty($article['tip_article']))) { ?>
							 	<div class="dicaartigo">
									<img align="left"; style="max-width:170px;margin-left:5px;margin-right:15px;" src="<?php echo $ROOTPATH; ?>/include/logo/logo.png">
										<p style="padding-left:5px;margin-left:5px;font-size:14px;font-weight:600;"><?php echo utf8_decode($INI["system"]["sitename"])?></p>
										<p style="padding-left:5px;margin-left:5px;margin-top:5px;"><?php echo utf8_decode($article['tip_article']); ?></p>
								</div>
								<?php } ?>
								<div class="opcoesartigo">
									<a href="#" onclick="window.print();"><img align="left"; style="max-width:170px;margin-left:5px;margin-right:15px;" src="<?php echo $ROOTPATH; ?>/skin/padrao/images/print.png"><p>Imprimir</p></a>
								</div>
								<hr class = "separador-artigos-div" />
								<?php if($flag == 1){ ?>
								<div class="artigos-relacionados">
									<p>Artigos relacionados</p>
									<ul>
									<?php while($last = mysql_fetch_array($rs)) {
										  if($last['id'] != $article['id']){	
										  
										  /* Data é convertida para o formato pt-br. */
										  $datatemp = strtotime($last['created']);
										  $data = date('d/m/Y', $datatemp);
										  
										  $title = retira_acento($last['title']);
										  $url = urlamigavel(tratanome($last['title']));
									?>
										<li>
											<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $last['id']; ?>/<?php echo $url;?>"><img align="left" style="max-width:150px;margin-right:10px;" alt="<?php echo utf8_decode($last['title']); ?>" title="<?php echo utf8_decode($last['title']); ?>" src="<?php echo $ROOTPATH; ?>/media/<?php echo $last['image_article'];?>"></a>
											<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $last['id']; ?>/<?php echo $url;?>"><p style="font-size:14px;font-weight:600;"><?php echo utf8_decode($last['title']); ?></p></a>
											<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $last['id']; ?>/<?php echo $url;?>"><p style="margin-top:10px;font-size:13px;font-weight:600;"><?php echo utf8_decode($last['subtitle']); ?></p></a>
											<p class="dataRelacionados"><?php echo $data; ?></p>
										</li>
									<?php }} ?>
									</ul>
								</div>
								<?php } ?>
								<div class="descricaooferta">
									<?php  require_once(DIR_BLOCO."/bloco_comentarios_facebook.php"); ?> 
								</div>
								<div class="avisodireitos"><p><img src="<?php echo $ROOTPATH?>/skin/padrao/images/atention.png"> &nbsp; &nbsp;É proibida a reprodução de qualquer matérial publicado neste site entendendo-se por reprodução todas as formas possíveis de cópia e distribuição, salvo quando existir prévia autorização por escrito dos responsáveis.</p></div>
								</td>
						 </tr>
					 </table>
				</td>
				<td width="" valign="top"> &nbsp; </td>
				<!--COLUNA DE OFERTAS-->
				<td width="35%" valign="top">
					<?php  require_once(DIR_BLOCO."/coluna_direita_artigo.php"); ?>  
				</td>
			 </tr> 
			</table>

</div> 
<?php  
}
else{
	header("Location: " . $ROOTPATH . "/index.php");
} ?>
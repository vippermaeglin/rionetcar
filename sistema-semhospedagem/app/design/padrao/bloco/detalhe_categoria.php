<?php  

$navegador = getNavegador();
$ORIGEM = "DETALHE";

$per_page = 20;

if(isset($_GET['pagination']) and !empty($_GET['pagination'])){
	
	$page = trim(strip_tags($_GET['pagination']));
	$page = ($per_page * $page) - $per_page;
}else{
	$page = 0;
}

/* É buscado os artigos relacionados a categoria em questão. */
$sql = "select id, title, subtitle, image_cover from magazine_article where id_category = " . $idcategoria . " and status = 'Y' limit " . $page . " , " . $per_page;
$rsm = mysql_query($sql);
$rowm =  mysql_num_rows($rsm);

/* A $flag que decide se exibe ou não a div com os artigos das categorias. */
if($rowm >= 1)
{
	$flagm = 1;
}else{
	$flagm = 0;
}

/* É efetuado uma busca dos últimos artigos cadastrados no site. */
$sql = "select * from magazine_article where status = 'Y' order by created desc limit 5";
$rs = mysql_query($sql);
$row = mysql_num_rows($rs);

/* A $flag que decide se exibe ou não a div com os artigos relacionados. */
if($row >= 1)
{
	$flag = 1;
}else{
	$flag = 0;
}

if(isset($category) and !(empty($category))){ ?> 
<div class="detalhe_principal_op"> 
<style>
.bannermeio {margin-left: 0px; width: 625px;}
</style>
 <div style="display:none;height:36px;" class="tips"><?=__FILE__?></div>
 	<div style="clear:both;height:7px;"></div>
		<div style="background: #fff; width:606px;padding-bottom:29px;width:936px;">   
			<div class="codanundetail"><?php echo utf8_decode(strtoupper($category['name'])); ?></div> 			
				<div style="clear:both;">
					<div class="last" style="float:left;padding:7px;color:#F58634;"> 
						<hr class = "separador-artigos" />
						<p style="margin-top:15px;"><a href="<?php echo $ROOTPATH; ?>/index.php">Home</a> > <a href="<?php echo $ROOTPATH; ?>/revistacategoria/<?php echo $category['id']; ?>"><?php echo utf8_decode($category['name']); ?></a></p>
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
								<div class="container span-16 centralizar-imagem-container">
								<?php
									if($flagm == 1){
										while($magazine_category = mysql_fetch_array($rsm)){
										
											/* É preparado a url do artigo. */
											$title = retira_acento($magazine_category['title']);
											$url = urlamigavel(tratanome($magazine_category['title']));											
											$title = utf8_decode($title);										
								?>
									<div class="headline revista-slot span-8" id="headline1">										
										<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $magazine_category['id']; ?>/<?php echo $url; ?>" title="<?php echo $title; ?>" class="caption">
											<p style="font-size:12px;"><?php echo utf8_decode($magazine_category['subtitle']); ?></p>
										</a><a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $magazine_category['id']; ?>/<?php echo $url; ?>">
											<div class="outer-310x190">
												<div class="middle">
													<img width="310" height="190" alt="<?php echo $title; ?>" src="<?php echo $ROOTPATH; ?>/media/<?php echo $magazine_category['image_cover'];?>" class="inner lazy" style="display: inline;">
												</div>
											</div>
									</div>
								<?php
										}
									}
								?>
								</div>
							<?php if($flagm == 1) { ?><?php include(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . "/include/paginacao_magazine_category.php"); ?><?php } else {?>
								<p style="margin-left:5px; margin-top:30px;"><img src="<?php echo $ROOTPATH; ?>/skin/padrao/images/atention.png"> Não foi encontrado nenhum resultado para esta pesquisa.</p>
							<?php } ?>
							</td>
						 </tr>	 
						 <tr>
							 <td colspan="3">
								<hr class = "separador-artigos-div" />
								<?php if($flag == 1){ ?>
								<div class="artigos-relacionados">
									<p>Últimas notícias</p>
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
											<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $last['id']; ?>/<?php echo $url;?>"><img align="left" style="max-height:95px;max-width:120px;margin-right:10px;" alt="<?php echo utf8_decode($last['title']); ?>" title="<?php echo utf8_decode($last['title']); ?>" src="<?php echo $ROOTPATH; ?>/media/<?php echo $last['image_article'];?>"></a>
											<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $last['id']; ?>/<?php echo $url;?>"><p style="font-size:14px;font-weight:600;"><?php echo utf8_decode($last['title']); ?></p></a>
											<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $last['id']; ?>/<?php echo $url;?>"><p style="margin-top:10px;font-size:13px;font-weight:600;"><?php echo utf8_decode($last['subtitle']); ?></p></a>
											<p class="dataRelacionados"><?php echo $data; ?></p>
										</li>
									<?php }} ?>
									</ul>
								</div>
								<?php } ?>
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
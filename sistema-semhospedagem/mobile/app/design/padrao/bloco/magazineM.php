				<div style="display:none;" class="tips"><?=__FILE__?></div>
				<div class="titlePage">
					<p><?php echo utf8_decode($article['title']); ?></p>
				</div>
				<div class="descriptionArticle">
					<h2>
						<?php echo utf8_decode($article['title']); ?>
					</h2>
					<p class="resumeArticle">
						<?php echo utf8_decode($article['subtitle']); ?>
						<img alt="<?php echo utf8_decode($article['title']); ?>" title="<?php echo utf8_decode($article['title']); ?>" src="<?php echo $INI["system"]["wwwprefix"]; ?>/media/<?php echo $article['image_article'];?>">
					</p>
					<p class="textDescriptionArticle">
						<?php echo strip_tags(utf8_decode($article['content_article'])); ?>
					</p>
					<div class="tipArticle">
						<p class="tipArticleTitle">
							<?php echo utf8_decode($INI["system"]["sitename"])?>
						</p>
						<p>
							<img src="<?php echo $ROOTPATH; ?>/include/logo/logo.png" />
						</p>
						<p>
							<?php echo strip_tags(utf8_decode($article['tip_article'])); ?>
						</p>
					</div>
				</div>
			</div>
			<?php if($rowA > 1) { ?>
			<div class="row">
				<div class="relatedArticles">
					<h2>
						Artigos relacionados
					</h2>	
					<ul>
					<?php 
						
						while($last = mysql_fetch_array($rs)) {
						  
						  if($last['id'] != $article['id']){	
						  
							  $title = retira_acento($last['title']);
							  $url = urlamigavel(tratanome($last['title']));
					?>
						<li>
							<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $last['id']; ?>/<?php echo $url;?>"><img align="left" alt="<?php echo utf8_decode($last['title']); ?>" title="<?php echo utf8_decode($last['title']); ?>" src="<?php echo $INI['system']['wwprefix']; ?>/media/<?php echo $last['image_article'];?>"></a>
							<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $last['id']; ?>/<?php echo $url;?>"><p><?php echo utf8_decode($last['title']); ?></p></a>
							<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $last['id']; ?>/<?php echo $url;?>"><p><?php echo utf8_decode($last['subtitle']); ?></p></a>
						</li>
					<?php }} ?>
					</ul>					
				</div>
			</div>
			<?php } ?>
<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 

<?php

/* O bloco efetua a recuperação dos artigos destaques */
require_once(DIR_BLOCO_M."/buscanoticiasM.php");

?>
<div class="revistaMobile">
	<?php 
	foreach($articles as $article) { 
		
		$category = Table::Fetch('magazine_category', $article['id_category']);
		$title = retira_acento(strtolower($article['title']));
		$url = urlamigavel(tratanome($article['title']));	
	?>
	<div class="itemMagazineMobile">
	<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $article['id']; ?>/<?php echo $url; ?>">
		<span><?php echo $category['name']; ?></span>
		<p class="textMagazine">
			<?php echo utf8_decode($article['subtitle']); ?>
		</p>
	</a>
	<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $article['id']; ?>/<?php echo $url; ?>">
		<img title="<?php echo utf8_decode($article['title']); ?>" alt="<?php echo utf8_decode($article['title']); ?>" src="<?php echo $ROOTMEDIA; ?>/<?php echo $article['image_cover']; ?>">
	</a>
	</div>
	<?php } ?>
</div>
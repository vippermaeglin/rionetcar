<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 
<?php
	if($INI['option']['noticias'] != "N") {
?>
<?php

/* O bloco efetua a recuperação dos artigos destaques */
require_once(DIR_BLOCO."/buscanoticias.php");

?>
<div class="revista recentes mrg-auto-lr mrg-oh_gutter-t mrg-gutter-b c-after">

<?php foreach($articles as $article) { ?>
	<?php if($article['featured'] == "a1") { 
			$category = Table::Fetch('magazine_category', $article['id_category']);
			$title = retira_acento(strtolower($article['title']));
			$url = urlamigavel(tratanome($article['title']));	
	?>
	<div class="x1 m-r bg-red radius-0033 pull-left">
	<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $article['id']; ?>/<?php echo $url; ?>" class="caption nn">
		<span><?php echo $category['name']; ?></span>
		<h3 class="p"><?php echo utf8_decode($article['title']); ?></h3>
		<p class="p"><?php echo utf8_decode($article['subtitle']); ?></p>
	</a>
	<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $article['id']; ?>/<?php echo $url; ?>">
		<img title="<?php echo utf8_decode($article['title']); ?>" alt="<?php echo utf8_decode($article['title']); ?>" src="<?php echo $ROOTPATH; ?>/media/<?php echo $article['image_cover']; ?>">
	</a>
	</div>
<?php } } ?>

<div class="x2 pull-left">
<?php foreach($articles as $article) { ?>
	<?php if($article['featured'] == "a2") { 
			$category = Table::Fetch('magazine_category', $article['id_category']);
			$title = retira_acento(strtolower($article['title']));
			$url = urlamigavel(tratanome($article['title']));
	?>
<div class="bg-red radius-0033">
	<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $article['id']; ?>/<?php echo $url; ?>" class="caption nn">
		<span><?php echo $category['name']; ?></span>
		<h3><?php echo utf8_decode($article['title']); ?></h3>
		<p><?php echo utf8_decode($article['subtitle']); ?></p>
	</a>
	<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $article['id']; ?>/<?php echo $url; ?>">
		<img title="<?php echo utf8_decode($article['title']); ?>" alt="<?php echo utf8_decode($article['title']); ?>" src="<?php echo $ROOTPATH; ?>/media/<?php echo $article['image_cover']; ?>">
	</a>
</div>
<?php } } ?>

<?php foreach($articles as $article) { ?>
	<?php if($article['featured'] == "a3") { 
			$category = Table::Fetch('magazine_category', $article['id_category']);
			$title = retira_acento(strtolower($article['title']));
			$url = urlamigavel(tratanome($article['title']));
	?>
<div class="bg-red radius-0033">
	<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $article['id']; ?>/<?php echo $url; ?>" class="caption nn">
		<span><?php echo $category['name']; ?></span>
		<h3><?php echo utf8_decode($article['title']); ?></h3>
		<p><?php echo utf8_decode($article['subtitle']); ?></p>
	</a>
	<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $article['id']; ?>/<?php echo $url; ?>">
		<img title="<?php echo utf8_decode($article['title']); ?>" alt="<?php echo utf8_decode($article['title']); ?>" src="<?php echo $ROOTPATH; ?>/media/<?php echo $article['image_cover']; ?>">
	</a>
</div>
<?php } } ?>
</div>

<div class="x2 pull-left">
<?php foreach($articles as $article) { ?>
	<?php if($article['featured'] == "b2") { 
			$category = Table::Fetch('magazine_category', $article['id_category']);
			$title = retira_acento(strtolower($article['title']));
			$url = urlamigavel(tratanome($article['title']));
	?>
<div class="bg-red radius-0033">
	<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $article['id']; ?>/<?php echo $url; ?>" class="caption nn">
		<span><?php echo $category['name']; ?></span>
		<h3><?php echo utf8_decode($article['title']); ?></h3>
		<p><?php echo utf8_decode($article['subtitle']); ?></p>
	</a>
	<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $article['id']; ?>/<?php echo $url; ?>">
		<img title="<?php echo utf8_decode($article['title']); ?>" alt="<?php echo utf8_decode($article['title']); ?>" src="<?php echo $ROOTPATH; ?>/media/<?php echo $article['image_cover']; ?>">
	</a>
</div>
<?php } } ?>

<?php foreach($articles as $article) { ?>
	<?php if($article['featured'] == "b3") { 
			$category = Table::Fetch('magazine_category', $article['id_category']);
			$title = retira_acento(strtolower($article['title']));
			$url = urlamigavel(tratanome($article['title']));
	?>
<div class="bg-red radius-0033">
	<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $article['id']; ?>/<?php echo $url; ?>" class="caption nn">
		<span><?php echo $category['name']; ?></span>
		<h3><?php echo utf8_decode($article['title']); ?></h3>
		<p><?php echo utf8_decode($article['subtitle']); ?></p>
	</a>
	<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $article['id']; ?>/<?php echo $url; ?>">
		<img title="<?php echo utf8_decode($article['title']); ?>" alt="<?php echo utf8_decode($article['title']); ?>" src="<?php echo $ROOTPATH; ?>/media/<?php echo $article['image_cover']; ?>">
	</a>
</div>
<?php } } ?>
</div>

<?php foreach($articles as $article) { ?>
	<?php if($article['featured'] == "b1") { 
			$category = Table::Fetch('magazine_category', $article['id_category']);
			$title = retira_acento(strtolower($article['title']));
			$url = urlamigavel(tratanome($article['title']));
	?>
	<div class="x1 m-l bg-red radius-0033 pull-left c-after">
	<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $article['id']; ?>/<?php echo $url; ?>" class="caption nn">
		<span><?php echo $category['name']; ?></span>
		<h3 class="p"><?php echo utf8_decode($article['title']); ?></h3>
		<p class="p"><?php echo utf8_decode($article['subtitle']); ?></p>
	</a>
	<a href="<?php echo $ROOTPATH; ?>/revista/<?php echo $article['id']; ?>/<?php echo $url; ?>">
		<img title="<?php echo utf8_decode($article['title']); ?>" alt="<?php echo utf8_decode($article['title']); ?>" src="<?php echo $ROOTPATH; ?>/media/<?php echo $article['image_cover']; ?>">
	</a>
	</div>
<?php } } ?>
</div>
<?php } ?>
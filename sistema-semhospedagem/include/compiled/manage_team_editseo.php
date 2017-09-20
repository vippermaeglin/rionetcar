<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="leader">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_team('team'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
				<?php if($team['id']){?>
					<h2>Editar oferta</h2>
					<ul class="filter"><?php echo current_manageteam('editseo', $team['id']); ?></ul>
				<?php } else { ?>
					<h2>Criar novas ofertas</h2>
				<?php }?>
				</div>
                <div class="sect">
				<form id="-user-form" method="post" action="/vipmin/team/editseo.php?id=<?php echo $team['id']; ?>" enctype="multipart/form-data" class="validator">
					<input type="hidden" name="id" value="<?php echo $team['id']; ?>" />
					<div class="wholetip clear"><h3>1、SEO</h3></div>
					<div class="field">
						<label>SEO titulo</label>
						<input type="text" size="30" name="seo_title" id="team-create-title" class="f-input" value="<?php echo $team['seo_title']; ?>" />
					</div>
					<div class="field">
						<label>SEO palavras-chave</label>
						<input type="text" size="30" name="seo_keyword" id="team-create-keyword" class="f-input" value="<?php echo $team['seo_keyword']; ?>" />
					</div>
					<div class="field">
						<label>SEO descrição</label>
						<div style="float:left;"><textarea cols="45" rows="5" name="seo_description" id="team-create-description" class="f-textarea"><?php echo htmlspecialchars($team['seo_description']); ?></textarea></div>
					</div>
					<input type="submit" value="OK，submit" name="commit" id="leader-submit" class="formbutton" style="margin:10px 0 0 120px;"/>
				</form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>
<div id="sidebar">
</div>

</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->



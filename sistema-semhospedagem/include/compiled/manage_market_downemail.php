<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_market('downemail'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
					<h2><?= utf8_encode("Relatório de emails")?> </h2>
					<ul class="filter"><?php echo mcurrent_market_down('downemail'); ?></ul>
				</div>
                <div class="sect">
                    <form method="post" target="_blank">
                        <div class="field">
                            <label>Cidades</label>
							<div style="padding-top:8px;"><?php if(is_array($allcities)){foreach($allcities AS $one) { ?><input type="checkbox" name="city_id[]" value="<?php echo $one['id']; ?>" checked />&nbsp;<?php echo $one['name']; ?>&nbsp;&nbsp;<?php }}?><input type="checkbox" name="city_id[]" value="0" checked>&nbsp;Other</div>
						</div>

						
                        <div class="field">
                            <label>Origem</label>
							<div style="padding-top:8px;"><input type="checkbox" name="source[]" value="user" checked />&nbsp;<?= utf8_encode("Usuário de cadastro")?>&nbsp;&nbsp;<input type="checkbox" name="source[]" value="subscribe" checked>&nbsp;<?= utf8_encode("Usuário de newsletter")?></div>
						</div>
						
                        <div class="act">
                            <input type="submit" value="download" name="commit" class="formbutton"/>
                        </div>
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



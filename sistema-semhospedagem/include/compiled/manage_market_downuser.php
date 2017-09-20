<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_market('down'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
					<h2><?= utf8_encode("Relatório de Usuários")?> </h2>
					<ul class="filter"><?php echo mcurrent_market_down('downuser'); ?></ul>
				</div>
                <div class="sect">
                    <form method="post" target="_blank">
					
					     <div class="field">
                            <label>Cidades</label>
							<div style="padding-top:8px;"><?php if(is_array($allcities)){foreach($allcities AS $one) { ?><input type="checkbox" name="city_id[]" value="<?php echo $one['id']; ?>" checked />&nbsp;<?php echo $one['name']; ?>&nbsp;&nbsp;<?php }}?><input type="checkbox" name="city_id[]" value="0" checked>&nbsp;Other</div>
						</div>
						
					  <div class="field">
                            <label>Com pedidos</label>
							<div style="padding-top:8px;"><input type="checkbox" name="newbie[]" value="Y" checked />&nbsp;Pendentes&nbsp;&nbsp;<input type="checkbox" name="newbie[]" value="N" checked>&nbsp;Pagos</div>
						</div>

                        <div class="field">
                            <label>Sexo</label>
							<div style="padding-top:8px;"><input type="checkbox" name="gender[]" value="M" checked />&nbsp;Masculino&nbsp;&nbsp;<input type="checkbox" name="gender[]" value="F" checked>&nbsp;Feminino</div>
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



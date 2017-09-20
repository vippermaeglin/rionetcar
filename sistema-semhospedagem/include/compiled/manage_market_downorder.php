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
					<h2><?= utf8_encode("Relatório de pedidos")?> </h2>
					<ul class="filter"><?php echo mcurrent_market_down('downemail'); ?></ul>
				</div>
                <div class="sect">
                    <form method="post" target="_blank">
					
					 <div class="field">
                            <label>ID da Oferta</label>
							<input type="text" name="team_id" require="true" datatype="number" class="number" /><span class="inputtip">Por favor, insira o id das ofertas separados por , (virgula)</span>
						</div>
						 
                        <div class="field">
                            <label>Status</label>
							<div style="padding-top:8px;"><input type="checkbox" name="state[]" value="pay" checked />&nbsp;pago&nbsp;&nbsp;<input type="checkbox" name="state[]" value="unpay" checked>&nbsp;pendente</div>
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



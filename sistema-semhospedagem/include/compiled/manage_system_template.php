<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('template'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Editando Templates</h2></div>
                <div class="sect">
                    <form method="post">
						<div class="wholetip clear"><h3>include/template/ só poderam ser arquivos com permissão de escrita para que está funcionalidade funcione.</h3></div>
						<div class="field">
							<label>Selecione</label>
							<select name="template_id" id="manage_system_template_id" class="f-input" onchange="X.manage.loadtemplate(this.options[this.selectedIndex].value);"><?php echo Utility::Option($may, $template_id, '-'); ?></select>
						</div>
					<?php if($content||$template_id){?>
						<div class="field">
							<label>Contéudo</label>
							<div style="float:left;"><textarea cols="90" rows="25" name="content"><?php echo htmlspecialchars($content); ?></textarea></div>
						</div>
					<?php }?>
                        <div class="act">
                            <input type="submit" value="salvar" name="commit" class="formbutton"/>
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




<?php


?>

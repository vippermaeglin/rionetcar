<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('skin'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Tema do sistema</h2></div>
                <div class="sect">
                    <form method="post">
                        <div class="field">
                            <label>Skin</label>
							<select name="skin[template]" class="f-input" style="width:200px;"><?php echo Utility::Option(ZSystem::GetTemplateList(), $INI['skin']['template']); ?></select>
							<span class="hint">Todos as Skins devem ser instaladas no diretório [<?php echo DIR_ROOT; ?>/template] ，somente a skin padrão suporta a troca</span>
                        </div>
                        <div class="field">
                            <label>Tema</label>
							<select name="skin[theme]" class="f-input" style="width:200px;"><?php echo Utility::Option(ZSystem::GetThemeList(), $INI['skin']['theme']); ?></select>
							<span class="hint">Todos os temas devem ser instalados no diretório [<?php echo WWW_ROOT; ?>/media/theme] , somente o thema padrão suporta a troca</span>
                        </div>
                        <div class="act">
                            <input type="submit" value="Salvar" name="commit" class="formbutton"/>
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



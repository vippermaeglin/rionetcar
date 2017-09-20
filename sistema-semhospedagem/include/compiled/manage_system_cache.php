<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('cache'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
					<h2>Configurações deCache （apenas suportados pelo Memcache）</h2>
					<ul class="filter">
						<li><a href="/ajax/manage.php?action=cacheclear" class="ajaxlink">Limpar cache</a></li>
					</ul>
				</div>
                <div class="sect">
                    <form method="post">
						<div class="wholetip clear">
							<h3>Formato 127.0.0.1:11211:100; Se o Memcache não estiver instalado deixe em branco/h3>
						</div>
						<div style="margin:0 20px;">
							<p>127.0.0.1 é o IP do Memcache.</p>
							<p>11211 é a porta do Memcache.</p>
							<p>100 é um peso, que deve sempre ser maior que 0.</p>
						</div>
						<div class="wholetip clear"><h3>1、 Servidor Cache</h3></div>
                        <div class="field">
                            <label>Servidor 1</label>
                            <input type="text" size="30" name="memcache[]" class="f-input" value="<?php echo $INI['memcache'][0]; ?>"/>
                        </div>
                        <div class="field">
                            <label>Servidor 2</label>
                            <input type="text" size="30" name="memcache[]" class="f-input" value="<?php echo $INI['memcache'][1]; ?>"/>
                        </div>
                        <div class="field">
                            <label>Servidor 3</label>
                            <input type="text" size="30" name="memcache[]" class="f-input" value="<?php echo $INI['memcache'][2]; ?>"/>
                        </div>
                        <div class="field">
                            <label>Servidor 4</label>
                            <input type="text" size="30" name="memcache[]" class="f-input" value="<?php echo $INI['memcache'][3]; ?>"/>
                        </div>

                        <div class="act">
                            <input type="submit" value="Save" name="commit" class="formbutton"/>
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

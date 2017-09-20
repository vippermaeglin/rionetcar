<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_market('index'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Email marketing</h2></div>
                <div class="sect">
                    <form method="post" class="validator">
						<div class="field">
							<label>Titulo</label>
							<input type="text" name="title" class="f-input" value="<?php echo $title; ?>" datatype="require" require="true"/>
						</div>
						<div class="field">
							<label>E-mail</label>
							<input type="text" name="emails" style="width:700px;height:25px;" datatype="require" require="true">
							<span class="hint">Use virgula, espaço ou uma nova linha por e-mail, máxmo por envio de 20 usuários</span>
						</div>
						<div class="field">
							<label>Conteúdo do e-mail</label>
							<div style="float:left;"><textarea style="width:700px;height:450px;" class="editor text" id="editemail" name="content"><?php echo htmlspecialchars($_POST['content']); ?></textarea></div>
						</div>
                        <div class="act">
                            <input type="submit" value="Enviar mala-direta" name="commit" class="formbutton"/>
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

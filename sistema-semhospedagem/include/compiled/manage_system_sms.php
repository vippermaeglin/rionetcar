<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('sms'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Configuração de SMS</h2></div>
                <div class="sect">
                    <form method="post">
					  <div class="field">
                            <label>Chave SMS</label>
                            <input type="text" size="30" name="sms[user]" class="f-input" value="<?php echo $INI['sms']['user']; ?>" style="width:200px;" />  
							<span class="inputtip"><font color="red">Se você ainda não tem uma chave, entre em contato no endereço  <a target="_blank" href="http://sms.mapainformatica.com.br">http://sms.mapainformatica.com.br</a>
							e veja o plano que está mais de acordo com a sua nescessidade.</font><br>  <a target="_blank" href="http://sms.mapainformatica.com.br/"> Clique aqui </a> para acessar o site da empresa responsável.</span>
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


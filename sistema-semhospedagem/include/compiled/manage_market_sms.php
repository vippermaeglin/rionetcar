<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_market('sms'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>SMS MARKETING</h2></div>
			 
				<?php  if($INI['sms']['user'] != ""){ ?>
					
                <div class="sect"> 
                    <form method="post" class="validator">
                        <div class="field">
                            <label>Celular</label>
							<div style="float:left;"><input type="text" style="width:500px;" name="phones" datatype="require" require="true"> </div>
							<span class="hint">Use virgula, espaço ou uma nova linha para cada diferente número de celular, em um máximo de 300 números.</span>
                        </div>

                        <div class="field">
                            <label>SMS conteúdo</label>
							<div style="float:left;"><input type="text" style="width:500px;"   id="sms-content-id"   name="content"   datatype="require" require="true" onkeyup='return X.misc.smscount();'></div>
							<span class="hint">Um SMS tem 70 caracteres. Uma unica letra é um caracter. Você já usou &nbsp;<span id="span-sms-length-id" style="color:red;font-weight:bold;font-size:14px;">0</span>&nbsp; caracteres &nbsp;<span id="span-sms-split-id" style="color:red;font-weight:bold;font-size:14px;">0</span>&nbsp; SMS</span>
                        </div>

                        <div class="act">
                            <input type="submit" value="Enviar" name="commit" class="formbutton"/>
                        </div>
                    </form>
                </div>
				<?php }  else{?>
					
				<div class="sysmsgw" id="sysmsg-success"><div class="sysmsg"><p>Você ainda não tem uma chave para poder enviar SMS Marketing</p><span class="close">Fechar</span></div></div> 

				
				 <div class="sect">
                    <form method="post" class="validator">
                        <div class="field"> 
							<span class="inputtip">Entre em contato no endereço <a href="http://www.tkstore.com.br/torpedos"> http://www.tkstore.com.br/torpedos</a>  </span>
							<span class="inputtip">e veja o plano que está mais de acordo com a sua nescessidade. </span>
							<span class="inputtip"><a href="http://www.tkstore.com.br/torpedos"> Clique aqui </a> e veja como funciona</span>
							
                          <span class="inputtip">  Após receber sua chave, <a href="<?php echo $INI['system']['wwwprefix']?>/vipmin/system/sms.php">clique aqui </a> para informar a sua chave no campo especificado.</span>
                         </div>
 
                    </form>
                </div>
				
				
			    <? }?>
				
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

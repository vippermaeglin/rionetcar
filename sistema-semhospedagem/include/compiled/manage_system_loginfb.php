<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('index'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Redes Sociais</h2></div>
                <div class="sect">
                    <form method="post">  
						<div class="wholetip clear"><h3>Login e Permissões de Escrita no Mural do Facebook</h3></div>
						<span class="inputtip">O jeito mais fácil e rápido de divulgar suas ofertas. <span style="color:orange;">É necessário você criar uma aplicação para usar o login do facebook, é simples, irá gastar apenas 30 segundos</span>. Para isso <a target="_blank" href="http://developers.facebook.com/setup/">clique aqui</a></span>
						<span class="inputtip">Quando finalizar o cadastro, veja a imagem para identificar o seu app_id e secret<a target="_blank" href="/media/css/i/ajuda_app.jpg"> clique aqui</a>  </span>
						<span class="inputtip">Note que o usuário deve permitir a escrita, caso contrário, não será enviado nenhuma informação em seu profile.  </span>
						<br>
						<span class="inputtip"> <a target="_blank" href="/configuracao_plugin_facebook.docx"> Tutorial completo de configuração</a>    </span>
                        <div class="field">
                            <label>Secret </label>
                            <input type="text" size="30" name="other[admin_id_login]" class="f-input" value="<?php echo  $INI['other']['admin_id_login'] ; ?>"/>
							 <span class="inputtip">Algo como: 127097849026839 (Atenção: Não é o seu profile e nem sua página do facebook). Deixe em branco para não usar o login com facebook.</span>
						</div>
                        <div class="field">
                            <label>App_id  </label>
                            <input type="text" size="30" name="other[app_id_login]" class="f-input" value="<?php echo  $INI['other']['app_id_login'] ; ?>"/>
							 <span class="inputtip">diferente do App_id dos comentários.</span>
							 <span class="inputtip">Algo como: 356647589346334  (Atenção: Não é o seu profile e nem sua página do facebook). Deixe em branco para não usar o login com facebook.</span>
						  </div>
					  
						<input type="hidden" size="30" name="other[admin_id]" value="<?php echo $INI['other']['admin_id']; ?>"/>
						<input type="hidden" size="30" name="other[app_id]" value="<?php echo $INI['other']['app_id']; ?>"/> 
						<input type="hidden" size="30" name="pg" value="<?php echo $_REQUEST['pg'] ?>"/>
						<input type="hidden" size="30" name="other[twitter]" value="<?php echo $INI['other']['twitter']; ?>"/>
						<input type="hidden" size="30" name="other[facebook]" value="<?php echo $INI['other']['facebook']; ?>"/>
						<input type="hidden" size="30" name="other[box-facebook]" value="<?php echo $INI['other']['box-facebook']; ?>"/>
						<input type="hidden" size="30" name="other[usuario_twitter]" value="<?php echo $INI['other']['usuario_twitter']; ?>"/>
						<input type="hidden" size="30" name="other[orkut]" value="<?php echo $INI['other']['orkut']; ?>"/> 
						
						<!-- cores -->
						<input type="hidden"  name="other[colormenusuperior]"   value="<?php echo $INI['other']['colormenusuperior']; ?>"  /> 
						<input type="hidden"  name="other[colormenusuperiorhover]"   value="<?php echo $INI['other']['colormenusuperiorhover']; ?>"  /> 
						<input type="hidden"  name="other[colormenusuperiorborder]"   value="<?php echo $INI['other']['colormenusuperiorborder']; ?>"  /> 
						<input type="hidden"  name="other[colortitulocidade]"   value="<?php echo $INI['other']['colortitulocidade']; ?>"  /> 
						<input type="hidden"   name="other[colorfundocidades]"  value="<?php echo $INI['other']['colorfundocidades']; ?>"  /> 
						<input type="hidden"   name="other[color_fundo_laterais_rodape]"   value="<?php echo $INI['other']['color_fundo_laterais_rodape']; ?>"  /> 
						<input type="hidden"   name="other[color_fundo_meio_rodape]"   value="<?php echo $INI['other']['color_fundo_meio_rodape']; ?>"  /> 


							  
						 
						<div class="act">
                            <input type="submit" value="salvar" name="commit" class="formbutton" />
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

<script>

function verlayout(){

}

</script>
<?php 

?>

<?php include template("manage_header");?>
<style>

#content.mainwide .field {
   
    width: 700px;
}

</style>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('pay'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Divulgador Automático de Ofertas via RSS app connect</h2></div>
                <div class="sect">
                    <form method="post">
					<?php $index=0;; ?>
					   
					 <div class="wholetip clear"><h3><?php echo ++$index; ?>. <img style="width:184px;" src="/media/agregadores/facebook.jpg">  </h3></div>
                      <div class="field">
                        <a href="javascript:atualizar('rss')">Clique aqui</a> para atualizar o xml do rss  <span id="rss"></span>
                        <div class="inputtip">
                        <br /><b>Informações:</b>
                        Leia o artigo em nosso Wiki em <a target="blank" href="http://www.sistemacomprascoletivas.com.br/mediawiki/index.php?title=Enviando_suas_ofertas_para_o_Facebook">Enviando suas ofertas para o Facebook</a>  para fazer o passo a passo e concluir a integração.<br />
                         </div>
                     </div>		
					<div class="wholetip clear"><h3><?php echo ++$index; ?>. <img style="width:184px;" src="/media/agregadores/twitterfeed.jpg">  </h3></div>
                        <div class="field">
                        <a href="javascript:atualizar('rss')">Clique aqui</a> para atualizar o xml do rss  <span id="rss"></span>
							<div class="inputtip">
							<br /><b>Informações:</b>
							Acesse  <a target="blank" href="http://www.twitterfeed.com">http://www.twitterfeed.com<br /></a>
							O  endereço que você deve informar no campo url do feed é: <?=$INI['system']['wwwprefix']?>/agregadores/xml/rss.xml 
							</div>
						</div>	 
                    </form>
                </div>
			<div class="box-bottom" style="margin-top:65px;"></div>
            </div> 
        </div>
	</div>

<div id="sidebar">
</div>

 
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->


<script>

 
function atualizar(tipo){
	
jQuery("#"+tipo).html("<img style=margin-left:50px; src=<?=$INI['system']['wwwprefix']?>/skin/padrao/images/ajax-loader2.gif> Gerando...");
	
	
$.get("<?=$INI['system']['wwwprefix']?>/agregadores/gera_xml_"+tipo+".php",
 			
   function(data){
	 jQuery("#"+tipo).html("");
     alert("xml atualizado com sucesso");
   });
}
</script> 


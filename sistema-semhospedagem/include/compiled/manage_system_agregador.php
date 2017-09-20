<?php include template("manage_header");?>
<style>

#content.mainwide .field {
   
    width: 700px;
}

</style>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner"> 
	<div id="content" class="clear mainwide">
        <div class="clear box"> 
            <div class="box-content">
				 <div class="option_box">
						<div class="top-heading group"> <div class="left_float"><h4>Agregadores de Oferta</h4></div> </div> 
				  
					<div class="sect">
						<form method="post"> 
						  
						<div class="wholetip clear"><h3> <img style="width:184px;" src="/media/agregadores/agrupi.png">  </h3></div>
							<div class="field"> 
							<div class="inputtip">
							<br /><b>Informações:</b>
							Não é necessário atualizar esse xml, O agrupi fará isso pra você. Para isso, faça um simples cadastro em <a target="blank" href="http://www.agrupi.com">Agrupi</a>  clicando em Anuncie suas Ofertas<br />
							 </div>
						 </div>	
						  
						<div class="wholetip clear"><h3> <img style="width:184px;" src="/media/agregadores/logo_apontaofertas.jpg"></h3></div>
							<div class="field">
							<a href="javascript:atualizar('apontaofertas')">Clique aqui</a> para atualizar o xml de ofertas  <span id="apontaofertas"></span>
							<br /><div class="inputtip">O  endereço que você deve informar ao agregador é: <?=$INI['system']['wwwprefix']?>/agregadores/xml/apontaofertas.xml 
							<br /><b>Informações:</b>
							Acesse o endereço: <a target="_blank" href="http://www.apontaofertas.com.br/parceiros"> http://www.apontaofertas.com.br/parceiros</a>
							 
							</div>
						 </div>		

						<div class="wholetip clear"><h3> <img style="width:184px;" src="/media/agregadores/logo-valejunto.png"> </h3></div>
							<div class="field">
							<a href="javascript:atualizar('valejunto')">Clique aqui</a> para atualizar o xml de ofertas  <span id="valejunto"></span>
							<br /><div class="inputtip">O  endereço que você deve informar ao agregador é: <?=$INI['system']['wwwprefix']?>/agregadores/xml/valejunto.xml 
							<br /><b>Informações:</b>
							Acesse o endereço:  <a target="_blank" href="http://www.valejunto.com.br">http://www.valejunto.com.br</a>
							 
							</div>
						 </div>
			
						<div class="wholetip clear"><h3> <img style="width:184px;" src="/media/agregadores/logo-dsconto.png"> </h3></div>
							<div class="field">
							<a href="javascript:atualizar('dsconto')">Clique aqui</a> para atualizar o xml de ofertas  <span id="dsconto"></span>
							<br /><div class="inputtip">O  endereço que você deve informar ao agregador é: <?=$INI['system']['wwwprefix']?>/agregadores/xml/dsconto.xml 
							<br /><b>Informações:</b>
							Acesse o endereço:  <a target="_blank" href="http://www.dsconto.com/suas-ofertas-aqui"> http://www.dsconto.com/suas-ofertas-aqui</a>
							 
							</div>
						 </div>		

						<div class="wholetip clear"><h3> <img style="width:184px;" src="/media/agregadores/popofertas.png"> </h3></div>
							<div class="field">
							<a href="javascript:atualizar('pop')">Clique aqui</a> para atualizar o xml de ofertas  <span id="pop"></span>
							<br /><div class="inputtip">O  endereço que você deve informar ao agregador é: <?=$INI['system']['wwwprefix']?>/agregadores/xml/pop.xml 
							<br /><b>Informações:</b>
							Acesse o endereço: <a target="_blank" href="http://popofertas.com.br/parceria"> http://popofertas.com.br/parceria</a>
							 
							</div>
						 </div>		
						 
						 <div class="wholetip clear"><h3> <img style="width:184px;" src="/media/agregadores/todasdodia.png"> </h3></div>
							<div class="field">
							<a href="javascript:atualizar('todasdodia')">Clique aqui</a> para atualizar o xml de ofertas  <span id="todasdodia"></span>
							<br /><div class="inputtip">O  endereço que você deve informar ao agregador é: <?=$INI['system']['wwwprefix']?>/agregadores/xml/todasdodia.xml 
							<br /><b>Informações:</b>
							Acesse o endereço: <a target="_blank" href="www.todasdodia.com.br/anuncie"> http://www.todasdodia.com.br/anuncie</a>
							 
							</div>
						 </div>	

						<div class="wholetip clear"> <a target="_blank" href="http://uniaodeofertas.com.br/add-new"><img style="width:184px;" src="/media/agregadores/logo_uniao-de-ofertas.jpg"></a>  <h3>(direto no site)</h3></div>
							<div class="field">  
							<br /><b>Informações:</b>
									Acesse o endereço: <a target="_blank" href="http://uniaodeofertas.com.br/add-new">http://uniaodeofertas.com.br/add-new</a>
							 </div>
						 </div>	

						<div class="wholetip clear"> <a target="_blank" href="http://www.mardecupons.com.br/ParceiroCadastro.aspx"><img style="width:134px;" src="/media/agregadores/logo_mardecupons.png"></a>  <h3>(direto no site)</h3></div>
							<div class="field">  
							<br /><b>Informações:</b>
									Acesse o endereço: <a target="_blank" href="http://www.mardecupons.com.br/ParceiroCadastro.aspx">http://www.mardecupons.com.br/ParceiroCadastro.aspx</a>
							 </div>
						 </div>
                     </div>
                     
                      <div style="display:none;" class="wholetip clear"><h3> Saveal - (Ainda não validado)</h3></div>
                        <div style="display:none;" class="field">
                        <a href="javascript:atualizar('saveall')">Clique aqui</a> para atualizar o xml de ofertas  <span id="saveall"></span>
                        <br /><div class="inputtip">O  endereço que você deve informar ao agregador é: <?=$INI['system']['wwwprefix']?>/agregadores/xml/saveall.xml 
                        <br /><b>Informações:</b>   http://www.saveall.com.br/contact.php
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


<?php include template("manage_header");?>
 
<div id="bdw" class="bdw">
<div id="bd" class="cf" style="margin-top:-52px;">
<div id="partner"> 
	<div id="content" class="clear mainwide">
        <div class="clear box"> 
            <div class="box-content">
			 <div class="option_box">
					<div class="top-heading group"> <div class="left_float"><h4>Programa de Afiliados</h4></div> </div> 
						<div class="sect">
						<form method="post">
	 
					   <div class="field"> 
							<div class="inputtip"> 
							<img style="" src="/media/afiliados/imgFluxo.png"><br>
							 <br>Um programa de afiliados nada mais é que uma empresa que faz a relação entre anunciantes e donos de sites, visando compra e venda de publicidade. Um programa de afiliados, pode possuir campanhas dos seguintes tipos:
							- CPC - Custo por clique, é quando os anunciantes do programa de afiliados pagam por cada clique em um link ou banner;
							- CPM - Custo por Mil, é quando os anunciantes do programa de afiliados pagam a cada mil visualizações de seus banners;
							- CPA - Custo por Ação, é quando os anunciantes do programa de afiliados pagam por cada ação que o leitor toma acessando através de um banner ou link presente em um determinado site. Uma ação por exemplo seria realizar um cadastro.
							</div>
						</div>	
						 
						 <div class="wholetip clear"><h3><?php echo ++$index; ?>. <img style="width:184px;" src="/media/afiliados/afilio.png">  </h3></div>
						  <div class="field">
							<a target="_blank" href="http://www.afilio.com.br">acessar o site www.afilio.com.br</a>  
							<div class="inputtip">
								<br /><b>Informações:</b>
								Afiliads é uma rede de publicidade que trabalha com o CPC (Custo por Clique). Após o webmaster ou blogger ser aceito na rede, é disponibilizada a tag para que o mesmo coloque em seu blog o site banners dos anunciantes da Afiliads, e a rentabilização é feita sempre que um clique único é efetuado em um desses banners. 
							 </div>
						 </div>		

							<div class="wholetip clear"><h3><?php echo ++$index; ?>. <img style="width:184px;" src="/media/afiliados/logo_americanas.jpg">  </h3></div>
							<div class="field">
							 <a target="_blank" href="http://carrinho.americanas.com.br">acessar o site carrinho.americanas.com.br</a>  
								<div class="inputtip">
								<br /><b>Informações:</b>
								O afiliados Americanas é ideal para ganhar dinheiro em seu site/blog. Uma das maiores plataformas de afiliação de comércio eletrônico existente, a Americanas.com paga por comissão sobre qualquer venda efetuada de internautas que vieram de seu site. As comissões variam e podem chegar até 6% e a empresa disponibiliza aos consumidores um catálogo com mais de 220 mil produtos. É um programa de afiliados típico para este tipo de loja de comércio eletrônico.
								</div>
							</div>	

						<div class="wholetip clear"><h3><?php echo ++$index; ?>. <img style="width:184px;" src="/media/afiliados/lomadee.jpg"></h3></div>
							<div class="field">  
							   <a target="_blank" href="http://www.lomadee.com">acessar o site www.lomadee.com</a>  
							   <br /><b>Informações:</b>
								Esta rede de publicidade possui várias campanhas na qual o afiliado pode se inscrever na que for de seu interesse. Tais campanhas trabalham com CPC, CPM e CPA. Interessante forma de publicidade, uma vez que o afiliado escolhe o programa que lhe agrada. </div>		

						<div class="wholetip clear"><h3><?php echo ++$index; ?>. <img style="width:184px;" src="/media/afiliados/logo-submarino.gif"> </h3></div>
							<div class="field">
							<a target="_blank" href="http://afiliados.submarino.com.br/affiliates">acessar o site afiliados.submarino.com.br</a> 
							<br /><b>Informações:</b>
								O programa de afiliados Submarino é um dos mais utilizados actualmente no mercado do Brasil. Ela oferece um programa de afiliação por comissão, sendo que o valor percentual é variável conforme a área de negócio em causa. O mínimo são 2% e o máximo são 8%. Além disso, no Submarino afiliados ao atingir R$50 você poderá solicitar o pagamento do seu dinheiro</div>
							</div>
						
			
						<div class="wholetip clear"><h3><?php echo ++$index; ?>. <img style="width:184px;" src="/media/afiliados/Compra-Facil.jpg"> </h3></div>
							<div class="field">
							 <a target="_blank" href="http://rise.postaffiliatepro.com/affiliates/signup.php#SignupForm">acessar o site  rise.postaffiliatepro.com</a>
							<br /><b>Informações:</b>
							Seu negócio se torna muito mais competitivo e rentável. Você pode escolher quais produtos ou categorias quer expor, de acordo com o perfil do seu público, o que aumenta ainda mais os seus ganhos
							São dezenas de lojas com cerca de 700 mil produtos dentro do seu site. A imagem do seu negócio será vinculada à melhor empresa de comércio eletrônico do Brasil
							</div>
					

						<div class="wholetip clear"><h3><?php echo ++$index; ?>. <img style="width:184px;" src="/media/afiliados/apetrexo.jpg"> </h3></div>
							<div class="field">
							<a target="_blank" href="http://apetrexosocialcommerce.postaffiliatepro.com/affiliates/signup.php#SignupForm">acessar o site http://apetrexosocialcommerce.postaffiliatepro.com</a>
								<br /><b>Informações:</b>
								O site disponibiliza cerca de 6 mil produtos em diversas categorias, existem diferentes modelos de banners que você deve escolher para digulgar no seu site. Através da ferramenta você recebe todas as notificações importantes sobre seu negócio. Dentro da sua página inicial, estará sua extensão de afiliado. Você deverá usá-la junto a URL que deseja divulgar em seu site.
							</div>
						 </div>	
	  
						</form>
							</div>
						</div>
					</div>
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


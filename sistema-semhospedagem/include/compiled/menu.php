<script type="text/javascript">
$(function() {
  if ($.browser.msie && $.browser.version.substr(0,1)<7)
  {
	$('li').has('ul').mouseover(function(){
		$(this).children('ul').show();
		}).mouseout(function(){
		$(this).children('ul').hide();
		})
  }
});        
</script>

<ul id="menu">  
<li><a href="/vipmin/misc/index.php">Painel</a>  </li>  
<li><a href="/vipmin/misc/index.php">Gerenciar</a>
	 <ul>  
		<li> <a target="_blank" href="/index.php"><?=utf8_encode("Visualizar Site")?></a> </li> 
		<li> <a href="/vipmin/misc/feedback.php"><?=utf8_encode("Contatos")?></a> </li>    
		<li> <a href="/vipmin/misc/subscribe.php"><?=utf8_encode("Inscritos")?></a> </li>  								
	</ul>
</li>
	 
<li><a href="#">Layout</a>
	 <ul>
		<li> <a href="/vipmin/system/logo.php"><?=utf8_encode("Alterar Logo")?></a> </li> 
		<li> <a href="/vipmin/system/background.php"><?=utf8_encode("Alterar Background")?></a> </li>   
		<? if(file_exists(WWW_MOD."/bannerrotativo.inc")){?><li> <a href="/vipmin/system/banners.php"><?=utf8_encode("Banners Slideshow")?></a> </li> <? } ?>
		<li> <a href="/vipmin/system/cores.php"><?=utf8_encode("Alterar Cores")?></a> </li> 
		<li> <a href="/vipmin/system/imagens.php"><?=utf8_encode("Gerenciar Imagens")?></a></li>		 
	</ul>
 </li> 
<li>
	<a href="/vipmin/team/index.php"><?=utf8_encode("Anúncios")?></a>
	<ul> 
		<li>
			<a href="/vipmin/team/edit.php"><?=utf8_encode("Criar Anúncio")?> </a>       
			<a href="/vipmin/team/index.php"><?=utf8_encode("Consultar Anúncios")?> </a>    
		</li>
		<li>
			<a href="/vipmin/category/editfabricantes.php"><?=utf8_encode("Criar Fabricante")?> </a>       
			<a href="/vipmin/category/indexfabricantes.php"><?=utf8_encode("Consultar Fabricantes")?> </a>    
		</li>
		<li>
			<a href="/vipmin/category/editmodelos.php"><?=utf8_encode("Criar Modelo")?> </a>       
			<a href="/vipmin/category/indexmodelos.php"><?=utf8_encode("Consultar Modelos")?> </a>    
		</li>
	</ul>
</li>
<li>
	<a href="/vipmin/team/index.php"><?=utf8_encode("Relatórios")?></a>
	<ul> 
		<li>
			<a href="/vipmin/reports/index.php"><?=utf8_encode("Cliques")?></a>          
		</li>		
		<li>
			<a href="/vipmin/reports/ranking.php">Ranking</a>          
		</li>
	</ul>
</li>
<li><a href="/vipmin/magazine/index-article.php"><?=utf8_encode("Revista")?></a>
	<ul> 
		<li>
			<a href="/vipmin/magazine/edit-category.php"><?=utf8_encode("Criar Categoria")?> </a>       
			<a href="/vipmin/magazine/index-category.php"><?=utf8_encode("Consultar Categoria")?> </a>    
		</li>
		<li>
			<a href="/vipmin/magazine/edit-article.php"><?=utf8_encode("Criar Artigo")?> </a>       
			<a href="/vipmin/magazine/index-article.php"><?=utf8_encode("Consultar Artigo")?> </a>    
		</li>
	</ul>
</li>
<? if(file_exists(WWW_MOD."/propostas.inc")){?><li><a href="/vipmin/team/propostas.php"><?=utf8_encode("Propostas Recebidas")?></a> </li> <? } ?>
<? if(file_exists(WWW_MOD."/anunciante.inc")){?><li><a href="/vipmin/order/index.php"><?=utf8_encode("Planos")?></a>
	<ul> 
		<li>
			<a href="/vipmin/order/index.php"><?=utf8_encode("Consultar Planos")?> </a> 
			<a href="/vipmin/order/index-upgrades.php"><?=utf8_encode("Consultar Upgrades")?> </a>  
		</li>
			<li> <a href="/vipmin/order/historico.php"><?=utf8_encode("Histórico de Aquisições")?></a> </li>  
	</ul>
</li> 
<? } ?>
<li><a href="/vipmin/user/index.php"><?=utf8_encode("Anunciantes")?></a>
<!-- 	 UNIFICADO NA TABELA USER
<li><a href="/vipmin/parceiro/index.php"><?=utf8_encode("Agências")?></a>
	<ul> 
		<li>
			<a href="/vipmin/parceiro/edit.php"><?=utf8_encode("Nova Agência")?></a>
			<a href="/vipmin/parceiro/index.php"><?=utf8_encode("Consultar Agências")?></a> 
		</li>
	</ul>
</li>
-->

<li><a href="/vipmin/system/index.php">Sistema</a>
 <ul>
 <li> <a target="_blank" href="http://www.youtube.com/user/suportevipcom">V&iacute;deos de Ajuda</a> </li>
	 <li> <a href="/vipmin/system/index.php"><?=utf8_encode("Informações Básicas")?></a> </li>
	<li> <a href="/vipmin/system/option.php"><?=utf8_encode("Configurações")?></a> </li>
	  	
	<li> <a href="/vipmin/category/index.php?zone=group">Categorias</a> </li>   
   <li><a href="/vipmin/system/redes.php?pg=redessociais">Redes Sociais</a></li>  
	<? if(file_exists(WWW_MOD."/anunciante.inc")){?><li> <a href="/vipmin/system/pay.php"><?=utf8_encode("Métodos de Pagamento")?></a> </li><? } ?>
	<li> <a href="/vipmin/system/email.php"><?=utf8_encode("Configurar E-mails")?></a> </li> 
	<li> <a href="/vipmin/misc/backup.php"><?=utf8_encode("Backup dos Dados")?></a> </li>
	<li> <a href="/vipmin/system/page.php"><?=utf8_encode("Páginas Estáticas")?></a> </li>	 
	<li> <a href="/vipmin/system/faq.php"><?=utf8_encode("FAQ")?></a> </li>	
	<li> <a href="/vipmin/system/bulletin.php"><?=utf8_encode("Banners e Avisos")?></a> </li>
</ul>
</li>
 
</ul> 

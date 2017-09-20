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

<li><a href="<?php echo $ROOTPATH; ?>"><?=utf8_encode("Voltar ao site")?></a></li>
<li><a href="/adminanunciante/team/index.php"><?=utf8_encode("Meus Anúncios")?></a> </li>   
<?php if($login_user['tipoanunciante'] == "Revenda") { ?>
	<li><a href="/adminanunciante/team/especiais.php"><?=utf8_encode("Anúncios Especiais")?></a> </li> 
<?php } ?> <li><a href="/adminanunciante/team/propostas.php"><?=utf8_encode("Propostas Recebidas")?></a> </li> 
 
</ul> 

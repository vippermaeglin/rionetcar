<div style="display:none;height:35px;" class="tips"><?=__FILE__?></div>
<?
$textopadrao =  "O que você procura ? Ex: Gol";
?>
<div class="searchbox clearfix">
	<form class="search-slim-frm" action="/index.php?busca=true" onsubmit="return verificacampo();" >
		<fieldset>
			<div class="titencontre"><legend id="searchLabel">Encontre seu veículo</legend></div>
			<div class="inputpesquisa">
				<input type="text" name="cppesquisa" id="cppesquisa" class="placeholderFix" value="<?=$textopadrao?>" onblur="if(this.value=='') this.value='<?=$textopadrao?>'" onfocus="if(this.value =='<?=$textopadrao?>' ) this.value=''">
				<input type="hidden" name="busca" id="busca" value="true" >
			</div> 
			<div class="buscarpesquisa"> 
			  <button type="submit">Buscar</button>
			 </div>
			   
		   <? /* if($INI['other']['box-facebook'] != ""  ) {?>
			   <div class="boxcurtirtoposite">  
					<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
						<div class="fb-like" data-href="<?php echo htmlspecialchars(stripslashes($INI['other']['box-facebook'])); ?>" data-send="false" data-layout="button_count" data-width="350" data-show-faces="false"></div>
				 </div>
			 <? } */ ?>
			
			 
		</fieldset>
	</form>
</div>

<script>
function verificacampo(){
	
	if(J("#querybusca").val()=="" || J("#querybusca").val() == '<?=$textopadrao?>' ){
			alert('Informe a palavra de seu interesse no campo de pesquisa. Exemplo: Palio');
			return false;
	}
}
</script>
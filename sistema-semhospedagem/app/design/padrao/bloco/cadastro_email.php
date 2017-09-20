<?
$allcities = option_category('city', false, true);
?>
 
<div style="display:none;" class="tips"><?=__FILE__?></div>
<div class="container" style="margin-left:7px;float:left;width:735px;margin-top:-38px;">
	 <div class="col-4b" style="width:735px;margin-left:-8px;">	 
	<br style="clear:both;display:block;margin-top:10px;margin-bottom:10px;"/>
	
	<div style="padding: 2px 14px;margin-left:8px;margin-top:50px" class="homebox"> 
	<? if($erro404){?>
		<h2><span id="rec" style="margin-left:240px;"> <?php echo "Ei ! Esta página não existe mais, desculpe." ?></span> </h2>
	 <? }else {?>
		<h2 style="text-align:center;font-size:32px;color:#303030;"> Receba nossas ofertas por email</h2>
	<? }?>	
	 
	<span style="color:#000000;font-size:15px;margin-bottom:0;margin-left:161px;"> Receba por email nossas ofertas de até 90% de desconto </span>
			 
	<br style="clear:both;display:block;margin-top:10px;margin-bottom:10px;">
	<hr class="cinza">

	<?php if( $_SESSION["error"]  != "" ){  ?> 
		<div class="error"><p class="txt9b">  <?php  echo $_SESSION["error"] ?></p></div>
		<br class="clear" />
		<?php 	
		unset($_SESSION["error"]); 
	}?>

	   <br class="clear" /> 
		<div id="campos">
			<input type="text"  style="margin-left:197px;width:397px;color:#303030;height:19px;font-size:15px;" name="emailnewshome" id="emailnewshome" onfocus="if(this.value =='Insira seu e-mail' ) this.value=''" onblur="if(this.value=='') this.value='Insira seu e-mail'" value="Insira seu e-mail"   />
			 
			<select name="websites3" style="margin-left:197px;margin-top:5px;width: 418px;color:#303030;font-size:15px;height:35px;padding:9px 0 0 6px;" id="websites3"  >
				<option value="">Escolha sua cidade</option>
				<?php echo utf8_decode( Utility::Option(Utility::OptionArray($allcities, 'id', 'name'), $city['id'])); ?>
			</select>
		</div>
		<input type="hidden" name="acao" value="<?php echo $_REQUEST['acao']?>">

	<br class="clear" />  
		
	<div id="botaodesconto">
	<a style="margin-left: 161px;" href="javascript:envianewsletter( J('#emailnewshome').val(),J('#websites3').val());"> <img style="margin-left: 36px;"  src="<?=$PATHSKIN?>/images/bg_btn_landing.png"  ></a>
	</div> 
	
	<div class="addthis_toolbox addthis_default_style" style="width:241px;float:right;margin-top:13px; ">
		<!-- AddThis Button BEGIN --> 
		<a class="addthis_button_preferred_1" addthis:url="<?php echo $ROOTPATH ?>"></a>
		<a class="addthis_button_preferred_2" addthis:url="<?php echo $ROOTPATH ?>"></a>
		<a class="addthis_button_preferred_3" addthis:url="<?php echo $ROOTPATH ?>"></a>
		<a class="addthis_button_preferred_4" addthis:url="<?php echo $ROOTPATH ?>"></a>
		<a class="addthis_button_compact" addthis:url="<?php echo $ROOTPATH ?>"></a>
		<a class="addthis_counter addthis_bubble_style" addthis:url="<?php echo $ROOTPATH ?>"></a>
		<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4dcfcb963cc51439"></script>
		<!-- AddThis Button END -->
	</div> 
	<div id="facehome" style="padding:10px 0px 0px 224px;margin-left:-26px;" >
		<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) {return;}
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>

		<fb:like href="<?=$INI['other']['box-facebook']?>" send="false" layout="button_count" width="20" show_faces="false" action="recommend"></fb:like>
	</div>
	<br class="clear" />  
   </div>		
 </div> 
</div>
<div id="facebox"  style="float:right;margin-right:36px;width:160px;margin-top:14px;">
	<iframe scrolling="no" frameborder="0" allowtransparency="true" style="border:none; overflow:hidden; width:216px; height:258px;" src="http://www.facebook.com/plugins/likebox.php?href=<?=$INI['other']['box-facebook']?>/&amp;width=235&amp;height=259&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;show_border=false&amp;header=false"></iframe>

	<?php if($INI['other']['usuario_twitter'] != ""  ) { ?> 
	 
	<div class="blocotwitter" style="margin-left: 0px;margin-top:11px;">
	<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
	<script>
	new TWTR.Widget({
	  version: 2,
	  type: 'profile',
	  rpp: 4,
	  interval: 30000,
	  width: 200,
	  height: 120,
	  theme: {
		shell: {
		  background: '#333333',
		  color: '#ffffff'
		},
		tweets: {
		  background: '#000000',
		  color: '#ffffff',
		  links: '#4aed05'
		}
	  },
	  features: {
		scrollbar: true,
		loop: false,
		live: true,
		behavior: 'default'
	  }
	}).render().setUser('<?=$INI['other']['usuario_twitter']?>').start();
	</script>
	</div> 
	 
 <?php } ?>
  
</div>


<style>
.home {
    margin-bottom: 0; 
	 padding: 19px 21px;
} 
</style>
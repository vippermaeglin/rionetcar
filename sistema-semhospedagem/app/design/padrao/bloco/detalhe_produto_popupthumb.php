<?php  
$navegador = getNavegador();
$ORIGEM = "DETALHE";

if($team and $team['desativado'] != 's'){ ?> 
  
<script type="text/javascript" src="<?=$ROOTPATH?>/js/jssorslider/jssor.core.js"></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/jssorslider/jssor.utils.js"></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/jssorslider/jssor.slider.js"></script> 
<script type="text/javascript" src="<?=$ROOTPATH?>/js/jssorslider/ini.js" ></script> 
 
<div class="detalhe_principal_op"> 
<style>
.bannermeio {margin-left: 0px; width: 625px;}
</style>
 <div style="display:none;height:36px;" class="tips"><?=__FILE__?></div>
 
 <?php  require_once(DIR_BLOCO."/bloco_banners_topo2.php"); ?> 
 <?php  require_once(DIR_BLOCO."/bloco_banners_topo3.php"); ?> 
 <?php $nome = explode(" ",$partner['title']); ?>
 	<div style="clear:both;height:7px;"></div>
<div class="informacoes raio-5 last preco-sug" style="background: #fff; width:606px;padding-bottom:29px;width:936px;">   
	<div class="codanundetail">Cód. Anúncio - <?=$this->id?></div> 
	 <div style="clear:both;">
		<div class="size-20-bold last" style="float:left;padding:7px;"> 
			<?=$this->tituloferta ?> 
		</div> 
		<?php if($this->mostrarpreco == 1) { ?><span class="size-30-bold valoranuncio"> R$ <?php echo $this->preco; ?></span> <?php } ?>
		</div>  
</div> 
	
<table cellpadding="0" cellspacing="0" border="0" width="947" bgcolor="#FFFFFF"> 
 <tr>
    <td colspan="3" width="66%" valign="top" align="left">
	
	<div class="destaque_box">   
	<!-- 
	    <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 960px;  height: 500px; background: #FFF; overflow: hidden;clear:both;">
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(<?=$ROOTPATH?>/js/jssorslider/img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>  
        <div u="slides" style="cursor: move; position: absolute; left: 290px; top: 0px; width: 670px; height: 490px; overflow: hidden;">
			<div>
                <img u="image" src="<?=$this->imagemoferta?>" />
                <img u="thumb" src="<?=$this->imagemofertathumb?>" />
            </div> 
            <div>
                <img u="image" src="<?=$this->imagemoferta2?>" />
                <img u="thumb" src="<?=$this->imagemoferta2thumb?>" />
            </div> 		 
			<div>
                <img u="image" src="<?=$this->imagemoferta3?>" />
                <img u="thumb" src="<?=$this->imagemoferta3thumb?>" />
            </div>
			  
			<div>
                <img u="image" src="<?=$this->imagemoferta4?>" />
                <img u="thumb" src="<?=$this->imagemoferta4thumb?>" />
            </div> 			
			<div>
                <img u="image" src="<?=$this->imagemoferta5?>" />
                <img u="thumb" src="<?=$this->imagemoferta5thumb?>" />
            </div> 
			<div>
                <img u="image" src="<?=$this->imagemoferta6?>" />
                <img u="thumb" src="<?=$this->imagemoferta6thumb?>" />
            </div>  
			<div>
                <img u="image" src="<?=$this->imagemoferta7?>" />
                <img u="thumb" src="<?=$this->imagemoferta7thumb?>" />
            </div> 			
			<div>
                <img u="image" src="<?=$this->imagemoferta8?>" />
                <img u="thumb" src="<?=$this->imagemoferta8thumb?>" />
            </div> 	 
			<div>
                <img u="image" src="<?=$this->imagemoferta9?>" />
                <img u="thumb" src="<?=$this->imagemoferta9thumb?>" />
            </div>  
			<div>
                <img u="image" src="<?=$this->imagemoferta10?>" />
                <img u="thumb" src="<?=$this->imagemoferta10thumb?>" />
            </div>  
			<div>
                <img u="image" src="<?=$this->imagemoferta11?>" />
                <img u="thumb" src="<?=$this->imagemoferta11thumb?>" />
            </div>   
			</div>   
        <span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 158px; left: 248px; ">
        </span> 
        <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 158px; right: 8px; ">
        </span> 
        <div u="thumbnavigator" class="jssort02" style="position: absolute; width: 290px; height: 400px; left:0px; bottom: 0px; top: 96px;"> 
            <div u="slides" style="cursor: move;">
                <div u="prototype" class="p" style="position: absolute; width: 115px; height: 88px; top: 0; left: 0;">
                    <div class=w><thumbnailtemplate style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate></div>
                    <div class=c>
                    </div>
                </div>
            </div> 
        </div> 
        <script>
            jssor_slider1_starter('slider1_container');
        </script>
    </div> 
	--> 
 <script>
   
	J(document).ready(function() {
		J(".box_skitter_detalhe_large").skitter({
			//animation: "fade","fadefour","circles","circlesinside","cubejelly","cubeshow",  
			numbers_align: "center", 
 			dots: false, 
 			preview: true, 
 			focus: false, 
 			focus_position: "leftTop", 
 			controls: false, 
 			controls_position: "leftTop", 
 			progressbar: false,  
 			animateNumberOver: { 'backgroundColor':'#555' } ,
			enable_navigation_keys: false
			
		});
	}); 
</script>
	<style>
	.box_skitter_detalhe_large {
		height: 328px;
		width: 450px;
	}   
	</style>
	<div class="thumbsdetail2" style="width:171px;float:left;">
		<script>
		jQuery(document).ready(function(){ 
			jQuery(".group<?=$team['id']?>").colorbox({rel:'group<?=$team['id']?>'});
		});
		</script>
		<div>
			<? if($team['image']){?> <div style="padding:0 5px 0 0;float:left;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".$team['image'] ?>"> <img src="<?=$this->imagemofertathumb?>"  style="width:74px" ></a> </div><? } ?>
			<? if($team['image1']){?> <div style="padding:0 5px 0 0;float:left;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".$team['image1'] ?>"> <img src="<?=$this->imagemoferta2thumb?>"   style="width:74px"></a> </div><? } ?>
			<? if($team['image2']){?> <div style="padding:0 5px 0 0;float:left;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".$team['image2'] ?>"> <img src="<?=$this->imagemoferta3thumb?>"  style="width:74px" ></a> </div><? } ?>
			<? if($team['gal_image1']){?> <div style="padding:0 5px 0 0;float:left;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".$team['gal_image1'] ?>"> <img src="<?=$this->imagemoferta4thumb?>"  style="width:74px" ></a> </div><? } ?>
			<? if($team['gal_image2']){?> <div style="padding:0 5px 0 0;float:left;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".$team['gal_image2'] ?>"> <img src="<?=$this->imagemoferta5thumb?>"  style="width:74px" ></a> </div><? } ?>
			<? if($team['gal_image3']){?> <div style="padding:0 5px 0 0;float:left;"> <a style="display:block;border:1px solid #CCCCCC; padding:2px;" class="group<?=$team['id']?>" href="<?=$INI['system']['wwwprefix']."/media/".$team['gal_image3'] ?>"> <img src="<?=$this->imagemoferta6thumb?>"  style="width:74px" ></a> </div><? } ?>
		</div>	
	</div> 
					
	<div class="border_box" style="float:right;width:442px !important">
		<div class="box_skitter_detalhe box_skitter_detalhe_large" style="float:left;">
			<ul> 
				<? if($team['image']){?><li><a alt="<?=$this->tituloferta?>" href="#fadeFour"><img title="<?=$this->tituloferta?>" alt="<?=$this->tituloferta?>" src="<?=$this->imagemoferta?>" class="fadeFour" /></a></li><?}?>
				<? if($team['image1']){?><li><a alt="<?=$this->tituloferta?>" href="#fadeFour"><img title="<?=$this->tituloferta?>" alt="<?=$this->tituloferta?>" src="<?=$this->imagemoferta2?>" class="fadeFour" /></a></li><?}?>
				<? if($team['image2']){?><li><a alt="<?=$this->tituloferta?>"  href="#fadeFour"><img title="<?=$this->tituloferta?>" alt="<?=$this->tituloferta?>" src="<?=$this->imagemoferta3?>" class="fadeFour" /></a></li><?}?>
				<? if($team['gal_image1']){?><li><a alt="<?=$this->tituloferta?>" href="#fadeFour"><img title="<?=$this->tituloferta?>" alt="<?=$this->tituloferta?>" src="<?=$this->imagemoferta4?>" class="fadeFour" /></a></li><?}?>
				<? if($team['gal_image2']){?><li><a alt="<?=$this->tituloferta?>" href="#fadeFour"><img title="<?=$this->tituloferta?>" alt="<?=$this->tituloferta?>" src="<?=$this->imagemoferta5?>" class="fadeFour" /></a></li><?}?>
				<? if($team['gal_image3']){?><li><a alt="<?=$this->tituloferta?>" href="#fadeFour"><img title="<?=$this->tituloferta?>" alt="<?=$this->tituloferta?>" src="<?=$this->imagemoferta6?>" class="fadeFour" /></a></li><?}?>
				<? if($team['gal_image4']){?><li><a alt="<?=$this->tituloferta?>" href="#fadeFour"><img title="<?=$this->tituloferta?>" alt="<?=$this->tituloferta?>" src="<?=$this->imagemoferta7?>" class="fadeFour" /></a></li><?}?>
				<? if($team['gal_image5']){?><li><a alt="<?=$this->tituloferta?>" href="#fadeFour"><img title="<?=$this->tituloferta?>" alt="<?=$this->tituloferta?>" src="<?=$this->imagemoferta8?>" class="fadeFour" /></a></li><?}?>
				<? if($team['gal_image6']){?><li><a alt="<?=$this->tituloferta?>" href="#fadeFour"><img title="<?=$this->tituloferta?>" alt="<?=$this->tituloferta?>" src="<?=$this->imagemoferta9?>" class="fadeFour" /></a></li><?}?>
				<? if(!$team['image']){?> <li><img title="<?=$this->tituloferta?>" alt="<?=$this->tituloferta?>" src="<?=$INI['system']['wwwprefix']."/skin/padrao/images/semfotomaior.png"?>" /></li><?}?>
			 </ul>
		</div> 
	</div>
			
   </div> 	 
	</div> 	  
	  <?php require_once(DIR_BLOCO."/bloco_tabela_fipe.php"); ?> 
	  
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td colspan="3" width="100%" valign="top" align="left">
					<div class="titulo">Características do veículo</div>
					<div class="descricaooferta">
						<?php  
							echo utf8_decode($this->getmaisdescricao($team));
						?>
					</div>
				</td> 
			 </tr>
			<tr>
				<td colspan="3" width="100%" valign="top" align="left">
					<div class="titulo">Informações Adicionais</div>
					<div class="descricaooferta">
						<?php  echo strip_tags(nl2br(utf8_decode($team['summary'])),"<a><img><br><b><strong><style><font><embed><iframe>"); ?>
					</div>
				</td> 
			 </tr>
			<? if(!empty($team['vea_promocoes']) and !empty($team['promooutros'])){?>			 
			 <tr>
				<td colspan="3" width="100%" valign="top" align="left">
					<div class="titulo">Promoções</div>
					<div class="descricaooferta">
						Ao comprar este veículo você ganha de brinde: 
						<B style="color:#195AA6"><?php  echo strip_tags(nl2br(utf8_decode($team['vea_promocoes'])),"<a><img><br><b><strong><style><font><embed><iframe>"); ?></B>
						<B style="color:#195AA6"><?php  echo strip_tags(nl2br(utf8_decode($team['promooutros'])),"<a><img><br><b><strong><style><font><embed><iframe>"); ?><B>
					</div>
				</td> 
			 </tr> 
			 <? } ?>  
			 <tr>
				 <td colspan="3">
					<div class="descricaooferta">
						<?php  require_once(DIR_BLOCO."/bloco_local_parceiro.php"); ?> 
					</div>
				 </td>
             </tr>	 
			 <tr>
				 <td colspan="3">
					<div class="descricaooferta">
						<?php  require_once(DIR_BLOCO."/bloco_irrregularidades.php"); ?> 
					</div>
				 </td>
             </tr>   
			 <?if($this->mostrarseguranca=="1"){?>
			 <tr>
				 <td colspan="3">
					<div class="atencao">
						<h2>Atenção</h2>
						 Não faça depósitos antes de se certificar da existência do produto/serviço e desconfie de ofertas muito abaixo do valor de mercado.
						<br>
						- O <?= utf8_decode($INI["system"]["sitename"])?> não possui participação de qualquer natureza nas vendas, compras, trocas, nem realiza a intermediação de qualquer outro tipo de transação feita pelos usuários, como também não se responsabiliza por quaisquer danos diretos e/ou indiretos causados a terceiros, advindos da exibição dos anúncios em desacordo com as Leis Criminal, Civil e em especial ao Código Brasileiro de Defesa do Consumidor, por parte do anunciante.
						<br>
						- Cabe exclusivamente ao usuário certificar-se da idoneidade do anunciante, da existência, propriedade e estado do produto/serviço que pretende adquirir.
						<br>
						- São os anunciantes os únicos responsáveis pela venda e entrega do produto/serviço anunciado.
						<br>
					</div>
				 </td>
             </tr> 
			 <? } ?> 
			 <tr>
				 <td colspan="3">
					<div class="descricaooferta"> 
						<div class="bannerfit"> <?php  require_once(DIR_BLOCO."/bloco_banners_meio.php"); ?> </div>
					</div>
				</td>
             </tr>	 
			 <tr>
				 <td colspan="3">
					<div class="descricaooferta">
						<?php  require_once(DIR_BLOCO."/bloco_comentarios_facebook.php"); ?> 
					</div>
					</td>
             </tr>
		 </table>
	</td>
	<td width="" valign="top"> &nbsp; </td>
    <!--COLUNA DE OFERTAS-->
    <td width="35%" valign="top">
     	<?php  require_once(DIR_BLOCO."/coluna_direita_resumida.php"); ?>  
    </td>
 </tr> 
</table>

</div> 
 <form method="POST" id="formparceiro" action="/index.php" name="formparceiro"></form>
<script>
	 
	atualiza_click('<?=$team['id']?>');
	J(".fundo_titulo_oferta").corner("round 3px");
	J(".titulo").corner("round 3px");

</script>


<?php  
}
else{ ?>
	<div class="home">
  <? require_once(DIR_BLOCO."/cadastro_email.php");   ?>
  </div>
<? } ?>

<script> 	
	J(".valoranuncio").corner("round 2px");
</script>

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
	<div class="AcoesPagina">
		<a href="#" onclick="window.open('<?php echo $ROOTPATH; ?>/printoffer/<?php echo $this->id; ?>');"><img align="left"; style="max-width:170px;margin-left:5px;margin-right:15px;" src="<?php echo $ROOTPATH; ?>/skin/padrao/images/print.png"><p>Imprimir</p></a>
	</div>
</div> 
	
<table cellpadding="0" cellspacing="0" border="0" width="947" bgcolor="#FFFFFF"> 
 <tr>
    <td colspan="3" width="66%" valign="top" align="left">
    <!--BANNER--> 
	<div class="destaque_box">   
	    <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 960px;  height: 500px; background: #FFF; overflow: hidden;clear:both;">
		<!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(<?=$ROOTPATH?>/js/jssorslider/img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div> 
        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 290px; top: 0px; width: 670px; height: 490px; overflow: hidden;">
				<? if(!empty($this->imagemoferta)){?>
				<div>
					<img  u="image"  id="linkimg_" src="<?=$this->imagemoferta?>" /> 
					<img u="image" style="display:none;" id="linkimg" src="<?=substr($this->imagemoferta,0,-4)."_detalhe.jpg"; ?>" /> 
					<img u="thumb" src="<?=$this->imagemofertathumb?>" />
				</div> 
				<?php } else { ?>
				<div>
					<img  u="image"  id="linkimg_" src="<?php echo $PATHSKIN; ?>/images/semfoto.jpg" /> 
					<img u="image" style="display:none;" id="linkimg" src="<?php echo $PATHSKIN; ?>/images/semfoto.jpg" /> 
					<img u="thumb" src="<?php echo $PATHSKIN; ?>/images/semfoto.jpg" />
				</div> 				
				<?php } ?>
				<? if(!empty($this->imagemoferta2)){?>
					<div>
						<img u="image" id="linkimg2_" src="<?=$this->imagemoferta2?>" />
						<img u="image" style="display:none;" id="linkimg2" src="<?=substr($this->imagemoferta2,0,-4)."_detalhe.jpg";?>" />
						<img u="thumb" src="<?=$this->imagemoferta2thumb?>" />
					</div> 	
				<? } ?>
				<? if(!empty($this->imagemoferta3)){?>			
					<div>
						<img u="image" id="linkimg3_" src="<?=$this->imagemoferta3?>" />
						<img u="image" style="display:none;" id="linkimg3" src="<?=substr($this->imagemoferta3,0,-4)."_detalhe.jpg";?>" />
						<img u="thumb" src="<?=$this->imagemoferta3thumb?>" />
					</div>
				<? } ?>
				<? if(!empty($this->imagemoferta4)){?>
					<div>
						<img u="image" id="linkimg4_" src="<?=$this->imagemoferta4?>" />
						<img u="image" style="display:none;" id="linkimg4" src="<?=substr($this->imagemoferta4,0,-4)."_detalhe.jpg";?>" />
						<img u="thumb" src="<?=$this->imagemoferta4thumb?>" />
					</div> 
				<? } ?>
				<? if(!empty($this->imagemoferta5)){?>			
					<div>
						<img u="image" id="linkimg5_" src="<?=$this->imagemoferta5?>" />
						<img u="image" style="display:none;" id="linkimg5" src="<?=substr($this->imagemoferta5,0,-4)."_detalhe.jpg";?>" />
						<img u="thumb" src="<?=$this->imagemoferta5thumb?>" />
					</div> 
				<? } ?>
				<? if(!empty($this->imagemoferta6)){?>
					<div>
						<img u="image" id="linkimg6_" src="<?=$this->imagemoferta6?>" />
						<img u="image" style="display:none;" id="linkimg6" src="<?=substr($this->imagemoferta6,0,-4)."_detalhe.jpg";?>" />
						<img u="thumb" src="<?=$this->imagemoferta6thumb?>" />
					</div>  
				<? } ?>
				<? if(!empty($this->imagemoferta7)){?>
					<div>
						<img u="image" id="linkimg7_" src="<?=$this->imagemoferta7?>" />
						<img u="image" style="display:none;" id="linkimg7" src="<?=substr($this->imagemoferta7,0,-4)."_detalhe.jpg";?>" />
						<img u="thumb" src="<?=$this->imagemoferta7thumb?>" />
					</div> 			
				<? } ?>
				<? if(!empty($this->imagemoferta8)){?>
					<div>
						<img u="image" id="linkimg8_" src="<?=$this->imagemoferta8?>" />
						<img u="image" style="display:none;" id="linkimg8" src="<?=substr($this->imagemoferta8,0,-4)."_detalhe.jpg";?>" />
						<img u="thumb" src="<?=$this->imagemoferta8thumb?>" />
					</div> 	 
				<? } ?>
				<? if(!empty($this->imagemoferta9)){?>
					<div>
						<img u="image" id="linkimg9_" src="<?=$this->imagemoferta9?>" />
						<img u="image" style="display:none;" id="linkimg9" src="<?=substr($this->imagemoferta9,0,-4)."_detalhe.jpg";?>" />
						<img u="thumb" src="<?=$this->imagemoferta9thumb?>" />
					</div>  
				<? } ?>
				<? if(!empty($this->imagemoferta10)){?>
					<div>
						<img u="image" id="linkimg10_" src="<?=$this->imagemoferta10?>"/>
						<img u="image" style="display:none;" id="linkimg10" src="<?=substr($this->imagemoferta10,0,-4)."_detalhe.jpg";?>" />
						<img u="thumb" src="<?=$this->imagemoferta10thumb?>" />
					</div>  
				<? } ?>
			</div>  
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 158px; left: 248px; ">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 158px; right: 8px; ">
        </span>
        <!-- Arrow Navigator Skin End --> 
        <!-- Thumbnail Navigator Skin 02 Begin -->
        <div u="thumbnavigator" class="jssort02" style="position: absolute; width: 290px; height: 400px; left:0px; bottom: 0px; top: 96px;">
        
            <!-- Thumbnail Item Skin Begin --> 
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
    <!-- Jssor Slider End -->  
		</div> 	 
	</div> 	  
	  <?php require_once(DIR_BLOCO."/bloco_tabela_fipe.php"); ?> 
	  
	  <?php require_once(DIR_BLOCO."/bloco_caracteristicas.php"); ?> 
	  
	  <?php require_once(DIR_BLOCO."/bloco_detalhes_veiculo.php"); ?> 
	  
	  <?php require_once(DIR_BLOCO."/bloco_outras_informacoes.php"); ?> 
	  
	  <?php require_once(DIR_BLOCO."/bloco_promocoes.php"); ?> 
	  
	  <?php require_once(DIR_BLOCO."/bloco_local_parceiro.php"); ?>  
  
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
	
		J(document).ready(function() {
			J("#linkimg_").click(function() {  
				J.colorbox({
					href:J('#linkimg').attr('src')
				}); 
			});	
			J("#linkimg1_").click(function() {  
				J.colorbox({
					href:J('#linkimg1').attr('src')
				}); 
			});
			J("#linkimg2_").click(function() { 
				J.colorbox({
					href:J('#linkimg2').attr('src')
				}); 
			});	
			J("#linkimg3_").click(function() { 
				J.colorbox({
					href:J('#linkimg3').attr('src')
				}); 
			});
			J("#linkimg4_").click(function() { 
				J.colorbox({
					href:J('#linkimg4').attr('src')
				});  
			});
			J("#linkimg5_").click(function() { 
				J.colorbox({
					href:J('#linkimg5').attr('src')
				}); 
			});
			J("#linkimg6_").click(function() { 
				J.colorbox({
					href:J('#linkimg6').attr('src')
				});  
			});	
			J("#linkimg7_").click(function() { 
				J.colorbox({
					href:J('#linkimg7').attr('src')
				}); 
			});
			J("#linkimg8_").click(function() { 
				J.colorbox({
					href:J('#linkimg8').attr('src')
				}); 
			});
			J("#linkimg9_").click(function() { 
				J.colorbox({
					href:J('#linkimg9').attr('src')
				}); 
			});
			J("#linkimg10_").click(function() { 
				J.colorbox({
					href:J('#linkimg10').attr('src')
				}); 
			});	
			J("#linkimg11_").click(function() { 
				J.colorbox({
					href:J('#linkimg11').attr('src')
				}); 
			});
			
		});

</script>

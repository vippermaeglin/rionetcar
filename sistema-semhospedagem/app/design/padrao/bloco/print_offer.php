<?php  
	$navegador = getNavegador();
	$ORIGEM = "DETALHE";
	$data = date("d/m/Y");
		
	if($team and $team['desativado'] != 's'){ 
?>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/jssorslider/jssor.core.js"></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/jssorslider/jssor.utils.js"></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/jssorslider/jssor.slider.js"></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/jssorslider/ini.js" ></script>
<div class="detalhe_principal_op"> 
	<style>
		.bannermeio {margin-left: 0px; width: 625px;}
		.destaque_box {margin-bottom: 10px;}
		.valoranuncio {
			background: #cc2929;
			color: #fff;
			float: right;
			margin: -30px 15px 0 0;
			padding: 13px 14px;
			width: 203px;

			}
		.carro-detalhe .avaliacao {width: 945px;}
		.carro-detalhe .titulocc {width: 945px;}
		.box {margin-left: -300px;}
		.size-13-bold, .codanundetail, .size-12, .ContatoTitle, .TelefoneContato {font-size: 23px;line-height: 25px;}
		.titfipe {font-size: 25px;}.separador{	position: absolute;height: 227px;border: 1px solid rgb(204, 204, 204);left: 345px;top: 9px;}
		.title_print {	float: left;	font-size: 40px;	padding: 10px;	width: 55%;	line-height: 45px;	overflow: hidden;	text-align: left;}
	</style> 
	<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div>
	<?php 
		$nome = explode(" ",$partner['title']);
			if(!(empty($team['cilindros']))) {
		$cilindros = $team['cilindros'] . "V";	   
		}
		if(!(empty($team['numero_portas']))) {	
			$portas = $team['numero_portas'] . "P";	
		} 
	?>
	<div style="clear:both;height:7px;"></div>
	<div class="informacoes raio-5 last preco-sug" style="background: #fff;height:100px;padding-bottom:29px;width:936px;">   	 
		<div style="clear:both;"> 
			<p class="title_print">		
				<?php echo $team['title']; ?>	
			</p>	
			<span class="size-30-bold" style="position: absolute;font-size: 120px;padding: 50px;background: #F58634 ;color: #FFF; right: 35px;">
				<?=$team['modelo_ano']?>
			</span>
		</div>
	</div> 
	<table cellpadding="0" cellspacing="0" border="0" width="947" bgcolor="#FFFFFF"> 
		<tr> 
			<td colspan="6" width="90%" valign="top" align="left">	
				<div>	  
					<?php		
						$user = Table::Fetch('user', $team['partner_id']);	
						if(!(empty($team['image']))) {	
					?>			
					<img style="max-width:485px;" src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['image']; ?>">	
					<?php 	
						}			
						if(!(empty($user['imagem']))) {	
					?>			
					<img style="max-width:485px;" src="<?php echo $ROOTPATH; ?>/media/<?php echo $user['imagem']; ?>">	
					<?php } ?>	
				</div>	
				<div>	 
					<?php require_once(DIR_BLOCO."/bloco_caracteristicas_print.php"); ?>
				</div>	
				<?php require_once(DIR_BLOCO."/bloco_detalhes_veiculo_print.php"); ?> 
				<?php require_once(DIR_BLOCO."/bloco_outras_informacoes_print.php"); ?> 
			</td> 
		</tr>
	</table>
	<div style="width:300px; margin: 0px auto;">	
		<img style="width:300px;" src="<?php echo $ROOTPATH; ?>/include/logo/logo.png">
	</div>
	<span style="font-size: 25px; color: #F58634;position: relative; margin-top: 5px;">
		<?php echo $ROOTPATH; ?>
	</span>
	<div class="PrintPage">
		<a href="#" onclick="window.print();">
			IMPRIMIR ANÚNCIO
		</a>
	</div>
</div>
<?php  }else{ ?>
<div class="home">
	<? require_once(DIR_BLOCO."/cadastro_email.php");   ?>
</div>
<? } ?>
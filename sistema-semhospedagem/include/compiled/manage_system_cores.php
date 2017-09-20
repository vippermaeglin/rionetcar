<?php include template("manage_header"); ?>

<?
if ($INI['other']['colormenusuperior'] == "") {
	$INI['other']['colormenusuperior'] = "#B0D50F";
}
if ($INI['other']['colormenusuperiorhover'] == "") {
	$INI['other']['colormenusuperiorhover'] = "#B0D50F";
}
if ($INI['other']['colormenusuperiorborder'] == "") {
	$INI['other']['colormenusuperiorborder'] = "#BDDCEF";
}
if ($INI['other']['colortitulocidade'] == "") {
	$INI['other']['colortitulocidade'] = "#303030";
}
if ($INI['other']['color_detalhe_oferta_home'] == "") {
	$INI['other']['color_detalhe_oferta_home'] = "#E7E9EF";
}
if ($INI['other']['color_detalhe_oferta_home_txt'] == "") {
	$INI['other']['color_detalhe_oferta_home_txt'] = "#303030";
}

if ($INI['other']['coloremailofertas'] == "") {
	$INI['other']['coloremailofertas'] = "#000000";
}
if ($INI['other']['color_destaque_botao'] == "") {
	$INI['other']['color_destaque_botao'] = "#CACFDC";
}
if ($INI['other']['colorfundocidades'] == "") {
	$INI['other']['colorfundocidades'] = "#434E54";
}
if ($INI['other']['color_destaque_titulo'] == "") {
	$INI['other']['color_destaque_titulo'] = "#244973";
}
if ($INI['other']['color_destaque_titulo_txt'] == "") {
	$INI['other']['color_destaque_titulo_txt'] = "#FFF";
}
if ($INI['other']['oferta_valor'] == "") {
	$INI['other']['oferta_valor'] = "#FFF";
}
if ($INI['other']['colortextoh3'] == "") {
	$INI['other']['colortextoh3'] = "#A0C900";
}
if ($INI['other']['color_qtd_vendido'] == "") {
	$INI['other']['color_qtd_vendido'] = "#FF7300";
}
if ($INI['other']['color_contadornovo'] == "") {
	$INI['other']['color_contadornovo'] = "#80B300";
}
if ($INI['other']['color_fundo_news'] == "") {
	$INI['other']['color_fundo_news'] = "#494f59";
}
if ($INI['other']['color_fundo_laterais_rodape'] == "") {
	$INI['other']['color_fundo_laterais_rodape'] = "#D3E5EF";
}
if ($INI['other']['color_fundo_meio_rodape'] == "") {
	$INI['other']['color_fundo_meio_rodape'] = "#226D97";
}
if ($INI['other']['titulo_destaque'] == "") {
	$INI['other']['titulo_destaque'] = "#303030";
}

/* * ******************************************************** */
if ($INI['other']['background_titulo_destaque'] == "") {
	$INI['other']['background_titulo_destaque'] = "#fff";
}
if ($INI['other']['background_titulos'] == "") {
	$INI['other']['background_titulos'] = "#0173C9";
}
if ($INI['other']['background_oferta_nacional'] == "") {
	$INI['other']['background_oferta_nacional'] = "#B33191";
}
if ($INI['other']['cor_letra_topo'] == "") {
	$INI['other']['cor_letra_topo'] = "#fff";
}
if ($INI['other']['botaodetalhe'] == "") {
	$INI['other']['botaodetalhe'] = "#222222";
}
if ($INI['other']['botaodetalhehover'] == "") {
	$INI['other']['botaodetalhehover'] = "#303030";
}
if ($INI['other']['fundooferta'] == "") {
	$INI['other']['fundooferta'] = "#fff";
}
if ($INI['other']['topodetalhe'] == "") {
	$INI['other']['topodetalhe'] = "url(/skin/padrao/background/body-bg11.png)";
}
if ($INI['other']['rodapedetalhe'] == "") {
	$INI['other']['rodapedetalhe'] = "#fff";
}
if ($INI['other']['btfinaliza'] == "") {
	$INI['other']['btfinaliza'] = "#007D9A";
}
if ($INI['other']['btfinalizahover'] == "") {
	$INI['other']['btfinalizahover'] = "#336699";
}
if ($INI['other']['rodape_cor_fundo'] == "") {
	$INI['other']['rodape_cor_fundo'] = "#F58634";
}
if ($INI['other']['cor_bloco_artigo'] == "") {
	$INI['other']['cor_bloco_artigo'] = "#F58634";
}
if ($INI['other']['cor_bloco_form'] == "") {
	$INI['other']['cor_bloco_form'] = "#F58634";
}
if ($INI['other']['bloco_artigo_texto'] == "") {
	$INI['other']['bloco_artigo_texto'] = "#F58634";
}
?>



<style type="text/css" media="screen">
	.colorwell {
		border: 2px solid #fff;
		width: 6em;
		text-align: center;
		cursor: pointer;
	}
	body .colorwell-selected {
		border: 2px solid #000;
		font-weight: bold;
	}
</style>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#demo').hide();
		var f = $.farbtastic('#picker');
		var p = $('#picker').css('opacity', 0.25);
		var selected;
		$('.colorwell')
		.each(function () { f.linkTo(this); $(this).css('opacity', 0.75); })
		.focus(function() {
			if (selected) {
				$(selected).css('opacity', 0.75).removeClass('colorwell-selected');
			}
			f.linkTo(this);
			p.css('opacity', 1);
			$(selected = this).css('opacity', 1).addClass('colorwell-selected');
		});
	});
</script>


<div id="bdw" class="bdw">
	<div id="bd" class="cf">
		<div id="partner"> 
			<div id="content" class="clear mainwide">
				<div class="clear box"> 
					<div class="box-content">   
						<div class="sect">
							<form method="post"> 

								<div class="option_box">
									<div class="top-heading group">
										<div class="left_float"><h4>Alteração de cores do site</h4></div>
										<div class="the-button">
											<input type="hidden" value="remote" id="deliverytype" name="deliverytype">
											<button onclick="doupdate();" id="run-button" class="input-btn" type="button">
												<div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?= $ROOTPATH ?>/media/css/i/lendo.gif" style="display: none;"></div>
												<div id="spinner-text"  >Salvar</div>
											</button>
										</div> 
									</div> 
									<div id="container_box">
										<div id="option_contents" class="option_contents"> 
											<div class="form-contain group" id="tabela-imagens">
											 <span class="cpanel-date-hint">Note que se o componente que você está tentando alterar a cor não se encontra aqui, então este componente não é um elemento de cor, e sim uma imagem, por exemplo, o fundo verde do menu de navegação. Para alterar imagens <a href="/vipmin/system/imagens.php">clique aqui</a></span>
											
												<div id="picker"  style="opacity: 1; right: 50px; position: absolute; top: 322px;" ></div>	
											   <div  class="form-item" style="width:610px;margin-top:11px;">   <div class="imagemcolor" style="margin-left:97px;float:left;"><img   src="<?= $ROOTPATH ?>/media/css/i/background_titulos.jpg"></div> <div  class="campocolor"><input style="margin-left:92px; width: 80px;" type="text"   name="other[background_titulos]"  class="colorwell" value="<?php echo $INI['other']['background_titulos']; ?>"  /><img style="cursor:help" class="tTip" title="Cor do background das seções, blocos e títulos diversos" src="<?=$ROOTPATH?>/media/css/i/info.png"></div></div>
												
												<!--<div  class="form-item" style="width:610px;margin-top:11px;">   <div class="imagemcolor" style="margin-left:97px;float:left;"><img   src="<?= $ROOTPATH ?>/media/css/i/botaodetalhe.jpg"  style="margin-right: 142px;"></div> <div  class="campocolor"><input style="margin-left:92px; width: 80px;" type="text"   name="other[botaodetalhe]"  class="colorwell" value="<?php echo $INI['other']['botaodetalhe']; ?>"  /><img style="cursor:help" class="tTip" title="Cor do botão detalhe da oferta" src="<?=$ROOTPATH?>/media/css/i/info.png"></div></div>
												<div  class="form-item" style="width:610px;margin-top:11px;">   <div class="imagemcolor" style="margin-left:97px;float:left;"><img   src="<?= $ROOTPATH ?>/media/css/i/botaodetalhe.jpg"  style="margin-right: 142px;"></div> <div  class="campocolor"><input style="margin-left:92px; width: 80px;" type="text"   name="other[botaodetalhehover]"  class="colorwell" value="<?php echo $INI['other']['botaodetalhehover']; ?>"  /><img style="cursor:help" class="tTip" title="Cor do botão detalhe da oferta ao passar o mouse (ahover)" src="<?=$ROOTPATH?>/media/css/i/info.png"></div></div>
												 -->
											   <!-- <div  class="form-item" style="width:610px;margin-top:11px;">   <div class="imagemcolor" style="margin-left:97px;float:left;"><img   src="<?= $ROOTPATH ?>/media/css/i/color_fundo_rodape.jpg"  style="margin-right: 19px;"></div> <div  class="campocolor"><input style="margin-left:92px; width: 80px;" type="text"   name="other[color_fundo_laterais_rodape]"  class="colorwell" value="<?php echo $INI['other']['color_fundo_laterais_rodape']; ?>"  /><img style="cursor:help" class="tTip" title="Cor de fundo das laterais do rodapé" src="<?=$ROOTPATH?>/media/css/i/info.png"></div></div> -->
											 
												<div  class="form-item" style="width:629px;margin-top:11px;clear: both;">   <div class="imagemcolor" style="margin-top:12px;margin-left:97px;float:left;"><img   src="<?= $ROOTPATH ?>/media/css/i/color_fundo_meio_rodape.jpg"></div> <div  class="campocolor"><input style="margin-left:73px; width: 80px;" type="text"   name="other[color_fundo_meio_rodape]"  class="colorwell" value="<?php echo $INI['other']['color_fundo_meio_rodape']; ?>"  /><img style="cursor:help" class="tTip" title="Cor de fundo do meio do rodapé" src="<?=$ROOTPATH?>/media/css/i/info.png"></div></div>
												<div  class="form-item" style="width:629px;margin-top:11px;clear: both;">   <div class="imagemcolor" style="margin-top:12px;margin-left:97px;float:left;"><img  style="width: 247px;" src="<?= $ROOTPATH ?>/media/css/i/topodetalhe.jpg"></div> <div  class="campocolor"><input style="margin-left:73px; width: 80px;" type="text"   name="other[topodetalhe]"  class="colorwell" value="<?php echo $INI['other']['topodetalhe']; ?>"  /><img style="cursor:help" class="tTip" title="Cor de fundo da parte superior do bloco informações na página de detalhe da oferta. Deixe em branco para voltar com a imagem original." src="<?=$ROOTPATH?>/media/css/i/info.png"></div></div>
												<div  class="form-item" style="width:629px;margin-top:11px;clear: both;">   <div class="imagemcolor" style="margin-top:12px;margin-left:97px;float:left;"><img  style="width: 247px;" src="<?= $ROOTPATH ?>/media/css/i/rodape_cor_fundo.png"></div> <div  class="campocolor"><input style="margin-left:73px; width: 80px;" type="text"   name="other[rodape_cor_fundo]"  class="colorwell" value="<?php echo $INI['other']['rodape_cor_fundo']; ?>"  /><img style="cursor:help" class="tTip" title="Cor de fundo da do rodapé." src="<?=$ROOTPATH?>/media/css/i/info.png"></div></div>
												<div  class="form-item" style="width:629px;margin-top:11px;clear: both;">   <div class="imagemcolor" style="margin-top:12px;margin-left:97px;float:left;"><img  style="width: 247px;" src="<?= $ROOTPATH ?>/media/css/i/bloco_artigo.png"></div> <div  class="campocolor"><input style="margin-left:73px; width: 80px;" type="text"   name="other[cor_bloco_artigo]"  class="colorwell" value="<?php echo $INI['other']['cor_bloco_artigo']; ?>"  /><img style="cursor:help" class="tTip" title="Cor de fundo dos blocos de artigos da página inicial." src="<?=$ROOTPATH?>/media/css/i/info.png"></div></div>
												<div  class="form-item" style="width:629px;margin-top:11px;clear: both;">   <div class="imagemcolor" style="margin-top:12px;margin-left:97px;float:left;"><img  style="width: 247px;" src="<?= $ROOTPATH ?>/media/css/i/bloco_form.png"></div> <div  class="campocolor"><input style="margin-left:73px; width: 80px;" type="text"   name="other[cor_bloco_form]"  class="colorwell" value="<?php echo $INI['other']['cor_bloco_form']; ?>"  /><img style="cursor:help" class="tTip" title="Cores que compõe o formulário de busca." src="<?=$ROOTPATH?>/media/css/i/info.png"></div></div>
												<div  class="form-item" style="width:629px;margin-top:11px;clear: both;">   <div class="imagemcolor" style="margin-top:12px;margin-left:97px;float:left;"><img  style="width: 247px;" src="<?= $ROOTPATH ?>/media/css/i/bloco_artigo_texto.png"></div> <div  class="campocolor"><input style="margin-left:73px; width: 80px;" type="text"   name="other[bloco_artigo_texto]"  class="colorwell" value="<?php echo $INI['other']['bloco_artigo_texto']; ?>"  /><img style="cursor:help" class="tTip" title="Cor de fundo do título dos artigos da página inicial." src="<?=$ROOTPATH?>/media/css/i/info.png"></div></div>
												<!-- <div  class="form-item" style="width:629px;margin-top:11px;clear: both;">   <div class="imagemcolor" style="margin-top:12px;margin-left:97px;float:left;"><img  style="width: 247px;" src="<?= $ROOTPATH ?>/media/css/i/rodapedetalhe.jpg"></div> <div  class="campocolor"><input style="margin-left:73px; width: 80px;" type="text"   name="other[rodapedetalhe]"  class="colorwell" value="<?php echo $INI['other']['rodapedetalhe']; ?>"  /><img style="cursor:help" class="tTip" title="Cor de fundo da parte inferior do bloco informações na página de detalhe da oferta. Deixe em branco para voltar com a imagem original." src="<?=$ROOTPATH?>/media/css/i/info.png"></div></div> -->
											</div>
										</div>
									</div>
								</div>
 
								<!-- redes -->
 								<input type="hidden" size="30" name="other[app_id_login]" value="<?php echo $INI['other']['app_id_login']; ?>"/>
								<input type="hidden" size="30" name="other[admin_id_login]" value="<?php echo $INI['other']['admin_id_login']; ?>"/>
								<input type="hidden" size="30" name="other[admin_id]" value="<?php echo $INI['other']['admin_id']; ?>"/>
								<input type="hidden" size="30" name="other[app_id]" value="<?php echo $INI['other']['app_id']; ?>"/> 
								<input type="hidden" size="30" name="pg" value="<?php echo $_REQUEST['pg'] ?>"/>
								<input type="hidden" size="30" name="other[twitter]" value="<?php echo $INI['other']['twitter']; ?>"/>
								<input type="hidden" size="30" name="other[facebook]" value="<?php echo $INI['other']['facebook']; ?>"/>
								<input type="hidden" size="30" name="other[box-facebook]" value="<?php echo $INI['other']['box-facebook']; ?>"/>
								<input type="hidden" size="30" name="other[usuario_twitter]" value="<?php echo $INI['other']['usuario_twitter']; ?>"/>
								<input type="hidden" size="30" name="other[id_twitter]" value="<?php echo $INI['other']['id_twitter']; ?>"/>
								<input type="hidden" size="30" name="other[orkut]" value="<?php echo $INI['other']['orkut']; ?>"/> 
						
							</form>
						</div>
					</div>
					<div class="box-bottom"></div>
				</div>
			</div>

			<div id="sidebar">
			</div>

		</div>
	</div> <!-- bd end -->
</div> <!-- bdw end -->
<script>
	function validador(){
		return true;
	}
</script>
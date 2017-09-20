<?php include template("manage_header");?>

<?php
 
$option_posicao = array(
	"6"=>"É a Oferta Destaque",
	"1"=>"Apareça na coluna do meio",
	"4"=>"Apareça na coluna da direita",
	"3"=>"Apareça na coluna da esquerda",
	"7"=>"Apareça apenas em ofertas recentes",
	"5"=>"Oferta Desativada (Não aparece no site)"
);
 
?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="leader">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_afiliados($selector); ?></ul>
	</div> 
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
				<?php if($team['id']){?>
					<h2>Editar produto de anunciante</h2> 
				<?php } else { ?>
					<h2>Criar produto de anunciante</h2>
				<?php }?>
				</div>
                <div class="sect">
				<form id="-user-form" method="post" action="/vipmin/afiliado/produtoedit.php?id=<?php echo $team['id']; ?>" enctype="multipart/form-data" class="validator" onSubmit="return validador()">
					<input type="hidden" name="id" value="<?php echo $team['id']; ?>" />
					<div class="wholetip clear"><h3>Informações Basicas</h3></div>
					<div class="field" style="display:none">
						<label>Tipo de Oferta</label>
						<select id="team_type" id="team_type" name="team_type"  class="f-input" style="width:228px;" onchange="X.team.changetype(this.options[this.options.selectedIndex].value);"><?php echo Utility::Option($option_teamtype, $team['team_type']); ?></select><select id="city_id" name="city_id" class="f-input" style="width:160px;"><?php echo Utility::Option(Utility::OptionArray($allcities, 'id','name'), $team['city_id'], 'todas as cidades'); ?></select>
						<select name="group_id" class="f-input" style="width:160px;"><?php echo Utility::Option($groups, $team['group_id']); ?></select>
					</div>
					<div class="field">
						<label>Produto</label>
						<input type="text" size="30" name="title" id="team-create-title" class="f-input" value="<?php echo htmlspecialchars($team['title']); ?>" datatype="require" require="true" />
					</div>
					<div class="field">
						<label>Categoria</label> 
						 <select name="group_id" class="f-input" style="width:160px;"><?php echo Utility::Option($groups, $team['group_id']); ?></select><a href="/vipmin/category/index.php?zone=group"><span class="inputtip">Cadastrar categoria</span></a>
					 </div>	
					
					<div class="field">
						<label>URL</label>
						<input type="text" size="30" name="url" id="url" class="f-input" value="<?php echo htmlspecialchars($team['url']); ?>" datatype="require" require="true" />
						<span class="inputtip">Endereço do link completo do detalhe deste produto no site do parceiro inclusive com http://</span>
					</div>
				
					<div class="field"><label>Posicionamento </label>
					  <select  onchange="verlayout();" datatype="require" require="true" name="posicionamento" id="posicionamento" class="f-input" style="width:712px;">
						<option value="">Escolha</option>
				        <?php echo Utility::Option($option_posicao, $team['posicionamento']); ?>
					 </select>

					</div>	
					 
					<div class="field" id="c_valores">
						<label>De R$</label>
						<input type="text" size="10" name="market_price" id="team-create-market-price" class="number" value="<?php echo moneyit($team['market_price']); ?>" datatype="money" require="true" />
						<label>Por R$</label>
						<input type="text" size="10" name="team_price" id="team_price" class="number" value="<?php echo moneyit($team['team_price']); ?>" datatype="double" require="true" />
						  
					 </div>
					<div id="c_quantidades">
						<div class="field">
						<label>Quant. virtual</label>
						<input type="text" size="10" name="pre_number" id="pre_number" class="number" value="<?php echo intval($team['pre_number']); ?>" datatype="number" require="true" />
						<span class="hint"> Quant. de compradores virtuais </span>						
						</div>
					 </div>
					
					<div class="field">
						<label>Começar em</label>
						<input type="text" size="30" name="begin_time" id="" class="numberd" xd="<?php echo date('d-m-Y', $team['begin_time']); ?>" xt="<?php echo date('H:i:s', $team['begin_time']); ?>" value="<?php echo date('d-m-Y H:i:s', $team['begin_time']); ?>" maxlength="30" /></div>
						<div class="field">
						<label>Terminar em</label>
						<input type="text" size="30" name="end_time" id="" class="numberd" xd="<?php echo date('d-m-Y', $team['end_time']); ?>" xt="<?php echo date('H:i:s', $team['end_time']); ?>" value="<?php echo date('d-m-Y H:i:s', $team['end_time']); ?>" maxlength="30" /></div>
					 
						 
					<div class="wholetip clear"><h3>Descrição da Oferta</h3></div>
						<span style="margin-left:22px;"  class="hint">DICA: Se você está copiando esta descrição de algum site ou documento, recomendamos primeiro copiar e colar no bloco de notas, logo em seguida, copie do bloco de notas e cole aqui no editor. Isto irá retirar todas as formatações indevidas.<br></span>
					 <div class="field">
						<div style="float:left;"><textarea cols="45" rows="5" name="summary" id="team-create-summary" class="f-textarea editor2" datatype="require" require="true"><?php echo htmlspecialchars($team['summary']); ?></textarea></div>
					</div>
					<div class="wholetip clear"><h3>Regulamento</h3></div>
					<span style="margin-left:22px;"  class="hint">DICA: Se você está copiando esta descrição de algum site ou documento, recomendamos primeiro copiar e colar no bloco de notas, logo em seguida, copie do bloco de notas e cole aqui no editor. Isto irá retirar todas as formatações indevidas<br></span>
					<div class="field">
						 <div style="float:left;"><textarea cols="45" rows="5" name="notice" id="team-create-notice" class="f-textarea editor1" style="width:710px;height:150px;"><?php echo $team['notice']; ?></textarea></div>
						<span id="result_box" lang="pt" xml:lang="pt"><span class="hint">descrever o regulamento e a validade da oferta</span></span></div>
					<!--kxx -->
					<div class="field">
						<label>Ordem</label>
						<input type="text" size="10" name="sort_order" id="team-create-sort_order" class="number" value="<?php echo $team['sort_order'] ? $team['sort_order'] : 0; ?>" datatype="number"/><span class="inputtip">Ordenação das ofertas dos bloco lateral e rodapé (ordem crescente)</span>
					</div>
					<!--xxk-->
					<input type="hidden" name="guarantee" value="Y" />
					<input type="hidden" name="system" value="Y" />
					<div class="wholetip clear"><h3>2. Informações desta Oferta</h3></div>
					<div class="field">
						<label>Anunciante</label>  
						<select style="width: 352px;" id="partner_id" name="partner_id" datatype="require" require="require" class="f-input" style="width:200px;">
						 <option value="">Informe de onde é este produto</option>
						<?php echo Utility::Option($partners, $team['partner_id']); ?></select> 
					</div>
					  
					<div class="field">
					  <label>Foto 1</label>
						<input type="file" size="30" name="upload_image" id="team-create-image" class="f-input" />
						<span id="titpadrao1" class="hint"></span>
						<?php if($team['image']){?><span class="hint"><?php echo team_image($team['image']); ?></span><?php }?>
					</div>
                    <div id="imgpadrao">
					<div class="field">
						<label>Foto 2</label>
						<input type="file" size="30" name="upload_image1" id="team-create-image1" class="f-input" /> 
						<span id="titpadrao2" class="hint"> </span>
						<?php if($team['image1']){?><span class="hint" id="team_image_1"><?php echo team_image($team['image1']); ?>&nbsp;&nbsp;<a href="#" onclick="X.team.imageremove(<?php echo $team['id']; ?>, 1);">delete</a></span><?php }?>
					</div>
					<div class="field">
						<label>Foto 3</label>
						<input type="file" size="30" name="upload_image2" id="team-create-image2" class="f-input" /> 
						<span id="titpadrao3" class="hint"></span>
						<?php if($team['image2']){?><span class="hint" id="team_image_2"><?php echo team_image($team['image2']); ?>&nbsp;&nbsp;<a href="#" onclick="X.team.imageremove(<?php echo $team['id']; ?>, 2);">delete</a></span><?php }?>
				                                                                                                                               
                    </div>
					</div>
				  
                    <div id="galeriadivs">
					<div class="wholetip clear"><h3>3. Galeria de imagens da Oferta</h3></div>
				 
					<div class="field">
						<label>Foto 1</label>
						<input type="file" size="30" name="gal_upload_image1" id="gal_team-create-image1" class="f-input" />
						<span id="titgal" class="hint"></span>
						<?php if($team['gal_image1']){?><span class="hint" id="gal_team_image_1"><?php echo team_image($team['gal_image1']); ?>&nbsp;&nbsp;<a href="javascript:;" onclick="delimagem(<?php echo $team['id']; ?>, 1);">delete</a></span><?php }?>
					</div>
					<div class="field">
						<label>Foto 2</label>
						<input type="file" size="30" name="gal_upload_image2" id="gal_team-create-image2" class="f-input" />
						<span id="titgal"  class="hint"></span>
						<?php if($team['gal_image2']){?><span class="hint" id="gal_team_image_2"><?php echo team_image($team['gal_image2']); ?>&nbsp;&nbsp;<a href="javascript:;" onclick="delimagem(<?php echo $team['id']; ?>, 2);">delete</a></span><?php }?>
					</div>
						<div class="field">
						<label>Foto 3</label>
						
						<input type="file" size="30" name="gal_upload_image3" id="gal_team-create-image3" class="f-input" />
						<span id="titgal"  class="hint"></span>
						<?php if($team['gal_image3']){?><span class="hint" id="gal_team_image_3"><?php echo team_image($team['gal_image3']); ?>&nbsp;&nbsp;<a href="javascript:;" onclick="delimagem(<?php echo $team['id']; ?>, 3);">delete</a></span><?php }?>
					</div>
					<div class="field">
						<label>Foto 4</label>
						
						<input type="file" size="30" name="gal_upload_image4" id="gal_team-create-image4" class="f-input" />
						<span id="titgal"  class="hint"></span>
						<?php if($team['gal_image4']){?><span class="hint" id="gal_team_image_4"><?php echo team_image($team['gal_image4']); ?>&nbsp;&nbsp;<a href="javascript:;" onclick="delimagem(<?php echo $team['id']; ?>, 4);">delete</a></span><?php }?>
					</div>
					 <div class="field">
						<label>Foto 5</label>
						 
						<input type="file" size="30" name="gal_upload_image5" id="gal_team-create-image5" class="f-input" />
						<span id="titgal"  class="hint"></span>
						<?php if($team['gal_image5']){?><span class="hint" id="gal_team_image_5"><?php echo team_image($team['gal_image5']); ?>&nbsp;&nbsp;<a href="javascript:;" onclick="delimagem(<?php echo $team['id']; ?>, 5);">delete</a></span><?php }?>
					</div> 
					<div class="field">
						<label>Foto 6</label>
						
						<input type="file" size="30" name="gal_upload_image6" id="gal_team-create-image6" class="f-input" />
						<span id="titgal"  class="hint"></span>
						<?php if($team['gal_image6']){?><span class="hint" id="gal_team_image_6"><?php echo team_image($team['gal_image6']); ?>&nbsp;&nbsp;<a href="javascript:;" onclick="delimagem(<?php echo $team['id']; ?>, 6);">delete</a></span><?php }?>
					</div>
				   </div>
				   </div> 
			      <input type="submit" value="Salvar" name="commit" id="leader-submit" class="formbutton" style="margin:10px 0 0 120px;"/>
				</form>
                </div>
            </div>
            <div class="box-bottom" style="margin-top:56px;"></div>
        </div>
	</div>
<div id="sidebar">
</div>

<script type="text/javascript">

window.x_init_hook_teamchangetype = function(){
 
	X.team.changetype("{$team['team_type']}");
};

window.x_init_hook_page = function() {
	X.team.imageremovecall = function(v) {
	 
		jQuery('#team_image_'+v).remove();
	};
	X.team.imageremove = function(id, v) {
	 
		return !X.get(WEB_ROOT + '/ajax/misc.php?action=imageremoveafiliado&id='+id+'&v='+v);
	};
};

function verlayout(){
	
	if(jQuery("#layout").val() == "8"){ // bot slide 
		 jQuery("#titpadrao1").html("Largura ideal das imagens: 448px x 287px. Caso a imagem não tenha essas dimensões o sistema poderá fazer o redimensionamento distorcendo suas imagens")
		 jQuery("#titpadrao2").html("Largura ideal das imagens: 448px x 287px. Caso a imagem não tenha essas dimensões o sistema poderá fazer o redimensionamento distorcendo suas imagens")
		 jQuery("#titpadrao3").html("Largura ideal das imagens: 448px x 287px. Caso a imagem não tenha essas dimensões o sistema poderá fazer o redimensionamento distorcendo suas imagens")
		jQuery("#imgpadrao").show();
		jQuery("#galeriadivs").show();
	}
	if(jQuery("#layout").val() == "6"){ //  youtube full
		jQuery("#titpadrao1").html("Largura ideal das imagens: 396px x 250px. Caso a imagem não tenha essas dimensões o sistema poderá fazer o redimensionamento distorcendo suas imagens")
		jQuery("#imgpadrao").hide();
		jQuery("#galeriadivs").hide();
	}

	if(jQuery("#layout").val() == "9"){ // natual
		jQuery("#titgal").html("Largura ideal das imagens: 479px, altura 285px. Caso a imagem não tenha essas dimensões o sistema poderá fazer o redimensionamento distorcendo suas imagens")
		jQuery("#titpadrao1").html("Largura ideal das imagens: 479px, altura 285px. Caso a imagem não tenha essas dimensões o sistema poderá fazer o redimensionamento distorcendo suas imagens")
		jQuery("#imgpadrao").show();
		jQuery("#galeriadivs").show();
	} 
	if(jQuery("#posicionamento").val() == "6"){
		jQuery("#titgal").html("Largura ideal das imagens: 643px, altura 325px. Caso a imagem não tenha essas dimensões o sistema poderá fazer o redimensionamento distorcendo suas imagens")
		jQuery("#titpadrao1").html("Largura ideal das imagens: 643px, altura 325px. Caso a imagem não tenha essas dimensões o sistema poderá fazer o redimensionamento distorcendo suas imagens")
		jQuery("#imgpadrao").show();
		jQuery("#galeriadivs").show();
	}	
}

function verposicao(){
	if(jQuery("#posicionamento").val() == "6"){
		jQuery("#titgal").html("Largura ideal das imagens: 643px, altura 325px. Caso a imagem não tenha essas dimensões o sistema poderá fazer o redimensionamento distorcendo suas imagens")
		jQuery("#titpadrao1").html("Largura ideal das imagens: 643px, altura 325px. Caso a imagem não tenha essas dimensões o sistema poderá fazer o redimensionamento distorcendo suas imagens")
		jQuery("#imgpadrao").show();
		jQuery("#galeriadivs").show();
	}	
}
 
verlayout(); 


</script>

<script>

 
function delimagem(idoferta,numgaleria){
 
$.get("<?=$INI['system']['wwwprefix']?>/vipmin/delgal.php?id="+idoferta+"&gal="+numgaleria,
 			
   function(data){
      if(data==""){
     	alert("Imagem apagada com sucesso. Você pode finalizar a edição da oferta com calma, e depois clique no botão salvar para efetivar a exclusão desta imagem. ");
	  }  
	  else{
		  alert(data)
	  }
   });
}

function validador(){

	if( jQuery("#team-create-title").val()==""){

		alert("Por favor, informe o título do produto.");
		jQuery("#team-create-title").focus();
		return false;

	}	
 
	if( jQuery("#partner_id").val() =="" ){

		alert("Por favor, informe o anunciante deste produto");
		jQuery("#partner_id").focus();
		return false;
	}
	
	if( jQuery("#posicionamento").val()==""){

		alert("Por favor, informe o posicionamento da oferta.");
		jQuery("#posicionamento").focus();
		return false;
	}	
	
	if( jQuery("#url").val()==""){

		alert("Por favor, informe a url desta oferta");
		jQuery("#url").focus();
		return false;
	}
	
	 	
		
}

</script> 


</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->
 




<?php
	

?>


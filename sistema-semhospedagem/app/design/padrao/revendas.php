<?php 
	require_once("include/head.php"); 
	$pagetitle = $category['name']; 
	
	$estado = strip_tags(trim(urldecode($_POST['estado'])));
	$cidade = (int) strip_tags(trim(urldecode($_POST['cidade'])));
?> 
<script type="text/javascript" >
	J(document).ready(function(){

		function showLoader(){
			J('.search-background').fadeIn(200);
		}

		function hideLoader(){
			J('.search-background').fadeOut(200);
		};

		J("#paging_button li").click(function(){
			showLoader();
			J("#paging_button li").css({'background-color' : ''});
			J(this).css({'background-color' : '#D8543A'});
			J("#pgofertas").load(URLWEB+"/include/paginacao_post.php?idparceiro="+ID_PARCEIRO+"&page=" + this.id, hideLoader);
			return false;
		});
		
		J("#paging_button li").click(function(){
			showLoader();
			J("#paging_button li").css({'background-color' : ''});
			J(this).css({'background-color' : '#D8543A'});
			J("#pgofertas").load(URLWEB+"/include/paginacao_post.php?idparceiro="+ID_PARCEIRO+"&page=" + this.id, hideLoader);
			return false;
		});

		J("#1").css({'background-color' : '#D8543A'});
		showLoader();
		J("#pgofertas").load(URLWEB+"/include/paginacao_post.php?idparceiro="+ID_PARCEIRO+"&page=1&estado=<?php echo $estado; ?>&cidade=<?php echo $cidade; ?>", hideLoader);
	});
</script>
<body id="page1">
	
<style>
#page1 section .col-1b { 
    margin-top: 8px;
}
.filterbar-full {
	width: 722px;
}
.col-md-6 {
	width: 400px;
	float: left;
}
.col-md-6 select {
	width: 95%;
}
.filter-search {
	margin-bottom: 15px;
}
.filterbar-full {
	height: 170px !important;
	margin-top: 30px !important;
}
label {
	font-weight: bold;
	color: #666;
}
.btn-primary {
	background: #001372;
	color: #FFF;
	font-weight: bold;
	text-transform: uppercase;
	margin-top: 15px;
	width: 70px;
}
dd.planoNitroHomeDesc p {
	margin-top: 145px !important;
}
.chosen-container-single .chosen-search input[type="text"] {
	width: 93% !important;
}
</style>
<script>
	jQuery('document').ready(function(){
		jQuery('#estado-filter').change(function(){
			if(jQuery(this).val() != "") {
				
				jQuery.ajax({
					url: "<?php echo $ROOTPATH; ?>/ajax/filtro_pesquisa_publico.php",
					type: 'POST',
					data: { filtro: 'cidades', estado: jQuery('#estado-filter').val() },
					beforeSend: function() {
						jQuery('#cidade-filter').html('<option>Carregando...</option>');
					},
					success: function(r) {
						jQuery('#cidade-filter').html(r);
						jQuery('#cidade-filter').find('option:first-child').prop('selected', true).end().trigger('chosen:updated');
					}
				});
			}
		});	
	});
</script>
<link href="http://www.jqueryrain.com/wp-content/plugins/wp-bar/wpbar.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $PATHSKIN; ?>/css/bootstrap-chosen.css" rel="stylesheet" type="text/css" />
<script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
<script>
  jQuery(function() {
	jQuery('.chosen-select').chosen();
	jQuery('.chosen-select-deselect').chosen({ allow_single_deselect: true });
	
	/*
	jQuery('.chosen-select').on('change', function(evt, params) {
		var selectedValue = params.selected;
		alert(selectedValue);
	});
	*/
  });
</script>
<div style="display:none;" class="tips"><?=__FILE__?></div>
<div class="tail-top">
<?php  require_once(DIR_BLOCO."/bloco_background.php"); ?>
    <div class="main">
		<?php  require_once(DIR_BLOCO."/header.php"); ?>
		<section id="content">   
			<?php  require_once(DIR_BLOCO."/bannertopo.php"); ?>
            <div class="inside"> 
				<div class="container"> 
					<div class="col-1b">   
						<div class="container"> 
						     <div class="col-6" style="width:933px;margin-top:15px;" >
								<div class="search-background" style="z-index:999;margin-left:110px;">
								   <img src="<?=$PATHSKIN?>/images/loader.gif" alt="" /> 
								</div>
								<h2 style="font-size:15px;font-weight:600; font-family:montserrat;">Revendas</h2>
								<div class="filter-search">
									<form method="POST">
										<div class="col-md-6">
											<label>
												Estado:
											</label>
											<select data-placeholder="Escolha o estado" name="estado" id="estado-filter" class="chosen-select">
												<option value="">Escolha seu estado</option>
												<option value="AC">Acre</option>
												<option value="AL">Alagoas</option>
												<option value="AP">Amapá</option>
												<option value="AM">Amazonas</option>
												<option value="BA">Bahia</option>
												<option value="CE">Ceará</option>
												<option value="DF">Distrito Federal</option>
												<option value="ES">Espírito Santo</option>
												<option value="GO">Goiás</option>
												<option value="MA">Maranhão</option>
												<option value="MT">Mato Grosso</option>
												<option value="MS">Mato Grosso do Sul</option>
												<option value="MG">Minas Gerais</option>
												<option value="PA">Pará</option>
												<option value="PB">Paraíba</option>
												<option value="PR">Paraná</option>
												<option value="PE">Pernambuco</option>
												<option value="PI">Piauí</option>
												<option value="RJ">Rio de Janeiro</option>
												<option value="RN">Rio Grande do Norte</option>
												<option value="RS">Rio Grande do Sul</option>
												<option value="RO">Rondônia</option>
												<option value="RR">Roraima</option>
												<option value="SC">Santa Catarina</option>
												<option value="SP">São Paulo</option>
												<option value="SE">Sergipe</option>
												<option value="TO">Tocantins</option>
											</select>
										</div>
										<div class="col-md-6">
											<label>
												Cidade:
											</label>
											<select data-placeholder="Escolha a cidade" name="cidade" id="cidade-filter" class="chosen-select">
												<option value="">Escolha sua cidade</option>
											</select>
										</div>
										<div class="col-md-6">
											<input type="submit" value="Buscar" class="btn btn-primary">
										</div>
									</form>	
								</div>
								<!-- DIV DAS OFERTAS RECENTES -->
								<div id="pgofertas" style="margin-top:12px;"></div>
								<!-- FIM DIV DAS OFERTAS RECENTES -->
								
								<!-- NUMERO DAS PÁGINAS -->
								<br style="clear:both;">
								<div id="pgofertas">
								<? require_once("include/paginacao.php"); ?> 
								</div>
								
							</div> 
						</div> 
					</div>
				</div>
			</div>
        </section>
    </div>
</div> 
 
 <?php require_once(DIR_BLOCO."/rodape.php"); ?>

  
	
</body>
</html>

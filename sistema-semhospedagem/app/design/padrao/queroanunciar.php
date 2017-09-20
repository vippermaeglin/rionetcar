 <?php  require_once("include/head.php"); ?>
<body id="page1">
<div style="display:none;" class="tips"><?=__FILE__?></div>
<div class="tail-top">
<?php  require_once(DIR_BLOCO."/bloco_background.php"); ?>
    <div class="main">
       <?php  require_once(DIR_BLOCO."/header.php"); ?>
		<section id="content"> 
			<?php  require_once(DIR_BLOCO."/bannertopo.php"); ?>
            <div class="inside">
				<div class="container" >
					<div class="col-1c fundon">
						<div class="container">
						   <div class="col-6" style="width:914px" >  
							 <div class="size-12 showgridx" style="float:left;width:100%;"> 
								<h4 class="size-19-bold" style="text-align:left;padding:0px;color:#303030;">Como Anunciar ?</h4>	
								<span style="color:#000000;">Saiba os passos para anunciar seu veículo no <?php echo utf8_decode( $INI['system']['sitename']); ?>.</span>
								<div class="size-12 raio-5 borda-box-conteudo margin-bottom-20 width923" style="color:#000"> 
								<div style="float:left;width:220px;"><img src="<?=$PATHSKIN?>/images/user.png"><img style="margin-top:46px;" src="<?=$PATHSKIN?>/images/setadir.png"><div style="width:181px;">Pedimos a gentileza de efetuar o cadastro no site, basta clicar no menu superior direito da tela ou clique em entrar, caso já tenha se cadastrado</div></div>
								<div style="float:left;width:220px;"><img src="<?=$PATHSKIN?>/images/news.png"> <img style="margin-top:46px;" src="<?=$PATHSKIN?>/images/setadir.png"><div style="width:181px;">Clique em Quero Anunciar no menu principal e preencha as informações do veículo que deseja anunciar</div></div>
								<div style="float:left;width:220px;"><img src="<?=$PATHSKIN?>/images/pag.png"> <img style="margin-top:46px;" src="<?=$PATHSKIN?>/images/setadir.png"><div style="width:181px;">Escolha um plano e a melhor forma de pagamento para seu anúncio</div></div>
								<div style="float:left;width:220px;"><img src="<?=$PATHSKIN?>/images/check.png"><div style="width:181px;">Pedimos a gentileza de aguardar a liberação do anúncio, aguarde até 24 horas úteis que iremos analisar seu anúncio e se tiver idôneo ser publicado</div></div>
								</div> 
								 
									<button  id="btnEnviar"  style="width:230px;float:left;"  title="Enviar" data-tipo-anuncio="Usados" data-tipo-veiculo="Carro" data-id="11239890"   class="span-4 last raio-5 size-14-bold bt-cinza2 margin-top-10">Quero Anunciar</button>
									<a href="#" class="tk_logar" id="link_logar" />
									
							 </div>  
							 
									<div class="size-12" style="color:#000000;margin-top:10px;">Dúvidas: Perguntas Frequentes <a href="/contato">Clique aqui</a></div>
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

<script>
	jQuery(document).ready(function($) {
		   $('#btnEnviar').click(function(event){
				 //onclick="location.href='<?=$ROOTPATH?>/index.php?page=planos'"
				 var login_user = "<?=$login_user['username']?>";
				if(login_user == ""){
					 $(document).on('ready simularClique', function() {
						var filtroCoberturas = $('#link_logar');
						filtroCoberturas.click();
					 });
					// Chama a função de clique através do trigger
					$(document).trigger('simularClique');
				}else{
					location.href='<?=$ROOTPATH?>/index.php?page=planos';
				}
		   });
		});
</script>

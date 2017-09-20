<?php include template("manage_header"); ?>
<!--
<link class="jsbin" href="/media/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="/media/js/jquery-ui.js"></script>

<script src="http://malsup.github.com/jquery.form.js"></script> 
-->

<link rel="stylesheet" href="/media/css/template.css" />

<style>
.submenu-box, div.m {
  margin-left: 0;
}
</style>

<div id="bdw" class="bdw">
	<div id="bd" class="cf">
		<div id="system">
			<style>
				#f1_upload_process{
					z-index:100;
					position:absolute;
					visibility:hidden;
					text-align:center;
					width:100px;
					margin:0px;
					padding:0px;
					background-color:#fff;
					border:1px solid #ccc;
				}
				.submenu-box, div.m {
					background-color: #131F27 ;
					color:#fff;
					margin-left: 0;
				}
			</style>
			<div class="dashboard" id="dashboard">
				<ul><?php echo mcurrent_system('redes'); ?></ul>
			</div>
			<div id="content" class="clear mainwide">
				<div class="clear box">
					<div class="box-top"></div>
					<div class="box-content">
						<div class="option_box">
							<div class="top-heading group">
								<div class="left_float"><h4>Gerenciar Imagens <!--<span class="cpanel-date-hint"><a href="/vipmin/system/gerenciador.php" target="_blank">Abrir Gerenciador</a></span>--></h4></div>
							</div> 
								<div class="m" style="border:0px;">
								<span class="cpanel-date-hint"> Para alterar uma imagem, clique com o botão direito em cima de alguma imagem abaixo e escolha a opção "salvar imagem", note que esta opção pode ter outro nome dependendo do seu navegador. Após salvar a imagem para o seu computador, edite a imagem no seu editor de imagens preferido e depois faça o upload da imagem novamente. Você também pode criar as suas imagens e substituir por aqui tambem.</span>
									<div class="adminform" style="width:100%;">
										<div class="cpanel-left" style="width:100%;">
											<div class="cpanel">
											
											<div id="container_box">
									  
											<div id="option_contents" class="option_contents"> 
										
												<div class="form-contain group" id="tabela-imagens" style="background-color:#E1E5E8;">
												</div> 
											</div>
								<center id="link"><a style="font-size: 19px;" href="?itens=0" id="mais-itens">Mais itens...</a></center>
							</div></div></div></div></div>
						</div>                

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
	
	function startUpload(){
		document.getElementById('f1_upload_process').style.visibility = 'visible';
		return true;
	}

	function stopUpload(success){
		 
		var result = '';
		if (success == 1){
			jQuery(document).ready(function(){   
				jQuery.colorbox({html:"<font color=blue>o arquivo foi carregado com sucesso. Dimensões exatas, parabéns.</font>"});
			});
		}   
		else if (success == 2){
 
			jQuery(document).ready(function(){   
				jQuery.colorbox({html:"<font color=red>O arquivo foi enviado com sucesso porém as dimensões do arquivo enviado não bate com as dimensões corretas. Verifique se não prejudicou o layout.</font>"});
			});
		} 
		else {
            jQuery(document).ready(function(){   
				jQuery.colorbox({html:"<font color=red>Não foi possível enviar o arquivo.</font>"});
			});
		 
		}
		/*else {
         document.getElementById('result').innerHTML =  '<span class="emsg">Ocorreu um erro no envio do arquivo !<\/span><br/><br/>';
      }*/
 
		document.getElementById('f1_upload_process').style.visibility = 'hidden';
		return true;   
	}
	
</script>

<script>
	jQuery(document).ready(function(){  
		//jQuery(".outrosplanos").colorbox({inline:true, href:"#inline_outrosplanos"}); //width:"50%",
		jQuery(".caixabox").colorbox({ width:"70%",heigth:"70%"});

		$("#mais-itens").click(function(e){

			if($("#mais-itens").text() == 'Carregando...'){
				alert('Aguarde enquanto as imagens são carregadas!');
				return false;
			}

			var el = $(this);
			el.html('Carregando...');
			var href = el.attr("href").split('=');
			var link = href[1];
			var proxima_pagina = (parseInt(link)+24);
			var inicia = (parseInt(link) + 1);
			$.post('imagens.php', {itens: proxima_pagina, inicia:inicia}, function(data){
				if(proxima_pagina % 2 == 0){
					$("#tabela-imagens").append(data);
				}else{
					$("#tabela-imagens").append(data);
				}
            
				el.attr( 'href', 'mais-itens.php?itens='+proxima_pagina+'&inicia='+inicia);
				el.html( 'Mais itens... ');
			});
			e.preventDefault();
		});

		$("#mais-itens").click();

		$('input[class="alterar-imagem"]').live('click', function(e){
			
			var img_original = e.currentTarget.id;
			
			$.get('uploadimagens.php', function(data) {
				$('body').append(data);
				$('#alterar-imagem').dialog({width:400});
				$('#img_original').val(img_original);
			});
		});
	});
</script>
<?php include template("manage_footer"); ?>
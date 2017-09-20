<?php include template("manage_header"); ?>
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>

<!-- Load Queue widget CSS and jQuery -->
<style type="text/css">@import url(/js/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css);</style>
<link rel="stylesheet" href="/js/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css" />

<!-- Third party script for BrowserPlus runtime (Google Gears included in Gears runtime now) -->
<script type="text/javascript" src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>

<!-- Load plupload and all its runtimes and finally the jQuery queue widget -->
<script type="text/javascript" src="/js/plupload/js/plupload.full.js"></script>
<script type="text/javascript" src="/js/plupload/js/jquery.plupload.queue/jquery.plupload.queue.js"></script>

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
								<div class="left_float"><h4>Gerenciador de Imagens</h4></div>
							</div> 
							<div id="container_box">
								<div id="option_contents" class="option_contents"> 
									<div class="form-contain group">
										<form>
											<p>Envie arquivos com o mesmo nome do arquivo que deseja alterar e o mesmo será substituido.</p>
											<p>Informe o diretório das imagens: <input type="text" name="diruploads" id="diruploads" class="width:50px" /> </p>
											<div id="html5_uploader">Seu navegador não oferece suporte nativo de upload.</div>
										</form>
									</div> 
								</div>
							</div>
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

		// Setup html5 version
		$("#html5_uploader").pluploadQueue({
			// General settings
			runtimes : 'html5',
			url : 'gerenciador.php',
			max_file_size : '5mb',
			chunk_size : '1mb',
			unique_names : true,

			// Resize images on clientside if we can
			resize : {width : 320, height : 240, quality : 90},

			// Specify what files to browse for
			filters : [
				{title : "Image files", extensions : "jpg,gif,png"},
				//				{title : "Zip files", extensions : "zip"}
			]
		});
		
		$('.plupload_button plupload_start plupload_disabled').mousemove(function(){
			alert(1);
		});
		
		// Client side form validation
		$('form').submit(function(e) {
			var uploader = $('#html5_uploader').pluploadQueue();

			// Files in queue upload them first
			if (uploader.files.length > 0) {
				// When all files are uploaded submit form
				uploader.bind('StateChanged', function() {
					if (uploader.files.length === (uploader.total.uploaded + uploader.total.failed)) {
						$('form')[0].submit();
					}
				});
                
				uploader.start();
			} else {
				alert('Você deve enviar pelo menos um arquivo.');
			}

			return false;
		});

	});
</script>
<?php include template("manage_footer"); ?>
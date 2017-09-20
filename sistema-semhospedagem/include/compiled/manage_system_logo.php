<?php include template("manage_header"); ?>

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
								<div class="left_float"><h4>Alterar Logos</h4></div>
							</div> 
							<div id="container_box">
								<div id="option_contents" class="option_contents"> 

									<div class="form-contain group">
										<!-- =============================   coluna esquerda   =====================================-->
										<div class="starts">

											<div style="clear:both;"class="report-head">Logo: <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<img src="<?= $ROOTPATH ?>/include/logo/logo.png" width="230" height="110"     />

												<form name="img1" action="<?php echo $INI['system']['wwwprefix'] ?>/include/upload.php?nome=logo&width=300&height=98" target="upload_target" method="post" enctype="multipart/form-data"   onsubmit="startUpload();" >
													<h3>Arquivo</h3>
													<div class="field" style="width: 550px;">
														<input name="myfile" type="file" />
														<input type="submit" name="submitBtn"  class="formbutton" value="Upload" />
														<span class="inputtip">Resolução ideal (300 x 98) </span>
													</div>
													<input type="hidden" value="<?php echo $INI['system']['wwwprefix'] ?>" id="local" name="local">
													<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>                 
													<p  id="f1_upload_process">Carregando...<br/></p>
													<p id="result"></p>
												</form>
											</div> 
										</div>
										<!-- =============================   fim coluna esquerda   =====================================-->
										<!-- =============================   coluna direita   =====================================-->
										<div class="ends">
										 
										</div>
										<!-- =============================  fim coluna direita  =====================================-->
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
				location.href="<?=$ROOTPAHT?>/vipmin/system/logo.php";
			});
		}   
		else if (success == 2){
 
			jQuery(document).ready(function(){   
				jQuery.colorbox({html:"<font color=red>O arquivo foi enviado com sucesso porém as dimensões do arquivo enviado não bate com as dimensões corretas. Verifique se não prejudicou o layout.</font>"});
				location.href="<?=$ROOTPAHT?>/vipmin/system/logo.php";
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
	});
</script>
<?php include template("manage_footer"); ?>
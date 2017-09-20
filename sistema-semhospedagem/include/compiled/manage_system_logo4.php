<?php include template("manage_header");?>

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
				<h2> Imagens Diversas <?=$_REQUEST['pg']?> </h2>	
				</div>
				
				<?php
				
				$imagens_excluidas = array 
				( 
				'bg1.jpg', 
				'smscel.png', 
				'oferta_encerrada2.png', 
				'top.png', 
				'medalha.png', 
				'palheta.png', 
				'logoweb.png', 
				'ico_compras2.png', 
				'fechar.png', 
				'ofertashome.jpg',
				'btn_comprarb.png', 
				'btn_comprar_over_.png', 
				'btn_comprar_.png', 
				'bg-deals-seconds_on.png', 
				'bg-deals-default-isopen2.png', 
				'bg_relogio3.png', 
				'bg_esgotada.png', 
				'bg_esgotada6.png', 
				'bg_esgotada4.png', 
				'landing_cards.png', 
				'imagemhome.jpg', 
				'imagemhome.png', 
				'twitter.jpg', 
				'subscribe-pic3.jpg', 
				'redesocial5.jpg', 
				'redeshor.jpg', 
				'redes_sociais3.jpg', 
				'redeglobo.jpg', 
				'paypal_logo.jpg', 
				'paypal.jpg', 
				'open.jpg', 
				'open3.jpg', 
				'open2.jpg', 
				'newsletterIMG.jpg', 
				'maisofertas.jpg', 
				'maisofertacomprar.jpg', 
				'img5.jpg', 
				'img4.jpg', 
				'img3.jpg', 
				'img2.jpg', 
				'img1.jpg', 
				'logoyahoo.jpg', 
				'opengmail.jpg', 
				'sms.gif', 
				'tail1.gif', 
				'tail.gif', 
				'linkedin_logo.jpg', 
				'paypal.png', 
				'bg1.gif',
				'bg.gif',
				'top.gif',
				'bg_links_cima.png', 
				'login_01.png', 
				'iconeorkut.jpg', 
				'bg_cont.png', 
				'bg_input4.png', 
				'bg-rating.png', 
				'bgpreto.png', 
				'iconelinkedin.jpg', 
				'bg_relogio2.png', 
				'iconehotmail.jpg', 
				'C�pia de top.gif', 
				'Cópia de top.gif', 
				'cones_redes_sociais.jpg', 
				'iconeyahoo.jpg', 
				'iiconetwitter.jpg', 
				'iconegmail.jpg', 
				'iconefacebook.jpg', 
				'msnhot.png', 
				'facebook_logo.jpg', 
				'bullet-time.jpg', 
				'x.gif', 
				'twitter.gif',
				'oferta_encerrada.png',
				'bg_esgotada2.png', 
				'smscel.gif', 
				'paypal_logo.gif', 
				'paypal.gif', 
				'iconetwitter.jpg', 
				'orkut.gif', 
				'marker.gif', 
				'marker1.gif', 
				'facebook.gif', 
				'bg_relogio.png', 
				'bt_fechar_layer.gif', 
				'bot.gif', 
				'icones_redes_sociais.png', 
				'bg_input5.gif', 
				'bg_input4.gif', 
				'bg_input2.gif', 
				'bg1.png', 
				'top.gif', 
				'bg.png', 
				'bg_input.gif',
				'bg_input1.gif', 
				'banner_cartoes.gif', 
				'banner_cartao.gif',  
				'ajax-loader6.gif', 
				'ajax-loader5.gif', 
				'ajax-loader4.gif', 
				'moip2.png', 
				'pagamento_digital.png' 
				); 

				function getExtensao($arquivo) {
	
					$extensao = array_reverse(explode(".",$arquivo));
					
					return $extensao[0];
					
				}
  
				$dir =  WWW_ROOT."/skin/padrao/images";
				$dh = opendir($dir);
				if($dh){
	
					while ($file = readdir($dh)){
				 
						 if($cont>60 and $cont<=90){
								$cont++;
						  }else{
							$cont++;
							continue;
						  }
						 
						 if ( getExtensao($file) == "png" or getExtensao($file) == "jpg" or getExtensao($file) == "gif" or getExtensao($file) == "jpeg" ) {
							 
							 if(!strpos($file, "v")) {
							 }
							 
							 if (in_array($file, $imagens_excluidas) === true){
									continue;
							 }
							 
							 $imagesize = getimagesize($dir."/".$file); // Pega os dados
							 $x = $imagesize[0]; // 0 será a largura.
							 $y = $imagesize[1]; // 1 será a altura
						?> 
						
						<div class="sect" style="background:#ADD8E6;width:881px;">
							<p  id="f1_upload_process">Carregando...<br/></p>
							<br>
							<p id="result"></p>
							  
							 <form action="<?php  echo  $INI['system']['wwwprefix'] ?>/include/upload.php?nome=<?=$file?>" method="post" enctype="multipart/form-data"  target="upload_target" onsubmit="startUpload();" >
								 <div class="wholetip clear"></div>
								   <div class="field">
								   <img src="<?=$ROOTPATH?>/skin/padrao/images/<?=$file?>" width="<?=$x/1.5?>" height="<?=$y/1.5?>"  title="<?=$file?>" alt="<?=$file?>"  />
										
											<input name="myfile" type="file" />
											<input type="submit" name="submitBtn"  class="formbutton" value="Upload" />
											<span class="inputtip"><?=$file?> - Resolução ideal (<?=$x?> x <?=$y?>) </span>
											 <span class="hint"> <? $dir ."/".$file?> </span>
									 </div>
									 <input type="hidden" value="<?php  echo  $INI['system']['wwwprefix'] ?>" id="local" name="local">
									 <input type="hidden" value="diversas" id="tipo" name="tipo">
									 </form> 
									<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>                 
				
								</form>
							</div>
						 <? 
						}
						else{
							//echo "nenhum extensao valida";
						}
					}
				}
				else{
					echo "Nao foi possivel abrir o diretorio de imagens $dir";
				}

				?>
				<!-- 	
				<div class="head"><h2>Personalizar cores do site</h2></div>
                <div class="sect">
				   <a href="<?=$ROOTPATH?>/vipmin/layout.php" class="caixabox"><img src="<?=$ROOTPATH?>/skin/padrao/images/palheta.png"  title="Clique para ir para a área de edição de cores" alt="Clique para ir para a área de edição de cores"  /></a>
                	
				 </div>
			-->
				  
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
	});
</script>

 




<?php


?>

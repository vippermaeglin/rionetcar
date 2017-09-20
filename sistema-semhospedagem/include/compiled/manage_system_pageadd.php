<?php include template("manage_header");?>

<script type="text/javascript" src="/media/js/tinymce_pt/jscripts/tiny_mce/tiny_mce.js"></script> 
<script type="text/javascript" src="/media/js/tinymce_pt/jscripts/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script> 
<script src="/media/js/include_tinymce.js" type="text/javascript"></script> 
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
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner"> 
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">  
				<input  type="hidden"  value="<?=$id ?>" name="idmodelo"  id="idmodelo"  >
				<input  type="hidden"  value="<?=$id?>" name="id"  id="id"  >
				<input  type="hidden"  value="" name="cpverifica_categoria"  id="cpverifica_categoria"  >
				<div class="option_box">
					 <div class="top-heading group">
							<div class="left_float"><h4><b><span name="modificacao" id="modificacao"></span></b> </h4></div>
							<div class="the-button" style="width:570px;">
								<input type="hidden" value="remote" id="deliverytype" name="deliverytype">
								<button onclick="javascript:location.href='pageadd.php'" id="run-button" class="input-btn" type="button"> <div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Nova</div></button> 
								<button onclick="salvar_modelo();" id="run-button" class="input-btn" type="button"> <div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Salvar</div></button>
								 <button onclick="visualizar();" id="run-button" class="input-btn" type="button"> <div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Visualizar</div></button>
								<button onclick="javascript:location.href='page.php'" id="run-button" class="input-btn" type="button"> <div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Listar</div></button>
							</div> 
						</div>  
				</div> 
				
				<div  class="option_box">  
					<div id="container_box">
						<div id="option_contents" class="option_contents"> 
							<div class="form-contain group"> 
							<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts" style="min-height:114px;"> 
									<div style="clear:both;"class="report-head">Título <span class="cpanel-date-hint"> Todas as páginas serão também adicionadas como novos modelos </span></div>
									<div class="group">
										<input type="text" name="titulo"   id="titulo" class="format_input" value="<?=$titulo?>" />  
									</div>	
				
									 
								<div style="clear:both;"class="report-head">Imagem de capa <span class="cpanel-date-hint">Apenas para miniatura na Home </span></div>
										 
								<div class="group">
										<? if($id){?> <img src="<?= $ROOTPATH ?>/media/paginas/<?=$id?>.png" width="220" height="152"     /><? } ?>

										<form name="img1" action="<?php echo $INI['system']['wwwprefix'] ?>/include/upload.php?nome=imagempagina&width=220&height=152" target="upload_target" method="post" enctype="multipart/form-data"   onsubmit="return startUpload();" >
											<h3>Arquivo</h3>
											<div class="field" style="width: 550px;"> 
												<input name="myfile" type="file" />
												<input type="submit" name="submitBtn"  class="formbutton" value="Upload" /><br>
												<span class="inputtip">Resolução ideal (220 x 166). Após clicar em upload e salvar a página, vá para a área pública e aperte ctrl+F5 para retirar o cache do navegador </span>
											</div>
											<input type="hidden" value="<?php echo $INI['system']['wwwprefix'] ?>" id="local" name="local">
											<input type="hidden" value="" id="idpagina" name="idpagina">
											<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>                 
											<p  id="f1_upload_process">Carregando...<br/></p>
											<p id="result"></p>
										</form>
									</div> 
											
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
								<div class="ends" style="min-height:109px;"> 
									
									<div class="report-head">Categoria <span class="cpanel-date-hint">Esta página será acessada quando o usuário clicar nesta categoria no menu de navegação</span></div>
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  name="idpai" id="idpai" onchange="$('#select_idpai').text($('#idpai').find('option').filter(':selected').text());verifica_categoria();"> 
										<option value=""> </option>
											 <?php  
													$indentacao = "....";
													$sql = "select * from category where ( idpai=0 or idpai is null) and tipo='pagina'";
													$rs = mysql_query($sql);
													while($l = mysql_fetch_assoc($rs)){
													 $selected ="";
													 if($category_id == $l['id']){
															$selected =  "selected";
													 }
		
														echo "<option value='$l[id]' $selected>".displaySubStringWithStrip($l[name],30)."</option>";
														exibe_filhos_page($l["id"],$indentacao,$category_id);
													}
													$tb = null; 

												 ?>
										</select>
										<div name="select_idpai" id="select_idpai" class="cjt-wrapped-select-skin">Informe a categoria</div>
										<div class="cjt-wrapped-select-icon"></div>
										</div> &nbsp;<img class="tTip" title="Você deve cadastrar categorias do tipo Página no menu Sistema->Categorias. Note que uma categoria do tipo Página é apenas para uma página. Você não pode associar uma categoria em 2 páginas." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>
									
									<div class="group">
										<div style="clear:both;"class="report-head">Notícia destaque na home: <span class="cpanel-date-hint">Sugerimos 3 destaques</span></div>
										<input style="width:20px;" type="radio" <? if($destaque  =="1" ){echo "checked='checked'";}?>  value="1" name="destaque" id="destaque" > Sim  &nbsp;   
										<input style="width:20px;" type="radio" <? if($destaque  =="0" or $destaque  ==""){echo "checked='checked'";}?>   name="destaque"  id="destaque"  value="0"> Não   &nbsp;<img class="tTip" title="Crie 3 páginas para que elas sejam notícias destaques na home. Notícias sobre veículos, novidades, tendências ou sobre o site. Páginas desativadas não aparecem no site." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									 </div>
									 
									<div class="group">
										<div style="clear:both;"class="report-head">Ativa: <span class="cpanel-date-hint"></span></div>
										<input style="width:20px;" type="radio" <? if($status  =="1" or $status  ==""){echo "checked='checked'";}?>  value="1" name="status" id="status" > Sim  &nbsp;   
										<input style="width:20px;" type="radio" <? if($status  =="0"){echo "checked='checked'";}?>   name="status"  id="status"  value="0"> Não   &nbsp;<img class="tTip" title="Páginas desativadas não aparecem no site. Isto pode ser ideal para você visualizar uma página antes de seus clientes. Para isso, salve a página como desativada, faça as alterações e ao finalizar, visualize, altere para ativa e clique no botão salvar." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									 </div>
									 
									 
									 <span class="cpanel-date-hint">Nota: Se retornar uma mensagem de erro ao salvar a página, verifique a formatação do conteúdo do editor. </span>
									 <span class="cpanel-date-hint">Isso pode acontecer se você copiou o texto de alguma página de internet. </span>
									 <span class="cpanel-date-hint">Primeiro, cole esse texto no bloco de notas para retirar a formatação. </span>
									 <span class="cpanel-date-hint">Em seguida, copie do bloco de notas e cole no editor. </span>
								</div> 
							</div> 
						</div>  
					</div> 
					<div class="sect" style="clear:both;" >
						<div class="field" style="width:99%">
							<textarea  id="value" style="width:100%;height:450px;" class="editor" name="value"><?php echo htmlspecialchars($value); ?></textarea> 
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
  
function visualizar( ){ 
		if(jQuery.trim(jQuery("#idmodelo").val()) != ""){ 
			
			  var windowSizeArray = [ "width=200,height=200",
                                    "width=300,height=400,scrollbars=yes" ];
    
				var url = "<?=$ROOTPATH?>/page/"+jQuery.trim(jQuery("#idmodelo").val());
				var windowName = "popUp";//$(this).attr("name");
				var windowSize = windowSizeArray[$(this).attr("rel")];

				window.open(url, windowName, windowSize);

				//event.preventDefault(); 
		}
		else{
			alert("Para visualizar esta página, você precisa salvá-la.")
		}
} 

function verifica_categoria( ){

	idcategoria = jQuery("#idpai").val();
 
    $.get("<?=$INI['system']['wwwprefix']?>/ajax/manage.php?idcategoria="+idcategoria+"&action=verifica_categoria",

	   function(data){
		  if(jQuery.trim(data)!=""){
			
			alert("Esta categoria já está associada na página :'"+data+"'. Por favor, primeiro remova esta associação no menu Páginas Estáticas e edite esta página.");
			 jQuery("#cpverifica_categoria").val("1");
		 
		  } 
		  else{
			 jQuery("#cpverifica_categoria").val(""); 
		}
	   });
	   
}

function salvar_modelo( ){
	  
   titulo = jQuery("#titulo").val();
   status = $('input[name=status]:checked').val();
   destaque = $('input[name=destaque]:checked').val();
   value = tinyMCE.get("value").getContent();
   idmodelo = jQuery.trim(jQuery("#idmodelo").val());
   idpai = jQuery("#idpai").val();
   mensagem=value.replace(/&/g,"|");
   
	if(titulo==""){
		alert("Por favor, informe o titulo da página")
		return;
   }    
   	if(idpai==""){
		//alert("Por favor, informe a categoria desta página. Caso não tenha nenhuma categoria, você deve cadastrar as categorias no menu Sistema->Categoria")
		//return;
   } 

   if(jQuery("#cpverifica_categoria").val()!=""){
		alert("Por favor, escolha uma outra categoria para esta página. Esta categoria já está sendo utilizada por outra página.");
		return;
   }  
   
   if(mensagem==""){
		alert("Por favor, informe algum conteúdo para esta página")
		return;
   }
  
  	jQuery(document).ready(function(){   
			jQuery.colorbox({html:"<div class='msgsoft'> <img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'>Estamos salvando a página..</div>"});
	}); 
	
$.ajax({
    url:"<?=$INI['system']['wwwprefix']?>/ajax/manage.php",
    type: 'post',
    contentType:"application/x-www-form-urlencoded",
    data: "idmodelo="+idmodelo+"&mensagem="+mensagem+"&titulo="+titulo+"&destaque="+destaque+"&status="+status+"&category_id="+idpai+"&action=salvar_pagina",
    success: function(retorno, status) {
	
		  if(jQuery.trim(retorno)!=""){
		   // alert(retorno)
			jQuery.colorbox({html:"<div class='msgsoft'> <img src='<?=$ROOTPATH?>/media/css/i/Accept-icon.png'> Página salva com sucesso.</div> "});
			idmodelo = jQuery.trim(jQuery("#idmodelo").val());
			$.get("<?=$INI['system']['wwwprefix']?>/include/funcoes.php?acao=pegadata", function(hora){jQuery("#modificacao").text("Hora da modificação: "+hora);})
			if(idmodelo=="" || idmodelo == "0" || idmodelo == "00"){
				retorno =jQuery.trim(retorno);
				jQuery("#idmodelo").val(retorno); 	
							
			}
		  }  
		  else{
			 jQuery.colorbox({html:"Erro ao salvar a página"});
		  }
	  
	},
    error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Desc: " + desc + "\nErr:" + err);
        }
    });

	/*
   $.post("<?=$INI['system']['wwwprefix']?>/ajax/manage.php?idmodelo="+idmodelo+"&value="+value+"&titulo="+titulo+"&status="+status+"&category_id="+idpai+"&action=salvar_pagina",

   function(data){
      if(jQuery.trim(data)!=""){
    	jQuery.colorbox({html:"<div class='msgsoft'> <img src='<?=$ROOTPATH?>/media/css/i/Accept-icon.png'> Página salva com sucesso.</div> "});
	    idmodelo = jQuery.trim(jQuery("#idmodelo").val());
		$.get("<?=$INI['system']['wwwprefix']?>/include/funcoes.php?acao=pegadata", function(hora){jQuery("#modificacao").text("Hora da modificação: "+hora);})
		if(idmodelo=="" || idmodelo == "0" || idmodelo == "00"){
			jQuery("#idmodelo").val(data);  
		}
	  }  
	  else{
		 jQuery.colorbox({html:"Erro ao salvar a página"});
	  }
   });*/
 	 
}

function salvar_modelo_como( ){
	  
   titulo = jQuery("#titulo").val();
   status = $('input[name=status]:checked').val();
   value = tinyMCE.get("value").getContent();
   idpai = jQuery("#idpai").val();
  value=value.replace(/&/g,"|");
  
   idmodelo = ""
   
	if(titulo==""){
		alert("Por favor, informe o titulo da página")
		return;
   }    
   	if(idpai==""){
		//alert("Por favor, informe a categoria desta página. Caso não tenha nenhuma categoria, você deve cadastrar as categorias no menu Sistema->Categorias")
		//return;
   }  
	if(jQuery("#cpverifica_categoria").val()!=""){
		alert("Por favor, escolha uma outra categoria para esta página. Esta categoria já está sendo utilizada por outra página.");
		return;
   } 
   if(value==""){
		alert("Por favor, informe algum conteúdo para esta página")
		return;
   }
  
  	jQuery(document).ready(function(){   
			jQuery.colorbox({html:"<div class='msgsoft'> <img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'>Estamos salvando esse modelo como um novo modelo.</div>"});
	}); 
    $.get("<?=$INI['system']['wwwprefix']?>/ajax/manage.php?idmodelo="+idmodelo+"&value="+value+"&titulo="+titulo+"&status="+status+"&category_id="+idpai+"&action=salvar_modelo",

   function(data){
      if(jQuery.trim(data)!=""){
    	jQuery.colorbox({html:"<div class='msgsoft'> <img src='<?=$ROOTPATH?>/media/css/i/Accept-icon.png'> Modelo salvo com sucesso.</div> "});
	    idmodelo = jQuery.trim(jQuery("#idmodelo").val());
		if(idmodelo=="" || idmodelo == "0" || idmodelo == "00"){
			jQuery("#idmodelo").val(data);
		}
	  }  
	  else{
		 jQuery.colorbox({html:"Erro ao salvar modelo"});
	  }
   });
 	 
} 
</script>
<script>

	function startUpload(){
		idmodelopage =  jQuery("#idmodelo").val();
	 
			if(idmodelopage ==""){
				alert("Para fazer o upload da imagem, é necessário salvar esta página primeiro");
				return false
			}
			
		jQuery("#idpagina").val( idmodelopage );
	 
		
		document.getElementById('f1_upload_process').style.visibility = 'visible';
		return true;
	}

	function stopUpload(success){
		 idmodelopage =  jQuery("#idmodelo").val();
		  
		var result = '';
		if (success == 1){
			jQuery(document).ready(function(){   
				jQuery.colorbox({html:"<font color=blue>o arquivo foi carregado com sucesso. Dimensões exatas, parabéns.</font>"});
				location.href="<?=$ROOTPAHT?>/vipmin/system/pageadd.php?id="+idmodelopage;
			});
		}   
		else if (success == 2){
 
			jQuery(document).ready(function(){   
				jQuery.colorbox({html:"<font color=red>O arquivo foi enviado com sucesso porém as dimensões do arquivo enviado não bate com as dimensões corretas. Verifique se não prejudicou o layout.</font>"});
				location.href="<?=$ROOTPAHT?>/vipmin/system/pageadd.php?id="+idmodelopage;
			});
		} 
		else {
            jQuery(document).ready(function(){   
				jQuery.colorbox({html:"<font color=red>Não foi possível enviar o arquivo.<br>"+success+"</font>"});
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
if( jQuery("#id").val() ==""){
 
}
else{  
	$('#select_idpai').text($('#idpai').find('option').filter(':selected').text());
}
</script>
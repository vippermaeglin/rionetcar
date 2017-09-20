<?php include template("manage_header");?>
<?
$emails 		=  $_REQUEST['chave'] ;
$contadoremails =  $_REQUEST['recp'] ; 
$valor 			= $_REQUEST['valor'] ; 

/*
if($valor=="0"){
	$emails ="";
	$contadoremails = Table::Count('user');
	$sql =  "select email from user";
	$rs = mysql_query($sql);
	while($row = mysql_fetch_assoc($rs)){
		$emails .=$row['email'].",";
	}
	$emails =base64_encode($emails );
	$contadoremails =base64_encode($contadoremails );
}
*/
?>
<script type="text/javascript" src="/media/js/tinymce_pt/jscripts/tiny_mce/tiny_mce.js"></script> 
<script type="text/javascript" src="/media/js/tinymce_pt/jscripts/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script> 
<script src="/media/js/include_tinymce.js" type="text/javascript"></script> 

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('page'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"  style="float:left;" ><h2>Envio de mensagem</h2></div>
				<div style="width: 600px; text-align: center;">Esta mensagem será enviada para <?=base64_decode($contadoremails) ?> destinatário(s) <b><span name="modificacao" id="modificacao"></span></b></div>
				<input  type="hidden"  value="<?=$valor?>" name="idmodelo"  id="idmodelo"  >
				
                <div class="sect" style="clear:both;" >
                   <table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr style="background:#90C6F3;">
						<th width="60%">Assunto <input  type="text"  name="assunto"  id="assunto" style="width: 70%;color:#303030;font-size:11px;"> </th>
						<th width="40%"> 
						<button style="width: 60px;" type="button" onclick="enviar();"><span>Enviar</span></button> 
						<button style="width: 100px;" type="button" onclick="salvar_modelo();"><span>Salvar modelo</span></button> 
						<button style="width: 90px;" type="button" onclick="salvar_modelo_como();"><span>Salvar como</span></button> 
						</th>
					</tr>	
					<tr style="background:#90C6F3;">
						<th width="60%">Email de teste <input  type="text"  name="emailtest"  id="emailtest" style="width: 66%;color:#303030;font-size:11px;"> </th>
						<th width="40%"> 
						<button style="width: 60px;"  type="button" onclick="testar_modelo();"><span>Testar</span></button> 
						</th>
					</tr>
					</table> 
						<div class="field" style="width:99%">
							<textarea  id="mensagem" style="width:100%;height:450px;" class="editor" name="mensagem"><?php echo htmlspecialchars($value); ?></textarea> 
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
  
 
function enviar( ){
	  
   assunto = jQuery("#assunto").val();
   mensagem = tinyMCE.get("mensagem").getContent();
   
	if(assunto==""){
		alert("Por favor, informe o assunto do email")
		return;
   }   
   
   if(mensagem==""){
		alert("Por favor, informe a mensagem do email")
		return;
   } 
  	jQuery(document).ready(function(){   
			jQuery.colorbox({html:"<div class='msgsoft2'> <img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Enviando email. Note que se o seu site não estiver em um servidor semi dedicado ou dedicado esse envio pode demorar algumas horas. Por favor aguarde..</div>"});
	});
	
   
  $.get("<?=$INI['system']['wwwprefix']?>/ajax/manage.php?mensagem="+mensagem+"&assunto="+assunto+"&action=enviaemailuser&chave=<?=$emails?>&recp=<?=$contadoremails?>",
  
   function(data){
      if(jQuery.trim(data)==""){
    	jQuery.colorbox({html:"<div class='msgsoft'> <img src='<?=$ROOTPATH?>/media/css/i/Accept-icon.png'> Envio de email finalizado.</div> "});
	  }  
	  else{
		jQuery.colorbox({html:data});
	  }
   });
 	 
}

function salvar_modelo( ){
	  
   assunto = jQuery("#assunto").val();
   mensagem = tinyMCE.get("mensagem").getContent();
   mensagem=mensagem.replace(/&/g,"|");
   idmodelo = jQuery("#idmodelo").val();
 
	if(assunto==""){
		alert("Por favor, informe o assunto do email")
		return;
   }    
   if(mensagem==""){
		alert("Por favor, informe a mensagem do email")
		return;
   }
  
  	jQuery(document).ready(function(){   
			jQuery.colorbox({html:"<div class='msgsoft'> <img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'>Estamos salvando esse modelo..</div>"});
	}); 
    $.get("<?=$INI['system']['wwwprefix']?>/ajax/manage.php?idmodelo="+idmodelo+"&mensagem="+mensagem+"&assunto="+assunto+"&action=salvar_modelo",

   function(data){
      if(jQuery.trim(data)!=""){
    	jQuery.colorbox({html:"<div class='msgsoft'> <img src='<?=$ROOTPATH?>/media/css/i/Accept-icon.png'> Modelo salvo com sucesso.</div> "});
	    idmodelo = jQuery("#idmodelo").val();
		$.get("<?=$INI['system']['wwwprefix']?>/include/funcoes.php?acao=pegadata", function(hora){jQuery("#modificacao").text("Hora da modificação: "+hora);})
		if(idmodelo=="" || idmodelo == "0" || idmodelo == "00"){
			jQuery("#idmodelo").val(data);
		}
	  }  
	  else{
		 jQuery.colorbox({html:"Erro ao salvar modelo"});
	  }
   });
 	 
}

function salvar_modelo_como( ){
	  
	assunto = jQuery("#assunto").val();
	mensagem = tinyMCE.get("mensagem").getContent();
    mensagem=mensagem.replace(/&/g,"|");
    idmodelo = ""
   
	if(assunto==""){
		alert("Por favor, informe o assunto do email")
		return;
   }    
   if(mensagem==""){
		alert("Por favor, informe a mensagem do email")
		return;
   }
  
  	jQuery(document).ready(function(){   
			jQuery.colorbox({html:"<div class='msgsoft'> <img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'>Estamos salvando esse modelo como um novo modelo.</div>"});
	}); 
    $.get("<?=$INI['system']['wwwprefix']?>/ajax/manage.php?idmodelo="+idmodelo+"&mensagem="+mensagem+"&assunto="+assunto+"&action=salvar_modelo",

   function(data){
      if(jQuery.trim(data)!=""){
    	jQuery.colorbox({html:"<div class='msgsoft'> <img src='<?=$ROOTPATH?>/media/css/i/Accept-icon.png'> Modelo salvo com sucesso.</div> "});
	    idmodelo = jQuery("#idmodelo").val();
		$.get("<?=$INI['system']['wwwprefix']?>/include/funcoes.php?acao=pegadata", function(hora){jQuery("#modificacao").text("Hora da modificação: "+hora);})
		if(idmodelo=="" || idmodelo == "0" || idmodelo == "00"){
			jQuery("#idmodelo").val(data);
		}
	  }  
	  else{
		 jQuery.colorbox({html:"Erro ao salvar modelo"});
	  }
   });
 	 
}

function testar_modelo( ){
	

   emailtest = jQuery("#emailtest").val();
   assunto = jQuery("#assunto").val();
   mensagem = tinyMCE.get("mensagem").getContent(); 
    
   if(assunto==""){
	alert("Por favor, informe o assunto do email")
	return;
   }   
   
   if(mensagem==""){
	alert("Por favor, informe a mensagem do email")
	return;
   }
	if(emailtest==""){
	alert("Por favor, informe um email para teste")
	return;
   } 
   
   	jQuery(document).ready(function(){   
			jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Enviando email de teste..</div>"});
	});
	 
  $.get("<?=$INI['system']['wwwprefix']?>/ajax/manage.php?emailtest="+emailtest+"&mensagem="+mensagem+"&assunto="+assunto+"&action=testar_modelo",
  
   function(data){
      if(jQuery.trim(data)==""){
    	jQuery.colorbox({html:" <div class='msgsoft'> <img src='<?=$ROOTPATH?>/media/css/i/Accept-icon.png'> Email de teste enviado com sucesso.</div> "});
	  }  
	  else{
		  jQuery.colorbox({html:data});
	  }
   });
 	 
}

</script>

<?php 
if($valor != "0" and $valor != "00" and $valor){

	$sql =  "select * from modelos_email where id = $valor";
	$rs = mysql_query($sql);
	$row = mysql_fetch_assoc($rs);
	$assunto  = $row['assunto'] ;
	$mensagem  = $row['texto'] ;
	?>
	<script>  
	  jQuery("#assunto").val('<?=$assunto?>');
	</script>
<? } ?>

<script>
  
	tinyMCE.init({
		// General options
    language : "pt",
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,  advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
	   setup : function(ed) {
		ed.onLoadContent.add(function(ed, o) {
          // Output the element name
         tinyMCE.get("mensagem").setContent('<?=htmlspecialchars_decode($mensagem)?>');
		});
		},
		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		file_browser_callback : "tinyBrowser",
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}	
	});
	
</script>
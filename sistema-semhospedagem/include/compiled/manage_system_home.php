<?php include template("manage_header");?>
 
<?
$sql 		=  "select * from publicidade order by numeroimagem";
$rs 		= mysql_query($sql);
$cont=0;
while($row  = mysql_fetch_object($rs)){
 
    $cont++; 
	if($row->nomebotao==""){
		$row->nomebotao="VER PUBLICIDADE";
	}
	$dadosimagem[$cont]['numeroimagem']  	= $row->numeroimagem;
	$dadosimagem[$cont]['link']  			= $row->link;
	$dadosimagem[$cont]['ativo']  			= $row->ativo; 
	$dadosimagem[$cont]['nomebotao']  	 	= $row->nomebotao; 
}
 
?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="system">
 
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system_layout(); ?></ul>
	</div>

	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
				<div class="head"><h2>Publicidade em Flash</h2></div>
					<div class="head">
						<div style="float:left;width:504px;">
					</div> 
					</div>
					
					<? for( $i = 1; $i<=5;$i++  ){ 
						
						$imgexiste=false;
						if(file_exists(dirname(dirname(dirname(__FILE__))) . "/include/publicidade/publicidade_".$i.".png")){
							$imgexiste=true; 
						}
						$idimagem =  $i;
						//$idimagem = $dadosimagem[$i]['numeroimagem'];
						//if($idimagem ==""){
						//	$idimagem = $i;
						//}
					
					?>
					<div class="sect">
					 <div style="float:right;"><input type="button" value="Atualizar dados" onclick="atualiza_home('<?=$idimagem ; ?>');"></div>
					  <table  border="0">
					  <tr>
						<td rowspan="6"><h2><?=$idimagem?></h2>
						<?php if($imgexiste and $dadosimagem[$i]['numeroimagem'] != ""){?>
							<img src="<?=$ROOTPATH?>/include/publicidade/publicidade_<?=$idimagem ?>.png" width="400" height="200" />
						<? }
						else{?>
							<img src="<?=$PATHSKIN?>/images/semimagem.jpg"  />
						<? } ?>
						
                          <form  target="upload_target_<?=$idimagem?>"  action="<?php  echo  $INI['system']['wwwprefix'] ?>/include/upload.php?tipo=publicidade&nome=publicidade&id=<?=$idimagem ?>&width=895&height=397"  method="post" enctype="multipart/form-data" onsubmit="startUpload('<?=$idimagem?>');" >
							<input type="hidden" value="<?php  echo  $INI['system']['wwwprefix'] ?>" id="local" name="local">
							 <iframe id="upload_target_<?=$idimagem?>" name="upload_target_<?=$idimagem?>" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>                 
							 <div  style="width: 455px;">
							  <input name="myfile" type="file" />
							  <input type="submit" name="submitBtn"  class="formbutton" value="Upload" />
							 <br />
							<span class="inputtip">
							Resolução ideal (895x397) </span> 
							</div>
						 </form>
						</td>
						<td>  
                         <span class="inputtip">
							<form>
							<input type="radio" name="ativarimagem"  <? if($dadosimagem[$idimagem]['ativo']=="s"){ echo "checked"; }?>   id="ativarimagem_<?=$idimagem?>" value="s" />
							 Ativar esta imagem
							<input type="radio" name="ativarimagem" <? if($dadosimagem[$idimagem]['ativo']=="n" or $dadosimagem[$idimagem]['ativo']==""){ echo "checked"; }?>   id="ativarimagem_<?=$idimagem?>" value="n" />
							 Desativar esta imagem
							</form>
						</p> </span></td>
					  </tr>
					   <tr>
					    <td><label for="txtprincipal"><span class="inputtip">Link desta imagem (sem http://)</span></label>
							<input style="margin-left:11px;" name="linkimagem" type="text" id="linkimagem_<?=$idimagem?>" size="70" value="<?=$dadosimagem[$idimagem]['link']?>"></td>
					    <td> 
						</td>
					 </tr> 
					 <tr>
					    <td><label for="txtprincipal"><span class="inputtip">Nome do botão</span></label>
							<input style="margin-left:11px;" name="nomebotao" type="text" id="nomebotao_<?=$idimagem?>" size="70" value="<?=$dadosimagem[$idimagem]['nomebotao']?>"></td>
					    <td> 
						</td>
					 </tr>
					</table>
					<div class="head"></div>
				</div>
				<? } ?>
				 
            <div class="box-bottom"></div>
        </div>
	</div>

	<div id="sidebar"></div>
</div>
</div> <!-- bd end -->

</div> <!-- bdw end -->
<script>

	function startUpload(idcidade){ 
		jQuery(document).ready(function(){   
				jQuery.colorbox({html:"<font color=blue>Enviando a imagem... Aguarde. </font>"});
		   });		
	return true;
	}

	function stopUpload(success){
		 
      var result = '';
      if (success == 1){
           jQuery(document).ready(function(){   
				jQuery.colorbox({html:"<font color=#336699>o arquivo foi carregado com sucesso. Dimensões exatas, parabéns.</font>"});
		   });
      }   
	 else if (success == 2){
 
        	jQuery(document).ready(function(){   
				jQuery.colorbox({html:"<font color=red>O arquivo foi enviado com sucesso porém as dimensões do arquivo estão diferentes das dimensões sugeridas. Verifique se não prejudicou o layout.</font>"});
		    });
      } 
	 else {
            jQuery(document).ready(function(){   
				jQuery.colorbox({html:"<font color=red>Não foi possível enviar o arquivo.</font>"});
		   });
		 
      }
    
     // document.getElementById('f1_upload_process').style.visibility = 'hidden';
      return true;   
}
	
function atualizar( ){

	rand = "n";
	if(document.getElementById("rand").checked){
		rand = "s"; 
	}

	jQuery(document).ready(function(){   
		jQuery.colorbox({html:"<font color=336699>Estamos atualizando a sua home, por favor aguarde...</font>"});
    });

	$.get("<?=$INI['system']['wwwprefix']?>/vipmin/home.php?acao=config&rand="+rand,
 			
    function(data){
 
      if(jQuery.trim(data)==""){
     	jQuery(document).ready(function(){   
				jQuery.colorbox({html:"<font color=#336699>Sua home foi atualizada com sucesso.</font>"});
		 });
	  }  
	  else{
		  jQuery(document).ready(function(){   
				jQuery.colorbox({html:"<font color=red>Houve um erro ao atualizar. "+data+"</font>"});
		 });
	  }
   });


}
function atualiza_home(id){

	 ativo = "n";
 
	linkimagem = document.getElementById("linkimagem_"+id).value
	nomebotao = document.getElementById("nomebotao_"+id).value
	if(document.getElementById("ativarimagem_"+id).checked){
		ativo = "s"; 
	} 
 
	jQuery(document).ready(function(){   
		jQuery.colorbox({html:"<font color=336699>Estamos atualizando a sua home, por favor aguarde...</font>"});
    });

 
	$.get("<?=$INI['system']['wwwprefix']?>/vipmin/publicidade.php?id="+id+"&linkimagem="+linkimagem+"&ativo="+ativo+"&nomebotao="+nomebotao,
 			
    function(data){
 
      if(jQuery.trim(data)==""){
     	jQuery(document).ready(function(){   
				jQuery.colorbox({html:"<font color=#336699>Sua publicidade foi atualizada com sucesso.</font>"});
		 });
	  }  
	  else{
		  jQuery(document).ready(function(){   
				jQuery.colorbox({html:"<font color=red>Houve um erro ao atualizar. "+data+"</font>"});
		 });
	  }
   });

}

function vercombo(tipo, valor, idcidade){

	if(valor!="" & tipo=="outras"){
		document.getElementById("outrasofertas_principal_"+idcidade).checked=false
		document.getElementById("outrasofertas_recentes_"+idcidade).checked=false
	}

}
</script>
 
 




<?php


?>

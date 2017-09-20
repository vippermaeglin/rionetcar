<? 
require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/app.php'); 
$allcities = option_category('city', false, true);
?>
<html>
<head> 
</head>
<body>
 
<div style="width:600px; height:500px;">
	    <div style="display:none;" class="tips"><?=__FILE__?></div>
 		<div style="font-size:14px;margin-left:84px;margin-top:11px;">
		  <h2 style="font-size:25px">Receba nossas ofertas em seu email</h2> 
			 <p class="name">
				<input type="text"style="margin-bottom:5px; margin-left: 56px; width: 300px; height: 19px; font-size: 15px; font-family: verdana;" name="emailnewshome" id="emailnewshome" onFocus="if(this.value =='Insira seu e-mail' ) this.value=''" onBlur="if(this.value=='') this.value='Insira seu e-mail'" value="Insira seu e-mail"   />
			 </p>
 	         <select name="websites3" style="width: 319px; height:41px; font-size:15px; margin-left: 57px;padding:5px 0 0 6px; font-family: verdana;" id="websites3">
				<option value="">Escolha sua Cidade</option>
				<?php echo  Utility::Option(Utility::OptionArray($allcities, 'id', 'name'), $city['id']) ; ?>
			 </select>  
            <div id="loadingcontato" style="visibility: hidden; float: left; margin-left: 56px; width: 320px;height: 29px;"><img style="margin-left:10px"; src="<?=$ROOTPATH?>/skin/padrao/images/ajax-loader.gif"> <span style="font-size:12px;color:#303030">Aguarde...</span></div>
		 </div>

        <a href="javascript:envianewsletterhome(J('#emailnewshome').val(),J('#websites3').val());"> <img style="margin-left: 107px;"  src="<?=$PATHSKIN?>/images/bg_btn_landing.png" width="375" height="50"></a>
		<img  style="margin-left:99px;margin-top:10px;"src="<?=$ROOTPATH?>/skin/padrao/images/img_email_home.jpg">
  
 </div>
 		
  
	<script>
	
	function envianewsletterhome(email,cidade){

	 
	if(email == ""){
	   
		jQuery("#loadingcontato").css("visibility", "hidden");
		alert("Informe o seu email.")
		document.getElementById("emailnewshome").focus();
		return;
	}
	if(email == "Insira seu e-mail"){
		
		jQuery("#loadingcontato").css("visibility", "hidden");
		alert("Informe o seu email.")
		document.getElementById("emailnewshome").focus();
		return;
	}
	
	if(cidade == ""){
		
		jQuery("#loadingcontato").css("visibility", "hidden");
		alert("Nos informe a cidade no qual deseja receber as ofertas.")
		document.getElementById("websites3").focus();
		return;
	}
	   
   jQuery("#loadingcontato").css("visibility", "visible");
		
	 
	J.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: URLWEB+"/newsletter.php",
		   data: "email="+email+"&city_id="+cidade,
		   success: function(msg){
		   
		   if(jQuery.trim(msg)=="1"){
		    
			     jQuery("#loadingcontato").css("visibility", "hidden");
			     alert( "Cadastro realizado com sucesso. Vamos redirecionar para a cidade escolhida. Aproveite as ofertas !" );
				 location.href=URLWEB+"/index.php?idcidade="+cidade;
				 
		   }  
		   else {
			    jQuery("#loadingcontato").css("visibility", "hidden");
				alert( msg ); 
			 
		   }
			    
		   }
		 });
	}
  
	</script>
			 
</body>
   
 
</html>
		
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
} 


function doupdate(){

	if(validador()){
		$("#spinner-text").css("opacity", "0.2");
		$("#spinner-text2").css("opacity", "0.2");
		jQuery("#imgrec").show()
		jQuery("#imgrec2").show()
		document.forms[0].submit();
	}
}

function campoobg(campo){
 
	$("#"+campo).css("background", "#F9DAB7");
 
} 
function limpacampos(){		 
	$("input[type=text]").each(function(){ 
		$("#"+this.id).css("background", "#fff");
	}); 
	$("#upload_image").css("background", "#fff");
	
}
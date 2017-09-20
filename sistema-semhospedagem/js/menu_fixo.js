
	J(function(){  
		var nav = J('#menu');  
		J(window).scroll(function (){
			if (J(this).scrollTop() > 150){
				nav.addClass("menu-fixo");
			}else{
				nav.removeClass("menu-fixo");
			}
		});  
	});
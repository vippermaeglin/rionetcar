

jQuery('document').ready(function(){

	var mark, model, city, state, type;

	/* Ajax para busca de marcas de carros e moto. */
	jQuery.fn.SearchMark = function(mark){
		jQuery.ajax({
			url: URLWEB + "/ajax/filtro_pesquisa_publico.php",
			type: 'post',
			data: "filtro=fabricante2&tipo=" + mark ,
			success: function(retorno){
				if(retorno){
					jQuery('#Marca').html(retorno);
					jQuery('#Marca option:first-child').append("<option>Marca</option>");
				}  	  
			},
			beforeSend: function(){
				jQuery('#Marca option:first-child').html("Carregando...");	
			}
		});		
	}
	
	/* Ajax para busca de modelo de carros e moto. */
	jQuery.fn.SearchModel = function(type, manufacturer){
		jQuery.ajax({
			url: URLWEB + "/ajax/filtro_pesquisa_publico.php",
			type: 'post',
			data: "filtro=modelo&fabricante=" + manufacturer + "&tipo=" + type ,
			success: function(retorno){
				if(retorno){
					jQuery('#Modelo').html(retorno);
					jQuery('#Modelo option:first-child').append("<option>Modelo</option>");
				}  	  
			},
			beforeSend: function(){
				jQuery('#Modelo option:first-child').html("Carregando...");	
			}
		});		
	}
	
	/* Ajax para busca de cidades de acordo com o estado escolhido. */
	jQuery.fn.SearchCity = function(state){
		jQuery.ajax({
			url: URLWEB + "/ajax/filtro_pesquisa_publico.php",
			type: 'post',
			data: "filtro=cidades&estado=" + state,
			success: function(retorno){
				if(retorno){
					jQuery('#Cidade').html(retorno);
					jQuery('#Cidade option:first-child').append("<option value=''>Cidade: Todas</option>");
				}  	  
			},
			beforeSend: function(){
				jQuery('#Cidade option:first-child').html("Carregando...");	
			}
		});		
	}
});
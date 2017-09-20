
jQuery('document').ready(function(){
	
	jQuery('.navigation a').click(function() {		
		jQuery('.navigationMobile').toggleClass('hidden');
	});	
	
	jQuery('.rowForm').hide();
	
	jQuery(".rslides").responsiveSlides({
		auto: false,
		manualControls: '#slider3-pager',				
        pager: false,
        nav: true,
        speed: 500,
        namespace: "large-btns"
	});
	
	jQuery('#txtTel').mask('(99) 9999-9999');
	
	jQuery('.linkNavForm a').click(function(){
		
		var data = jQuery(this).attr('data-id');
		
		if(data == 'show') {
			jQuery('.rowForm').show();
			jQuery(this).attr('data-id', 'hidden');
			jQuery(this).html("Ocultar busca");
		}
		else {
			jQuery('.rowForm').hide();
			jQuery(this).attr('data-id', 'show');	
			jQuery(this).html("Exibir busca");			
		}	
	});	
});
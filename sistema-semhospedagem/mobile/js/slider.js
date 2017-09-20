 
jQuery(document).ready(function () {
    jQuery('img.menu_class').click(function () {
	jQuery('ul.the_menu').slideToggle('medium');
    });
});
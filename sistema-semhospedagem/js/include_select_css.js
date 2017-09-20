/*
jQuery(document).ready(function() {

  function showvalue(arg) {
	//arg.visible(false);
	}
								  
try {

	dd3 = jQuery('#websites3').msDropDown({mainCSS:'dd2', onInit:showvalue}).data("dd");
	var opt = dd3.get('length');
	//dd3 = dd3.add({text:"lucky", value:"luckyval", title:'images/icon-ok.gif'}, opt);
	jQuery("#open3").click(function() {dd3.open();});
	jQuery("#close3").click(function() {dd3.close();});
	//dd3.addMyEvent("onOpen", showvalue);
	//dd3.addMyEvent("onClose", showvalue);
	dd3.addMyEvent("onclick", showvalue);
	//dd3.disabled(true);
	//items  = document.getElementById("ComOS2").item(1);
	items  = dd3.item(1);
	
	var ver = dd3.get('version');
	jQuery("#ver").html(ver);
	
	//alert(items)
} catch(e) {
	alert("Error: "+e.message);
}
//alert(dd3.form().name);
//document.getElementById("websites1").options[0] = new Option("Lucky", "_lucky");

})
*/

<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:620px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">fechar</span><?php echo $partner['title']; ?></h3>
	<div id="map_canvas" style="width:620px; height:420px"></div>
</div>
<script type="text/javascript">
function GShowMap() {
	if (GBrowserIsCompatible()) {
		var map = new GMap2(document.getElementById("map_canvas"));
		var glatlng = new GLatLng(<?php echo $longi; ?>, <?php echo $lati; ?>);
		map.addOverlay(new GMarker(glatlng));
		map.setUIToDefault();
		map.setCenter(glatlng, 12);
	}
}
setTimeout(GShowMap,100);
</script>

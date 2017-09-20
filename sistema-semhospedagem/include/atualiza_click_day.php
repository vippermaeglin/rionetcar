<?php

	include "../app.php";  
	
	if(isset($_REQUEST['idoferta'])) {
		
		$idoferta = (int) strip_tags(trim($_REQUEST['idoferta']));
		atualiza_click_day($idoferta);
	}
  
?>
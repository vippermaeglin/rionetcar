<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('design');

if ($_POST) {
	
	$itens = isset($_POST['itens']) ? $_POST['itens'] : 0;
	$inicia = isset($_POST['inicia']) ? $_POST['inicia'] : 0;
    $dir = opendir('../../skin/padrao/images');
    $i = 0;
	$j = 0;
    echo '<div class="m">
			<div class="adminform">
				<div class="cpanel-left">
					<div class="cpanel">
						 <table border="0" width="100%">';
    while($arq = readdir($dir)){

    	$arquivo = '../../skin/padrao/images/' . $arq;
    	if(is_file($arquivo)){

    		$i++;

    		if($inicia && $i < $inicia){
    			continue;
    		}

    		if($i <= $itens){
    			$tam_img = getimagesize($arquivo);

        		$w = ($tam_img[0] > 100) ? 100 : $tam_img[0];
        		$h = ($tam_img[1] > 50) ? 50: $tam_img[1];
				
				$j++;
				
				if($j == 1){
					echo "<tr>";
				}
				
        		echo "<div class='icon-wrapper'><div class='icon'>
					<td align='center' height='150'>
						<div class='icon-wrapper'><div class='icon'>
						<table>
							<tr align='center' height='125'>
								<td name='$arq'>
									<a style='width:251px;'><img style='max-height:101px;max-width:226px;' src='../../skin/padrao/images/$arq' title='$arq' alt='$arq' /></a><span>$arq</span>
								</td>
							</tr>
							<tr align='center' height='25'>
								<td>
									<form action='{$INI['system']['wwwprefix']}/include/upload.php?nome={$arq}' method='post' enctype='multipart/form-data'  target='upload_target' onsubmit='startUpload();' >
										<input name='myfile' type='file' />
										<input type='submit' name='submitBtn'  class='formbutton' value='Upload' />
										<input type='hidden' value='{$INI['system']['wwwprefix']}' id='local' name='local'>
										<input type='hidden' value='diversas' id='tipo' name='tipo'>
										<iframe id='upload_target' name='upload_target' src='#' style='width:0;height:0;border:0px solid #fff;'></iframe>                 
									</form>
									<p id='f1_upload_process'>Carregando...<br/></p>
								</td>
							</tr>
						</table>
						</div></div>
					</td>";
						
				if($j == 4){
					echo "</tr>";
					$j = 0;
				}
    		}else{
        		break;
    		}
    	}
    }
    echo '</table></div></div></div></div>';
    exit;
}else{
	include template('manage_system_imagens');
}
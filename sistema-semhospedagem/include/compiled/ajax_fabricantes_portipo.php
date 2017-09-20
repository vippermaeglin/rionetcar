<?
	
require_once( dirname(dirname(dirname(__FILE__))) . '/app.php');
$tipo   =  $_REQUEST['tipo'];	 
$team   = Table::Fetch('team',$_REQUEST['id']);	
header('Content-Type: text/html; charset=ISO-8859-1;'); 
 
?>

<? if($tipo=="carro"){?>
	
	<div  class="group">
	<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
	<select  name="car_fabricante" id="car_fabricante" onchange="$('#car_fabricante_id').text($('#car_fabricante').find('option').filter(':selected').text()); precotabelafipe();"> 
		<option value=""> </option>
		<?php 
			$sql = "SELECT id, nome FROM fabricante where tipo = 'Carro' order by nome";
			$rs = mysql_query($sql);
			while($l = mysql_fetch_assoc($rs)){
				if (isset($team['car_fabricante']) && $team['car_fabricante'] == $l['id']) {
					echo "<option value='$l[id]' selected='selected'>".displaySubStringWithStrip($l[nome],40)."</option>";
					$tmp_fabricante = $l['nome'];
				}
				else
					echo "<option value='$l[id]'>".displaySubStringWithStrip($l[nome],40)."</option>";
			}
			$tb = null; 
		?>
	</select> 
	<div name="car_fabricante_id" id="car_fabricante_id" class="cjt-wrapped-select-skin"><?php if (isset($tmp_fabricante)) echo $tmp_fabricante; else echo "-- selecione o fabricante --"; ?></div>
	<div class="cjt-wrapped-select-icon"></div>
	</div>  
	</div>
<? } ?>


<? if($tipo=="moto"){?>
	
	<div class="group"  >
	<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
	<select  name="car_fabricante" id="car_fabricante" onchange="$('#car_fabricante_id').text($('#car_fabricante').find('option').filter(':selected').text()); precotabelafipe();"> 
		<option value=""> </option>
		<?php 
			$sql = "SELECT id, nome FROM fabricante where tipo = 'Moto' order by nome";
			$rs = mysql_query($sql);
			while($l = mysql_fetch_assoc($rs)){
				if (isset($team['car_fabricante']) && $team['car_fabricante'] == $l['id']) {
					echo "<option value='$l[id]' selected='selected'>".displaySubStringWithStrip($l[nome],40)."</option>";
					$tmp_fabricante = $l['nome'];
				}
				else
					echo "<option value='$l[id]'>".displaySubStringWithStrip($l[nome],40)."</option>";
			}
			$tb = null; 
		?>
	</select> 
	<div name="car_fabricante_id" id="car_fabricante_id" class="cjt-wrapped-select-skin"><?php if (isset($tmp_fabricante)) echo $tmp_fabricante; else echo "-- selecione o fabricante --"; ?></div>
	<div class="cjt-wrapped-select-icon"></div>
	</div>  
	</div>
<? } ?>

<? if($tipo=="caminhao"){?>
	
	<div  class="group"  >
	<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
	<select  name="car_fabricante" id="car_fabricante" onchange="$('#car_fabricante_id').text($('#car_fabricante').find('option').filter(':selected').text()); precotabelafipe();"> 
		<option value=""> </option>
		<?php 
			echo $sql = "SELECT id, nome FROM fabricante where tipo like '%Caminh%' order by nome";
			$rs = mysql_query($sql);
			while($l = mysql_fetch_assoc($rs)){
				if (isset($team['car_fabricante']) && $team['car_fabricante'] == $l['id']) {
					echo "<option value='$l[id]' selected='selected'>".displaySubStringWithStrip($l[nome],40)."</option>";
					$tmp_fabricante = $l['nome'];
				}
				else
					echo "<option value='$l[id]'>".displaySubStringWithStrip($l[nome],40)."</option>";
			}
			$tb = null; 
		?>
	</select> 
	<div name="car_fabricante_id" id="car_fabricante_id" class="cjt-wrapped-select-skin"><?php if (isset($tmp_fabricante)) echo $tmp_fabricante; else echo "-- selecione o fabricante --"; ?></div>
	<div class="cjt-wrapped-select-icon"></div>
	</div>  
	</div>
	
<? } ?>

<script>
		jQuery(document).ready(function() {
			jQuery('#car_fabricante').bind('change', function(ev) {
				buscaFiltros('modelo');
			});
		});
		
	</script>
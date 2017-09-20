<?php
 
require_once(dirname(dirname(__FILE__)) . '/app.php');
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/x-msexcel; charset='utf-8'");
header("Content-Disposition: attachment;filename = \"Relatorio.xls\"");
header("Content-Description: VipCom");

function numeroToMoeda($numero, $qtdDecimais = 2) {
	$numero = number_format($numero, $qtdDecimais);
	$numero = explode('.', $numero);
	return sprintf('%s,%s', str_replace(',', '.', $numero[0]), $numero[1]);
}
function str2num($str){ 
  if(strpos($str, '.') < strpos($str,',')){ 
            $str = str_replace('.','',$str); 
            $str = strtr($str,',','.');            
        } 
        else{ 
            $str = str_replace(',','',$str);            
        } 
        return (float)$str; 
} 
 

$id = abs(intval($_GET['id']));

$partner_id = abs(intval($_SESSION['partner_id']));

$login_partner = Table::Fetch('partner', $partner_id);

$team = Table::Fetch('team', $id);


$consulta = array();
$consulta[] = 'SELECT * FROM estados order by nome';
$consulta = implode("\n", $consulta);
mysql_set_charset('utf8', $conecta);
$resultado = mysql_query($consulta);
$i = 0;

?>
<table cellpadding="3" cellspacing="3" border="1">
	<thead>
		<tr>
			<th> </th>
			<th> </th> 
			<th> </th>  
		</tr>
	</thead>
	<tbody>
		<?php while($reg = mysql_fetch_array($resultado)) : ?>
		<?php if($i % 2) { $style = 'background-color: #CCCCCC;'; } else { $style = ''; } ?>
		<?php
			$sql1 = "select sum(clicados) as total from team where imob_estado='".$reg['uf']."'";
			$rs = mysql_query($sql1);
			$row = mysql_fetch_object($rs);
			$totalanuncios_por_uf = $row->total;  
			
		?>
		<tr style="background-color: #CCCCCC;"> 
			<td style="text-align:left"><?=$reg['uf']?></td>
			<td style="text-align:left"><?=utf8_decode($reg['nome'])?></td> 
			<td style="text-align:left">  <?=$totalanuncios_por_uf?> acessos(s) </td> 
		</tr>
		<?
			$sql2 = "select * from partner where estado='".$reg['uf']."' order by title";
			$rs2 = mysql_query($sql2);
			while($row2 = mysql_fetch_object($rs2)){
				$parceiro =  $row2->title ; 
				//$parceiro = ucwords($parceiro); 
				//$parceiro = strtoupper($parceiro); 
				$idparceiro = $row2->id;  
				
				$sql3 = "select sum(clicados) as total from team where partner_id=".$idparceiro;
				$rs3 = mysql_query($sql3);
				$row3 = mysql_fetch_object($rs3);
				$totalanuncios_por_uf = $row3->total; 
				?>
				<tr> 
					<td style="text-align:left"> Código <?=$idparceiro?>  </td> 
					<td style="text-align:left"> <?=utf8_decode($parceiro)?></td> 
					<td style="text-align:left">  <?=$totalanuncios_por_uf?> acessos(s) </td> 
				</tr>
				<?
			}
		?>
		
		<?php $i++; endwhile; ?>
		
	</tbody>
</table>

<?
function remover_caracter($string) {
    $string = preg_replace("/[áàâãä]/", "a", $string);
    $string = preg_replace("/[ÁÀÂÃÄ]/", "A", $string);
    $string = preg_replace("/[éèê]/", "e", $string);
    $string = preg_replace("/[ÉÈÊ]/", "E", $string);
    $string = preg_replace("/[íì]/", "i", $string);
    $string = preg_replace("/[ÍÌ]/", "I", $string);
    $string = preg_replace("/[óòôõö]/", "o", $string);
    $string = preg_replace("/[ÓÒÔÕÖ]/", "O", $string);
    $string = preg_replace("/[úùü]/", "u", $string);
    $string = preg_replace("/[ÚÙÜ]/", "U", $string);
    $string = preg_replace("/ç/", "c", $string);
    $string = preg_replace("/Ç/", "C", $string);
    $string = preg_replace("/[][><}{)(:;,!?*%~^`&#@]/", "", $string);
    $string = preg_replace("/ /", "_", $string);
    return $string;
}
?>
<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 

<?php 

$idparceiro = $_REQUEST['idparceiro'] ;

$BlocosOfertas = new BlocosOfertas();

if (!$city) $city = get_city();
if (!$city) $city = array_shift($hotcities); 

$order = " order by ehdestaquebusca DESC ";
if($INI['option']['rand_popular'] == "Y"){
	$order =  "order by rand()";
}

if(!empty($_GET['ordena'])){
	$order =  "order by ".$_GET['ordena'];
}
 
$nmimagem = "popular"; 
$stylethree_up_op 	=  "width:99%";
$styletitle			=  "font-size:14px";
$stylesubtitle	 	=  "font-size:12px";
$styletimer_op	 	=  "right:19px";
$nmimagem 			= "popular";
  
$contador = 0;
   
$idcategoria = trim($_REQUEST['idcategoria']);
 
if(!empty($_REQUEST['cppesquisa'])){
	 $cppesquisa = trim($_REQUEST['cppesquisa']);
}
else if(!empty($_POST['cppesquisagrava'])){
	 $cppesquisa = trim($_POST['cppesquisagrava']);
} 

if($cppesquisa =="O que está procurando ?"){
	unset($cppesquisa);
}


if(!empty($cppesquisa)){
	$procura = retira_acentos($cppesquisa);
	$condition = array(  
		"begin_time < '".time()."'",
		"end_time > '".time()."'",
		"title like '%".$procura."%' or summary like '%".$procura."%'", 
		"status is null or status = 1",
		"desativado = 'n'",
		"pago = 'sim' or anunciogratis = 's'",
		
	);
}
/* Início do tratamento das informações na busca. */
else if (!empty($_REQUEST['busca'])) {
	
	$tipo = retira_acentos($_POST['tipo']);
	 
	$condition = array();
		
	if(isset($_REQUEST['TipoAnuncio']) and !(empty($_REQUEST['TipoAnuncio'])))
	{
		$TipoAnuncio = urldecode(trim(strip_tags($_REQUEST["TipoAnuncio"])));
		$condition[] = "estadoveiculo = '{$TipoAnuncio}'";
	}
	
	if(isset($_REQUEST["TipoAnunciante"]) and !(empty($_REQUEST["TipoAnunciante"])))
	{
		$TipoAnunciante = urldecode(trim(strip_tags($_REQUEST["TipoAnunciante"])));
		$condition[] = "user_type = '{$TipoAnunciante}'";
	}
	
	/* Diferencia entre moto e carro no filtro da pesquisa. */
	if(isset($_REQUEST["TipoVeiculo"]) and !(empty($_REQUEST["TipoVeiculo"])))
	{
		$TipoVeiculo = urldecode(trim(strip_tags($_REQUEST["TipoVeiculo"])));
		$condition[] = "car_tipo = '{$TipoVeiculo}'";
			
		/* Procura pelo tipo de carroceria do carro, ou estilo da moto. */
		if($TipoVeiculo == 'carro' and isset($_REQUEST["TipoCarroceria"])){
			$TipoCarroceria = trim(strip_tags($_REQUEST["TipoCarroceria"]));
			$condition[] = "car_carroceria = '{$TipoCarroceria}'";
		}else if($TipoVeiculo == 'moto' and isset($_REQUEST["TipoEstilo"])){
			$TipoEstilo = trim(strip_tags($_REQUEST["TipoEstilo"]));
			$condition[] = "moto_estilo = '{$TipoEstilo}'";
		}
		
		/* Procura pelo tipo de necessidade do carro ou da moto. */		
		if(isset($_REQUEST["TipoNecessidade"]) and !(empty($_REQUEST["TipoNecessidade"]))){
			$TipoNecessidade = urldecode(trim(strip_tags($_REQUEST["TipoNecessidade"])));
			$condition[] = "vea_necessidades like '%" . $TipoNecessidade . "%'";
		}
	}
	
	if(isset($_REQUEST["Modelo"]) and !(empty($_REQUEST["Modelo"])))
	{
		$Modelo = urldecode(trim(strip_tags($_REQUEST["Modelo"])));
		if($Modelo == "Modelo"){
			unset($Modelo);
		}else{
			$condition[] = "title like '%" . $Modelo . "%'";
		}
	}
	
	if(isset($_REQUEST["Marca"]) and !(empty($_REQUEST["Marca"])))
	{
		$Marca = urldecode(trim(strip_tags($_REQUEST["Marca"])));
		if($Marca == "Marca"){
			unset($Marca);
		}else{
			$condition[] = "car_fabricante = '{$Marca}'";
		}
	}
	
	if(isset($_REQUEST["AnoDe"]) and !(empty($_REQUEST["AnoDe"])))
	{
		$AnoDe = urldecode(trim(strip_tags($_REQUEST["AnoDe"])));
		$condition[] = "car_ano >= '{$AnoDe}'";
	}
	
	if(isset($_REQUEST["AnoAte"]) and !(empty($_REQUEST["AnoAte"])))
	{
		$AnoAte = urldecode(trim(strip_tags($_REQUEST["AnoAte"])));
		$condition[] = "car_ano <= '{$AnoAte}'";
	}
	
	if(isset($_REQUEST["PrecoDe"]) and !(empty($_REQUEST["PrecoDe"])))
	{
		$PrecoDe = urldecode(trim(strip_tags($_REQUEST["PrecoDe"])));
		$condition[] = "team_price >= '{$PrecoDe}'";
	}
	
	if(isset($_REQUEST["PrecoAte"]) and !(empty($_REQUEST["PrecoAte"])))
	{
		$PrecoAte = urldecode(trim(strip_tags($_REQUEST["PrecoAte"])));
		$condition[] = "team_price <= '{$PrecoAte}'";
	}
	
	if(isset($_REQUEST["Estado"]) and !(empty($_REQUEST["Estado"])))
	{
		$Estado = urldecode(trim(strip_tags($_REQUEST["Estado"])));
		$condition[] = "uf = '{$Estado}'";
	}
	
	if(isset($_REQUEST["Cidade"]) and !(empty($_REQUEST["Cidade"])) and $_REQUEST["Cidade"] != "Cidade: Todas")
	{ 
		$Cidade = urldecode(trim(strip_tags($_REQUEST["Cidade"])));
		$condition[] = "city_id = '{$Cidade}'";
	}  
	if($idparceiro){
			$condition[] = "partner_id = $idparceiro"; 
	 } 
	   
	$condition[] = "status is null or status = 1";
	$condition[] = "pago = 'sim' or anunciogratis = 's'";
	$condition[] = "begin_time < '".time()."'";
	$condition[] = "end_time > '".time()."'";
	$condition[] = "desativado = 'n'";
	
	//print_r($condition);
	/* Fim do tratamento das informações na busca. */
}
else {  
	$condition = array(  
		"begin_time < '".time()."'",
		"end_time > '".time()."'",
		//"city_id   =".$_POST['city_id'],
		"status is null or status = 1",
		"pago = 'sim' or anunciogratis = 's'",
		"desativado = 'n'"
	); 
	if($idcategoria){
		$condition[] = "group_id = $idcategoria";
		unset($idcategoria);
	}
	if($idparceiro){
			$condition[] = "partner_id = $idparceiro"; 
	 } 
 
}  
$count = Table::Count('team', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$teams = DB::LimitQuery('team', array(
	'condition' => $condition,
	'order' => $order,
	'size' => $pagesize,
	'offset' => $offset,
)); 
 
$stordenacao = "cpordenacaofx";
if($navegador != "firefox"){
		$stordenacao = "cpordenacaoie";
}
 if($_REQUEST['portal']=="false" or empty($_REQUEST['portal'])  ){
	
	$display = ' style="display:none"'; 
	unset($_SESSION['portal']);
}
else if($_REQUEST['portal']=="true" or $_SESSION['portal']=="true"){
	$_SESSION['portal']="true";
	$display = ' style="display:block"';
}
 	
 
if ($_REQUEST['car_fabricante'] or $_POST['car_modelo'] or $_POST['car_ano_ate'] or $_POST['car_ano_de'] or $_POST['team_price_final'] or $_POST['team_price_inicio']) {
 
?>

<div class="secaotitulo popular" style="clear:both;">
	<div style="font-size: 15px;color:#fff; float:left; width: 100%;">
	<?php
	if (isset($_REQUEST['car_fabricante']))
		if ($_REQUEST['car_fabricante'] != '') {
		$fabricante = mysql_query("select nome from fabricante where id = '{$_REQUEST['car_fabricante']}'");
		$fab = mysql_fetch_row($fabricante);
			echo "Fabricante: {$fab[0]} |";
		}
	if (isset($_POST['car_modelo']))
		if ($_POST['car_modelo'] != '') {
			$modelo = mysql_query("select nome from modelo where id = '{$_POST['car_modelo']}'");
			$mod = mysql_fetch_row($modelo);
			echo "Modelo: {$mod[0]} |";
		}
	if (isset($_POST['car_ano_de']) && isset($_POST['car_ano_ate']))
		if ($_POST['car_ano_de'] != '' && $_POST['car_ano_ate'] != '')
		echo "De: {$_POST['car_ano_de']} Até: {$_POST['car_ano_ate']}|";
	if (isset($_POST['car_ano_de']))
		if ($_POST['car_ano_de'] != '' && $_POST['car_ano_ate'] == '')
		echo "De: {$_POST['car_ano_de']} |";
	if (isset($_POST['car_ano_ate']))
		if ($_POST['car_ano_ate'] != '' && $_POST['car_ano_de'] == '')
		echo "Até: {$_POST['car_ano_ate']} |";
	if (isset($_POST['team_price_inicio']) && isset($_POST['team_price_final']))
		if ($_POST['team_price_inicio'] != '' && $_POST['team_price_final'] != '')
		echo "À partir de: {$_POST['team_price_inicio']} até {$_POST['team_price_final']} |";
	if (isset($_POST['team_price_inicio']))
		if ($_POST['team_price_inicio'] != '' && $_POST['team_price_final'] == '')
		echo "À partir de: {$_POST['team_price_inicio']} |";
	if (isset($_POST['team_price_final']))
		if ($_POST['team_price_final'] != '' && $_POST['team_price_inicio'] == '')
		echo "Até {$_POST['team_price_final']}";
	?>
	</div>
</div>
<div class='clear'></div>

<?php
}
?> 
<!-- FIM FILTROS -->
 <? 
	if(file_exists(WWW_MOD."/enterprise.inc")){
		//require_once(DIR_BLOCO."/bloco_buscapormarcas.php"); 
	} 
?>

<?
if($count==0){?>

	<? if(empty($cppesquisa)){?>
		<div style="position:relative;top:90px;font-size: 13px;color:#303030;">Não encontramos anúncios para esta pesquisa. </div>
	<? } else {?>
		<div style="position:relative;top:90px;font-size: 13px;color:#303030;">A pesquisa pela palavra "<b><?=$cppesquisa?></b>" não retornou nenhum anúncio. </div>
	<? } ?>
<?}
else{ 

	 
	?>
	<div class="itemOrder">
		<? if(file_exists(WWW_MOD."/ordenacao.inc")){?>
			 <select onchange="ordenarBusca(this.value);" id="ordenacao" name="ordenacao">
				<option value="">Ordenação</option>
				<option value="sort_order DESC, id DESC" <? if ($_POST['ordena']=="sort_order DESC, id DESC"){ echo "selected";} ?>>Padrão</option>
				<option value="id DESC" <? if ($_POST['ordena']=="id DESC"){ echo "selected";} ?>>Mais recentes</option>
				<option value="id ASC" <? if ($_POST['ordena']=="id ASC"){ echo "selected";} ?>>Mais antigos</option>
				<option value="team_price ASC" <? if ($_POST['ordena']=="team_price ASC"){ echo "selected";} ?>>Menor Preço</option>
				<option value="team_price DESC" <? if ($_POST['ordena']=="team_price DESC"){ echo "selected";} ?>>Maior Preço</option>
				<option value="visualizados DESC" <? if ($_POST['ordena']=="visualizados DESC"){ echo "selected";} ?>>Mais Visualizados</option> 												
			</select>
		<? } ?>
			
	</div>

	<br style="clear:both;">
	<div class="resultSearch">
	<?				
	foreach ($teams as $team) {
		
			$BlocosOfertas->getDados($team); 
			$categoria  = Table::Fetch('category',$team['group_id']); 
			$titulo = utf8_decode(buscaTituloAnuncio($team)); 
			$partner = Table::Fetch('partner', $team['partner_id']);
	?>
		 
	 <?php  
			require(DIR_BLOCO_M."/bloco_detalheM.php"); 
	 ?>
	
	<script>atualiza_pageview('<?=$team['id']?>');</script>
		
	 <? } ?> 
	 </div>
	  <br style="clear:both;">
	  <div class="bcpagina"><?php //echo $pagestring; ?>  </div>
	  
<? } ?>

<form method="POST" id="formparceiro" name="formparceiro"></form>

<form method="POST" id="formpesquisa3" action="<?=$ROOTPATH?>/index.php?busca=true" name="formpesquisa3">
	<input type="hidden" name="cppesquisagrava" id="cppesquisagrava" value="<?=$cppesquisa?>">
	<?php
	if (isset($_REQUEST['filtros'])) {
		echo "<input type='hidden' name='filtros' value='true' />".PHP_EOL;
		if (isset($tipo))
			if ($tipo != '') 
				echo "<input type='hidden' name='tipo' value='{$tipo}' />".PHP_EOL;
		if (isset($_REQUEST['car_fabricante']))
			if ($_REQUEST['car_fabricante'] != '') 
				echo "<input type='hidden' name='car_fabricante' value='{$_REQUEST['car_fabricante']}' />".PHP_EOL;
		if (isset($_POST['car_modelo']))
			if ($_POST['car_modelo'] != '') 
				echo "<input type='hidden' name='car_modelo' value='{$_POST['car_modelo']}' />".PHP_EOL;
		if (isset($_POST['car_ano_de']))
			if ($_POST['car_ano_de'] != '') 
				echo "<input type='hidden' name='car_ano_de' value='{$_POST['car_ano_de']}' />".PHP_EOL;
		if (isset($_POST['car_ano_ate']))
			if ($_POST['car_ano_ate'] != '') 
				echo "<input type='hidden' name='car_ano_ate' value='{$_POST['car_ano_ate']}' />".PHP_EOL;
		if (isset($_POST['team_price_inicio']))
			if ($_POST['team_price_inicio'] != '') 
				echo "<input type='hidden' name='team_price_inicio' value='{$_POST['team_price_inicio']}' />".PHP_EOL;
		if (isset($_POST['team_price_final']))
			if ($_POST['team_price_final'] != '') 
				echo "<input type='hidden' name='team_price_final' value='{$_POST['team_price_final']}' />".PHP_EOL;
	}
	?>
</form> 
		
<script>
function atualizaanuncios(){
	
	J("#formularioCarro").submit();
}	
</script>				

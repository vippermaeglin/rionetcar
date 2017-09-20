<?php

require_once("../../include/configure/db.php");
require_once('../../include/library/tcpdf/tcpdf.php');

/* filter start */
$team_type = ($_GET['team_type'] != 'undefined') ? $_GET['team_type'] : null;
$team_title = ($_GET['team_title'] != 'undefined') ? $_GET['team_title'] : null;
$city_id = ($_GET['city_id'] != 'undefined') ? $_GET['city_id'] : null;
$partner_id = ($_GET['partner_id'] != 'undefined') ? $_GET['partner_id'] : null;

$conecta = mysql_connect($value['host'],$value['user'],$value['pass']);
mysql_select_db($value['name']);

#group_id (categorias), preco_comissao,market_price,per_number,min_number,max_number,now_number
#title, name, parceiro, begin_time, end_time, team_price
  
$consulta = array();
$consulta[] = 'SELECT t.id, t.title, t.begin_time, t.end_time, t.team_type, t.preco_comissao, t.market_price, t.per_number, 
t.min_number, t.max_number, t.now_number, t.team_price, c.name AS cidade, p.title AS parceiro
FROM team AS t 
LEFT JOIN category AS c ON c.id = t.city_id AND c.zone = "city"
LEFT JOIN partner AS p ON p.id = t.partner_id';

if($team_title){
	$consulta[] = 'WHERE t.title LIKE "%' . $team_title . '%"';
}

if($team_type){

	if($team_title){
		$consulta[] = 'AND t.team_type = "' . $team_type . '"';
	}else{
		$consulta[] = 'WHERE t.team_type = "' . $team_type . '"';
	}
}

if($city_id){
	if($team_title || $team_type){
		$consulta[] = 'AND t.city_id = ' . $city_id;
	}else{
		$consulta[] = 'WHERE t.city_id = ' . $city_id;
	}

}

if($partner_id){
	if($team_title || $team_type || $city_id){
		$consulta[] = 'AND t.partner_id = ' . $partner_id;
	}else{
		$consulta[] = 'WHERE t.partner_id = ' . $partner_id;
	}	
}

$consulta[] = 'ORDER BY t.id DESC';

$consulta = implode("\n", $consulta);

#var_dump($consulta);
#exit;

$resultado = mysql_query($consulta);

function numeroToMoeda($numero, $qtdDecimais = 2) {
	$numero = number_format($numero, $qtdDecimais);
	$numero = explode('.', $numero);
	return sprintf('%s,%s', str_replace(',', '.', $numero[0]), $numero[1]);
}

class VipPDF extends TCPDF{

	public function isFimPagina($tamanho = null) {

		if ($this->CurOrientation == 'P') {

			$tamanho = isset($tamanho) ? $tamanho : 280;

			if ($this->GetY() >= $tamanho) {
				$this->endPage();
				$this->startPage();
				return true;
			}
		} else {

			$tamanho = isset($tamanho) ? $tamanho : 200;

			if ($this->GetY() >= $tamanho) {
				$this->endPage();
				$this->startPage();
				return true;
			}
		}
	}

	public function Header(){
		$this->SetY(3);
		#$this->Image('../../include/logo/logo.png', 5, 3, 50, 20, '');
		#$this->SetY(5);
		$this->SetFont('Arial', 'BU');
		$this->MultiCell(0, 4, ' Relatório de Ofertas ', 0, 'C', false, 1);
		$this->SetFont('Arial', '', 8);
		$this->SetY(10);

		$pageH = 10;

		$this->MultiCell(85, 4, 'Oferta', 1, 'C', false, 0);
		#$this->line(90, PDF_MARGIN_TOP-15, 90, $this->GetPageHeight() - $pageH);

		$this->MultiCell(30, 4, 'Cidade', 1, 'C', false, 0);
		#$this->line(120, PDF_MARGIN_TOP-15, 120, $this->GetPageHeight() - $pageH);

		$this->MultiCell(40, 4, 'Parceiro', 1, 'C', false, 0);
		#$this->line(160, PDF_MARGIN_TOP-15, 160, $this->GetPageHeight() - $pageH);

		$this->MultiCell(30, 4, 'Período', 1, 'C', false, 0);
		#$this->line(190, PDF_MARGIN_TOP-15, 190, $this->GetPageHeight() - $pageH);

		$this->MultiCell(20, 4, 'Max. Pessoa', 1, 'C', false, 0);
		#$this->line(210, PDF_MARGIN_TOP-15, 210, $this->GetPageHeight() - $pageH);

		$this->MultiCell(15, 4, 'Min./Ativar', 1, 'C', false, 0);
		#$this->line(225, PDF_MARGIN_TOP-15, 225, $this->GetPageHeight() - $pageH);

		$this->MultiCell(15, 4, 'Estoque', 1, 'C', false, 0);
		#$this->line(240, PDF_MARGIN_TOP-15, 240, $this->GetPageHeight() - $pageH);

		$this->MultiCell(15, 4, 'Comissão', 1, 'C', false, 0);
		#$this->line(255, PDF_MARGIN_TOP-15, 255, $this->GetPageHeight() - $pageH);

		$this->MultiCell(20, 4, 'Preço Antigo', 1, 'C', false, 0);
		#$this->line(275, PDF_MARGIN_TOP-15, 275, $this->GetPageHeight() - $pageH);

		$this->MultiCell(15, 4, 'Preço', 1, 'C', false, 0);

		$this->Ln();
	}

	public function Footer(){
		$this->line(5, 200, $this->GetPageWidth() - 10, 200);
		$this->Ln();
		$this->SetY(-8);
		$this->SetFontSize(7);
		$this->MultiCell(0, 4, 'Página: ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, 'R');
	}

}

// create new PDF document
$pdf = new VipPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('VipCom');
$pdf->SetTitle('Relatório Ofertas');

//set margins
$pdf->SetMargins(5, 25, 5);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 8);
// ---------------------------------------------------------

// set font
$pdf->SetFont('Arial', '', 7);

// add a page
$pdf->AddPage();

// ----------------------------------------------------------

$pdf->SetY(15);
while ($reg = mysql_fetch_array($resultado)) {

	if(strlen($reg['title']) > 80){
		$title = substr($reg['title'], 0, 77) . '...';
	}else{
		$title = $reg['title'];
	}

	#$h = 5;
	$h = ($pdf->GetStringWidth($title) > 8) ? 8 : $pdf->GetStringWidth($title);

	$pdf->MultiCell(85, $h, utf8_encode($title), 0, 'C', false, 0);
	$pdf->MultiCell(30, $h, utf8_encode($reg['cidade']), 0, 'C', false, 0);
	$pdf->MultiCell(40, $h, utf8_encode($reg['parceiro']), 0, 'C', false, 0);
	$pdf->MultiCell(30, $h, date('d/m/Y', $reg['begin_time']) . ' a ' . date('d/m/Y', $reg['end_time']), 0, 'C', false, 0);
	$pdf->MultiCell(20, $h, numeroToMoeda($reg['per_number']), 0, 'C', false, 0);
	$pdf->MultiCell(15, $h, numeroToMoeda($reg['min_number']), 0, 'C', false, 0);
	$pdf->MultiCell(15, $h, numeroToMoeda($reg['max_number']), 0, 'C', false, 0);
	$pdf->MultiCell(15, $h, numeroToMoeda($reg['preco_comissao']), 0, 'C', false, 0);
	$pdf->MultiCell(20, $h, numeroToMoeda($reg['market_price']), 0, 'C', false, 0);
	$pdf->MultiCell(15, $h, numeroToMoeda($reg['team_price']), 0, 'C', false, 0);
	
	$pdf->Ln();

	if($pdf->isFimPagina()){
		$pdf->SetY(15);
	}
}

//Close and output PDF document
$pdf->Output('Ofertas.pdf', 'I');
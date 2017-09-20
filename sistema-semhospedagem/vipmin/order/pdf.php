<?php

require_once("../../include/configure/db.php");
require_once('../../include/library/tcpdf/tcpdf.php');

/* filter start */

$id = ($_GET['id'] != 'undefined') ? $_GET['id'] : null;

if($_GET['datapedido'] != 'undefined'){
	$datapedido = explode('/', $_GET['datapedido']);
	$datapedido = implode('-', array_reverse($datapedido));
}else{
	$datapedido = null;
}

$uemail = ($_GET['uemail'] != 'undefined') ? $_GET['uemail'] : null;
$team_id = ($_GET['team_id'] != 'undefined') ? $_GET['team_id'] : null;
$quantity = ($_GET['quantity'] != 'undefined') ? $_GET['quantity'] : null;
$origin = ($_GET['origin'] != 'undefined') ? $_GET['origin'] : null;
$state = ($_GET['state'] != 'undefined') ? $_GET['state'] : null;
$credit = ($_GET['credit'] != 'undefined') ? $_GET['credit'] : null;

$conecta = mysql_connect($value['host'],$value['user'],$value['pass']);
mysql_select_db($value['name']);
 
$consulta = array();
$consulta[] = 'SELECT o.id, o.create_time, o.quantity, o.origin, o.state, o.credit, t.title, u.email FROM `order` AS o 
LEFT JOIN team AS t ON t.id = o.team_id
LEFT JOIN user AS u ON u.id = o.user_id';

if($id){
	$consulta[] = 'WHERE o.id = ' . $id;
}

if($datapedido){

	if($id){
		$consulta[] = 'AND o.datapedido LIKE "' . $datapedido . '%"';
	}else{
		$consulta[] = 'WHERE o.datapedido LIKE "' . $datapedido . '%"';
	}
}

if($uemail){

	if($uemail || $datapedido){
		$consulta[] = 'AND o.uemail LIKE "%' . $uemail . '%"';
	}else{
		$consulta[] = 'WHERE o.uemail LIKE "%' . $uemail . '%"';
	}
}

if($team_id){
	if($id || $datapedido || $uemail){
		$consulta[] = 'AND o.team_id = ' . $team_id;
	}else{
		$consulta[] = 'WHERE o.team_id = ' . $team_id;
	}

}

if($quantity){
	if($id || $datapedido || $uemail || $team_id){
		$consulta[] = 'AND o.quantity = ' . $quantity;
	}else{
		$consulta[] = 'WHERE o.quantity = ' . $quantity;
	}	
}

if($origin){
	if($id || $datapedido || $uemail || $team_id || $quantity){
		$consulta[] = 'AND o.origin = ' . $origin;
	}else{
		$consulta[] = 'WHERE o.origin = ' . $origin;
	}	
}

if($state){
	if($id || $datapedido || $uemail || $team_id || $quantity || $origin){
		$consulta[] = 'AND o.state = "' . $state . '"';
	}else{
		$consulta[] = 'WHERE o.state = "' . $state . '"';
	}	
}

if($credit){
	if($id || $datapedido || $uemail || $team_id || $quantity || $origin || $state){
		$consulta[] = 'AND o.credit = ' . $credit;
	}else{
		$consulta[] = 'WHERE o.credit = ' . $credit;
	}	
}

$consulta[] = 'ORDER BY o.id DESC';

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
		$this->MultiCell(0, 4, ' Relatório de Pedidos ', 0, 'C', false, 1);
		$this->SetFont('Arial', '', 8);
		$this->SetY(10);

		$pageH = 10;

		$this->MultiCell(15, 4, 'Pedido', 1, 'C', false, 0);
		#$this->line(20, PDF_MARGIN_TOP-15, 20, $this->GetPageHeight() - $pageH);

		$this->MultiCell(30, 4, 'Data Pedido', 1, 'C', false, 0);
		#$this->line(50, PDF_MARGIN_TOP-15, 50, $this->GetPageHeight() - $pageH);

		$this->MultiCell(115, 4, 'Ofertas', 1, 'C', false, 0);
		#$this->line(165, PDF_MARGIN_TOP-15, 165, $this->GetPageHeight() - $pageH);

		$this->MultiCell(50, 4, 'Usuário', 1, 'C', false, 0);
		#$this->line(215, PDF_MARGIN_TOP-15, 215, $this->GetPageHeight() - $pageH);

		$this->MultiCell(15, 4, 'Qtde.', 1, 'C', false, 0);
		#$this->line(230, PDF_MARGIN_TOP-15, 230, $this->GetPageHeight() - $pageH);

		$this->MultiCell(15, 4, 'Total', 1, 'C', false, 0);
		#$this->line(245, PDF_MARGIN_TOP-15, 245, $this->GetPageHeight() - $pageH);

		$this->MultiCell(25, 4, 'Status', 1, 'C', false, 0);
		#$this->line(270, PDF_MARGIN_TOP-15, 270, $this->GetPageHeight() - $pageH);

		$this->MultiCell(20, 4, 'Pag.c/Crédito', 1, 'C', false, 0);

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

	switch ($reg['state']) {
		case 'pay':
			$state = 'Pago';
			break;
		
		case unpay:
			$state = 'Pendente';
			break;
	}

	$h = ($pdf->GetStringWidth($title) > 8) ? 8 : $pdf->GetStringWidth($title);

	$pdf->MultiCell(15, $h, $reg['id'], 0, 'C', false, 0);
	$pdf->MultiCell(30, $h, date('d/m/Y', $reg['create_time']), 0, 'C', false, 0);
	$pdf->MultiCell(115, $h, utf8_encode($title), 0, 'C', false, 0);
	$pdf->MultiCell(50, $h, utf8_encode($reg['email']), 0, 'C', false, 0);
	$pdf->MultiCell(15, $h, $reg['quantity'], 0, 'C', false, 0);
	$pdf->MultiCell(15, $h, numeroToMoeda($reg['origin']), 0, 'C', false, 0);
	$pdf->MultiCell(25, $h, $state, 0, 'C', false, 0);
	$pdf->MultiCell(20, $h, numeroToMoeda($reg['credit']), 0, 'C', false, 0);
	
	$pdf->Ln();

	if($pdf->isFimPagina()){
		$pdf->SetY(15);
	}
}

//Close and output PDF document
$pdf->Output('Pedidos.pdf', 'I');
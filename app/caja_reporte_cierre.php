<?
require("bd_codigo_conectar.php");
date_default_timezone_set("America/Caracas");
require 'fpdf/fpdf.php';

class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('img/logo.png', 5, 5, 30 );
			$this->SetFont('Arial','B',16);
			$this->Cell(30);
			$this->Cell(140,10, 'REPORTE DE CIERRE DE CAJA',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}

$id=$_GET["idcj"];
$qr_cj=mysql_query("SELECT * FROM caja_jornada WHERE id=$id");
$cj = mysql_fetch_array($qr_cj);
$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(190,10,'CIERRE DE CAJA',1,1,'C',3);

	
	$pdf->SetFont('Arial','B',12); 
	$pdf->Cell(190,9,"Fecha:                   ",1,0,'R');
	$pdf->SetFont('Arial','',12);
	$pdf->SetXY(176,42);
	$pdf->Cell(95,5,date("d-m-Y", strtotime($cj['fecha'])),0,0,'L');

	$pdf->SetXY(10,49);

	$pdf->SetFont('Arial','B',13);
	$pdf->Cell(190,9,'1) Clientes y Premios',1,1,'L',3);

	$pdf->SetXY(10,58);

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(190,28,' ',1,1,'L');

	$pdf->SetXY(32,62);
	$pdf->Cell(40,9,utf8_decode("N° de Clientes: "),0,0,'L');
	$pdf->SetXY(64,62);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(20,9,$cj['nr_clientes'],0,0,'L');

	$pdf->SetFont('Arial','B',12);
	$pdf->SetXY(32,72);
	$pdf->Cell(40,9,utf8_decode("N° de Premios: "),0,0,'L');
	$pdf->SetXY(64,72);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(20,9,$cj['nr_premios'],0,0,'L');

	$pdf->SetXY(10,86);

	$pdf->SetFont('Arial','B',13);
	$pdf->Cell(190,9,'2) Ingresos y Egresos',1,1,'L',3);

	$pdf->SetXY(10,95);

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(190,40,' ',1,1,'L');


	$pdf->SetXY(13,99);
	$pdf->Cell(40,9,utf8_decode("Monto de Ingresos (Bs.): "),0,0,'L');
	$pdf->SetXY(65,99);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(70,9,number_format($cj['monto_ingreso'], 2,',','.'),0,0,'L');
	
	$pdf->SetFont('Arial','B',12);
	$pdf->SetXY(14,109);
	$pdf->Cell(40,9,utf8_decode("Monto de Egresos (Bs.): "),0,0,'L');
	$pdf->SetXY(65,109);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(70,9,number_format($cj['monto_egreso'], 2,',','.'),0,0,'L');

	$saldo_cierre = $cj['monto_ingreso'] - $cj['monto_egreso'];

	$pdf->SetFont('Arial','B',12);
	$pdf->SetXY(65,112);
	$pdf->Cell(40,9,utf8_decode("__________________"),0,0,'L');

	$pdf->SetXY(20,120);
	$pdf->Cell(40,9,utf8_decode("Saldo de Cierre (Bs.): "),0,0,'L');
	$pdf->SetXY(65,120);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(70,9,number_format($saldo_cierre, 2,',','.'),0,0,'L');

	$pdf->SetXY(10,135);

	$pdf->SetFont('Arial','B',13);
	$pdf->Cell(190,9,'3) Totales',1,1,'L',3);

	
	$pdf->SetXY(10,144);

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(190,40,' ',1,1,'L');

	$pdf->SetXY(22,148);
	$pdf->Cell(40,9,utf8_decode("Saldo Anterior (Bs.): "),0,0,'L');
	$pdf->SetXY(65,148);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(70,9,number_format($cj['saldo_anterior'], 2,',','.'),0,0,'L');
	
	$pdf->SetFont('Arial','B',12);
	$pdf->SetXY(20,157);
	$pdf->Cell(40,9,utf8_decode("Saldo de Cierre (Bs.): "),0,0,'L');
	$pdf->SetXY(65,157);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(70,9,number_format($saldo_cierre, 2,',','.'),0,0,'L');

	
	$saldo_total = $saldo_cierre + $cj['saldo_anterior'];

	$pdf->SetFont('Arial','B',12);
	$pdf->SetXY(65,160);
	$pdf->Cell(40,9,utf8_decode("__________________"),0,0,'L');
	
	$pdf->SetXY(25,168);
	$pdf->Cell(40,9,utf8_decode("Saldo Actual (Bs.): "),0,0,'L');
	$pdf->SetXY(65,168);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(70,9,number_format($saldo_total, 2,',','.'),0,0,'L');

	$pdf->Output();


?>
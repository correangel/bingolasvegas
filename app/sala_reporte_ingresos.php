<?
require("bd_codigo_conectar.php");
date_default_timezone_set("America/Caracas");
require 'fpdf/fpdf.php';

class PDF extends FPDF
{
		function Header()
		{
			$this->Image('img/logo.png', 5, 5, 30 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(140,10, utf8_decode('REPORTE DE INGRESOS POR FECHAS'),0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
}

$fini=$_GET["fini"];
$ffin=$_GET["ffin"];

$qr=mysql_query("SELECT SUM(monto_estimado) as monto FROM cliente_maquina WHERE fecha>='$fini' AND fecha<='$ffin'") or die(mysql_error());

$row = mysql_fetch_array($qr);

$_qr=mysql_query("SELECT count(*) as total FROM cliente_maquina WHERE fecha>='$fini' AND fecha<='$ffin'") or die(mysql_error());

$cli = mysql_fetch_array($_qr);



	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(190,8,utf8_decode('1) FECHAS'),1,1,'L',3);

	$pdf->SetFont('Arial','',10); 
	$pdf->Cell(190,28,"",1,0,'L');


	$pdf->SetXY(21,45);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(95,5,utf8_decode("Fecha Inicio: "),0,0,'L');
	$pdf->SetXY(44,45);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(25,5,date("d-m-Y", strtotime($fini)),0,0,'L');

	$pdf->SetXY(25,52);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(95,5,utf8_decode("Fecha Fin: "),0,0,'L');
	$pdf->SetXY(44,52);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(95,5,date("d-m-Y", strtotime($ffin)),0,0,'L');

	$pdf->SetXY(10,66);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(190,8,'2) TOTALES:',1,1,'L',1);

	$pdf->SetXY(10,74);

	$pdf->SetFont('Arial','',10); 
	$pdf->Cell(190,28,"",1,0,'L');

	$pdf->SetXY(28,81);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(95,5,utf8_decode("Clientes: "),0,0,'L');
	$pdf->SetXY(44,81);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(25,5,$cli['total'],0,0,'L');

	$pdf->SetXY(23,88);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(95,5,utf8_decode("Monto (Bs.): "),0,0,'L');
	$pdf->SetXY(44,88);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(95,5,number_format($row["monto"], 2, ',', '.'),0,0,'L');

	$pdf->Output();


?>
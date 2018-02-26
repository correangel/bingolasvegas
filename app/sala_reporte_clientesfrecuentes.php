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
			$this->Cell(140,10, utf8_decode('LISTADO DE CLIENTES MÁS FRECUENTES'),0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
}

$qr_cli=mysql_query("SELECT * FROM cliente WHERE nr_juegos>0 order by nr_juegos desc");

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(25,6,utf8_decode('CÉD./PAS.'),1,0,'C',1);
$pdf->Cell(140,6,'NOMBRE',1,0,'C',1);
$pdf->Cell(25,6,utf8_decode('N° JUEGOS'),1,1,'C',1);
$pdf->SetFont('Arial','',10);
	
while($row = mysql_fetch_array($qr_cli))
{
	$pdf->Cell(25,6,$row['tdoc']."-".$row['ndoc'],1,0,'C');
	$pdf->Cell(140,6,utf8_decode($row['nombre']),1,0,'C');
	$pdf->Cell(25,6,utf8_decode($row['nr_juegos']),1,1,'C');
}

$pdf->Output();
?>
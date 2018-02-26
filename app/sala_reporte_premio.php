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
			$this->Cell(140,10, utf8_decode('PLANILLA DE PREMIO'),0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}

$idcmq=$_GET["idcmq"];
$qr_cmq=mysql_query("SELECT * FROM cliente_maquina WHERE id=$idcmq");
$cmq = mysql_fetch_array($qr_cmq);

$idm=$cmq["id_maquina"];
$idc=$cmq["id_cliente"];
$idp=$cmq["id_premio"];

$qr_mq=mysql_query("SELECT * FROM maquina WHERE id=$idm");
$maq = mysql_fetch_array($qr_mq);

$qr_cl=mysql_query("SELECT * FROM cliente WHERE id=$idc");
$cli = mysql_fetch_array($qr_cl);

$qr_pr=mysql_query("SELECT * FROM premio WHERE id=$idp");
$pre = mysql_fetch_array($qr_pr);





$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(190,8,utf8_decode('1) DATOS DEL CLIENTE'),1,1,'L',3);

	 
	$pdf->SetFont('Arial','',10); 
	$pdf->Cell(190,150,"",1,0,'L');


	$pdf->SetXY(37,45);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(95,5,utf8_decode("N°: "),0,0,'L');
	$pdf->SetXY(43,45);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(25,5,utf8_decode($cli['nr']),0,0,'L');


	$pdf->SetXY(25,52);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(95,5,utf8_decode("Céd./Pas.: "),0,0,'L');
	$pdf->SetXY(43,52);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(95,5,$cli['tdoc']."-".$cli['ndoc'],0,0,'L');

	$pdf->SetXY(28,59);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(95,5,utf8_decode("Nombre:"),0,0,'L');
	$pdf->SetXY(43,59);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(95,5,utf8_decode($cli['nombre']),0,0,'L');

	$pdf->SetXY(19,66);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(95,5,utf8_decode("Nacionalidad:"),0,0,'L');
	$pdf->SetXY(43,66);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(95,5,utf8_decode($cli['nacionalidad']),0,0,'L');

	$pdf->SetXY(31,73);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(95,5,utf8_decode("Oficio:"),0,0,'L');
	$pdf->SetXY(43,73);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(95,5,utf8_decode($cli['oficio']),0,0,'L');

	$pdf->SetXY(25,80);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(95,5,utf8_decode("Dirección:"),0,0,'L');
	$pdf->SetXY(43,80);
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(155,5,utf8_decode($cli['direccion']),0,'L','L');





	$pdf->SetXY(10,110);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(190,8,'2) DETALLES:',1,1,'L',1);

	$pdf->SetXY(31,127);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(95,5,utf8_decode("Fecha:"),0,0,'L');
	$pdf->SetXY(43,127);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(95,5,date("d-m-Y", strtotime($cmq['fecha'])),0,0,'L');

	$pdf->SetXY(27,134);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(95,5,utf8_decode("Máquina:"),0,0,'L');
	$pdf->SetXY(43,134);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(95,5,utf8_decode($maq['codigo']),0,0,'L');

	$pdf->SetXY(29,141);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(95,5,utf8_decode("Premio:"),0,0,'L');
	$pdf->SetXY(43,141);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(95,5,utf8_decode($pre['descripcion']),0,0,'L');

	$pdf->SetXY(22,148);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(95,5,utf8_decode("Monto (Bs.):"),0,0,'L');
	$pdf->SetXY(43,148);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(95,5,number_format($pre["monto"], 2, ',', '.'),0,0,'L');


	$pdf->SetXY(115,178);
	$pdf->Cell(95,5,utf8_decode("Firma del Cliente:_________________________"),0,0,'L');

	$pdf->Output();


?>
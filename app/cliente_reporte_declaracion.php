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
			$this->Cell(140,10, utf8_decode('REGISTRO DE DECLARACIÓN DEL DINERO'),0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}

$id=$_GET["id"];
$qr_cli=mysql_query("SELECT * FROM cliente WHERE id=$id");
$row = mysql_fetch_array($qr_cli);
$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',13);
	$pdf->Cell(190,6,utf8_decode('FORMULARIO PARA LA DECLARACIÓN DEL ORIGEN DEL DINERO'),1,1,'C',3);

	
	$pdf->SetFont('Arial','',10); 
	$pdf->Cell(190,170,"",1,0,'L');

	$pdf->SetXY(15,45);
	$pdf->Cell(95,5,"Yo _____________________________________________________,",0,0,'L');

	$pdf->SetXY(22,45);
	$pdf->Cell(95,5,utf8_decode($row['nombre']),0,0,'L');

	$pdf->SetXY(126,45);
	$pdf->Cell(95,5,utf8_decode("titular de la Cédula de Identidad o Pasaporte"),0,0,'L');

	$pdf->SetXY(15,53);
	$pdf->Cell(95,5,"No ______________________, ",0,0,'L');

	$pdf->SetXY(22,53);
	$pdf->Cell(95,5,$row['tdoc']."-".$row['ndoc'],0,0,'L');

	$pdf->SetXY(66,53);
	$pdf->Cell(95,5,"de nacionalidad __________________________, y residenciado en ___________",0,0,'L');

	$pdf->SetXY(93,53);
	$pdf->Cell(95,5,utf8_decode($row['nacionalidad']),0,0,'L');

	$pdf->SetXY(15,61);
	$pdf->Cell(95,5,"____________________________________________________________________________________________",0,0,'L');

	$pdf->SetXY(15,61);
	$pdf->Cell(95,5,utf8_decode($row['direccion']),0,0,'L');

	$pdf->SetFont('Arial','B',10); 
	$pdf->SetXY(15,76);
	$pdf->Cell(95,5,utf8_decode("Declaro bajo juramento que el dinero en efectivo, en cheques, tarjetas de débito, tarjetas de crédito u otros"),0,0,'L');

	$pdf->SetXY(15,84);
	$pdf->Cell(95,5,utf8_decode("instrumentos financieros de pago, que stoy empleando para:"),0,0,'L');

	$pdf->SetXY(15,96);
	$pdf->Cell(180,18,"",1,0,'L');

	$pdf->SetXY(15,99);
	$pdf->Cell(95,5,utf8_decode("Realizar jugadas en las máquinas, juegos de mesa, bingo cantado u otros juegos de esta"),0,0,'L');

	$pdf->SetXY(15,106);
	$pdf->Cell(95,5,utf8_decode("sala de Bingo"),0,0,'L');


	$pdf->SetXY(180,96);
	$pdf->Cell(15,18,"",1,0,'L');

	$pdf->SetFont('Arial','',10); 
	$pdf->SetXY(15,126);
	$pdf->Cell(95,5,utf8_decode("Tiene su origen en las actividades que como (nombre del cargo laboral, actividad comercial o profesional)"),0,0,'L');

	$pdf->SetXY(15,133);
	$pdf->Cell(95,5,"________________________________________, en la Ciudad de _____________________________________",0,0,'L');

	$pdf->SetXY(16,133);
	$pdf->Cell(95,5,utf8_decode($row['oficio']),0,0,'L');

	$pdf->SetXY(123,133);
	$pdf->Cell(95,5,utf8_decode($row['ciudad_oficio']),0,0,'L');

	$pdf->SetXY(15,140);
	$pdf->Cell(95,5,utf8_decode(", Estado ________________________________________, País _____________________________________"),0,0,'L');

	$pdf->SetXY(30,140);
	$pdf->Cell(95,5,utf8_decode($row['estado_oficio']),0,0,'L');

	$pdf->SetXY(119,140);
	$pdf->Cell(95,5,utf8_decode($row['pais_oficio']),0,0,'L');

	$pdf->SetXY(15,150);
	$pdf->Cell(95,5,utf8_decode("No tienen relación alguna con capitales, haberes, valores o títulos que sean producto de las actividades de"),0,0,'L');

	$pdf->SetXY(15,157);
	$pdf->Cell(95,5,utf8_decode("legitimación de capitales y financiamiento del terrorismo, conforme a lo establecido en el artículo 35 de la Ley"),0,0,'L');

	$pdf->SetXY(15,164);
	$pdf->Cell(95,5,utf8_decode("Orgánica Contra la Delincuencia Organizada y Financiamiento al Terrorismo (LOCDOFT)."),0,0,'L');

	$pdf->SetXY(15,179);
	$pdf->Cell(95,5,utf8_decode("A la vez manifiesto que no está vinculado, directa o indirectamente con actividades de tráfico de drogas, secuestro"),0,0,'L');

	$pdf->SetXY(15,186);
	$pdf->Cell(95,5,utf8_decode("o cualquier otro delito grave de la delicuencia organizada o grupos de terroristas."),0,0,'L');

	$pdf->SetXY(15,199);
	$pdf->Cell(95,5,utf8_decode("Firma:____________________________________"),0,0,'L');

	$pdf->Output();


?>
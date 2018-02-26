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
			$this->Cell(140,10, 'REGISTRO DE CLIENTE (PERSONA NATURAL)',0,0,'C');
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
	$pdf->Cell(190,6,'FORMULARIO',1,1,'C',3);

	
	$pdf->SetFont('Arial','B',8); 
	$pdf->Cell(95,5,"Fecha de Registro: ",1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(36,36);
	$pdf->Cell(95,5,date("d-m-Y", strtotime($row['fecha_reg'])),0,0,'L');

	$pdf->SetX(105);


	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(95,5,"Nr. Cliente:           ",1,0,'R');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(190,36);
	$pdf->Cell(95,5,$row['nr'],0,0,'L');


	$pdf->SetFont('Arial','B',11);
	$pdf->SetXY(10,41);
	$pdf->Cell(190,6,'1) Datos Personales:',1,1,'L',1);


	$pdf->SetXY(10,47);

	$pdf->SetFont('Arial','B',8); 
	$pdf->Cell(140,5,"Nombre Completo: ",1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(36,47);
	$pdf->Cell(140,5,utf8_decode($row['nombre']),0,0,'L');

	$pdf->SetX(150);

	$pdf->SetFont('Arial','B',8); 
	$pdf->Cell(50,5,utf8_decode("Cédula/Pasaporte: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(176,47);
	$pdf->Cell(50,5,$row['tdoc']."-".$row['ndoc'],0,0,'L');

	$pdf->SetXY(10,52);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(45,5,utf8_decode("Fecha Nacimiento: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(36,52);
	$pdf->Cell(45,5,date("d-m-Y", strtotime($row['fecha_nac'])),0,0,'L');

	$pdf->SetXY(55,52);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(70,5,utf8_decode("País de Nacimiento: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(83,52);
	$pdf->Cell(70,5,utf8_decode($row['pais_nac']),0,0,'L');

	$pdf->SetXY(125,52);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(75,5,utf8_decode("Lugar de Nacimiento: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(155,52);
	$pdf->Cell(75,5,utf8_decode($row['lugar_nac']),0,0,'L');



	$pdf->SetXY(10,57);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(65,5,utf8_decode("Nacionalidad: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(29,57);
	$pdf->Cell(65,5,$row['nacionalidad'],0,0,'L');

	$pdf->SetXY(75,57);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(45,5,utf8_decode("Edo. Civil: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(90,57);
	$pdf->Cell(45,5,$row['edocivil'],0,0,'L');

	$pdf->SetXY(120,57);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(80,5,utf8_decode("Cónyuge: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(134,57);
	$pdf->Cell(80,5,$row['conyuge'],0,0,'L');

	
	
	$pdf->SetXY(10,62);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(190,5,utf8_decode("Dirección: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(25,62);
	$pdf->Cell(190,5,utf8_decode($row['direccion']),0,0,'L');

	$pdf->SetXY(10,67);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(55,5,utf8_decode("N° Teléfono: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(28,67);
	$pdf->Cell(55,5,utf8_decode($row['telefono']),0,0,'L');

	$pdf->SetXY(65,67);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(135,5,utf8_decode("Correo Electrónico: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(93,67);
	$pdf->Cell(135,5,utf8_decode($row['email']),0,0,'L');


	$pdf->SetXY(10,72);

	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(190,6,'2) Datos Laborales:',1,1,'L',1);

	$pdf->SetXY(10,78);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(64,5,utf8_decode("Oficio: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(20,78);
	$pdf->Cell(64,5,utf8_decode($row['oficio']),0,0,'L');

	$pdf->SetXY(74,78);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(63,5,utf8_decode("Ciudad: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(85,78);
	$pdf->Cell(63,5,utf8_decode($row['ciudad_oficio']),0,0,'L');

	$pdf->SetXY(137,78);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(63,5,utf8_decode("Estado: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(148,78);
	$pdf->Cell(63,5,utf8_decode($row['estado_oficio']),0,0,'L');

	$pdf->SetXY(10,83);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(60,5,utf8_decode("País: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(18,83);
	$pdf->Cell(60,5,utf8_decode($row['pais_oficio']),0,0,'L');

	$pdf->SetXY(70,83);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(45,5,utf8_decode("Teléfono: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(84,83);
	$pdf->Cell(45,5,utf8_decode($row['tlf_empresa']),0,0,'L');

	$pdf->SetXY(115,83);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(85,5,utf8_decode("Correo Electrónico: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(142,83);
	$pdf->Cell(85,5,utf8_decode($row['email_empresa']),0,0,'L');

	$pdf->SetXY(10,88);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(64,5,utf8_decode("Ingreso Mensual (Bs.): "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(41,88);
	$pdf->Cell(64,5,utf8_decode($row['ingreso_mensual']),0,0,'L');

	$pdf->SetXY(74,88);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(63,5,utf8_decode("Cantidad de juegos que realiza: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(117,88);
	$pdf->Cell(63,5,utf8_decode($row['nr_juegos']),0,0,'L'); 

	$pdf->SetXY(137,88);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(63,5,utf8_decode("Cantidad de operaciones financieras: "),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(188,88);
	$pdf->Cell(63,5," ",0,0,'L');



	$pdf->SetXY(10,93);

	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(190,6,'3) Perfil del Cliente :',1,1,'L',1);

	$pdf->SetXY(10,99);
	$pdf->SetFont('Arial','B',8); 
	$pdf->Cell(85,5,utf8_decode("Persona Expuesta Políticamente"),1,0,'R');
	$x=($row['pep']=="SI"?"X":"");
	$pdf->SetXY(95,99);
	$pdf->Cell(10,5,$x,1,0,'C');

	$pdf->SetXY(105,99);
	$pdf->SetFont('Arial','B',8); 
	$pdf->Cell(85,5,utf8_decode("Actúa Por Cuenta Propia"),1,0,'R');
	$x=($row['acp']=="SI"?"X":"");
	$pdf->SetXY(190,99);
	$pdf->Cell(10,5,$x,1,0,'C');

	$pdf->SetXY(10,104);
	$pdf->SetFont('Arial','B',8); 
	$pdf->Cell(85,5,utf8_decode("Actúa a Nombre de Otra Persona"),1,0,'R');
	$x=($row['aop']=="SI"?"X":"");
	$pdf->SetXY(95,104);
	$pdf->Cell(10,5,$x,1,0,'C');

	$pdf->SetXY(105,104);
	$pdf->SetFont('Arial','B',8); 
	$pdf->Cell(85,5,utf8_decode("Juega Como Actividad Recreativa"),1,0,'R');
	$x=($row['jar']=="SI"?"X":"");
	$pdf->SetXY(190,104);
	$pdf->Cell(10,5,$x,1,0,'C');

	$pdf->SetXY(10,109);
	$pdf->SetFont('Arial','B',8); 
	$pdf->Cell(85,5,utf8_decode("Otro"),1,0,'R');
	$x=($row['otro']=="SI"?"X":"");
	$pdf->SetXY(95,109);
	$pdf->Cell(10,5,$x,1,0,'C');

	$pdf->SetXY(105,109);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(95,5,utf8_decode("Descripción:"),1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(123,109);
	$pdf->Cell(95,5,$row['otro_descr'],0,0,'L');

	$pdf->SetXY(10,114);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(190,6,utf8_decode('4) Declaración Bajo Juramento :'),1,1,'L',1);

	$pdf->SetXY(10,120);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(190,65,utf8_decode(''),1,1,'C',0);

	$pdf->SetFont('Arial','',10);
	$pdf->SetXY(10,122);
	$pdf->Cell(64,5,"Declaro bajo juramento que:",0,0,'L');

	$pdf->SetXY(10,132);
	$pdf->Cell(64,5,"1. Las informaciones suministradas son exactas y verdaderas.",0,0,'L');

	$pdf->SetXY(10,139);
	$pdf->Cell(64,5,"2. Los valores, instrumentos y medios de pago objeto de las operaciones efectuadas o a efectuar en ",0,0,'L');

	
	$pdf->SetXY(168,139);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(64,5,"BINGO LAS",0,0,'L');

	$pdf->SetXY(10,144);
	$pdf->Cell(64,5,"    VEGAS, C.A. ",0,0,'L');

	$pdf->SetXY(36,144);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(64,5,utf8_decode("tienen un origen y un propósito lícito, en los términos de las leyes y regulaciones vigentes en materia"),0,0,'L');

	$pdf->SetXY(10,149);
	$pdf->Cell(64,5,utf8_decode("    de prevención, control y detección de la legitimación de capitales y financiamiento del terrorismo de las cuales tengo"),0,0,'L');

	$pdf->SetXY(10,154);
	$pdf->Cell(64,5,utf8_decode("    pleno conocimiento."),0,0,'L');

	$pdf->SetXY(10,161);
	$pdf->Cell(64,5,utf8_decode("3. Asimismo, me adhiero total y completamente a las políticas que en materia de prevención, control y detección de la"),0,0,'L');

	$pdf->SetXY(10,166);
	$pdf->Cell(64,5,utf8_decode("    legitimación de capitales y financiamiento del terrorismo ejecuta "),0,0,'L');

	$pdf->SetXY(116,166);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(64,5,"BINGO LAS VEGAS, C.A.",0,0,'L');

	$pdf->SetXY(10,178);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(64,5,utf8_decode("4. Firma del Cliente: _________________________"),0,0,'L');





	

	$pdf->Output();


?>
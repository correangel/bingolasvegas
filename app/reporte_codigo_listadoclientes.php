<?
require("bd_codigo_conectar.php");
date_default_timezone_set("America/Caracas");
$fini=$_GET["fini"];
$ffin=$_GET["ffin"];
$qr = mysql_query("SELECT SUM(cmaq.monto_estimado) as monto, cli.nombre FROM cliente_maquina cmaq INNER JOIN cliente cli ON cmaq.id_cliente=cli.id WHERE cmaq.fecha>='$fini' AND cmaq.fecha <='$ffin' GROUP by cli.id") or die(mysql_error());

$lista= array();

while ($rw=mysql_fetch_array($qr))
	$lista[] = array('name'=> $rw["nombre"],'y'=> floatval($rw["monto"]));

echo json_encode($lista);
?>
<?
require("bd_codigo_conectar.php");
$fini=$_POST["fini"];
$ffin=$_POST["ffin"];
$consulta=mysql_query("SELECT SUM(monto_estimado) as monto FROM cliente_maquina WHERE fecha>='$fini' AND fecha<='$ffin'") or die(mysql_error());
$lista= array();
if (mysql_num_rows($consulta)==0)
	$lista[] = array('monto'=> 0);
else{

	$qr = mysql_query("SELECT * FROM parametros") or die(mysql_error());
	if (mysql_num_rows($qr)>0)
		$qr = mysql_query("TRUNCATE TABLE parametros") or die(mysql_error());
	


	$qr = mysql_query("INSERT INTO parametros(param_1,param_2) VALUES ('$fini','$ffin')") or die(mysql_error());


	while($rw=mysql_fetch_array($consulta))
		$lista[] = array('monto'=> $rw["monto"]);
}

echo json_encode($lista);


?>
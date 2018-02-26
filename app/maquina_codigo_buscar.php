<?
require("bd_codigo_conectar.php");
$id=$_POST["id"];
$consulta=mysql_query("SELECT * FROM maquina WHERE id=$id") or die(mysql_error());
$lista= array();

while($mq=mysql_fetch_array($consulta))
	$lista[] = array('id'=> $mq["id"], 'cod'=> $mq["codigo"]);

echo json_encode($lista);
?>
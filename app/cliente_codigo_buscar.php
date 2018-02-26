<?
require("bd_codigo_conectar.php");
$id=$_POST["id"];
$consulta=mysql_query("SELECT * FROM cliente WHERE id=$id") or die(mysql_error());
$lista= array();

while($cli=mysql_fetch_array($consulta))
	$lista[] = array('id'=> $cli["id"], 'nom'=> $cli["nombre"], 'ced'=> $cli["tdoc"]."-".$cli["ndoc"]);

echo json_encode($lista);
?>
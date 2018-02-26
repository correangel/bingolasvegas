<?
require("bd_codigo_conectar.php");
require("_codigo_metodos.php");


$idcmq=$_POST["idcmq"];
$idp=$_POST["idp"];
$dsc=strtoupper($_POST["descr"]);
$mto=$_POST["monto"];

if ($idp==""){
	$consulta=mysql_query("INSERT INTO premio (descripcion,monto) VALUES ('$dsc','$mto')") or die(mysql_error());
	$idp = id_max_tabla("premio");
	$consulta=mysql_query("UPDATE cliente_maquina SET id_premio=$idp WHERE id=$idcmq") or die(mysql_error());
}
else
	$consulta=mysql_query("UPDATE premio SET descripcion='$dsc',monto='$mto' WHERE id=$idp") or die(mysql_error());
	

echo 1;

?>
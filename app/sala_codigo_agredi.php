<?
require("bd_codigo_conectar.php");
date_default_timezone_set("America/Caracas");

$id=$_POST["idcmaq"];
$idc=$_POST["idcli"];
$idm=$_POST["idmaq"];
$mto=$_POST["mtoest"];
$hoy = date("Y-m-d");

$qr_caj=mysql_query("SELECT * FROM caja_jornada WHERE estatus='ABIERTA'");
$_cj=mysql_fetch_array($qr_caj);
$idcj=$_cj["id"];


if ($id==""){
	$consulta=mysql_query("INSERT INTO cliente_maquina (id_cliente,id_maquina,id_premio,id_caja_jornada,fecha,monto_estimado) VALUES ($idc,$idm,-1,$idcj,'$hoy','$mto')") or die(mysql_error());

	$consulta2=mysql_query("UPDATE cliente SET nr_juegos=nr_juegos+1 WHERE id=$idc") or die(mysql_error());



}
else
	$consulta=mysql_query("UPDATE cliente_maquina SET id_maquina=$idm,monto_estimado='$mto' WHERE id=$id") or die(mysql_error());

echo 1;

?>
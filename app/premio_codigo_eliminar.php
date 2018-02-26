<?
require("bd_codigo_conectar.php"); 
$idp=$_POST["id"];
$consulta=mysql_query("UPDATE cliente_maquina SET id_premio=-1 WHERE id_premio=$idp") or die(mysql_error());
$consulta2=mysql_query("DELETE FROM premio WHERE id=$idp") or die(mysql_error());
echo 1;
?>
<?
require("bd_codigo_conectar.php");
$valor = $_POST["valor"];
$consulta=mysql_query("UPDATE ut SET valor='$valor'") or die(mysql_error());
echo 1;
?>
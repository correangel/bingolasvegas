<?php
require("bd_codigo_conectar.php");
date_default_timezone_set("America/Caracas");


$hoy = date("Y-m-d");

$consulta=mysql_query("SELECT * FROM caja") or die(mysql_error());
$cj=mysql_fetch_array($consulta);

$ing=$cj["monto_ingreso"];
$egr=$cj["monto_egreso"];

$saldo=$ing-$egr;


$consulta=mysql_query("INSERT INTO caja_jornada (fecha,estatus,nr_clientes,nr_premios,saldo_anterior,monto_ingreso,monto_egreso) VALUES ('$hoy','ABIERTA',0,0,'$saldo','0','0') ") or die(mysql_error());

echo 1;


?>
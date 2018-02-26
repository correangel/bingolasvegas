<?

require("bd_codigo_conectar.php");

$consulta=mysql_query("SELECT * FROM caja_jornada WHERE estatus='ABIERTA'") or die(mysql_error());
$cj=mysql_fetch_array($consulta);

$idcj = $cj["id"];

$consulta=mysql_query("SELECT * FROM cliente_maquina WHERE id_caja_jornada=$idcj") or die(mysql_error());
$nrcli=0;
$nrpre=0;
$mto_egr=0;
$mto_ing=0;
while ($cmq=mysql_fetch_array($consulta)){
	$nrcli++;
	$mto_ing += $cmq["monto_estimado"];
	$idp = $cmq["id_premio"];
	if ($idp!=-1){
		$qr_prm=mysql_query("SELECT * FROM premio WHERE id=$idp") or die(mysql_error());
		$prm=mysql_fetch_array($qr_prm);
		$mto_egr += $prm["monto"];
		$nrpre++;
	}
}

$consulta=mysql_query("UPDATE caja_jornada SET estatus='CERRADA',nr_premios=$nrpre,nr_clientes=$nrcli,monto_ingreso='$mto_ing',monto_egreso='$mto_egr' WHERE id=$idcj") or die(mysql_error());

$consulta=mysql_query("SELECT * FROM caja") or die(mysql_error());
$caj=mysql_fetch_array($consulta);

$mto_ing += $caj["monto_ingreso"];
$mto_egr += $caj["monto_egreso"];

$consulta=mysql_query("UPDATE caja SET monto_ingreso='$mto_ing',monto_egreso='$mto_egr'") or die(mysql_error());

echo $idcj;
?>
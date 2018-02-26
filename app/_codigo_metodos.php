<?

require("bd_codigo_conectar.php");

function nr_cliente(){
	$qr=mysql_query("SELECT max(nr) as nr FROM cliente");
	if (mysql_num_rows($qr)==0)
		return 1;
	else {
		$rw= mysql_fetch_array($qr);
		$nr = $rw["nr"];
		return $nr+1;
	}

}

function ut(){
	$qr=mysql_query("SELECT * FROM ut");
	$rw= mysql_fetch_array($qr);
	return $rw["valor"];
}

function id_max_tabla($tabla){
    $qr=mysql_query("SELECT MAX(id) AS id FROM ".$tabla) or die(mysql_error());
    $rw=mysql_fetch_array($qr);
    return $rw["id"];
}



?>
<?php
session_start();
require("bd_codigo_conectar.php");
/*var_dump($_POST);
exit;*/

$idu=$_POST['idu'];
$nom=strtoupper($_POST['nombre']);
$ape=strtoupper($_POST['apellido']);
$ps=$_POST['ps'];
$rs=$_POST['rs'];
$pss=$_POST['pss'];


$lg=strtoupper($_POST['login']);
if ($idu=="")
	$consulta=mysql_query("SELECT * FROM usuario WHERE login='$lg'") or die(mysql_error());
else
	$consulta=mysql_query("SELECT * FROM usuario WHERE login='$lg' and id<>$idu ") or die(mysql_error());


if (mysql_num_rows($consulta)>0){
	
	echo -1;
}
else {

		if ($pss!="")
			$str_qr="UPDATE usuario SET nombre='$nom',apellido='$ape',login='$lg',clave='$pss',pregunta='$ps',respuesta='$rs' WHERE id=$idu";
		else
			$str_qr="UPDATE usuario SET nombre='$nom',apellido='$ape',login='$lg',pregunta='$ps',respuesta='$rs' WHERE id=$idu";

		//echo $str_qr;

		$consulta=mysql_query($str_qr) or die(mysql_error());

		echo 1;
	

}






?>

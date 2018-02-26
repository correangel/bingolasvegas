<?
require("bd_codigo_conectar.php");

//var_dump($_POST);
//exit();

$id=$_POST["id"];
$cod = strtoupper($_POST["cod"]);
$descr= strtoupper($_POST["descr"]);
$ubic = strtoupper($_POST["ubic"]);

if ($id=="")
	$consulta=mysql_query("SELECT * FROM maquina WHERE codigo='$cod'") or die(mysql_error());
else
	$consulta=mysql_query("SELECT * FROM maquina WHERE codigo='$cod' and id<>$id ") or die(mysql_error());

if (mysql_num_rows($consulta)>0){
	echo -1;
	exit;
}
else if ($id=="")
	$consulta=mysql_query("INSERT INTO maquina (codigo,descripcion,ubicacion) VALUES ('$cod','$descr','$ubic') ") or die(mysql_error());
else
	$consulta=mysql_query("UPDATE maquina SET codigo='$cod',descripcion='$descr',ubicacion='$ubic' WHERE id=$id ") or die(mysql_error());

echo 1;



?>
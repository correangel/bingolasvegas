<?php
session_start();
require("bd_codigo_conectar.php");
/*var_dump($_POST);
exit;*/

$idu=$_POST['idu'];
$nom=strtoupper($_POST['nombre']);
$ape=strtoupper($_POST['apellido']);
$perf=$_POST['perfil'];
$ps=$_POST['ps'];
$rs=$_POST['rs'];
$pss=$_POST['pss'];
$act=$_POST['act'];


$lg=strtoupper($_POST['login']);
if ($idu=="")
	$consulta=mysql_query("SELECT * FROM usuario WHERE login='$lg'") or die(mysql_error());
else
	$consulta=mysql_query("SELECT * FROM usuario WHERE login='$lg' and id<>$idu ") or die(mysql_error());


if (mysql_num_rows($consulta)>0){
	
	echo -1;
}
else {

	if ($idu==""){
	
		$consulta=mysql_query("INSERT INTO usuario (nombre,apellido,perfil,login,clave,pregunta,respuesta,activo) VALUES ('$nom','$ape','$perf','$lg','$pss','$ps','$rs','$act')") or die(mysql_error());
	}
	else {

		if ($pss!="")
			$str_qr="UPDATE usuario SET nombre='$nom',apellido='$ape',perfil='$perf',login='$lg',clave='$pss',pregunta='$ps',respuesta='$rs',activo='$act' WHERE id=$idu";
		else
			$str_qr="UPDATE usuario SET nombre='$nom',apellido='$ape',perfil='$perf',login='$lg',pregunta='$ps',respuesta='$rs',activo='$act' WHERE id=$idu";

		$consulta=mysql_query($str_qr) or die(mysql_error());


		if ($idu==$_SESSION['idu']){

			$qr=mysql_query("SELECT * FROM usuario WHERE id=$idu AND activo='NO'") or die(mysql_error());
			$qr2=mysql_query("SELECT * FROM usuario WHERE id=$idu AND perfil<>'ADMINISTRADOR'") or die(mysql_error());
			//echo mysql_num_rows($qr);
			
			if (mysql_num_rows($qr)>0){
				echo -2;
				exit;

			}


			else if(mysql_num_rows($qr2)>0){
				echo -3;
				$_SESSION['nombrecompleto']=$nom." ".$ape;
				$_SESSION['perfil']=$perf;

				exit;


			}
			else {
				$_SESSION['nombrecompleto']=$nom." ".$ape;
				echo 1;
			}
			

		}
		else {
			
			echo 2;
		}


	}

	
	

}






?>

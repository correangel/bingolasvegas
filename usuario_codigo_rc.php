<?php
session_start();
require("app/bd_codigo_conectar.php");

$log=$_POST['log'];



$consulta=mysql_query("SELECT * FROM usuario WHERE login =  '$log' AND activo='SI'");

$lista= array();

while($rw=mysql_fetch_array($consulta)){


	$prg=$rw["pregunta"];
	$rsp=$rw["respuesta"];

	$lista[] = array('pregunta'=> $prg, 'respuesta'=> $rsp);


}
echo json_encode($lista);



?>

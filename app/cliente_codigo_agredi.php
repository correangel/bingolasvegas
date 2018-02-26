<?php

session_start();
require("bd_codigo_conectar.php");
include "_codigo_metodos.php";/*
var_dump($_POST);
var_dump($_FILES);
exit;*/

$freg=$_POST['freg'];
$idcli=$_POST['idcli'];
$tp=$_POST['tdoc'];
$cedrif=$_POST['ndoc'];
$nomrs=strtoupper($_POST['nom']);
$fnac=$_POST['fnac'];
$pnac=strtoupper($_POST['paisnac']);
$lnac=strtoupper($_POST['lugarnac']);
$nac=strtoupper($_POST['nac']);
$dir=strtoupper($_POST['dir']);
$eciv=$_POST['edociv'];




$ncon=($eciv=="CASADO"?strtoupper($_POST['nomcony']):"");


$tlf=$_POST['tlf'];
$email=strtoupper($_POST['email']);
$aprof=strtoupper($_POST['actprof']);
$ctrab=strtoupper($_POST['ciutrab']);
$etrab=strtoupper($_POST['edotrab']);
$ptrab=strtoupper($_POST['paistrab']);
$tlftrab=$_POST['tlftrab'];
$emailtrab=strtoupper($_POST['emailtrab']);
$imen=$_POST['ingmens'];
$perfil=$_POST['perfil'];

$pep="NO";
$acp="NO";
$aop="NO";
$jar="NO";
$otr="NO";


switch ($perfil) {
	case "pep":
        $pep="SI";
        break;
    case "acp":
        $acp="SI";
        break;
    case "aop":
        $aop="SI";
        break;
    case "jar":
        $jar="SI";
        break;
    case "otr":
    	$otr="SI";
    	break;
}



$otr_esp=($perfil=="otr"?strtoupper($_POST['otrperf']):"");



if ($idcli=="")
	$consulta=mysql_query("SELECT * FROM cliente WHERE tdoc='$tp' AND ndoc='$cedrif'") or die(mysql_error());
else 
	$consulta=mysql_query("SELECT * FROM cliente WHERE id<>$idcli AND tdoc='$tp' AND ndoc='$cedrif'") or die(mysql_error());


if (mysql_num_rows($consulta)>0){
	
	echo -1;
}
else{

	if ($idcli=="") {
	//	edocivil,conyuge,email,oficio,ciudad_oficio,estado_oficio,pais_oficio,tlf_empresa,email_empresa,ingreso_mensual,pep,acp,aop,jar,otro,otro_descr,nr_juegos,nr_operaciones,
		//'$eciv','$ncon','$email','$aprof','$ctrab','$etrab','$ptrab','$tlftrab','$emailtrab','$imen','$pep','$acp','$aop','$jar','$otr','$otr_esp',0,0,;

		$nrcli=$_POST['nr'];

		$query=mysql_query("INSERT INTO cliente (nr,tdoc,ndoc,fecha_reg,fecha_nac,pais_nac,lugar_nac,nacionalidad,nombre,direccion,telefono,edocivil,conyuge,email,oficio,ciudad_oficio,estado_oficio,pais_oficio,tlf_empresa,email_empresa,ingreso_mensual,pep,acp,aop,jar,otro,otro_descr,nr_juegos,nr_operaciones,saldo) VALUES ($nrcli,'$tp','$cedrif','$freg','$fnac','$pnac','$lnac','$nac','$nomrs','$dir','$tlf','$eciv','$ncon','$email','$aprof','$ctrab','$etrab','$ptrab','$tlftrab','$emailtrab','$imen','$pep','$acp','$aop','$jar','$otr','$otr_esp',0,0,'0')") or die(mysql_error());
		$idcli = id_max_tabla("cliente");
		
	}
	else {

		//tdoc='$tp',ndoc='$cedrif',fecha_nac='$fnac',pais_nac='$pnac',lugar_nac='$lnac',nacionalidad='$nac',nombre='$nomrs',direccion='$dir',telefono='$tlf',edocivil='$eciv',conyuge='$ncon',email='$email',oficio='$aprof',ciudad_oficio='$ctrab',estado_oficio='$etrab',pais_oficio='$ptrab',tlf_empresa='$tlftrab',email_empresa='$emailtrab',ingreso_mensual='$imen',pep='$pep',acp='$acp',aop='$aop',jar='$jar',otro='$otr',otro_descr='$otr_esp'
		$consulta=mysql_query("UPDATE cliente SET  tdoc='$tp',ndoc='$cedrif',fecha_reg='$freg',fecha_nac='$fnac',pais_nac='$pnac',lugar_nac='$lnac',nacionalidad='$nac',nombre='$nomrs',direccion='$dir',telefono='$tlf',edocivil='$eciv',conyuge='$ncon',email='$email',oficio='$aprof',ciudad_oficio='$ctrab',estado_oficio='$etrab',pais_oficio='$ptrab',tlf_empresa='$tlftrab',email_empresa='$emailtrab',ingreso_mensual='$imen',pep='$pep',acp='$acp',aop='$aop',jar='$jar',otro='$otr',otro_descr='$otr_esp' WHERE id=$idcli") or die(mysql_error());
		
	}

	$exitoso = true;
	foreach ($_FILES as $key) //Iteramos el arreglo de archivos
	{
	    if($key['error'] == UPLOAD_ERR_OK )//Si el archivo se paso correctamente continuamos 
	            $imagen=addslashes(file_get_contents($key['tmp_name']));
	 
	    if ($key['error']=='') //Si no existio ningun error...
	            $consulta2=mysql_query("UPDATE cliente SET imagen_doc='$imagen' WHERE id=$idcli") or die(mysql_error());

	           
	    
	    if ($key['error']!='')//Si existio algún error retornamos un el error por cada archivo.
	        	$exitoso = false; 
	    
	}

	if (!$exitoso)
	    echo -3;
	else
	    echo 1;



}



 





?>
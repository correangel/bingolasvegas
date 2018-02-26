<?
require("bd_codigo_conectar.php");
date_default_timezone_set("America/Caracas");
$qr = mysql_query("SELECT * FROM parametros") or die(mysql_error());
$rw=mysql_fetch_array($qr);
$lista= array();
$lista[] = array( '_fini'=> $rw["param_1"],'_ffin'=> $rw["param_2"],'fini'=> date("d-m-Y", strtotime($rw["param_1"])),'ffin'=> date("d-m-Y", strtotime($rw["param_2"])));
echo json_encode($lista);

?>
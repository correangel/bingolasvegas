<?php
session_start();
require("bd_codigo_conectar.php");
if ($_SESSION['perfil']!=""){

date_default_timezone_set("America/Caracas");
$hoy = date("Y-m-d");

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SISTEMA BINGO LAS VEGAS</title>
  <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="include/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css" type="text/css" />

    <script src="js/jquery-3.1.1.min.js"></script>





    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert.min.js"></script>

    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.min.js">
    </script>
    
    <script type="text/javascript" language="javascript" src="js/index.js"></script>

    <script type="text/javascript" src="js/jquery.numeric.js"></script>

    <script type="text/javascript" src="js/bootstrap-filestyle.js"></script>
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>


</head>

<body style="padding-top: 0px; background-color:#dfaf1f;">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<img width="100%" height="110px" src="img/banner.jpg"/>
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" id="inicio" href="#">Inicio</a>
    </div>
    <ul class="nav navbar-nav nav-pills">
      <li><a id="ut" href="#"><b>U.T.</b></a></li>
      <li><a id="maq" href="#"><b>Máquinas</b></a></li>
      <li><a id="cli" href="#"><b>Clientes</b></a></li>

      <? 
      $_qr=mysql_query("SELECT * FROM caja_jornada WHERE estatus='CERRADA' and fecha='$hoy'");
      if (mysql_num_rows($_qr)==0){

      ?>
      <li class="dropdown">
          <a href="#" data-toggle="dropdown" class="dropdown-toggle"><b>Caja</b><b class="caret"></b></a>
          <ul class="dropdown-menu">

          <?

            $qr=mysql_query("SELECT * FROM caja_jornada WHERE estatus='ABIERTA'");
            if (mysql_num_rows($qr)==0){
          ?>
              <li><a id="abr_caja" href="#">Apertura</a></li>
          <?}else{ ?>
              <li><a id="cie_caja" href="#">Cierre</a></li>
          <?} ?>
          </ul> 
      </li>
      <?
        if (mysql_num_rows($qr)>0){
      ?>
      <li><a id="sala" href="#"><b>Sala</b></a></li>
      <? } }?>

      <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><b>Reportes</b><b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a id="l_cc" href="#">Cierre de Caja</a></li>
            <li class="divider"></li>
            <li><a id="rep_cli_frec" href="#">Clientes mas Frecuentes</a></li>
            <li class="divider"></li>
            <li><a id="rep_ing_fech" href="#">Ingresos por Fechas</a></li>
        </ul>
    </li>

      <? if ($_SESSION['perfil']=="ADMINISTRADOR") {?>

      <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><b>Base de Datos</b><b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a id="rsp" href="#">Respaldo</a></li>
            <li class="divider"></li>
            <li><a id="rst" href="#">Restauración</a></li>
        </ul>
    </li>

    <li><a id="usuario_listado" href="#"><b>Usuarios</b></a></li>
    <? } else { ?>

    <li><a id="ep" data-idu="<? echo $_SESSION['idu']; ?>" href="#"><b>Editar Perfil</b></a></li>
    <? } ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li ><a id="nomusu"><span class="glyphicon glyphicon-user"></span> <? echo $_SESSION['nombrecompleto']; ?></a></li>
      <li><a id="logout" href="#"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesión</a></li>
    </ul>
  </div>
</nav>

<table align="center">

<tr><td>

<div class="modal-dialog" style="padding-top: 11em; width:100%;">

    <div id="capa">
    </div>

    <?

    $qr_ut=mysql_query("SELECT * FROM ut");
    $ut=mysql_fetch_array($qr_ut);


    ?>

    <!-- -----------------------------------------------------------Modal-------------------------------------------------------- -->
    <div data-nmod="1" class="modal fade" id="ModalUT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Actualización de Unidad Tributaria</h4>
          </div>
          <div class="modal-body">
            <div class="container">

                            <form role="form" class="form-horizontal" id="frmut">
                                <div class="form-group">
                                    <label for="nombre" class="col-sm-2 control-label">*Valor</label>
                                      <div class="col-sm-2">
                                        <input type="text" class="form-control decimales" value="<? echo $ut['valor']; ?>" name="valor" id="valor" />
                                      </div>
                                </div>
                                <div class="form-group" align="left">
                                    <label><h5><b>CAMPOS OBLIGATORIOS (*)</b></h5></label>
                                </div>
                                          
                            </form>

                        </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="act-ut">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- -------------------------------------------------------------------------------------------------------------------------- -->

            
</div>



</td></tr>


 </table>

  



</body>
</html>

<? 


}else{
  

  print("<script>window.location.replace('../index.php');</script>");
}



?>
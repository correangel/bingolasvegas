<?
session_start();

$imagen=$_SESSION['perfil']=="ADMINISTRADOR"?"administrador.png":"operador.png";


 ?>

<div class="panel panel-primary" style="border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
  <div class="panel-heading" style="background:#1f1f1f; border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
    <h2 class="panel-title"><span align="right" class="glyphicon glyphicon-home"></span><b>&nbsp;&nbsp;INICIO</b></h2>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form">
                            <div class="form-group">
                             <div class="col-sm-1">
                                <img src="img/<? echo $imagen;?>" height="50" width="50" />
                              </div>
                                <div class="col-sm-3">
                                <p  ><b>NOMBRE:</b> <? echo $_SESSION['nombrecompleto']; ?></p>
                                  
                                <p ><b>PERFIL:</b> <? echo $_SESSION['perfil']; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                
                            </div>
                            <div class="form-group">
                                &nbsp;
                            </div>
                            <div class="form-group">
                                &nbsp;
                            </div>
                            <div class="form-group">
                                &nbsp;
                            </div>
                            <div class="form-group">
                                &nbsp;
                            </div>
                            <div class="form-group">
                                &nbsp;
                            </div>
                            <div class="form-group">
                                &nbsp;
                            </div>
                            <div class="form-group">
                                &nbsp;
                            </div>
                            <div class="form-group">
                                &nbsp;
                            </div>         
                        </form>

                    </div>
  </div>
  <div class="panel-heading" style="background:#1f1f1f; border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
    <h3 class="panel-title" ><b>SISTEMA AUTOMATIZADO EMPRESARIAL PARA LA GESTIÓN DE INGRESOS CAPITALES DEL BINGO LAS VEGAS,C.A.</b></h3>
  </div>
</div>



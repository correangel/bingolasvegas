<?php
session_start();
require("bd_codigo_conectar.php");
$idu=$_GET["id"];
$qr_usu=mysql_query("SELECT * FROM usuario WHERE id=$idu");
$usu= mysql_fetch_array($qr_usu);
?>

<script type='text/javascript' language='javascript' src='js/perfil.js'></script>

<div class="panel panel-primary" style="border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
  <div class="panel-heading" style="background:#1f1f1f; border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
    <h2 class="panel-title"><span align="right" class="glyphicon glyphicon-pencil"></span><b>&nbsp;&nbsp;EDITAR PERFIL</b></h2>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form" class="frper form-horizontal">
                             
                            <div class="form-group">
                                &nbsp;
                            </div>

                             
                            <div class="form-group">
                                

                                <label for="nombre" class="col-sm-1 control-label">*Nombre:</label>
                                <div class="col-sm-3">
                                <input type="text" maxlength="60" class="let form-control" name="nombre" id="nombre" value="<? echo $usu["nombre"]; ?>" placeholder="" />
                                    
                                </div>
        
                                <label for="apellido" class="col-sm-2 control-label">*Apellido:</label>
                                <div class="col-sm-3">
                                <input type="text" class="let form-control" maxlength="50" name="apellido" id="apellido" value="<? echo $usu["apellido"]; ?>" placeholder="" />
                                </div>
                                <label for="perfil" class="col-sm-1 control-label">*Perfil:</label>
                                <div class="col-sm-2">
                                    <select name="perfil" id="perfil" class="form-control">
                                        <option value="<? echo $usu["perfil"]; ?>"><? echo $usu["perfil"]; ?></option>

                                    </select>
                                 </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="col-sm-1 control-label">*Login:</label>
                                <div class="col-sm-2">
                                <input type="text" maxlength="60" class="form-control" name="login" id="login" value="<? echo $usu["login"]; ?>" placeholder="" />
                                    
                                </div>
                                <label class="col-sm-1 control-label">&nbsp;</label>
                            
                                <label for="ps" class="col-sm-2 control-label">*Pregunta Secreta:</label>
                                <div class="col-sm-3">
                                    <select name="ps" id="ps" class="form-control">
                                        <option value="<? echo $usu["pregunta"]; ?>"><? echo $usu["pregunta"]; ?></option>
                                        <option value="COMIDA FAVORITA">¿COMIDA FAVORITA?</option>
                                        <option value="PELICULA FAVORITA">¿PELÍCULA FAVORITA?</option>
                                        <option value="ARTISTA FAVORITO">¿ARTISTA FAVORITO?</option>
                                        <option value="CANCION FAVORITA">¿CANCIÓN FAVORITA?</option>
                                        <option value="COLOR FAVORITO">¿COLOR FAVORITO?</option>
                                        <option value="NOMBRE DE MASCOTA">¿NOMBRE DE MASCOTA?</option>
                                        <option value="2DO APELLIDO DEL PADRE">¿2DO APELLIDO DEL PADRE?</option>
                                        <option value="2DO APELLIDO DE LA MADRE">¿2DO APELLIDO DE LA MADRE?</option>
                                    </select>
                                 </div>
                                 


                                 <label for="rs" class="col-sm-1 control-label">*Respuesta:</label>
                                <div class="col-sm-2">
                                    <input type="password" value="<? echo $usu["respuesta"]; ?>" maxlength="30" class="form-control" name="rs" id="rs" placeholder="" />
                                 </div>
                                 
                            </div>
                            <div class="form-group">
                                <label for="pss" class="col-sm-1 control-label">Contraseña:</label>
                                <div class="col-sm-2">
                                    <input type="password" maxlength="50" class="form-control" name="pss" id="pss" placeholder="" />
                                 </div>
                                 <label class="col-sm-1 control-label">&nbsp;</label>

                                 


                                 <label for="pss2" class="col-sm-2 control-label">Repetir Contraseña:</label>
                                <div class="col-sm-2">
                                    <input type="password" maxlength="50" class="form-control" name="pss2" id="pss2" placeholder="" />
                                 </div>
                                 <label class="col-sm-1 control-label">&nbsp;</label>
                                 <label for="perfil" class="col-sm-1 control-label">*Activo:</label>
                                <div class="col-sm-1">
                                    <select name="act" id="act" class="form-control">
                                        <option value="<? echo $usu["activo"]; ?>"><? echo $usu["activo"]; ?></option>

                                    </select>
                                 </div>
                            </div>

                            <div class="form-group" align="left">
                                <label><h5><b>CAMPOS OBLIGATORIOS (*)</b></h5></label>
                            </div>


                            <div class="form-group">
                                &nbsp;
                            </div>

                            <div class="form-group" align="center">
                                <label><a id="guardar" class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>-<label><a id="usu_vlv_list" class="btn btn-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Volver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>
                            </div>
                            <div class="form-group">
                                &nbsp;
                            </div>
                            <input hidden name="idu" id="idu" value="<? echo $usu["id"]; ?>" />         
                        </form>

                    </div>
  </div>
  <div class="panel-heading" style="background:#1f1f1f; border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
    <h3 class="panel-title" ><b>SISTEMA AUTOMATIZADO EMPRESARIAL PARA LA GESTIÓN DE INGRESOS CAPITALES DEL BINGO LAS VEGAS,C.A.</b></h3>
  </div>
</div>


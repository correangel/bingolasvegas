<?
date_default_timezone_set("America/Caracas");
require("bd_codigo_conectar.php");
?>

<script>
  $('.example').DataTable({
                "oLanguage": {
                    "sLengthMenu": "Mostrar _MENU_ registros por pág.",
                    "sZeroRecords": "No hubo coincidencias",
                    "sInfo": "Mostrando _START_ hasta _END_ de _TOTAL_ páginas",
                    "sInfoEmpty": "0 Registros",
                    "sInfoFiltered": "(Filtrando de _MAX_ registros)"
                }
     });
</script>

<script type='text/javascript' language='javascript' src='js/cliente_maquina.js'></script>


<div class="panel panel-primary" style="border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
  <div class="panel-heading" style="background:#1f1f1f; border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
    <h2 class="panel-title"><span align="right" class="glyphicon glyphicon-plus-sign"></span><b>&nbsp;&nbsp;AGREGAR CLIENTE A LA SALA</b></h2>
  </div>
  <div class="panel-body">
    <div class="container">

                        <input hidden id="evt" value="NO"/>

                        <form role="form" class="frmcmaq form-horizontal">
                            <div class="form-group">
                                &nbsp;
                            </div>
                            <div class="form-group">

                                <label class="col-sm-8 control-label">&nbsp;</label>

                                
                                <label class="col-sm-2 control-label">Fecha:</label>
                                <div class="col-sm-2">
                                <input type="date" class="form-control" disabled="" name="fecha" id="fecha" value="<? echo date("Y-m-d");?>" placeholder="" />
                                </div>
                            </div>

                            <div class="form-group">
                                &nbsp;
                            </div>

                            <div class="form-group">
                                <label for="nombre" class="col-sm-1 control-label">Cliente:</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button id="bsc_cli" class="btn btn-primary glyphicon glyphicon-search" type="button"></button>
                                      </span>
                                      <input disabled type="text" id="txtcli" class="form-control" placeholder="Buscar..."><input hidden name="idcli" id="idcli" value=""/>
                                    </div>
                                </div>
                                <label for="nombre" class="col-sm-1 control-label">Máquina:</label>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button id="bsc_maq" class="btn btn-primary glyphicon glyphicon-search" type="button"></button>
                                      </span>
                                      <input disabled type="text" id="txtmaq" class="form-control" placeholder="Buscar..."><input hidden name="idmaq" id="idmaq" value="" />
                                    </div>
                                </div>

                                <label for="nombre" class="col-sm-2 control-label">Mto. Estim (Bs.):</label>
                                <div class="col-sm-2">
                                <input type="text" class="form-control decimales" name="mtoest" id="mtoest" placeholder="" />
                                    
                                </div>


                            </div>

                            <div class="form-group">
                                &nbsp;
                            </div>

                            <input hidden name="idcmaq" id="idcmaq" value="" />

                            <div class="form-group" align="center">
                                <label><a id="cmaq_agredi" class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>-<label><a id="cmaq_vlv_list" class="btn btn-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Volver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>
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

<?php
$qr_cli=mysql_query("SELECT cli.id,cli.nr,cli.tdoc,cli.ndoc,cli.nombre FROM cliente cli WHERE NOT EXISTS (SELECT * FROM cliente_maquina where id_cliente=cli.id) OR NOT EXISTS (SELECT * FROM cliente_maquina cm INNER JOIN caja_jornada cj ON cj.id=cm.id_caja_jornada WHERE cm.id_cliente=cli.id AND cj.estatus='ABIERTA')    ");
$qr_maq=mysql_query("SELECT mq.id,mq.codigo,mq.descripcion FROM maquina  mq WHERE NOT EXISTS (SELECT * FROM cliente_maquina where id_maquina=mq.id) OR NOT EXISTS (SELECT * FROM cliente_maquina cm INNER JOIN caja_jornada cj ON cj.id=cm.id_caja_jornada WHERE cm.id_maquina=mq.id AND cj.estatus='ABIERTA')");
?>

<!------------------------------------------------------- Modal Cliente  ---------------------------------------------------------------->
<div class="modal fade" id="modCli" tabindex="-1" width="750" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" align="left" style="width:800px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Buscar Cliente</h4>
      </div>
      <div class="modal-body">
        <div class="container">

                        <form role="form" class="form-horizontal" id="">
                            <div class="form-group" align="center" style="width:750px;">

                                <table class="example table table-striped table-bordered" align="right" cellspacing="0" width="100%" >
                                    <thead>
                                        <tr>
                                            <th width="70">Nr.</th>
                                            <th width="130">Doc. Identidad</th>
                                            <th width="530">Nombre</th>
                                            <th width="20">Elegir</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                        while($cli=mysql_fetch_array($qr_cli)){

                                      ?>
                                        <tr>
                                            <td><? echo $cli["nr"];?></td>
                                            <td><? echo $cli["tdoc"]."-".$cli["ndoc"];?></td>
                                            <td><? echo $cli["nombre"];?></td>
                                            <td align="center"><button title="Elegir" type="button" data-id="<? echo $cli["id"]; ?>" class="cmaq_buscli btn btn-default"><span class="glyphicon glyphicon-hand-up"></span></button></td>
                                        </tr>
                                        <?php 
                                      
                                        }

                                      ?>
                                        
                                    </tbody>
                                </table>
                                
                            </div>
                                      
                        </form>

                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!------------------------------------------------------- Modal Máquina  ---------------------------------------------------------------->
<div class="modal fade" id="modMaq" tabindex="-1" width="550" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" align="left" style="width:600px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Buscar Máquina</h4>
      </div>
      <div class="modal-body">
        <div class="container">

                        <form role="form" class="form-horizontal" id="">
                            <div class="form-group" align="center" style="width:550px;">

                                <table class="example table table-striped table-bordered" align="right" cellspacing="0" width="100%" >
                                    <thead>
                                        <tr>
                                            <th width="100">Código</th>
                                            <th width="430">Descripción</th>
                                            <th width="20">Elegir</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                        while($maq=mysql_fetch_array($qr_maq)){

                                      ?>
                                        <tr>
                                            <td><? echo $maq["codigo"];?></td>
                                            <td><? echo $maq["descripcion"];?></td>
                                            <td align="center"><button title="Elegir" type="button" data-id="<? echo $maq["id"]; ?>" class="cmaq_busmaq btn btn-default"><span class="glyphicon glyphicon-hand-up"></span></button></td>
                                        </tr>
                                        <?php 
                                      
                                        }

                                      ?>
                                        
                                    </tbody>
                                </table>
                                
                            </div>
                                      
                        </form>

                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<?php
require("bd_codigo_conectar.php");
$qr_maq=mysql_query("SELECT * FROM maquina");

?>
<script type="text/javascript">
       // $(document).ready(function () {
            $('#example').DataTable({
                "oLanguage": {
                    "sLengthMenu": "Mostrar _MENU_ registros por pág.",
                    "sZeroRecords": "No hubo coincidencias",
                    "sInfo": "Mostrando _START_ hasta _END_ de _TOTAL_ páginas",
                    "sInfoEmpty": "0 Registros",
                    "sInfoFiltered": "(Filtrando de _MAX_ registros)"
                }
            });

            


        //});
    </script>

<script type='text/javascript' language='javascript' src='js/maquina.js'></script>


<div class="panel panel-primary" style="border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
  <div class="panel-heading" style="background:#1f1f1f; border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
    <h3 class="panel-title"><span align="right" class="glyphicon glyphicon-list"></span><b>&nbsp;&nbsp;MÁQUINAS</b></h3>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form" class="form-horizontal">
                            <div class="form-group">
                                <table id="example" class="table table-striped table-bordered" align="right" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Descripción</th>
                                            <th>Ubicación</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Código</th>
                                            <th>Descripción</th>
                                            <th>Ubicación</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                      
                                        while($maq=mysql_fetch_array($qr_maq)){

                                      ?>
                                        <tr>
                                            <td><? echo $maq["codigo"];?></td>
                                            <td><? echo $maq["descripcion"];?></td>
                                            <td><? echo $maq["ubicacion"];?></td>
                                            <td><button title="Editar" type="button" data-id="<? echo $maq["id"]; ?>" data-cod="<? echo $maq["codigo"]; ?>" data-descr="<? echo $maq["descripcion"]; ?>" data-ubic="<? echo $maq["ubicacion"]; ?>" class="maq_edi btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                        </tr>
                                        <?php 
                                      
                                        }

                                      ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group" align="center">
                                <label><a id="maq_agr" class=" btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agregar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>
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

<!-- -----------------------------------------------------------Modal-------------------------------------------------------- -->
<div data-nmod="1" class="modal fade" id="ModalMaq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Formulario de Máquinas</h4>
      </div>
      <div class="modal-body">
        <div class="container">

                        <form role="form" class="form-horizontal" id="frmmaq">
                            <div class="form-group">
                                <label for="nombre" class="col-sm-2 control-label">*Código</label>
                                  <div class="col-sm-2">
                                    <input type="text" class="form-control" value="" name="cod" id="cod" />
                                  </div>
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="col-sm-2 control-label">*Descripción</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" value="" name="descr" id="descr" />
                                  </div>
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="col-sm-2 control-label">*Ubicación</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" value="" name="ubic" id="ubic" />
                                  </div>
                            </div>
                            <div class="form-group" align="left">
                                <label><h5><b>CAMPOS OBLIGATORIOS (*)</b></h5></label>
                            </div>

                            <input hidden name="id" id="id" value="" />
                                      
                        </form>

                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="agredi">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------- -->


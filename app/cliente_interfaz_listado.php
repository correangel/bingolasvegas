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

<script type='text/javascript' language='javascript' src='js/cliente.js'></script>
<?php
require("bd_codigo_conectar.php");
$qr_cli=mysql_query("SELECT id,nr,tdoc,ndoc,nombre,telefono,saldo FROM cliente");

?>

<div class="panel panel-primary" style="border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
  <div class="panel-heading" style="background:#1f1f1f; border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
    <h3 class="panel-title"><span align="right" class="glyphicon glyphicon-list"></span><b>&nbsp;&nbsp;CLIENTES</b></h3>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form" class="form-horizontal">
                            <div class="form-group">
                                <table id="example" class="table table-striped table-bordered" align="right" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            
                                            <th>Nr.</th>
                                            <th>Doc. Identidad</th>
                                            <th>Nombre</th>
                                            <th>Teléfono</th>
                                            <th align="center">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nr.</th>
                                            <th>Doc. Identidad</th>
                                            <th>Nombre</th>
                                            <th>Teléfono</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                      
                                        while($cli=mysql_fetch_array($qr_cli)){

                                      ?>
                                        <tr>
                                            <td><? echo $cli["nr"];?></td>
                                            <td><? echo $cli["tdoc"]."-".$cli["ndoc"];?></td>
                                            <td><? echo $cli["nombre"];?></td>
                                            <td><? echo $cli["telefono"];?></td>
                                            
                                            <td align="center"> <input hidden id="evt" value="NO" /> <button title="Planilla de Registro" type="button" data-id="<? echo $cli["id"]; ?>" class="cli_pdf_reg btn btn-default"><span class="glyphicon glyphicon-file"></span></button> - <button title="Editar" type="button" data-id="<? echo $cli["id"]; ?>" class="cli_edi btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                        </tr>
                                        <?php 
                                      
                                        }

                                      ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group" align="center">
                                <label><a id="cli_agr" class=" btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agregar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>
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


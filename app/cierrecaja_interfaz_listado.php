<script type="text/javascript">
            $('#example').DataTable({
                "oLanguage": {
                    "sLengthMenu": "Mostrar _MENU_ registros por pág.",
                    "sZeroRecords": "No hubo coincidencias",
                    "sInfo": "Mostrando _START_ hasta _END_ de _TOTAL_ páginas",
                    "sInfoEmpty": "0 Registros",
                    "sInfoFiltered": "(Filtrando de _MAX_ registros)"
                }
            }); 
    </script>

<script type='text/javascript' language='javascript' src='js/cierrecaja.js'></script>
<?php
date_default_timezone_set("America/Caracas");
require("bd_codigo_conectar.php");
$qr_cj=mysql_query("SELECT * FROM caja_jornada WHERE estatus='CERRADA'");

?>

<div class="panel panel-primary" style="border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
  <div class="panel-heading" style="background:#1f1f1f; border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
    <h3 class="panel-title"><span align="right" class="glyphicon glyphicon-list"></span><b>&nbsp;&nbsp;CIERRES DE CAJA</b></h3>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form" class="form-horizontal">
                            <div class="form-group">
                                <table id="example" class="table table-striped table-bordered" align="right" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            
                                            <th>Fecha</th>
                                            <th>Saldo Anterior (Bs.)</th>
                                            <th>Ingresos (Bs.)</th>
                                            <th>Egresos (Bs.)</th>
                                            <th>Saldo Actual (Bs.)</th>
                                            <th>Reporte</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Saldo Anterior (Bs.)</th>
                                            <th>Ingresos (Bs.)</th>
                                            <th>Egresos (Bs.)</th>
                                            <th>Saldo Actual (Bs.)</th>
                                            <th>Reporte</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                      
                                        while($cj=mysql_fetch_array($qr_cj)){

                                            $saldo_actual = $cj["saldo_anterior"] + $cj["monto_ingreso"] - $cj["monto_egreso"];

                                      ?>
                                        <tr>
                                            <td><? echo date("d-m-Y", strtotime($cj['fecha']));?></td>
                                            <td><? echo number_format($cj["saldo_anterior"], 2, ',', '.');?></td>
                                            <td><? echo number_format($cj["monto_ingreso"], 2, ',', '.');?></td>
                                            <td><? echo number_format($cj["monto_egreso"], 2, ',', '.');?></td>
                                            <td><? echo number_format($saldo_actual, 2, ',', '.');?></td>
                                            
                                            <td align="center"> <button title="Planilla Cierre" type="button" data-idcj="<? echo $cj["id"]; ?>"   class="cj_rep_cierre btn btn-default"><span class="glyphicon glyphicon-file"></span></button>

                                                <?
                                                if ($cj["nr_premios"]>0){

                                                ?>
                                                - <button title="Listado de Premios" type="button" data-idcj="<? echo $cj["id"]; ?>"   class="cj_list_prem btn btn-default"><span class="glyphicon glyphicon-gift"></span></button>

                                                <?
                                                }
                                                ?>

                                            </td>
                                        </tr>
                                        <?php 
                                      
                                        }

                                      ?>
                                        
                                    </tbody>
                                </table>
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


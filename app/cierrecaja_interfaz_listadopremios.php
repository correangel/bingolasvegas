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
require_once("_codigo_metodos.php");
$idcj=$_GET["id"];

$qr_pr=mysql_query("SELECT cli.id as idcli,cm.id,cm.fecha,cli.tdoc,cli.ndoc,cli.nombre,mq.codigo,pre.descripcion,pre.monto FROM cliente_maquina cm INNER JOIN cliente cli ON cm.id_cliente=cli.id INNER JOIN premio pre ON cm.id_premio=pre.id INNER JOIN maquina mq ON cm.id_maquina=mq.id WHERE cm.id_caja_jornada=$idcj");

?>

<div class="panel panel-primary" style="border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
  <div class="panel-heading" style="background:#1f1f1f; border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
    <h3 class="panel-title"><span align="right" class="glyphicon glyphicon-list"></span><b>&nbsp;&nbsp;LISTADO DE PREMIOS</b></h3>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form" class="form-horizontal">
                            <div class="form-group">
                                <table id="example" class="table table-striped table-bordered" align="right" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            
                                            <th>Fecha</th>
                                            <th>Cliente</th>
                                            <th>Máquina</th>
                                            <th>Premio</th>
                                            <th>Monto (Bs.)</th>
                                            <th>Reporte</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Cliente</th>
                                            <th>Máquina</th>
                                            <th>Premio</th>
                                            <th>Monto (Bs.)</th>
                                            <th>Reporte</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                      
                                        while($pr=mysql_fetch_array($qr_pr)){

                                      ?>
                                        <tr>
                                            <td><? echo date("d-m-Y", strtotime($pr['fecha']));?></td>
                                            <td><? echo $pr["tdoc"]."-".$pr["ndoc"]."; ".$pr["nombre"];?></td>
                                            <td><? echo $pr["codigo"];?></td>
                                            <td><? echo $pr["descripcion"];?></td>
                                            <td><? echo number_format($pr["monto"], 2, ',', '.');?></td>
                                            
                                            <td align="center"> <button title="Planilla Premio" type="button" data-idcmq="<? echo $pr["id"]; ?>"   class="cj_rep_prem btn btn-default"><span class="glyphicon glyphicon-file"></span></button>

                                            <? 

                                            $mt_pr = $pr["monto"];
                                            if ($mt_pr>=300*ut()) {?>


                                            - <button title="Planilla de Declaración del Dinero" type="button" data-id="<? echo $pr["idcli"]; ?>" class="cli_pdf_dec_din btn btn-danger"><span class="glyphicon glyphicon-file"></span></button>

                                            <? }?>


                                            </td>
                                        </tr>
                                        <?php 
                                      
                                        }

                                      ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group" align="center">
                                <label><a id="cj_vlv" class=" btn btn-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Volver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>
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


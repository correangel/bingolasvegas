<?php
require("bd_codigo_conectar.php");
require_once("_codigo_metodos.php");
date_default_timezone_set("America/Caracas");
$qr_caj=mysql_query("SELECT * FROM caja_jornada WHERE estatus='ABIERTA'");
$_cj=mysql_fetch_array($qr_caj);
$idcj=$_cj["id"];
 
$qr_climaq=mysql_query("SELECT cli.id as idcli,cm.id,cm.id_premio,cm.fecha,cli.tdoc,cli.ndoc,cli.nombre as nomcli,maq.codigo as codmaq,cm.monto_estimado FROM cliente_maquina cm INNER JOIN cliente cli ON cm.id_cliente=cli.id INNER JOIN maquina maq ON cm.id_maquina=maq.id WHERE cm.id_caja_jornada=$idcj");

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

<script type='text/javascript' language='javascript' src='js/cliente_maquina.js'>
</script>


<div class="panel panel-primary" style="border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
  <div class="panel-heading" style="background:#1f1f1f; border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
    <h3 class="panel-title"><span align="right" class="glyphicon glyphicon-list"></span><b>&nbsp;&nbsp;CLIENTES EN SALA</b></h3>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form" class="form-horizontal">
                            <div class="form-group">
                                <table class="example table table-striped table-bordered" align="right" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Cliente</th>
                                            <th>Cód. Máq.</th>
                                            <th>Monto Estimado (Bs.)</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Cliente</th>
                                            <th>Cód. Máq.</th>
                                            <th>Monto Estimado (Bs.)</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                      
                                        while($cmaq=mysql_fetch_array($qr_climaq)){

                                          $idp=$cmaq["id_premio"];
                                          $qr_pr=mysql_query("SELECT * FROM premio WHERE id=$idp");

                                          $dsc_pr="";
                                          $mt_pr=0;
                                          while ($pr=mysql_fetch_array($qr_pr)){

                                            $dsc_pr=$pr["descripcion"];
                                            $mt_pr=$pr["monto"];

                                          }


                                      ?>
                                        <tr>
                                            <td><? echo date("d-m-Y", strtotime($cmaq['fecha']));?></td>
                                            <td><? echo $cmaq["tdoc"]."-".$cmaq["ndoc"]."; ".$cmaq["nomcli"];?></td>
                                            <td><? echo $cmaq["codmaq"];?></td>
                                            <td><? echo number_format($cmaq["monto_estimado"], 2, ',', '.');?></td>
                                            <td><button title="Editar" type="button" data-id="<? echo $cmaq["id"]; ?>" class="cmaq_edi btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>
                                            <? if($cmaq["id_premio"]==-1){ ?>

                                            - <button title="Premiar" type="button" data-id="<? echo $cmaq["id"]; ?>" data-codmaq="<? echo $cmaq["codmaq"]; ?>" class="cmaq_premiar btn btn-success"><span class="glyphicon glyphicon-gift"></span></button>
                                            
                                            <? } else {?>

                                            - <button title="Planilla Premio" type="button" data-idcmq="<? echo $cmaq["id"]; ?>"   class="cmaq_rep_prem btn btn-default"><span class="glyphicon glyphicon-file"></span></button>

                                            <? if ($mt_pr>=300*ut()) {?>


                                            - <button title="Planilla de Declaración del Dinero" type="button" data-id="<? echo $cmaq["idcli"]; ?>" class="cli_pdf_dec_din btn btn-danger"><span class="glyphicon glyphicon-file"></span></button>

                                            <? }?>



                                            - <button title="Editar Premio" type="button" data-idpremio="<? echo $cmaq["id_premio"]; ?>" data-codmaq="<? echo $cmaq["codmaq"]; ?>" data-descr="<? echo $dsc_pr; ?>" data-mto="<? echo $mt_pr; ?>" class="cmaq_ediprem btn btn-warning"><span class="glyphicon glyphicon-gift"></span></button>
                                            - <button title="Eliminar Premio" type="button" data-id="<? echo $cmaq["id"]; ?>" data-descr="<? echo $dsc_pr; ?>" data-nomcli="<? echo $cmaq["nomcli"]; ?>" data-idpremio="<? echo $cmaq["id_premio"]; ?>" class="cmaq_eliprem btn btn-danger"><span class="glyphicon glyphicon-gift"></span></button>

                                            <? } ?>
                                            </td>
                                        </tr>
                                        <?php 
                                      
                                        }

                                      ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group" align="center">
                                <label><a id="cmaq_agr" class=" btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agregar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>
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
<div data-nmod="1" class="modal fade" id="ModalPrem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Formulario de Premio</h4>
      </div>
      <div class="modal-body">
        <div class="container">

                        <form role="form" class="form-horizontal" id="frmpre">

                          <div class="form-group">
                                <label for="nombre" class="col-sm-2 control-label">Cód. Maquina:</label>
                                  <div class="col-sm-3">
                                    <input disabled="" type="text" class="form-control" value="" name="txtcodmaq" id="txtcodmaq" />
                                  </div>
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="col-sm-2 control-label">Descripción</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" value="" name="descr" id="descr" />
                                  </div>
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="col-sm-2 control-label">Monto (Bs.)</label>
                                  <div class="col-sm-3">
                                    <input type="text" class="decimales form-control" value="" name="monto" id="monto" />
                                  </div>
                            </div>

                            <input hidden name="idp" id="idp" value="" />
                            <input hidden name="idcmq" id="idcmq" value="" />
                                      
                        </form>

                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="pre_agredi">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------- -->


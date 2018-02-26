<? 
date_default_timezone_set("America/Caracas");
?>

<script type='text/javascript' language='javascript' src='js/reportes.js'></script>

<div class="panel panel-primary" style="border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
  <div class="panel-heading" style="background:#1f1f1f; border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
    <h2 class="panel-title"><span align="right" class="glyphicon glyphicon-file"></span><b>&nbsp;&nbsp;REPORTE DE INGRESOS POR FECHAS</b></h2>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form" class="form-horizontal">.

                            <div class="form-group">
                                &nbsp;
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">*Fecha Inicio:</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" max="<? echo date("Y-m-d");?>" name="fini" id="fini" placeholder="" />
                                </div>
                                <label class="col-sm-2 control-label">*Fecha Fin:</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" max="<? echo date("Y-m-d");?>" name="ffin" id="ffin" placeholder="" />
                                </div>
                                <label class="col-sm-2 control-label">*Tipo de Reporte:</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="trep">
                                        <option value="1">General</option>
                                        <option value="2">Detallado</option>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group" align="left">
                                <label><h5><b>CAMPOS OBLIGATORIOS (*)</b></h5></label>
                            </div>
                            
                            <div class="form-group" align="center">
                                <label><a id="consultar" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Consultar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>
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



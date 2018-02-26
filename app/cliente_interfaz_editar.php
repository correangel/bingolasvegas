<? 
session_start();
require("bd_codigo_conectar.php");
date_default_timezone_set("America/Caracas");

$idcli=$_GET["id"];
$qr_cli=mysql_query("SELECT * FROM cliente WHERE id=$idcli");
$cli= mysql_fetch_array($qr_cli);


?>


<script type='text/javascript' language='javascript' src='js/cliente.js'></script>


<div class="panel panel-primary" style="border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
  <div class="panel-heading" style="background:#1f1f1f; border-color: #1f1f1f; border-bottom-color: #1f1f1f;">
    <h2 class="panel-title"><span align="right" class="glyphicon glyphicon-pencil"></span><b>&nbsp;&nbsp;EDITAR CLIENTE</b></h2>
  </div>
  <div class="panel-body">
    <div class="container">

                        <form role="form" class="frmcli form-horizontal" enctype="multipart/form-data">

                            <input hidden id="evt" value="NO" />
                        		

                            <div class="form-group">

                                <label class="col-sm-6 control-label">&nbsp;</label>

                                
                                <label class="col-sm-2 control-label">*Fecha Registro:</label>
                                <div class="col-sm-2">
                                <input type="date" class="form-control frmdt" max="<? echo date("Y-m-d");?>" name="freg" id="freg" value="<? echo $cli['fecha_reg']; ?>" placeholder="" />
                                </div>

                                
                                <label class="col-sm-1 control-label">N°:</label>
                                <div class="col-sm-1">
                                <input type="text" readonly class="form-control frmdt" name="nr" id="nr" placeholder="" value="<? echo $cli['nr']; ?>" />

                                </div>
                            </div>


                            <!-- ------------------------------DATOS PERSONALES------------------------------------- -->
                            
                            <div class="form-group" align="center">
                                <label><h4><b>1)DATOS PERSONALES:</b></h4></label>
                            </div>


                            <div class="form-group">

                                <label for="nomrs" class="col-sm-2 control-label">*Nombre Completo:</label>
                                <div class="col-sm-4">
                                <input type="text" maxlength="150" class="form-control let frmdt" value="<? echo $cli['nombre']; ?>" name="nom" id="nom" placeholder="" />
                                    
                                </div>

                            	<label for="tdoc" class="col-sm-2 control-label">*Tipo Persona:</label>
                                
                                <div class="col-sm-1">
                                <select name="tdoc" id="tdoc" class="form-control frmdt">
                                    <option value="<? echo $cli['tdoc']; ?>"><? echo $cli['tdoc']; ?></option>
					                <option value="V">V</option>
					                <option value="E">E</option>
					                <option value="P">P</option>
					            </select>
                                </div>

                                <label for="ndoc" class="col-sm-1 control-label">*Céd/Pas:</label>
                                <div class="col-sm-2">
                                <input type="text" maxlength="20" class="form-control frmdt" name="ndoc" id="ndoc" value="<? echo $cli['ndoc']; ?>" placeholder="" />
                                    
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">*Fecha Nac.:</label>
                                <div class="col-sm-2">
                                <input type="date" class="form-control frmdt" name="fnac" id="fnac" max="<? echo date("Y-m-d");?>" value="<? echo $cli['fecha_nac']; ?>" placeholder="" />
                                </div>

                                <label class="col-sm-2 control-label">*País Nac.:</label>
                                <div class="col-sm-2">
                                <input type="text" maxlength="40" class="form-control let frmdt" name="paisnac" id="paisnac" placeholder="" value="<? echo $cli['pais_nac']; ?>" />
                                </div>

                                <label class="col-sm-2 control-label">*Lugar Nac.:</label>
                                <div class="col-sm-2">
                                <input type="text" maxlength="50" class="form-control let frmdt" name="lugarnac" id="lugarnac" placeholder="" value="<? echo $cli['lugar_nac']; ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">*Nacionalidad:</label>
                                <div class="col-sm-2">
                                <input type="text" maxlength="50" class="form-control let frmdt" name="nac" id="nac" placeholder="" value="<? echo $cli['nacionalidad']; ?>" />
                                </div>
                                <label class="col-sm-2 control-label">*Dirección:</label>
                                <div class="col-sm-3">
                                    <textarea name="dir" maxlength="200" id="dir" class="form-control frmdt"><? echo $cli['direccion']; ?></textarea>
                                </div>
                                <label class="col-sm-1 control-label">*Ed. Civ.:</label>
                                <div class="col-sm-2">
                                    <select name="edociv" id="edociv" class="form-control frmdt">
                                    <option value="<? echo $cli['edocivil']; ?>"><? echo $cli['edocivil']; ?></option>
                                    <option value="SOLTERO(A)">SOLTERO(A)</option>
                                    <option value="CASADO(A)">CASADO(A)</option>
                                    <option value="DIVORCIADO(A)">DIVORCIADO(A)</option>
                                    <option value="VIUDO(A)">VIUDO(A)</option>
                                </select>
                                </div>
                            </div>
                            <?
                            $readonly=($cli['edocivil']!="CASADO(A)"?"readonly":"");
                            ?>

                            <div class="form-group">

                                <label class="col-sm-2 control-label">Nombre Cónyuge:</label>
                                <div class="col-sm-4">
                                <input type="text" <? echo $readonly; ?> maxlength="150" class="form-control let frmdt" name="nomcony" id="nomcony" placeholder="" value="<? echo $cli['conyuge']; ?>" />
                                </div>
                                
                                <label for="tlf" class="col-sm-1 control-label">Teléfono:</label>
                                <div class="col-sm-2">
                                <input type="text" maxlength="30" class="form-control frmdt" value="<? echo $cli['telefono']; ?>" name="tlf" id="tlf" placeholder="" />
                                </div>

                                <label class="col-sm-1 control-label">E-mail:</label>
                                <div class="col-sm-2">
                                    <input type="text" maxlength="60" class="form-control frmdt" name="email" id="email" placeholder="" value="<? echo $cli['email']; ?>" />
                                </div>
                            </div>



                            <!-- ------------------------------ DATOS LABORALES ------------------------------------- -->

                            <div class="form-group" align="center">
                                <label><h4><b>2)DATOS LABORALES:</b></h4></label>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">*Actividad/Profesión:</label>
                                <div class="col-sm-2">
                                    <input type="text" maxlength="60" class="form-control frmdt" name="actprof" id="actprof" placeholder="" value="<? echo $cli['oficio']; ?>" />
                                </div>
                                <label class="col-sm-1 control-label">*Ciudad:</label>
                                <div class="col-sm-3">
                                    <input type="text" maxlength="100" class="form-control frmdt" name="ciutrab" id="ciutrab" placeholder="" value="<? echo $cli['ciudad_oficio']; ?>" />
                                </div>
                                <label class="col-sm-1 control-label">*Estado:</label>
                                <div class="col-sm-3">
                                    <input type="text" maxlength="100" class="form-control frmdt" name="edotrab" id="edotrab" placeholder="" value="<? echo $cli['estado_oficio']; ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">*País:</label>
                                <div class="col-sm-3">
                                    <input type="text" maxlength="30" class="form-control frmdt" name="paistrab" id="paistrab" placeholder="" value="<? echo $cli['pais_oficio']; ?>" />
                                </div>
                                <label class="col-sm-1 control-label">Teléfono:</label>
                                <div class="col-sm-2">
                                    <input type="text" maxlength="30" class="form-control frmdt" name="tlftrab" id="tlftrab" placeholder="" value="<? echo $cli['tlf_empresa']; ?>" />
                                </div>
                                <label class="col-sm-1 control-label">E-mail:</label>
                                <div class="col-sm-2">
                                    <input type="text" maxlength="60" class="form-control frmdt" name="emailtrab" id="emailtrab" placeholder="" value="<? echo $cli['email_empresa']; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">*Ingreso Mensual (Bs.):</label>
                                <div class="col-sm-2">
                                    <input type="text" maxlength="60" class="form-control decimales frmdt" name="ingmens" id="ingmens" placeholder="" value="<? echo $cli['ingreso_mensual']; ?>" />
                                </div>
                            </div>


                            <!-- ------------------------------ PERFIL DEL CLIENTE -------------------------------------->

                            <div class="form-group" align="center">
                                <label><h4><b>3)PERFIL DEL CLIENTE:</b></h4></label>
                            </div>

                            <?

                            if ($cli['pep']=="SI"){
                                $valperf="pep";
                                $labelperf="PERSONA EXPUESTA POLÍTICAMENTE";
                            }
                            else if ($cli['acp']=="SI"){
                                $valperf="app";
                                $labelperf="ACTÚA POR CUENTA PROPIA";
                            }
                            else if ($cli['aop']=="SI"){
                                $valperf="aop";
                                $labelperf="ACTÚA A NOMBRE DE OTRA PERSONA";
                            }
                            else if ($cli['jar']=="SI"){
                                $valperf="jar";
                                $labelperf="JUEGA COMO ACTIVIDAD RECREATIVA";
                            }
                            else if ($cli['otro']=="SI"){
                                $valperf="otr";
                                $labelperf="OTRO";
                            }

                             $readonly=($cli['otro']!="SI"?"readonly":"");

                            ?>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">*Perfil:</label>
                                <div class="col-sm-4">
                                    <select name="perfil" id="perfil" class="form-control frmdt">
                                    <option value="<? echo $valperf; ?>"><? echo $labelperf; ?></option>
                                    <option value="pep">PERSONA EXPUESTA POLÍTICAMENTE</option>
                                    <option value="acp">ACTÚA POR CUENTA PROPIA</option>
                                    <option value="aop">ACTÚA A NOMBRE DE OTRA PERSONA</option>
                                    <option value="jar">JUEGA COMO ACTIVIDAD RECREATIVA</option>
                                    <option value="otr">OTRO</option>
                                </select>
                                </div>

                                <label class="col-sm-2 control-label">Especifique:</label>
                                <div class="col-sm-4">
                                    <input type="text" <? echo $readonly; ?> maxlength="100" class="form-control let frmdt" name="otrperf" id="otrperf" placeholder="" value="<? echo $cli['otro_descr']; ?>" />
                                </div>
                            </div>


                            <!-- ------------------------------ IMAGEN DE CÉDULA O PASAPAPORTE -------------------------------------->

                            <div class="form-group" align="center">
                                <label><h4><b>4)IMAGEN DE CÉDULA O PASAPORTE:</b></h4></label>
                            </div>                            
                            <div class="form-group">                          
                                <div class="col-sm-6" align="left">
                                        <input id="file" type="file" name="file[]" multiple="multiple"  class="filestyle" data-buttonName="btn-primary" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12" align="center">
                                    <div id="vista-previa" >                                       
                                       <img src="data:image/jpg;base64,<? echo base64_encode($cli['imagen_doc']); ?>" width="300" height="300"  /> 

                                    </div>
                                </div>
                            </div>

                            <!-- ------------------------------ -------------------- -------------------------------------->

                            <div class="form-group" align="left">
                                <label><h5><b>CAMPOS OBLIGATORIOS (*)</b></h5></label>
                            </div>


                            <div class="form-group">
                                &nbsp;
                            </div>

                            <input hidden name="idcli" id="idcli" class="frmdt" value="<?echo $idcli; ?>" />

                            <div class="form-group" align="center">
                                <label><a id="cli_agredi" class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>-<label><a id="cli_vlv_list" class="btn btn-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Volver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></label>
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


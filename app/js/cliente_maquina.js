jQuery(document).ready(function(){


	jQuery("#cmaq_agr").click(function() {
    	$("#capa").load('sala_interfaz_agregarcliente.php');
    });

    $(document).on('click','.cmaq_edi',function (e){
    	$("#capa").load('sala_interfaz_editarcliente.php?id='+$(this).data("id"));
	});

  $(document).on('click','.cli_pdf_dec_din',function (e){
            
         window.open('cliente_reporte_declaracion.php?id='+$(this).data("id"),"Planilla de Declaración","width=900,height=500,scrollbars=NO")
              
    });

    function cargar_form_premio (idp,idcq,codmaq,descr,mto){
                $("#idp").val(idp);
                $("#idcmq").val(idcq);
                $("#txtcodmaq").val(codmaq);
                $("#descr").val(descr);
                $("#monto").val(mto);
    }

    $(document).on('click','.cmaq_premiar',function (e){

                cargar_form_premio("",$(this).data("id"),$(this).data("codmaq"),"","");
                $("#ModalPrem").modal('show');

    });

    $(document).on('click','.cmaq_rep_prem',function (e){
              window.open('sala_reporte_premio.php?idcmq='+$(this).data("idcmq"),"Planilla de Premio","width=900,height=500,scrollbars=NO");
                    
    });

    $(document).on('click','.cmaq_ediprem',function (e){

                cargar_form_premio($(this).data("idpremio"),"",$(this).data("codmaq"),$(this).data("descr"),$(this).data("mto"));
                $("#ModalPrem").modal('show');

    });

    $(document).on('click','.cmaq_eliprem',function (e){

            var msj = "Está seguro que desea eliminar el premio de '"+$(this).data("descr")+"' a nombre de '"+$(this).data("nomcli")+"'?";
            var idp = $(this).data("idpremio");
               swal({
                  title: "Eliminación de Premio",
                  text: msj,
                  type: "info",
                  showCancelButton: true,
                  confirmButtonColor: '#BBD7ED',
                  confirmButtonText: 'Aceptar',
                  cancelButtonText: "Cancelar",
                  closeOnConfirm: false,
                  closeOnCancel: true
               },
               function(isConfirm){

                 if (isConfirm){

                        $.ajax({
                        url:'premio_codigo_eliminar.php', //Url a donde la enviaremos
                        type:'POST', //Metodo que usaremos
                        data: {id:idp},
                        cache:false //Para que el formulario no guarde cache
                      }).done(function(res){//Escuchamos la respuesta y capturamos el mensaje msg
                      if (res==1) {
                                  
                                    
                          swal({   
                            title: "Finalizado",   
                            text: "Premio eliminado satisfactoriamente",   
                            type: "success",   
                            showCancelButton: false,   
                            confirmButtonColor: "#BBD7ED",   
                            confirmButtonText: "Aceptar",   
                            closeOnConfirm: true 
                          }, 

                          function(){
                            
                              $("#capa").load('sala_interfaz_listadohoy.php');
                          });
                                    
                      }else {
                              
                          swal("¡Error!", "Hubo un error en la base de datos", "error");
                      }
                      });


                  }
               });

              

            });

    jQuery("#cmaq_vlv_list").click(function() {

         $("#capa").load('sala_interfaz_listadohoy.php');
    });

    jQuery("#bsc_cli").click(function() {   
		        $("#modCli").modal('show');
	});

	jQuery("#bsc_maq").click(function() {   
		        $("#modMaq").modal('show');
	});

    $(document).on('click','.cmaq_buscli',function (e){

    	if ($("#evt").val()=="NO"){
    	   $("#idcli").attr("value",$(this).data("id"));
		   buscar_cliente($(this).data("id"));
		   $("#evt").val("SI");
    	}
    	else
    		$("#evt").val("NO");

	});

	$(document).on('click','.cmaq_busmaq',function (e){

    	if ($("#evt").val()=="NO"){
    		$("#idmaq").attr("value",$(this).data("id"));
		   buscar_maquina($(this).data("id"));
		   $("#evt").val("SI");
    	}
    	else
    		$("#evt").val("NO");

	});

	function buscar_cliente(idc){
        $("#txtcli").val("");
        $.ajax({
                    url: "cliente_codigo_buscar.php", 
                    data: {id:idc}, // Ponemos los parametros de ser necesarios 
                    type: "POST",
                    contentType: "application/x-www-form-urlencoded",
                    dataType: "json",  // Esto es lo que indica que la respuesta será un objeto JSon 
                    success: function(data){
                        if(data != null && $.isArray(data)){
                            // Recorremos tu respuesta con each 
                            $.each(data, function(index, value){
                                    
                                    $("#txtcli").val(value.ced+"; "+value.nom);
                                	$("#modCli").modal('hide');

                            });
                        }
                    }
                });
    }

    function buscar_maquina(idm){
        $("#txtmaq").val("");
        $.ajax({
                    url: "maquina_codigo_buscar.php", 
                    data: {id:idm}, // Ponemos los parametros de ser necesarios 
                    type: "POST",
                    contentType: "application/x-www-form-urlencoded",
                    dataType: "json",  // Esto es lo que indica que la respuesta será un objeto JSon 
                    success: function(data){
                        if(data != null && $.isArray(data)){
                            // Recorremos tu respuesta con each 
                            $.each(data, function(index, value){
                                    
                                    $("#txtmaq").val(value.cod);
                                	$("#modMaq").modal('hide');

                            });
                        }
                    }
                });
    }

    jQuery("#cmaq_agredi").click(function() {
    	if ($("#idcli").val()=="" && $("#idcmaq").val()=="")
	    	swal("¡Error!", "Debe elegir un cliente", "error");
	    else if ($("#idmaq").val()=="")
	    	swal("¡Error!", "Debe elegir una máquina", "error");
	    else if ($("#mtoest").val()=="" || $("#mtoest").val()=="0")
	    	swal("¡Error!", "El monto no debe ser vacío y mayor que 0", "error");
	    else {
	    	$.post("sala_codigo_agredi.php",$(".frmcmaq").serialize(),function(res){
						if (res==1) {
		                    swal({   
		                         title: "Finalizado",   
		                         text: "Datos guardados satisfactoriamente",   
		                         type: "success",   
		                         showCancelButton: false,   
		                         confirmButtonColor: "#BBD7ED",   
		                         confirmButtonText: "Aceptar",   
		                         closeOnConfirm: true }, 

		                    function(){     
		                         $("#capa").load('sala_interfaz_listadohoy.php');
		                    });
		                                
		                }
		                else
		                	swal("¡Error!", "No se pudo guardar la información", "error");
			});
	    }

    });

    jQuery("#pre_agredi").click(function() {
        if ($("#descr").val()=="")
            swal("¡Error!", "Campo Descripción vacío", "error");
        else if ($("#monto").val()=="" || $("#monto").val()=="0")
            swal("¡Error!", "El monto no debe ser vacío y mayor que 0", "error");
        else {
            $.post("premio_codigo_agredi.php",$("#frmpre").serialize(),function(res){
                        if (res==1) {
                            $("#ModalPrem").modal('hide');
                            swal({   
                                 title: "Finalizado",   
                                 text: "Datos guardados satisfactoriamente",   
                                 type: "success",   
                                 showCancelButton: false,   
                                 confirmButtonColor: "#BBD7ED",   
                                 confirmButtonText: "Aceptar",   
                                 closeOnConfirm: true }, 

                            function(){     
                                 $("#capa").load('sala_interfaz_listadohoy.php');
                            });
                                        
                        }
                        else
                            swal("¡Error!", "No se pudo guardar la información", "error");
            });
        }

    });


});
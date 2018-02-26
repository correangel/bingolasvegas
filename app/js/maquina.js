jQuery(document).ready(function(){

			function cargar_form (id,cod,descr,ubic){
				$("#id").val(id);
				$("#cod").val(cod);
				$("#descr").val(descr);
				$("#ubic").val(ubic);
			}
 
            jQuery("#maq_agr").click(function() {

	            cargar_form("","","","");
				$("#ModalMaq").modal('show');

            });

            $(document).on('click','.maq_edi',function (e){

            	cargar_form($(this).data("id"),$(this).data("cod"),$(this).data("descr"),$(this).data("ubic"));
            	$("#ModalMaq").modal('show');

            });

            jQuery("#agredi").click(function() {

				if ( $("#cod").val()=="")
					swal("¡Error!", "Campo Código vacío", "error");
				else if ( $("#descr").val()=="")
					swal("¡Error!", "Campo Descripción vacío", "error");
				else if ( $("#ubic").val()=="")
					swal("¡Error!", "Campo Ubicación vacío", "error");
				else { 


					$.post("maquina_codigo_agredi.php",$("#frmmaq").serialize(),function(res){

						if (res==-1)
				  				swal("¡Error!", "El código debe ser irrepetible", "error");
						else if (res==1) {
		                                
		                                $("#ModalMaq").modal('hide');
		                                swal({   
		                                    title: "Finalizado",   
		                                    text: "Datos guardados satisfactoriamente",   
		                                    type: "success",   
		                                    showCancelButton: false,   
		                                    confirmButtonColor: "#BBD7ED",   
		                                    confirmButtonText: "Aceptar",   
		                                    closeOnConfirm: true }, 

		                                    function(){
		                                        
		                                        $("#capa").load('maquina_interfaz_listado.php');
		                                });
		                                
		                }
		                else
		                	swal("¡Error!", "No se pudo guardar los datos", "error");

					});

				}
			});


});
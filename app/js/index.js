jQuery(document).ready(function(){

      $(".decimales").numeric('.');

			 var Letras=' ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzàáÀÁéèÈÉíìÍÌïÏóòÓÒúùÚÙüÜ ' 
			 var Numeros='1234567890' 
			 var NumerosYLetras=' ABCÇDEFGHIJKLMNOPQRSTUVWXYZabcçdefghijklmnopqrstuvwxyz1234567890,.:;@-\''
			 var SimbolosEspeciales=',.:;@-\'' 
			 var SignosMatematicos='+-=()*/' 
			 var Otros='<>#$%&?¿' 
			 var Sexo='FMfm'
			 var NumeroYLetra=' NSns1234567890/ '
			 var Nick='ABCÇDEFGHIJKLMNOPQRSTUVWXYZabcçdefghijklmnopqrstuvwxyz1234567890'
			 //Validar La entrada de datos
			 function ValidarEntrada(e,allow) { 
			  var k; 
			  k=document.all?parseInt(e.keyCode): parseInt(e.which); 
			  return (allow.indexOf(String.fromCharCode(k))!=-1); 
			 }// JavaScript Document

			 $(document).on('keypress','.num',function (e){
					return ValidarEntrada(e, Numeros);
		        
		    });
		    
			$(document).on('keypress','.let',function (e){
					return ValidarEntrada(e, Letras);
			});



            $("#capa").load('home.php');

            

            jQuery("#inicio").click(function() {

              $("#capa").html('');
              $("#capa").load('home.php');

            });

            jQuery("#ut").click(function() {
              $("#ModalUT").modal('show');
            });

            jQuery("#rep_cli_frec").click(function() {
              window.open('sala_reporte_clientesfrecuentes.php',"Reporte de Clientes más Frecuentes","width=900,height=500,scrollbars=NO");       

            });

            jQuery("#rep_ing_fech").click(function() {
              $("#capa").html('');
              $("#capa").load('reporte_interfaz_ingresosfechas.php');
            });


            

            jQuery("#act-ut").click(function() {
              if ($("#valor").val()=="")
                swal("¡Error!", "Campo Valor vacío", "error");
              else if ($("#valor").val().substr(0,1)=="." || $("#valor").val().substr($("#valor").val().length-1,1)==".")
                swal("¡Error!", "Campo Valor no numérico", "error");
              else if (parseFloat($("#valor").val())==0)
                swal("¡Error!", "Campo Valor debe ser mayor que 0", "error");
              else{

                $.post("ut_codigo_actualizar.php",$("#frmut").serialize(),function(res){
                  if (res==1) {
                                          
                                          $("#ModalUT").modal('hide');
                                          swal({   
                                              title: "Finalizado",   
                                              text: "Datos guardados satisfactoriamente",   
                                              type: "success",   
                                              showCancelButton: false,   
                                              confirmButtonColor: "#BBD7ED",   
                                              confirmButtonText: "Aceptar",   
                                              closeOnConfirm: true }, 

                                              function(){
                                                  
                                                  $("#capa").load('index.php');
                                          });
                                          
                          }
                          else
                            swal("¡Error!", "No se pudo guardar los datos", "error");

                });

              }

            });

            jQuery("#maq").click(function() {

              $("#capa").html('');
              $("#capa").load('maquina_interfaz_listado.php');

            });

            


            jQuery("#cli").click(function() {

              $("#capa").html('');
              $("#capa").load('cliente_interfaz_listado.php');

            });

            jQuery("#sala").click(function() {

              $("#capa").html('');
              $("#capa").load('sala_interfaz_listadohoy.php');

            });

            jQuery("#l_cc").click(function() {
              $("#capa").html('');
              $("#capa").load('cierrecaja_interfaz_listado.php');
            });

            jQuery("#abr_caja").click(function() {
               swal({
                  title: "Apertura de Caja",
                  text: "Está seguro de aperturar caja a la fecha actual?",
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
                        url:'caja_codigo_aperturar.php', //Url a donde la enviaremos
                        type:'POST', //Metodo que usaremos
                        contentType:false, //Debe estar en false para que pase el objeto sin procesar
                        processData:false, //Debe estar en false para que JQuery no procese los datos a enviar
                        cache:false //Para que el formulario no guarde cache
                      }).done(function(res){//Escuchamos la respuesta y capturamos el mensaje msg
                      if (res==1) {   
                          swal({   
                            title: "Finalizado",   
                            text: "Caja aperturada satisfactoriamente. Presione 'Aceptar' para continuar",   
                            type: "success",   
                            showCancelButton: false,   
                            confirmButtonColor: "#BBD7ED",   
                            confirmButtonText: "Aceptar",   
                            closeOnConfirm: true 
                          }, 
                          function(){
                            
                              window.location.replace('index.php');
                          });
                                    
                      }else {
                              
                          swal("¡Error!", "Hubo un error en la base de datos", "error");
                      }
                      });
                  }
               });
            });


            //

            jQuery("#cie_caja").click(function() {

              var idcj=-1;
               swal({
                  title: "Cierre de Caja",
                  text: "Está seguro de cerrar caja?",
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
                        url:'caja_codigo_cerrar.php', //Url a donde la enviaremos
                        type:'POST', //Metodo que usaremos
                        contentType:false, //Debe estar en false para que pase el objeto sin procesar
                        processData:false, //Debe estar en false para que JQuery no procese los datos a enviar
                        cache:false //Para que el formulario no guarde cache
                      }).done(function(res){//Escuchamos la respuesta y capturamos el mensaje msg
                      if (res>0) {
                          idcj=res;
                          swal({   
                            title: "Finalizado",   
                            text: "Cierre de caja satisfactorio. Presione 'Aceptar' para continuar con el reporte de cierre",   
                            type: "success",   
                            showCancelButton: false,   
                            confirmButtonColor: "#BBD7ED",   
                            confirmButtonText: "Aceptar",   
                            closeOnConfirm: true 
                          }, 
                          function(){
                              
                              window.open('caja_reporte_cierre.php?idcj='+idcj,"Reporte de Cierre de Caja","width=900,height=500,scrollbars=NO");       
    
                              window.location.replace('index.php');
                          });
                                    
                      }else {
                              
                          swal("¡Error!", "Hubo un error en la base de datos", "error");
                      }
                      });
                  }
               });
            });


            


            jQuery("#rsp").click(function() {

              $("#capa").html('');
              $("#capa").load('bd_interfaz_respaldar.php');

            });

            jQuery("#rst").click(function() {

			       $("#capa").html('');
              $("#capa").load('bd_interfaz_restaurar.php');

            });

            jQuery("#usuario_listado").click(function() {

              $("#capa").html('');
              $("#capa").load('usuario_interfaz_listado.php');

            });

            jQuery("#ep").click(function() {

              $("#capa").html('');
              $("#capa").load('perfil_interfaz_editar.php?id='+$(this).data("idu"));

            });

            
			  

            jQuery("#logout").click(function() {

                 $.post("sesion_codigo_logout.php", {}, function(resp){
                           
                    if (resp==1){
                      window.location.replace('/../bingolasvegas/index.php');
                      
                      }
                                
                
                  }, "json");

            });



});
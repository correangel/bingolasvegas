jQuery(document).ready(function(){

			
        
            jQuery("#usu_agr").click(function() {

              $("#capa").load('usuario_interfaz_agregar.php');
            });

            $(document).on('click','.usu_edi',function (e){

              $("#capa").load('usuario_interfaz_editar.php?id='+$(this).data("id"));

            });

            jQuery("#usu_vlv_list").click(function() {

              $("#capa").load('usuario_interfaz_listado.php');
            });


            function logout(){
            	$.post("logout.php", {}, function(resp){
										   
				  if (resp==1){
					  window.location.replace('/../bingolasvegas/index.php');
					  
					  }
												
				
					}, "json");

            }




            jQuery("#usu_agredi").click(function() {
            	
	              var nom=$("#nombre").val().toUpperCase();
	              var ape=$("#apellido").val().toUpperCase();

	              if ($("#nombre").val()=="" || $("#apellido").val()=="" || $("#rs").val()=="" ||  (($("#pss").val()=="" || $("#pss2").val()=="") && $("#idu").val()=="")){
	              	
	              	swal("¡Error!", "No debe dejar campos vacíos", "error");
	              }
	              else if ($("#pss").val()!=$("#pss2").val()){
	              	swal("¡Error!", "Las contraseñas no coinciden", "error"); 
	              }
	              else if (    ($("#idu").val()=="" && $("#pss").val().length < 8)  || ($("#idu").val()!="" && $("#pss").val().length > 0 && $("#pss").val().length < 8)      ){
						
						swal("¡Error!", "La contraseña debe tener mínimo 8 caracteres", "error");
				  }else {

				  	$.post("usuario_codigo_agredi.php",$(".frmusu").serialize(),function(res){


				  		if (res==-1){
				  			
				  				swal("¡Error!", "El login coincide con un usuario registrado en la base de datos", "error");
				  		}
				  		else if (res==-2){
				  			
				  				swal({   
									title: "Finalizado",   
									text: "Datos guardados satisfactoriamente. Acaba de desactivar su cuenta de usuario. Presione 'Aceptar' para cerrar la sesión",   
									type: "warning",   
									showCancelButton: false,   
									confirmButtonColor: "#BBD7ED",   
									confirmButtonText: "Aceptar",   
									closeOnConfirm: true }, 

									function(){   
										logout();
								});
				  		}
				  		else if (res==-3){
				  			
				  				swal({   
									title: "Finalizado",   
									text: "Datos guardados satisfactoriamente. Acaba de cambiar su perfil de usuario. Presione 'Aceptar' para continuar",   
									type: "warning",   
									showCancelButton: false,   
									confirmButtonColor: "#BBD7ED",   
									confirmButtonText: "Aceptar",   
									closeOnConfirm: true }, 

									function(){   
										window.location.replace('index.php');
								});
				  		}
				
						else if (res==1) {
		                    	
		                        
		                        swal({   
									title: "Finalizado",   
									text: "Datos guardados satisfactoriamente",   
									type: "success",   
									showCancelButton: false,   
									confirmButtonColor: "#BBD7ED",   
									confirmButtonText: "Aceptar",   
									closeOnConfirm: true }, 

									function(){
										$("#nomusu").html('<span class="glyphicon glyphicon-user"></span> '+nom+" "+ape);
										$("#capa").load('usuario_interfaz_listado.php');
								});
		                        
		                 }
		                 else {
		                    	
		                        
		                        swal({   
									title: "Finalizado",   
									text: "Datos guardados satisfactoriamente",   
									type: "success",   
									showCancelButton: false,   
									confirmButtonColor: "#BBD7ED",   
									confirmButtonText: "Aceptar",   
									closeOnConfirm: true }, 

									function(){
										
										$("#capa").load('usuario_interfaz_listado.php');
								});
		                        
		                 }
						
						
		            });
				  	
				  	
				  }
              	

         
            });



            



});
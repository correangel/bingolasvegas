jQuery(document).ready(function(){

	jQuery("#guardar").click(function() {
            	
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

				  	$.post("perfil_codigo_editar.php",$(".frper").serialize(),function(res){


				  		if (res==-1){
				  			
				  				swal("¡Error!", "El login coincide con un usuario registrado en la base de datos", "error");
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
										$("#capa").load('home.php');
								});
		                        
		                 }
		                 else {
		                    	
		                        
		                        swal("¡Error!", "No se pudo hacer la modificación en la base de datos", "error");
		                        
		                 }
						
						
		            });
				  	
				  	
				  }
              	

         
            });



});
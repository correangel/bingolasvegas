jQuery(document).ready(function(){


    

    //Preparación del campo tipo archivo (file)
            $(":file").filestyle( {
              buttonName: "btn-primary",
               buttonText: "Buscar Archivo",
               uploadAsync: false,
                minFileCount: 1,
                maxFileCount: 5,
              showUpload: false, 
              showRemove: false,

             });

    function ponerReadOnly(id)
    {
        // Ponemos el atributo de solo lectura
        $("#"+id).attr("readonly","readonly");
    }
 
    function quitarReadOnly(id)
    {
        // Eliminamos el atributo de solo lectura
        $("#"+id).removeAttr("readonly");
    }

    function nr_imgs(){
    	var archivos = document.getElementById('file').files;
    	return archivos.length;

    }

    jQuery("#edociv").change(function() {
            if ($(this).val()=="CASADO(A)")
            	quitarReadOnly("nomcony");
            else if (!$("#nomcony").attr("readonly")){
            	ponerReadOnly("nomcony");
            	$("#nomcony").val("");
            }
            
    });

    jQuery("#perfil").change(function() {

            if ($(this).val()=="otr")
            	quitarReadOnly("otrperf");
            else if (!$("#otrperf").attr("readonly")){
            	ponerReadOnly("otrperf");
            	$("#otrperf").val("");
            }            
    });

    jQuery("#file").change(function(){
           /* Limpiar vista previa */
           $("#vista-previa").html('');
           var archivos = document.getElementById('file').files;

           var navegador = window.URL || window.webkitURL;

           if (archivos.length>1){
           		swal("¡Error!", "Sólo se permite una imagen", "error");
           		$(this).val('');

			}
           	else {
           		/* Recorrer los archivos */
	           for(x=0; x<archivos.length; x++)
	           {
	               /* Validar tamaño y tipo de archivo */
	               var size = archivos[x].size;
	               var type = archivos[x].type;
	               var name = archivos[x].name;
	               if (size > 3024*3024)
	               {
	                   $("#vista-previa").append("<p style='color: red'>El archivo "+name+" supera el máximo permitido 3MB</p>");
	               }
	               else if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png' && type != 'image/gif')
	               {
	                   $("#vista-previa").append("<p style='color: red'>El archivo "+name+" no es del tipo de imagen permitida.</p>");
	               }
	               else
	               {
	                 var objeto_url = navegador.createObjectURL(archivos[x]);
	                 $("#vista-previa").append("<img src="+objeto_url+" width='300' height='300'>&nbsp;");
	               }
	           }

           	}

           
       });




	jQuery("#cli_agr").click(function() {

              $("#capa").load('cliente_interfaz_agregar.php');    
    });

	
	$(document).on('click','.cli_pdf_reg',function (e){
	          window.open('cliente_reporte_registro.php?id='+$(this).data("id"),"Planilla de Registro de Cliente","width=900,height=500,scrollbars=NO");		  		
    });

    $(document).on('click','.cli_pdf_dec_din',function (e){
	          
    		 window.open('cliente_reporte_declaracion.php?id='+$(this).data("id"),"Planilla de Declaración","width=900,height=500,scrollbars=NO")
    		  		
    });

    //

    $(document).on('click','.cli_edi',function (e){

    	//function llamar_editar(){
    		  if ($('#evt').val()=="NO"){
    		  		$("#capa").load('cliente_interfaz_editar.php?id='+$(this).data("id"));
    		  		$('#evt').val("SI");
    		  }
    		  else
    		  	$('#evt').val("NO");
              
         //}
    });





    jQuery("#cli_vlv_list").click(function() {

              $("#capa").load('cliente_interfaz_listado.php');
    });

    jQuery("#cli_agredi").click(function() {

              if ($('#evt').val()=="NO"){
                $('#evt').val("SI");

        		  if ( $("#freg").val()=="")
                swal("¡Error!", "Campo Fecha de registro vacío", "error");
              else if ( $("#nom").val()=="" )
              	swal("¡Error!", "Item N° 1) DATOS PERSONALES: Campo Nombre vacío", "error");
              else if ( $("#ndoc").val()=="")
              	swal("¡Error!", "Item N° 1) DATOS PERSONALES: Campo Cédula/Pasaporte. vacío", "error");
              else if ( $("#fnac").val()=="")
              	swal("¡Error!", "Item N° 1) DATOS PERSONALES: Campo Fecha de Nacimiento vacío", "error");
              else if ( $("#paisnac").val()=="")
              	swal("¡Error!", "Item N° 1) DATOS PERSONALES: Campo País de Nacimiento vacío", "error");
              else if ( $("#lugarnac").val()=="")
              	swal("¡Error!", "Item N° 1) DATOS PERSONALES: Campo Lugar de Nacimiento vacío", "error");
              else if ( $("#nac").val()=="")
              	swal("¡Error!", "Item N° 1) DATOS PERSONALES: Campo Nacionalidad vacío", "error");
              else if ($("#dir").val()=="")
              	swal("¡Error!", "Item N° 1) DATOS PERSONALES: Campo Dirección vacío", "error");
              else if ( $("#edociv").val()=="CASADO" && $("#nomcony").val()=="")
              	swal("¡Error!", "Item N° 1) DATOS PERSONALES: Campo Nombre Cónyuge vacío", "error");
              /*else if ($("#tlf").val()=="")
              	swal("¡Error!", "Item N° 1) DATOS PERSONALES: Campo Teléfono vacío", "error");
              else if ($("#email").val()=="")
              	swal("¡Error!", "Item N° 1) DATOS PERSONALES: Campo E-mail vacío", "error");*/
			         else if ($("#actprof").val()=="")
              	swal("¡Error!", "Item N° 2) DATOS LABORALES: Campo Actividad/Profesión vacío", "error");
              else if ($("#ciutrab").val()=="")
              	swal("¡Error!", "Item N° 2) DATOS LABORALES: Campo Ciudad vacío", "error");
              else if ($("#edotrab").val()=="")
              	swal("¡Error!", "Item N° 2) DATOS LABORALES: Campo Estado vacío", "error");
              else if ($("#paistrab").val()=="")
              	swal("¡Error!", "Item N° 2) DATOS LABORALES: Campo Pais vacío", "error");
              /*else if ($("#tlftrab").val()=="")
              	swal("¡Error!", "Item N° 2) DATOS LABORALES: Campo Teléfono vacío", "error");
              else if ($("#emailtrab").val()=="")
              	swal("¡Error!", "Item N° 2) DATOS LABORALES: Campo E-mail vacío", "error");*/
              else if ($("#ingmens").val()=="")
              	swal("¡Error!", "Item N° 2) DATOS LABORALES: Campo Ingreso Mensual vacío", "error");
              else if ( $("#perfil").val()=="otr" && $("#otrperf").val()=="")
              	swal("¡Error!", "Item N° 3) PERFIL DEL CLIENTE: Campo Otro Perfil vacío", "error");
              else if (  ($("#idcli").val()=="" && nr_imgs()!=1) || ($("#idcli").val()!="" && nr_imgs()>1)       )
              	swal("¡Error!", "Item N° 4) IMAGEN DE CÉDULA O PASAPORTE: Se requiere sólo una imagen", "error");
              else {


              	var archivos = document.getElementById("file").files;//Creamos un objeto con el elemento que contiene los archivos
	            //Creamos una instancia del Objeto FormDara.
	            var frmdat = new FormData();
	              
	            for(i=0; i<archivos.length; i++)
	              frmdat.append('archivo'+i,archivos[i]); //Añadimos cada archivo a el arreglo con un indice direfente

              	$(".frmdt").each(function (index) 
    		        {
    		            
    		             frmdat.append($(this).attr('id'),$(this).val());
    		        })

              	$.ajax({
                url:'cliente_codigo_agredi.php', //Url a donde la enviaremos
                type:'POST', //Metodo que usaremos
                contentType:false, //Debe estar en false para que pase el objeto sin procesar
                data:frmdat, //Le pasamos el objeto que creamos con los archivos
                processData:false, //Debe estar en false para que JQuery no procese los datos a enviar
                cache:false //Para que el formulario no guarde cache
              }).done(function(res){//Escuchamos la respuesta y capturamos el mensaje msg
                		if (res==-1){
				  			
				  				swal("¡Error!", "Ya existe otro cliente con el mismo documento de identidad.", "error");
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
										
										$("#capa").load('cliente_interfaz_listado.php');
										return;
								});
		                        
		                 }
		                 else if (res==-2)  {
		                 	
		                 	swal("¡Error!", "No se pudo guardar la imagen", "error");
		                 }
		                 else {
		                 	
		                 	swal("¡Error!", "Hubo un error en la base de datos", "error");
		                 }
              });

              }//

              }
              else
                $('#evt').val("NO");


    });  



});
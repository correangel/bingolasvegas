jQuery(document).ready(function(){

	jQuery("#consultar").click(function() {
        if ($("#fini").val()=="")
            swal("¡Error!", "Campo Fecha Inicial vacío", "error");
        else if ($("#ffin").val()=="")
            swal("¡Error!", "Campo Fecha Final vacío", "error");
        else if ($("#fini").val()>$("#ffin").val())
            swal("¡Error!", "La Fecha Inicial no debe ser mayor que la Fecha Final", "error");
        else {
        	var url = $("#trep").val()=="1"?"sala_reporte_ingresos.php?fini="+$("#fini").val()+"&ffin="+$("#ffin").val():'reporte_clientes_fechas.php';
        	$.ajax({
                    url: "reporte_codigo_ingresosfechas.php", 
                    data: {fini:$("#fini").val(), ffin:$("#ffin").val()}, // Ponemos los parametros de ser necesarios 
                    type: "POST",
                    contentType: "application/x-www-form-urlencoded",
                    dataType: "json",  // Esto es lo que indica que la respuesta será un objeto JSon 
                    success: function(data){
                        if(data != null && $.isArray(data)){
                            // Recorremos tu respuesta con each 
                            $.each(data, function(index, value){
                                    
                                    if (value.monto==0 || value.monto==null)
                                    	swal("¡Aviso!", "No hubo ingresos con las fechas establecidas", "info");
                                    else
                                    	window.open(url,"Reporte de Clientes por Fechas","width=900,height=500,scrollbars=NO")

                            });
                        }
                    }
                });

        }


    });



});
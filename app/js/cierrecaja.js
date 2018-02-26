jQuery(document).ready(function(){

	$(document).on('click','.cj_rep_cierre',function (e){
			window.open('caja_reporte_cierre.php?idcj='+$(this).data("idcj"),"Reporte de Cierre de Caja","width=900,height=500,scrollbars=NO");
    });

    $(document).on('click','.cj_list_prem',function (e){
    	$("#capa").html('');
        $("#capa").load('cierrecaja_interfaz_listadopremios.php?id='+$(this).data("idcj"));
			
	});

	jQuery("#cj_vlv").click(function() {
        $("#capa").html('');
        $("#capa").load('cierrecaja_interfaz_listado.php');
    });

    $(document).on('click','.cj_rep_prem',function (e){
              window.open('sala_reporte_premio.php?idcmq='+$(this).data("idcmq"),"Planilla de Premio","width=900,height=500,scrollbars=NO");          
    });

    $(document).on('click','.cli_pdf_dec_din',function (e){   
    		 window.open('cliente_reporte_declaracion.php?id='+$(this).data("id"),"Planilla de Declaración","width=900,height=500,scrollbars=NO")
    		  		
    });

});
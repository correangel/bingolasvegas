<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Reporte Clientes Fechas</title>

		<style type="text/css">

		</style>
	</head>
	<body>
        <input hidden id="fini" data-jsn="" value=""/><input hidden id="ffin" value=""/>
        <input hidden id="_fini" data-jsn="" value=""/><input hidden id="_ffin" value=""/>
<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>

<script type="text/javascript">          
            function extraer_params(){
                $.ajax({
                    url: "reporte_codigo_extraerparams.php",
                    data: {id:1}, // Ponemos los parametros de ser necesarios 
                    type: "POST",
                    async: true,
                    contentType: "application/x-www-form-urlencoded",
                    dataType: "json",  // Esto es lo que indica que la respuesta será un objeto JSon 
                    success: function(data){
                        if(data != null && $.isArray(data)){
                            // Recorremos tu respuesta con each 
                            $.each(data, function(index, value){
                                
                                $("#fini").attr("value",value.fini);
                                $("#ffin").attr("value",value.ffin);
                                $("#_fini").attr("value",value._fini);
                                $("#_ffin").attr("value",value._ffin);
                            });
                        }
                    }
                });
            }; 

            extraer_params();

</script>
<script src="code/highcharts.js"></script>
<script src="code/modules/exporting.js"></script>



<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>


		<script type="text/javascript">
jQuery(document).ready(function(){

            Highcharts.setOptions({
            lang:{
            contextButtonTitle:"Opciones",
            //decimalPoint:.
            printChart: 'Imprimir',
            downloadPNG: 'Descargar Imagen (Formato PNG)',
            
            downloadJPEG: 'Descargar Imagen (Formato JPEG)',
            
            downloadPDF: 'Descargar Documento (Formato PDF)',
            
            downloadSVG: 'Descargar Imagen (Formato SVG)'
        }
});

$.getJSON("reporte_codigo_listadoclientes.php?fini="+$("#_fini").val()+"&ffin="+$("#_ffin").val(), function(json) {

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'REPORTE DE INGRESOS (BS.) DESDE EL ' + $("#fini").attr("value") + ' HASTA EL ' + $("#ffin").attr("value"),

        style:{fontFamily:' "Exo 2", sans-serif, bold',fontSize:"14px", fontWeight: "bold"},backgroundColor:" solid #FFFFFF"
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y:.2f}',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Porcentaje',
        colorByPoint: true,
        data: json
    }]
});

});

});
		</script>
	</body>
</html>

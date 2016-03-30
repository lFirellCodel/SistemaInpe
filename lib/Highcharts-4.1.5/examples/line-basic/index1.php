<?php
require_once './config.php';
require './Conexion.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Monthly Average Temperature',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: WorldClimate.com',
            x: -20
        },
        xAxis: {
            categories: [
                        <?php
                        $con = Conexion::getConexion();
            
                        $query = "SELECT * FROM eventos" ;      

                        $stmt = $con->prepare($query);
                        $stmt->execute();
                        while($resultado = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
                             foreach ($resultado as $row) {
                        ?>
                                
                             '<?php echo $row['nomb_evento'] ?>',
                         <?php
                            }
                        }
                         ?>
                          ]
        },
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Eventos',
            data: [
                 <?php
                        $con = Conexion::getConexion();
            
                        $query = "SELECT * FROM eventos" ;      

                        $stmt = $con->prepare($query);
                        $stmt->execute();
                        while($resultado = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
                             foreach ($resultado as $row) {
                        ?>
                                
                             '<?php echo $row['precio_unit'] ?>',
                         <?php
                            }
                        }
                         ?>
            ]
        }, 
        }]
    });
});
		</script>
	</head>
	<body>
<script src="../../js/highcharts.js"></script>
<script src="../../js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>

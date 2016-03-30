<?php
require_once './config.php';
require_once './Conexion.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="../../js/highcharts.js"></script>
                <script src="../../js/modules/exporting.js"></script>
                <style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            zoomType: 'x'
        },
        title: {
            text: 'USD to EUR exchange rate from 2006 through 2008'
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                    'Click and drag in the plot area to zoom in' :
                    'Pinch the chart to zoom in'
        },
        xAxis: {
            type: 'datetime',
            minRange: 14 * 24 * 3600000 // fourteen days
        },
        yAxis: {
            title: {
                text: 'Exchange rate'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        },

        series: [{
            type: 'area',
            name: 'Precio',
            pointInterval: 24 * 3600 * 1000,
            pointStart: Date.UTC(2015, 0, 1),
            data: [
                <?php
                        $con = Conexion::getConexion();
            
                        $query = "SELECT * FROM eventos" ;      

                        $stmt = $con->prepare($query);
                        $stmt->execute();
                        while($resultado = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
                             foreach ($resultado as $row) {
                        ?>
                                
                             <?php echo $row['precio_unit'] ?>,
                         <?php
                            }
                        }
                         ?>
            ]
        }]
    });
});
		</script>
	</head>
	<body>


<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>

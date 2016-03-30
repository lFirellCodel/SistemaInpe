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
    $('#caja').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Browser market shares at a specific website, 2014'
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
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
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


<div id="caja" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

	</body>
</html>

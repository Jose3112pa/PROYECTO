<!DOCTYPE html>
<html lang="es">
    <?php
    include "php/conexion.php";
    $consultaSQL="Select *from paciente where 1";
    $ejecutarConsulta=$conexion->query($consultaSQL);
    $nombres=array();
    $edades=array();
    $i=0;
    while ($fila=$ejecutarConsulta->fetch_array()){
        $nombres[$i]=$fila[1];
        $edades[$i]=$fila[5];
        $i++;
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafica</title>
</head>
<body>
    <canvas id="grafica"></canvas>
    <script type="text/javascript">
        const $grafica = document.querySelector("#grafica");
        const etiquetas = <?php echo json_encode($nombres) ?>;
        const datos = <?php echo json_encode($edades) ?>;
        const datosGrafica = {
            label: "Ritmo cardíaco de pacientes",
            data: <?php echo json_encode($edades) ?>,
            backgroundColor: 'rgba(255, 0, 108, 0.3)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 2,
        };
        new Chart($grafica, {
            type: 'line',
            data: {
                labels: etiquetas,
                datasets: [
                    datosGrafica,
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                },
            }
        });
    </script>
</body>
</html>
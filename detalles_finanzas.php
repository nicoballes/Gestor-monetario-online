<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$BaseDeDatos = "registros_gastos";

// Realizar la conexión a la base de datos
$enlace = mysqli_connect($servidor, $usuario, $clave, $BaseDeDatos);

// Verificar si la conexión fue exitosa
if (!$enlace) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener el mes seleccionado
$mesSeleccionado = isset($_POST['mes']) ? $_POST['mes'] : date('Y-m');

// Consulta SQL para obtener la suma de los ingresos y gastos por día para el mes seleccionado
$query = "
    SELECT 
        DATE(Fecha) as fecha, 
        SUM(CASE WHEN TipoTransaccion = 'Ingreso' THEN Monto ELSE 0 END) AS total_ingresos, 
        SUM(CASE WHEN TipoTransaccion = 'Gasto' THEN Monto ELSE 0 END) AS total_gastos 
    FROM 
        gastos 
    WHERE 
        DATE_FORMAT(Fecha, '%Y-%m') = '$mesSeleccionado' 
    GROUP BY 
        DATE(Fecha)
";

$resultado = mysqli_query($enlace, $query);

$data = [];
while ($fila = mysqli_fetch_assoc($resultado)) {
    $data[] = [
        'fecha' => $fila['fecha'],
        'total_ingresos' => $fila['total_ingresos'],
        'total_gastos' => $fila['total_gastos']
    ];
}

mysqli_free_result($resultado);
mysqli_close($enlace);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Finanzas</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin: 20px;
        }
        .chart-card {
            flex: 1;
            min-width: 300px;
            max-width: 600px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .chart-container {
            position: relative;
            width: 100%;
            height: 400px;
        }
    </style>
    <script type="text/javascript">
        google.charts.load('current', { packages: ['corechart', 'bar'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            const data = google.visualization.arrayToDataTable([
                ['Fecha', 'Ingresos', 'Gastos'],
                <?php
                foreach ($data as $row) {
                    echo "['" . $row['fecha'] . "', " . $row['total_ingresos'] . ", " . $row['total_gastos'] . "],";
                }
                ?>
            ]);

            const options = {
                title: 'Ingresos y Gastos Mensuales (<?php echo $mesSeleccionado; ?>)',
                hAxis: {
                    title: 'Día',
                    format: 'dd MMM',
                },
                vAxis: {
                    title: 'Cantidad',
                },
                seriesType: 'bars',
                series: {2: {type: 'line'}}
            };

            const chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
<div class="menu-container">
    <button id="menu-toggle" class="btn">☰ Menú</button><br><br>
    <div class="menu-items open">
        <ul>
            <li><a href="home.php">Inicio</a></li><br>
            <li><a href="movimientos.php">Mostrar movimientos</a></li><br>
            <li><a href="consejos_financieros.php">Consejos financieros</a></li>
            <li><a href="https://wa.link/og772g">Soporte usuarios vía Whatsapp</a></li>
        </ul>
    </div>
</div>

<div class="container mt-5">
    <h1 class="mb-4">Detalle de Finanzas</h1>

    <form action="detalles_finanzas.php" method="post" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="mes" class="form-label">Seleccione el mes:</label>
                <input type="month" id="mes" name="mes" class="form-control" value="<?php echo $mesSeleccionado; ?>">
            </div>
            <div class="col-md-2 align-self-end">
                <button type="submit" class="btn">Filtrar</button>
            </div>
        </div>
    </form>

    <div class="dashboard-container">
        <div class="chart-card">
            <h5>Ingresos y Gastos Mensuales (<?php echo $mesSeleccionado; ?>)</h5>
            <div class="chart-container" id="chart_div"></div>
        </div>
    </div>
</div>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menuItems = document.querySelector('.menu-items');

    menuItems.classList.add('open'); // Mostrar el menú por defecto

    menuToggle.addEventListener('click', () => {
        menuItems.classList.toggle('open');
    });
</script>
</body>
</html>

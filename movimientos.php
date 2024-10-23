<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registros_gastos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener todos los registros de gastos
$sql = "SELECT * FROM gastos";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimientos</title>
    <style>
        body {
            background-color: #f3f3f3;
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            font-size: 18px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            text-align: center;
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #34495e;
            color: #fff;
            font-size: 20px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #ddd;
        }

        .button {
            background-color: #ff8800;
            border: none;
            color: white;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin-top: 20px;
            margin-left: 20px;
            cursor: pointer;
            border-radius: 10px;
        }

        .button:hover {
            background-color: #ff6600;
        }

        .menu-container {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }

        .menu-items {
            display: none;
            position: absolute;
            background-color: #34495e;
            padding: 15px;
            border-radius: 10px;
            color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .menu-items.open {
            display: block;
        }

        .menu-items ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-items li {
            margin-bottom: 15px;
        }

        .menu-items a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="menu-container">
    <button id="menu-toggle" class="button">☰ Menú</button><br><br>
    <div class="menu-items open">
        <ul>
            <li><a href="home.php">Inicio</a></li><br>
            <li><a href="detalles_finanzas.php">Detalle de finanzas</a></li>
            <li><a href="consejos_financieros.php">Consejos financieros</a></li>
            <li><a href="https://wa.link/og772g">Soporte usuarios vía Whatsapp</a></li>
        </ul>
    </div>
</div>

<?php
// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar los resultados en una tabla
    echo "<table>";
    echo "<tr><th>ID</th><th>Tipo de transacción</th><th>Fecha</th><th>Monto</th><th>Categoría</th><th>Descripción</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Id"] . "</td>";
        echo "<td>" . $row["TipoTransaccion"] . "</td>";
        echo "<td>" . $row["Fecha"] . "</td>";
        echo "<td>" . $row["Monto"] . "</td>";
        echo "<td>" . $row["Categoría"] . "</td>";
        echo "<td>" . $row["Descripción"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No hay movimientos registrados.</p>";
}

// Cerrar la conexión
$conn->close();
?>

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

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

// Consulta SQL para obtener la suma de los ingresos
$query = "SELECT SUM(Monto) AS total FROM gastos WHERE TipoTransaccion = 'Ingreso'";

// Ejecutar la consulta
$resultado = mysqli_query($enlace, $query);

// Verificar si la consulta fue exitosa
if ($resultado) {
    // Obtener el resultado de la consulta
    $fila = mysqli_fetch_assoc($resultado);
    $totalIngresos = $fila['total'];

    // Liberar el resultado
    mysqli_free_result($resultado);
} else {
    // Manejar el caso en que la consulta falle
    $totalIngresos = 0; // Establecer el saldo total en cero si la consulta falla
}

// Consulta SQL para obtener la suma de los gastos
$query = "SELECT SUM(Monto) AS total FROM gastos WHERE TipoTransaccion = 'Gasto'";

// Ejecutar la consulta
$resultado = mysqli_query($enlace, $query);

// Verificar si la consulta fue exitosa
if ($resultado) {
    // Obtener el resultado de la consulta
    $fila = mysqli_fetch_assoc($resultado);
    $totalGastos = $fila['total'];

    // Liberar el resultado
    mysqli_free_result($resultado);
} else {
    // Manejar el caso en que la consulta falle
    $totalGastos = 0; // Establecer el total de gastos en cero si la consulta falla
}

// Calcular el saldo total
$saldoTotal = $totalIngresos - $totalGastos;

// Si el saldo total es negativo, establecerlo en cero
if ($saldoTotal < 0) {
    $saldoTotal = 0;
}

// Si se envió el formulario de registro
if (isset($_POST['Registro'])) {
    $TipoTransaccion = $_POST['TipoTransaccion'];
    $Fecha = $_POST['Fecha'];
    $Monto = $_POST['Monto'];
    $Categoría = $_POST['Categoría'];
    $Descripción = $_POST['Descripción'];

    $query = "INSERT INTO gastos (TipoTransaccion, Fecha, Monto, Categoría, Descripción) VALUES ('$TipoTransaccion', '$Fecha', '$Monto', '$Categoría', '$Descripción')";
    $resultado = mysqli_query($enlace, $query);

    if ($resultado) {
        echo "<script>alert('Registro guardado exitosamente');</script>";
    } else {
        die("Query Fallida");
    }

    // Actualizar el total de ingresos y gastos después de guardar el registro
    $query = "SELECT SUM(Monto) AS total FROM gastos WHERE TipoTransaccion = 'Ingreso'";
    $resultado = mysqli_query($enlace, $query);
    $fila = mysqli_fetch_assoc($resultado);
    $totalIngresos = $fila['total'];

    $query = "SELECT SUM(Monto) AS total FROM gastos WHERE TipoTransaccion = 'Gasto'";
    $resultado = mysqli_query($enlace, $query);
    $fila = mysqli_fetch_assoc($resultado);
    $totalGastos = $fila['total'];

    // Calcular el nuevo saldo total
    $saldoTotal = $totalIngresos - $totalGastos;

    // Si el saldo total es negativo, establecerlo en cero
    if ($saldoTotal < 0) {
        $saldoTotal = 0;
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($enlace);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="saldo-container">
        <p>Saldo Total:</p>
        <p><?php echo number_format($saldoTotal, 2); ?> COP</p>
    </div>
    <div class="menu-container">
        <button id="menu-toggle">☰ Menú</button>
        <div class="menu-items open">
            <ul>
                <li><a href="movimientos.php">Mostrar movimientos</a></li><br>
                <li><a href="detalles_finanzas.php">Detalle de finanzas</a></li><br>
                <li><a href="consejos_financieros.php">Consejos financieros</a></li>
                <li><a href="https://wa.link/og772g">Soporte usuarios vía Whatsapp</a></li>
            </ul>
        </div>
    </div>

    <h1>GESTOR MONETARIO ONLINE</h1><br>

    <form action="#" id="expense-form" method="post">
        <label for="transaction-type">Tipo de transacción:</label>
        <select name="TipoTransaccion" id="transaction-type">
            <option value="Ingreso">Ingreso</option>
            <option value="Gasto">Gasto</option>
        </select><br><br>

        <label for="date">Fecha:</label>
        <input type="date" name="Fecha"><br><br>

        <label>Monto:</label>
        <input type="number" id="Monto-input" name="Monto" min="0" placeholder="¿Cantidad de dinero?"><br><br>

        <label for="category">Categoría:</label>
        <select name="Categoría">
            <option value="Alimentación">Alimentación</option>
            <option value="Transporte">Transporte</option>
            <option value="Entretenimiento">Entretenimiento</option>
            <option value="Servicios">Servicios</option>
            <option value="Vivienda">Vivienda</option>
            <option value="Inversiones">Inversiones</option>
            <option value="Ropa">Ropa</option>
            <option value="Sueldo">Pago de sueldo (Para ingresos)</option>
        </select><br><br>

        <label for="description">Descripción:</label>
        <input type="text" name="Descripción" placeholder="Descripción del gasto" required><br><br>

        <button type="submit" name="Registro">Guardar registro</button>
        <button type="reset">Restablecer</button>
    </form><br>

    <footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>Nuestro sitio web</h4>
                <p>Esta herramienta web tiene la finalidad de que el usuario tenga total control sobre sus finanzas personales</p>
            </div>
            </div>
            <div class="col-md-4">
                <h4>Contacto</h4>
                <p>Email: Daniel.cobo@uniminuto.edu.co - nicolas.ballesteros@uniminuto.edu.co</p>
                <p>Teléfono: +57 3188613951 - +57 301 2844820</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>&copy; 2024 Gestos Monetario Online (GMO). Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</footer>


    <script src="script.js"></script>
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

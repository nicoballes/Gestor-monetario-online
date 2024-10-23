<?php

// Se utiliza para llamar al archivo que contine la conexion a la base de datos
require 'bd_conexion.php';

// Validamos que el formulario y que el boton login haya sido presionado
if(isset($_POST['login'])) {

// Obtener los valores enviados por el formulario
$email = $_POST['email'];
$contrasena_user = $_POST['contraseña'];

// Ejecutamos la consulta a la base de datos utilizando la función mysqli_query
$sql = "SELECT * FROM users WHERE email = '$email' and contraseña = '$contrasena_user'";
$resultado = mysqli_query($conexion,$sql);
$numero_registros = mysqli_num_rows($resultado);
	if($numero_registros != 0) {
		// Inicio de sesión exitoso
		header("Location: home.php");
	} else {
		// Credenciales inválidas
		echo "Credenciales inválidas. Por favor, verifica tu email y/o contraseña."."<br>";
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href="styles.css">
</head>

<body> 
    <div class="container">
            <h2 class="loginTitulo">INICIA SESIÓN</h2>

            <form action="login.php" method="post" id="login-form">

                <div class="form-group2">
                    <label for="email">Correo: </label>
                    <input type="email" placeholder="Ingresa tu Email:" name="email" class="form-control">
                </div><br>
                <div class="form-group2">
                    <label for="password">Contraseña: </label>
                    <input type="password" placeholder="Ingresa tu contraseña:" name="contraseña" class="form-control">
                </div><br><br>
                <div class="form-btn2">
                    <button type="submit" value="Login" name="login" class="btn btn-primary">¡Iniciar sesión!</button>
                </div>
            </form>
        </div><br>
        <p>¿No tienes cuenta? <a href="register.php">Registrate ahora</a></p>

</body>

</html>






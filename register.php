<?php
// Se utiliza para llamar al archivo que contine la conexion a la base de datos
require 'bd_conexion.php';

// Validamos que el formulario y que el boton registro haya sido presionado
if(isset($_POST['Registrar_Usuarios'])) {

// Obtener los valores enviados por el formulario
$email = $_POST['email'];
$contrasena_user = $_POST['contraseña'];


// Insertamos los datos en la base de datos (Valga la redundancia...    ._.)
$sql = "INSERT INTO users (email, contraseña, id) VALUES ('$email', '$contrasena_user', null)";
$resultado = mysqli_query($conexion,$sql);
	if($resultado) {
		// Inserción correcta
		echo '<div class="success">Usuario registrado correctamente</div>';
	} else {
		// Inserción fallida
		echo '<div class="alerta">Error al registrar</div>';
	
	}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="register-container">
        <h2>REGÍSTRATE</h2>
        <form action="register.php" method="post" id="register-form">

        <label for="email">Correo:</label>
        <input type="text" name="email" placeholder="Ingrese su correo:" maxlength="25" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="contraseña" placeholder="Ingrese su contraseña:" minlength="8"required><br><br><br>
            
            <button type="submit" name="Registrar_Usuarios">¡Regístrate!</button>
            <button type="reset">Restablecer</button><br><br>

            <input type="checkbox" id="opcion" name="opcion" value="valor_de_opcion" required>Al crear tu cuenta, aceptas los <a href="terminos_condiciones.html" id="TC">términos y condiciones</a> previamente establecidos junto a la <a href="" id="PP">política de privacidad</a> que abarca nuestro nuestro sitio web.
            

        </form><br>
        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
    </div>
</body>
</html>
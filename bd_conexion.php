<?php 
//Conexión a la base de datos
$hostname = "localhost"; //nombre del Host
$dbUser="root"; //usuario de la BD
$dbPassword=""; //Sin contraseña establecida
$dbName="login-register";
$conexion = mysqli_connect($hostname, $dbUser , $dbPassword ,$dbName);
if (!$conexion){
    die("Connection went wrong;");
}
?>
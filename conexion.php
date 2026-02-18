<?php
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$base_datos = "usuarios";

$conn = new mysqli($servidor, $usuario, $contraseña, $base_datos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

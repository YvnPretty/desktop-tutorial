<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $nombre, $email);

    if ($stmt->execute()) {
        echo "<h2>Usuario creado correctamente</h2>";
        echo "Nombre: " . $nombre . "<br>";
        echo "Email: " . $email . "<br><br>";
    } else {
        echo "<h2>Error al crear el usuario</h2>";
        echo $stmt->error;
    }

    $stmt->close();
    $conn->close();

} else {
    header("Location: index.php");
}
?>

<br>
<a href="index.php">Volver</a>

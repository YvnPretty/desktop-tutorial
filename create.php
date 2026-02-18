<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario Creado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">¡Usuario Creado Exitosamente!</h4>
            <p>Los siguientes datos han sido registrados:</p>
            <hr>
            <p class="mb-0"><strong>Nombre:</strong> <?php echo $name; ?></p>
            <p class="mb-0"><strong>Email:</strong> <?php echo $email; ?></p>
        </div>
        <a href="index.html" class="btn btn-primary">Volver</a>
    </div>
</body>
</html>
<?php
} else {
    echo "Método no permitido";
}
?>

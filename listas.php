<?php
// Incluir la conexión a la base de datos
require_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <!-- Bootstrap 5 (más moderno) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Lista de Usuarios Registrados</h4>
                        <a href="index.php" class="btn btn-light btn-sm">
                            <i class="fas fa-plus"></i> Nuevo Usuario
                        </a>
                    </div>
                    <div class="card-body">
                        <?php
                        // Consulta SQL para obtener todos los usuarios
                        $sql = "SELECT * FROM usuarios ORDER BY id DESC";
                        $resultado = $conn->query($sql);
                        ?>
                        
                        <?php if ($resultado->num_rows > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Fecha de Registro</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($fila = $resultado->fetch_assoc()): ?>
                                            <tr>
                                                <td><?php echo $fila['id']; ?></td>
                                                <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                                                <td><?php echo htmlspecialchars($fila['email']); ?></td>
                                                <td><?php echo isset($fila['fecha_registro']) ? $fila['fecha_registro'] : 'No disponible'; ?></td>
                                                <td>
                                                    <a href="ver_usuario.php?id=<?php echo $fila['id']; ?>" class="btn btn-info btn-sm text-white" title="Ver detalles">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="editar.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning btn-sm" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="eliminar.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?')" title="Eliminar">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Mostrar total de registros -->
                            <div class="alert alert-info mt-3">
                                <i class="fas fa-info-circle"></i> 
                                Total de usuarios registrados: <strong><?php echo $resultado->num_rows; ?></strong>
                            </div>
                            
                        <?php else: ?>
                            <div class="alert alert-warning text-center">
                                <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                                <h5>No hay usuarios registrados</h5>
                                <p>Comienza creando un nuevo usuario.</p>
                                <a href="index.php" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Crear Primer Usuario
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $conn->close(); ?>

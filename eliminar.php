// ================== BORRAR USUARIO ==================
if (isset($_GET['borrar'])) {
    $id = $_GET['borrar'];

    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: crud_usuarios.php");
    exit();
}

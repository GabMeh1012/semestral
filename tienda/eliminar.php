<?php
// Proceso: elimina un producto (DELETE)
include "includes/conexion.php";

try {
    $stmt = $conn->prepare("DELETE FROM productos WHERE id_producto = :id");
    $stmt->execute([':id' => $_POST['id_producto']]);

    if ($stmt->rowCount() > 0) {
        $msg = "Producto eliminado correctamente.";
    } else {
        $msg = "No se encontró el producto a eliminar.";
    }
} catch (PDOException $e) {
    $msg = "Error al eliminar: " . $e->getMessage();
}

header("Location: mostrar.php?msg=" . urlencode($msg));
exit();
?>

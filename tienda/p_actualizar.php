<?php
// Proceso: guarda los cambios del producto (UPDATE)
include "includes/conexion.php";

try {
    $sql = "UPDATE productos
            SET descripcion = :descripcion,
                cantidad = :cantidad,
                marca = :marca,
                costo = :costo,
                id_proveedor = :id_proveedor
            WHERE id_producto = :id_producto";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':descripcion'  => trim($_POST['descripcion']),
        ':cantidad'     => $_POST['cantidad'],
        ':marca'        => trim($_POST['marca']),
        ':costo'        => $_POST['costo'],
        ':id_proveedor' => $_POST['id_proveedor'],
        ':id_producto'  => $_POST['id_producto']
    ]);
    $msg = "Producto actualizado correctamente.";
} catch (PDOException $e) {
    $msg = "Error al actualizar: " . $e->getMessage();
}

// Regresa a la lista mostrando el mensaje
header("Location: mostrar.php?msg=" . urlencode($msg));
exit();
?>

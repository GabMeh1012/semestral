<?php
// Proceso: inserta en las tablas proveedor y productos
include "includes/conexion.php";

$idProveedor     = $_POST['id_proveedor'];
$nombreProveedor = trim($_POST['nombre_proveedor']);
$descripcion     = trim($_POST['descripcion']);
$cantidad        = $_POST['cantidad'];
$marca           = trim($_POST['marca']);
$costo           = $_POST['costo'];

try {
    // Transacción: se guardan ambas tablas o ninguna
    $conn->beginTransaction();

    // 1. ¿Ya existe el proveedor?
    $stmt = $conn->prepare("SELECT COUNT(*) FROM proveedor WHERE id_proveedor = :id");
    $stmt->execute([':id' => $idProveedor]);

    if ($stmt->fetchColumn() == 0) {
        // 2. Si no existe, se inserta en la tabla proveedor
        $stmt = $conn->prepare("INSERT INTO proveedor (id_proveedor, nombre_proveedor)
                                VALUES (:id, :nombre)");
        $stmt->execute([':id' => $idProveedor, ':nombre' => $nombreProveedor]);
    }

    // 3. Se inserta el producto en la tabla productos
    $sql = "INSERT INTO productos (descripcion, cantidad, marca, costo, id_proveedor)
            VALUES (:descripcion, :cantidad, :marca, :costo, :id_proveedor)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':descripcion'  => $descripcion,
        ':cantidad'     => $cantidad,
        ':marca'        => $marca,
        ':costo'        => $costo,
        ':id_proveedor' => $idProveedor
    ]);

    $conn->commit();
    $msg = "Producto registrado correctamente con ID " . $conn->lastInsertId() . ".";
} catch (PDOException $e) {
    $conn->rollBack();
    $msg = "Error al registrar: " . $e->getMessage();
}

header("Location: agregar.php?msg=" . urlencode($msg));
exit();
?>

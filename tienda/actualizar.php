<?php
// Formulario con los datos actuales del producto para modificarlos
$titulo = "Actualizar producto - ElectroHogar";
include "includes/conexion.php";
include "includes/header.php";

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$stmt = $conn->prepare("SELECT * FROM productos WHERE id_producto = :id");
$stmt->execute([':id' => $id]);
$prod = $stmt->fetch(PDO::FETCH_ASSOC);

// Lista de proveedores para el <select>
$proveedores = $conn->query("SELECT * FROM proveedor ORDER BY nombre_proveedor")->fetchAll(PDO::FETCH_ASSOC);
?>
<section class="tarjeta">
    <h2>Actualizar producto</h2>

    <?php if (!$prod): ?>
        <p>No existe un producto con ese código.</p>
        <a class="btn" href="mostrar.php">Regresar</a>
    <?php else: ?>
    <form action="p_actualizar.php" method="post" class="formulario">
        <input type="hidden" name="id_producto" value="<?php echo $prod['id_producto']; ?>">

        <p><label>ID producto:</label>
           <input type="text" value="<?php echo $prod['id_producto']; ?>" disabled></p>

        <p><label for="descripcion">Descripción:</label>
           <input type="text" id="descripcion" name="descripcion" maxlength="150" required
                  value="<?php echo htmlspecialchars($prod['descripcion']); ?>"></p>

        <p><label for="cantidad">Cantidad:</label>
           <input type="number" id="cantidad" name="cantidad" min="0" step="1" required
                  value="<?php echo $prod['cantidad']; ?>"></p>

        <p><label for="marca">Marca:</label>
           <input type="text" id="marca" name="marca" maxlength="50" required
                  value="<?php echo htmlspecialchars($prod['marca']); ?>"></p>

        <p><label for="costo">Costo (B/.):</label>
           <input type="number" id="costo" name="costo" min="0" step="0.01" required
                  value="<?php echo $prod['costo']; ?>"></p>

        <p><label for="id_proveedor">Proveedor:</label>
           <select id="id_proveedor" name="id_proveedor" required>
               <?php foreach ($proveedores as $pv): ?>
                   <option value="<?php echo $pv['id_proveedor']; ?>"
                       <?php if ($pv['id_proveedor'] == $prod['id_proveedor']) echo 'selected'; ?>>
                       <?php echo $pv['id_proveedor'] . ' - ' . htmlspecialchars($pv['nombre_proveedor']); ?>
                   </option>
               <?php endforeach; ?>
           </select></p>

        <input type="submit" value="Guardar cambios" class="btn">
        <a class="btn btn-secundario" href="mostrar.php">Cancelar</a>
    </form>
    <?php endif; ?>
</section>
<?php include "includes/footer.php"; ?>

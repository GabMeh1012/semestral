<?php
// Formulario con los datos actuales del producto para modificarlos
$titulo = "Actualizar producto - ElectroHogar";
$pagina = "mostrar";
include "includes/conexion.php";
include "includes/header.php";

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$stmt = $conn->prepare("SELECT * FROM productos WHERE id_producto = :id");
$stmt->execute([':id' => $id]);
$prod = $stmt->fetch(PDO::FETCH_ASSOC);

// Lista de proveedores para el <select>
$proveedores = $conn->query("SELECT * FROM proveedor ORDER BY nombre_proveedor")->fetchAll(PDO::FETCH_ASSOC);
?>

    <h2 class="titulo">Actualizar Producto</h2>

    <?php if (!$prod): ?>
      <p class="mensaje">No existe un producto con ese código.</p>
      <a href="mostrar.php" class="boton">Volver</a>
    <?php else: ?>

    <form action="p_actualizar.php" method="post" class="formulario">
      <input type="hidden" name="id_producto" value="<?php echo $prod['id_producto']; ?>">

      <div class="tarjeta">
        <img src="img/corazon.svg" alt="" class="corazon">
        <h3>Producto #<?php echo $prod['id_producto']; ?></h3>

        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" maxlength="150" required
               value="<?php echo htmlspecialchars($prod['descripcion']); ?>">

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" maxlength="50" required
               value="<?php echo htmlspecialchars($prod['marca']); ?>">

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" min="0" step="1" required
               value="<?php echo $prod['cantidad']; ?>">
      </div>

      <div class="tarjeta">
        <img src="img/corazon.svg" alt="" class="corazon">
        <h3>Costo y proveedor</h3>

        <label for="costo">Costo (B/.):</label>
        <input type="number" id="costo" name="costo" min="0" step="0.01" required
               value="<?php echo $prod['costo']; ?>">

        <label for="id_proveedor">Proveedor:</label>
        <select id="id_proveedor" name="id_proveedor" required>
          <?php foreach ($proveedores as $pv): ?>
            <option value="<?php echo $pv['id_proveedor']; ?>"
              <?php if ($pv['id_proveedor'] == $prod['id_proveedor']) echo 'selected'; ?>>
              <?php echo $pv['id_proveedor'] . ' - ' . htmlspecialchars($pv['nombre_proveedor']); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="botones">
        <input type="submit" value="Guardar cambios" class="boton">
        <a href="mostrar.php" class="boton boton-claro">Cancelar</a>
      </div>
    </form>

    <?php endif; ?>

<?php include "includes/footer.php"; ?>

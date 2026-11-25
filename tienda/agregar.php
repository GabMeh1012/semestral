<?php
$titulo = "Agregar producto - ElectroHogar";
$pagina = "agregar";
include "includes/header.php";
?>

    <h2 class="titulo">Agregar Producto</h2>

    <?php if (isset($_GET['msg'])): ?>
      <p class="mensaje"><?php echo htmlspecialchars($_GET['msg']); ?></p>
    <?php endif; ?>

    <!-- Un solo formulario: guarda en las tablas proveedor y productos -->
    <form action="p_agregar.php" method="post" class="formulario">

      <div class="tarjeta">
        <img src="img/corazon.svg" alt="" class="corazon">
        <h3>Datos del proveedor</h3>

        <label for="id_proveedor">ID proveedor:</label>
        <input type="number" id="id_proveedor" name="id_proveedor" min="1" required>

        <label for="nombre_proveedor">Nombre proveedor:</label>
        <input type="text" id="nombre_proveedor" name="nombre_proveedor" maxlength="100"
               placeholder="Ej. Distribuidora Panamá S.A." required>

        <p>Si el ID del proveedor ya existe, el producto se asocia a ese proveedor.</p>
      </div>

      <div class="tarjeta">
        <img src="img/corazon.svg" alt="" class="corazon">
        <h3>Datos del producto</h3>

        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" maxlength="150"
               placeholder="Ej. Refrigeradora 18 pies" required>

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" maxlength="50" placeholder="Ej. Samsung" required>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" min="0" step="1" value="1" required>

        <label for="costo">Costo (B/.):</label>
        <input type="number" id="costo" name="costo" min="0" step="0.01" required>
      </div>

      <div class="botones">
        <input type="submit" value="Registrar" class="boton">
        <input type="reset" value="Limpiar" class="boton boton-claro">
      </div>
    </form>

<?php include "includes/footer.php"; ?>

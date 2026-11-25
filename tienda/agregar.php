<?php
$titulo = "Agregar producto - ElectroHogar";
include "includes/header.php";
?>
<section class="tarjeta">
    <h2>Agregar producto</h2>
    <p>Un solo formulario para registrar el producto y su proveedor.
       Si el ID de proveedor ya existe, el producto se asocia a ese proveedor.</p>

    <?php if (isset($_GET['msg'])): ?>
        <p class="mensaje"><?php echo htmlspecialchars($_GET['msg']); ?></p>
    <?php endif; ?>

    <form action="p_agregar.php" method="post" class="formulario">
        <fieldset>
            <legend>Datos del proveedor</legend>
            <p><label for="id_proveedor">ID proveedor:</label>
               <input type="number" id="id_proveedor" name="id_proveedor" min="1" required></p>
            <p><label for="nombre_proveedor">Nombre proveedor:</label>
               <input type="text" id="nombre_proveedor" name="nombre_proveedor" maxlength="100"
                      placeholder="Ej. Distribuidora Panamá S.A." required></p>
        </fieldset>

        <fieldset>
            <legend>Datos del producto</legend>
            <p><label for="descripcion">Descripción:</label>
               <input type="text" id="descripcion" name="descripcion" maxlength="150"
                      placeholder="Ej. Refrigeradora 18 pies" required></p>
            <p><label for="cantidad">Cantidad:</label>
               <input type="number" id="cantidad" name="cantidad" min="0" step="1" value="1" required></p>
            <p><label for="marca">Marca:</label>
               <input type="text" id="marca" name="marca" maxlength="50" placeholder="Ej. Samsung" required></p>
            <p><label for="costo">Costo (B/.):</label>
               <input type="number" id="costo" name="costo" min="0" step="0.01" required></p>
        </fieldset>

        <input type="submit" value="Registrar" class="btn">
        <input type="reset" value="Limpiar" class="btn btn-secundario">
    </form>
</section>
<?php include "includes/footer.php"; ?>

<?php
$titulo = "Inicio - ElectroHogar";
include "includes/header.php";
?>
<section class="tarjeta">
    <h2>Bienvenido</h2>
    <p>Sistema de gestión de productos de la tienda. Elija una opción:</p>
    <div class="opciones">
        <a class="opcion" href="acerca.php"><strong>1. Acerca de</strong><span>Conozca nuestro negocio</span></a>
        <a class="opcion" href="mostrar.php"><strong>2. Mostrar</strong><span>Consultar por marca o todos, actualizar y eliminar</span></a>
        <a class="opcion" href="agregar.php"><strong>3. Agregar</strong><span>Registrar un producto y su proveedor</span></a>
    </div>
</section>
<?php include "includes/footer.php"; ?>

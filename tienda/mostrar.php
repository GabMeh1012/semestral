<?php
$titulo = "Mostrar productos - ElectroHogar";
$pagina = "mostrar";
include "includes/conexion.php";
include "includes/funciones.php";
include "includes/header.php";

// 1. Obtener las marcas distintas para llenar el <select>
$marcas = $conn->query("SELECT DISTINCT marca FROM productos ORDER BY marca")->fetchAll(PDO::FETCH_COLUMN);

// 2. Marca seleccionada (por defecto: todos)
$marcaSel = isset($_GET['marca']) ? $_GET['marca'] : 'todos';

// 3. Consulta según la selección
if ($marcaSel == 'todos') {
    $sql = "SELECT p.*, pr.nombre_proveedor
            FROM productos p
            INNER JOIN proveedor pr ON p.id_proveedor = pr.id_proveedor
            ORDER BY p.id_producto";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
} else {
    $sql = "SELECT p.*, pr.nombre_proveedor
            FROM productos p
            INNER JOIN proveedor pr ON p.id_proveedor = pr.id_proveedor
            WHERE p.marca = :marca
            ORDER BY p.id_producto";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':marca' => $marcaSel]);
}
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <h2 class="titulo">Mostrar Productos</h2>

    <?php if (isset($_GET['msg'])): ?>
      <p class="mensaje"><?php echo htmlspecialchars($_GET['msg']); ?></p>
    <?php endif; ?>

    <!-- Formulario para filtrar por marca o todos -->
    <form action="mostrar.php" method="get" class="tarjeta filtro">
      <img src="img/corazon.svg" alt="" class="corazon">
      <label for="marca">Seleccione la marca:</label>
      <select name="marca" id="marca">
        <option value="todos">-- Todos --</option>
        <?php foreach ($marcas as $m): ?>
          <option value="<?php echo htmlspecialchars($m); ?>" <?php if ($m == $marcaSel) echo 'selected'; ?>>
            <?php echo htmlspecialchars($m); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <input type="submit" value="Buscar" class="boton">
    </form>

    <?php if (count($productos) == 0): ?>
      <p class="mensaje">No hay productos registrados para esta selección.</p>
    <?php endif; ?>

    <!-- Una tarjeta por producto -->
    <?php foreach ($productos as $prod): ?>
      <article class="tarjeta producto">
        <img src="img/corazon.svg" alt="" class="corazon">
        <img src="<?php echo icono($prod['descripcion']); ?>" alt="" class="dibujo">

        <div class="producto-info">
          <h3><?php echo htmlspecialchars($prod['descripcion']); ?></h3>
          <p>
            <span><strong>ID:</strong> <?php echo $prod['id_producto']; ?></span>
            <span><strong>Marca:</strong> <?php echo htmlspecialchars($prod['marca']); ?></span>
            <span><strong>Cantidad:</strong> <?php echo $prod['cantidad']; ?></span>
            <span><strong>Costo:</strong> B/. <?php echo number_format($prod['costo'], 2); ?></span>
          </p>
          <p>
            <span><strong>Proveedor:</strong>
              <?php echo $prod['id_proveedor'] . ' - ' . htmlspecialchars($prod['nombre_proveedor']); ?></span>
          </p>
        </div>

        <div class="producto-acciones">
          <a href="actualizar.php?id=<?php echo $prod['id_producto']; ?>" class="boton">Actualizar</a>
          <form action="eliminar.php" method="post" onsubmit="return confirm('¿Desea eliminar este producto?');">
            <input type="hidden" name="id_producto" value="<?php echo $prod['id_producto']; ?>">
            <input type="submit" value="Eliminar" class="boton boton-eliminar">
          </form>
        </div>
      </article>
    <?php endforeach; ?>

<?php include "includes/footer.php"; ?>

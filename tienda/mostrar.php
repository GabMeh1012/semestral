<?php
$titulo = "Mostrar productos - ElectroHogar";
include "includes/conexion.php";
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
<section class="tarjeta">
    <h2>Mostrar productos</h2>

    <?php if (isset($_GET['msg'])): ?>
        <p class="mensaje"><?php echo htmlspecialchars($_GET['msg']); ?></p>
    <?php endif; ?>

    <form action="mostrar.php" method="get" class="filtro">
        <label for="marca">Seleccione la marca:</label>
        <select name="marca" id="marca">
            <option value="todos">-- Todos --</option>
            <?php foreach ($marcas as $m): ?>
                <option value="<?php echo htmlspecialchars($m); ?>" <?php if ($m == $marcaSel) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($m); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Buscar" class="btn">
    </form>

    <?php if (count($productos) == 0): ?>
        <p>No hay productos registrados para esta selección.</p>
    <?php else: ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Marca</th>
            <th>Costo</th>
            <th>Proveedor</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $prod): ?>
        <tr>
            <td><?php echo $prod['id_producto']; ?></td>
            <td><?php echo htmlspecialchars($prod['descripcion']); ?></td>
            <td><?php echo $prod['cantidad']; ?></td>
            <td><?php echo htmlspecialchars($prod['marca']); ?></td>
            <td>B/. <?php echo number_format($prod['costo'], 2); ?></td>
            <td><?php echo $prod['id_proveedor'] . ' - ' . htmlspecialchars($prod['nombre_proveedor']); ?></td>
            <td class="acciones">
                <a class="btn btn-editar" href="actualizar.php?id=<?php echo $prod['id_producto']; ?>">Actualizar</a>
                <form action="eliminar.php" method="post" onsubmit="return confirm('¿Desea eliminar este producto?');">
                    <input type="hidden" name="id_producto" value="<?php echo $prod['id_producto']; ?>">
                    <input type="submit" value="Eliminar" class="btn btn-eliminar">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</section>
<?php include "includes/footer.php"; ?>

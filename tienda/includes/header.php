<?php
// Cada página define $titulo y $pagina antes de incluir este archivo.
// $pagina sirve para marcar en negrita la opción activa del menú.
if (!isset($pagina)) $pagina = '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($titulo) ? $titulo : 'ElectroHogar'; ?></title>

  <!-- Fuentes (si no hay internet se usan Verdana y Georgia) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600&family=Didact+Gothic&family=Hanken+Grotesk:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

  <header class="encabezado">
    <a href="index.php" class="logo">
      <img src="img/logo.svg" alt="Logo ElectroHogar">
      <span>ElectroHogar</span>
    </a>

    <nav class="menu">
      <a href="index.php"   <?php if ($pagina == 'inicio')  echo 'class="activo"'; ?>>INICIO</a>
      <a href="acerca.php"  <?php if ($pagina == 'acerca')  echo 'class="activo"'; ?>>ACERCA DE</a>
      <a href="mostrar.php" <?php if ($pagina == 'mostrar') echo 'class="activo"'; ?>>MOSTRAR</a>
      <a href="agregar.php" <?php if ($pagina == 'agregar') echo 'class="activo"'; ?>>AGREGAR</a>
    </nav>
  </header>

  <div class="ola"></div>

  <main class="contenedor">

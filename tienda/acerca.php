<?php
$titulo = "Acerca de - ElectroHogar";
$pagina = "acerca";
include "includes/header.php";
?>

    <section class="acerca">

      <!-- Fila 1: Acerca de nosotros -->
      <div>
        <h2 class="subtitulo">Acerca de Nosotros</h2>
        <p class="letras-grandes centrado">ElectroHogar</p>
      </div>

      <div class="tarjeta tarjeta-imagen">
        <img src="img/corazon.svg" alt="" class="corazon">
        <img src="img/refrigeradora.svg" alt="Refrigeradora" class="dibujo">
        <p><strong>ElectroHogar</strong> es una tienda dedicada a la venta de electrodomésticos
           para el hogar: refrigeradoras, lavadoras, microondas, televisores, aires
           acondicionados y pequeños aparatos de cocina.</p>
      </div>

      <!-- Fila 2: Misión (título a la derecha) -->
      <div class="derecha">
        <h2 class="subtitulo">Misión</h2>
        <p class="letras-grandes centrado">Calidad</p>
      </div>

      <div class="tarjeta tarjeta-imagen">
        <img src="img/corazon.svg" alt="" class="corazon">
        <img src="img/lavadora.svg" alt="Lavadora" class="dibujo">
        <p>Ofrecer electrodomésticos de calidad, de marcas reconocidas y a precios
           accesibles, brindando una atención cercana a cada cliente.</p>
      </div>

      <!-- Fila 3: Visión -->
      <div>
        <h2 class="subtitulo">Visión</h2>
        <p class="letras-grandes centrado">Confianza</p>
      </div>

      <div class="tarjeta tarjeta-imagen">
        <img src="img/corazon.svg" alt="" class="corazon">
        <img src="img/televisor.svg" alt="Televisor" class="dibujo">
        <p>Ser la tienda de electrodomésticos de referencia en el país por su
           variedad, servicio y confianza.</p>
      </div>

      <!-- Fila 4: ¿Qué ofrecemos? (título a la derecha) -->
      <div class="derecha">
        <h2 class="subtitulo">¿Qué ofrecemos?</h2>
        <p class="letras-grandes centrado">Garantía</p>
      </div>

      <div class="tarjeta tarjeta-imagen">
        <img src="img/corazon.svg" alt="" class="corazon">
        <img src="img/microondas.svg" alt="Microondas" class="dibujo">
        <ul>
          <li>Productos de marcas como Samsung, LG, Panasonic y Oster.</li>
          <li>Proveedores certificados.</li>
          <li>Garantía en todos nuestros productos.</li>
        </ul>
      </div>

    </section>

<?php include "includes/footer.php"; ?>

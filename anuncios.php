<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>


<main class="seccion contenedor">
  <h2>Casas y Depas en venta</h2>
  <?php
  $limites = 10;
  include 'includes/templates/anuncios.php';
  ?>

  <!--.contenedor-anuncios-->
</main>
<?php
incluirTemplate('footer')
?>
<?php
require 'includes/config/database.php';
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if (!$id) {
  header('Location: /');
}
$db = conectarDB();
$consulta = "SELECT * FROM propiedades WHERE id = $id";
$resultado = mysqli_query($db, $consulta);
$propiedad = mysqli_fetch_assoc($resultado);

if (!$propiedad) {
  header('Location: /');
}

if ($resultado->num_rows === 0) {
  header('Location: /');
}


require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
  <h1><?php echo $propiedad['titulo']; ?></h1>

  <picture>
    <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="Imagen de la propiedad" />
  </picture>

  <div class="resumen-propiedad">
    <p class="precio">$<?php echo $propiedad['precio']; ?></p>
    <ul class="iconos-caracteristicas">
      <li>
        <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy" />
        <p><?php echo $propiedad['wc']; ?></p>
      </li>
      <li>
        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy" />
        <p><?php echo $propiedad['estacionamiento']; ?></p>
      </li>
      <li>
        <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy" />
        <p><?php echo $propiedad['habitaciones']; ?></p>
      </li>
    </ul>

    <p>
      <?php echo $propiedad['descripcion']; ?>.
    </p>

  </div>
</main>
<?php
incluirTemplate('footer');
mysqli_close($db);
?>
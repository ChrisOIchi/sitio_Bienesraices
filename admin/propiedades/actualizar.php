<?php

require '../../includes/funciones.php';

$auth = estaAutenticado();
if (!$auth) {
  header('Location: /');
}

//Base de datos
require '../../includes/config/database.php';

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
  header('Location: /admin');
}


$db = conectarDB();

//obtener los datos de la propiedad
$consulta = "SELECT * FROM propiedades where id = {$id}";
$resultado = mysqli_query($db, $consulta);
$propiedad = mysqli_fetch_assoc($resultado);



//Consultar para obtener vendedores
$query = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $query);


//arreglo con mensajes de errores
$errores = [];


$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedor_id'];
$imagenPropiedad = $propiedad['imagen'];


//ejecutar el codigo despues de que el usuario envie el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // echo "<pre>";
  // var_dump(propiedad);
  // echo "</pre>";

  $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
  $precio = mysqli_real_escape_string($db, $_POST['precio']);
  $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
  $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
  $wc = mysqli_real_escape_string($db, $_POST['wc']);
  $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
  $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
  $creado = date('Y/m/d');

  //Asignar files hacia una variable
  $imagen = $_FILES['imagen'];


  if (!$titulo) {
    $errores[] = "Debes añadir un titulo";
  }

  if (!$precio) {
    $errores[] = "El precio es obligatorio";
  }

  if (strlen($descripcion) < 50) {
    $errores[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";
  }

  if (!$habitaciones) {
    $errores[] = "El número de habitaciones es obligatorio";
  }

  if (!$wc) {
    $errores[] = "El número de baños es obligatorio";
  }

  if (!$estacionamiento) {
    $errores[] = "El número de estacionamientos es obligatorio";
  }

  if (!$vendedorId) {
    $errores[] = "Elige un vendedor";
  }


  //Validar por tamaño (4mb maximo)
  $medida = 1000 * 1000 * 4;
  if ($imagen['size'] > $medida) {
    $errores[] = "La imagen es muy pesada";
  }

  $carpetaImagenes = '../../imagenes/';

  if (!is_dir($carpetaImagenes)) {
    mkdir($carpetaImagenes);
  }

  $nombreImagen = '';

  if (empty($imagen['name'])) {
    $nombreImagen = $propiedad['imagen'];
  } else {
    //Eliminar la imagen previa
    unlink($carpetaImagenes . $propiedad['imagen']);
    //Generar un nombre unico
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    //subir la imagen
    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
  }


  // echo "<pre>";
  // var_dump($errores);
  // echo "</pre>";
  // exit;

  //subida de archivos
  //Crear una carpeta




  //revisar que el arreglo de errores este vacio
  if (empty($errores)) {
    $query = "UPDATE propiedades SET titulo = '$titulo', precio = '$precio', imagen = 
    '$nombreImagen', descripcion = '$descripcion', habitaciones = $habitaciones, wc = $wc,
     estacionamiento = $estacionamiento, vendedor_id = $vendedorId where id = $id";




    // echo $query;


    $resultado = mysqli_query($db, $query);

    if ($resultado) {
      //redireccionar al usuario
      header('Location: /admin?resultado=2');
    } else {
      echo "Error";
    }
  }
}


//Insertar en la base de datos

incluirTemplate('header');
?>



<main class="contenedor seccion">
  <h1>Actualizar Propiedad</h1>
  <a href="/admin" class="boton boton-verde">Volver</a>

  <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
      <?php echo $error; ?>
    </div>
  <?php endforeach; ?>


  <form class="formulario" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>Información General</legend>

      <label for="titulo">Título:</label>
      <input type="text" id="titulo" name="titulo" placeholder="Título Propiedad" value="<?php echo $titulo ?> ">

      <label for="precio">Precio:</label>
      <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio ?>">

      <label for="imagen">Imagen:</label>
      <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

      <img src="/imagenes/<?php echo $imagenPropiedad; ?>" alt="" class="imagen-small">

      <label for="descripcion">Descripción:</label>
      <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>

    </fieldset>

    <fieldset>
      <legend>Información Propiedad</legend>

      <label for="habitaciones">Habitaciones:</label>
      <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej. 3" min="1" max="9" value="<?php echo $habitaciones ?>">

      <label for="wc">Baños:</label>
      <input type="number" id="wc" name="wc" placeholder="Ej. 3" min="1" max="9" value="<?php echo $wc ?>">

      <label for=" estacionamiento">Estacionamiento:</label>
      <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej. 3" min="1" max="9" value="<?php echo $estacionamiento ?>">

    </fieldset>

    <fieldset>
      <legend>Vendedor</legend>

      <select name="vendedor">
        <option value="">--Seleccione--</option>
        <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
          <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>">
            <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?>
          </option>
        <?php endwhile; ?>
      </select>

    </fieldset>

    <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">


  </form>

</main>
<?php
incluirTemplate('footer')
?>
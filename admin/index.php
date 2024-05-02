<?php

require '../includes/funciones.php';

$auth = estaAutenticado();
if (!$auth) {
    header('Location: /');
}



//importar la conexion
require '../includes/config/database.php';
$db = conectarDB();
//escribir query
$query = "SELECT * FROM propiedades";

//Consultar BD
$resultadoConsulta = mysqli_query($db, $query);

//importar los datos


//muestra mensaje condicional
$mensaje = $_GET['resultado'] ?? null;

//eliminar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        //eliminar el archivo
        $query = "SELECT imagen FROM propiedades WHERE id = $id";
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);
        unlink('../imagenes/' . $propiedad['imagen']);

        //eliminar el registro
        $query = "DELETE FROM propiedades WHERE id = $id";
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('Location: /admin?resultado=3');
        }
    }
}

//incluye el header
incluirTemplate('header');

?>
<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>

    <?php if (intval($mensaje) === 1) : ?>
        <p class="alerta exito">Creado Correctamente</p>
    <?php elseif (intval($mensaje) === 2) : ?>
        <p class="alerta exito">Actualizado Correctamente</p>
    <?php elseif (intval($mensaje) === 3) : ?>
        <p class="alerta exito">Eliminado Correctamente</p>
    <?php endif; ?>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde"> Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <!-- Aqui se van a mostrar los datos de la BD -->
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="" class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad['precio']; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar"></a>
                        </form>
                        <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>
<?php
//cerrar la conexion
mysqli_close($db);

incluirTemplate('footer')
?>
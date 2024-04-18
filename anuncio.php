<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
  <h1>Casa en venta frente al bosque</h1>

  <picture>
    <source srcset="build/img/destacada.webp" type="image/webp" />
    <source srcset="build/img/destacada.jpg" type="image/jpeg" />
    <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen de la propiedad" />
  </picture>

  <div class="resumen-propiedad">
    <p class="precio">$3,000,000</p>
    <ul class="iconos-caracteristicas">
      <li>
        <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy" />
        <p>3</p>
      </li>
      <li>
        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy" />
        <p>3</p>
      </li>
      <li>
        <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy" />
        <p>4</p>
      </li>
    </ul>

    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae
      eaque sit vitae, quia deleniti ab totam aliquam, id reiciendis ducimus
      unde vero saepe impedit nostrum quis rerum debitis. Accusamus,
      corporis. Lorem ipsum dolor sit amet consectetur adipisicing elit.
      Molestiae eaque sit vitae, quia deleniti ab totam aliquam, id
      reiciendis ducimus unde vero saepe impedit nostrum quis rerum debitis.
      Accusamus, corporis.
    </p>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, veniam.
      Praesentium error animi delectus quis mollitia natus veritatis
      recusandae! Officia quasi illum autem possimus fuga eum, est et ad
      accusamus.
    </p>
  </div>
</main>
<?php
incluirTemplate('footer')
?>
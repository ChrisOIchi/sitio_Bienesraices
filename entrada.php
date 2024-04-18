<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>


<main class="contenedor seccion contenido-centrado">
  <h1>Guía para la decoracion de tu hogar</h1>

  <picture>
    <source srcset="build/img/destacada2.webp" type="image/webp" />
    <source srcset="build/img/destacada2.jpg" type="image/jpeg" />
    <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la propiedad" />
  </picture>

  <p class="informacion-meta">
    Escrito el <span>20/10/2021</span> por: <span>Admin</span>
  </p>
  <div class="resumen-propiedad">
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
<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>


<main class="contenedor seccion">
  <h1>Conoce Sobre Nosotros</h1>

  <div class="contenido-nosotros">
    <div class="imagen">
      <picture>
        <source srcset="build/img/nosotros.webp" type="image/webp" />
        <source srcset="build/img/nosotros.jpg" type="image/jpeg" />
        <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros" />
      </picture>
    </div>
    <div class="texto-nosotros">
      <blockquote>25 Años de experiencia</blockquote>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae
        eaque sit vitae, quia deleniti ab totam aliquam, id reiciendis
        ducimus unde vero saepe impedit nostrum quis rerum debitis.
        Accusamus, corporis. Lorem ipsum dolor sit amet consectetur
        adipisicing elit. Molestiae eaque sit vitae, quia deleniti ab totam
        aliquam, id reiciendis ducimus unde vero saepe impedit nostrum quis
        rerum debitis. Accusamus, corporis.
      </p>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
        veniam. Praesentium error animi delectus quis mollitia natus
        veritatis recusandae! Officia quasi illum autem possimus fuga eum,
        est et ad accusamus.
      </p>
    </div>
  </div>
</main>

<section class="contenedor seccion">
  <h1>Más Sobre Nosotros</h1>

  <div class="iconos-nosotros">
    <div class="icono">
      <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy" />
      <h3>Seguridad</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia
        dignissimos eum maiores. Sequi harum, maxime sed sunt eaque, dolores
        nihil iusto facere ullam ipsum amet doloremque, impedit placeat
        veritatis tempore.
      </p>
    </div>

    <div class="icono">
      <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy" />
      <h3>Precio</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia
        dignissimos eum maiores. Sequi harum, maxime sed sunt eaque, dolores
        nihil iusto facere ullam ipsum amet doloremque, impedit placeat
        veritatis tempore.
      </p>
    </div>

    <div class="icono">
      <img src="build/img/icono3.svg" alt="Icono seguridad" loading="lazy" />
      <h3>A Tiempo</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia
        dignissimos eum maiores. Sequi harum, maxime sed sunt eaque, dolores
        nihil iusto facere ullam ipsum amet doloremque, impedit placeat
        veritatis tempore.
      </p>
    </div>
  </div>
</section>

<?php
incluirTemplate('footer')
?>
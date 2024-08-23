<?php
    require 'includes/funciones.php';

    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada.webp" 
            type="image/webp">

            <source srcset="build/img/destacada.jpg"
            type="image/jpeg">

            <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen de la Propiedad">
        </picture>
        
        <p class="informacion-meta">Escrito el: <span>20/10/2023</span> por: <span>Admin</span></p>

        <div class="resumen-propiedad">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi optio numquam laboriosam, fugiat corrupti, iste exercitationem suscipit ad quidem quo ratione officia itaque dolor animi reprehenderit quibusdam non sequi. Animi similique tempora, suscipit a quo deleniti! Ipsa, porro repudiandae? Animi dolor totam eius ut voluptate repellat, incidunt odio deleniti sapiente qui possimus quidem eum quos earum veniam eaque, laudantium placeat.</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut sint ipsum vel corrupti nobis unde quos voluptatem ab excepturi labore quaerat rem nihil in, distinctio, magnam esse incidunt tempora autem iure facere similique. Minima voluptate officia vero adipisci. Eveniet, cupiditate.</p>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>   
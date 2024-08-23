<?php
    require 'includes/app.php';

    incluirTemplate('header');
?>


    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" 
                    type="image/webp">

                    <source srcset="build/img/nosotros.jpg"
                    type="image/jpeg">
                
                    <img loading="lazy" src="build/img/imagen.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus repellendus magnam laboriosam autem voluptates voluptatum sunt, reiciendis adipisci nostrum alias? Distinctio, adipisci, impedit nisi corporis accusamus officia iure vero deserunt natus eum qui! Neque doloremque sequi qui, nisi veritatis, vero omnis eos fuga vitae nulla itaque praesentium error, eligendi dolores!</p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut sint ipsum vel corrupti nobis unde quos voluptatem ab excepturi labore quaerat rem nihil in, distinctio, magnam esse incidunt tempora autem iure facere similique. Minima voluptate officia vero adipisci. Eveniet, cupiditate.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt impedit praesentium accusamus porro maiores voluptatibus, soluta debitis odio. Dolor cum illum doloribus alias unde architecto.</p>
            </div><!-- .icono -->

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt impedit praesentium accusamus porro maiores voluptatibus, soluta debitis odio. Dolor cum illum doloribus alias unde architecto.</p>
            </div><!-- .icono -->

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt impedit praesentium accusamus porro maiores voluptatibus, soluta debitis odio. Dolor cum illum doloribus alias unde architecto.</p>
            </div><!-- .icono -->
        </div>
    </section>

<?php
    incluirTemplate('footer');
?>  
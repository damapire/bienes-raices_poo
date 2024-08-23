<?php
    require '../../includes/app.php';

    use App\Propiedad; 
    use App\Vendedor; 
    use Intervention\Image\ImageManagerStatic as Image;

    estaAutenticado();

    $propiedad = new Propiedad();// Inicializar en blanco todo

    // Consulta para obtener todos los vendedores
    $vendedores = Vendedor::all();

    // Arreglo con mensajes de errores
    $errores = Propiedad::getErrores();
    
    /* Ejecutar el código después de que el usuario envia el formulario */
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $propiedad = new Propiedad($_POST['propiedad']);

         /* Subida de archivos */

        // Generar un nombre unico
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

        // Setear la imagen
        // Realiza un resize a la imagen con intervention
        if($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);//cortar 800 de alto x 600 de ancho
            $propiedad->setImagen($nombreImagen);
        }

        //Validar
        $errores = $propiedad->validar();
    
        /* Revisar el arreglo de errores este vacío */
        if(empty($errores)) {
            // Crear carpeta para subir imagenes
            if(!is_dir(CARPETA_IMAGENES)) {
                mkdir($carpetaImagenes);
            }

            // Guarda la imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);

            // Guarda en la base de datos
            $propiedad->guardar();
        }
    }
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?= $error ?>
            </div>
        <?php endforeach; ?>

        <form action="/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data"><!-- enctype, habilitar la lectura de archivos en un formulario -->
           <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>  
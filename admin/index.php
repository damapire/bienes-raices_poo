<?php
    require '../includes/app.php';
    estaAutenticado();

    // Importar las clases
    use App\Propiedad;
    use App\Vendedor;

    // Implementar un método para obtener todas las propiedades
    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();

    // Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;// Busca el valor si no existe le asigna null

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validar id
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {
            $tipo = $_POST['tipo'];
            if(validarTipoContenido($tipo)) {
                // Compara lo que vamos a eliminar
                if($tipo === 'vendedor') {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                } else if($tipo === 'propiedad') {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }  
        }
    }

    // Incluye template
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raíces</h1>

        <?php
            $mensaje = mostrarNotificacion(intval($resultado));
            if($mensaje) { 
        ?>
                <p class="alerta exito"><?= s($mensaje); ?></p>
        <?php } ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
        <a href="/admin/vendedores/crear.php" class="boton boton-amarillo">Nuev@ Vendedor</a>
        <h2>Propiedades</h2>
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

            <tbody> <!-- 4.Mostrar los resultados -->

                <?php foreach( $propiedades as $propiedad ) : ?>
                <tr>
                    <td><?= $propiedad->id ?></td>
                    <td><?= $propiedad->titulo ?></td>
                    <td><img src="/imagenes/<?= $propiedad->imagen ?>" class="imagen-tabla"></td>
                    <td>$<?= $propiedad->precio ?></td>
                    <td>
                        <form class="w-100" method="POST">
                            <input type="hidden" name="id" value="<?= $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar"></input>
                        </form>

                        <a href="/admin/propiedades/actualizar.php?id=<?= $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

        <h2>Vendedores</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- 4.Mostrar los resultados -->

                <?php foreach( $vendedores as $vendedor ) : ?>
                <tr>
                    <td><?= $vendedor->id ?></td>
                    <td><?= $vendedor->nombre . " " . $vendedor->apellido ?></td>
                    <td><?= $vendedor->telefono ?></td>
                    <td>
                        <form class="w-100" method="POST">
                            <input type="hidden" name="id" value="<?= $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar"></input>
                        </form>

                        <a href="/admin/vendedores/actualizar.php?id=<?= $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </main>

<?php
    incluirTemplate('footer');
?>  
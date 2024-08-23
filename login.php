<?php
    require 'includes/app.php';
    $db = conectarDB();

    // Autenticar el usuario
    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) );
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email) {
            $errores[] = "El email es obligatorio o no es válido";
        }

        if(!$password) {
            $errores[] = "El password es obligatorio";
        }

        /* echo "<pre>";
        var_dump($errores);
        echo "</pre>"; */

        if(empty($errores)) {
            // Revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '$email'";
            $resultado = mysqli_query($db, $query);
            
            if( $resultado->num_rows ) { // Comprueba si hay resultados en una consulta
                // Revisar si el password es correcto   
                $usuario = mysqli_fetch_assoc($resultado);
                
                // Verificar si el password es correcto
                $auth = password_verify($password, $usuario['password']);// se pasa el password ingresado y se compara con el password de la base de datos, devuelve un bool

                if($auth) {
                    // El usuario esta autenticado
                    session_start();

                    // Llenar el arreglo de la sesión
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');
                } else {
                    $errores[] = "El password es incorrecto";
                }
            } else {
                $errores[] = "El usuario no existe";
            }
        }

    }

    // Incluye template
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?= $error ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario"> 
            <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-mail</label>
                <input name="email" type="email" placeholder="Tu email" id="email" required>

                <label for="password">Password</label>
                <input name="password" type="password" placeholder="Tu password" id="password" required>

                <input type="submit" value="Iniciar Sesión" class="boton boton-verde">

            </fieldset>
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>  
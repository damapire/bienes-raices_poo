<?php
    session_start();
    $_SESSION = [];// Reiniciar los valores, significa cerrar la sesión

    header('Location: /');
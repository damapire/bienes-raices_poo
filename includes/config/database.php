<?php

function conectarDB() : mysqli {
    // Obtener los valores de las variables de entorno
    $host = getenv('DB_HOST');
    $user = getenv('DB_USER');
    $password = getenv('DB_PASSWORD');
    $database = getenv('DB_NAME');

    // Conectar a la base de datos usando los valores de las variables de entorno
    $db = new mysqli($host, $user, $password, $database);

    if($db->connect_error) {
        echo "Error, no se pudo conectar: " . $db->connect_error;
        exit; // Detener la ejecución si hay un error de conexión
    }

    return $db;
}

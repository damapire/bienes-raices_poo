<?php

    function conectarDB() : mysqli {
        $db = new mysqli('localhost', 'root', 'root', 'bienesraices_crud');

        if(!$db) {
            echo "Error, no se puedo conectar";
            exit;// Si no se puedo conectar, detenemos la ejecución de la pagina para que no se releve información critica
        } 

        return $db;
    }
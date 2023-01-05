<?php

require './src/Roots.php';
require PATH_SRC . 'autoloader/Autoloader.php';
Autoloader::registrar();
$rutas = scandir(PATH_ROUTES); //El scandir lista los archivos que hay en la carpeta routes.

foreach($rutas as $archivo) { //Para importar los archivos que tenemos en routes
    $rutaArchivo = realpath(PATH_ROUTES . $archivo);
    if (is_file($rutaArchivo)){
        require $rutaArchivo;
    }
}

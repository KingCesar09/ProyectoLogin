<?php

class Route {
    public function __construct()
    {
        
    }

    private static $uris = array(); //uris es la variable en donde voy a registrar las url.

    public static function add($uri, $function = null){
        Route::$uris[] = new Uri($uri, $method, $function);
        //Retornar un middleware (seguridad)
         return;

    }


}
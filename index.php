<?php

//require_once './bin/conexion/Conexion.php';
//require_once './bin/persistencia/Crud.php';
//require_once './bin/persistencia/modelos/ModeloGenerico.php';
//require_once './bin/persistencia/modelos/Usuarios.php';
//require_once './bin/http/ControladorUsuarios.php';
//require_once './bin/constantes/EMensajes.php';
//require_once './bin/http/Respuesta.php';
//
//require_once './src/Roots.php';
//require_once PATH_SRC . 'autoloader/Autoloader.php';

/** Con este Autoloader tus clases (archivos .php) se impotarán automáticamente.
 * Solo debes tener encuenta que el nombre de la clase sea el mismo que el nombre 
 * del archivo.
 */
//Autoloader::registrar();

//$controladorUsuarios = new ControladorUsuarios();
//$respuesta = $controladorUsuarios->insertarUsuario([
//    "nombres" => "JJ2",
//    "edad" => 22,
//    "email" => "email3@gmail.com",
//    "asdfasfda" => "sdfasdfa"
//]);
//$usuario = [
//    "idUsuario" => 6,
//    "correo" => "correo@gmail.com",
//    "telefono" => "123456789"
//];
//$respuesta = $controladorUsuarios->actualizarUsuario($usuario);
//var_dump($respuesta);
//echo "<br/>";
//
//$respuesta = $controladorUsuarios->eliminarUsuario(6);
//var_dump($respuesta);
//echo "<br/>";
//$respuesta = $controladorUsuarios->buscarUsuarioPorId(6);
//var_dump($respuesta);
//echo "<br/>";

//$respuesta = $controladorUsuarios->listarUsuarios()->json();
//echo ($respuesta);

require_once './src/launcher.php';
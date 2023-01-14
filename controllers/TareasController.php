<?php

class TareasController {
    public function index() {
        //$tareas = Tarea::all();
        //var_dump($tareas);

        //$tarea = new Tarea();
        //$tarea->nombre = "Nombre tarea 4th";
        //$tarea->vencimiento = "2023-03-23";
        //$tarea->save();
        
        // $tarea = Tarea::find(4);
        // $tarea->nombre = "Nombre tarea 5th";
        // $tarea->vencimiento="2022-03-24";
        // $tarea->save();

        //$tarea = Tarea::find(8);
        //$tarea->remove();
        // $tareas= Tarea::all();
        // include_once "./views/tareas/index.php";

        $tareas = Tarea::all();
        view("tareas.index", ["tasks" => $tareas]);


        
    }

    public function create(){
        echo "Estamos en create";
        
        
    }


    // index  - Lista todos los elementos
    // show   - Mostrar un elemento específico por id
    // create - Crear un elemento
    // update - Editar un elemento
    // delete - Borrar un elemento

}
<?php
include_once 'controller/productoController.php';
include_once 'controller/usuarioController.php';
include_once 'config/parameters.php';
    
if(!isset($_GET['controller'])){
    header("Location:".base_url."producto/index");
}else{
    $nombre_controlador = $_GET['controller'].'Controller';
    //Si existe lo creo y genero su acción
    if(class_exists($nombre_controlador)){
        $controlador = new $nombre_controlador();

        //Si me pasan una acción la ejecuto y sino muestro
        //La acción por defecto (cada controlador tendrá una)
        if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
            $action = $_GET['action'];
        }else{
            $action = action_default;
        }

        $controlador->$action();
    }
}
?>
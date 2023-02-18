<?php

require_once 'modelo/Producto.php';
require_once 'modelo/Jamon.php';
require_once 'modelo/Bocadillo.php';

//Conexión a la base de datos
$db = new mysqli('localhost','root','','restaurante');
//Consulta SQL
$query = "SELECT * FROM producto";
//Ejecución de la consulta
$result = $db->query($query);
//Array para almacenar los objetos
$listaJamones = array();
$listaBocadillos = array();
//Recorremos cada fila de la consulta con un while
while ($producto = $result->fetch_assoc()) {    
    //Creación de un objeto para cada fila
    if($producto['id_categoria'] == "1"){
        $clave = 'pj'.$producto['id_producto'];
        $productoObj = new Jamon($producto['id_producto'],$producto["id_categoria"],null,$producto['nombre_producto'],$producto['precio_unidad'],$producto['ofertaactiva']);
        $listaJamones[$clave] = $productoObj;
    }else if($producto['id_categoria'] == "2"){
        $clave = 'pb'.$producto['id_producto'];
        $productoObj = new Bocadillo($producto['id_producto'],$producto["id_categoria"],null,$producto['nombre_producto'],$producto['precio_unidad'],$producto['ofertaactiva']);
        $listaBocadillos[$clave] = $productoObj;
    }
}
//Liberación de los recursos utilizados por la consulta
$result->free();
//Cerramos la conexión
$db->close();
//Devolvemos los arrays de objetos
return array($listaBocadillos, $listaJamones);
?>
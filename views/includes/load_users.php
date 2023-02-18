<?php
require_once 'modelo/Usuario.php';
//Conexión a la base de datos
$db = new mysqli('localhost','root','','restaurante');
//Consulta SQL
$query = "SELECT * FROM usuario";
//Ejecución de la consulta
$result = $db->query($query);
//Array para almacenar los objetos
$listaUsuarios = array();
//Recorremos cada fila de la consulta con un while
while ($user = $result->fetch_assoc()) {    
    //Creación de un objeto para cada fila
    $usuarioObj = new Usuario($user['id_usuario'],$user['correo'],$user['contrasena'],$user['nombre'],$user['apellidos'],$user['fecha_nacimiento'],$user['direccion'],$user['telefono'],$user['rol']);
    array_push($listaUsuarios, $usuarioObj);
}
//Liberación de los recursos utilizados por la consulta
$result->free();
//Cerramos la conexión
$db->close();
//Devolvemos los arrays de objetos
return array($listaUsuarios);
?>
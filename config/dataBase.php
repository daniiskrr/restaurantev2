<?php 
class DataBase{
    public static function connect($host='localhost',$user='root',$pwd='',$db='restaurante'){
        $conexion = new mysqli($host,$user,$pwd,$db);
        //Revisar la conexion
        if($conexion === false){
            die("ERROR: No se puede conectar. " . $conexion->connect_error);
        }
        return $conexion;
    }
}
?>
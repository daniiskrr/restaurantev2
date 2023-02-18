<?php
include_once './config/dataBase.php';

/*
//Metemos los bocadillos
$bocadillos = array( 0 => new Bocadillo(0,'Bocadillo','Bocadillo de Jamon Serrano',4.50,'NO'),
                        1 => new Bocadillo(1,'Bocadillo','Flautín de Jamón y queso',2.50,'SI'),
                            2 => new Bocadillo(2,'Bocadillo','Bocadillo de Jamon ibérico',6.50,'NO'),
                                3 => new Bocadillo(3,'Bocadillo','Jamon de bellota 100%',10,'SI'),
                                    4 => new Bocadillo(4,'Bocadillo','Bocadillo de jamón de cebo',8,'NO'),
                                        5 => new Bocadillo(5,'Bocadillo','Flauta de jamón ibérico',7,'SI'));
//Metemos los jamones
$jamones = array( 0 => new Jamon(0,'Pieza de Jamon','Bellota','Jamón de bellota 100% ibérico Gabriel Castaño',299,'NO'),
                    1 => new Jamon(1,'Pieza de Jamon','Iberico','Jamón de bellota 100% ibérico 5 Jotas',349,'NO'),
                        2 => new Jamon(2,'Taco de Jamon','Bellota','Taco de jamón de bellota 100% 1kg',149,'NO'),
                            3 => new Jamon(3,'Pieza de Jamon','Iberico','Jamón de Bellota Ibérico 100% 5J',239,'NO'),
                                4 => new Jamon(4,'Pieza de Jamon','Cebo','Jamón ibérico de Cebo 100% Jose Manuel',189,'NO'),
                                    5 => new Jamon(5,'Pieza de Jamon','Iberico','Jamón ibérico de Cebo 100% Enrique Tomas',129,'NO'),
                                        6 => new Jamon(6,'Pieza de Jamon','Serrano','Jamón Serrano de la Península',79,'NO'),
                                            7 => new Jamon(7,'Pieza de Jamon','Iberico','Jamón de Bellota Ibérico 50% 5J',89,'NO'),
                                                8 => new Jamon(8,'Pieza de Jamon','Iberico','Jamón de Bellota Ibérico 50% Jose Manuel',99,'NO'));
*/
class Meterbocadillos{
    /*
    public static function getAllByType($tipo){
        //Realizamos la conexion a la base de datos
        $conexion = DataBase::connect();
        //Creamos la consulta para obtener los productos por categoria
        $consultatipo = $conexion->prepare("SELECT * FROM PRODUCTO WHERE id_categoria=?");
        //Indicamos que el parámetro será un INT
        $consultatipo->bind_param("i",$tipo);
        //Ejecutamos la consulta
        $consultatipo->execute();
        $resultado=$consultatipo->get_result();
        $listaProductos = [];
        while($filaproductito = $resultado->fetch_assoc()){
            $producto = array();
            $producto['id_producto'] = $filaproductito['id_producto'];
            $producto['id_categoria'] = $filaproductito['id_categoria'];
            $producto['nombre_producto'] = $filaproductito['nombre_producto'];
            $producto['precio_unidad'] = $filaproductito['precio_unidad'];
            $producto['imagen'] = $filaproductito['imagen'];
            $producto['ofertaactiva'] = $filaproductito['ofertaactiva'];
            $listaProductos[] = $producto;
        }

        return $listaProductos;
    }
    */
    //funcion para obtener los valores del id del producto
    public static function getAllById($id){
        //Realizamos la conexion a la base de datos
        $conexion = DataBase::connect();
        //Creamos la consulta para obtener los productos por categoria
        $consultaid = $conexion->prepare("SELECT * FROM PRODUCTO WHERE id_producto=?");
        //Indicamos que el parámetro será un INT
        $consultaid->bind_param("i",$id);
        //Ejecutamos la consulta
        $consultaid->execute();
        $resultado=$consultaid->get_result();

        $listaProductos = [];
        while($filaproductito = $resultado->fetch_assoc()){
            $producto = array();
            $producto['id_producto'] = $filaproductito['id_producto'];
            $producto['id_categoria'] = $filaproductito['id_categoria'];
            $producto['nombre_producto'] = $filaproductito['nombre_producto'];
            $producto['precio_unidad'] = $filaproductito['precio_unidad'];
            $producto['imagen'] = $filaproductito['imagen'];
            $producto['ofertaactiva'] = $filaproductito['ofertaactiva'];
            $listaProductos[] = $producto;
        }

        return $listaProductos;
    }

    public static function deleteById($id){
        //Realizamos la conexion a la base de datos
        $conexion = DataBase::connect();
        //Creamos la consulta para obtener los productos por categoria
        $borrarproducto = $conexion->prepare("DELETE FROM PRODUCTO WHERE id_producto=?");
        //Indicamos que el parámetro será un INT
        $borrarproducto->bind_param("i",$id);
        //Ejecutamos la consulta
        $borrarproducto->execute();
        $conexion->close();
    }

    public static function addProducto($id_categoria,$nombre_producto,$precio_unidad,$ofertaactiva){
        //Realizamos la conexion a la base de datos
        $conexion = DataBase::connect();
        //Creamos la consulta para obtener los productos por categoria
        $anadirproducto = $conexion->prepare("INSERT INTO PRODUCTO (id_categoria,nombre_producto,precio_unidad,ofertaactiva) VALUES(?,?,?,?)");
        //Indicamos que el parámetro será un INT
        $anadirproducto->bind_param("isis",$id_categoria, $nombre_producto, $precio_unidad, $ofertaactiva);
        //Ejecutamos la consulta
        $anadirproducto->execute();
        $conexion->close();
        $productoanadido = Meterbocadillos::getAllByType($tipo);
        return $productoanadido;
    }
}
?>


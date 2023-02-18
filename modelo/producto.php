<?php
abstract class producto{
    private $id_producto;
    private $tipo_producto;
    private $precio_unidad;

    public function __construct($id_producto,$tipo_producto,$precio_unidad){
        $this->id_producto = $id_producto;
        $this->tipo_producto = $tipo_producto;
        $this->precio_unidad = $precio_unidad;
    }
   
    public function getId_producto()
    {
        return $this->id_producto;
    }

    public function setId_producto($id_producto)
    {
        $this->id_producto = $id_producto;
    }

    public function getTipo_producto()
    {
        return $this->tipo_producto;
    }

    public function setTipo_producto($tipo_producto)
    {
        $this->tipo_producto = $tipo_producto;

        return $this;
    }


    public function getPrecio_unidad()
    {
        return $this->precio_unidad;
    }

    public function setPrecio_unidad($precio_unidad)
    {
        $this->precio_unidad = $precio_unidad;
    }
    //Funcion para calcular el descuento del producto (20%) y mostrarlo el precio actualizado en la tienda
    public function precioConDescuento(){
        $descuento = $this->getPrecio_unidad();
        $calcularDescuento = $descuento * 0.80;
        return $calcularDescuento;
    }
}

?>
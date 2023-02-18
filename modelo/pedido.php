<?php

class pedido{
    public $producto;
    public $cantidad;

    public function __construct($producto){
        $this->producto = $producto;
        $this->cantidad = 1;
    }

    public function getProducto()
    {
        return $this->producto;
    }

    public function setProducto($producto)
    {
        $this->producto = $producto;
    }
 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    //Funcion para calcular el precio total de solo UN producto. obtendrá el precio por unidad del producto y lo multiplicará por la cantidad
    public function calculaPrecio(){
        $precio = $this->getProducto()->getPrecio_unidad();
        $total = $precio * $this->getCantidad();
        return $total;
    }
    //Funcion para calcular el descuento en caso de que el producto esté de oferta. Finalmente, sumará todos los descuentos para mostrar el descuento total en el carrito. 
   public static function calculaDescuento($productos){
        $descuentoTotal = 0;
        foreach ($productos as $producto){
            $cantidadProductos = 0;
            if($producto->getProducto()->getOferta()=="SI"){
                $descuento = $producto->getProducto()->getPrecio_unidad();
                $calcularDescuento = $descuento - ($descuento * 0.80);
                $cantidadProductos = $calcularDescuento * $producto->getCantidad();
            }
            $descuentoTotal += $cantidadProductos;
        }
        return $descuentoTotal;      
    }
}
?>
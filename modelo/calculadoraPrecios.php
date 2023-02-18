<?php
class calculadoraPrecios{

//funcion para calcular el precio total sumando el precio total de cada producto. Llamamos a la funcion calculaPrecio para tener el precio del producto junto a su cantidad calculado.
public static function calculaPrecioTotal($compra){
    $precioTotal= 0;
    foreach ($compra as $pedido){
        $precioUnidad = $pedido->calculaPrecio();
        $precioTotal += $precioUnidad;
    }
    return $precioTotal;
}
}
?>
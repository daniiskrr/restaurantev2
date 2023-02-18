<html>
    <body class="bg-black">
    <section id="carritocompra" class="mt-5">
    <h2 class="tituloh2 text-center fs-3 text-color1">PEDIDO COMPLETO</h2>
    <!-- Si el usuario entra en el carrito habiendo añadido previamente algun producto, mostrará los productos -->
    <?php if(!empty($ultimoPedido)){ ?>
    <div class="container-xxl">
        <div class="container-xxl ms-3 mt-5">
            <div class="row mt-5">
                <div class="col-3 col-xs-3">
                    <h2 class="fs-4 text-color1 titulocarrito">PRODUCTO</h2>
                </div>
            <div class="col-3 col-xs-3">
                <h2 class="fs-4 text-color1 titulocarrito">DESCRIPCION</h2>
            </div>
            <div class="col-3 col-xs-3 divtitulocarrito">
                <h2 class="fs-4 text-color1 titulocarrito">CANTIDAD</h2>
            </div>
            <div class="col-3 col-xs-3">
                <h2 class="fs-4 text-color1 titulocarrito">PRECIO</h2>
            </div>
        </div>
    </div>
    
    <?php
    //Mostramos los productos 
    foreach ($ultimoPedido as $clave => $pedido ){ ?>
    <div class="container-xxl">
        <div class="container-xxl ms-3 mt-5">
            <div class="row text-center">
                <div class="col-3 col-xs-3 mt-3">
                <img class="carritoimg" src="<?=base_url?>views/imagenes/<?=$clave?>.webp"/>
            </div>
            <div class="col-3 col-xs-3 text-center desccarrito">
                <p class="fs-5 carritodesc mt-3 text-color2"><?=$pedido->getProducto()->getNombre_producto()?></p>
            </div>
            <div class="col-3 col-xs-3">  
                <div class="divcarritocantidad2 col-3 col-xs-3 mt-3">
                <p class="text-color2 carritocantidad2"><?=$pedido->getCantidad()?></p>
                </div>
                </form>
            <div class="col-3 col-xs-3 text-center divpreciomovil2">
                <p class="text-color2 carritoprecio2"><?=$pedido->getProducto()->getPrecio_unidad()?>€</p>
            </div>
        </div>
    </div>
                <hr class="lineacarrito mt-5"></hr>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    </section>

    <div class="container-xxl text-center preciosmovil">
        <!-- Llamamos a la funcion calculaPrecioTotal para sumar los valores -->
        <?php $precioTotal = calculadoraPrecios::calculaPrecioTotal($ultimoPedido);?>
        <!-- Mostramos el precio total de los productos --> 
        <p class="fs-5 text-color2 textomovil">PRECIO TOTAL: <?php echo $precioTotal ?>€</p>
        <!-- Llamamos a la funcion calculaDescuento para que nos calcule el descuento en caso de haberlo --> 
        <?php $precioDescuento = pedido::calculaDescuento($ultimoPedido); ?>
        <!-- Mostramos el descuento total de los productos --> 
        <p class="fs-5 text-color2 textomovil">DESCUENTO:    <?php echo $precioDescuento ?>€</p> 
        <!-- Restamos el descuento al precio total para obtener el precio final -->
        <?php $precioPagar = $precioTotal - $precioDescuento; ?> 
        <!-- Mostramos el precio final -->
        <p class="fs-5 text-color2 textomovil">PRECIO FINAL: <?php echo $precioPagar ?>€</p> 
    </div>

    <!--En caso de no haber añadido aún nada al carrito, mostrará un mensaje y la posibilidad de ver el ultimo pedido realizado -->
    <?php }else{ ?>  
    <div class="container-xxl text-center" style="height: 400px">
    <p class="text-center text-color2 mt5 fs-3 noproducto">No has hecho ningún pedido</p>
    <button class="ultimopedido" type="submit"><a href="tienda.php">Ir a comprar</a></button>
    </div>
    <?php
    }
    ?>     
    </body>
</html>
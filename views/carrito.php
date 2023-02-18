<html>
    <body class="bg-black">
    <section id="carritocompra" class="mt-5">
    <h2 class="tituloh2 text-center fs-3 text-color1">CESTA DE LA COMPRA</h2>
    <!-- Si el usuario entra en el carrito habiendo añadido previamente algun producto, mostrará los productos -->
    <?php if(!empty($_SESSION["compra"])){ ?>
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
    //Mostramos los productos que se han añadido al array compra desde la tienda
    foreach ($_SESSION["compra"] as $clave => $pedido ){?>
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
                <div class="row"> 
                    <div class="col-4 col-xs-4 mt-3">
                        <form action=<?=base_url.'producto/carrito'?> method="post"> 
                            <input type="hidden" name="clave" value=<?=$clave?>>
                            <button class="carritoboton1" type="submit" name="del"> - </button>
                        </form>
                    </div>    
                    <div class="divcarritocantidad col-4 col-xs-4 mt-3">
                        <p class="text-color2 carritocantidad"><?=$pedido->getCantidad()?></p>
                    </div>
                    <div class="col-4 col-xs-4 mt-3">
                        <form action=<?=base_url.'producto/carrito'?> method="post"> 
                            <input type="hidden" name="clave" value=<?=$clave?>>
                            <input type="hidden" name="clave" value=<?=$clave?>>
                            <button class="carritoboton2" type="submit" name="add"> + </button>
                        </form>
                    </div> 
                </div>
            </div>
            <div class="col-3 col-xs-3 text-center divpreciomovil">
                <p class="text-color2 carritoprecio"><?=$pedido->getProducto()->getPrecio_unidad()?>€</p>
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
        <!-- Mostramos el precio total de los productos --> 
        <p class="fs-5 text-color2 textomovil">PRECIO TOTAL: <?php echo $precioTotal ?>€</p>
        <!-- Mostramos el descuento total de los productos --> 
        <p class="fs-5 text-color2 textomovil">DESCUENTO:    <?php echo $precioDescuento ?>€</p> 
        <!-- Mostramos el precio final -->
        <p class="fs-5 text-color2 textomovil">PRECIO FINAL: <?php echo $precioPagar ?>€</p>
        <form action=<?=base_url.'producto/pedidoConf'?> method="post"> 
            <button class="vermas" type="submit">Finalizar compra</button><br><br>
            <input type="hidden" name="accion" value="finalizar">
        </form>
        <form action=<?=base_url.'producto/pedidoConf'?> method="POST">
            <button class="vermas" type="submit">Ver último pedido</button>
            <input type="hidden" name="accion" value="ultimoPedido">
        </form>
        
    </div>

    <!--En caso de no haber añadido aún nada al carrito, mostrará un mensaje y la posibilidad de ver el ultimo pedido realizado -->
    <?php }else{ ?>  
    <div class="container-xxl text-center" style="height: 400px">
    <p class="text-center text-color2 mt5 fs-3 noproducto">Actualmente no hay nada en el carrito, prueba a añadir algo!</p>
    <form action=<?=base_url.'producto/pedidoConf'?> method="POST">
        <button class="vermas" type="submit">Ver último pedido</button>
        <input type="hidden" name="accion" value="ultimoPedido">
    </form>
    </div>
    <?php
    }

    ?> 
    </body>   
</html>
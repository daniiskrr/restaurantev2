<html>
    <body class="bg-black">
    
    <section id="banner_tienda" class="container-fluid">
        <div class="col-12 bannertienda">
        <div class="container-xxl mb-2">
          <h1 class="mb-5 text-color1 text-center fs-1">TIENDA</h1>
        </div>
        </div>
    </section>
    
    <section id="seccionjamones" class="container-xxl mt-5">
    <h2 class="tituloh2 text-center fs-3 text-color1">JAMONES</h2>
    <div class="row">
    <?php

    foreach ($listaJamones as $clave => $jamon){ 
        ?>
        <div class="articulomovil text-center col-xs-6 col-sm-4">
            <img class="productoimagen mt-4" src="<?= base_url ?>/views/imagenes/pj<?=$jamon->getId_producto()?>.webp" alt="<?=$jamon->getNombre_producto()?>" />
            <p class="fs-5 productodescripcion mt-2 mb-1 text-color2"><?=$jamon->getNombre_producto()?></p>
            <p class="fs-5 precio text-color2"><b><?=$jamon->getPrecio_unidad()?>€</b></p>
            <form action=<?=base_url.'producto/tienda'?> method="post">
                <input type="hidden" name="jamon" value=<?=$clave?>>
                <button class="vermas" type="submit"> Añadir a la cesta</button>
            </form>
        </div>
        <?php
        } 
        ?>
        </div>
    </section>

    <section id="seccionbocadillos" class="container-xxl mt-5">
    <h2 class="tituloh2 text-center fs-3 text-color1">BOCADILLOS</h2>
    <div class="row">
    <?php
    foreach ($listaBocadillos as $clave => $bocadillo){ ?>
    <div class="articulomovil text-center col-xs-6 col-sm-4">
        <img class="productoimagen mt-4" src="<?= base_url ?>/views/imagenes/pb<?=$bocadillo->getId_producto()?>.webp" alt="<?=$bocadillo->getNombre_producto()?>" />
        <p class="fs-5 productodescripcion2 mt-2 mb-1 text-color2"><?=$bocadillo->getNombre_producto()?></p>
        <p class="fs-5 precio text-color2"><b><?=$bocadillo->getPrecio_unidad()?>€</b></p>
        <form action=<?=base_url.'producto/tienda'?> method="post">
            <input type="hidden" name="bocadillo" value=<?=$clave?>>
            <button class="vermas" type="submit"> Añadir a la cesta</button>
        </form>
    </div>
    <?php
    } 
    ?>
    </div>
    </section>

    <section id="seccionofertas" class="container-xxl mt-5">
    <h2 class="tituloh2 text-center fs-3 text-color1">OFERTAS</h2>
    <div class="row">
    <?php
    //Mostramos todos los bocadillos que tengan en el campo oferta el valor SI con un bucle. Mostramos la foto, nombre de producto y precio junto a su correspondiente boton 
    //para añadirlo a la cesta. El precio sale con el descuento aplicado ya que llamamos a la función que calcula el descuento (precioConDescuento)
    foreach ($listaBocadillos as $clave => $bocadillo){ 
    if($bocadillo->getOferta() == 'SI'){
    ?>
    <div class="articulomovil text-center col-xs-6 col-sm-4">
        <img class="productoimagen mt-4" src="<?= base_url ?>/views/imagenes/pb<?=$bocadillo->getId_producto()?>.webp" alt="<?=$bocadillo->getNombre_producto()?>" />
        <p class="fs-5 productodescripcion2 mt-2 mb-1 text-color2"><?=$bocadillo->getNombre_producto()?></p>
        <p class="fs-5 precio text-color2"><b><?=$bocadillo->precioConDescuento()?>€</b></p>
        <form action=<?=base_url.'producto/tienda'?> method="post">
            <input type="hidden" name="bocadillo" value=<?=$clave?>>
            <button class="vermas" type="submit"> Añadir a la cesta</button>
        </form>
    </div>
    <?php 
    }
    }
    //Mostramos todos los bocadillos que tengan en el campo oferta el valor SI con un bucle. Mostramos la foto, nombre de producto y precio junto a su correspondiente boton 
    //para añadirlo a la cesta. El precio sale con el descuento aplicado ya que llamamos a la función que calcula el descuento (precioConDescuento)
    foreach ($listaJamones as $clave => $jamon){ 
    if($jamon->getOferta() == 'SI'){
    ?>
    <div class="articulomovil text-center col-xs-6 col-sm-4">
            <img class="productoimagen mt-4" src="<?= base_url ?>/views/imagenes/pj<?=$jamon->getId_producto()?>.webp" alt="<?=$jamon->getNombre_producto()?>" />
            <p class="fs-5 productodescripcion mt-2 mb-1 text-color2"><?=$jamon->getNombre_producto()?></p>
            <p class="fs-5 precio text-color2"><b><?=$jamon->precioConDescuento()?>€</b></p>
            <form action=<?=base_url.'producto/tienda'?> method="post">
                <input type="hidden" name="jamon" value=<?=$clave?>>
                <button class="vermas" type="submit"> Añadir a la cesta</button>
            </form>
        </div>
    <?php 
    }
    }
    ?>
    </div>
    </section>
    </body>
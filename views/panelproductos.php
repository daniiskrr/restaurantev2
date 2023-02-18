<html>
    <body class="bg-black">
    <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 'Admin') { ?>
    <section id="paneladmin" class="container-fluid">
        <div class="container-xxl mb-2">
          <h1 class="mt-5 text-color1 text-center fs-1">PANEL ADMINISTRADOR</h1>
        </div>
    </section>
    <section id="paneladmin" class="container-fluid">
        <div class="container-xxl mb-2">
          <h1 class="mt-5 text-color1 text-center fs-2">PRODUCTOS DE LA TIENDA</h1>
          <h2 class="mt-5 text-color1 text-center fs-2">JAMONES</h2>
        </div>
    </section>
    <div class="row mt-5">
      <div class="col">
      <h1 class="mt-5 text-color1 text-center fs-2">FOTO</h1>
      </div>
      <div class="col">
      <h1 class="mt-5 text-color1 text-center fs-2">NOMBRE DEL PRODUCTO</h1>
      </div>
      <div class="col">
      <h1 class="mt-5 text-color1 text-center fs-2">PRECIO</h1>
      </div>
      <div class="col">
      <h1 class="mt-5 text-color1 text-center fs-2">ACCIONES</h1>
      </div>
    </div>
    <!-- Mostramos los productos (jamones) -->
    <?php
    foreach ($listaJamones as $clave => $jamon){ 
       ?>
    <div class="row mt-5">
      <div class="col">
      <img class="productoimagen mt-4" src="<?= base_url ?>/views/imagenes/pj<?=$jamon->getId_producto()?>.webp" alt="<?=$jamon->getNombre_producto()?>" />
      </div>
      <div class="col">
        <p class="fs-5 productodescripcion2 text-color2"><?=$jamon->getNombre_producto()?></p>
      </div>
      <div class="col">
        <p class="fs-5 precio text-color2"><b><?=$jamon->getPrecio_unidad()?>€</b></p>
      </div>
      <div class="col">
      <form action=<?=base_url.'producto/modificaproducto'?> method="post">
            <input type="hidden" name="edita" value=<?=$jamon->getId_producto()?>>
            <button name="botonedita" class="edit-button">Editar</button>
      </form>
      <form action=<?=base_url.'producto/paneladmin'?> method="post">
            <input type="hidden" name="borra" value=<?=$jamon->getId_producto()?>>
            <button name="botonborra" class="delete-button">Borrar</button>
      </form>
      </div>
    </div>
    <?php
    } 
    ?>
    <!-- Mostramos los productos (bocadillos) -->
    <section id="paneladmin" class="container-fluid">
        <div class="container-xxl mb-2">
          <h2 class="mt-5 text-color1 text-center fs-2">BOCADILLOS</h2>
        </div>
    </section>
    <div class="row mt-5">
      <div class="col">
      <h1 class="mt-5 text-color1 text-center fs-2">FOTO</h1>
      </div>
      <div class="col">
      <h1 class="mt-5 text-color1 text-center fs-2">NOMBRE DEL PRODUCTO</h1>
      </div>
      <div class="col">
      <h1 class="mt-5 text-color1 text-center fs-2">PRECIO</h1>
      </div>
      <div class="col">
      <h1 class="mt-5 text-color1 text-center fs-2">ACCIONES</h1>
      </div>
    </div>
    <?php
    foreach ($listaBocadillos as $clave => $bocadillo){ 
       ?>
    <div class="row mt-4">
      <div class="col">
      <img class="productoimagen mt-4" src="<?= base_url ?>/views/imagenes/pb<?=$bocadillo->getId_producto()?>.webp" alt="<?=$bocadillo->getNombre_producto()?>" />
      </div>
      <div class="col">
        <p class="fs-5 productodescripcion2 text-color2"><?=$bocadillo->getNombre_producto()?></p>
      </div>
      <div class="col">
        <p class="fs-5 precio text-color2"><b><?=$bocadillo->getPrecio_unidad()?>€</b></p>
      </div>
      <div class="col">
      <form action=<?=base_url.'producto/modificaproducto'?> method="post">
            <input type="hidden" name="edita" value=<?=$bocadillo->getId_producto()?>>
            <button name="botonedita" class="edit-button">Editar</button>
      </form>
      <form action=<?=base_url.'producto/paneladmin'?> method="post">
            <input type="hidden" name="borra" value=<?=$bocadillo->getId_producto()?>>
            <button name="botonborra" class="delete-button">Borrar</button>
      </form>
      </div>
    </div>
    <?php
    } 
    ?>
<section id="paneladmin" class="container-fluid">
    <div class="container-xxl text-center mb-2">
    <form action=<?=base_url.'producto/addproducto'?> method="post">
    <input type="hidden" name="addproducto">
    <button class="anadirproducto">Añadir Producto</button>
    </form>
    </div>
</section>
<?php }else{ ?>
	<p class="text-center text-color2 mt-5 fs-3">Buen intento hacker, pero esto no te servirá contra mí</p>
	<p class="text-center text-color2 fs-3">Debes de ser admin para acceder a esto</p>
<?php } ?>
</body>
</html>
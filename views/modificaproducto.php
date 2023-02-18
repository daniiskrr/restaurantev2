<!DOCTYPE html PUBLIC>
<html>
<body class="bg-black">
<?php if($formularioactivo == 'Jamon'){ ?>
<section class="container-xxl text-center mt-5">
<h2 class="tituloh2 text-center container-xxl fs-3 text-color1">MODIFICAR PRODUCTO</h2>
<form class="form-registro" action="" name="actualizaproducto" method="post" enctype="multipart/form-data">
<label for="idproducto">ID del Producto: <?php echo $productito['id_producto']?></label>
<input type="hidden" name="idproducto" value="<?php echo $productito['id_producto']?>">
<label for="nota"><b>NOTA: La foto se llamara pj<?php echo $productito['id_producto']?></b></label>
<label for="imagen">Imagen Actual:</label>
<img class="productoimagen mt-4" src="<?= base_url ?>/views/imagenes/pj<?=$productito['id_producto']?>.webp" alt="<?=$productito['id_producto']?>" />
<label for="imagen">Imagen a reemplazar:</label>
<input type="file" name="imagen" id="imagen" class="campo-texto">
<label for="categoria">Categoría:</label>
<select name="categoria" id="categoria" class="desplegable" required>
  <option value="<?=$productito['id_categoria']?>"><?php echo $formularioactivo ?></option>
  <option value="2">Bocadillo</option>
</select>
<label for="nombre">Nombre de producto:</label>
<input type="text" name="nombre" id="nombre" class="campo-texto" value="<?=$productito['nombre_producto']?>" required>
<label for="precio">Precio por unidad:</label>
<input type="number" name="precio" id="precio" class="campo-texto" value="<?=$productito['precio_unidad']?>" required>
<label for="oferta">Oferta activa: (SI/NO) </label>
<input type="text" name="oferta" id="oferta" class="campo-texto" value="<?=$productito['ofertaactiva']?>" required>
<input type="hidden" name="actualizaproducto">
<button class="registro" name="actualizaproducto" type="submit"> Modificar producto </button>
</form>
</section>
<?php }else{ ?>
<section class="container-xxl text-center mt-5">
<h2 class="tituloh2 text-center container-xxl fs-3 text-color1">Añadir producto</h2>
<form class="form-registro" action="" name="registrar" method="post" enctype="multipart/form-data">
<label for="idproducto">ID del Producto: <?php echo $productito['id_producto']?></label>
<input type="hidden" name="idproducto" value="<?php echo $productito['id_producto']?>">
<label for="nota"><b>NOTA: La foto se llamara pb<?php echo $productito['id_producto']?></b></label>
<label for="imagenn">Imagen Actual:</label>
<img class="productoimagen mt-4" src="<?= base_url ?>/views/imagenes/pb<?=$productito['id_producto']?>.webp" alt="<?=$productito['id_producto']?>" />
<label for="imagenn">Imagen a reemplazar:</label>
<input type="file" name="imagen" id="imagen" class="campo-texto">
<label for="categoria">Categoría:</label>
<select name="categoria" id="categoria" class="desplegable" required>
  <option value="<?echo $productito['id_categoria']?>"><?php echo $formularioactivo ?></option>
  <option value="1">Jamon</option>
</select>
<label for="nombre">Nombre de producto:</label>
<input type="text" name="nombre" id="nombre" class="campo-texto" value="<?=$productito['nombre_producto']?>" required>
<label for="precio">Precio por unidad:</label>
<input type="number" name="precio" id="precio" class="campo-texto" value="<?=$productito['precio_unidad']?>" required>
<label for="oferta">Oferta activa: (SI/NO) </label>
<input type="text" name="oferta" id="oferta" class="campo-texto" value="<?=$productito['ofertaactiva']?>" required>
<input type="hidden" name="actualizaproducto">
<button class="registro" name="actualizaproducto" type="submit"> Modificar producto </button>
</form>
</section>
<?php } ?>
</body>
</html>
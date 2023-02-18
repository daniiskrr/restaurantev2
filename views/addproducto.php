<!DOCTYPE html PUBLIC>
<html>
<body class="bg-black">
<section class="container-xxl text-center mt-5">
<h2 class="tituloh2 text-center container-xxl fs-3 text-color1">AÑADIR PRODUCTO</h2>
<form class="form-registro" action="" name="registrar" method="post" enctype="multipart/form-data">
<label for="nota"><b>NOTA: Si añades un jamon, la foto se llamara pj<?php echo $nuevoproducto ?></b></label>
<label for="nota"><b>NOTA: Si añades un bocadillo, la foto se llamara pb<?php echo $nuevoproducto ?></b></label>
<label for="imagen">Imagen:</label>
<input type="file" name="imagen" id="imagen" class="campo-texto" required>
<label for="categoria">Categoría:</label>
<select name="categoria" id="categoria" class="desplegable" required>
  <option value="">Selecciona la categoria</option>
  <option value="1">Jamon</option>
  <option value="2">Bocadillo</option>
</select>
<label for="nombre">Nombre de producto:</label>
<input type="text" name="nombre" id="nombre" class="campo-texto" required>
<label for="precio">Precio por unidad:</label>
<input type="number" name="precio" id="precio" class="campo-texto" required>
<label for="oferta">Oferta activa:</label>
  <select name="oferta" id="oferta" class="desplegable" required>
    <option value="">Está en oferta?</option>
    <option value="SI">Si</option>
    <option value="NO">No</option>
  </select>
<input type="hidden" name="anadirproducto">
<button class="registro" name="anadirproducto" type="submit"> Añadir producto </button>
</form>
</section>
</body>
</html>
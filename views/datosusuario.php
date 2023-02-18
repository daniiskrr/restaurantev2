<!DOCTYPE html PUBLIC>
<html>
<body class="bg-black">
<section class="container-xxl text-center mt-5">
<h2 class="tituloh2 text-center container-xxl fs-3 text-color1">MODIFICAR MIS DATOS</h2>
<form class="form-registro" action="<?= base_url ?>producto/datosusuario" name="registrar" method="post">
  <label>Email</label>
  <input type="email" name="email" value="<?=$_SESSION['usuario']['correo']?>" required>
  <label>Contraseña</label>
  <input type="password" name="password">
  <label>Nombre</label>
  <input type="text" name="nombre" value="<?=$_SESSION['usuario']['nombre']?>" required>
  <label>Apellidos</label>
  <input type="text" name="apellidos" value="<?=$_SESSION['usuario']['apellidos']?>" required>
  <label>Fecha de nacimiento (YYYY-MM-DD)</label>
  <input type="text" name="fecha" value="<?=$_SESSION['usuario']['fecha_nacimiento']?>" required>
  <label>Dirección</label>
  <input type="text" name="direccion" value="<?=$_SESSION['usuario']['direccion']?>" required>
  <label>Telefono</label>
  <input type="text" name="telefono" value="<?=$_SESSION['usuario']['telefono']?>" required>
  <button class="registro" name="modificar" type="submit"> Modificar </button>
</form>
</section>
<section class="container-xxl text-center mt-5">
<h2 class="tituloh2 text-center container-xxl fs-3 text-color1">MIS PEDIDOS</h2>
</section>
<?php if (mysqli_num_rows($resultado) > 0){ ?>
  <?php foreach ($resultado as $fila) { ?>
    <div class="pedido-container">
      <h1 class="mt-5 text-color1 text-center fs-2">NUMERO DE PEDIDO (<?php echo $fila['id_pedido']; ?>)</h1>
      <div class="column">
        <h2 class="mt-5 text-color1 text-center fs-2">DATOS DEL PEDIDO</h2>
        <p class="fs-5 text-color2 text-center">Fecha del pedido: <?php echo $fila['fecha_pedido']; ?></p>
        <p class="fs-5 text-color2 text-center">Tipo de pago: <?php echo $fila['tipo_pago']; ?></p>
        <p class="fs-5 text-color2 text-center">Precio del pedido: <?php echo $fila['precio_pedido'] . '€';?></p>
        <p class="fs-5 text-color2 text-center">Descuento total: <?php echo $fila['descuento_total'] . '€'; ?></p>
        <p class="fs-5 text-color2 text-center">Precio total: <?php echo $fila['precio_total'] . '€'; ?></p>
        <hr>
      </div>
    </div>
  <?php } ?>
  
<?php }else{ ?>
  <p class="fs-5 text-color2 text-center">Aún no has hecho ningún pedido</p>
<?php } ?>


</body>
</html>
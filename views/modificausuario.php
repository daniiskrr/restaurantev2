<!DOCTYPE html PUBLIC>
<html>
<body class="bg-black">
<section class="container-xxl text-center mt-5">
<h2 class="tituloh2 text-center container-xxl fs-3 text-color1">MODIFICAR DATOS DE USUARIO</h2>
<form class="form-registro" action="" name="registrar" method="post">
  <input type="hidden" name="id_usuario" value="<?php echo $usuarioo['id_usuario']?>">
  <label>Email</label>
  <input type="email" name="email" value="<?php echo $usuarioo['correo']?>" required>
  <label>Contraseña</label>
  <input type="password" name="password" value="">
  <label>Nombre</label>
  <input type="text" name="nombre" value="<?php echo $usuarioo['nombre']?>" required>
  <label>Apellidos</label>
  <input type="text" name="apellidos" value="<?php echo $usuarioo['apellidos']?>" required>
  <label>Fecha de nacimiento (YYYY-MM-DD)</label>
  <input type="text" name="fecha" value="<?php echo $usuarioo['fecha_nacimiento']?>" required>
  <label>Dirección</label>
  <input type="text" name="direccion" value="<?php echo $usuarioo['direccion']?>" required>
  <label>Telefono</label>
  <input type="text" name="telefono" value="<?php echo $usuarioo['telefono']?>" required>
  <label>Rol (Usuario/Admin)</label>
  <select name="rol" id="rol" class="desplegable">
    <option value="<?php echo $usuarioo['rol']?>">Selecciona el rol</option>
    <option value="Usuario">Usuario</option>
    <option value="Admin">Admin</option>
  </select>
  <button class="registro" name="actualizausuario" type="submit"> Modificar </button>
</form>
</body>
</html>
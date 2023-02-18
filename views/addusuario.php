<!DOCTYPE html PUBLIC>
<html>
<body class="bg-black">
<section class="container-xxl text-center mt-5">
<h2 class="tituloh2 text-center container-xxl fs-3 text-color1">REGISTRAR USUARIO</h2>
<form class="form-registro" action="" name="registrar" method="post">
  <label>Email</label>
  <input type="email" name="email" required>
  <label>Contraseña</label>
  <input type="password" name="password" required>
  <label>Vuelve a introducir la contraseña</label>
  <input type="password" name="password2" required>
  <label>Nombre</label>
  <input type="text" name="nombre" required>
  <label>Apellidos</label>
  <input type="text" name="apellidos" required>
  <label>Fecha de nacimiento (YYYY-MM-DD)</label>
  <input type="text" name="fecha" required>
  <label>Dirección</label>
  <input type="text" name="direccion" required>
  <label>Telefono</label>
  <input type="text" name="telefono" required>
  <label>Rol (Usuario/Admin)</label>
  <select name="rol" id="rol" class="desplegable" required>
    <option value="">Selecciona el rol</option>
    <option value="Usuario">Usuario</option>
    <option value="Admin">Admin</option>
  </select>
  <input type="hidden" name="botonregistro">
  <button class="registro" name="registro" type="submit"> Registrar Usuario </button>
</form>
</section>
</body>
</html>
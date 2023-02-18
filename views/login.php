<!DOCTYPE html PUBLIC>
<html>
<body class="bg-black">
<section id="login" class="container-xxl text-center mt-5">
<h2 class="tituloh2 text-center container-xxl fs-3 text-color1">INICIAR SESION</h2>
<form class="form-login" action="" name="iniciar" method="post">
  <label>Email</label>
  <input type="email" name="email" required>
  <label>Contraseña</label>
  <input type="password" name="password" required>
  <input type="hidden" name="botoninicio">
  <button class="login" name="inicio" type="submit"> Iniciar Sesion</button><br>
  <p class="fs-5">No estas registrado? <a class="enlacearegistro" href="<?= base_url ?>usuario/registro"><b>Registrarse</b></a></p>
</form>
</section>
</body>
</html>
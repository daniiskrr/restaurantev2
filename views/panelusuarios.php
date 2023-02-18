<html>
<body class="bg-black"> 
    <section id="paneladmin" class="container-fluid">
        <div class="container-xxl mb-2">
          <h1 class="mt-5 text-color1 text-center fs-1">PANEL ADMINISTRADOR</h1>
        </div>
    </section>
    <section id="paneladmin" class="container-fluid">
        <div class="container-xxl mb-2">
          <h1 class="mt-5 text-color1 text-center fs-2">USUARIOS</h1>
        </div>
    </section>
<!-- Mostramos los usuarios -->
<section class="user-info">
<?php foreach ($listaUsuarios as $user) { ?>
  <div class="columnita">
  <h1 class="mt-5 text-color1 text-center fs-2">USUARIO</h1>
    <p class="fs-5 text-color2"><?php echo $user->getCorreo(); ?></p>
  </div>
  <div class="columnita">
  <h1 class="mt-5 text-color1 text-center fs-2">DATOS DEL USUARIO</h1>
    <p class="fs-5 text-color2">Nombre: <?php echo $user->getNombre(); ?></p>
    <p class="fs-5 text-color2">Apellidos: <?php echo $user->getApellidos(); ?></p>
    <p class="fs-5 text-color2">Fecha de nacimiento: <?php echo $user->getFecha_nacimiento(); ?></p>
    <p class="fs-5 text-color2">Dirección: <?php echo $user->getDireccion(); ?></p>
    <p class="fs-5 text-color2">Teléfono: <?php echo $user->getTelefono(); ?></p>
    <p class="fs-5 text-color2">Rol: <?php echo $user->getRol(); ?></p>
  </div>
  <div class="columnita">
  <h1 class="mt-5 text-color1 text-center fs-2">ACCIONES</h1>
    <form action="<?=base_url.'usuario/modificausuario'?>" method="post">
            <input type="hidden" name="edita" value=<?=$user->getId_usuario()?>>
            <button name="botonedita" class="edit-button">Editar</button>
    </form>
      <form action=<?=base_url.'usuario/paneladmin'?> method="post">
            <input type="hidden" name="borra" value=<?=$user->getId_usuario()?>>
            <button name="botonborra" class="delete-button">Borrar</button>
      </form>
  </div>
<?php } ?>
</section>
<section id="paneladmin" class="container-fluid">
    <div class="container-xxl text-center mb-2">
    <form action=<?=base_url.'usuario/addusuario'?> method="post">
    <input type="hidden" name="addusuario">
    <button class="anadirproducto">Añadir Usuario</button>
    </form>
    </div>
</section>
</body>
</html>

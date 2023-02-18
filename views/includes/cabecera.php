<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbars/">
    <link href="<?= base_url ?>assets/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url ?>assets/full_estil.css" rel="stylesheet" type="text/css" media="screen">
    <script src="<?= base_url ?>assets/js/bootstrap.bundle.min.js"></script>
    <title><?= $titulo ?></title>
</head>
<header>
  <nav class="navbar navbar-expand-lg bg-white">
    <div class="container-xxl">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand text-color1" href="<?= base_url ?>producto/index"><img class="logotipo" src="<?= base_url ?>views/imagenes/logotipo.svg" width="244" height="126" ></a>  
                
      <div id="botones_tienda_smartphone">
        <?php if(isset($_SESSION['usuario'])){ ?>
          <!-- Si el usuario inicia sesión -->
          <a href="<?= base_url ?>usuario/datosusuario" id="datosusuario" name="datosusuario" class="me-3 "><img src="<?= base_url ?>views/imagenes/iconologin.svg" alt=""></a>
          <a href="<?= base_url ?>usuario/adiosusuario" id="adiosusuario" name="adiosusuario" class="me-3 ">
            <img src="<?= base_url ?>views/imagenes/exitlogin.svg" alt="">
          </a>
        <?php } else { ?>
          <!-- Mostrar elementos del menú para usuario sin sesión iniciada -->
          <a href="<?= base_url ?>usuario/login" id="login" class="me-3 "><img src="<?= base_url ?>views/imagenes/iconologin.svg" alt=""></a>
        <?php } ?>
        <a href="<?= base_url ?>producto/carrito"><img src="<?= base_url ?>views/imagenes/iconocarrito.svg" alt=""></a>
      </div>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= base_url ?>producto/index">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url ?>producto/sobrenosotros">Sobre Nosotros</a>
          </li>
          <li class="nav-item dropdown tiendaBoton">
            <a class="nav-link dropdown-toggle active" href="<?= base_url ?>producto/tienda">Tienda</a>
            <ul class="dropdown-menu mostrar">
              <li><a class="dropdown-item" href="<?= base_url ?>producto/tienda#seccionjamones">Jamones</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?= base_url ?>producto/tienda#seccionbocadillos">Bocadillos</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?= base_url ?>producto/tienda#seccionofertas">Ofertas</a></li>
            </ul>
          </li>
          <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 'Admin') { ?>
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url ?>producto/paneladmin">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url ?>usuario/paneladmin">Usuarios</a>
          </li>  
          <?php } ?>
        </ul>
        <div id="botones_tienda_escritorio" class="form-inline my-2 my-lg-0">
        <?php if(isset($_SESSION['usuario'])){ ?>
          <!-- Si el usuario inicia sesión -->
          <a href="<?= base_url ?>usuario/datosusuario" id="datosusuario" name="datosusuario" class="me-3 "><img src="<?= base_url ?>views/imagenes/iconologin.svg" alt=""></a>
          <a href="<?= base_url ?>usuario/adiosusuario" id="adiosusuario" name="adiosusuario" class="me-3 ">
            <img src="<?= base_url ?>views/imagenes/exitlogin.svg" alt="">
          </a>
        <?php } else { ?>
          <!-- Mostrar elementos del menú para usuario sin sesión iniciada -->
          <a href="<?= base_url ?>usuario/login" id="login" class="me-3 "><img src="<?= base_url ?>views/imagenes/iconologin.svg" alt=""></a>
        <?php } ?>
          <a href="<?= base_url ?>producto/carrito"><img src="<?= base_url ?>views/imagenes/iconocarrito.svg" alt=""></a>
        </div>
      </div>
    </div>
  </nav>
</header>

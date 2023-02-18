<?php
class usuarioController{
    public static function index(){
        
        $titulo = "Inicio";
        session_start();

        require_once 'views/includes/cabecera.php';
        require_once 'views/index.php';
        require_once 'views/includes/footer.php';
    }
    public static function registro(){
        $titulo = 'Registro';

        session_start();

        if (isset($_POST['registro'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $password_encriptada = password_hash($password, PASSWORD_BCRYPT);
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $fecha = $_POST['fecha'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $conexion = DataBase::connect();
            $consulta = "SELECT * FROM usuario WHERE correo = '$email'";
            $resultado = mysqli_query($conexion, $consulta);
            if (mysqli_num_rows($resultado) > 0) {
            // El correo ya está registrado, muestra un mensaje de error
            echo "<script>alert('Este correo ya esta registrado');</script>";
            }else{
              if($password == $password2){
                $consulta2 = "INSERT INTO usuario (correo, contrasena, nombre, apellidos, fecha_nacimiento, direccion, telefono, rol) VALUES ('$email', '$password_encriptada', '$nombre', '$apellidos', '$fecha', '$direccion', '$telefono','Usuario')";
                // Ejecutar la consulta
                if (mysqli_query($conexion, $consulta2)) {
                  echo "<script>alert('Te has registrado con éxito');</script>";
                  header('Location: http://localhost/restaurante/usuario/login');
                } else {
                  echo "<script>alert('Algo salió mal!');</script>";
              }
              }else{
                echo "<script>alert('Las contraseñas no coinciden');</script>";
              }
            }
        }
        require_once 'views/includes/cabecera.php';
        require_once 'views/registro.php';
        require_once 'views/includes/footer.php';
    }

    public static function login(){

        $titulo = 'Iniciar Sesión';

        if(isset($_POST['inicio'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $conexion = DataBase::connect();
            $consulta = "SELECT * FROM usuario WHERE correo='$email'";
            $resultado = mysqli_query($conexion, $consulta);
            if(mysqli_num_rows($resultado) > 0){
              $usuario = mysqli_fetch_assoc($resultado);
              if(password_verify($password, $usuario['contrasena'])){
                // Usuario y contraseña correctos
                session_start();
                $_SESSION['usuario'] = $usuario;
                header('Location: http://localhost/restaurante/producto/index');
              } else{
                // Contraseña incorrecta
                echo "<script>alert('Contraseña incorrecta');</script>";
              }
            } else{
              // Usuario no encontrado
              echo "<script>alert('Usuario no encontrado');</script>";
            }
          }

          require_once 'views/includes/cabecera.php';
          require_once 'views/login.php';
          require_once 'views/includes/footer.php';
    }

    public static function datosusuario(){
        $titulo = 'Sobre mi';

        session_start();

        if (isset($_POST["modificar"])){
            $id_usuario = $_SESSION['usuario']['id_usuario']; //para la consulta
            $email = $_POST["email"];
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $fecha = $_POST["fecha"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            if (!(empty($_POST["password"]))){ // verificar si se proporcionó una nueva contraseña
                $password = $_POST["password"];
                $password_encriptada = password_hash($password, PASSWORD_DEFAULT); // encriptar la nueva contraseña
                $conexion = DataBase::connect();
                $consulta = "UPDATE usuario SET correo='$email', contrasena='$password_encriptada', nombre='$nombre', apellidos='$apellidos', fecha_nacimiento='$fecha', direccion='$direccion', telefono='$telefono' WHERE id_usuario=$id_usuario";
                $resultado = mysqli_query($conexion, $consulta);
            }else{                    
            $conexion = DataBase::connect();
            $consulta = "UPDATE usuario SET correo='$email', nombre='$nombre', apellidos='$apellidos', fecha_nacimiento='$fecha', direccion='$direccion', telefono='$telefono' WHERE id_usuario=$id_usuario";
            $resultado = mysqli_query($conexion, $consulta);
            }
            // Actualizamos la sesión ACTUAL con los nuevos valores del usuario para que pueda ver los valores actualizados
            $_SESSION['usuario']['correo'] = $email;
            $_SESSION['usuario']['nombre'] = $nombre;
            $_SESSION['usuario']['apellidos'] = $apellidos;
            $_SESSION['usuario']['fecha_nacimiento'] = $fecha;
            $_SESSION['usuario']['direccion'] = $direccion;
            $_SESSION['usuario']['telefono'] = $telefono;
        }
        //Visualizar pedidos del usuario
        $conexion2 = DataBase::connect();
        $id_usuario = $_SESSION['usuario']['id_usuario'];
        $consulta2 = "SELECT * FROM pedido WHERE id_usuario = '$id_usuario'";
        $resultado = mysqli_query($conexion2, $consulta2); 
        require_once 'views/includes/cabecera.php';
        require_once 'views/datosusuario.php';
        require_once 'views/includes/footer.php';
    }
    
    public static function adiosusuario(){

        session_start();
        session_destroy();
        
        header('Location: http://localhost/restaurante/usuario/login');
    }
    
    public static function paneladmin(){
      $titulo = 'Panel de Productos';

      session_start();
      require_once 'views/includes/load_users.php';
      require_once 'modelo/usuario.php';

      //Isset para detectar si el usuario le ha dado al botón borrar
      if (isset($_POST["borra"])){
        $idborrar = $_POST["borra"];
        $conexion = DataBase::connect();
        $consulta = "DELETE FROM usuario WHERE id_usuario = $idborrar";
        $result = mysqli_query($conexion, $consulta);
        header('Location: http://localhost/restaurante/usuario/paneladmin');
    }

      require_once 'views/includes/cabecera.php';
      require_once 'views/panelusuarios.php';
      require_once 'views/includes/footer.php';
    }

    public static function addusuario(){

      $titulo = 'Añadir Usuario';
      
      session_start();

      //El formulario se envía
      if (isset($_POST['registro'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $password_encriptada = password_hash($password, PASSWORD_BCRYPT);
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $fecha = $_POST['fecha'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $rol = $_POST['rol'];
        $conexion = DataBase::connect();
        $consulta = "SELECT * FROM usuario WHERE correo = '$email'";
        var_dump($consulta);
        $resultado = mysqli_query($conexion, $consulta);
        if (mysqli_num_rows($resultado) > 0) {
        // El correo ya está registrado, muestra un mensaje de error
        echo "<script>alert('Este correo ya esta registrado');</script>";
        }else{
          if($password == $password2){
            $consulta2 = "INSERT INTO usuario (correo, contrasena, nombre, apellidos, fecha_nacimiento, direccion, telefono, rol) VALUES ('$email', '$password_encriptada', '$nombre', '$apellidos', '$fecha', '$direccion', '$telefono','$rol')";
            // Ejecutar la consulta
            if (mysqli_query($conexion, $consulta2)) {
              echo "<script>alert('Te has registrado con éxito');</script>";
              header('Location: http://localhost/restaurante/usuario/paneladmin');
            } else {
              echo "<script>alert('Algo salió mal!');</script>";
          }
          }else{
            echo "<script>alert('Las contraseñas no coinciden');</script>";
          }
        }
    }
      require_once 'views/includes/cabecera.php';
      require_once 'views/addusuario.php';
      require_once 'views/includes/footer.php';
  }

  public static function modificausuario(){
    $titulo = 'Modificar Usuario';
    session_start();
    //Para obtener los valores del usuario gracias al ID y meterlos en los value del form
    if (isset($_POST["botonedita"])){
        $numeritousuario = $_POST["edita"];
        $conexion = DataBase::connect();
        $consulta = "SELECT * FROM usuario where id_usuario=$numeritousuario";
        $result = mysqli_query($conexion, $consulta);
        // Obtener los datos de la fila devuelta por la consulta
        $usuarioo = mysqli_fetch_assoc($result);
    }
    if (isset($_POST["actualizausuario"])){
        $id_usuario = $_POST["id_usuario"];
        $email = $_POST["email"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $fecha = $_POST["fecha"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $rol = $_POST["rol"];
        if (!(empty($_POST["password"]))){ // verificar si se proporcionó una nueva contraseña
            $password = $_POST["password"];
            $password_encriptada = password_hash($password, PASSWORD_DEFAULT); // encriptar la nueva contraseña
            $conexion = DataBase::connect();
            $consulta = "UPDATE usuario SET correo='$email', contrasena='$password_encriptada', nombre='$nombre', apellidos='$apellidos', fecha_nacimiento='$fecha', direccion='$direccion', telefono='$telefono', rol='$rol' WHERE id_usuario=$id_usuario";
            $resultado = mysqli_query($conexion, $consulta);
        }else{                    
        $conexion = DataBase::connect();
        $consulta = "UPDATE usuario SET correo='$email', nombre='$nombre', apellidos='$apellidos', fecha_nacimiento='$fecha', direccion='$direccion', telefono='$telefono', rol='$rol' WHERE id_usuario=$id_usuario";
        $resultado = mysqli_query($conexion, $consulta);
        var_dump($resultado);
        }
    } 
    require_once 'views/includes/cabecera.php';
    require_once 'views/modificausuario.php';
    require_once 'views/includes/footer.php';
}


}
?>
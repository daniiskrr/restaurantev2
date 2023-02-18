<?php
include "config/dataBase.php";
class productoController{
    /* FUNCIÓN PRINCIPAL DEL CONTROLADOR DE PRODUCTOS (index.php)*/
    public static function index(){
        
        $titulo = "Inicio";
        session_start();

        require_once 'views/includes/cabecera.php';
        require_once 'views/index.php';
        require_once 'views/includes/footer.php';
        ?>
        <!-- Pequeña sección con JS para poder ejecutar el video con la imagen en vista previa encima -->
        <script>
        function playVideo() {
        var video = document.querySelector('video');
        var previewImage = document.querySelector('.preview-image');
        video.play();
        previewImage.style.display = 'none';
        }
        </script>
        <?php
    }
    /* FUNCIÓN PARA LA PÁGINA SOBRENOSOTROS (sobrenosotros.php)*/
    public static function sobrenosotros(){
        
        $titulo = "Sobre Nosotros";
        session_start();
        require_once 'views/includes/cabecera.php';
        require_once 'views/sobrenosotros.php';
        require_once 'views/includes/footer.php';
    }
    /* FUNCIÓN PARA LA TIENDA (tienda.php)*/
    public static function tienda(){

        require_once 'views/includes/load_objects.php';
        require_once 'modelo/pedido.php';
        $titulo = "Tienda";

        session_start();
        //Verifica si la variable de sesión "compra" está definida
        if(isset($_SESSION['compra'])){ 
            //Verifica si se ha seleccionado un bocadillo
            if(isset($_POST['bocadillo'])){ 
                $productoSel = $listaBocadillos[$_POST['bocadillo']]; //Obtiene el producto seleccionado
                $clave = $_POST['bocadillo']; //Obtiene la clave del producto seleccionado
            //Verifica si se ha seleccionado un jamón
            }else if(isset($_POST['jamon'])){ 
                $productoSel = $listaJamones[$_POST['jamon']]; //Obtiene el producto seleccionado
                $clave = $_POST['jamon']; //Obtiene la clave del producto seleccionado
            }
    //Verifica si el producto seleccionado está definido
    if(isset($productoSel)){   
        //Verifica si el usuario no tiene la sesión iniciada
        if (!isset($_SESSION['usuario'])) { 
            unset($_SESSION['compra']); //Borra la variable de sesión "compra"
            header('Location: http://localhost/restaurante/producto/login'); //Redirige al usuario a la pantalla de login para poder hacer pedidos
        } else {
            //Verifica si el producto ya existe en el carrito
            if(isset($_SESSION['compra'][$clave])){ 
                $_SESSION['compra'][$clave]->cantidad++; //Incrementa la cantidad del producto en el carrito
            } else {
                $pedido = new pedido($productoSel); //Crea un objeto "pedido" con el producto seleccionado
                $_SESSION['compra'][$clave] = $pedido; //Agrega el objeto "pedido" al carrito
            }
        }
    }
} else {
    $_SESSION['compra'] = array(); //Crea un array vacío si la variable de sesión "compra" no está definida
}

        require_once 'views/includes/cabecera.php';
        require_once 'views/tienda.php';
        require_once 'views/includes/footer.php';
    }
     /* FUNCIÓN PARA LA PÁGINA DEL CARRITO (carrito.php)*/
    public static function carrito(){
        
        require_once 'modelo/Producto.php';
        require_once 'modelo/Jamon.php';
        require_once 'modelo/Bocadillo.php';
        require_once 'modelo/pedido.php';
        require_once 'modelo/calculadoraPrecios.php';

        $titulo = "Carrito";

        session_start();

        if (isset($_SESSION['inicio']) && (time() - $_SESSION['inicio'] > 90)) {
            unset($_SESSION['compra']);
            echo '<script>alert("Por inactividad, te hemos borrado los productos. Puedes volver a añadir lo que necesites.")</script>';
        }else{
            $_SESSION['inicio'] = time();
        }
        
        //si detecta que el usuario le da al boton - y solo hay 1 unidad en el carrito, eliminará el producto del array compra. 
        //En el caso que la cantidad no sea 1, restará -1 a la cantidad
        if(isset($_POST['del'])){
            $pedidoSel = $_SESSION["compra"][$_POST['clave']];
            if($pedidoSel->getCantidad() == 1) {
                unset($_SESSION["compra"][$_POST['clave']]);
            }else{
                $pedidoSel->setCantidad($pedidoSel->getCantidad() - 1);
            }
        //si detecta que el usuario le da al boton +, añadira el producto al array compra y añadirá la posición del producto. 
        //Añadirá +1 en la cantidad del producto 
        }else if(isset($_POST['add'])){
            $pedidoSel = $_SESSION["compra"][$_POST['clave']];
            $pedidoSel->setCantidad($pedidoSel->getCantidad() + 1);
        }

        if(isset($_SESSION["compra"])){
        //Llamamos a la funcion calculaPrecioTotal para sumar los valores
        $precioTotal = calculadoraPrecios::calculaPrecioTotal($_SESSION["compra"]);
        //Llamamos a la funcion calculaDescuento para que nos calcule el descuento en caso de haberlo
        $precioDescuento = pedido::calculaDescuento($_SESSION["compra"]);
        //Restamos el descuento al precio total para obtener el precio final
        $precioPagar = $precioTotal - $precioDescuento;
        }


        require_once 'views/includes/cabecera.php';
        require_once 'views/carrito.php';
        require_once 'views/includes/footer.php';
    }
     /* FUNCIÓN PARA LA PÁGINA ÚLTIMO PEDIDO/PEDIDO FINALIZADO (pedidoconfirmado.php)*/
    public static function pedidoConf(){
        require_once 'modelo/Producto.php';
        require_once 'modelo/Jamon.php';
        require_once 'modelo/Bocadillo.php';
        require_once 'modelo/pedido.php';
        require_once 'modelo/calculadoraPrecios.php';

        $titulo = "Pedido Confirmado";

        session_start();
        
        
        //Insertamos pedido en la base de datos el pedido del usuario
        if(isset($_SESSION['compra'])){
            $conexion = DataBase::connect();

            $precioTotal = calculadoraPrecios::calculaPrecioTotal($_SESSION["compra"]);
            $precioDescuento = pedido::calculaDescuento($_SESSION["compra"]);
            $precioPagar = $precioTotal - $precioDescuento;

            $usuario = $_SESSION["usuario"]["id_usuario"];

            $consulta = "INSERT INTO pedido (id_usuario,fecha_pedido,tipo_pago,precio_pedido,descuento_total,precio_total) VALUES('$usuario',NOW(),'Targeta','$precioTotal','$precioDescuento','$precioPagar')";
            $resultado = mysqli_query($conexion, $consulta);
        }

        $ultimoPedido = null;

        //Si el usuario le ha dado a finalizar pedido, los productos se almacenaran en la variable $ultimoPedido
        //y se creará la cookie con el nombre ultimoPedido y tebdrá los valores del array de la sesion compra
        //Los valores se convierten en String porque sino la cookie no funciona
        if(isset($_POST["accion"])){   
            if($_POST["accion"] == "finalizar"){
                $ultimoPedido = $_SESSION["compra"];
                setcookie("ultimoPedido",serialize($_SESSION["compra"]),time() + 60);
                //Ya que se ha finalizado el pedido, la sesion con los productos será destruida, así no siguen apareciendo en el carrito
                unset($_SESSION["compra"]);
            }else{

                if(isset($_COOKIE["ultimoPedido"])){
                    $ultimoPedido = unserialize($_COOKIE["ultimoPedido"]);
                }
            }    
        }
        require_once 'views/includes/cabecera.php';
        require_once 'views/pedidoconfirmado.php';
        require_once 'views/includes/footer.php';
    }
    /* FUNCIÓN PARA EL PANEL DE PRODUCTOS, DONDE SE PODRÁ VISUALIZAR, MODIFICAR O BORRAR LOS DATOS DE LOS PRODUCTOS (panelproductos.php) */
    public static function paneladmin(){
        $titulo = 'Panel de Productos';

        session_start();
        require_once 'views/includes/load_objects.php';
        require_once 'modelo/pedido.php';
        //Isset para detectar si el usuario le ha dado al botón borrar y elimina el producto de la base de datos
        if (isset($_POST["borra"])){
            $idborrar = $_POST["borra"];
            $conexion = DataBase::connect();
            $consulta = "DELETE FROM producto WHERE id_producto = $idborrar";
            $result = mysqli_query($conexion, $consulta);
            $ruta_almacenamiento = 'D:\xampp\htdocs\restaurante\views\imagenes\pb' . $_POST["borra"] . '.webp'; //para bocadiilos
            $ruta_almacenamiento2 = 'D:\xampp\htdocs\restaurante\views\imagenes\pj' . $_POST["borra"] . '.webp'; //para jamones
            if (file_exists($ruta_almacenamiento)) {
                unlink($ruta_almacenamiento);
            }
            if (file_exists($ruta_almacenamiento2)) {
                unlink($ruta_almacenamiento2);
            }
            header('Location: http://localhost/restaurante/producto/paneladmin');
        }
        require_once 'views/includes/cabecera.php';
        require_once 'views/panelproductos.php';
        require_once 'views/includes/footer.php';
    }
        /* FUNCIÓN PARA AÑADIR PRODUCTOS (addproducto.php) */
    public static function addproducto(){

        $titulo = 'Añadir Producto';
        
        //Mostrar el siguiente ID para poner la foto con el nombre correcto
        $conexion = DataBase::connect();
        $consulta = "SELECT id_producto FROM producto ORDER BY id_producto DESC LIMIT 1";
        $result = mysqli_query($conexion, $consulta);
        $nuevoproducto = array();
        while ($fila = mysqli_fetch_assoc($result)) {
          $nuevoproducto = $fila;
        }
        $nuevoproducto = intval(array_pop($nuevoproducto));
        $nuevoproducto++;

        //El formulario se envía y hace el insert correspondiente del producto a la base de datos
        if (isset($_POST["anadirproducto"])) {
            $categoria = $_POST["categoria"];
            $nombre = $_POST["nombre"];
            $precio = $_POST["precio"];
            $oferta = $_POST["oferta"];
            if(isset($_FILES['imagen'])){
                $nombre_archivo = $_FILES['imagen']['name'];
                $tipo_archivo = $_FILES['imagen']['type'];
                $tamano_archivo = $_FILES['imagen']['size'];
                $ruta_almacenamiento = 'D:\xampp\htdocs\restaurante\views\imagenes\\' . $nombre_archivo;          
                $ruta_temporal = $_FILES['imagen']['tmp_name'];
                if (!move_uploaded_file($ruta_temporal, $ruta_almacenamiento)) {
                    echo "Error al subir la imagen.";
                }
            }
            $conexion = DataBase::connect();
            $consulta2 = "INSERT INTO producto (id_categoria, nombre_producto, precio_unidad, ofertaactiva) VALUES ('$categoria','$nombre','$precio','$oferta')";
            $result = mysqli_query($conexion, $consulta2);
            header('Location: http://localhost/restaurante/producto/paneladmin');
        }
        require_once 'views/includes/cabecera.php';
        require_once 'views/addproducto.php';
        require_once 'views/includes/footer.php';
    }
    /* FUNCIÓN PARA MODIFICAR PRODUCTOS (modificaproducto.php) */
    public static function modificaproducto(){
        $titulo = 'Modificar Producto';
        session_start();

        //Para obtener los valores del producto gracias al ID y meterlos en los value del form
        if(isset($_POST["botonedita"])){
            $numeritoproducto = $_POST["edita"];
            $formularioactivo;
            $conexion = DataBase::connect();
            $consulta = "SELECT * FROM producto where id_producto=$numeritoproducto";
            $result = mysqli_query($conexion, $consulta);
            // Obtener los datos de la fila devuelta por la consulta
            $productito = mysqli_fetch_assoc($result);
            //Para obtener un formulario u otro
            if ($productito['id_categoria'] == 1){
                $formularioactivo = 'Jamon';
            }else{
                $formularioactivo = 'Bocadillo';
            }
        }
        //Si el usuario le da al botón del formulario, se recogen los valores nuevos (o existentes) del usuario y se introducen en la base de datos 
        if (isset($_POST["actualizaproducto"])){
            $id_producto = $_POST["idproducto"];
            $categoria = $_POST["categoria"];
            $nombre = $_POST["nombre"];
            $precio = $_POST["precio"];
            $oferta = $_POST["oferta"];
            $conexion = DataBase::connect();
            $consulta2 = "UPDATE producto SET id_categoria='$categoria', nombre_producto='$nombre', precio_unidad='$precio', ofertaactiva='$oferta' WHERE id_producto=$id_producto";
            $result2 = mysqli_query($conexion, $consulta2);
            if(isset($_FILES['imagen'])){
                $nombre_archivo = $_FILES['imagen']['name'];
                $tipo_archivo = $_FILES['imagen']['type'];
                $tamano_archivo = $_FILES['imagen']['size'];
                $ruta_almacenamiento = 'D:\xampp\htdocs\restaurante\views\imagenes\\' . $nombre_archivo;          
                $ruta_temporal = $_FILES['imagen']['tmp_name'];
                if (file_exists($ruta_almacenamiento)) {
                    unlink($ruta_almacenamiento);
                }
                if (!move_uploaded_file($ruta_temporal, $ruta_almacenamiento)) {
                    echo "Error al subir la imagen.";
                }
            }
            header('Location: http://localhost/restaurante/producto/paneladmin');
        }        

        require_once 'views/includes/cabecera.php';
        require_once 'views/modificaproducto.php';
        require_once 'views/includes/footer.php';
    }
}
?>
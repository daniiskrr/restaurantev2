    <body class="bg-black">
   <!-- BANNER PRINCIPAL -->
    <section id="banner_principal" class="container-fluid">
        <div class="col-12 banner">
        <div class="container-xxl mb-2">
          <h1 class="mb-5 ms-5 text-color1 fs-1">Date un capricho con el mejor <br> jamón de la península</h1>
        </div>
        </div>
    </section>
        <!-- PRIMERA SECCION -->
    <section class="seccionvideo container-xxl mt-5">
    <h2 class="tituloh2 text-center fs-3 text-color1">VIDEO PROMOCIONAL</h2>
        <div class="video mt-4">
        <video controls>
            <source src="<?= base_url ?>views/video/videopromocional.mp4" type="video/mp4">
        </video>
        <img src="<?= base_url ?>views/imagenes/logotipo2.svg" alt="Vista previa del video" class="preview-image" onclick="playVideo()">
        </div>
    </section>
    <!-- SEGUNDA SECCION (PORQUE COMPRAR?) -->
    <section id="quiensomos" class="container-xxl mt-5">
        <h2 class="tituloh2 text-center fs-3 text-color1">PORQUE COMPRAR?</h2>
        <div class="container-xxl row ms-3 mt-5">
            <div class="col-12 col-sm-6 mt-2">
                <img class="iconito ms-2" src="<?= base_url ?>views/imagenes/jamon.svg">
                <h2 class="fs-4 text-color1 ladoimagen">EL MUNDO DEL JAMÓN NUESTRA PASIÓN</h2>
                <p class="fs-5 text-color2 ladoimagen2">El jamón ibérico se obtiene de los cuartos traseros del cerdo y la paleta de las patas delanteras y eso repercute en el tamaño. </p>
            </div>

            <div class="col-12 col-sm-6 mt-2">
                <img class="iconito ms-2" src="<?= base_url ?>views/imagenes/cesta.svg">
                <h2 class="fs-4 text-color1 ladoimagen">COMPRAR JAMÓN CON TODA CONFIANZA</h2>
                <p class="fs-5 text-color2 ladoimagen2">Ponemos a su disposición esta tienda online donde puede hacer su compra desde su casa, usando su teléfono u ordenador. </p>
            </div>

            <div class="col-12 col-sm-6 mt-2">
                <img class="iconito ms-2" src="<?= base_url ?>views/imagenes/calidad.svg">
                <h2 class="fs-4 text-color1 ladoimagen">LAS MEJORES PALETILLAS DE JAMÓN</h2>
                <p class="fs-5 text-color2 ladoimagen2">Las paletas de bellota ibérica que tenemos proceden de las patas delanteras del cerdo y son de las casas más conocidas. </p>
            </div>

            <div class="col-12 col-sm-6 mt-2">
                <img class="iconito ms-2" src="<?= base_url ?>views/imagenes/amigos.svg">
                <h2 class="fs-4 text-color1 ladoimagen">CALIDAD ALTA Y PRECIO ECONÓMICO</h2>
                <p class="fs-5 text-color2 ladoimagen2_2"> Si el jamón y la paletilla son tus comidas favoritas y buscas un producto gourmet, te encuentras en el lugar para hacerlo. </p>
            </div>
        </div>
    </section>
    <!-- TERCERA SECCION (PRODUCTOS DESTACADOS) -->
    <section id="productosdestacados" class="container-xxl mt-5">
    <div class="container-xxl productos ms-3 mt-5">
    <h2 class="tituloh2 text-center fs-3 text-color1">PRODUCTOS DESTACADOS</h2>
        <div class="container-xxl row producto ms-3 mt-5">
            <div class="text-center col-xs-12 col-sm-4">
                <img class="productoimg" src="<?= base_url ?>views/imagenes/pj14.webp">
                <p class="fs-5 descripcion mt-2 text-color2"> Jamón de Bellota <br> Ibérico 100% 5J</p>
                <p class="fs-5 precio text-color2"><b>239€</b></p>
            </div>
            <div class="text-center col-xs-12 col-sm-4">
                <img class="productoimg" src="<?= base_url ?>views/imagenes/pj11.webp">
                <p class="fs-5 descripcion mt-2 text-color2"> Jamón ibérico de Cebo <br> 100% Jose Manuel</p>
                <p class="fs-5 precio text-color2"><b>189€</b></p>
            </div>
            <div class="text-center col-xs-12 col-sm-4">
                <img class="productoimg" src="<?= base_url ?>views/imagenes/pj12.webp">
                <p class="fs-5 descripcion mt-2 text-color2"> Jamón ibérico de<br>Cebo 100%</p>
                <p class="fs-5 precio text-color2"><b>129€</b></p>
            </div>
            <div class="botoninicio text-center mt-5">
            <button class="vermas" type="submit"><a href="<?= base_url ?>producto/tienda">Ver Más</a></button>
            </div>
        </div>
    </div>
    </section>
    </body>
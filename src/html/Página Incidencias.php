<?php
/* Comprobar que hay una sesión creada y que contiene un campo 'user' */
session_start();

if (isset($_SESSION['user'])) {
    // si no existe redirigir al login
    $json = json_encode($_SESSION ['user']);
    $data = json_decode($json, true);
    if ($data['idRol'] != 3) {
        header('Location: ../');
    }
} else {
    header('Location: ../');
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidencias</title>
    <link rel="stylesheet" type="text/css" href="../css/DashboardAdminMovil.css">
    <link rel="stylesheet" href="../css/header2.css ">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" href="../css/PaginaIncidencias.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/PaginaIncidencias.css">


</head>
<body>

<header class="Encabezado" role="banner">
    <!-- Esto es el encabezado que actuará de banner-->
    <nav id="menu"><a id="Logo" href="../index.html"><img src="../img/logo.svg"
                                                          alt="Logo de la empresa"></a>
        <!-- Enlace a la página index.html, imagen de logo en la ruta especificada y alt = alternativa -->
        <div id="contenedorContenedorDesktop">
            <div id="separador"></div>
            <div id="contenedorMenuDesktop">
                <ul id="menuDesktop">
                    <li><a href="../index.html">Inicio</a></li>
                    <li><a href="perfil.php">Mi perfil</a></li>
                    <li><a onclick="logout()" href="#">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>

        <ul id="menuDesplegable">
            <li><a href="../index.html">Inicio</a></li>
            <li><a href="perfil.php">Mi perfil</a></li>
            <li><a onclick="logout()" href="#">Cerrar sesión</a></li>
        </ul>


        <div id="iconosBanner">
            <a id="Login" href="Login.html"><img id="iconoLogin" src="../img/perfilLogin.svg" alt="Perfil Log In"></a>
            <div class="hamburguesa">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </nav>
</header>


<section>
    <div id="Bienvenido"><h1 class="BienvenidoJL">Bienvenido Técnico</h1></div>
    <div id="contenedor">
        <div id="anuncio-incidencias">
            <p id="NumerodeIncidencias">Número de Incidencias: <b class="cantidad" id="cantidad"></b></p>
        </div>

    <!-- Elemento que contiene el pop-up -->
    <div id="popUpBox">
        <!-- Contenido del pop-up -->
        <div class="popUpContent">
            <div class="información">
                <h1 class="tituloIncidencia" id="tituloAveria"></h1>
               <div id="averiaInfo">
                   <p id="nombreUsuario">Nombre del Usuario: Joselito Manuel<p id="Cliente"></p></p>
                   <p id="textoIdUsuario">ID Usuario : #00103<p id="idUsuario"></p></p>
                   <p id="dirección">Dirección : Paseo Enrique, 7, 7º C<p id="direcciónUsuario"></p></p>
                   <p id="textoIdHuerto">ID Huerto : #003<p id="idHuerto"></p></p>
                   <p id="textoIdSensor">ID Sensor : #0304<p id="idSensor"></p></p>
                   <p id="textoIdSonda">Tipo <p id="idSonda"></p></p>
                   <p id="textoTipoIncidencia"></p>


               </div>
            </div>

        </div>
        <!-- Icono de cerrar -->
        <span id="closeIcon">
                                <div class="BotonX">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-x-square"
                                         viewBox="0 0 16 16">
                                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </span>
    </div>
        <!--Aquí van las incidencias-->

</section>

<script src="../js/cerrarSesion.js"></script>
<script src="../js/TecnicoBBDD.js"></script>
<script src="../js/Página%20Incidencias.js"></script>
<script src="Página%20Incidencias.js"></script>
<script src="../js/menu.js"></script>
<script src="../js/cerrarSesion.js"></script>
</body>
</html>
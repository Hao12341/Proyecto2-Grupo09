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
    <link rel="stylesheet" href="PaginaIncidencias.css">

    <link rel="stylesheet" type="text/css" href="../css/DashboardAdminMovil.css">
    <link rel="stylesheet" href="../css/header2.css ">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" href="../css/PaginaIncidencias.css">
    <link rel="stylesheet" href="../css/estilos.css">



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
<script src="../js/menu.js"></script>
<script src="../js/cerrarSesion.js"></script>

<section>
    <div id="Bienvenido"><h1 class="BienvenidoJL">Bienvenido Técnico</h1></div>
    <div id="contenedor">
        <div id="anuncio-incidencias">
                <p id="NumerodeIncidencias">Número de Incidencias: <b class="cantidad">5</b></p>
            </div>

            <div class="incidencias">
                <div class="datosPrincipales">
                    <p id="Cliente1"><b>Usuario: Joselito Manuel</b></p>
                    <p id="Gravedad1"><b>Prioridad de Incidencia: </b><b class="nivel"
                                                                           style="color:#b70101">Urgente</b></p>
                </div>
                <button class="btn" onclick="showPopUp1()">Ver Más</button>
                <!-- Elemento que contiene el pop-up -->
                <div id="popUpBox1">
                    <!-- Contenido del pop-up -->
                    <div class="popUpContent">
                        <div id="información1">
                            <h1 class="tituloIncidencia" id="tituloAveria"></h1>
                            <p id="nombreUsuario">Nombre del Usuario: Pedro Cano<p id="Cliente"></p></p>
                            <p id="textoIdUsuario">ID Usuario :<p id="idUsuario"></p></p>
                            <p id="dirección">Dirección :<p id="direcciónUsuario"></p></p>
                            <p id="textoIdHuerto">ID Huerto :<p id="idHuerto"></p></p>
                            <p id="textoIdSonda">ID Sonda :<p id="idSonda"></p></p>
                            <p id="textoIdSensor">ID Sensor :<p id="idSensor"></p></p>
                        </div>
                    </div>
                    <!-- Icono de cerrar -->

                </div>
            </div>
            <div class="incidencias">
                <div class="datosPrincipales">
                    <p id="Cliente2"><b>Usuario: </b></p>
                    <p id="Gravedad2"><b>Prioridad de Incidencia: </b><b class="nivel"
                                                                           style="color:#b70101">Urgente</b></p>
                </div>
                <button class="btn" onclick="showPopUp()">Ver Más</button>
                <!-- Elemento que contiene el pop-up -->
                <div id="popUpBox">
                    <!-- Contenido del pop-up -->
                    <div class="popUpContent">
                        <div class="información">
                            <h1 class="tituloIncidencia" id="tituloAveria"></h1>
                            <p id="nombreUsuario">Nombre del Usuario: Joselito Manuel<p id="Cliente"></p></p>
                            <p id="textoIdUsuario">ID Usuario : #00103<p id="idUsuario"></p></p>
                            <p id="dirección">Dirección : Paseo Enrique, 7, 7º C<p id="direcciónUsuario"></p></p>
                            <p id="textoIdHuerto">ID Huerto : #003<p id="idHuerto"></p></p>
                            <p id="textoIdSensor">ID Sensor : #0304<p id="idSensor"></p></p>
                            <p id="textoIdSonda">Tipo <p id="idSonda"></p></p>

                        </div>
                    </div>
                    <!-- Icono de cerrar -->

                </div>
            </div>
            <div class="incidencias">
                <div class="datosPrincipales">
                    <p id="Cliente3"><b>Usuario: Michael Jordan </b></p>
                    <p id="Gravedad3"><b>Prioridad de Incidencia: </b><b class="nivel"
                                                                           style="color:#fa0404">Alto</b></p>
                </div>
                <button class="btn" onclick="showPopUp()">Ver Más</button>
                <!-- Elemento que contiene el pop-up -->
                <div id="popUpBox">
                    <!-- Contenido del pop-up -->
                    <div class="popUpContent">
                        <div class="información">
                            <h1 class="tituloIncidencia" id="tituloAveria"></h1>
                            <p id="nombreUsuario">Nombre del Usuario:<p id="Cliente"></p></p>
                            <p id="textoIdUsuario">ID Usuario :<p id="idUsuario"></p></p>
                            <p id="dirección">Dirección :<p id="direcciónUsuario"></p></p>
                            <p id="textoIdHuerto">ID Huerto :<p id="idHuerto"></p></p>
                            <p id="textoIdSonda">ID Sonda :<p id="idSonda"></p></p>
                            <p id="textoIdSensor">ID Sensor :<p id="idSensor"></p></p>
                            <p id="infoProblema">ID Sensor : #0304<p id="elProblema"></p></p>
                        </div>
                    </div>
                    <!-- Icono de cerrar -->

                </div>
            </div>
            <div class="incidencias">
                <div class="datosPrincipales">
                    <p id="Cliente4"><b>Usuario: Jordi Hurtado</b></p>
                    <p id="Gravedad4"><b>Prioridad de Incidencia: </b><b class="nivel"
                                                                           style="color:#D79C0EFF">Media</b></p>
                </div>
                <button class="btn" onclick="showPopUp()">Ver Más</button>
                <!-- Elemento que contiene el pop-up -->
                <div id="popUpBox">
                    <!-- Contenido del pop-up -->
                    <div class="popUpContent">
                        <div id="información3">
                            <h1 class="tituloIncidencia"></h1>
                            <p id="nombreUsuario3">Nombre del Usuario:Jordi Hurtado</p>
                            <p id="textoIdUsuario">ID Usuario :<p id="idUsuario"></p></p>
                            <p id="dirección">Dirección :<p id="direcciónUsuario"></p></p>
                            <p id="textoIdHuerto">ID Huerto :<p id="idHuerto"></p></p>
                            <p id="textoIdSonda">ID Sonda :<p id="idSonda"></p></p>
                            <p id="textoIdSensor">ID Sensor :<p id="idSensor"></p></p>
                            <p id="infoProblema">ID Sensor : #0304<p id="elProblema"></p></p>
                        </div>
                    </div>
                    <!-- Icono de cerrar -->

                </div>
            </div>
            <div class="incidencias">
                <div class="datosPrincipales">
                    <p id="Cliente5"><b>Usuario: Pedro Sanchez</b></p>
                    <p id="Gravedad5"><b>Prioridad de Incidencia: </b><b class="nivel"
                                                                           style="color:#52b734">Baja</b></p>
                </div>
                <button class="btn" onclick="showPopUp()">Ver Más</button>
                <!-- Elemento que contiene el pop-up -->
                <div id="popUpBox">
                    <!-- Contenido del pop-up -->
                    <div class="popUpContent">
                        <div class="información">
                            <h1 class="tituloIncidencia" id="tituloAveria"></h1>
                            <p id="nombreUsuario">Nombre del Usuario:<p id="Cliente"></p></p>
                            <p id="textoIdUsuario">ID Usuario :<p id="idUsuario"></p></p>
                            <p id="dirección">Dirección :<p id="direcciónUsuario"></p></p>
                            <p id="textoIdHuerto">ID Huerto :<p id="idHuerto"></p></p>
                            <p id="textoIdSonda">ID Sonda :<p id="idSonda"></p></p>
                            <p id="textoIdSensor">ID Sensor :<p id="idSensor"></p></p>
                            <p id="infoProblema">ID Sensor : #0304<p id="elProblema"></p></p>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>

</section>

<script src="../js/cerrarSesion.js"></script>
<script src="../js/TecnicoBBDD.js"></script>
<script src="../js/Página%20Incidencias.js"></script>
<script src="Página%20Incidencias.js"></script>

</body>

</html>
<?php
/* Comprobar que hay una sesión creada y que contiene un campo 'user' */
session_start();

if(isset($_SESSION['user'])) {
  // si no existe redirigir al login
  $json = json_encode($_SESSION ['user']);
  $data = json_decode($json,true);
  if($data['idRol'] != 3){
    header('Location: ../');
  }
}else{
  header('Location: ../');
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Incidencias</title>
    <link rel="stylesheet" href="Pagina%20Incidencias.css">
    <script src="Página%20Incidencias.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/DashboardAdminMovil.css">
    <link rel="stylesheet" href="../css/header2.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" href="../css/Pagina%20Incidencias.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <script src="../js/Página%20Incidencias.js"></script>


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

<section>
    <div id="Bienvenido"><h1 class="BienvenidoJL">Bienvenido Técnico</h1></div>
    <div id="contenedor">
        <div id="Cuadrao">
            <div id="anuncio-incidencias">
                <p id="NumerodeIncidencias">Número de Incidencias: <b class="cantidad"></b></p>
            </div>

            <div class="incidencias">
                <div>
                    <p class="Cliente"><b>Usuario: </b></p>
                    <p class="Gravedad"><b>Prioridad de Incidencia: </b><b class="nivel" style="color:#b70101">Urgente</b></p>
                </div>
                <button class="btn" onclick="showPopUp()">Ver Más</button>
                <!-- Elemento que contiene el pop-up -->
                <div id="popUpBox">
                    <!-- Contenido del pop-up -->
                    <div class="popUpContent">
                        <div class="información">
                            <h1 class="tituloIncidencia"> Incidencia</h1>
                            <p id="nombreUsuario">Nombre del Usuario: <p class="Cliente"></p></p>
                            <p id="textoIdUsuario">ID Usuario :<p class="idUsuario"></p></p>
                            <p id="dirección">Dirección :<p class="direcciónUsuario"></p></p>
                            <p id="textoIdHuerto">ID Huerto :<p class="idHuerto"></p></p>
                            <p id="textoIdSonda">ID Sonda :<p class="idSonda"></p></p>
                            <p id="textoIdSensor">ID Sensor : <p class="idSensor"></p></p>
                        </div>
                    </div>
                    <!-- Icono de cerrar -->
                    <span class="closeIcon" onclick="hidePopUp()">
            <div class="BotonX">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-x-square"
                   viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>
          </span>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</section>

<script src="../js/cerrarSesion.js"></script>

</body>

</html>
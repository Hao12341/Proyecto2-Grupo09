<?php
/* Comprobar que hay una sesión creada y que contiene un campo 'user' */
session_start();

if (isset($_SESSION['user'])) {
    // si no existe redirigir al login
    $json = json_encode($_SESSION['user']);
    $data = json_decode($json, true);
    if ($data['idRol'] != 4) {
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/header2.css">
    <link rel="stylesheet" href="../css/estilos.css">



    <title>Perfil</title>
</head>


<body>
    <header class="Encabezado" role="banner">
        <!-- Esto es el encabezado que actuará de banner-->
        <nav id="menu"><a id="Logo" href="../index.html"><img src="../img/logo.svg" alt="Logo de la empresa"></a>
            <!-- Enlace a la página index.html, imagen de logo en la ruta especificada y alt = alternativa -->
            <div id="contenedorContenedorDesktop">
                <div id="separador"></div>
                <div id="contenedorMenuDesktop">
                    <ul id="menuDesktop">
                        <li><a href="../index.html">Inicio</a></li>
                        <li><a href="perfil.php">Mi perfil</a></li>
                        <li><a href="paginasensores.php">Mis sensores</a></li>
                        <li><a href="o.html">Contáctanos</a></li>
                        <li><a onclick="logout()" href="#">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>

            <ul id="menuDesplegable">
                <li><a href="../index.html">Inicio</a></li>
                <li><a href="perfil.php">Mi perfil</a></li>
                <li><a href="paginasensores.php">Mis sensores</a></li>
                <li><a onclick="logout()">Cerrar sesión</a></li>
            </ul>



            <div id="iconosBanner">
                <a id="Login" href="tml"><img id="iconoLogin" src="../img/perfilLogin.svg" alt="Perfil Log In"></a>
                <div class="hamburguesa">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </nav>
    </header>
    <script src="../js/menu.js"></script>


    <div class="section">
        <div class="contendor">
            <div class="titulo">
                <h1>Mi perfil</h1>
            </div>
            <div class="perfil">

                <div class="perfil-info">
                    <dl>
                        <div>
                            <dt>Nombre y apellidos:</dt>
                            <dd>Manolo Sánchez Gandía</dd>
                        </div>
                        <div>
                            <dt>Email:</dt>
                            <dd>correo@ejemplo.com</dd>
                        </div>
                        <div>
                            <dt>Teléfono:</dt>
                            <dd>555 555 5555</dd>
                        </div>
                        <dt>Mis huertos:</dt>
                        <div id="ContenedorHuertos">
                        </div>
                    </dl>
                </div>
                <dialog id="popup">
                    <h3>¿Quieres editar el nombre de tu huerto?</h3>
                    <button class="btn btn-outline-secondary" id="correcto" type="button">SI</button>
                    <button class="btn btn-outline-secondary" type="button" id="cancelar-btn">NO</button>
                </dialog>
                <dialog id="edit">
                    <input type="text" class="form-control-sm" placeholder="Nombre del huerto">
                    <button class="btn btn-outline-secondary" type="button">EDITAR</button>
                    <button class="btn btn-outline-secondary" type="button" id="cancel">Cancelar</button>
                </dialog>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>


    <script src="../js/cerrarSesion.js"></script>
    <script src="../js/HuertoInternet.js">
    </script>

    <script>

        let objectHuertos = "[{\"id\":1,\"Nombre\":\"Gabriel\",\"Dirección\":\"55 Doe Crossing Point\"},\n" +
            "{\"id\":2,\"Nombre\":\"Fidole\",\"Dirección\":\"174 Mesta Point\"},\n" +
            "{\"id\":3,\"Nombre\":\"King\",\"Dirección\":\"9 Kinsman Drive\"}]"
        let huertos = JSON.parse(objectHuertos)
        PonerHuertos(huertos)
    </script>
    <script src="../js/perfil.js"></script>
</body>


</html>
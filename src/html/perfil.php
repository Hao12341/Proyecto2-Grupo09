<?php
/* Comprobar que hay una sesión creada y que contiene un campo 'user' */
session_start();

if(isset($_SESSION['user'])) {
    // si no existe redirigir al login
    $json = json_encode($_SESSION ['user']);
    $data = json_decode($json,true);
    if($data['idRol'] != 4){
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a id="Login" href="tml"><img id="iconoLogin" src="../img/perfilLogin.svg"
                                              alt="Perfil Log In"></a>
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
                <div class="perfil-img">
                    <img id="img-perfil" src="../img/imagen-perfil.jpeg" alt="Foto de perfil">
                    <div class="file-input-wrapper">
                      <button class="custom-file-button" onclick="document.getElementById('myFileInput').click()">Editar imagen</button>
                      <input type="file" id="myFileInput" class="custom-file-input">
                    </div>
                  </div>
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
                        <div>
                            <dt>Mis huertos:</dt>
                            <dd class="huertos">
                                <div class="texto">Huerto 1: <br>
                                    Dirección: CalleFalsa 123, Springfield</div>
                                <div class="boton">
                                    <a href="paginasensores.php"><button type="button">Huerto</button></a>
                                </div>
                            </dd>
                        </div>
                        <div>
                            <dd class="huertos">
                                <div class="texto">Huerto 2: <br>
                                    Dirección: CalleFalsa 123, Springfield</div>
                                <div class="boton">
                                    <a href="paginasensores.php"><button type="button">Huerto</button></a>
                                </div>
                            </dd>
                        </div>
                        <div>
                            <dd class="huertos">
                                <div class="texto">Huerto 3: <br>
                                    Dirección: CalleFalsa 123, Springfield</div>
                                <div class="boton">
                                    <a href="paginasensores.php"><button type="button">Huerto</button></a>
                                </div>
                            </dd>
                        </div>

                    </dl>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/perfil.js"></script>
    <script src="../js/cerrarSesion.js"></script>

</body>
</div>

</html>
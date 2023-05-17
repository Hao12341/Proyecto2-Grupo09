<?php
/* Comprobar que hay una sesión creada y que contiene un campo 'user' */
session_start();

if(isset($_SESSION['user'])) {
    // si no existe redirigir al login
    $json = json_encode($_SESSION ['user']);
    $data = json_decode($json,true);
    if($data['rol'] != 1){
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
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">     <!-- Para ajustar el ancho a la anchura del dispositivo que ejecute esta página, funcione en navegadores safari anteriores a la versión 9, inicia la escala en 1 -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">                                       <!-- Hacer compatible con el navegador edge -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../css/DashboardAdminMovil.css">                              <!-- Enlace a la hoja de estilos CSS de DashboardAdmin -->

    <link rel="stylesheet" type="text/css" href="../css/header2.css">                              <!-- Enlace a la hoja de estilos CSS de header-->

    <link rel="stylesheet" type="text/css" href="../css/estilos.css">                            <!-- Enlace a la hoja de estilos CSS globales-->

    <title>Dashboard Administrador</title>

</head>
<body>
<!-- Empieza el Header/BANNER -->
<header class="Encabezado" role="banner">
    <!-- Esto es el encabezado que actuará de banner-->
    <!-- Empieza la etiqueta nav-->
    <nav id="menu"><a id="Logo" href="../index.html"><img src="../img/logo.svg" alt="Logo de la empresa"></a>   <!-- Enlace a la página index.html, imagen de logo en la ruta especificada y alt = alternativa -->
        <!-- Contenedor de los elementos del banner en vista ordenador -->
        <div id="contenedorContenedorDesktop">
            <div id="separador"></div>
            <div id="contenedorMenuDesktop">
                <ul id="menuDesktop">
                    <li><a href="../html/Página%20Incidencias.html">Avisos</a></li>
                    <li><a href="../html/login.html">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
        <!-- Fin Contenedor de los elementos del banner en vista ordenador -->

        <!-- Contenedor de menu hamburguesa en vista movil -->
        <ul id="menuDesplegable">
            <li><a href="../html/Página%20Incidencias.html">Avisos</a></li>
            <li><a href="../html/login.html">Cerrar Sesión</a></li>
        </ul>
        <!--FIN Contenedor de menu hamburguesa en vista movil -->

        <!-- Contenedor de iconos del BANNER -->
        <div id="iconosBanner">
            <a id="Login" href="../html/login.html"><img id="iconoLogin" src="../img/perfilLogin.svg" alt="Perfil Log In"></a>
            <div class="hamburguesa">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <!--FIN Contenedor de iconos del BANNER -->
    </nav>
    <!-- FIN etiqueta Nav-->
</header>
<!-- FIN Header-->
<!-- script que hace funcionar el menu desplegable-->
<script src="../js/menu.js"></script>
<!-- FIN del script-->
<!-- Inicio de la etiqueta section-->
<section class="InicioAdmin" id="InicioAdmin"><!-- Inicio Sección Dashboard Administrador-->
    <div class="contenedor"> <!-- DIV que contiene el h1, el filtrado y la tabla-->
        <div class="filtro">    <!-- DIV que contiene el h1, el filtrado y la tabla-->
            <div class="titulo">    <!-- DIV que contiene el h1-->
       <h1>Usuarios</h1></div>    <!-- FIN DIV que contiene el h1-->
            <div class="opciones-filtro">       <!-- el filtrado -->
                <label for="Campo">Filtrar por campo:</label>       <!-- Nombre y descripción del filtro-->
                <select name="Campo" id="Campo">
                    <option value="NombreUsuario">Nombre Usuario</option>
                    <option value="Email">Email</option>
                    <option value="Teléfono">Teléfono</option>
                </select>
                <img class="filtrar" src="../img/filtrar.png" alt="filtro">
            <button><img class="anadir" src="../img/anadir.png"></button></div>
       </div>

        <!-- Inicio tabla-->
        <table>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nombre Usuario</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>Jose Javier Sesma</th>
                    <td>jojase@gamil.com</td>
                    <td>985266223</td>
                    <td> <div class="imagen">
                        <div><img src="../img/editar.png" alt="editar"></div>
                        <div><img src="../img/boton-x%20(2).png" alt="borrar"></div>
                    </div></td>
                </tr>
                <tr>
                    <th>Jose Javier Sesma</th>
                    <td>jojase@gamil.com</td>
                    <td>985266223</td>
                    <td> <div class="imagen">
                        <div><img src="../img/editar.png" alt="editar"></div>
                        <div><img src="../img/boton-x%20(2).png" alt="borrar"></div>
                    </div></td>
                </tr>
                <tr>
                    <th>Jose Javier Sesma</th>
                    <td>jojase@gamil.com</td>
                    <td>985266223</td>
                    <td> <div class="imagen">
                        <div><img src="../img/editar.png" alt="editar"></div>
                        <div><img src="../img/boton-x%20(2).png" alt="borrar"></div>
                    </div></td>
                </tr>
                <tr>
                    <th>Jose Javier Sesma</th>
                    <td>jojase@gamil.com</td>
                    <td>985266223</td>
                    <td> <div class="imagen">
                        <div><img src="../img/editar.png" alt="editar"></div>
                        <div><img src="../img/boton-x%20(2).png" alt="borrar"></div>
                    </div></td>
                </tr>
                <tr>
                    <th>Jose Javier Sesma</th>
                    <td>jojase@gamil.com</td>
                    <td>985266223</td>
                    <td> <div class="imagen">
                        <div><img src="../img/editar.png" alt="editar"></div>
                        <div><img src="../img/boton-x%20(2).png" alt="borrar"></div>
                    </div></td>
                </tr>
                <tr>
                    <th>Jose Javier Sesma</th>
                    <td>jojase@gamil.com</td>
                    <td>985266223</td>
                    <td> <div class="imagen">
                        <div><img src="../img/editar.png" alt="editar"></div>
                        <div><img src="../img/boton-x%20(2).png" alt="borrar"></div>
                    </div></td>
                </tr>
                <tr>
                    <th>Jose Javier Sesma</th>
                    <td>jojase@gamil.com</td>
                    <td>985266223</td>
                    <td> <div class="imagen">
                        <div><img src="../img/editar.png" alt="editar"></div>
                        <div><img src="../img/boton-x%20(2).png" alt="borrar"></div>
                    </div></td>
                </tr>

                </tbody>

            <!-- FIN contenido tabla-->
            </table></table>
       <!-- <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#!" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#!">1</a></li>
                <li class="page-item active">
                    <a class="page-link" href="#!">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#!">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#!">Next</a>
                </li>
            </ul>
        </nav>
       FIN tabla-->
    </div>

    <!-- FIN DIV que tiene h1, filtrado y tabla-->
</section>
<!-- FIN section-->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
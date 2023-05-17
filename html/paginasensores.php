<?php
/* Comprobar que hay una sesión creada y que contiene un campo 'user' */
session_start();

if(isset($_SESSION['user'])) {
    // si no existe redirigir al login
    $json = json_encode($_SESSION ['user']);
    $data = json_decode($json,true);
    if($data['rol'] != 4){
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
    <link rel="stylesheet" href="../css/pagina_sensores.css">
    <title>pagina sensores</title>
    <script src="js/Chart.bundle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../js/cambiartabla.js"></script>
    <script src="../js/elegirgrafica.js"></script>
    <link rel="stylesheet" href="../css/header2.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body >
<!-- empieza contenido del header-->
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
                <li><a href="paginasensores.php">Mis sensores</a></li>
                <li><a href="../html/contacto.html">Contáctanos</a></li>
                <li><a href="../html/login.html">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>

    <ul id="menuDesplegable">
        <li><a href="../index.html">Inicio</a></li>
        <li><a href="perfil.php">Mi perfil</a></li>
        <li><a href="paginasensores.php">Mis sensores</a></li>
        <li><a href="../html/contacto.html">Contáctanos</a></li>
        <li><a href="../html/login.html">Cerrar sesión</a></li>
    </ul>



    <div id="iconosBanner">
        <a id="Login" href="../html/login.html"><img id="iconoLogin" src="../img/perfilLogin.svg" alt="Perfil Log In"></a>
        <div class="hamburguesa">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</nav>
</header>
<script src="../js/menu.js"></script><br>
<!--acaba contenido del header-->

<h1 class="bienvenida"> bienvenido usuario</h1>

<div id="graficas" >
    <h1 class="medidas">MEDIDAS</h1>
    <select name="huertos" id="huertos" onchange="cambiarImagen()" ondurationchange="cambiarHuerto()">
        <option value="h1">huerto 1</option>
        <option value="h2">huerto 2</option>
        <option value="h3">huerto 3</option>
    </select><br>
    <select name="sensores" id="sensores" onchange="cambiarImagen()">
        <option value="sal">salinidad</option>
        <option value="hum">humedad</option>
        <option value="ph">pH</option>
        <option value="temp">temperatura</option>
        <option value="luz">luminosidad</option>
    </select><br>
</div> <br>

<img id="imagen" src="../img/gr_h1/h1_sal.png" alt="grafica"><br>

<table id="datosgrafica">
    <tr>
        <th>
            <p>humedad</p>
            <h2>36%</h2>
        </th>
        <th>
            <p>temperatura</p>
            <h2>25ºC</h2>
        </th>
    </tr>
    <tr>
        <th>
            <p>pH</p>
            <h2>6.3</h2>
        </th>
        <th>
            <p>luminosidad</p>
            <h2>BAJA</h2>
        </th>
    </tr>
    <tr>
        <th>
            <p>salinidad</p>
            <h2>10%</h2>
        </th>
        <th>
            <p>estado general</p>
            <h2>OPTIMO</h2>
        </th>
    </tr>
</table>
<div class="titulotablas" >
    <h1 class="tabla">historial de medidas</h1>
    <select id="tabla" onchange="cambiarTabla()" >
        <option value="tablasal">salinidad</option>
        <option value="tablatemp">temperatura</option>
        <option value="tablapH">pH</option>
        <option value="tablaluz">luminosidad</option>
        <option value="tablahumedad">humedad</option>
    </select></div>

<!--aqui empieza la tabla-->

<table id="tablasal">
    <thead>
    <tr>
        <th>fecha</th>
        <th>hora</th>
        <th>sal(g/l)</th>
    </tr>
    </thead>
    <tr>
        <td>2023/04/16</td>
        <td>08:00</td>
        <td>24.76</td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>09:00</td>
        <td>16.62</td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>10:00</td>
        <td>13.85</td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>11:00</td>
        <td>35.27</td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>12:00</td>
        <td>8.57</td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>13:00</td>
        <td>29.78</td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>14:00</td>
        <td>38.91</td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>15:00</td>
        <td>7.6</td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>16:00</td>
        <td>7.23</td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>17:00</td>
        <td>2.93</td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>18:00</td>
        <td>35.06</td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>19:00</td>
        <td>8.38</td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>20:00</td>
        <td>31.4</td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>21:00</td>
        <td>28.1</td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>22:00</td>
        <td>1.21</td>
    </tr>
</table>
<table id="tablahumedad" style="display: none;">
    <thead>
    <tr>
        <th>fecha</th>
        <th>hora</th>
        <th>humedad</th>
    </tr>
    </thead>
    <tr>
        <td>2023/04/16</td>
        <td>08:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>09:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>10:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>11:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>12:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>13:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>14:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>15:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>16:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>17:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>18:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>19:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>20:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>21:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>22:00</td>
        <td></td>
    </tr>
</table>
<table id="tablaluz" style="display: none;">
    <thead>
    <tr>
        <th>fecha</th>
        <th>hora</th>
        <th>luminosidad</th>
    </tr>
    </thead>
    <tr>
        <td>2023/04/16</td>
        <td>08:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>09:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>10:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>11:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>12:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>13:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>14:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>15:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>16:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>17:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>18:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>19:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>20:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>21:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>22:00</td>
        <td></td>
    </tr>
</table>
<table id="tablapH" style="display: none;">
    <thead>
    <tr>
        <th>fecha</th>
        <th>hora</th>
        <th>pH</th>
    </tr>
    </thead>
    <tr>
        <td>2023/04/16</td>
        <td>08:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>09:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>10:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>11:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>12:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>13:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>14:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>15:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>16:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>17:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>18:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>19:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>20:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>21:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>22:00</td>
        <td></td>
    </tr>
</table>
<table id="tablatemp" style="display: none;">
    <thead>
    <tr>
        <th>fecha</th>
        <th>hora</th>
        <th>temperatura</th>
    </tr>
    </thead>
    <tr>
        <td>2023/04/16</td>
        <td>08:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>09:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>10:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>11:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>12:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>13:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>14:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>15:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>16:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>17:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>18:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>19:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>20:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>21:00</td>
        <td></td>
    </tr>
    <tr>
        <td>2023/04/16</td>
        <td>22:00</td>
        <td></td>
    </tr>
</table>

<!--aqui acaba la tabla-->
</body><script src="elegirgrafica.js"></script>
</html>
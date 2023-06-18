<?php
/* Comprobar que hay una sesión creada y que contiene un campo 'user' */
session_start();

if (isset($_SESSION['user'])) {
    // si no existe redirigir al login
    $json = json_encode($_SESSION['user']);
    $data = json_decode($json, true);
    if ($data['idRol'] != 4) {
        header('Location: ../index.html');
    }
} else {
    header('Location: ../index.html');
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina sensores</title>
    <script src="js/Chart.bundle.js"></script>
    <script src="../js/elegir_tabla.js"></script>
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/luxon@3.3.0/build/global/luxon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@1.3.1/dist/chartjs-adapter-luxon.umd.min.js"></script>
    <link rel="stylesheet" href="../css/pagina_sensores.css">
    <link rel="stylesheet" href="../css/header2.css">
    <link rel="stylesheet" href="../css/estilos.css">
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
                         <li><a onclick="logout()" href="#">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>
            <ul id="menuDesplegable">
                <li><a href="../index.html">Inicio</a></li>
                <li><a href="perfil.php">Mi perfil</a></li>
                <li><a href="login.html">Cerrar sesión</a></li>
            </ul>
            <div id="iconosBanner">
                <a id="Login" href="Login.html"><img id="iconoLogin" src="../img/perfilLogin.svg"
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
    <script src="../js/cerrarSesion.js"></script>
    <!--acaba contenido del header-->
    <div id="loquenoesheader">
        <h1 class="bienvenida"> Bienvenido usuario</h1>
        <h1 class="medidas">MIS SENSORES</h1>
        <div id="graficas">
            <select name="huertos" id="huertos" >
            </select><br>
            <div id="ultimaactualizacion">
                <h2>última actualización:</h2>
                <h3>22:00 h</h3>
            </div>
        </div>
        <div class="tablaygrafica">
            <table class="datosgrafica" id="huerto1">
                <tr>
                    <th>
                        <div class="titulotabla">
                            <h2>Humedad</h2><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-droplet" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10a5 5 0 0 0 10 0c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z" />
                                <path fill-rule="evenodd"
                                    d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448z" />
                            </svg>
                        </div>
                    </th>
                    <th>
                        <h2>36%</h2>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="titulotabla">
                            <h2>Temperatura</h2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-thermometer-half" viewBox="0 0 16 16">
                                <path
                                    d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V6.5a.5.5 0 0 1 1 0v4.585a1.5 1.5 0 0 1 1 1.415z" />
                                <path
                                    d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1z" />
                            </svg>
                        </div>
                    </th>
                    <th>
                        <h2>25ºC</h2>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="titulotabla">
                            <h2>pH</h2><i class="fi fi-rr-prescription-bottle"></i>
                        </div>
                    </th>
                    <th>
                        <h2>6.3</h2>
                    </th>

                </tr>
                <tr>
                    <th>
                        <div class="titulotabla">
                            <h2>Luminosidad</h2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-sun" viewBox="0 0 16 16">
                                <path
                                    d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                            </svg>
                        </div>
                    </th>
                    <th>
                        <h2>500 lux</h2>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="titulotabla">
                            <h2>Salinidad</h2><i class="fi fi-rr-chart-scatter-bubble"></i>
                        </div>
                    </th>
                    <th>
                        <h2>10%</h2>
                    </th>
                </tr>
            </table>
            <table class="datosgrafica" id="huerto2" style="display: none;">
                <tr>
                    <th>
                        <p>Humedad</p>
                        <h2>33%</h2>
                    </th>
                </tr>
                <tr>
                    <th>
                        <p>Temperatura</p>
                        <h2>23ºC</h2>
                    </th>
                </tr>
                <tr>
                    <th>
                        <p>pH</p>
                        <h2>6.5</h2>
                    </th>
                </tr>
                <tr>
                    <th>
                        <p>Luminosidad</p>
                        <h2>100 000 lux</h2>
                    </th>
                </tr>
                <tr>
                    <th>
                        <p>Salinidad</p>
                        <h2>15%</h2>
                    </th>
                </tr>
            </table>
            <table class="datosgrafica" id="huerto3" style="display:none; ">
                <tr>
                    <th>
                        <p>Humedad</p>
                        <h2>40%</h2>
                    </th>
                    <th>
                        <p>Temperatura</p>
                        <h2>20ºC</h2>
                    </th>
                </tr>
                <tr>
                    <th>
                        <p>pH</p>
                        <h2>6.1</h2>
                    </th>
                    <th>
                        <p>Luminosidad</p>
                        <h2>1500 lux</h2>
                    </th>
                </tr>
                <tr>
                    <th>
                        <p>Salinidad</p>
                        <h2>20%</h2>
                    </th>
                    <th>
                        <p>Última actualización</p>
                        <h2>21:55</h2>
                    </th>
                </tr>
            </table>
            <div class="tabset">
                <!-- Tab 1 -->
                <input type="radio" name="tabset" id="tab1" aria-controls="humedad" checked>
                <label for="tab1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-droplet" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10a5 5 0 0 0 10 0c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z" />
                        <path fill-rule="evenodd"
                            d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448z" />
                    </svg>
                </label>
                <!-- Tab 2 -->
                <input type="radio" name="tabset" id="tab2" aria-controls="salinidad">
                <label for="tab2"><i class="fi fi-rr-chart-scatter-bubble"></i></label>
                <!-- Tab 3 -->
                <input type="radio" name="tabset" id="tab3" aria-controls="temperatura">
                <label for="tab3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-thermometer-half" viewBox="0 0 16 16">
                        <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V6.5a.5.5 0 0 1 1 0v4.585a1.5 1.5 0 0 1 1 1.415z" />
                        <path
                            d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1z" />
                    </svg></label>
                <!-- tab 4 -->
                <input type="radio" name="tabset" id="tab4" aria-controls="ph">
                <label for="tab4"><i class="fi fi-rr-prescription-bottle"></i></label>

                <!-- tab 5 -->
                <input type="radio" name="tabset" id="tab5" aria-controls="luminosidad">
                <label for="tab5"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-sun" viewBox="0 0 16 16">
                        <path
                            d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                    </svg></label>
                <button class="boton" onclick="location.href='historico.html'">HISTORICO</button>

                <div class="tab-panels">
                    <section id="humedad" class="tab-panel">
                        <div><h2>humedad</h2>
                            <canvas id="graficahumedad" width="400" height="400"></canvas>
                        </div>

                    </section>
                    <section id="salinidad" class="tab-panel">
                        <h2>salinidad</h2>
                        <canvas id="graficasalinidad"></canvas>
                    </section>
                    <section id="temperatura" class="tab-panel">
                        <h2>temperatura</h2>
                        <canvas id="graficatemperatura"></canvas>
                    </section>
                    <section id="ph" class="tab-panel">
                        <h2>ph</h2>
                        <canvas id="graficaph"></canvas>
                    </section>
                    <section id="luminosidad" class="tab-panel">
                        <h2>luminosidad</h2>
                        <canvas id="graficaluz"></canvas>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script src="../js/cerrarSesion.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>
<script src="../js/admin.js"></script>
<script src="../js/PaginaSensores.js"></script>
<script src="../js/HuertoInternet.js"></script>
<script src="../js/sesion.js"></script>



<!--aqui acaba la tabla-->
</body>

</html>
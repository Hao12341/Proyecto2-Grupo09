<?php
/* Comprobar que hay una sesión creada y que contiene un campo 'user' */
session_start();

if (isset($_SESSION['user'])) {
    // si no existe redirigir al login
    $json = json_encode($_SESSION['user']);
    $data = json_decode($json, true);
    if ($data['idRol'] != 1) {
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
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <!-- Para ajustar el ancho a la anchura del dispositivo que ejecute esta página, funcione en navegadores safari anteriores a la versión 9, inicia la escala en 1 -->
    <meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- Hacer compatible con el navegador edge -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="../css/DashboardAdminMovil.css">
    <!-- Enlace a la hoja de estilos CSS de DashboardAdmin -->
    <link rel="stylesheet" type="text/css" href="../css/header2.css"> <!-- Enlace a la hoja de estilos CSS de header-->

    <link rel="stylesheet" type="text/css" href="../css/estilos.css"> <!-- Enlace a la hoja de estilos CSS globales-->

    <title>Dashboard Administrador</title>

</head>


<body>
    <!-- Empieza el Header/BANNER -->
    <header class="Encabezado" role="banner">
        <!-- Esto es el encabezado que actuará de banner-->
        <nav id="menu"><a id="Logo" href="index.html"><img src="../img/logo.svg" alt="Logo de la empresa"></a>
            <!-- Enlace a la página index.html, imagen de logo en la ruta especificada y alt = alternativa -->
            <div id="contenedorContenedorDesktop">
                <div id="separador"></div>
                <div id="contenedorMenuDesktop">
                    <ul id="menuDesktop">
                        <li><a href="../index.html">Inicio</a></li>
                        <li><a href="Página Incidencias.php">Incidencias</a></li>
                        <li><a href="login.html">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>

            <ul id="menuDesplegable">
                <li><a href="../index.html">Inicio</a></li>
                <li><a href="Página Incidencias.php">Incidencias</a></li>
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
    <!-- FIN Header-->
    <!-- script que hace funcionar el menu desplegable-->
    <script src="../js/menu.js"></script>
    <!-- FIN del script-->
    <!-- Inicio de la etiqueta section-->
    <section class="InicioAdmin" id="InicioAdmin"><!-- Inicio Sección Dashboard Administrador-->
        <div class="bienvenido">
            <h1>Bienvenido Admin</h1>
        </div>
        <div class="contenedor">
            <div class="Busqueda">
                <div class="titulo">
                    <h1>Usuarios</h1>
                </div>
                <div class="input-group">
                    <div class="buscador">
                        <input type="text" class="form-control" id="buscar-input" placeholder="Nombre" aria-label=""
                            aria-describedby="basic-addon1">
                        <button class="btn btn-outline-secondary" type="button" id="buscar-btn">Buscar</button>

                        <!-- <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">Buscar</button>
                        </div> -->
                    </div>
                    <button type="button" class="boton-anyadir" id="anyadir-btn">
                        <i class="bi bi-plus-square" id="anyadir"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Inicio pop up de anyadir usuario -->
        <dialog id="popup">
            <div class="forms">
                <input type="text" class="form-control-sm" id="formpopup" placeholder="Correo">
                <input type="text" class="form-control-sm" id="formpopup" placeholder="Nombre">
                <input type="password" class="form-control-sm" id="formpopup" placeholder="Contraseña">
            </div>
            <br>
            <div class="rol">
                <label>Rol: <select name="idRol">
                        <option value="1">Administrador</option>
                        <option value="2">Usuario</option>
                    </select>
                </label>
            </div>
            <br>
            <button class="btn btn-outline-secondary" type="button">Añadir</button>
            <button class="btn btn-outline-secondary" type="button" id="cancelar-btn">Cancelar</button>
        </dialog>



        <div class="pestañas">
            <button class="pestaña" id="pestaña1" onclick="mostrarTabla(1)">Usuario</button>
            <button class="pestaña" id="pestaña2" onclick="mostrarTabla(2)">Técnico</button>
            <button class="pestaña" id="pestaña3" onclick="mostrarTabla(3)">Administrador</button>
        </div>

        <div id="tabla1" class="tabla">
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
                        <th>Jose Miguel Sesma</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Jose Javier Sesma</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Jose Javier Sesma</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Jose Javier Sesma</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Jose Javier Sesma</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Jose Javier Sesma</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Jose Javier Sesma</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>

                </tbody>

                <!-- FIN contenido tabla-->
            </table>
        </div>
        <div id="tabla2" class="tabla" style="display: none;">
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
                        <th>David Pérez Tomás</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>David Pérez Tomás</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>David Pérez Tomás</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>David Pérez Tomás</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>David Pérez Tomás</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>David Pérez Tomás</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>David Pérez Tomás</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>

                </tbody>

                <!-- FIN contenido tabla-->
            </table>
        </div>
        <div id="tabla3" class="tabla" style="display: none;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre Usuario</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th class="accionesH">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Jose ggg Sesma</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Jose Javier Sesma</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Jose Javier Sesma</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Jose Javier Sesma</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Jose Javier Sesma</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Jose Javier Sesma</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Jose Javier Sesma</th>
                        <td>jojase@gamil.com</td>
                        <td>985266223</td>
                        <td class="acciones">
                            <div class="imagen">
                                <button type="button" class="boton-editar">
                                    <i class="bi bi-pencil-square" onclick="abrirEditarUsuarioDialog()"></i>
                                </button>
                                <button type="button" class="boton-quitar">
                                    <i class="bi bi-x-circle"></i>
                            </div>
                        </td>
                    </tr>

                </tbody>

                <!-- FIN contenido tabla-->
            </table>
        </div>
        </div>
        <!-- Inicio pop up de edicion de usuario -->

        <dialog id="editUsuario">
            <form onsubmit="enviarEditarUsuario(event)">
                <div class="forms">
                    <input type="text" class="form-control-sm" id="formpopup" placeholder="Correo">
                    <input type="text" class="form-control-sm" id="formpopup" placeholder="Nombre">
                    <input type="password" class="form-control-sm" id="formpopup" placeholder="Contraseña">
                </div>
                <br>
                <div class="rol">
                    <label>Rol: <select name="idRol">
                            <option value="1">Administrador</option>
                            <option value="2">Usuario</option>
                        </select>
                    </label>
                </div>
                <br>
                <button class="btn btn-outline-secondary" type="button" id="anyadir">Editar</button>
                <button class="btn btn-outline-secondary" type="button" id="cancelar"
                    onclick="return cerrarEditarUsuarioDialog()">Cancelar</button>
            </form>
        </dialog>

    </section>

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


    <!-- FIN DIV que tiene h1, filtrado y tabla-->
    </section>
    <!-- FIN section-->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
    <script src="../js/admin.js"></script>
</body>

</html>
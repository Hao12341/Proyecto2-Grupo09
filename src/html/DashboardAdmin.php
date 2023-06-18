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
    <nav id="menu"><a id="Logo" href="../index.html"><img src="../img/logo.svg" alt="Logo de la empresa"></a>
        <!-- Enlace a la página index.html, imagen de logo en la ruta especificada y alt = alternativa -->
        <div id="contenedorContenedorDesktop">
            <div id="separador"></div>
            <div id="contenedorMenuDesktop">
                <ul id="menuDesktop">
                    <li><a href="../index.html">Inicio</a></li>
                    <li><a onclick="logout()" href="#">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>

        <ul id="menuDesplegable">
            <li><a href="../index.html">Inicio</a></li>
            <li><a onclick="logout()" href="#">Cerrar sesión</a></li>

        </ul>


        <div id="iconosBanner">
            <!--<a id="Login" href="Login.html"><img id="iconoLogin" src="../img/perfilLogin.svg"
                                                 alt="Perfil Log In"></a> -->
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
        <form id="formAñadir" onsubmit="postUsuarios()">
            <div class="forms">
                <input type="text" name="email" class="form-control-sm" id="correoAñadir" placeholder="Correo" required oninput="validateEmail(event)">
                <input type="text" name="username" class="form-control-sm" id="usernameAñadir" placeholder="Username" required>
                <input type="text" name="nombre" class="form-control-sm" id="nombreAñadir" placeholder="Nombre" required>
                <input type="password" name="password" class="form-control-sm" id="contraseñaAañadir" placeholder="Contraseña" required>
                <input type="text" name="telefono" class="form-control-sm" id="telefonoAñadir" oninput="validatePhone(event)" placeholder="Teléfono"
                       required>
                <!--TODO: arreglar css campos que no sean texto-->
                <input type="text" name="DNI" class="form-control-sm" id="DNIAñadir" placeholder="DNI" oninput="validateDNI(event)">
                <input type="text" name="dirección" class="form-control-sm" id="direccionAñadir" placeholder="Dirección">

            </div>
            <br>
            <div class="rol">
                <label>Rol: <select name="rol">
                        <option value="1">Administrador</option>
                        <option value="3">Técnico</option>
                        <option value="4">Usuario</option>
                    </select>
                </label>
            </div>


            <br>
            <button class="btn btn-outline-secondary" type="submit">Añadir</button>
            <button class="btn btn-outline-secondary" type="button" id="cancelar-btn">Cancelar</button>
        </form>
    </dialog>


    <div class="pestañas">
        <button class="pestaña" id="pestaña1" onclick="mostrarTabla(1)">Usuario</button>
        <button class="pestaña" id="pestaña2" onclick="mostrarTabla(2)">Técnico</button>
        <button class="pestaña" id="pestaña3" onclick="mostrarTabla(3)">Administrador</button>
    </div>

    <div id="tabla1" class="tabla">
        <table id="tablaUser" class="table table-striped">
            <thead>
            <tr>
                <th>Nombre Usuario</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
            </thead>

            <!-- FIN contenido tabla-->
        </table>
    </div>
    <div id="tabla2" class="tabla" style="display: none;">
        <table id="tablaTecnico" class="table table-striped">
            <thead>
            <tr>
                <th>Nombre Usuario</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            </tbody>

            <!-- FIN contenido tabla-->
        </table>
    </div>
    <div id="tabla3" class="tabla" style="display: none;">
        <table id="tablaAdmin" class="table table-striped">
            <thead>
            <tr>
                <th>Nombre Usuario</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th class="accionesH">Acciones</th>
            </tr>
            </thead>
            <tbody>
            </tbody>

            <!-- FIN contenido tabla-->
        </table>
    </div>
    </div>
    <!-- Inicio pop up de edicion de usuario -->

    <dialog id="editUsuario">
        <form id="editarUsuarioForm">
            <div class="forms">
                <input type="text" name="email" class="form-control-sm" id="emailEditar" placeholder="Correo: jojase@gamil.com" required>
                <input type="text" name="nombre" class="form-control-sm" id="nombreEditar" placeholder="Nombre: Inés Vidal Ruiz" required>
                <input type="text" name="DNI" class="form-control-sm" id="dniEditar" placeholder="DNI: 00000000A" required>
                <input type="text" name="username" class="form-control-sm" id="usernameEditar" placeholder="Usuario: Ines" required>
                <input type="password" name="password" class="form-control-sm" id="passwordEditar" placeholder="Contraseña" required>
                <input type="text" name="direccion" class="form-control-sm" id="direccionEditar" placeholder="Dirección" required>
                <div id="idRolEditar"></div>
            </div>
            <br>
            <button class="btn btn-outline-secondary" type="submit" id="anyadir">Editar</button>
            <button class="btn btn-outline-secondary" type="button" id="cancelar"
                    onclick="return cerrarEditarUsuarioDialog()">Cancelar
            </button>
        </form>
    </dialog>

    <dialog id="ConfirmacionEliminar">
        <h3 id="mensaje">¿Estás seguro de que quieres eliminar al usuario </h3>
        <button class="btn btn-outline-secondary" id="correcto" type="button">SÍ</button>
        <button class="btn btn-outline-secondary" id="cerrarr" type="button">NO</button>
    </dialog>



</section>


</section>
<!-- FIN section-->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
<script src="../js/cerrarSesion.js"></script>
<script src="../js/devuelveUsuariosAdmin.js"></script>


<script src="../js/admin.js"></script>

<script src="../js/cerrarSesion.js"></script>

<script src="../js/adminBBDD.js"></script>
<script>
    crearTodasTablas()
</script>

</body>

</html>
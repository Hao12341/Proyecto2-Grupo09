<?php
if (!isset($peticion)) {
    http_response_code(500);
    die();
}

// verificar rol de administrador
if($_SESSION['user']['idRol'] !== "4") {
    http_response_code(401);
    die();
}

require_once "includes/connexion.php";
if (!isset($connexion)) die();

$idUsuario = intval($peticion->parametrosPath()[0]);

if($idUsuario === 0)
{
    http_response_code(400);
    die();
}




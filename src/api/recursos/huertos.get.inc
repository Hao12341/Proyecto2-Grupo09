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

$idHuerto = intval($peticion->parametrosPath()[0]);

if($idHuerto === 0)
{
    http_response_code(400);
    die();
}

$sql = "SELECT `huertos`.`IdHuerto` AS `id`,
       `huertos`.`NombreHuerto` AS `Nombre`,
       `huertos`.`Localización` AS `Dirección`
FROM `huertos`
         INNER JOIN `usuarios` `u` on `huertos`.`UsuarioPropietario` = `u`.`IdUsuario`
WHERE `u`.`IdUsuario` = $idHuerto" ;


    $result = mysqli_query($connexion,$sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $salida[] = $row;
    }



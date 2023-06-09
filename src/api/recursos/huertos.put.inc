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

require_once 'includes/connexion.php';
if (!isset($connexion)) die();

$id = intval($peticion->parametrosPath()[0]);
$objeto = json_decode(file_get_contents('php://input'));
$nombre = $objeto->Nombre;

$sql = "UPDATE `huertos` SET `NombreHuerto` = '$nombre'  WHERE `huertos`.`IdHuerto` = 1";
try {
    mysqli_query($connexion, $sql);
    http_response_code(200);
} catch (Exception $exception) {
    http_response_code(500);
    // podemos usar mysqli_errno para concretar el código de respuesta
    die(mysqli_errno($connexion));
}







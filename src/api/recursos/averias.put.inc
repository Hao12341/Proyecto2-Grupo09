<?php
if(!isset($peticion)) {
    http_response_code(500);
    die();
}

// verificar rol de administrador
if($_SESSION['user']['idRol'] !== "3") {
    http_response_code(401);
    die();
}

require_once 'includes/connexion.php';
if (!isset($connexion)) die();

$id = intval($peticion->parametrosPath()[0]);
$idEstadoIncidencias = intval($peticion->parametrosBody()->idEstadoIncidencia);
$FechaFin = $peticion->parametrosBody()->FechaFin;

$connexion->query("set foreign_key_checks = 0");
$sql = "UPDATE incidencias set idEstadoIncidencia = '$idEstadoIncidencias', FechaFin = '$FechaFin'
where IdIncidencias = '$id'";

// Para comprobar si se ha ejecutado correctamente la sentencia usamos try ... catch
try {
    mysqli_query($connexion, $sql);
    http_response_code(200);
} catch (Exception $exception) {
    http_response_code(500);
    // podemos usar mysqli_errno para concretar el código de respuesta
    die(mysqli_errno($connexion));
}
$connexion->query("set foreign_key_checks = 1");
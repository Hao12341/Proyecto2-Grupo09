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


$sql = "SELECT mediciones.fecha, mediciones.Medida, unidades.Unidad
FROM mediciones 
JOIN sensores ON mediciones.idMediciones = sensores.idMediciones
JOIN unidades ON sensores.Unidades = unidades.IdUnidades
JOIN sondas ON sensores.NumSonda = sondas.IdSonda
WHERE sondas.NumHuerto = $idHuerto";

$result = mysqli_query($connexion,$sql);
while ($row = mysqli_fetch_assoc($result)) {
    $salida[] = $row;
}


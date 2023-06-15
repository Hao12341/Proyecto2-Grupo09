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


$sql = "SELECT fecha as fecha, medida as medida ,TipoSensor as tipoMedida  FROM mediciones
INNER JOIN sensores on mediciones.IdSensor = sensores.IdSensor
INNER JOIN tipossensores on sensores.IdTipoSensor = tipossensores.IdTipoSensor
INNER JOIN sondas on sensores.NumSonda = sondas.IdSonda
WHERE NumHuerto = $idHuerto";

$result = mysqli_query($connexion,$sql);
while ($row = mysqli_fetch_assoc($result)) {
    $salida[] = $row;
}


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


$sql = "SELECT mediciones.fecha, mediciones.Medida, u.Unidad
FROM mediciones
         INNER JOIN sensores s on mediciones.IdSensor = s.IdSensor
                                      and mediciones.Unidades = s.Unidades
                                      and mediciones.NumSonda = s.NumSonda
JOIN sondas s2 on s2.IdSonda = s.NumSonda
JOIN unidades u on u.IdUnidades = s.Unidades
WHERE s2.NumHuerto = $idHuerto";

$result = mysqli_query($connexion,$sql);
while ($row = mysqli_fetch_assoc($result)) {
    $salida[] = $row;
}


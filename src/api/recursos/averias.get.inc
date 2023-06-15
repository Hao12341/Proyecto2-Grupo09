<?php
if (!isset($peticion)) {
    http_response_code(500);
    die();
}

// verificar rol de administrador
if($_SESSION['user']['idRol'] !== "3") {
    http_response_code(401);
    die();
}

require_once "includes/connexion.php";
if (!isset($connexion)) die();

$sql = "SELECT FechaIni as fechaIni,FechaFin as fechaFin,`incidencias`.`IdIncidencias` as `id`, 
       `incidencias`.`TipoIncidencia` as tipoIncidencias,
       `incidencias`.NivelGravedad as nivelGravedad,
       `EI`.`Valor Estado` as estado,
       sensores.`IdSensor` as `idSesnor`,
       `t`.`TipoSensor` as `tipoSensor`,
       huertos.UsuarioPropietario as idUsuario,
       `usuarios`.Nombre as `usuario`,
       usuarios.Dirección as dirección, 
       `sondas`.`IdSonda` as idSonda,
       huertos.IdHuerto as idHuerto
	FROM `incidencias` 
INNER JOIN EstadoIncidencia EI on incidencias.idEstadoIncidencia = EI.idEstadoIncidencia
INNER JOIN sensores on incidencias.NumSensor = sensores.IdSensor
INNER JOIN tipossensores t on sensores.IdTipoSensor = t.IdTipoSensor
INNER JOIN sondas on sensores.NumSonda = sondas.IdSonda
INNER JOIN huertos on sondas.NumHuerto = huertos.IdHuerto
INNER JOIN usuarios on huertos.UsuarioPropietario = usuarios.IdUsuario
where FechaFin is not null
		";

// Si hay parámetros en el path
if (count($peticion->parametrosPath()) > 0) {
    // ejecutamos la sentencia SQL añadiéndole el filtrado por la id
    $result = mysqli_query($connexion, $sql . "and `incidencias`.`IdIncidencias` = " . intval($peticion->parametrosPath()[0]));
    // como solo esperamos un resultado, lo ponemos como salida
    $salida = mysqli_fetch_assoc($result);
} else {
    $result = mysqli_query($connexion, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $salida[] = $row;
    }
}


<?php
if(!isset($peticion)) {
	http_response_code(500);
	die();
}

// verificar rol de administrador
if($_SESSION['user']['idRol'] !== "1") {
	http_response_code(401);
	die();
}

require_once 'includes/connexion.php';
if (!isset($connexion)) die();

$id = intval($peticion->parametrosPath()[0]);
$nombre = $peticion->parametrosBody()->nombre;
$rol = intval($peticion->parametrosBody()->idRol);
$DNI = $peticion->parametrosBody()->DNI;
$password = $peticion->parametrosBody()->password;


$sql = "UPDATE `usuarios` SET `nombre`='$nombre',`rol`=$rol,
               `DNI`='$DNI', `Contraseña` = '$password'
                  WHERE `IdUsuario` = '$id'";

// Para comprobar si se ha ejecutado correctamente la sentencia usamos try ... catch
try {
	mysqli_query($connexion, $sql);
	http_response_code(200);
} catch (Exception $exception) {
	http_response_code(500);
	// podemos usar mysqli_errno para concretar el código de respuesta
	die(mysqli_errno($connexion));
}
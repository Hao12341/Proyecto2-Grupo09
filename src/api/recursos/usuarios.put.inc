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
$DNI = $peticion->parametrosBody()->DNI;
$password = $peticion->parametrosBody()->password;
$direccion = $peticion->parametrosBody()->direccion;
$username = $peticion->parametrosBody()->username;
$email = $peticion->parametrosBody()->email;


$sql = "UPDATE `usuarios` SET `nombre`='$nombre',
               `DNI`='$DNI', `Contraseña` = '$password'
                  , `Dirección` = '$direccion', `UserName` = '$username',
                    `email` = '$email'
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
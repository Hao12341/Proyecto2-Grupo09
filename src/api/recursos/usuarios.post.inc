<?php
if (!isset($peticion)) {
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

$nombre = $peticion->parametrosPost()['nombre'];
$password = $peticion->parametrosPost()['password'];
$rol = $peticion->parametrosPost()['rol'];
$email = $peticion->parametrosPost()['email'];
$direccion = $peticion->parametrosPost()['dirección'];
$telefono = $peticion->parametrosPost()['telefono'];
$DNI = $peticion->parametrosPost()['DNI'];
$username = $peticion->parametrosPost()['username'];

$sql = "INSERT INTO `usuarios` (Rol, Nombre, Contraseña, email, Dirección, Teléfono, DNI, UserName) 
		VALUES ('$rol', '$nombre', '$password', '$email', '$direccion','$telefono', '$DNI', '$username' )";

// Para comprobar si se ha ejecutado correctamente la sentencia usamos try ... catch
try {
	mysqli_query($connexion, $sql);
	http_response_code(200);
} catch (Exception $exception) {
	http_response_code(500);
	// podemos usar mysqli_errno para concretar el código de respuesta
	die(mysqli_errno($connexion));
}
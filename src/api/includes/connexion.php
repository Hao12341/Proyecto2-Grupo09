<?php
$bbdd_servidor = 'aesccar.upv.edu.es';
$bbdd_nombre = 'aesccar_gti09';
$bbdd_user = 'aesccar_user';
$bbdd_password = 'SQLUser@2023';

try {
	$connexion = mysqli_connect($bbdd_servidor, $bbdd_user, $bbdd_password, $bbdd_nombre);
} catch (Exception $e) {
	http_response_code(500);
	die("Error: " . mysqli_connect_errno() . " " . mysqli_connect_error());
}

mysqli_query($connexion, 'SET NAMES utf8mb4');
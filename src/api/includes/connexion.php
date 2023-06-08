<?php
$bbdd_servidor = 'sql8.freesqldatabase.com';
$bbdd_nombre = 'sql8624327';
$bbdd_user = 'sql8624327';
$bbdd_password = 'T9iDtrYzyY';

try {
	$connexion = mysqli_connect($bbdd_servidor, $bbdd_user, $bbdd_password, $bbdd_nombre);
} catch (Exception $e) {
	http_response_code(500);
	die("Error: " . mysqli_connect_errno() . " " . mysqli_connect_error());
}

mysqli_query($connexion, 'SET NAMES utf8mb4');
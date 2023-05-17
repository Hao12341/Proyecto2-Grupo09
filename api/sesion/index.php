<?php
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        session_start();
        if(!isset($_SESSION['user'])) {
            http_response_code(401);
        } else {
            http_response_code(200);
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE');
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($_SESSION ['user']);
        }
        break;
    case 'POST':
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

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT `usuarios`.`IdUsuario`, 
       `usuarios`.`email`, 
       `roles`.`idRol`, 
       `roles`.`Rol` 
	FROM `usuarios` 
		INNER JOIN `roles` ON `usuarios`.`Rol` = `roles`.`idRol`
	WHERE `usuarios`.`email` = '$email' AND `usuarios`.`Contraseña` = '$password'";


        $resultado = mysqli_query($connexion, $sql);

        if (mysqli_affected_rows($connexion) === 1) {
            $registro = mysqli_fetch_assoc($resultado);

            session_start();
            $_SESSION['user'] = $registro;

            $salida = [];
            $salida['id'] = $registro['IdUsuario'];
            $salida['email'] = $registro['email'];
            $salida['rol'] = $registro['idRol'];

            http_response_code(200);

            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE');
            header('Content-Type: application/json; charset=utf-8');

            echo json_encode($salida);
        } else {
            http_response_code(401);
        }
        break;
    case 'DELETE':
        // Inicializar la sesión.
        session_start();

        // Destruir todas las variables de sesión.
        $_SESSION = array();

        // Si se desea destruir la sesión completamente, borre también la cookie de sesión.
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finalmente, destruir la sesión.
        session_destroy();
        break;
    default:
        http_response_code(405);
}

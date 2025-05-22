<?php

include_once("views/View.php");

class usuarioController {

    /*
        Inicia sesión del usuario
    */
    public function iniciarSesion() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once("models/usuario.php");
            $userDAO = new UserDAO();
            $user = $userDAO->iniciarSesion($_POST['NOMBRE'], $_POST['CONTRA']);

            if ($user) {
                // Iniciaremos sesión y almacenamos el rol del usuario
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['usuario'] = $user;
                
            } else {
                // Mostrará mensaje de error
                $error = "Nombre o contraseña incorrectos";
                View::show("login", ['error' => $error]);
            }
        } else {
            View::show("login");
        }
    }

    public function cerrarSesion() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        header("Location: index.php?controller=usuarioController&action=iniciarSesion");
        exit();
    }
}
?>

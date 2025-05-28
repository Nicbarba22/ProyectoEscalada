<?php

include_once("views/View.php");

class usuarioController {

    /*
        Inicia sesión del usuario
        Parámetros: no tiene
        Retorna: no tiene, redirige a la vista correspondiente según el rol del usuario
    */
    public function iniciarSesion() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once("models/usuario.php");
            $userDAO = new UserDAO();
            $user = $userDAO->iniciarSesion($_POST['NOMBRE'], $_POST['CONTRA']);

            if ($user) {
                // Iniciar sesión y almacenar el rol del usuario
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['usuario'] = $user;

                // Redirigir según el rol (opcional)
                if (isset($user['rol']) && $user['rol'] == 'admin') {
                    header("Location: index.php?controller=eventsController&action=MostrarEventos");
                    exit();
                } else {
                    header("Location: index.php?controller=eventsController&action=MostrarEventos");
                    exit();
                }
            } else {
                // Mostrar mensaje de error
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
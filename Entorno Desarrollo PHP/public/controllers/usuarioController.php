<?php

include_once("views/View.php");

class usuarioController {

    /*
        Inicia sesión del usuario
       - Si recibe datos por POST, valida las credenciales con el modelo.
        - Si son correctas, guarda el usuario y su rol en la sesión.
        - Redirige a la vista de eventos según el rol.
        - Si falla, muestra el login con un mensaje de error.
    */
    public function iniciarSesion() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once("models/usuario.php");
            $userDAO = new UserDAO();
            $user = $userDAO->iniciarSesion($_POST['NOMBRE'], $_POST['CONTRA']);

            if ($user) {
                 // Si las credenciales son válidas, se inicia sesión y se almacena el usuario y su rol
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['usuario'] = $user;

                $_SESSION['rol'] = $user['rol'];

                // Redirigir según el rol (opcional)
                if (isset($user['rol']) && $user['rol'] == 'admin') {
                    header("Location: index.php?controller=eventsController&action=MostrarEventos");
                    exit();
                } else {
                    header("Location: index.php?controller=eventsController&action=MostrarEventos");
                    exit();
                }
            } else {
              // Si las credenciales no son válidas, vuelve al login con un error
                $error = "Nombre o contraseña incorrectos";
                View::show("login", ['error' => $error]);
            }
        } else {
            // Si no es POST, simplemente muestra el formulario de login
            View::show("login");
        }
    }
     /*
        Cierra la sesión actual del usuario.
        Limpia todas las variables de sesión y redirige al login.
    */

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
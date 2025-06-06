<?php


/**
 *  Controlador de eventos. Implementará todas las acciones que se puedan llevar a cabo desde las vistas
 * que afecten a eventos.
 */
include_once("views/View.php");
include_once("models/eventos.php");

class eventsController
{


    /**
     * Método que obtiene todos los eventos de la BBDD y los muestra a través de la vista MostrarEventos.
     */
    public function MostrarEventos()
    {
        $eDAO = new EventosDAO();
        $eventos = $eDAO->MostrarEventos();
        View::show("listaeventos", $eventos);
    }

        public function aniadirEvento (){
        $errores = array();

        if (isset($_POST['insertar'])) {
            if (!isset($_POST['nombre']) || strlen(trim($_POST['nombre'])) == 0)
                $errores['nombre'] = "El nombre no puede estar vacío.";
            if (!isset($_POST['descripcion']) || strlen(trim($_POST['descripcion'])) < 10)
                $errores['descripcion'] = "La descripción debe tener al menos 10 caracteres.";
            if (!isset($_POST['precio']) || !is_numeric($_POST['precio']) || floatval($_POST['precio']) < 0)
                $errores['precio'] = "El precio debe ser un número positivo.";
            if (!isset($_POST['imagen']) || strlen(trim($_POST['imagen'])) == 0)
                $errores['imagen'] = "La imagen no puede estar vacía.";
            if (!isset($_POST['fecha']) || strlen(trim($_POST['fecha'])) == 0)
                $errores['fecha'] = "La fecha no puede estar vacía.";
            if (empty($errores)) {
                include_once("models/eventos.php");
                $eDAO = new EventosDAO();
                if ($eDAO->insertEvento($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['imagen'], $_POST['fecha']))
                    $this->MostrarEventos();

                else {
                    $errores['general'] = "Problemas al insertar el evento.";
                    View::show("addEvento", $errores);
                }
            } else {
                View::show("addEvento", $errores);
            }
        } else {
            View::show("addEvento", null);
        }
    }

public function registrarEnEvento() {
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Recuperamos la información del usuario y el evento desde sesión y la URL

    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php?controller=usuarioController&action=iniciarSesion");
        exit();
    }

    // Comprobar si se ha pasado un ID de evento 
    if (!isset($_GET['evento_id'])) {
        echo "Evento no especificado.";
        return;
    }

    $usuario = $_SESSION['usuario'];
    $evento_id = $_GET['evento_id'];

    // Si el usuario no tiene ID registrado en BD, lo llevamos a registrarse
    if (!isset($usuario['id'])) {
        View::show("formRegistroUsuario", ["evento_id" => $evento_id]);
        return;
    }

    // Si sí tiene ID, mostrar formulario de inscripción
    View::show("inscripcionUsuario", ["evento_id" => $evento_id, "usuario_id" => $usuario['id']]);
}

public function eliminar() {
    session_start();
    if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
        // Redirigir o mostrar error si no es admin
        header("Location: index.php?controller=eventsController&action=listaEventos");
        exit;
    }

    // Comprobamos si se ha enviado un ID de evento para eliminar

    if (isset($_POST['evento_id'])) {
        $id = $_POST['evento_id'];

        // Conexión y borrado
        include_once 'models/eventos.php'; 
        $eventoDAO = new EventosDAO();
        $eventoDAO->eliminarEvento($id);
    }

    // Redirigir de nuevo al listado
    header("Location: index.php?controller=eventsController&action=MostrarEventos");
    exit;
}

// Si la petición se ha hecho correctamente por POST 
// cargamos el modelo que gestiona las inscripciones
public function guardarInscripcion() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once("models/inscripcion.php");

        $usuario_id = $_POST['usuario_id'];
        $evento_id = $_POST['evento_id'];
        $metodo_pago = $_POST['metodo_pago'];
        $hora = $_POST['hora'];
        $edad = $_POST['edad'];

        // Usamos el modelo para guardar en la base de datos todos los datos 
        // de la inscripción (usuario, evento, método de pago, hora y edad)
        
        $iDAO = new InscripcionDAO();
        $resultado = $iDAO->guardarInscripcion($usuario_id, $evento_id, $metodo_pago, $hora, $edad);

        if ($resultado) {
            View::show("mensajeOK", ["mensaje" => "¡Te has inscrito con éxito al evento!"]);
        } else {
            View::show("mensajeError", ["mensaje" => "Error al guardar la inscripción."]);
        }
    } else {
        echo "Acceso no permitido.";
    }
}
}
?>
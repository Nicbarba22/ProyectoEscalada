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
            if (!isset($_POST['descripcion']) || strlen(trim($_POST['descripcion'])) < 0)
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


}
?>
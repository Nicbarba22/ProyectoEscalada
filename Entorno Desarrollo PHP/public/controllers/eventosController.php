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
}
?>
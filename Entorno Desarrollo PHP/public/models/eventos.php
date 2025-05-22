<?php
include_once('ddbb/conexion.php');

class EventosDAO {

    public $db_con;

    /**
     * Funcion para abrir conexion a la base de datos
     */
    public function __construct() {
        $this->db_con = Database::open_connection();
    }

    /**
     * Consulta para mostrar todo lo que hay en la tabla eventos de la base de datos
     */
    public function MostrarEventos() {
        $stmt = $this->db_con->prepare("SELECT * FROM eventos");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}
?>
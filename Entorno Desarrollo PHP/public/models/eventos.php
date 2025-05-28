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
        $stmt = $this->db_con->prepare("SELECT * FROM evento ORDER BY fecha DESC");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insertEvento($nombre, $descripcion, $precio, $imagen, $fecha) {
        $stmt = $this->db_con->prepare("INSERT INTO evento (nombre, descripcion, precio, imagen, fecha) VALUES (:nombre, :descripcion, :precio, :imagen, :fecha)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':fecha', $fecha);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


}
?>
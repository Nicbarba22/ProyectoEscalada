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
     * Devuelve todos los eventos ordenados por fecha descendente.
     * Se usa para mostrar el listado de eventos al usuario.
     */

    public function MostrarEventos() {
        $stmt = $this->db_con->prepare("SELECT * FROM evento ORDER BY fecha DESC");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }
      /**
     * Inserta un nuevo evento en la base de datos con los datos recibidos del formulario.
     * Devuelve true si fue exitoso, false si hubo error.
     */

    public function insertEvento($nombre, $descripcion, $precio, $imagen, $fecha) {
        $stmt = $this->db_con->prepare("INSERT INTO evento (nombre, descripcion, precio, imagen, fecha) VALUES (:nombre, :descripcion, :precio, :imagen, :fecha)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':fecha', $fecha);

        try {
            return $stmt->execute(); // Devuelve true si se insertó correctamente
        } catch (PDOException $e) {
            echo $e->getMessage(); // Muestra error por pantalla 
            return false;
        }
    }

       /**
     * Elimina un evento de la base de datos por su ID.
     * Primero borra todas las inscripciones asociadas a ese evento.
     */
    public function eliminarEvento($id) {
    $this->db_con->prepare("DELETE FROM inscripciones WHERE evento_id = ?")->execute([$id]); // Borra inscripciones vinculadas

    $stmt = $this->db_con->prepare("DELETE FROM evento WHERE id = ?"); // Borra el evento en sí
    return $stmt->execute([$id]);
}
}
?>
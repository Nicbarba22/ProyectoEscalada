<?php
include_once("ddbb/conexion.php");

class InscripcionDAO {
    public $db_con;

     /**
     * Constructor que establece la conexión a la base de datos usando la clase Database.
     */

    public function __construct() {
        $this->db_con = Database::open_connection();
    }

      /**
     * Guarda una nueva inscripción en la base de datos.
     * Recibe los datos del formulario y los inserta en la tabla 'inscripciones'.
     * Devuelve true si todo va bien, o false si hay un error.
     */

    public function guardarInscripcion($usuario_id, $evento_id, $metodo_pago, $hora, $edad) {
        $stmt = $this->db_con->prepare("INSERT INTO inscripciones (usuario_id, evento_id, metodo_pago, hora, edad) 
                                        VALUES (:usuario_id, :evento_id, :metodo_pago, :hora, :edad)");
        $stmt->bindParam(':usuario_id', $usuario_id);
        $stmt->bindParam(':evento_id', $evento_id);
        $stmt->bindParam(':metodo_pago', $metodo_pago);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':edad', $edad);

        try {
            return $stmt->execute(); // Ejecuta el INSERT y devuelve true si se realiza correctamente
        } catch (PDOException $e) {
            echo $e->getMessage();  // Muestra el error si algo falla
            return false;
        }
    }
}
?>
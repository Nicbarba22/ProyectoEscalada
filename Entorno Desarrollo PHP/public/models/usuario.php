<?php

include_once('ddbb/conexion.php');

/**
 * Clase de acceso a datos para la tabla usuarios. Implementa todos los métodos que necesiten atacar
 * la tabla usuarios de la base de datos.
 */
class UserDAO
{
    // Atributo con la conexión a la BBDD.
    public $db_con;

    // Constructor que inicializa la conexión a la BBDD.
    public function __construct()
    {
        $this->db_con = Database::open_connection();
    }

    /*
        Inicia sesión del usuario
        Parámetros: 
            $NOMBRE, nombre del usuario
            $CONTRA, contraseña del usuario
        Retorna: array asociativo con los detalles del usuario si la autenticación es exitosa, null en caso contrario
    */
    public function iniciarSesion($NOMBRE, $CONTRA)
    {
        $stmt = $this->db_con->prepare("SELECT * FROM usuario WHERE nombre = :nombre AND password = :password");
        $stmt->bindParam(':nombre', $NOMBRE);
        $stmt->bindParam(':password', $CONTRA);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
}
?>
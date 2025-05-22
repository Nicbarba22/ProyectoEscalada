<?php

class Database {

    /**
     * Conexion con la base de datos
     */

    public static function open_connection(){
        try{
            /**
             * Parametros de conexion
             */
            $host = "mariadb";
            $dbname = "escalada";
            $user = "root";
            $password = "changepassword";
        
            $dsn = "mysql:host=$host;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);

            return $dbh;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }  
    }

}

?>
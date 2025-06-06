<?php
/*    
    Clase View para mostrar una vista. Contiene un método estático que deberá ser invocado
    desde cualquier controlador cuando hay que mostrar una vista.
*/
class View {
    
    /*
        Método estático que muestra una vista construyendo la cabecera la vista principal
        y el pie de página se pueden pasar datos a la vista mediante el parámetro \$data 
        Parámetros 
        \$viewName nombre de la vista a mostrar
        \$data array indexado con los datos para la vista puede ser null si no se necesitan datos
        Retorna no tiene retorno incluye los archivos de cabecera vista y pie de página

    */
    public static function show ($viewName, $data=null){
        include_once ("header.php");
       include_once($viewName . ".php");
        include_once ("footer.php");
    }
}
?>

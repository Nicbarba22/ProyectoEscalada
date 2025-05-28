<?php

session_start();

include_once("views/header.php");
include_once("controllers/eventosController.php");
include_once("controllers/usuarioController.php");


// Punto de entrada a la aplicación. Si no se recibe parámetro action y controller en la url
// se muestra la página de inicio (texto HTML).
// En caso de que sí se reciba, se instancia el controlador y se invoca la acción indicada.

if (isset($_REQUEST['action']) && isset($_REQUEST['controller'])) {
    $act = $_REQUEST['action'];
    $cont = $_REQUEST['controller'];

    // Instanciación del controlador e invocación del método
    $controller = new $cont();
    $controller->$act();

} else {
    // // Página de entrada: mostrar eventos
    // echo '<div class="d-flex justify-content-center mt-4">';
    // echo '<h1 class="text-dark ">Vive la experiencia Roca Viva</h1>';
    // echo '</div>';
    // echo '<div class="d-flex justify-content-center mt-5 mb-5">';
    // echo '<a href="index.php?controller=eventsController&action=MostrarEventos" class="btn btn-secondary me-2">Mostrar Eventos</a>';
    // echo '</div>';

// Página de entrada: estilo "ESCALADOR"
echo '
</head>
<body>


<!-- Sección Hero -->
<div class="hero d-flex align-items-center justify-content-center text-center">
    <div class="overlay"></div>
    <div class="hero-content">
        <h1>ESCALADA</h1>
        <a href="index.php?controller=eventsController&action=MostrarEventos" class="btn btn-conoceme mt-4">
            EVENTOS ↓
        </a>
    </div>
</div>

';

}

require_once("views/footer.php");

?>
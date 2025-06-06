<?php
ob_start();
session_start();

include_once("controllers/eventosController.php");
include_once("controllers/usuarioController.php");


// Punto de entrada a la aplicación. Si no se recibe parámetro action y controller en la url
// se muestra la página de inicio (texto HTML).
// En caso de que sí se reciba, se instancia el controlador y se invoca la acción indicada.

if (isset($_REQUEST['action']) && isset($_REQUEST['controller'])) {
    $act = $_REQUEST['action'];
    $cont = $_REQUEST['controller'];

include_once("views/header.php");

    // Instanciación del controlador e invocación del método
    $controller = new $cont();
    $controller->$act();

} else {
 
    include_once("views/header.php");

echo <<<HTML
</head>
<body>

<!-- Sección Hero con tarjetas más pequeñas y texto blanco -->
<div class="hero d-flex flex-column align-items-center justify-content-center text-center">
    <div class="overlay"></div>
    <div class="hero-content">
        <h1>ESCALADA</h1>
        <a href="index.php?controller=eventsController&action=MostrarEventos" class="btn btn-conoceme mt-4">
            EVENTOS ↓
        </a>

        <!-- Eventos destacados -->
        <div class="container mt-5">
            <h2 class="mb-4" style="color: white;">¡Nuestros eventos mejor valorados!</h2>
            <div class="row justify-content-center">

                <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="card shadow border-0">
                       <img src="assets/img/evento1.png" class="card-img-top" alt="Evento 1" style="height: 140px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title">ClimbFest Granada</h5>
                            <a href="index.php?controller=eventsController&action=MostrarEventos#climbfest" class="btn btn-primary mt-2">Ver más</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="card shadow border-0">
                        <img src="assets/img/evento2.png" class="card-img-top" alt="Evento 2" style="height: 140px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Master Escalada Barcelona</h5>
                            <a href="index.php?controller=eventsController&action=MostrarEventos#barcelona" class="btn btn-primary mt-2">Ver más</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="card shadow border-0">
                        <img src="assets/img/evento3.png" class="card-img-top" alt="Evento 3" style="height: 140px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Ruta Vertical Madrid</h5>
                            <a href="index.php?controller=eventsController&action=MostrarEventos#madrid" class="btn btn-primary mt-2">Ver más</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
HTML;


}

require_once("views/footer.php");

?>
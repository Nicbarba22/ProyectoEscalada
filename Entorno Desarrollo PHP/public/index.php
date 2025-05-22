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
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: "Montserrat", sans-serif;
        }
        .hero {
            background-image: url("assets/img/fondo.png"); /* Reemplaza con la ruta real */
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
            color: white;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.4);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
        .hero h1 {
            font-size: 6rem;
            font-weight: bold;
            letter-spacing: 2px;
        }
        .btn-conoceme {
            background-color: black;
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: bold;
            border: none;
            letter-spacing: 1px;
        }
        .btn-conoceme:hover {
            background-color: #222;
        }
        .navbar-nav .nav-link {
            font-weight: bold;
            color: black !important;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
}

}

    </style>
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
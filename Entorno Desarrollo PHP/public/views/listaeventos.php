<?php

/** Titulo */
echo "<div class='container mt-4'>";
echo "<h1>Eventos</h1>";
echo "<div class='row'>";

/**
 * Bucle para mostrar toda la informacion que se recoge de la base de datos
 */
foreach ($data as $evento) {
    echo "<div class='col-md-12 mb-3'>";
    echo "<div class='card flex-row sombra' style='background-color: rgb(245, 245, 245); border: 1px solid #ccc;'>";
    echo "<div class='col-md-4 p-2 d-flex align-items-center'>";
    /** Linea para la imagen */
    echo "<img src='assets/img/" . htmlspecialchars($evento['imagen']) . "' class='img-fluid rounded' alt='" . htmlspecialchars($evento['nombre']) . "' style='max-height: 200px; object-fit: cover; width: 100%;'>";
    echo "</div>";
    echo "<div class='col-md-8 p-3'>";
    echo "<div class='card-body'>";
    /** Linea para el nombre */
    echo "<h5 class='card-title'>" . htmlspecialchars($evento['nombre']) . "</h5>";
    /** Linea para la fecha */
    echo "<p class='card-text mb-1'><strong>Fecha:</strong> " . htmlspecialchars($evento['fecha']) . "</p>";
    /** Linea para la ubicacion */
    echo "<p class='card-text mb-1'><strong>Ubicación:</strong> " . htmlspecialchars($evento['ubicacion']) . "</p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

echo "</div>";
echo "</div>";

?>


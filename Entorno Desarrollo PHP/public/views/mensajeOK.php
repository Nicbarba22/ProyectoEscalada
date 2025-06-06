<!-- Contenedor principal con margen superior -->
<div class="container mt-5">
    <div class="alert alert-success text-center" role="alert">
        <?php 
        if (isset($data['mensaje'])) {
            echo htmlspecialchars($data['mensaje']);
        } else {
            echo "Acción completada con éxito.";
        }
        ?>
    </div>
        <!-- Botón para volver a la lista de eventos -->
    <div class="text-center">
        <a href="index.php?controller=eventsController&action=MostrarEventos" class="btn btn-primary">Volver a los eventos</a>
    </div>
</div>

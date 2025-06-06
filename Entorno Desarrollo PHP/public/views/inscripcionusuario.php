<div class="container mt-5 mb-5">
    <h2 class="text-center">Inscribirse en el evento</h2>

    <form action="index.php?controller=eventsController&action=guardarInscripcion" method="POST" class="mt-4">
        <!-- Campos ocultos con IDs -->
        <input type="hidden" name="usuario_id" value="<?php echo htmlspecialchars($data['usuario_id']); ?>">
        <input type="hidden" name="evento_id" value="<?php echo htmlspecialchars($data['evento_id']); ?>">

        <!-- Método de pago -->
        <div class="mb-3">
            <label for="metodo_pago" class="form-label">Método de pago</label>
            <select class="form-control" name="metodo_pago" required>
                <option value="Tarjeta">Tarjeta</option>
                <option value="Transferencia">Transferencia</option>
                <option value="Bizum">Bizum</option>
            </select>
        </div>

        <!-- Hora -->
        <div class="mb-3">
            <label for="hora" class="form-label">Hora del evento</label>
            <input type="time" class="form-control" name="hora" required>
        </div>

        <!-- Edad -->
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" name="edad" required min="0">
        </div>

        <button type="submit" name="inscribirse" class="btn btn-primary">Confirmar inscripción</button>
    </form>
</div>

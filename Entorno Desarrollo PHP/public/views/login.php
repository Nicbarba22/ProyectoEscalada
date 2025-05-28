<!--
    Vista para iniciar sesión. Contiene el código HTML con el formulario así como el código PHP para
    mostrar errores de validación, en caso de existir.
-->
<div class="container mb-5 mt-5">
    <h1 class="text-center">Iniciar Sesión</h1>
    <div class= "caja">
    <form class="formulario" action="index.php?controller=usuarioController&action=iniciarSesion" method="POST">
        <div class="mb-3">
            <label for="NOMBRE" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="NOMBRE" name="NOMBRE">
            <?php
            /*
                Muestra un mensaje de error si el campo 'NOMBRE' tiene errores de validación
        
            */
            if (isset($data) && isset($data['NOMBRE']))
                echo "<div class='alert alert-danger'>"
                    . $data['NOMBRE'] .
                    "</div>";
            ?>
        </div>
        <div class="mb-3">
            <label for="CONTRA" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="CONTRA" name="CONTRA">
            <?php
            /*
                Muestra un mensaje de error si el campo 'CONTRA' tiene errores de validación
            
            */
            if (isset($data) && isset($data["CONTRA"]))
                echo "<div class='alert alert-danger'>"
                    . $data["CONTRA"] .
                    "</div>";
            ?>
        </div>
        <input class="form-control btn btn-primary" type="submit" name="iniciar" value="Iniciar">
    </form>
    </div>
    <div class="mt-3">
        <?php
        /*
            Muestra un mensaje de error general si existe
        
        */
        if (isset($data) && isset($data["error"])) {
            echo "<div class='alert alert-danger'>"
                . $data["error"] .
                "</div>";
        }
        ?>
    </div>
</div>
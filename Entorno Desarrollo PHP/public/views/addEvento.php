<!--
    Vista para añadir nuevos eventos. Contiene el código HTML con el formulario así como el código PHP para
    mostrar errores de validación, en caso de existir.
-->
<div class="container">
    <div class="row">
        <div class="col-12 mt-5 mb-5 caja">
            <div class="col-12 caja">
                <h2>Añadir evento</h2>
            </div>
            <h5>Introduce los datos del evento:</h5>

            <form class="form light formulario prueba" action="index.php?controller=eventsController&action=aniadirEvento"
                method="post">
                <div class="form-group">
                    <label class="form-label" for="nombre">Nombre:</label>
                    <input class="form-control" type="text" name="nombre" maxlength="100" value=""
                        placeholder="Nombre del evento"><br>
                    <?php
                    if (isset($data) && isset($data['nombre']))
                        echo "<div class='alert alert-danger'>"
                            . $data['nombre'] .
                            "</div>";
                    ?>
                </div>
                <div class="form-group">
                    <label class="form-label" for="descripcion">Descripción:</label>
                    <input class="form-control" type="text" name="descripcion"
                        placeholder="Descripción del evento"><br>
                    <?php
                    if (isset($data) && isset($data['descripcion']))
                        echo "<div class='alert alert-danger'>"
                            . $data['descripcion'] .
                            "</div>";
                    ?>
                </div>
                <div class="form-group">
                    <label class="form-label" for="precio">Precio:</label>
                    <input class="form-control" type="number" step="0.01" name="precio" value=""
                        placeholder="Precio del evento"><br>
                    <?php
                    if (isset($data) && isset($data['precio']))
                        echo "<div class='alert alert-danger'>"
                            . $data['precio'] .
                            "</div>";
                    ?>
                </div>
                <div class="form-group">
                    <label class="form-label" for="imagen">Imagen:</label>
                    <input class="form-control" type="text" name="imagen" maxlength="100" value=""
                        placeholder="evento.png"><br>
                    <?php
                    if (isset($data) && isset($data['imagen']))
                        echo "<div class='alert alert-danger'>"
                            . $data['imagen'] .
                            "</div>";
                    ?>
                </div>
                <div class="form-group">
                    <label class="form-label" for="fecha">Fecha:</label>
                    <input class="form-control" type="date" name="fecha" value=""><br>
                    <?php
                    if (isset($data) && isset($data['fecha']))
                        echo "<div class='alert alert-danger'>"
                            . $data['fecha'] .
                            "</div>";
                    ?>
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-success" type="submit" name="insertar" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</div>

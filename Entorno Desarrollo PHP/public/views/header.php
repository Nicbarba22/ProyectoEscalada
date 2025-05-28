<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Roca viva</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css" />
</head>

<body>

  <body>

<!-- Barra arriba -->

    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: rgb(36, 32, 23);">
      <div class="container-fluid">
<!-- imagen -->
        <a class="navbar-brand text-light p-lg-3" href="index.php">
          <img src="assets/img/logo.png" alt="" width="auto" height="100vh" />
        </a>
<!-- nombre -->
        <a class="navbar-brand text-light p-lg-3 d-none d-xxl-block"
          href="index.php?controller=eventsController&action=MostrarEventos#">Roca Viva</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          </ul>
<!-- boton eventos -->
          <div class="d-flex">
            <?php if (isset($_SESSION['usuario']) && isset($_SESSION['usuario']['nombre'])): ?>
              <span class="navbar-text text-light me-2">
                Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']['nombre']); ?>
              </span>
              <?php if (isset($_SESSION['usuario']['rol']) && $_SESSION['usuario']['rol'] == 'admin'): ?>
                <a href="index.php?controller=eventsController&action=aniadirEvento" class="btn btn-secondary me-2">
                  Registrar Evento
                </a>
              <?php endif; ?>
            <?php else: ?>
            <a href="index.php?controller=usuarioController&action=iniciarSesion" class="btn btn-secondary me-2">Iniciar Sesion</a>
            <?php endif; ?>
          </div>
          <div class="d-flex">
            <a href="index.php?controller=eventsController&action=MostrarEventos" class="btn btn-secondary me-2">Mostrar Eventos</a>

          </div>
          <?php if (isset($_SESSION['usuario'])): ?>
            <a href="index.php?controller=usuarioController&action=cerrarSesion" class="btn btn-danger me-2">Cerrar Sesión</a>
          <?php endif; ?>

        </div>
      </div>
    </nav>


</body>
</html>
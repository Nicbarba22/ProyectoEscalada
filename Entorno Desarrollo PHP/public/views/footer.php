
<footer class="text-center text-lg-start  text-muted">




  <section class="">
    <div class="container text-center text-md-start mt-5 border-top">
      <div class="row mt-3">

<!-- Columna 1 del footer -->

        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 p-4">
          <h6 class="text-uppercase fw-bold mb-4">Información</h6>
          <p>Horario:</p>
          <p>Lunes a Viernes: 8 a 19</p>
          <p>Sábados: 10 a 20</p>
        </div>

<!-- Columna 2 del footer -->

        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
          <p>
            <i class="fas fa-home me-3 text-secondary"></i> Av. Moreria, 37, 06800 Mérida (Badajoz)
          </p>
          <p>
            <i class="fas fa-envelope me-3 text-secondary"></i> info@rocaviva.com
          </p>
          <p>
            <i class="fas fa-phone me-3 text-secondary"></i> + 34 600 123 456
          </p>
        </div>
      </div>
    </div>
  </section>
  
<!-- Linea final del footer -->

  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025)">
    <p>Copyright: Nicolas Barba Domínguez © 2025 </p>
  </div>
</footer>

<!-- Bootstrap -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
  integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>

<script>
    function detalleEvento(nombre, descripcion, precio, imagen, fecha) {
      document.getElementById('modalEventName').innerText = nombre;
      document.getElementById('modalEventDescription').innerText = descripcion;
      document.getElementById('modalEventPrice').innerText = precio;
      document.getElementById('modalEventImage').src = 'assets/img/' + imagen;
      document.getElementById('modalEventDate').innerText = fecha  + ' €';
    }
</script>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" style="color: #24209d;" id="exampleModalLabel">Detalles del Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card mb-2">
          <div class="d-flex justify-content-center">
            <img id="modalEventImage" src="" class="card-img-top rounded" style="width: 80%; height: auto;" alt="Evento" />
          </div>
          <div class="card-body">
            <h5 class="card-title" id="modalEventName"></h5>
            <p class="card-text" id="modalEventDescription"></p>
            <p class="card-text"><strong>Fecha: </strong><span id="modalEventPrice"></span></p>
            <p class="card-text"><strong>Precio: </strong><span id="modalEventDate"></span></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../panel_empleado/styles/styles5.css">
  <title>Bienvenido</title>
  <!-- Enlaces a estilos y scripts externos -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Estilos personalizados -->
  <style>
    body {
      background-color: #8bacc7;
    }

    .input-group .required-icon {
      color: red;
      font-size: 12px;
      margin-left: 5px;
      vertical-align: middle;
    }
  </style>
</head>

<body>
  <!-- Barra de navegación -->
  <div>
    <ul class="navbar" id="myNavbar">
      <nav class="barra">
        <div class="logo">
          <img src="../panel_empleado/logo/jard.png" alt="logo de pagina">
        </div>
        <!-- Opciones de navegación -->
        <li><a href="../panel_empleado/empleado_panel.php">Inicio</a></li>
        <li><a href="../panel_empleado/hoja de vida eq/index.php">RLHV-E</a></li>
        <li><a href="../panel_empleado/computadores/index.php">Computadores</a></li>
        <li><a href="../panel_empleado/ubicacion/index.php">Ubicación</a></li>
        <li><a href="../panel_empleado/depreciacion/index.php">Depreciacion</a></li>
        <li><a class="boton-cerrar-sesion" onclick="confirmarCerrarSesion()">Cerrar sesión</a></li>
        <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">&#9776;</a>
      </nav>
    </ul>
  </div>

  <!-- Título y caja de bienvenida -->
  <div class="caja">
    <h1>Bienvenido a jard software (empleado)</h1>
    <img src="../panel_empleado/logo/jard.png" alt="Imagen">
  </div>

  <!-- Formulario para ingresar el NIT de la empresa -->
  <div class="container">
    <form id="nitForm" action="ruta-del-servidor/end-point" method="post">
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-prepend">
            <label for="nit" class="form-label">NIT de la Empresa:</label>
            <i class="fas fa-asterisk required-icon"></i>
          </div>
          <input type="text" id="nit" name="nit" class="form-input" placeholder="Ingrese el NIT" required>
        </div>
      </div>
      <!-- Botón para guardar -->
      <button type="submit" class="button">Guardar</button>
    </form>
  </div>

  <!-- Modal de éxito -->
  <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="successModalLabel">Exitoso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          NIT guardado correctamente.
        </div>
        <!-- Botón para aceptar y redirigir -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal"
            onclick="redirectToIndex()">Aceptar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Script personalizado -->
  <script src="../panel_empleado/script/script1.js"></script>

  <script>
    function redirectToIndex() {
  window.location.href = "../panel_empleado/hoja de vida eq/index.php";
}
  </script>
</body>

</html>


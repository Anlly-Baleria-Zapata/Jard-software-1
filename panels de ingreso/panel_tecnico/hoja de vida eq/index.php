<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../stylesBoostrap/style_hve.css">
  <title>Registro de Hoja de Vida del Equipo</title>
</head>
<body class="bg-light">
  <!-- Barra de navegación -->
  <nav class="navbar navbar-expand-lg sticky-top">
    <a class="navbar-brand" href="#">
      <img src="../logo/jard.png" alt="logo de pagina" style="width: 40px;"> jard
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="../tecnico_sistemas_panel.php">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="../hoja de vida eq/index.php">RLHV-E</a></li>
        <li class="nav-item"><a class="nav-link" href="../computadores/index.php">Computadores</a></li>
        <li class="nav-item"><a class="nav-link" href="../ubicacion/index.php">Ubicación</a></li>
        <li class="nav-item"><a class="nav-link" href="../depreciacion/index.php">Depreciacion</a></li>
        <li class="nav-item"><a class="nav-link" onclick="confirmarCerrarSesion()">Cerrar sesión</a></li>
      </ul>
    </div>
  </nav>

  <!-- Título de la página -->
  <div>
    <h1 class="titulo-principal">Registro de Hoja de Vida del Equipo</h1>
  </div>

  <!-- Contenedor del formulario -->
  <div class="container mt-5">
    <form id="registroForm" action="procesar_formulario.php" method="post">
      <div class="mb-3">
        <label for="id_equipo" class="form-label">ID del Equipo<span class="required">*</span></label>
        <input type="text" class="form-control" id="id_equipo" name="id_equipo" required>
      </div>
      <div class="mb-3">
        <label for="nombre_SO" class="form-label">Nombre del SO<span class="required">*</span></label>
        <input type="text" class="form-control" id="nombre_SO" name="nombre_SO" required>
      </div>
      <div class="mb-3">
        <label for="nombre_sistema" class="form-label">Nombre del Sistema<span class="required">*</span></label>
        <input type="text" class="form-control" id="nombre_sistema" name="nombre_sistema" required>
      </div>
      <div class="mb-3">
        <label for="modelo_sistema" class="form-label">Modelo del Sistema<span class="required">*</span></label>
        <input type="text" class="form-control" id="modelo_sistema" name="modelo_sistema" required>
      </div>
      <div class="mb-3">
        <label for="precauciones_utilizacion" class="form-label">Precauciones de Utilización<span class="required">*</span></label>
        <input type="text" class="form-control" id="precauciones_utilizacion" name="precauciones_utilizacion" required>
      </div>
      <div class="mb-3">
        <label for="personas_responsables" class="form-label">Personas Responsables<span class="required">*</span></label>
        <select class="form-select" id="personas_responsables" name="personas_responsables" required>
          <?php
          $conexion = mysqli_connect("localhost", "root", "morat12345", "projard");
          if (!$conexion) {
            die("Error al conectar a la base de datos: " . mysqli_connect_error());
          }

          $consulta = "SELECT id_rol, nombre FROM informacion_roles";
          $resultados = mysqli_query($conexion, $consulta);

          while ($fila = mysqli_fetch_assoc($resultados)) {
            echo "<option value='" . $fila['id_rol'] . "'>" . $fila['nombre'] . "</option>";
          }

          mysqli_close($conexion);
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="observaciones_generales" class="form-label">Observaciones Generales<span class="required">*</span></label>
        <input type="text" class="form-control" id="observaciones_generales" name="observaciones_generales" required>
      </div>
      <div class="mb-3">
        <label for="mantenimiento_asignado" class="form-label">Mantenimiento Asignado:</label>
        <select class="form-select" id="mantenimiento_asignado" name="mantenimiento_asignado">
          <option value="Mantenimiento preventivo">Mantenimiento preventivo</option>
          <option value="Mantenimiento correctivo">Mantenimiento correctivo</option>
          <option value="Mantenimiento predictivo">Mantenimiento predictivo</option>
          <option value="Mantenimiento de emergencia">Mantenimiento de emergencia</option>
          <option value="Mantenimiento de rutina">Mantenimiento de rutina</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="reparacion_asignada" class="form-label">Reparación Asignada:</label>
        <select class="form-select" id="reparacion_asignada" name="reparacion_asignada">
          <option value="Mantenimiento preventivo">Mantenimiento preventivo</option>
          <option value="Reparación correctiva">Reparación correctiva</option>
          <option value="Actualización de hardware">Actualización de hardware</option>
          <option value="Actualización de software">Actualización de software</option>
          <option value="Sustitución de componentes">Sustitución de componentes</option>
          <option value="Reconfiguración del equipo">Reconfiguración del equipo</option>
          <option value="Servicio de mantenimiento regular">Servicio de mantenimiento regular</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
        Registrar
      </button>
    </form>
  </div>

<!-- Estructura del modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Cabecera del modal -->
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Resultado del Registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Cuerpo del modal -->
      <div class="modal-body">
        Registro almacenado correctamente.
      </div>
      <!-- Pie del modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="redirigir()">Cerrar</button>
      </div>
    </div>
  </div>
</div>


  <!-- Botones de navegación -->
  <div class="fixed-buttons container1">
    <button class="btn btn-secondary boton-volver"><a href="../tecnico_sistemas_panel.php" class="text-white">Volver</a></button>
    <button class="btn btn-secondary boton-seguir"><a href="../computadores/index.php" class="text-white">Seguir</a></button>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
  $(document).ready(function() {
        // Verificar el parámetro success en la URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('success')) {
            $('#myModal').modal('show');
        }
    });

    function redirigir() {
  console.log("Redireccionando...");
  window.location.href = "../computadores/index.php";
  }
  </script>

  <script src="../script/script_hve.js"></script>
</body>
</html>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/styles4.css">
  <style>
    .mantenimiento {
      text-align: center;
    }

    .mantenimiento label {
      display: block;
      margin-bottom: 10px;
    }

    .styled-select {
      width: 100%;
      max-width: 300px;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #001a6e;
      border-radius: 4px;
      background-color: #ffffff;
      color: #000000;
      background-color: rgb(199, 213, 235);
    }
  </style>

  <title>Registro de Hoja de Vida del Equipo</title>

</head>

<body>

  <div>
    <ul class="navbar" id="myNavbar">
      <nav class="barra">
        <div class="logo">
          <img src="../logo/jard.png" alt="logo de pagina">
        </div>
        <li><a href="../tecnico_sistemas_panel.php">Inicio</a></li>
        <li><a href="../hoja de vida eq/index.php">RLHV-E</a></li>
        <li><a href="../computadores/index.php">Computadores</a></li>
        <li><a href="../ubicacion/index.php">Ubicación</a></li>
        <li><a href="../depreciacion/index.php">Depreciacion</a></li>
        <li><a class="boton-cerrar-sesion" onclick="confirmarCerrarSesion()">Cerrar sesión</a></li>
        <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">&#9776;</a>
      </nav>
    </ul>
  </div>

  <h1>Registro de Hoja de Vida del Equipo</h1>


  <div class="form-container">
    <form id="registroForm" action="procesar_formulario.php" method="post">


      <label for="id_equipo">ID del Equipo<span class="required">*</span></label>
      <input type="text" id="id_equipo" name="id_equipo" required>

      <label for="nombre_SO">Nombre del SO<span class="required">*</span></label>
      <input type="text" id="nombre_SO" name="nombre_SO" required>

      <label for="nombre_sistema">Nombre del Sistema<span class="required">*</span></label>
      <input type="text" id="nombre_sistema" name="nombre_sistema" required>

      <label for="modelo_sistema">Modelo del Sistema<span class="required">*</span></label>
      <input type="text" id="modelo_sistema" name="modelo_sistema" required>

      <label for="precauciones_utilizacion">Precauciones de Utilización<span class="required">*</span></label>
      <input type="text" id="precauciones_utilizacion" name="precauciones_utilizacion" required>

      <label for="personas_responsables">Personas Responsables<span class="required">*</span></label>
      <select name="personas_responsables" id="personas_responsables" class="styled-select">
        <?php
        // Conecta a la base de datos y realiza la consulta
        $conexion = mysqli_connect("localhost", "root", "", "proyectjard");
        if (!$conexion) {
          die("Error al conectar a la base de datos: " . mysqli_connect_error());
        }

        $consulta = "SELECT id_rol, nombre FROM informacion_roles";
        $resultados = mysqli_query($conexion, $consulta);

        // Genera las opciones del menú desplegable
        while ($fila = mysqli_fetch_assoc($resultados)) {
          echo "<option value='" . $fila['id_rol'] . "'>" . $fila['nombre'] . "</option>";
        }


        mysqli_close($conexion);
        ?>
      </select>

      <label for="observaciones_generales">Observaciones Generales<span class="required">*</span></label>
      <input type="text" id="observaciones_generales" name="observaciones_generales" required>

      <div class="mantenimiento">
        <label for="mantenimiento_asignado">Mantenimiento Asignado:</label>
        <select name="mantenimiento_asignado" id="mantenimiento_asignado" class="styled-select">
          <option value="Mantenimiento preventivo">Mantenimiento preventivo</option>
          <option value="Mantenimiento correctivo">Mantenimiento correctivo</option>
          <option value="Mantenimiento predictivo">Mantenimiento predictivo</option>
          <option value="Mantenimiento programado">Mantenimiento programado</option>
          <option value="Mantenimiento de emergencia">Mantenimiento de emergencia</option>
          <option value="Mantenimiento de rutina">Mantenimiento de rutina</option>
        </select>

        <label for="reparacion_asignada">Reparación Asignada:</label>
        <select name="reparacion_asignada" id="reparacion_asignada" class="styled-select">
          <option value="Mantenimiento preventivo">Mantenimiento preventivo</option>
          <option value="Reparación correctiva">Reparación correctiva</option>
          <option value="Actualización de hardware">Actualización de hardware</option>
          <option value="Actualización de software">Actualización de software</option>
          <option value="Sustitución de componentes">Sustitución de componentes</option>
          <option value="Reconfiguración del equipo">Reconfiguración del equipo</option>
          <option value="Servicio de mantenimiento regular">Servicio de mantenimiento regular</option>
        </select>
      </div>

      <button type="submit">Registrar</button>
    </form>
  </div>

  <div class="overlay" id="modalOverlay">
    <div class="modal">
      <p>Los registros fueron almacenados correctamente.</p>
      <button onclick="aceptarRedireccion()">Aceptar</button>
    </div>
  </div>

  <script src="../script/script22.js"></script>

  <div class="botones-container">
    <button class="boton-volver"><a href="../tecnico_sistemas_panel.php">Volver</a></button>
    <button class="boton-seguir"><a href="../computadores/index.php">Seguir</a></button>
  </div>

</body>

</html>
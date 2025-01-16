<?php
$servername = "localhost";
$username = "root";
$password = "morat12345";
$database = "projard";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Realiza la consulta SQL
$sql = "SELECT
    rlhv_e.num_hoja_de_vida_equipo,
    rlhv_e.id_equipo,
    rlhv_e.nombre_SO,
    rlhv_e.nombre_sistema,
    rlhv_e.modelo_sistema,
    rlhv_e.precauciones_utilizacion,
    CONCAT(informacion_roles.id_rol, ' - ', informacion_roles.nombre) AS personas_responsables,
    rlhv_e.observaciones_generales,
    rlhv_e.mantenimiento_asignado,
    rlhv_e.reparacion_asignada,
    rlhv_e.activo
FROM rlhv_e
INNER JOIN informacion_roles ON rlhv_e.personas_responsables = informacion_roles.id_rol";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../stylesBoostrap/style_pc.css">
  <title>Computadores</title>
</head>

<body class="bg-light">

  <!-- Barra de navegación -->
  <nav class="navbar navbar-expand-lg sticky-top">
    <a class="navbar-brand" href="#">
      <img src="../logo/jard.png" alt="logo de pagina" style="width: 40px;"> jard
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="../empleado_panel.php">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="../computadores/index.php">Computadores</a></li>
        <li class="nav-item"><a class="nav-link" href="../ubicacion/index.php">Ubicación</a></li>
        <li class="nav-item"><a class="nav-link" href="../fpdf/generar_informe.php">Informe</a></li>
        <li class="nav-item"><a class="nav-link" onclick="confirmarCerrarSesion()">Cerrar sesión</a></li>
      </ul>
    </div>
  </nav>

  <!-- Título de la página -->
  <div class="regis">
    <h1 class="titulo-principal">Registro de Computadores según el RLHV-E</h1>
  </div>

  <!-- Campo de búsqueda -->
  <div class="container mt-4">
    <input type="text" id="busqueda" class="form-control" placeholder="Buscar...">
  </div>

  <!-- Tabla de registros -->
  <div class="table-responsive mt-4 container">
    <table class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
          <th>Número de Hoja de Vida del Equipo</th>
          <th>ID del Equipo</th>
          <th>Nombre del SO</th>
          <th>Nombre del Sistema</th>
          <th>Modelo del Sistema</th>
          <th>Precauciones de Utilización</th>
          <th>Personas Responsables</th>
          <th>Observaciones Generales</th>
          <th>Mantenimiento Asignado</th>
          <th>Reparación Asignada</th>
          <th>Activo/Desactivado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["num_hoja_de_vida_equipo"] . "</td>";
            echo "<td>" . $row["id_equipo"] . "</td>";
            echo "<td>" . $row["nombre_SO"] . "</td>";
            echo "<td>" . $row["nombre_sistema"] . "</td>";
            echo "<td>" . $row["modelo_sistema"] . "</td>";
            echo "<td>" . $row["precauciones_utilizacion"] . "</td>";
            echo "<td>" . $row["personas_responsables"] . "</td>";
            echo "<td>" . $row["observaciones_generales"] . "</td>";
            echo "<td>" . $row["mantenimiento_asignado"] . "</td>";
            echo "<td>" . $row["reparacion_asignada"] . "</td>";

            // Columna de Activo/Desactivado
            echo "<td>";
            if ($row["activo"] == 1) {
              echo "Activo";
            } else {
              echo "Desactivado";
            }
            echo "</td>";

            // Columna de Acciones
            echo '<td class="acciones">
          <a href="editar_registro.php?id=' . $row["num_hoja_de_vida_equipo"] . '" class="btn btn-primary btn-sm">Editar</a>
          <a href="desactivar_registro.php?id=' . $row["num_hoja_de_vida_equipo"] . '" class="btn btn-danger btn-sm">Desactivar</a>
          </td>';

            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='12'>No se encontraron registros.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Notificaciones -->
  <div class="container mt-4 notificacion">
    <button id="notificarBtn" class="btn btn-warning">Notificar Problemas de Inventario</button>
    <a href="../computadores/tabla.php" class="btn btn-info">Ver Registros de Notificaciones</a>
    <div id="chatBox" class="chat-box mt-4" style="display: none;">
      <div class="chat-input">
        <form id="messageForm" action="../computadores/guardar_mensaje.php" method="post">
          <input type="text" id="messageInput" name="mensaje" class="form-control" placeholder="Escribe tu mensaje...">
          <button type="submit" id="sendMessageBtn" class="btn btn-primary mt-2">Enviar</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Botones de navegación -->
  <div class="fixed-buttons">
    <button class="boton-volver"><a href="../hoja de vida eq/index.php" class="text-white">Volver</a></button>
    <button class="boton-seguir"><a href="../ubicacion/index.php" class="text-white">Seguir</a></button>
  </div>

  
  <script src="../script/script_pc.js"></script>

</body>

</html>

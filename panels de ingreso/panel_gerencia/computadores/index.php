<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "proyectjard";

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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/styles6.css">
  <link rel="stylesheet" href="../styles/styles33.css">
  <style>
    .acciones {
      text-align: center;
    }

    .acciones a {
      margin: 0 5px;
      text-decoration: none;
      color: #000000;
      font-weight: bold;
    }
  </style>
  <title>Computadores</title>
</head>

<body>
  <div>
    <ul class="navbar" id="myNavbar">
      <nav class="barra">
        <div class="logo">
          <img src="../logo/jard.png" alt="logo de pagina">
        </div>
        <li><a href="../gerencia_panel.php">Inicio</a></li>
        <li><a href="../hoja de vida eq/index.php">RLHV-E</a></li>
        <li><a href="../computadores/index.php">Computadores</a></li>
        <li><a href="../ubicacion/index.php">Ubicación</a></li>
        <li><a href="../depreciacion/index.php">Depreciacion</a></li>
        <li><a href="../fpdf/generar_informe.php">Informe</a></li>
        <li><a class="boton-cerrar-sesion" onclick="confirmarCerrarSesion()">Cerrar sesión</a></li>

        <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">&#9776;</a>
      </nav>
    </ul>
  </div>

  <div class="regis">
    <h1>Registro de Computadores segun el rlhv_e</h1>
  </div>

  <input type="text" id="busqueda" placeholder="Buscar...">

  <table>
    <thead>
      <tr>
        <th>num hoja de vida equipo</th>
        <th>ID del equipo</th>
        <th>Nombre del SO</th>
        <th>Nombre del sistema</th>
        <th>Modelo del sistema</th>
        <th>Precauciones de utilización</th>
        <th>Personas responsables</th>
        <th>Observaciones generales</th>
        <th>Mantenimiento asignado</th>
        <th>Reparación asignada</th>
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
        <a href="editar_registro.php?id=' . $row["num_hoja_de_vida_equipo"] . '">Editar</a> |
        <a href="desactivar_registro.php?id=' . $row["num_hoja_de_vida_equipo"] . '">Desactivar</a>
    </td>';

          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='12'>No se encontraron registros.</td></tr>";
      }
      ?>
      <?php
      $conn->close();
      ?>
    </tbody>
  </table>
  <div class="notificacion">
    <button id="notificarBtn" class="notificacion-boton">Notificar Problemas de Inventario</button>
    <button class="notificacion-boton"><a href="../computadores/tabla.php" class="ver-notificaciones-btn">Ver Registros de Notificaciones</a></button>
    <div id="chatBox" class="chat-box" style="display: none;">
      <div class="chat-input">
        <form id="messageForm" action="../computadores/guardar_mensaje.php" method="post">
          <input type="text" id="messageInput" name="mensaje" placeholder="Escribe tu mensaje...">
          <button type="submit" id="sendMessageBtn" class="enviar-mensaje-boton">Enviar</button>
        </form>
      </div>
    </div>
  </div>

  <div class="botones-container1">
    <button class="boton-volver"><a href="../hoja de vida eq/index.php">Volver</a></button>
    <button class="boton-seguir"><a href="../ubicacion/index.php">Seguir</a></button>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const input = document.getElementById("busqueda");
      const tabla = document.querySelector("table tbody");
      const filas = tabla.getElementsByTagName("tr");

      input.addEventListener("keyup", function() {
        const valorBusqueda = input.value.toLowerCase();

        for (let i = 0; i < filas.length; i++) {
          const fila = filas[i];
          const celdas = fila.getElementsByTagName("td");
          let mostrarFila = false;

          for (let j = 0; j < celdas.length; j++) {
            const celda = celdas[j];

            if (celda.textContent.toLowerCase().indexOf(valorBusqueda) > -1) {
              mostrarFila = true;
              break;
            }
          }

          if (mostrarFila) {
            fila.style.display = "";
          } else {
            fila.style.display = "none";
          }
        }
      });
    });
  </script>
  <script src="../script/script33.js"></script>
</body>

</html>
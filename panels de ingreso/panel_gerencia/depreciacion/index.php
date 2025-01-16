<?php
$servername = "localhost";
$username = "root";
$password = "morat12345";
$database = "projard";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numHojaVidaEquipo = $_POST["num_hoja_de_vida_equipo"];
    $costoInicial = $_POST["costo_inicial"];
    $valorRescate = $_POST["valor_rescate"];
    $vidaUtil = $_POST["vida_util"];

    // Verificar si los valores son numéricos
    if (!is_numeric($costoInicial) || !is_numeric($valorRescate) || !is_numeric($vidaUtil)) {
        echo '<script>
                alert("Error: Todos los valores deben ser numéricos. Por favor, ingrese valores válidos.");
                window.location.href = "index.php";
              </script>';
    } elseif ($vidaUtil == 0) {
        echo '<script>
                alert("Error: La vida útil no puede ser cero. Por favor, ingrese un valor válido.");
                window.location.href = "index.php";
              </script>';
    } else {
        // Realizar el cálculo
        $resultado = ($costoInicial - $valorRescate) / $vidaUtil;

        // Actualizar la base de datos con el resultado
        $updateQuery = "UPDATE depreciacion SET Costo_computador = $costoInicial, Valor_de_rescate = $valorRescate, total_de_unidades_estimadas_durante_la_vida_útil_del_computador = $vidaUtil, resultado = $resultado WHERE num_hoja_de_vida_equipo = $numHojaVidaEquipo";

        if ($conn->query($updateQuery) === TRUE) {
            echo '<script>
                    alert("Operación exitosa. Los valores se han actualizado en la base de datos.");
                    window.location.href = "index.php";
                  </script>';
        } else {
            echo "Error al actualizar en la base de datos: " . $conn->error;
        }
    }
}

$sql = "SELECT * FROM depreciacion";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../stylesBoostrap/style_dprciacion.css">
  <title>Depreciación</title>
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
        <li class="nav-item"><a class="nav-link" href="../gerencia_panel.php">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="../hoja de vida eq/index.php">RLHV-E</a></li>
        <li class="nav-item"><a class="nav-link" href="../computadores/index.php">Computadores</a></li>
        <li class="nav-item"><a class="nav-link" href="../ubicacion/index.php">Ubicación</a></li>
        <li class="nav-item"><a class="nav-link" href="../depreciacion/index.php">Depreciacion</a></li>
        <li class="nav-item"><a class="nav-link" href="../fpdf/informe_depreciacion.php">Informe</a></li>
        <li class="nav-item"><a class="nav-link" onclick="confirmarCerrarSesion()">Cerrar sesión</a></li>
      </ul>
    </div>
  </nav>

   <!-- Título de la página -->
   <div>
        <h1 class="titulo-principal">depreciación</h1>
    </div>

  <!-- Contenedor Principal -->
  <div class="container mt-4">
    <p class="caption">
      Depreciación: Depreciación anual = (Costo inicial - Valor residual) / Vida útil
      <ul>
        <li>Costo inicial: El costo original del computador.</li>
        <li>Valor residual: El valor esperado del computador al final de su vida útil. Es el valor que se espera obtener por la venta del activo al final de su vida útil.</li>
        <li>Vida útil: La cantidad de años o períodos durante los cuales se espera que el computador sea útil.</li>
      </ul>
    </p>

    <!-- Campo de búsqueda -->
    <div class="mt-4">
      <input type="text" id="busqueda" class="form-control" placeholder="Buscar...">
    </div>

    <!-- Tabla de depreciación -->
    <div class="table-responsive mt-4">
      <table class="table table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th>Número de Hoja de Vida del Equipo</th>
            <th>Costo del Computador</th>
            <th>Valor de Rescate</th>
            <th>Total de Unidades Estimadas</th>
            <th></th>
            <th>Resultado</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["num_hoja_de_vida_equipo"] . "</td>";

              echo "<td>";
              echo "<form method='POST'>";
              echo "<input type='hidden' name='num_hoja_de_vida_equipo' value='" . $row["num_hoja_de_vida_equipo"] . "'>";
              echo "<input type='text' name='costo_inicial' value='" . $row["Costo_computador"] . "' class='form-control'>";
              echo "</td>";

              echo "<td>";
              echo "<input type='text' name='valor_rescate' value='" . $row["Valor_de_rescate"] . "' class='form-control'>";
              echo "</td>";

              echo "<td>";
              echo "<input type='text' name='vida_util' value='" . $row["total_de_unidades_estimadas_durante_la_vida_útil_del_computador"] . "' class='form-control'>";
              echo "</td>";

              echo "<td>";
              echo "<button type='submit' class='btn btn-primary'>Aceptar</button>";
              echo "</form>";
              echo "</td>";

              echo "<td>" . $row["resultado"] . "</td>";

              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='6'>No se encontraron registros.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

    <?php
    $conn->close();
    ?>

      <!-- Botones de navegación -->
  <div class="fixed-buttons">
    <button class="boton-volver"><a href="../ubicacion/index.php">Volver</a></button>
  </div>

  <script src="../script/script_dprciacion.js"></script>
 

</body>

</html>

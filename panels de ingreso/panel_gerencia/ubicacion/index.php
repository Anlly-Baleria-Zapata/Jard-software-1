<?php
$servername = "localhost";
$username = "root";
$password = "morat12345";
$database = "projard";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$mensajeExito = "";

// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id_equipo"]) && isset($_POST["ubicacion"])) {
        $id_equipo = $_POST["id_equipo"];
        $ubicacion = $_POST["ubicacion"];
        $sql = "UPDATE ubicacion SET ubicacion = '$ubicacion' WHERE id_equipo = '$id_equipo'";

        if ($conn->query($sql) === TRUE) {
            $mensajeExito = "Ubicación guardada correctamente.";
            echo '<script>
                    alert("Ubicación guardada correctamente.");
                    window.location.href = "index.php";
                  </script>';
        } else {
            echo "Error al guardar la ubicación: " . $conn->error;
        }
    }
}

$sql = "SELECT * FROM ubicacion";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../stylesBoostrap/style_ubica.css">
    <title>Ubicación</title>
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
        <li class="nav-item"><a class="nav-link" href="../fpdf/generar_informe.php">Informe</a></li>
        <li class="nav-item"><a class="nav-link" onclick="confirmarCerrarSesion()">Cerrar sesión</a></li>
      </ul>
    </div>
  </nav>

    <!-- Título de la página -->
    <div>
        <h1 class="titulo-principal">Ubicación</h1>
    </div>

    <!-- Descripción -->
    <div class="container mt-4">
        <p class="caption">
            Ubicación: La ubicación se basará según el área donde se encuentre el personal de trabajo, por ejemplo, el
            administrador, el técnico de sistemas, empleado y gerencia. El nombre del personal responsable estará registrado
            en la hoja de vida del computador.
        </p>
    </div>

    <!-- Campo de búsqueda -->
    <div class="container mt-4">
        <input type="text" id="busqueda" class="form-control" placeholder="Buscar...">
    </div>

    <!-- Tabla de ubicaciones -->
    <div class="table-responsive container container1 mt-4">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Número de Hoja de Vida del Equipo</th>
                    <th>ID del Equipo</th>
                    <th>Ubicación</th>
                    <th>Actualizar Ubicación</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["num_hoja_de_vida_equipo"] . "</td>";
                        echo "<td>" . $row["id_equipo"] . "</td>";
                        echo "<td>" . $row["ubicacion"] . "</td>";
                        echo "<td>";
                        echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>";
                        echo "<input type='hidden' name='id_equipo' value='" . $row["id_equipo"] . "'>";
                        echo "<select name='ubicacion' class='form-control'>";
                        echo "<option value='tecnico_sistemas'>Técnico de Sistemas</option>";
                        echo "<option value='empleado'>Empleado</option>";
                        echo "<option value='gerencia'>Gerencia</option>";
                        echo "</select>";
                        echo "<button type='submit' class='btn btn-primary mt-2'>Guardar</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No se encontraron registros.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    $conn->close();
    ?>

    <!-- Botones de navegación -->
    <div class=" fixed-buttons">
        <button class="boton-volver  "><a href="../computadores/index.php" class="text-white">Volver</a></button>
        <button class="boton-seguir"><a href="../depreciacion/index.php" class="text-white">Seguir</a></button>
    </div>

    <script src="../script/script_ubica.js"></script>


</body>

</html>

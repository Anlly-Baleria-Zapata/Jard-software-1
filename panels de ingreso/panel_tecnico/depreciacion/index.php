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
  // Obtener los valores ingresados por el usuario
  $costoInicial = $_POST["costo_inicial"];
  $valorRescate = $_POST["valor_rescate"];
  $vidaUtil = $_POST["vida_util"];

  // Realizar el cálculo
  $resultado = ($costoInicial - $valorRescate) / $vidaUtil;

  // Actualizar la base de datos con el resultado
  $updateQuery = "UPDATE depreciacion SET Costo_computador = $costoInicial, Valor_de_rescate = $valorRescate, total_de_unidades_estimadas_durante_la_vida_útil_del_computador = $vidaUtil, resultado = $resultado WHERE num_hoja_de_vida_equipo = " . $_POST["num_hoja_de_vida_equipo"];
  if ($conn->query($updateQuery) === TRUE) {
    echo "Operación exitosa. Los valores se han actualizado en la base de datos.";
  } else {
    echo "Error al actualizar en la base de datos: " . $conn->error;
  }
}

$sql = "SELECT * FROM depreciacion";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/styles7.css">
  <title>depreciacion</title>
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
        <li><a href="../fpdf/informe_depreciacion.php">Informe</a></li>
        <li><a class="boton-cerrar-sesion" onclick="confirmarCerrarSesion()">Cerrar sesión</a></li>

        <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">&#9776;</a>
      </nav>
    </ul>
  </div>


  <div class="table-container">
    <caption class="caption">Depreciacion: Depreciación anual = (Costo inicial - Valor residual) / Vida útil
      <li>Costo inicial: El costo original del computador.</li>
      <li>Valor residual: El valor esperado del computador al final de su vida útil. Es el valor que se espera obtener
        por la venta del activo al final de su vida útil.</li>
      <li>Vida útil: La cantidad de años o períodos durante los cuales se espera que el computador sea útil.</li>
    </caption>
    <h1>depreciacion</h1>

    <input type="text" id="busqueda" placeholder="Buscar...">
    <table>
      <thead>
        <tr>
          <th>num_hoja_de_vida_equipo</th>
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
            echo "<input type='text' name='costo_inicial' value='" . $row["Costo_computador"] . "'>";
            echo "</td>";

            echo "<td>";
            echo "<input type='text' name='valor_rescate' value='" . $row["Valor_de_rescate"] . "'>";
            echo "</td>";

            echo "<td>";
            echo "<input type='text' name='vida_util' value='" . $row["total_de_unidades_estimadas_durante_la_vida_útil_del_computador"] . "'>";
            echo "</td>";

            echo "<td>";
            echo "<button type='submit'>Aceptar</button>";
            echo "</form>";
            echo "</td>";

            echo "<td>" . $row["resultado"] . "</td>";

            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='5'>No se encontraron registros.</td></tr>";
        }
        ?>
        <?php
        $conn->close();
        ?>
      </tbody>
    </table>



    <div class="botones-container1">
      <button class="boton-volver"><a href="../ubicacion/index.php">Volver</a></button>
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
    <script src="../script/script2.js"></script>
    <script src="../script/script8.js"></script>

</body>

</html>
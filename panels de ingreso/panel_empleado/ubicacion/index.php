<?php
$servername = "localhost";
$username = "root";
$password = "morat12345";
$database = "projard";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Variable para almacenar el mensaje de éxito
$mensajeExito = "";

// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id_equipo"]) && isset($_POST["ubicacion"])) {
        $id_equipo = $_POST["id_equipo"];
        $ubicacion = $_POST["ubicacion"];
        $sql = "UPDATE ubicacion SET ubicacion = '$ubicacion' WHERE id_equipo = '$id_equipo'";

        if ($conn->query($sql) === TRUE) {
            $mensajeExito = "Ubicación guardada correctamente.";
        } else {
            echo "Error al guardar la ubicación: " . $conn->error;
        }
    }
}

$sql = "SELECT * FROM ubicacion";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/styles7.css">
    <title>Ubicación</title>
</head>

<body>

    <div>
        <ul class="navbar" id="myNavbar">
            <nav class="barra">
                <div class="logo">
                    <img src="../logo/jard.png" alt="logo de pagina">
                </div>
                <li><a href="../empleado_panel.php">Inicio</a></li>
                <li><a href="../hoja de vida eq/index.php">RLHV-E</a></li>
                <li><a href="../computadores/index.php">Computadores</a></li>
                <li><a href="../ubicacion/index.php">Ubicación</a></li>
                <li><a href="../depreciacion/index.php">Depreciacion</a></li>
                <li><a href="../fpdf/informe_ubicacion.php">Informe</a></li>
                <li><a class="boton-cerrar-sesion" onclick="confirmarCerrarSesion()">Cerrar sesión</a></li>

                <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">&#9776;</a>
            </nav>
        </ul>
    </div>

    <div class="container">
        <div class="table-container">
            <caption class="caption">Ubicación: La ubicación se basará según el área donde se encuentre el personal de
                trabajo, por ejemplo, el administrador, el técnico de sistemas, empleado y gerencia. El nombre del personal
                responsable estará registrado en la hoja de vida del computador.</caption>

            <input type="text" id="busqueda" placeholder="Buscar...">
            <table>
                <thead>
                    <tr>
                        <th>num_hoja_de_vida_equipo</th>
                        <th>ID del equipo</th>
                        <th>Ubicación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["num_hoja_de_vida_equipo"] . "</td>";
                            echo "<td>" . $row["id_equipo"] . "</td>";
                            echo "<td>";
                            echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>";
                            echo "<input type='hidden' name='id_equipo' value='" . $row["id_equipo"] . "'>";
                            echo "<table>";
                            echo "<tr>";
                            echo "<td>";
                            echo "<select name='ubicacion'>";
                            echo "<option value='tecnico_sistemas'>Técnico de Sistemas</option>";
                            echo "<option value='empleado'>Empleado</option>";
                            echo "<option value='gerencia'>Gerencia</option>";
                            echo "</select>";
                            echo "</td>";
                            echo "<td>";
                            echo "<input type='submit' value='Guardar'>";
                            echo "</td>";
                            echo "</tr>";
                            echo "</table>";
                            echo "</form>";
                            echo "</td>";
                            echo "<td>";
                            echo $row["ubicacion"];
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No se encontraron registros.</td></tr>";
                    }
                    ?>
                    <?php
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="botones-container1">
        <button class="boton-volver"><a href="../computadores/index.php">Volver</a></button>
        <button class="boton-seguir"><a href="../depreciacion/index.php">Seguir</a></button>
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

        <?php
        if (!empty($mensajeExito)) {
            echo "alert('$mensajeExito');";
        }
        ?>

        function redirigir() {
            window.location.href = '../ubicacion/index.php';
        }
    </script>

    <script src="../script/script7.js"></script>

</body>

</html>
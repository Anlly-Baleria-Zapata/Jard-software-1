<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../stylesBoostrap/style_msg_invent.css">
    <title>Tabla de Mensajes de Inventario</title>
</head>

<body class="bg-light">

    <!-- Título de la página -->
    <div class="container mt-4">
        <h1 class="text-center">Notificaciones de problemas de inventario</h1>
    </div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "morat12345";
    $database = "projard";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM mensajes";
    $result = $conn->query($sql);
    ?>

    <!-- Tabla de mensajes -->
    <div class="container mt-4">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["mensaje"] . "</td>";
                            echo "<td>" . $row["fecha_envio"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No hay registros</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    $conn->close();
    ?>

    <!-- Botón Volver -->
    <div class="container mt-4 text-center">
        <button class="btn btn-secondary"><a href="../computadores/index.php" class="text-white">Volver</a></button>
    </div>

</body>

</html>


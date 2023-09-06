<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "proyectjard";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir el mensaje del formulario
if (isset($_POST['mensaje'])) {
    $mensaje = $_POST['mensaje'];

    $mensaje = $conn->real_escape_string($mensaje);

    // Consulta para insertar el mensaje en la base de datos
    $sql = "INSERT INTO mensajes (mensaje) VALUES ('$mensaje')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                  alert('Mensaje guardado correctamente');
                  window.location.href = '../computadores/index.php';
              </script>";
    } else {
        echo "<script>
                  alert('Error al guardar el mensaje: " . $conn->error . "');
                  window.location.href = ../computadores/index.php';
              </script>";
    }
    
    
}

$conn->close();

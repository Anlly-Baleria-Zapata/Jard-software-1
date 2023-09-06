<?php
// Conexión a la base de datos 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyectjard";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtén los datos del formulario
$id_equipo = $_POST['id_equipo'];
$nombre_SO = $_POST['nombre_SO'];
$nombre_sistema = $_POST['nombre_sistema'];
$modelo_sistema = $_POST['modelo_sistema'];
$precauciones_utilizacion = $_POST['precauciones_utilizacion'];
$personas_responsables = $_POST['personas_responsables'];
$observaciones_generales = $_POST['observaciones_generales'];
$mantenimiento_asignado = $_POST['mantenimiento_asignado'];
$reparacion_asignada = $_POST['reparacion_asignada'];

// Prepara la consulta SQL para la tabla rlhv_e
$sql1 = "INSERT INTO rlhv_e (id_equipo, nombre_SO, nombre_sistema, modelo_sistema, precauciones_utilizacion, personas_responsables, observaciones_generales, mantenimiento_asignado, reparacion_asignada) VALUES ('$id_equipo', '$nombre_SO', '$nombre_sistema', '$modelo_sistema', '$precauciones_utilizacion', '$personas_responsables', '$observaciones_generales', '$mantenimiento_asignado', '$reparacion_asignada')";

// Ejecuta la consulta para la tabla rlhv_e
if ($conn->query($sql1) === TRUE) {
    // Obtiene el ID del último registro insertado
    $last_inserted_id = $conn->insert_id;
    
    // Prepara la consulta SQL para la tabla ubicacion usando el ID obtenido
    $sql2 = "INSERT INTO ubicacion (num_hoja_de_vida_equipo, id_equipo) VALUES ('$last_inserted_id', '$id_equipo')";

    // Prepara la consulta SQL para la tabla depreciacion usando el ID obtenido
    $sql3 = "INSERT INTO depreciacion (num_hoja_de_vida_equipo) VALUES ('$last_inserted_id')";

    // Ejecuta la consulta para la tabla ubicacion
    if ($conn->query($sql2) === TRUE) {
        // Ejecuta la consulta para la tabla depreciacion
        if ($conn->query($sql3) === TRUE) {
            echo "<script>alert('Registro exitoso');
            window.location.href = '../computadores/index.php';</script>";
        } else {
            echo "<script>alert('Error al registrar en la tabla depreciacion');</script>";
        }
    } else {
        echo "<script>alert('Error al registrar en la tabla ubicacion');</script>";
    }
} else {
    echo "<script>alert('Error al registrar en la tabla rlhv_e');</script>";
}

$conn->close();

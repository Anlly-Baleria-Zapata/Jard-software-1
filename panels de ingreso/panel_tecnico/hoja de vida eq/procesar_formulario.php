<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "morat12345";
$dbname = "projard";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_equipo = isset($_POST['id_equipo']) ? $_POST['id_equipo'] : '';
    $nombre_SO = isset($_POST['nombre_SO']) ? $_POST['nombre_SO'] : '';
    $nombre_sistema = isset($_POST['nombre_sistema']) ? $_POST['nombre_sistema'] : '';
    $modelo_sistema = isset($_POST['modelo_sistema']) ? $_POST['modelo_sistema'] : '';
    $precauciones_utilizacion = isset($_POST['precauciones_utilizacion']) ? $_POST['precauciones_utilizacion'] : '';
    $personas_responsables = isset($_POST['personas_responsables']) ? $_POST['personas_responsables'] : '';
    $observaciones_generales = isset($_POST['observaciones_generales']) ? $_POST['observaciones_generales'] : '';
    $mantenimiento_asignado = isset($_POST['mantenimiento_asignado']) ? $_POST['mantenimiento_asignado'] : '';
    $reparacion_asignada = isset($_POST['reparacion_asignada']) ? $_POST['reparacion_asignada'] : '';

    $sql1 = "INSERT INTO rlhv_e (id_equipo, nombre_SO, nombre_sistema, modelo_sistema, precauciones_utilizacion, personas_responsables, observaciones_generales, mantenimiento_asignado, reparacion_asignada)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("sssssssss", $id_equipo, $nombre_SO, $nombre_sistema, $modelo_sistema, $precauciones_utilizacion, $personas_responsables, $observaciones_generales, $mantenimiento_asignado, $reparacion_asignada);
    
    if ($stmt1->execute()) {
        $last_inserted_id = $conn->insert_id;

        $sql2 = "INSERT IGNORE INTO ubicacion (num_hoja_de_vida_equipo, id_equipo, ubicacion) VALUES (?, ?, 'Desconocido')";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("is", $last_inserted_id, $id_equipo);
        $ubicacion_exito = $stmt2->execute();
        
        $sql3 = "INSERT IGNORE INTO depreciacion (num_hoja_de_vida_equipo) VALUES (?)";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->bind_param("i", $last_inserted_id);
        
        if ($stmt3->execute() && $ubicacion_exito) {
            $_SESSION['mensaje'] = "Registro almacenado correctamente.";
            header("Location: index.php?success=true");
            exit();
        } else {
            $_SESSION['mensaje'] = "Error al registrar en las tablas ubicacion o depreciacion.";
        }
    } else {
        $_SESSION['mensaje'] = "Error al registrar en la tabla rlhv_e.";
    }
}

$conn->close();
?>



<?php
include('../conexion.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_equipo = $_POST["id_equipo"];
    $nombre_SO = $_POST["nombre_SO"];
    $nombre_sistema = $_POST["nombre_sistema"];
    $modelo_sistema = $_POST["modelo_sistema"];
    $precauciones_utilizacion = $_POST["precauciones_utilizacion"];
    $personas_responsables = $_POST["personas_responsables"];
    $observaciones_generales = $_POST["observaciones_generales"];
    $mantenimiento_asignado = $_POST["mantenimiento_asignado"];
    $reparacion_asignada = $_POST["reparacion_asignada"];

    // Actualizar los campos en la base de datos
    $sql = "UPDATE rlhv_e SET
            nombre_SO = '$nombre_SO',
            nombre_sistema = '$nombre_sistema',
            modelo_sistema = '$modelo_sistema',
            precauciones_utilizacion = '$precauciones_utilizacion',
            personas_responsables = '$personas_responsables',
            observaciones_generales = '$observaciones_generales',
            mantenimiento_asignado = '$mantenimiento_asignado',
            reparacion_asignada = '$reparacion_asignada'
            WHERE id_equipo = $id_equipo";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

$conn->close();

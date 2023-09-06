<?php
include('../conexion.php');

if (isset($_GET["id"])) {
    $num_hoja_de_vida_equipo = $_GET["id"];

    $sql = "SELECT * FROM rlhv_e WHERE num_hoja_de_vida_equipo = $num_hoja_de_vida_equipo";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $id_equipo = $row["id_equipo"];
        $nombre_SO = $row["nombre_SO"];
        $nombre_sistema = $row["nombre_sistema"];
        $modelo_sistema = $row["modelo_sistema"];
        $precauciones_utilizacion = $row["precauciones_utilizacion"];
        $personas_responsables = $row["personas_responsables"];
        $observaciones_generales = $row["observaciones_generales"];
        $mantenimiento_asignado = $row["mantenimiento_asignado"];
        $reparacion_asignada = $row["reparacion_asignada"];
        // Obtener el campo "activo"
        $activo = $row["activo"];
    } else {
        echo "No se encontró el registro.";
        exit;
    }
} else {
    echo "ID de registro no proporcionado.";
    exit;
}


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
    $activo = isset($_POST["activo"]) ? 1 : 0;

    $sql_update = "UPDATE rlhv_e SET id_equipo = '$id_equipo', nombre_SO = '$nombre_SO', nombre_sistema = '$nombre_sistema', modelo_sistema = '$modelo_sistema', precauciones_utilizacion = '$precauciones_utilizacion', personas_responsables = '$personas_responsables', observaciones_generales = '$observaciones_generales', mantenimiento_asignado = '$mantenimiento_asignado', reparacion_asignada = '$reparacion_asignada', activo = $activo WHERE num_hoja_de_vida_equipo = $num_hoja_de_vida_equipo";

    if ($conn->query($sql_update) === TRUE) {
        // Registro actualizado exitosamente, mostrar mensaje de confirmación
        echo '<script>
            if (confirm("Registro actualizado correctamente.")) {
                window.location.href = "../computadores/index.php"; // Reemplaza "otra_pagina.php" con la URL a la que deseas redirigir
            } else {
                window.location.href = document.referrer; // Redirige de nuevo a la página anterior si se cancela
            }
        </script>';
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles6.css">
    <link rel="stylesheet" href="../styles/styles33.css">
    <title>Editar Registro</title>
</head>

<body>
    <div class="regis">
        <h1>Editar Registro de Computador</h1>
    </div>
    <form method="post">
        <label for="id_equipo"> id equipo:</label>
        <input type="text" name="id_equipo" value="<?php echo $id_equipo; ?>"><br>
        <label for="nombre_SO">Nombre del SO:</label>
        <input type="text" name="nombre_SO" value="<?php echo $nombre_SO; ?>"><br>
        <label for="nombre_sistema">Nombre del Sistema:</label>
        <input type="text" name="nombre_sistema" value="<?php echo $nombre_sistema; ?>"><br>
        <label for="modelo_sistema">Modelo del Sistema:</label>
        <input type="text" name="modelo_sistema" value="<?php echo $modelo_sistema; ?>"><br>
        <label for="precauciones_utilizacion">Precauciones de Utilización:</label>
        <input type="text" name="precauciones_utilizacion" value="<?php echo $precauciones_utilizacion; ?>"><br>
        <label for="personas_responsables">Personas Responsables:</label>
        <input type="text" name="personas_responsables" value="<?php echo $personas_responsables; ?>"><br>
        <label for="observaciones_generales">Observaciones Generales:</label>
        <input type="text" name="observaciones_generales" value="<?php echo $observaciones_generales; ?>"><br>
        <label for="mantenimiento_asignado">Mantenimiento Asignado:</label>
        <input type="text" name="mantenimiento_asignado" value="<?php echo $mantenimiento_asignado; ?>"><br>
        <label for="reparacion_asignada">Reparación Asignada:</label>
        <input type="text" name="reparacion_asignada" value="<?php echo $reparacion_asignada; ?>"><br>
        <label for="activo">Activo:</label>
        <input type="checkbox" name="activo" <?php if ($activo == 1) echo "checked"; ?>><br>
        <input type="submit" value="Actualizar">
    </form>
</body>

</html>
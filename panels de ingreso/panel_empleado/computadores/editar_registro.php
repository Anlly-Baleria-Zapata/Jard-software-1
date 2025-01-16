<?php
include('../conexion.php');

$update_successful = false;

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
        $activo = $row["activo"];
    } else {
        echo "No se encontró el registro.";
        exit;
    }
} else {
    echo "ID de registro no proporcionado.";
    exit;
}

$mensaje = "";

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
        $update_successful = true;
    } else {
        $mensaje = '<div class="alert alert-danger" role="alert">Error al actualizar el registro: ' . $conn->error . '</div>';
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesBoostrap/style_edit_regis.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Editar Registro</title>
     <!-- Agregar el script para mostrar el modal solo si la actualización fue exitosa -->
     <?php if ($update_successful): ?>
        <script>
            var updateSuccessful = true;
        </script>
    <?php endif; ?>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="regis text-center">
            <h1 class="display-4">Editar Registro de Computador</h1>
        </div>
        <?php if (isset($_SESSION['mensaje'])) 
        { echo $_SESSION['mensaje']; 
        unset($_SESSION['mensaje']); 
        } 
        ?>
        <form method="post" class="form-container">
            <div class="form-group">
                <label for="id_equipo">ID del Equipo:</label>
                <input type="text" class="form-control" name="id_equipo" value="<?php echo $id_equipo; ?>" required>
            </div>
            <div class="form-group">
                <label for="nombre_SO">Nombre del SO:</label>
                <input type="text" class="form-control" name="nombre_SO" value="<?php echo $nombre_SO; ?>" required>
            </div>
            <div class="form-group">
                <label for="nombre_sistema">Nombre del Sistema:</label>
                <input type="text" class="form-control" name="nombre_sistema" value="<?php echo $nombre_sistema; ?>" required>
            </div>
            <div class="form-group">
                <label for="modelo_sistema">Modelo del Sistema:</label>
                <input type="text" class="form-control" name="modelo_sistema" value="<?php echo $modelo_sistema; ?>" required>
            </div>
            <div class="form-group">
                <label for="precauciones_utilizacion">Precauciones de Utilización:</label>
                <input type="text" class="form-control" name="precauciones_utilizacion" value="<?php echo $precauciones_utilizacion; ?>" required>
            </div>
            <div class="form-group">
                <label for="personas_responsables">Personas Responsables:</label>
                <input type="text" class="form-control" name="personas_responsables" value="<?php echo $personas_responsables; ?>" required>
            </div>
            <div class="form-group">
                <label for="observaciones_generales">Observaciones Generales:</label>
                <input type="text" class="form-control" name="observaciones_generales" value="<?php echo $observaciones_generales; ?>" required>
            </div>
            <div class="form-group">
                <label for="mantenimiento_asignado">Mantenimiento Asignado:</label>
                <select name="mantenimiento_asignado" id="mantenimiento_asignado" class="form-control">
                    <option value="Mantenimiento preventivo" <?php if ($mantenimiento_asignado == "Mantenimiento preventivo") echo "selected"; ?>>Mantenimiento preventivo</option>
                    <option value="Mantenimiento correctivo" <?php if ($mantenimiento_asignado == "Mantenimiento correctivo") echo "selected"; ?>>Mantenimiento correctivo</option>
                    <option value="Mantenimiento predictivo" <?php if ($mantenimiento_asignado == "Mantenimiento predictivo") echo "selected"; ?>>Mantenimiento predictivo</option>
                    <option value="Mantenimiento programado" <?php if ($mantenimiento_asignado == "Mantenimiento programado") echo "selected"; ?>>Mantenimiento programado</option>
                    <option value="Mantenimiento de emergencia" <?php if ($mantenimiento_asignado == "Mantenimiento de emergencia") echo "selected"; ?>>Mantenimiento de emergencia</option>
                    <option value="Mantenimiento de rutina" <?php if ($mantenimiento_asignado == "Mantenimiento de rutina") echo "selected"; ?>>Mantenimiento de rutina</option>
                </select>
            </div>
            <div class="form-group">
                <label for="reparacion_asignada">Reparación Asignada:</label>
                <select name="reparacion_asignada" id="reparacion_asignada" class="form-control">
                    <option value="Mantenimiento preventivo" <?php if ($reparacion_asignada == "Mantenimiento preventivo") echo "selected"; ?>>Mantenimiento preventivo</option>
                    <option value="Reparación correctiva" <?php if ($reparacion_asignada == "Reparación correctiva") echo "selected"; ?>>Reparación correctiva</option>
                    <option value="Actualización de hardware" <?php if ($reparacion_asignada == "Actualización de hardware") echo "selected"; ?>>Actualización de hardware</option>
                    <option value="Actualización de software" <?php if ($reparacion_asignada == "Actualización de software") echo "selected"; ?>>Actualización de software</option>
                    <option value="Sustitución de componentes" <?php if ($reparacion_asignada == "Sustitución de componentes") echo "selected"; ?>>Sustitución de componentes</option>
                    <option value="Reconfiguración del equipo" <?php if ($reparacion_asignada == "Reconfiguración del equipo") echo "selected"; ?>>Reconfiguración del equipo</option>
                    <option value="Servicio de mantenimiento regular" <?php if ($reparacion_asignada == "Servicio de mantenimiento regular") echo "selected"; ?>>Servicio de mantenimiento regular</option>
                </select>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" name="activo" <?php if ($activo == 1) echo "checked"; ?>>
                <label class="form-check-label" for="activo">Activo</label>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
        </form>
    </div>

    <!-- Modal de Alerta -->
    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alertModalLabel">Alerta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Registro actualizado correctamente.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="redirigir()">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts al final del cuerpo -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../script/script_edit_regis.js"></script>
    <script>
    if (typeof updateSuccessful !== 'undefined' && updateSuccessful) {
        $('#alertModal').modal('show');
    }
</script>


</body>

</html>

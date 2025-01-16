<!DOCTYPE html>
<html>
<head>
<!-- Script de JavaScript para mostrar advertencias -->
<script>
    function showWarning(message) {
        if (confirm(message + " ¿Deseas volver al formulario de inicio de sesión?")) {
            window.location.href = "../ingresar/index.html"; 
        }
    }
</script>
</head>
<body>

<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "morat12345";
$database = "projard";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$identificacion = $_POST['identificacion'];
$contrasena = $_POST['contrasena'];
$rol = $_POST['rol'];

// Consulta para buscar la identificación y contraseña
$sql = "SELECT id_rol, contraseña FROM informacion_roles WHERE identificacion = '$identificacion'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $stored_hashed_password = $row['contraseña'];

    if (password_verify($contrasena, $stored_hashed_password)) {
        $id_rol = $row['id_rol'];

        // Consulta para obtener los roles permitidos
        $sql_roles = "SELECT tecnico_sistemas, empleado, gerencia FROM nombre_rol WHERE id_rol = '$id_rol'";
        $result_roles = $conn->query($sql_roles);

        if ($result_roles->num_rows === 1) {
            $row_roles = $result_roles->fetch_assoc();
            if (($rol == "tecnico_sistemas" && $row_roles['tecnico_sistemas'] == $id_rol) ||
                ($rol == "empleado" && $row_roles['empleado'] == $id_rol) ||
                ($rol == "gerencia" && $row_roles['gerencia'] == $id_rol)) {
                // Redireccionar según el rol

                if ($rol == "tecnico_sistemas") {
                    header("Location: ../panels de ingreso/panel_tecnico/tecnico_sistemas_panel.php"); 
                    exit;
                } elseif ($rol == "empleado") {
                    header("Location: ../panels de ingreso/panel_empleado/empleado_panel.php"); 
                    exit;
                } elseif ($rol == "gerencia") {
                    header("Location: ../panels de ingreso/panel_gerencia/gerencia_panel.php"); 
                    exit;
                }
            } else {
                echo "<script>showWarning('No tienes permisos para acceder a este rol.');</script>";
            }
        } else {
            echo "<script>showWarning('Error al obtener roles: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>showWarning('Contraseña incorrecta.');</script>";
    }
} else {
    echo "<script>showWarning('Usuario no encontrado, identificación incorrecta.');</script>";
}

$conn->close();
?>


</body>
</html>

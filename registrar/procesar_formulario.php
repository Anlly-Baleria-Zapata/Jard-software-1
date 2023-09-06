<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "proyectjard";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$identificacion = $_POST['identificacion'];
$contrasena = $_POST['contrasena'];
$rol = $_POST['rol'];

// Generar el hash de la contraseña
$hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

// Insertar en la tabla informacion_roles
$sql_informacion_roles = "INSERT INTO informacion_roles (id_rol, nombre, identificacion, contraseña) VALUES ('', '$nombre', '$identificacion', '$hashed_password')";
if ($conn->query($sql_informacion_roles) === TRUE) {
    echo "<script>alert('Datos insertados en la base de datos correctamente.'); window.location.href = '../ingresar/index.html';</script>";
} else {
    echo "<script>alert('Error al insertar datos: " . $conn->error . "');</script>";
}

// Obtener el ID generado en la inserción anterior
$informacion_roles_id = $conn->insert_id;

// Insertar en la tabla nombre_rol
$sql_nombre_rol = "INSERT INTO nombre_rol (tecnico_sistemas, empleado, gerencia) VALUES (";
if ($rol == "tecnico_sistemas") {
    $sql_nombre_rol .= "'$informacion_roles_id', NULL, NULL)";
} elseif ($rol == "empleado") {
    $sql_nombre_rol .= "NULL, '$informacion_roles_id', NULL)";
} elseif ($rol == "gerencia") {
    $sql_nombre_rol .= "NULL, NULL, '$informacion_roles_id')";
}

if ($conn->query($sql_nombre_rol) === TRUE) {
    echo "<script>alert('Datos insertados en la tabla nombre_rol correctamente.'); window.location.href = '../ingresar/index.html';</script>";
} else {
    echo "<script>alert('Error al insertar datos en la tabla nombre_rol: " . $conn->error . "');</script>";
}

$conn->close();
?>


<?php
include '../conexion.php'; 

if (isset($_GET["id"])) {
    $num_hoja_de_vida_equipo = $_GET["id"]; 

    // Consulta para desactivar el registro con el num_hoja_de_vida_equipo dado
    $sql = "UPDATE rlhv_e SET activo = 0 WHERE num_hoja_de_vida_equipo = $num_hoja_de_vida_equipo"; 

    if ($conn->query($sql) === TRUE) {
        // Registro desactivado exitosamente, mostrar mensaje de confirmación
        echo '<script>
            if (confirm("Registro desactivado exitosamente.")) {
                window.location.href = "../computadores/index.php"; // Reemplaza "otra_pagina.php" con la URL a la que deseas redirigir
            } else {
                window.location.href = document.referrer; // Redirige de nuevo a la página anterior si se cancela
            }
        </script>';
    } else {
        echo "Error al desactivar el registro: " . $conn->error;
    }
}

$conn->close();

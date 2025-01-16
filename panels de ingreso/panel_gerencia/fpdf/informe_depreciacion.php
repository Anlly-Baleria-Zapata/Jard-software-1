<?php
require('fpdf.php'); 

// Establece la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "morat12345";
$database = "projard";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores ingresados por el usuario
    $costoInicial = $_POST["costo_inicial"];
    $valorRescate = $_POST["valor_rescate"];
    $vidaUtil = $_POST["vida_util"];

    // Realizar el cálculo
    $resultado = ($costoInicial - $valorRescate) / $vidaUtil;

    // Actualizar la base de datos con el resultado
    $updateQuery = "UPDATE depreciacion SET Costo_computador = $costoInicial, Valor_de_rescate = $valorRescate, total_de_unidades_estimadas_durante_la_vida_útil_del_computador = $vidaUtil, resultado = $resultado WHERE num_hoja_de_vida_equipo = " . $_POST["num_hoja_de_vida_equipo"];
    if ($conn->query($updateQuery) === TRUE) {
        $mensajeExito = "Operación exitosa. Los valores se han actualizado en la base de datos.";
    } else {
        echo "Error al actualizar en la base de datos: " . $conn->error;
    }
}

$sql = "SELECT * FROM depreciacion"; 
$result = $conn->query($sql);

$pdf = new FPDF('L');
$pdf->AddPage();

// Agregar título al informe
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Informe de Depreciación', 0, 1, 'C');

// Crear una tabla para mostrar los datos
$pdf->SetFont('Arial', '', 12);
$pdf->SetFillColor(192, 192, 192); 
$pdf->Cell(50, 10, 'No. Hoja de Vida', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'Costo del Computador', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'Valor de Rescate', 1, 0, 'C', 1);
$pdf->Cell(60, 10, 'Total de Unidades Estimadas', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'Resultado', 1, 1, 'C', 1);

// Recorre los resultados de la consulta y agrega filas a la tabla
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(50, 10, $row["num_hoja_de_vida_equipo"], 1, 0, 'C');
        $pdf->Cell(50, 10, $row["Costo_computador"], 1, 0, 'C');
        $pdf->Cell(50, 10, $row["Valor_de_rescate"], 1, 0, 'C');
        $pdf->Cell(60, 10, $row["total_de_unidades_estimadas_durante_la_vida_útil_del_computador"], 1, 0, 'C');
        $pdf->Cell(30, 10, $row["resultado"], 1, 1, 'C');
    }
} else {
    $pdf->Cell(150, 10, 'No se encontraron registros.', 1, 1, 'C');
}

$pdf->Output('Informe_Depreciacion.pdf', 'D');

$conn->close();

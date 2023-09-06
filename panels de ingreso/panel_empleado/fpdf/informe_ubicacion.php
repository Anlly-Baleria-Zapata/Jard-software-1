<?php
require('fpdf.php');

// Establece la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "proyectjard";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Realiza la consulta SQL
$sql = "SELECT * FROM ubicacion"; 
$result = $conn->query($sql);

$pdf = new FPDF();
$pdf->AddPage();

// Agregar título al informe
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Informe de Ubicación', 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->SetFillColor(192, 192, 192); 
$pdf->Cell(40, 10, 'No. Hoja de Vida', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'ID del Equipo', 1, 0, 'C', 1);
$pdf->Cell(70, 10, 'Ubicación Actual', 1, 1, 'C', 1);

// Recorre los resultados de la consulta y agrega filas a la tabla
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(40, 10, $row["num_hoja_de_vida_equipo"], 1, 0, 'C');
    $pdf->Cell(30, 10, $row["id_equipo"], 1, 0, 'C');
    $pdf->Cell(70, 10, $row["ubicacion"], 1, 1, 'C');
}

$pdf->Output('Informe_Ubicacion.pdf', 'D');


$conn->close();

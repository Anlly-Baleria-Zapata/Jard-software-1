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
$sql = "SELECT
    rlhv_e.num_hoja_de_vida_equipo,
    rlhv_e.id_equipo,
    rlhv_e.nombre_SO,
    rlhv_e.nombre_sistema,
    rlhv_e.modelo_sistema,
    rlhv_e.precauciones_utilizacion,
    CONCAT(informacion_roles.id_rol, ' - ', informacion_roles.nombre) AS personas_responsables,
    rlhv_e.observaciones_generales,
    rlhv_e.mantenimiento_asignado,
    rlhv_e.reparacion_asignada,
    rlhv_e.activo
FROM rlhv_e
INNER JOIN informacion_roles ON rlhv_e.personas_responsables = informacion_roles.id_rol";

$result = $conn->query($sql);

$pdf = new FPDF('L', 'mm', 'A3');
$pdf->AddPage();

// Agregar título al informe
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Informe de Computadores', 0, 1, 'C');

// Crear una tabla para mostrar los datos
$pdf->SetFont('Arial', '', 12);
$pdf->SetFillColor(192, 192, 192); 
$pdf->Cell(10, 10, 'No.', 1, 0, 'C', 1);
$pdf->Cell(20, 10, 'ID Equipo', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'Nombre SO', 1, 0, 'C', 1);
$pdf->Cell(33, 10, 'Nombre Sistema', 1, 0, 'C', 1);
$pdf->Cell(35, 10, 'Modelo Sistema', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'Precauciones de Utilizacion', 1, 0, 'C', 1);
$pdf->Cell(48, 10, 'Personas Responsables', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'Observaciones Generales', 1, 0, 'C', 1);
$pdf->Cell(52, 10, 'Mantenimiento Asignado', 1, 0, 'C', 1);
$pdf->Cell(55, 10, 'Reparacion Asignada', 1, 0, 'C', 1);
$pdf->Cell(26, 10, 'Estado', 1, 1, 'C', 1);

// Recorre los resultados de la consulta y agrega filas a la tabla
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(10, 10, $row["num_hoja_de_vida_equipo"], 1, 0, 'C');
    $pdf->Cell(20, 10, $row["id_equipo"], 1, 0, 'C');
    $pdf->Cell(30, 10, $row["nombre_SO"], 1, 0, 'C');
    $pdf->Cell(33, 10, $row["nombre_sistema"], 1, 0, 'C');
    $pdf->Cell(35, 10, $row["modelo_sistema"], 1, 0, 'C');
    $pdf->Cell(50, 10, $row["precauciones_utilizacion"], 1, 0, 'C');
    $pdf->Cell(48, 10, $row["personas_responsables"], 1, 0, 'C');
    $pdf->Cell(50, 10, $row["observaciones_generales"], 1, 0, 'C');
    $pdf->Cell(52, 10, $row["mantenimiento_asignado"], 1, 0, 'C');
    $pdf->Cell(55, 10, $row["reparacion_asignada"], 1, 0, 'C');
    $pdf->Cell(26, 10, ($row["activo"] == 1) ? 'Activo' : 'Desactivado', 1, 1, 'C');
}


$pdf->Output('Informe.pdf', 'D');

$conn->close();

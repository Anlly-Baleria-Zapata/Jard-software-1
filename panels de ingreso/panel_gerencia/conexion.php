<?php
$servername = "localhost"; 
$username = "root"; 
$password = "morat12345"; 
$database = "projard"; 


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

<?php
$host = "localhost";
$user = "root";
$password = "lia12";
$dbname = "suministros_sa";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>


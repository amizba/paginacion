<?php
// Credenciales del servidor MySQL
$hostDB = "localhost";
$userDB = "root";
$passDB = "root";
$dataDB = "ebook";
$conn = mysqli_connect($hostDB, $userDB, $passDB, $dataDB) or die("La conexion ha fallado: " . mysqli_error());
?>
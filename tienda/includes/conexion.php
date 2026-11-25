<?php
// Conexión a la base de datos "semestral" usando PDO
// En XAMPP el usuario por defecto es root y la contraseña está vacía.
// Si tu MySQL tiene contraseña (ej. mysql123), colócala en $dbpass.
$dbhost = 'localhost';
$dbname = 'semestral';
$dbuser = 'root';
$dbpass = '';

try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8mb4", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

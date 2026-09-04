<?php
$host = "localhost";
$dbname = "comedor_universitario";
$usuario_bd = "root";
$clave_bd = "";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $usuario_bd,$clave_bd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("Error de conexión: " . $e->getMessage());
}
?>
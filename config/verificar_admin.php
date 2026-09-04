<?php
session_start();

if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['id_rol']) || $_SESSION['id_rol'] !== 1) {
    header("Location: index.php");
    exit;
}

?>
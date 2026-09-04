<?php
    require_once("../config/verificar_admin.php");
    require_once("../config/conexion.php");
    require_once("../modelos/UsuarioModelo.php");

    $usuarioModelo = new UsuarioModelo($pdo);
    $id_usuario = $_GET['id'] ?? null;
    $usuarioModelo->darDeBaja($id_usuario);
    header("Location: ../vistas/panel_admin.php");
    exit();
?>
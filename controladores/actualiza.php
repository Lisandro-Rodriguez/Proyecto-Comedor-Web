<?php
    require_once("../config/verificar_admin.php");
    require_once("../config/conexion.php");
    
    require_once("../modelos/UsuarioModelo.php");
    
    
    $id_usuario = $_POST['id_usuario'] ?? null;
    $estado = $_POST['estado'] ?? null;
    $id_beca = $_POST['beca'] ?? null;

    $usuario = new UsuarioModelo($pdo);
    $usuario->actualizar($id_usuario,$estado,$id_beca);
    header("Location: ../vistas/panel_admin.php");
    exit();


?>
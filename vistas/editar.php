<?php
    require_once("../config/verificar_admin.php");
    require_once("../modelos/UsuarioModelo.php");
    require_once("../modelos/LocalidadModelo.php");
    require_once("../modelos/BecaModelo.php");
    require_once("../config/conexion.php");

    $id = $_GET['id'] ?? null;

    $usuarioModelo = new UsuarioModelo($pdo);
    $usuario = $usuarioModelo->buscarPorId($id);
?>

<form method="POST" action="../controladores/actualiza.php">
    <label for="editar">Editar Usuario:</label>
    <span > <?= htmlspecialchars($usuario['dni']); ?> </span>
    <span ><?= htmlspecialchars($usuario['nombre']); ?>" </span>
    <span><?= htmlspecialchars($usuario['apellido']); ?></span>

    <label for="estado">
    Cambiar Estado
    </label>
    <select name="estado" id="estado">
        <option value="1" <?= $usuario['estado'] == 1 ? 'selected' : ''; ?>>Activo</option>
        <option value="0" <?= $usuario['estado'] == 0 ? 'selected' : ''; ?>>Inactivo</option>
    </select>

    <label for="beca">Editar Tipo de Beca</label>
    <select name="beca" id="beca">
        
        <?php
            $beca = new BecaModelo($pdo);
            $becas = $beca->listarTodas();
            foreach ($becas as $unaBeca) {
                $selected = ($usuario['id_beca'] == $unaBeca['id_beca']) ? 'selected' : '';
                echo "<option value=\"{$unaBeca['id_beca']}\" $selected>{$unaBeca['nombre_beca']}</option>";
            }
        ?>

    </select>
    <button type="submit">Actualizar</button>
    <input type="hidden" name="id_usuario" value="<?= htmlspecialchars($usuario['id_usuario']); ?>">
</form>
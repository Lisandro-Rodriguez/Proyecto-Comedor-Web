<?php
    require_once("../config/verificar_admin.php");
    require_once("../modelos/UsuarioModelo.php");
    require_once("../modelos/LocalidadModelo.php");
    require_once("../modelos/BecaModelo.php");
    require_once("../config/conexion.php");
    require_once("parciales/header_admin.php");

    $id = $_GET['id'] ?? null;

    $usuarioModelo = new UsuarioModelo($pdo);
    $usuario = $usuarioModelo->buscarPorId($id);
?>

<form method="POST" action="../controladores/actualiza.php" class="max-w-sm mx-auto">
    <label for="editar" class="block mb-2.5 text-sm font-medium text-heading">Editar Usuario:</label>
    <span class="inline-block font-semibold text-gray-900 dark:text-gray-100 bg-gray-100 dark:bg-gray-800 px-2.5 py-1 rounded-md text-sm mr-1 mb-4
"> <?= htmlspecialchars($usuario['dni']); ?> </span>
    <span class="inline-block font-semibold text-gray-900 dark:text-gray-100 bg-gray-100 dark:bg-gray-800 px-2.5 py-1 rounded-md text-sm mr-1 mb-4
"><?= htmlspecialchars($usuario['nombre']); ?> </span>
    <span class="inline-block font-semibold text-gray-900 dark:text-gray-100 bg-gray-100 dark:bg-gray-800 px-2.5 py-1 rounded-md text-sm mr-1 mb-4
"><?= htmlspecialchars($usuario['apellido']); ?></span>

    <label for="estado" class="block mb-2 text-sm font-medium text-black-900 dark:text-black-200 mt-4">
    Cambiar Estado
    </label>
    <select name="estado" id="estado" class="block w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-950 dark:text-gray-100 text-sm rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors
">
        <option value="1" <?= $usuario['estado'] == 1 ? 'selected' : ''; ?>>Activo</option>
        <option value="0" <?= $usuario['estado'] == 0 ? 'selected' : ''; ?>>Inactivo</option>
    </select>

    <label for="beca" class="block mb-2 text-sm font-medium text-black-900 dark:text-black-200 mt-4">Editar Tipo de Beca</label>
    <select name="beca" id="beca" class="block w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-950 dark:text-gray-100 text-sm rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors
">
        
        <?php
            $beca = new BecaModelo($pdo);
            $becas = $beca->listarTodas();
            foreach ($becas as $unaBeca) {
                $selected = ($usuario['id_beca'] == $unaBeca['id_beca']) ? 'selected' : '';
                echo "<option value=\"{$unaBeca['id_beca']}\" $selected>{$unaBeca['nombre_beca']}</option>";
            }
        ?>

    </select>
    <button type="submit" class="w-full mt-6 px-4 py-2.5 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-500/30 rounded-lg shadow-sm focus:outline-none transition-all duration-150 text-center
" >Actualizar</button>
    <input type="hidden" name="id_usuario" value="<?= htmlspecialchars($usuario['id_usuario']); ?>">
</form>
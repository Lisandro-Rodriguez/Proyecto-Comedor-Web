<?php
require_once("../config/verificar_admin.php");


$filtro = $_GET["filtro"] ?? 'todos';
require_once("../config/conexion.php");
require_once("../modelos/UsuarioModelo.php");

$usuario =  new UsuarioModelo($pdo);
$datosUsuario = $usuario->listarConFiltro($filtro);

?>


<form method="GET">
  <button type="submit" name="filtro" value="todos">Todos</button>
  <button type="submit" name="filtro" value="activos">Activos</button>
  <button type="submit" name="filtro" value="inactivos">Inactivos</button>
  <button type="submit" name="filtro" value="incompletos">Incompletos</button>
</form>

<table class="border-separate border-spacing-2 border border-gray-400 dark:border-gray-500">
  <thead>
    <tr>
      <th class="border border-gray-300 dark:border-gray-600">DNI</th>
      <th class="border border-gray-300 dark:border-gray-600">Nombre</th>
      <th class="border border-gray-300 dark:border-gray-600">Apellido</th>
      <th class="border border-gray-300 dark:border-gray-600">Email</th>
      <th class="border border-gray-300 dark:border-gray-600">Localidad</th>
      <th class="border border-gray-300 dark:border-gray-600">Tipo de Beca</th>
      <th class="border border-gray-300 dark:border-gray-600">Rol</th>
      <th class="border border-gray-300 dark:border-gray-600">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($datosUsuario as $u): ?>
    <tr >
        <td class="border border-gray-300 dark:border-gray-700"><?=  htmlspecialchars($u['dni']); ?></td>
        <td class="border border-gray-300 dark:border-gray-700"><?= htmlspecialchars($u['nombre']); ?></td>
        <td class="border border-gray-300 dark:border-gray-700"><?= htmlspecialchars($u['apellido']); ?></td>
        <td class="border border-gray-300 dark:border-gray-700"><?=  htmlspecialchars($u['email']); ?></td>
        <td class="border border-gray-300 dark:border-gray-700"><?=  htmlspecialchars($u['nombre_localidad']); ?></td>
        <td class="border border-gray-300 dark:border-gray-700"><?=  htmlspecialchars($u['nombre_beca']); ?></td>
        <td class="border border-gray-300 dark:border-gray-700"><?=  htmlspecialchars($u['nombre_rol']); ?></td>

        <td class="border border-gray-300 dark:border-gray-700">
                <?php if ($u['estado'] == 1): ?>
                    <a href="../controladores/borrar.php?id=<?= (int)$u['id_usuario'] ?>" class="btn btn-info btn-sm" onclick="return confirm('¿Está seguro de dar de baja a este usuario?')">
                        Borrar
                    </a>
                <?php endif; ?>
            
                <a href="editar.php?id=<?= (int)$u['id_usuario']?>"
                class="btn btn-info btn-sm">
                     Editar</a>
        </td>
    </tr>

    <?php endforeach; ?>
  </tbody>
</table> 
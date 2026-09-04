<?php
require_once("../config/verificar_admin.php");


$filtro = $_GET["filtro"] ?? 'todos';
require_once("../config/conexion.php");
require_once("../modelos/UsuarioModelo.php");

$usuario =  new UsuarioModelo($pdo);
$datosUsuario = $usuario->listarConFiltro($filtro);

require_once("parciales/header_admin.php");
?>


<form method="GET" class="flex flex-wrap items-center gap-2 p-2 bg-gray-50 rounded-xl max-w-max border border-gray-200/80">
  <button type="submit" name="filtro" value="todos" class="px-4 py-2 text-sm font-medium rounded-lg text-blue-600 bg-blue-50 border border-blue-200 transition-all hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
    Todos</button>
  <button type="submit" name="filtro" value="activos" class="px-4 py-2 text-sm font-medium rounded-lg text-blue-600 bg-blue-50 border border-blue-200 transition-all hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
    Activos</button>
  <button type="submit" name="filtro" value="inactivos" class="px-4 py-2 text-sm font-medium rounded-lg text-blue-600 bg-blue-50 border border-blue-200 transition-all hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
    Inactivos</button>
  <button type="submit" name="filtro" value="incompletos" class="px-4 py-2 text-sm font-medium rounded-lg text-blue-600 bg-blue-50 border border-blue-200 transition-all hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
    Incompletos</button>
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
                    <a href="../controladores/borrar.php?id=<?= (int)$u['id_usuario'] ?>" class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-md text-red-700 bg-red-50 border border-red-200 transition-colors duration-150 hover:bg-red-100 dark:bg-red-950/40 dark:text-red-400 dark:border-red-900/50 dark:hover:bg-red-950/60
                      " onclick="return confirm('¿Está seguro de dar de baja a este usuario?')">
                        Borrar
                    </a>
                <?php endif; ?>
            
                <a href="editar.php?id=<?= (int)$u['id_usuario']?>"
                class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-md text-amber-700 bg-amber-50 border border-amber-200 transition-colors duration-150 hover:bg-amber-100 dark:bg-amber-950/40 dark:text-amber-400 dark:border-amber-900/50 dark:hover:bg-amber-950/60
">
                     Editar</a>
        </td>
    </tr>

    <?php endforeach; ?>
  </tbody>
</table> 

                </body>
                </html>
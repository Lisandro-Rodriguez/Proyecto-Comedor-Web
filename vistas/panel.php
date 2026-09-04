<?php
    session_start();
    if(!isset($_SESSION['usuario_id'])){
        header("Location: index.php");
        exit;
    }

    require_once("../config/conexion.php");
    require_once("../modelos/UsuarioModelo.php");
    require_once("../modelos/LocalidadModelo.php");

    $usuario = new UsuarioModelo($pdo);
    $datosUsuario = $usuario->buscarPorId($_SESSION['usuario_id']);


    $localidadModelo = new LocalidadModelo($pdo);
    $datosLocalidad = $localidadModelo->buscarPorId($datosUsuario['id_localidad']);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Página Principal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style-panel.css">
    </head>
    <body>
        <header>
            <div class="grupo-perfil">
                 <div class="imagen-reducida">
                    <img src="../imgs/alumno.jpg" alt="Imagen Perfil Usuario">
                </div>
                <div class="datos-usuario">
                    <div class="campo">
                        <p>DNI</p>
                        <span id="f-dni"><?=$datosUsuario['dni']?></span>
                    </div>
                    <div class="campo">
                        <p>Alumno</p>
                        <span id="f-nombre"><?=$datosUsuario['apellido'] . " " . $datosUsuario['nombre']?></span>
                    </div>
                    <div class="campo">
                        <p>Localidad</p>
                        <span id="f-localidad"><?= $datosLocalidad['nombre_localidad']?></span>
                    </div>
                    
                </div>
            </div>
            
            <nav>
                <a href="#editar" class="btn-header">Editar Perfil</a>
                <a href="../controladores/logout.php" class="btn-header btn-cerrar">Cerrar Sesión</a>
                <?php if (isset($_SESSION['id_rol']) && $_SESSION['id_rol'] === 1): ?>
                <a href="panel_admin.php" class="btn-header">Administrativo</a>
                <?php endif; ?>
            </nav>
        </header>

        <main>

            <section class="reserva-semanal">

                <h2>Mis reservas de la semana</h2>

                <div class="dia-reserva">
                    <h4>Lunes</h4>

                    <div class="detalle-reserva">
                        <span>Menú: Normal</span>
                        <span class="estado reservado">Reservado</span>
                    </div>

                    <button type="button" class="btn-accion">Cancelar</button>
                </div>

                <div class="dia-reserva">
                    <h4>Martes</h4>

                    <div class="detalle-reserva">
                        <span>Menú: Vegetariano</span>
                        <span class="estado consumido">Consumido</span>
                    </div>

                    <button type="button" class="btn-accion" disabled>Consumido</button>
                </div>

                <div class="dia-reserva">
                    <h4>Miércoles</h4>

                    <div class="detalle-reserva">
                        <span>Menú: Normal</span>
                        <span class="estado disponible">Disponible</span>
                    </div>

                    <button type="button" class="btn-accion">Reservar</button>
                </div>

                <div class="dia-reserva">
                    <h4>Jueves</h4>

                    <div class="detalle-reserva">
                        <span>Menú: Vegetariano</span>
                        <span class="estado reservado">Reservado</span>
                    </div>

                    <button type="button" class="btn-accion">Cancelar</button>
                </div>

                <div class="dia-reserva">
                    <h4>Viernes</h4>

                    <div class="detalle-reserva">
                        <span>Menú: Normal</span>
                        <span class="estado vencido">Vencido</span>
                    </div>

                    <button type="button" class="btn-accion" disabled>Vencido</button>
                </div>

            </section>

            <section class="cartel">

                <h3>Noticias y Novedades</h3>

                <p id="cartel-novedades">
                    📢 <strong>Importante:</strong>
                    Recuerde realizar su reserva con anticipación
                    para garantizar la disponibilidad del menú.
                </p>

            </section>

            <section class="historial">

                <h2>Historial de Asistencia</h2>

                <table>

                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Menú</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>18/08/2026</td>
                            <td>Normal</td>
                            <td>Consumido</td>
                        </tr>

                        <tr>
                            <td>19/08/2026</td>
                            <td>Vegetariano</td>
                            <td>Consumido</td>
                        </tr>

                        <tr>
                            <td>20/08/2026</td>
                            <td>Normal</td>
                            <td>Consumido</td>
                        </tr>

                        <tr>
                            <td>21/08/2026</td>
                            <td>Vegetariano</td>
                            <td>No asistió</td>
                        </tr>

                        <tr>
                            <td>24/08/2026</td>
                            <td>Normal</td>
                            <td>Consumido</td>
                        </tr>

                    </tbody>

                </table>

            </section>
        </main>

        <script src="../js/script-panel.js"></script>
    </body>
</html>
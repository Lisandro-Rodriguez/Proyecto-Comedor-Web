<?php
require_once("../config/conexion.php");
require_once("../modelos/LocalidadModelo.php");


$localidad = new LocalidadModelo($pdo);
$localidades = $localidad->listarTodas();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-registro.css">
</head>

<body>
    <header>
        <a href="index.html" class="btn-volver">&larr; Volver al inicio</a>
    </header>
    <div>
        <h2>
        </h2>
        <div class="container">
            <form action="../controladores/RegistroControlador.php" id="form-registro" method="post">
                <h2>Formulario de Registro</h2>
                <div class="campo">
                    <label for="dni">DNI</label>
                    <input type="text" id="dni" name="dni" placeholder="44.333.222" required>
                </div>
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Lisandro Gabriel" required>
                </div>
                <div class="campo">
                    <label for="nombre">Apellido</label>
                    <input type="text" id="apellido" name="apellido" placeholder="Rodriguez Parra" required>
                </div>
                <div   class="campo" >
                    <label for="email">Correo Electronico</label>
                    <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>
                </div>
                <div class="campo">
                    <label for="localidad">Localidad</label>
                    <select name="localidad" id="localidad">
                        <option value="" disabled selected>Seleccione una Localidad</option>
                        <?php  foreach($localidades as $loc): ?>
                            <option 
                                value="<?= $loc['id_localidad']?>"><?= $loc['nombre_localidad']?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="campo">
                    <label for="pass">Contraseña</label>
                    <input type="password" id="pass" name="con" placeholder="Mínimo 6 carácteres" required>
                </div>
                <div class="campo">
                    <label for="pass-confirm">Repetir Contraseña</label>
                    <input type="password" id="pass-confirm" name="con_confirm" placeholder="Repite tu contraseña" required>
                </div>
                <span id="txt-problema"></span>
                <button type="submit">Enviar Formulario</button>
            </form>
        </div>
    </div>

    <script src="../js/validacion.js">

    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Para que el ancho sea igual al del mobile -->
        <title>Comedor Universitario</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <header>
            <img src="../imgs/logoUNSa.jpeg" alt="Logo UNSa">
            <nav>
                <a href="../vistas/registro.php">Registro</a>
            </nav>
        </header>

        <main class="content">
            <section class="inicio-sesion">
                <h2 class="titulo">Iniciar Sesión</h2>
                <form action="../controladores/LoginControlador.php" method="POST">

                    <div class="caja-usuario">
                        <label for="usuario">Usuario <strong>(DNI)</strong>:</label>
                        <input type="text" id="usuario" name="usuario" placeholder="44136777" required>
                    </div>

                    <div class="caja-password">
                        <label for="contrasena">Contraseña:</label>
                        <input type="password" id="contrasena" name="contrasena" placeholder="*******" required>

                    <div class="mostrar-contenedor">
                            <input type="checkbox" id="mostrar-casilla" onclick="alternarPassword()">
                            <label for="mostrar-casilla">Mostrar Contraseña</label>
                        </div>
                    </div>

                    <div class="caja-enlaces">
                        <a href="../vistas/registro.html">¿Olvidaste tu contraseña?</a>
                        <a href="../vistas/registro.html">Registrarse</a>
                    </div>
                    
                    <span id="msj-error"></span>

                    <button type="submit" id="boton-ingreso">Iniciar Sesión</button>

                </form>
            </section>

            <section class="calendario-contenedor">
                <h2 class="titulo">Servicio Semanal</h2>
                
                <div class="fila-dias">

                    <details class="dia">
                        <summary>
                            <h3>Lunes</h3>
                        </summary>

                        <div class="contenedor">
                            <div class="plato veggie">Entradas: <strong>Sopa de verduras de estación</strong></div>
                            <div class="plato veggie">Principal: <strong>Pata de Pollo con Pure</strong></div>
                            <div class="plato veggie">Alternativa: <strong>Medallones de lentejas con Pure</strong></div>
                            <div class="plato veggie">Postre: <strong>Manzana o Banana</strong></div>
                        </div>

                    </details>

                    <details class="dia">
                        <summary>
                            <h3>Martes</h3>
                        </summary>
                        <div class="contenedor">
                            <div class="plato veggie">
                                Entradas: <strong>Ensalada de zanahoria, tomate y huevo</strong>
                            </div>
                            <div class="plato veggie">
                                Principal: <strong>Milanesa de pollo con arroz primavera</strong>
                            </div>
                            <div class="plato veggie">
                                Alternativa: <strong>Milanesa de soja con arroz primavera</strong>
                            </div>
                            <div class="plato veggie">
                                Postre: <strong>Naranja o manzana</strong>
                            </div>
                        </div>
                    </details>

                    <details class="dia">
                        <summary>
                            <h3>Miércoles</h3>
                        </summary>
                        <div class="contenedor">
                            <div class="plato veggie">
                                Entradas: <strong>Empanada de verdura</strong>
                            </div>
                            <div class="plato veggie">
                                Principal: <strong>Guiso de lentejas con carne</strong>
                            </div>
                            <div class="plato veggie">
                                Alternativa: <strong>Guiso de lentejas con verduras</strong>
                            </div>
                            <div class="plato veggie">
                                Postre: <strong>Banana o mandarina</strong>
                            </div>
                        </div>
                    </details>

                    <details class="dia">
                        <summary>
                            <h3>Jueves</h3>
                        </summary>
                        <div class="contenedor">
                            <div class="plato veggie">
                                Entradas: <strong>Ensalada de remolacha y huevo</strong>
                            </div>
                            <div class="plato veggie">
                                Principal: <strong>Pollo al horno con papas</strong>
                            </div>
                            <div class="plato veggie">
                                Alternativa: <strong>Tortilla de papa y verduras</strong>
                            </div>
                            <div class="plato veggie">
                                Postre: <strong>Manzana o banana</strong>
                            </div>
                        </div>
                    </details>

                    <details class="dia">
                        <summary>
                            <h3>Viernes</h3>
                        </summary>
                        <div class="contenedor">
                            <div class="plato veggie">
                                Entradas: <strong>Ensalada rusa</strong>
                            </div>
                            <div class="plato veggie">
                                Principal: <strong>Fideos con salsa boloñesa</strong>
                            </div>
                            <div class="plato veggie">
                                Alternativa: <strong>Fideos con salsa de tomate y verduras</strong>
                            </div>
                            <div class="plato veggie">
                                Postre: <strong>Flan o fruta de estación</strong>
                            </div>
                        </div>
                    </details>
                
                </div>
            </section>
 
        </main>

        <form id="form-solicitud">
            <h2>Formulario de Ayuda</h2>

            <div class="campo">
                <label for="nombre-form" name="dni-form">Nro. DNI</label>
                <input type="text" name="DNI" placeholder="DNI" required>
            </div>
            
            <div class="campo">
                <label for="email-universitario" name="email">Correo electrónico</label>
                <input type="email" name="Email" placeholder="Email Universitario" required>
            </div>
            <div class="campo" id="contenedor-otro" style="display: none;">
                <label for="otro">Otro</label>
                <textarea id="otro" name="mensaje" placeholder="Escriba su consulta"></textarea>
            </div>
            <label for="asunto" >Asunto:</label>
            <select name="asunto" id="asunto">
                    <option value="Reinicio de Clave">Olvide Mi Contraseña</option>
                    <option value="Nuevo Usuario">Nuevo Usuario</option>
                    <option value="Otro">Otro</option>
            </select>

            <button type="submit" id="btn-submit">Enviar</button>
        </form>

        <section class="flotantes">
            <div class="redes">
                <a href="https://www.unsa.edu.ar" id="unsa">
               <span class="redes-nombre">
                    Página Universitaria
                </span>
                </a>
            </div>
            <div class="redes">
                <a href="https://www.facebook.com/unsa.salta/?locale=es_LA" id="facebook">
                <span class="redes-nombre">
                    Facebook
                </span>
                </a>
            </div>
            <div class="redes">
                <a href="https://www.instagram.com/comedor.unsa/" id="instagram">
                <span class="redes-nombre"> Instagram</span>
            </a>
                
            </div>
        </section>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>

        <!-- 2. SEGUNDO: La inicialización con tu Public Key -->
        <script type="text/javascript">
        (function(){
            emailjs.init({
                publicKey: "mWUZm2GGBjYC4HOy5",
            });
        })();
        </script>

        <script src="../js/script.js"></script>
    </body>
</html>
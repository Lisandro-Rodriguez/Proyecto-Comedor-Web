<?php 

    session_start();
    require_once("../config/conexion.php");
    require_once("../modelos/UsuarioModelo.php");

    class LoginControlador {
        private $usuarioModelo;
    
    
        public function __construct($pdo) {
        $this->usuarioModelo = new UsuarioModelo($pdo);
        }


    /* $usuario es el dni ingresado que se llama asi por el name del form */
    public function login($usuario, $contrasena) {  
        $datosUsuario = $this->usuarioModelo->buscarPorDni($usuario);
        if(!$datosUsuario) {
            die("Usuario no existente");
        }else{
            if(password_verify($contrasena,$datosUsuario['contraseña'])) {
                if($datosUsuario['estado']!=0){
                    $_SESSION['usuario_id']= $datosUsuario['id_usuario'];
                    $_SESSION['id_rol'] = $datosUsuario['id_rol'];
                    header("location: ../vistas/panel.php");
                }else{
                    die("Usuario no activo, contactarse con administración");
                }
                
            }else{
                die("Contraseña Incorrecta");
            }
        }
    }
    }

    $usuario = trim($_POST["usuario"] ?? '');
    $contrasena = trim($_POST['contrasena'] ??'');

    $controlador = new LoginControlador($pdo);
    $controlador->login($usuario, $contrasena);
?>
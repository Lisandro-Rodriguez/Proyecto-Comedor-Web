<?php
    session_start();
    require_once("../config/conexion.php");
    require_once("../modelos/UsuarioModelo.php");


   
    class RegistroControlador{
        private $usuarioModelo;

        public function __construct($pdo) {
            $this->usuarioModelo = new UsuarioModelo($pdo);
        }


        public function registrar($dni,$nombre,$apellido,$email,$localidad,$contrasena){
            $resultado = $this->usuarioModelo->insertar($dni,$nombre,$apellido,$contrasena,NULL,$localidad,$email,0);
            if($resultado===true){
                header("location: ../vistas/index.php?registro=exitoso");
                exit;
            }elseif($resultado === "dni_duplicado"){
                echo"DNI ya registrado";
            }elseif($resultado === "email_duplicado"){
                echo"Email ya registrado";
            }else{
                echo"Error de registro";
            }

        }
    }

    $dni = $_POST["dni"];
    $nombre= $_POST["nombre"];
    $apellido= $_POST["apellido"];
    $email= $_POST["email"];
    $con= $_POST["con"];
    $con_confirmar= $_POST["con_confirm"];
    $localidad = $_POST["localidad"];
    
    if($con === $con_confirmar){
        $hash = password_hash($con, PASSWORD_DEFAULT);
        $usuario = new RegistroControlador($pdo);
        $usuario->registrar($dni,$nombre,$apellido,$email,$localidad,$hash);
    }else{
        echo"Contraseñas distintas";
    }
    


?>
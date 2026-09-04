<?php
    class UsuarioModelo{
        private $pdo;
        
        public function __construct(PDO $pdo){
            $this->pdo = $pdo;
        }

        public function buscarPorDni($dni): array|false {
            $stmt = $this->pdo->prepare("SELECT * FROM usuarios where dni = :dni");
            $stmt->bindParam(':dni',$dni);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function buscarPorEmail($email):array|false{
            $stmt = $this->pdo->prepare("SELECT * FROM usuarios where email = :email");
            $stmt->bindParam(':email',$email);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function buscarPorId($id):array|false{
            $stmt = $this->pdo->prepare("SELECT * FROM usuarios where id_usuario = :id");
            $stmt->bindParam(':id',$id);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function listarConFiltro($filtro): array{

            $sql = "SELECT usuarios.id_usuario, usuarios.dni, usuarios.nombre, usuarios.apellido,
                usuarios.email, usuarios.estado,localidades.nombre_localidad,tipo_beca.nombre_beca,
                roles.nombre_rol FROM usuarios JOIN localidades USING(id_localidad) LEFT JOIN tipo_beca USING(id_beca) JOIN roles USING(id_rol)";

            if($filtro === "activos"){
                $sql .= " WHERE usuarios.estado = 1 AND usuarios.id_beca IS NOT NULL";

            }elseif($filtro === "inactivos"){
                $sql .= " WHERE usuarios.estado = 0 AND usuarios.id_beca IS NOT NULL";

            }elseif($filtro ===  "incompletos"){
                $sql .= " WHERE usuarios.id_beca IS NULL";

            }
            $stmt =$this->pdo->prepare($sql);  
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        

        public function insertar($dni,$nombre,$apellido,$pass,$id_beca,$id_localidad,$email,$estado){
            if($this->buscarPorDni($dni)===false){
                if($this->buscarPorEmail($email)===false){
                    $stmt = $this->pdo->prepare("INSERT INTO usuarios (dni,nombre,apellido,id_localidad,email,contraseña,estado,id_beca) VALUES ( :dni,:nombre,:apellido,:id_localidad,:email,:pass,:estado,:id_beca)");
                    $stmt->bindParam(':dni',$dni);
                    $stmt->bindParam(':nombre',$nombre);
                    $stmt->bindParam(':apellido',$apellido);
                    $stmt->bindParam(':pass',$pass);
                    $stmt->bindParam(':id_beca',$id_beca);
                    $stmt->bindParam(':id_localidad',$id_localidad);
                    $stmt->bindParam(':email',$email);
                    $stmt->bindParam(':estado',$estado);    
                    return $stmt->execute();
                }else{
                    return "email_duplicado";
                }
            }else{ 
                return "dni_duplicado";
            }
        }

        public function actualizar($id_usuario,$estado,$id_beca){
            $stmt = $this->pdo->prepare("UPDATE usuarios SET estado = :estado, id_beca = :id_beca WHERE id_usuario = :id_usuario");
            $stmt->bindParam(':estado',$estado);
            $stmt->bindParam(':id_beca',$id_beca);
            $stmt->bindParam(':id_usuario',$id_usuario);
            return $stmt->execute();
        }
        
        public function darDeBaja($id_usuario){
            $stmt = $this->pdo->prepare("UPDATE usuarios SET estado = 0 WHERE id_usuario = :id_usuario");
            $stmt->bindParam(':id_usuario',$id_usuario);
            return $stmt->execute();
        }
    }
?>
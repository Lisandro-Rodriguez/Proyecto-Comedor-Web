<?php

class LocalidadModelo{
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function listarTodas(){
        $stmt = $this->pdo->query("SELECT * FROM localidades");
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id){
        $stmt = $this->pdo->prepare("SELECT * FROM localidades where id_localidad = :id");
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
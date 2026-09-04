<?php


class BecaModelo{
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function listarTodas(){
        $stmt = $this->pdo->query("SELECT * FROM tipo_beca");
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

}
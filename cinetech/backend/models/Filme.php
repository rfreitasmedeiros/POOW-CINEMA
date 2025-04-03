<?php
require_once '../config.php';

class Filme {
    private $conn;
    private $table_name = "filme";

    public $id;
    public $titulo;
    public $descricao;
    public $capa;
    public $trailer;
    public $data_lancamento;
    public $duracao;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (titulo, descricao, capa, trailer, data_lancamento, duracao) VALUES (:titulo, :descricao, :capa, :trailer, :data_lancamento, :duracao)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":capa", $this->capa);
        $stmt->bindParam(":trailer", $this->trailer);
        $stmt->bindParam(":data_lancamento", $this->data_lancamento);
        $stmt->bindParam(":duracao", $this->duracao);

        return $stmt->execute();
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>
<?php
    class Genero {
        private $conn;
        private $table_name = "generos";
    
        public $id;
        public $nome;
        public $descricao;
    
        public function __construct($db) {
            $this->conn = $db;
        }
    
        public function criarGenero() {
            $query = "INSERT INTO " . $this->table_name . " (nome, descricao) VALUES (:nome, :descricao)";
            $stmt = $this->conn->prepare($query);
    
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":descricao", $this->descricao);
    
            return $stmt->execute();
        }
    }
?>
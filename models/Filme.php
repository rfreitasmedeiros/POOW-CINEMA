<?php
    class Filme {
        private $conn;
        private $table_name = "filmes";
    
        public $id;
        public $titulo;
        public $descricao;
        public $genero;
        public $capa;
        public $trailer;
        public $data_lancamento;
        public $duracao;
    
        public function __construct($db) {
            $this->conn = $db;
        }
    
        public function criarFilme() {
            $query = "INSERT INTO " . $this->table_name . " (titulo, descricao, genero, capa, trailer, data_lancamento, duracao) VALUES (:titulo, :descricao, :genero, :capa, :trailer, :data_lancamento, :duracao)";
            $stmt = $this->conn->prepare($query);
    
            $stmt->bindParam(":titulo", $this->titulo);
            $stmt->bindParam(":descricao", $this->descricao);
            $stmt->bindParam(":genero", $this->genero);
            $stmt->bindParam(":capa", $this->capa);
            $stmt->bindParam(":trailer", $this->trailer);
            $stmt->bindParam(":data_lancamento", $this->data_lancamento);
            $stmt->bindParam(":duracao", $this->duracao);
    
            return $stmt->execute();
        }
    }
?>
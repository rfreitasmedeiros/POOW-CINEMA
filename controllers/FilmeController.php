<?php
    class FilmeController {
        private $conn;
    
        public function __construct($db) {
            $this->conn = $db;
        }
    
        public function listarFilmes() {
            $query = "SELECT * FROM filmes";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function deletarFilme($id) {
            $query = "DELETE FROM filmes WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
    }    
?>
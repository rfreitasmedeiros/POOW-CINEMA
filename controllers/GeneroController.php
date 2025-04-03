<?php
class GeneroController {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listarGeneros() {
        $query = "SELECT * FROM generos";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}  
?>
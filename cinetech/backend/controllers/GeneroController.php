<?php
include("../config.php");
include("../models/Genero.php");

$database = new Database();
$db = $database->getConnection();
$genero = new Genero($db);

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    
    if (!empty($data->nome)) {
        $genero->nome = $data->nome;
        $genero->descricao = $data->descricao ?? "";

        if ($genero->create()) {
            echo json_encode(["message" => "Gênero cadastrado com sucesso!"]);
        } else {
            echo json_encode(["message" => "Erro ao cadastrar gênero."]);
        }
    } else {
        echo json_encode(["message" => "O nome do gênero é obrigatório."]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $genero->readAll();
    $generos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($generos);
} else {
    echo json_encode(["message" => "Método não permitido."]);
}

<?php
include("../config.php");
include("../models/FIlme.php");

$database = new Database();
$db = $database->getConnection();
$filme = new Filme($db);

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    
    if (!empty($data->titulo) && !empty($data->descricao) && !empty($data->capa) && !empty($data->trailer) && !empty($data->data_lancamento) && !empty($data->duracao)) {
        $filme->titulo = $data->titulo;
        $filme->descricao = $data->descricao;
        $filme->capa = $data->capa;
        $filme->trailer = $data->trailer;
        $filme->data_lancamento = $data->data_lancamento;
        $filme->duracao = $data->duracao;

        if ($filme->create()) {
            echo json_encode(["message" => "Filme cadastrado com sucesso!"]);
        } else {
            echo json_encode(["message" => "Erro ao cadastrar filme."]);
        }
    } else {
        echo json_encode(["message" => "Todos os campos são obrigatórios."]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $filme->readAll();
    $filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($filmes);
} else {
    echo json_encode(["message" => "Método não permitido."]);
}

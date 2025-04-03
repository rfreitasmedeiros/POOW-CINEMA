<?php
    require 'Database.php';
    require 'models/Filme.php';
    require 'models/Genero.php';
    require 'controllers/FilmeController.php';
    require 'controllers/GeneroController.php';
    
    header("Content-Type: application/json");
    
    $database = new Database();
    $db = $database->getConnection();
    $filmeController = new FilmeController($db);
    $generoController = new GeneroController($db);
    
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    $requestUri = explode("/", trim($_SERVER["REQUEST_URI"], "/"));
    
    if ($requestUri[0] === "filmes") {
        if ($requestMethod === "GET") {
            echo json_encode($filmeController->listarFilmes());
        } elseif ($requestMethod === "DELETE" && isset($requestUri[1])) {
            echo json_encode(["success" => $filmeController->deletarFilme($requestUri[1])]);
        }
    } elseif ($requestUri[0] === "generos" && $requestMethod === "GET") {
        echo json_encode($generoController->listarGeneros());
    } else {
        http_response_code(404);
        echo json_encode(["message" => "Rota não encontrada"]);
    }
?>
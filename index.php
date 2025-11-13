<?php
$controller = $_GET['controller'] ?? 'produto';
$action = $_GET['action'] ?? 'listar';

$controllerFile = "app/controllers/" . ucfirst($controller) . "Controller.php";

if (!file_exists($controllerFile)) {
    die("Erro: O controlador '$controllerFile' não foi encontrado.");
}

require $controllerFile;

$controllerClass = ucfirst($controller) . "Controller";

if (!class_exists($controllerClass)) {
    die("Erro: A classe '$controllerClass' não foi encontrada.");
}

$obj = new $controllerClass();

if (!method_exists($obj, $action)) {
    die("Erro: A ação '$action' não existe no controlador '$controllerClass'.");
}

$controller = new ProdutoController();

if ($action == 'editar') {
    $id = $_GET['id'] ?? null;

    if ($id === null) {
        die("Erro: ID não informado para edição.");
    }

    $controller->editar($id);
    exit;
}


$obj->$action();

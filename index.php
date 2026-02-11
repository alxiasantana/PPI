<?php
require_once 'controllers/FilmeController.php';

$controller = new FilmeController();
$action = $_GET['action'] ?? 'listar';

switch($action) {
    case 'listar': $controller->listar(); break;
    case 'listar_json': $controller->listar_json(); break;
    case 'criar': $controller->criar(); break;
    case 'salvar': $controller->salvar(); break;
    case 'editar': $controller->editar($_GET['id']); break;
    case 'atualizar': $controller->atualizar($_POST); break;
    case 'deletar': $controller->deletar($_GET['id']); break;
    default: $controller->listar();
}

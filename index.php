<?php
// conn com banco de dados
require_once "config/db.php";

// pega controller e action da URL
$controller = $_GET['controller'] ?? 'contato';
$action = $_GET['action'] ?? 'listar';

// Monta o caminho do controller
$controllerFile = "controllers/" . ucfirst($controller) . "Controller.php";

// vai ver se o controller existe
if(file_exists($controllerFile)){
    require_once $controllerFile;

    $classe = ucfirst($controller) . "Controller";
    $ctrl = new $classe($conn);

    // faz a ação solicitada
    if (method_exists($ctrl, $action)) {
        $ctrl->$action();
    } else {
        echo "Ação '$action' não encontrada!";
    }
} else {
    echo "Controller '$controller' não encontrado!";
}
?>

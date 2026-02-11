<?php
require_once "models/ContatoModel.php";

class ContatoController {
    private $model;

    public function __construct($db) {
        $this->model = new ContatoModel($db);
    }

    // listar ctt
    public function listar() {
        $contatos = $this->model->listar();
        include "views/contato/lista.php";
    }

    // cria ctt
    public function criar() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // validacao simplis no serv
            if (empty($_POST["nome"])) {
                echo "Erro: Nome é obrigatório!";
                return;
            }

            $this->model->criar(
                $_POST["nome"],
                $_POST["telefone"],
                $_POST["email"],
                $_POST["endereco"]
            );

            header("Location: index.php?controller=contato&action=listar");
        } else {
            include "views/contato/criar.php";
        }
    }

    // remove ctt
    public function remover() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $this->model->remover($_POST["id"]);
        echo json_encode(["success" => true]);
    }
}


    // edita ctt
    public function editar() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->model->editar(
                $_POST["id"],
                $_POST["nome"],
                $_POST["telefone"],
                $_POST["email"],
                $_POST["endereco"]
            );
            header("Location: index.php?controller=contato&action=listar");
        } else {
            include "views/contato/editar.php";
        }
    }
}
?>

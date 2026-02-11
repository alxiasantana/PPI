<?php
require_once 'models/Filme.php';

class FilmeController {
    public function listar() {
        $filmes = Filme::todos();
        include 'views/filmes/listar.php';
    }

    public function listar_json() {
        $filmes = Filme::todos();
        header('Content-Type: application/json');
        echo json_encode($filmes);
    }

    public function criar() { include 'views/filmes/criar.php'; }

    public function salvar() {
        $resultado = Filme::criar($_POST);
        echo json_encode($resultado);
    }

    public function editar($id) {
        $filme = Filme::buscar($id);
        include 'views/filmes/editar.php';
    }

    public function atualizar($dados) {
        $resultado = Filme::atualizar($dados);
        echo json_encode($resultado);
    }

    public function deletar($id) {
        $resultado = Filme::deletar($id);
        echo json_encode($resultado);
    }
}

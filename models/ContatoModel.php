<?php
class ContatoModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // lista todos ctts
    public function listar() {
        return $this->conn->query("SELECT * FROM contatos");
    }

    // cria novo ctt
    public function criar($nome, $telefone, $email, $endereco) {
        $stmt = $this->conn->prepare("INSERT INTO contatos (nome, telefone, email, endereco) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $telefone, $email, $endereco);
        return $stmt->execute();
    }

    // remove ctt
    public function remover($id) {
        $stmt = $this->conn->prepare("DELETE FROM contatos WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // editar ctt
    public function editar($id, $nome, $telefone, $email, $endereco) {
        $stmt = $this->conn->prepare("UPDATE contatos SET nome=?, telefone=?, email=?, endereco=? WHERE id=?");
        $stmt->bind_param("ssssi", $nome, $telefone, $email, $endereco, $id);
        return $stmt->execute();
    }
}
?>

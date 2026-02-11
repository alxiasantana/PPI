<?php
class Filme {
    private static function conexao() {
        return new PDO("mysql:host=localhost;dbname=meubanco", "root", "");
    }

    public static function todos() {
        $sql = self::conexao()->query("SELECT * FROM filmes");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function criar($dados) {
        if(empty($dados['titulo']) || empty($dados['genero']) || empty($dados['ano'])) {
            return ["sucesso" => false, "mensagem" => "Campos obrigatórios"];
        }
        $sql = self::conexao()->prepare("INSERT INTO filmes (titulo, genero, ano, descricao) VALUES (?, ?, ?, ?)");
        $sql->execute([$dados['titulo'], $dados['genero'], $dados['ano'], $dados['descricao']]);
        return ["sucesso" => true];
    }

    public static function buscar($id) {
        $sql = self::conexao()->prepare("SELECT * FROM filmes WHERE id=?");
        $sql->execute([$id]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public static function atualizar($dados) {
        $sql = self::conexao()->prepare("UPDATE filmes SET titulo=?, genero=?, ano=?, descricao=? WHERE id=?");
        $sql->execute([$dados['titulo'], $dados['genero'], $dados['ano'], $dados['descricao'], $dados['id']]);
        return ["sucesso" => true];
    }

    public static function deletar($id) {
        $sql = self::conexao()->prepare("DELETE FROM filmes WHERE id=?");
        $sql->execute([$id]);
        return ["sucesso" => true];
    }
}

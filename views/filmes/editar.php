<!DOCTYPE html>
<html>
<head>
    <title>Editar Filme</title>
    <script src="public/js/app.js"></script>
</head>
<body>
    <h1>Editar Filme</h1>
    <form id="form-editar">
        <input type="hidden" id="id" name="id" value="<?= $filme['id'] ?>">
        <input type="text" id="titulo" name="titulo" value="<?= $filme['titulo'] ?>" required>
        <input type="text" id="genero" name="genero" value="<?= $filme['genero'] ?>" required>
        <input type="number" id="ano" name="ano" value="<?= $filme['ano'] ?>" required>
        <textarea id="descricao" name="descricao"><?= $filme['descricao'] ?></textarea>
        <button type="submit">Atualizar</button>
    </form>
    <div id="mensagem"></div>

    <script>
    document.getElementById("form-editar").addEventListener("submit", async function(e) {
        e.preventDefault();
        let id = document.getElementById("id").value;
        let titulo = document.getElementById("titulo").value;
        let genero = document.getElementById("genero").value;
        let ano = document.getElementById("ano").value;
        let descricao = document.getElementById("descricao").value;

        try {
            let resposta = await fetch("index.php?action=atualizar", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: new URLSearchParams({ id, titulo, genero, ano, descricao })
            });
            let dados = await resposta.json();
            if (dados.sucesso) {
                mostrarMensagem("Filme atualizado com sucesso!", "sucesso");
            } else {
                mostrarMensagem(dados.mensagem, "erro");
            }
        } catch {
            mostrarMensagem("Erro de conexão", "erro");
        }
    });
    </script>
</body>
</html>
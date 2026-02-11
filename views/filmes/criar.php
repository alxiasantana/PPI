<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Filme</title>
    <script src="public/js/app.js"></script>
</head>
<body>
    <h1>Adicionar Filme</h1>
    <form id="form-filme">
        <input type="text" id="titulo" name="titulo" placeholder="Título" required>
        <input type="text" id="genero" name="genero" placeholder="Gênero" required>
        <input type="number" id="ano" name="ano" placeholder="Ano" required>
        <textarea id="descricao" name="descricao" placeholder="Descrição"></textarea>
        <button type="submit">Salvar</button>
    </form>
    <div id="mensagem"></div>
</body>
</html>

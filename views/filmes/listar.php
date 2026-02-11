<!DOCTYPE html>
<html>
<head>
    <title>Catálogo de Filmes</title>
    <script src="public/js/app.js"></script>
</head>
<body onload="atualizarLista()">
    <h1>Lista de Filmes</h1>
    <form id="form-filme">
        <input type="text" id="titulo" name="titulo" placeholder="Título" required>
        <input type="text" id="genero" name="genero" placeholder="Gênero" required>
        <input type="number" id="ano" name="ano" placeholder="Ano" required>
        <textarea id="descricao" name="descricao" placeholder="Descrição"></textarea>
        <button type="submit">Salvar</button>
    </form>
    <div id="mensagem"></div>

    <input type="text" id="busca" placeholder="Buscar..." onkeyup="filtrarFilmes()">

    <table id="tabela-filmes"></table>
    <div>
        <button onclick="paginaAnterior()">Anterior</button>
        <span id="paginacao"></span>
        <button onclick="proximaPagina()">Próximo</button>
    </div>
</body>
</html>

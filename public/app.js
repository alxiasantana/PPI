let paginaAtual = 1;
let itensPorPagina = 5;
let filmes = [];

document.getElementById("form-filme").addEventListener("submit", async function(e) {
    e.preventDefault();
    let titulo = document.getElementById("titulo").value;
    let genero = document.getElementById("genero").value;
    let ano = document.getElementById("ano").value;
    let descricao = document.getElementById("descricao").value;

    let regexTitulo = /^[a-zA-Z0-9\s]{2,}$/;
    if (!regexTitulo.test(titulo)) {
        mostrarMensagem("Título inválido", "erro");
        return;
    }

    try {
        let resposta = await fetch("index.php?action=salvar", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({ titulo, genero, ano, descricao })
        });
        let dados = await resposta.json();
        if (dados.sucesso) {
            mostrarMensagem("Filme salvo com sucesso!", "sucesso");
            atualizarLista();
        } else {
            mostrarMensagem(dados.mensagem, "erro");
        }
    } catch {
        mostrarMensagem("Erro de conexão", "erro");
    }
});

function mostrarMensagem(texto, tipo) {
    let div = document.getElementById("mensagem");
    div.innerText = texto;
    div.style.color = tipo === "erro" ? "red" : "green";
}

async function atualizarLista() {
    let resposta = await fetch("index.php?action=listar_json");
    filmes = await resposta.json();
    renderizarTabela();
}

function renderizarTabela() {
    let tabela = document.getElementById("tabela-filmes");
    tabela.innerHTML = "<tr><th>Título</th><th>Gênero</th><th>Ano</th></tr>";

    let inicio = (paginaAtual - 1) * itensPorPagina;
    let fim = inicio + itensPorPagina;
    let paginaFilmes = filmes.slice(inicio, fim);

    paginaFilmes.forEach(f => {
        let linha = tabela.insertRow();
        linha.insertCell(0).innerText = f.titulo;
        linha.insertCell(1).innerText = f.genero;
        linha.insertCell(2).innerText = f.ano;
    });

    document.getElementById("paginacao").innerText = 
        `Página ${paginaAtual} de ${Math.ceil(filmes.length / itensPorPagina)}`;
}

function proximaPagina() {
    if (paginaAtual < Math.ceil(filmes.length / itensPorPagina)) {
        paginaAtual++;
        renderizarTabela();
    }
}

function paginaAnterior() {
    if (paginaAtual > 1) {
        paginaAtual--;
        renderizarTabela();
    }
}

function filtrarFilmes() {
    let input = document.getElementById("busca").value.toLowerCase();
    let linhas = document.querySelectorAll("#tabela-filmes tr");
    linhas.forEach((linha, i) => {
        if (i === 0) return;
        let titulo = linha.cells[0].innerText.toLowerCase();
        linha.style.display = titulo.includes(input) ? "" : "none";
    });
}

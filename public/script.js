// remove sem reload
function removerContato(id) {
  fetch("index.php?controller=contato&action=remover", {
    method: "POST",
    headers: {"Content-Type": "application/x-www-form-urlencoded"},
    body: "id=" + id
  })
  .then(res => res.json())
  .then(data => {
    if(data.success){
      document.querySelector(`#tabela-contatos tr[data-id='${id}']`).remove();
      mostrarToast("Contato removido com sucesso!");
    } else {
      mostrarToast("Erro ao remover contato.");
    }
  });
}

// ngç la em tempo real
document.addEventListener("DOMContentLoaded", () => {
  let busca = document.getElementById("busca");
  if(busca){
    busca.addEventListener("keyup", function(){
      let filtro = this.value.toLowerCase();
      document.querySelectorAll("#tabela-contatos tr[data-id]").forEach(tr => {
        let texto = tr.innerText.toLowerCase();
        tr.style.display = texto.includes(filtro) ? "" : "none";
      });
    });
  }
});

function mostrarToast(mensagem) {
  let toast = document.createElement("div");
  toast.innerText = mensagem;
  toast.className = "toast"; 

  document.body.appendChild(toast);

  setTimeout(() => {
    toast.remove();
  }, 3000);
}

// paginação simples
document.addEventListener("DOMContentLoaded", () => {
  let linhas = document.querySelectorAll("#tabela-contatos tr[data-id]");
  let linhasPorPagina = 5; // contatos por pag
  let paginaAtual = 1;

  function mostrarPagina(pagina) {
    let inicio = (pagina - 1) * linhasPorPagina;
    let fim = inicio + linhasPorPagina;

    linhas.forEach((linha, index) => {
      linha.style.display = (index >= inicio && index < fim) ? "" : "none";
    });

    document.getElementById("pagina-atual").innerText = pagina;
  }

  let btnProxima = document.getElementById("btn-proxima");
  let btnAnterior = document.getElementById("btn-anterior");

  if(btnProxima && btnAnterior){
    btnProxima.addEventListener("click", () => {
      if (paginaAtual * linhasPorPagina < linhas.length) {
        paginaAtual++;
        mostrarPagina(paginaAtual);
      }
    });

    btnAnterior.addEventListener("click", () => {
      if (paginaAtual > 1) {
        paginaAtual--;
        mostrarPagina(paginaAtual);
      }
    });

    // primeira pag quando carregar
    mostrarPagina(paginaAtual);
  }
});

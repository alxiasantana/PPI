<h2>Criar Contato</h2>

<form method="POST" action="index.php?controller=contato&action=criar" onsubmit="return validarFormulario()">
  <label>Nome:</label><br>
  <input type="text" name="nome" id="nome" required><br><br>

  <label>Telefone:</label><br>
  <input type="text" name="telefone" id="telefone"><br><br>

  <label>Email:</label><br>
  <input type="email" name="email" id="email"><br><br>

  <label>Endereço:</label><br>
  <input type="text" name="endereco" id="endereco"><br><br>

  <button type="submit">Salvar</button>
</form>

<script>
function validarFormulario() {
  let nome = document.getElementById("nome").value.trim();
  let email = document.getElementById("email").value.trim();

  if(nome === "") {
    alert("O nome é obrigatório!");
    return false;
  }

  // regex p validar email
  let regexEmail = /^[^ ]+@[^ ]+\.[a-z]{2,}$/;
  if(email !== "" && !regexEmail.test(email)) {
    alert("Digite um email válido!");
    return false;
  }

  return true;
}
</script>
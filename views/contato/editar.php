<?php
// contato pelo id (passado na URL)
$id = $_GET['id'] ?? null;
$result = $this->model->listar(); // reusing lista para pegar todos
$contato = null;

while($c = $result->fetch_assoc()) {
    if($c['id'] == $id) {
        $contato = $c;
        break;
    }
}

if(!$contato) {
    echo "Contato não encontrado!";
    exit;
}
?>

<h2>Editar Contato</h2>

<form method="POST" action="index.php?controller=contato&action=editar" onsubmit="return validarFormulario()">
  <input type="hidden" name="id" value="<?= $contato['id'] ?>">

  <label>Nome:</label><br>
  <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($contato['nome']) ?>" required><br><br>

  <label>Telefone:</label><br>
  <input type="text" name="telefone" id="telefone" value="<?= htmlspecialchars($contato['telefone']) ?>"><br><br>

  <label>Email:</label><br>
  <input type="email" name="email" id="email" value="<?= htmlspecialchars($contato['email']) ?>"><br><br>

  <label>Endereço:</label><br>
  <input type="text" name="endereco" id="endereco" value="<?= htmlspecialchars($contato['endereco']) ?>"><br><br>

  <button type="submit">Salvar alterações</button>
</form>

<script>
function validarFormulario() {
  let nome = document.getElementById("nome").value.trim();
  let email = document.getElementById("email").value.trim();

  if(nome === "") {
    alert("O nome é obrigatório!");
    return false;
  }

  // regex dnv para validar o email
  let regexEmail = /^[^ ]+@[^ ]+\.[a-z]{2,}$/;
  if(email !== "" && !regexEmail.test(email)) {
    alert("Digite um email válido!");
    return false;
  }

  return true;
}
</script>

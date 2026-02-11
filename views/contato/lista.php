<link rel="stylesheet" href="public/style.css">

<h2>Agenda de Contatos</h2>

<!-- campo de busca em tempo real -->
<input type="text" id="busca" placeholder="Buscar contato...">

<table id="tabela-contatos">
  <tr>
    <th>Nome</th>
    <th>Telefone</th>
    <th>Email</th>
    <th>Endereço</th>
    <th>Ações</th>
  </tr>

  <?php while($c = $contatos->fetch_assoc()): ?>
    <tr data-id="<?= $c['id'] ?>">
      <td><?= htmlspecialchars($c["nome"]) ?></td>
      <td><?= htmlspecialchars($c["telefone"]) ?></td>
      <td><?= htmlspecialchars($c["email"]) ?></td>
      <td><?= htmlspecialchars($c["endereco"]) ?></td>
      <td>
        <button onclick="removerContato(<?= $c['id'] ?>)">Remover</button>
        <a href="index.php?controller=contato&action=editar&id=<?= $c['id'] ?>">Editar</a>
      </td>
      <td>
    </tr>

    
  <?php endwhile; ?>
</table>

<p><a href="index.php?controller=contato&action=criar">Criar novo contato</a></p>
<script src="public/script.js"></script>


<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Tarefas</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Minha Lista de Tarefas</h1>
  <div id="adicionar-tarefa">
<?php if (isset($_GET['adicionado'])): ?>
  <div id="mensagem" style="background: #d4edda; color: #155724; padding: 10px; border-radius: 10px; margin-bottom: 10px;">
    Tarefa adicionada com sucesso!
  </div>
  <script>
    setTimeout(function() {
      var msg = document.getElementById('mensagem');
      if (msg) msg.style.display = 'none';
    }, 2500);
  </script>
<?php endif; ?>
    <form id="form-tarefa" action="adicionar.php" method="POST">
      <input type="text" id = "tarefa" name="titulo" placeholder="Nova tarefa..." required> <br>
      <button id ="add" type="submit">Adicionar</button>
    </form>
  </div>

    <div class="lista-tarefas">
    <?php
    $sql = "SELECT * FROM tarefas ORDER BY criada_em DESC";
    $resultado = $conn->query($sql);

while ($tarefa = $resultado->fetch_assoc()) { 
    $checked = $tarefa['concluida'] ? 'checked' : '';
    $classe = $tarefa['concluida'] ? 'concluida' : '';
    echo "<div class='tarefa'>";
    echo "<input type='checkbox' class='check-tarefa' data-id='{$tarefa['id']}' $checked>";
    echo "<span class='$classe'>{$tarefa['titulo']}</span>";
    echo "<button class='botao-editar'>✏️ Editar</button>";
    echo "<form action='excluir.php' method='GET' style='display:inline;'>
            <input type='hidden' name='id' value='{$tarefa['id']}'>
            <button type='submit' class='botao-excluir'>🗑️ Excluir</button>
          </form>";
    echo "</div>";
}
?>
</div> 

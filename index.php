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

  <form id="form-tarefa" action="adicionar.php" method="POST">
    <input type="text" name="titulo" placeholder="Nova tarefa..." required>
    <button type="submit">Adicionar</button>
  </form>

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
        echo "<form action='editar.php' method='GET' style='display:inline;'>
        <input type='hidden' name='id' value='{$tarefa['id']}'>
        <button type='submit' class='botao-editar'>✏️ Editar</button>
      </form>";

echo "<form action='excluir.php' method='GET' style='display:inline;'>
        <input type='hidden' name='id' value='{$tarefa['id']}'>
        <button type='submit' class='botao-excluir'>🗑️ Excluir</button>
      </form>";

        echo "</div>";
    }
    ?>
    </div>
<script src="script.js"></script>
</body>
</html>

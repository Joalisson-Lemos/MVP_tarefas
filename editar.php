<?php include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tarefas WHERE id = $id";
    $resultado = $conn->query($sql);
    $tarefa = $resultado->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head> 
 <meta charset="UTF-8">
 <title>Editar tarefa</title>
 <link rel="stylesheet" href="./style.css?v=<?php echo filemtime('style.css'); ?>">
</head>
<body>
 <h1>Editar tarefa</h1>

<div id="adicionar-tarefa"> 
<?php if (isset($tarefa)): ?>

<form id="form-tarefa" action="atualizar_tarefa.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
    <input type="text" id="tarefa" name="titulo" value="<?php echo htmlspecialchars($tarefa['titulo']); ?>" required>
    <button id="add" type="submit">Salvar Alterações</button>
</form>

<?php else: ?>
<p>Tarefa não encontrada</p>
<?php endif; ?>
</div>

<br>
<a href="index.php">Voltar</a>

</body>
</html>

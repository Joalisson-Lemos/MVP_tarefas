<?php
include 'conexao.php';
$titulo = $_POST['titulo'];
$sql = "INSERT INTO tarefas (titulo) VALUES ('$titulo')";
$conn->query($sql);
header('Location: index.php?adicionado=1');
?>
<?php
include 'conexao.php';

$id = $_POST['id'];
$concluida = $_POST ['concluida'];

$id = intval($id);
$concluida = intval($concluida);

$sql = "UPDATE tarefas SET concluida = $concluida WHERE id = $id";
$conn->query($sql);
?>
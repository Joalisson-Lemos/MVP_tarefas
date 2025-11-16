<?php
include 'conexao.php';
if (isset($_POST['id']) && isset($_POST['titulo'])) {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];

    $stmt = $conn->prepare("UPDATE tarefas SET titulo = ? WHERE id = ?");
    $stmt->bind_param("si", $titulo, $id);
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao atualizar a tarefa: " . $stmt->error;
    }


}

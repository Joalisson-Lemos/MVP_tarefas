# 📝 Lista de Tarefas em PHP

Este é um projeto simples de lista de tarefas desenvolvido com PHP, MySQL (MariaDB), HTML, CSS e JavaScript. Ele permite adicionar, marcar como concluída, editar e excluir tarefas. Tarefas concluídas podem ser removidas automaticamente após um período.

## 🚀 Funcionalidades

- Adicionar nova tarefa
- Marcar tarefa como concluída
- Editar título da tarefa
- Excluir tarefa manualmente
- Estilização com CSS
- Atualização via JavaScript (sem recarregar a página)
- Banco de dados MariaDB com persistência

## 🛠️ Tecnologias usadas

- PHP
- MySQL/MariaDB
- HTML5
- CSS3
- JavaScript puro

## 📦 Estrutura de arquivos

mvp_tarefas/ ├── index.php # Página principal ├── adicionar.php # Insere nova tarefa ├── atualizar.php # Marca como concluída ├── excluir.php # Remove tarefa ├── editar.php # Edita tarefa ├── conexao.php # Conexão com o banco ├── style.css # Estilos visuais ├── script.js # Lógica JS para checkbox

Código

## 🧪 Como rodar localmente

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/mvp_tarefas.git
Coloque a pasta dentro de htdocs do XAMPP:

Código
C:\xampp\htdocs\mvp_tarefas
Crie o banco de dados no phpMyAdmin:

sql
CREATE DATABASE mvp_tarefas;
USE mvp_tarefas;

CREATE TABLE tarefas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255) NOT NULL,
  concluida TINYINT(1) DEFAULT 0,
  criada_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
Inicie o Apache e MySQL no XAMPP

Acesse no navegador:

Código
http://localhost/mvp_tarefas
📌 Autor
Feito com 💻 por Joalisson e Paula

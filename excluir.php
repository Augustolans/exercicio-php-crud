<?php

require_once "conexao.php";

$id = $_GET['id'];

$pdo -> query("DELETE FROM alunos WHERE id = '$id'");

echo "excluído com sucesso ! <a href='visualizar.php'>Voltar</a>";
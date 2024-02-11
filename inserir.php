<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1>Cadastrar um novo aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para cadastrar um novo aluno.</p>

	<form method="post">
	    <p><label for="nome">Nome:</label>
	    <input type="text" id="nome" name='nome' required></p>
        
      <p><label for="primeira">Primeira nota:</label>
	    <input type="number" id="primeira" name='primeira'step="0.01" min="0.00" max="10.00" required></p>
	    
	    <p><label for="segunda">Segunda nota:</label>
	    <input type="number" id="segunda" name='segunda' step="0.01" min="0.00" max="10.00" required></p>
	    
      <button>Cadastrar aluno</button>
	</form>

    <hr>
    <p><a href="index.php">Voltar ao início</a></p>
</div>

<?php 

	require_once "conexao.php";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	@$nome_aluno = $_POST['nome'];
	@$primeira_nota = $_POST['primeira'];
	@$segunda_nota = $_POST['segunda'];

	$res = $pdo ->prepare("INSERT INTO alunos(nome, primeira, segunda) VALUES (:nome,:primeira,:segunda)");

	$res -> bindValue(":nome", $nome_aluno);
	$res -> bindValue(":primeira", $primeira_nota);
	$res -> bindValue(":segunda", $segunda_nota);

	$res -> execute();
	}

?>
</body>
</html>
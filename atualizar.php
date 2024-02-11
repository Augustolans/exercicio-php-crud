<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Atualizar dados - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Atualizar dados do aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para atualizar os dados do aluno.</p>

    <form method="post">

    <?php

        include_once "conexao.php";

        $id = $_GET['id'];

        $query = $pdo ->query("SELECT * FROM `alunos` WHERE id = '$id'");
        $res = $query ->fetchAll(PDO::FETCH_ASSOC);
        $nome                   = $res['0']['nome'];
        $primeira_nota          = $res['0']['primeira'];
        $segunda_nota           = $res['0']['segunda'];
        
        $media = ($primeira_nota+$segunda_nota)/2;

        if($media>=5){
            $situacao = "APROVADO";
        }else{
            $situacao = "REPROVADO";
        }

    ?>
        
	    <p><label for="nome">Nome:</label>
	    <input type="text" name="nome" value='<?= $nome ?>'id="nome" required></p>
        
        <p><label for="primeira">Primeira nota:</label>
	    <input name="primeira" type="number" value='<?= $primeira_nota ?>'id="primeira" step="0.01" min="0.00" max="10.00" required></p>
	    
	    <p><label for="segunda">Segunda nota:</label>
	    <input name="segunda" type="number" value='<?= $segunda_nota ?>' id="segunda" step="0.01" min="0.00" max="10.00" required></p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição.
        Usado apenas para exibição do valor da média -->
            <label for="media">Média:</label>
            <input name="media" type="number" id="media" value='<?=$media?>'step="0.01" min="0.00" max="10.00" readonly disabled>
        </p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição 
        Usado apenas para exibição do texto da situação -->
            <label for="situacao">Situação:</label>
	        <input type="text" name="situacao" id="situacao" value='<?=$situacao?>' readonly disabled>
        </p>
	    
        <input type='submit'name="atualizar-dados"value='Atualizar dados do aluno'>
	</form>    
    
    <hr>
    <p><a href="visualizar.php">Voltar à lista de alunos</a></p>
        <?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id                     = $_GET['id'];
        $nome                   = $_POST['nome'];
        $primeira_nota          = $_POST['primeira'];
        $segunda_nota           = $_POST['segunda'];

    $res = $pdo->prepare("UPDATE alunos SET nome = :nome, primeira = :primeira, segunda = :segunda WHERE id = :id");
    $res->bindValue(":id", $id);

    $res->bindValue("id", $id);
    $res->bindValue(":nome", $nome);
    $res->bindValue(":primeira", $primeira_nota);
    $res->bindValue(":segunda", $segunda_nota);

    $res->execute();
    
    
    
    }

        ?>
</div>


</body>
</html>
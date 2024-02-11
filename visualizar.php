<?php

include_once "conexao.php";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
<table border='5'>
    <thead>
        <tr>
            <td>Código</td>
            <td>Nome</td>
            <td>Primeira Nota </td>
            <td>Segunda Nota</td>
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>
<?php

    $query = $pdo->query("SELECT * FROM alunos");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);

    for($i=0;$i<count($res);$i++){
        $id  = $res[$i]['id'];
        $nome = $res[$i]['nome'];
        $primeira = $res[$i]['primeira'];
        $segunda = $res[$i]['segunda'];

?>
        <tr>
            <td><?= $id ?></td>
            <td><?= $nome ?></td>
            <td><?= $primeira ?></td>
            <td><?= $segunda ?></td>
            <td>
                <?= "<a href='atualizar.php?id=$id'><i class='fas fa-edit'></i></a>" ?>
                <?= "<a href='excluir.php?id=$id'><i class='fas fa-trash'></i></a>" ?>

            </td>
        </tr>

<?php } ?>

    </tbody>
</table>

    <p><a href="inserir.php">Inserir novo aluno</a></p>
    <p><a href="index.php">Voltar ao início</a></p>
</div>

</body>
</html>
<?php 
    require_once "../src/funcoes-alunos.php";
    $listaDeAlunos = lerAlunos($conexao);

    // dump($listaDeProdutos);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>

   <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.

Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->


    <p><a href="../index.php">Voltar ao início</a></p>

    <div class="alunos">
            
        <?php        
            foreach ($listaDeAlunos as $aluno) {
                
            ?>     
            <article>
                <h3>Nome do Aluno..: <?=$aluno['nome']?></h3>
                
                <p>Primeira Nota..: <?=$aluno['primeira']?></p>
                <p>Segunda Nota..: <?=$aluno['segunda']?></p>
                <p>Média..: <?=$aluno['media']?></p>

                <p>Situação..: <?=$aluno['situacao']?></p>
                
                 <p>
                    <a class="atualizar" href="atualizar.php?id=<?=$aluno['id']?>" style="color: green;">Atualizar</a>
                    &nbsp;  -  &nbsp;
                    <a class="excluir" href="excluir.php?id=<?=$aluno['id']?>" style="color: red;">Excluir</a>
                </p>

                <hr>
            </article>
            <?php   
            }
            ?>

    </div>

</div>
    <script src="../src/excluir.js"></script>
</body>
</html>
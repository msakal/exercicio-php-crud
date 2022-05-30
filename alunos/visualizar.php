<?php 
    
    require_once "../src/funcoes-alunos.php";
    $listaDeAlunos = lerAlunos($conexao);

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
    <h1>Lista de Alunos</h1>
    <hr>
    
    <h4>Consulte a Situação do aluno, utilize o formulário abaixo para manutenção.</h4>

    <div class="alunos">
        <table>
            <tr class="notas">
                <th rowspan=2 class="center">Nome do Aluno</th>
                <th colspan=3>Notas</th>
                <th rowspan=2 class="center">Situação</th>
                <th colspan=2 rowspan=2></th>
            </tr>
            <tr>
                <th>&nbsp;Primeira&nbsp;</th>
                <th>&nbsp;Segunda&nbsp;</th>
                <th>&nbsp;Média&nbsp;</th>
            </tr>
            <?php        
                foreach ($listaDeAlunos as $aluno) {
                    $cor = corDeFundo($aluno['media']);
            ?>     
                    <tr class="<?=$cor?>">
                        <td><?=$aluno['nome']?></td>
                        <td class="center"><?=$aluno['primeira']?></td>
                        <td class="center"><?=$aluno['segunda']?></td>
                        <td class="center"><?=$aluno['media']?></td>
                        <td><?=$aluno['situacao']?></td>               
                        <td class="center">
                            <a class="atualizar" href="atualizar.php?id=<?=$aluno['id']?>">Atualizar</a>&nbsp;&nbsp;
                            <a class="excluir" href="excluir.php?id=<?=$aluno['id']?>">Excluir</a>
                        </td>             
                    </tr>
                <?php   
                }
                ?>
        </table>
    </div>
    <br>
    <hr>
    
    <div>
        <p><a class="opcReturn" href="inserir.php">Inserir novo aluno</a>
        <a class="opcReturn" href="../index.php">Voltar ao início</a></p>
    </div>
</div>

    <script src="../src/excluir.js"></script>
</body>
</html>